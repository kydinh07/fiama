<?php
class Order extends Controller {

    public $orderModel;
    public $userModel;
    public $pageModel;
    public $data = [];
    public $shoppingCartModel;
    public $authModel;

    function __construct()
    {
        $this->pageModel = $this->CreateModel('PageModel');

        $this->data['header']['category']          = $this->pageModel->GetProductCategory();
        $this->data['header']['subCategory']       = $this->pageModel->GetProductSubCategory();
        $this->shoppingCartModel = $this->CreateModel('ShoppingCartModel');
        if (isset($_SESSION['currentUser']['username']) && $_SESSION['currentUser']['username'] != "")
        {
            $this->data['header']['cart_count']       = $this->shoppingCartModel->GetCartCountByUsername($_SESSION['currentUser']['username']);
        } else {
            $this->data['header']['cart_count']       = 0;
        }
        $this->data['footer'][] = [];
        $this->shoppingCartModel = $this->CreateModel('ShoppingCartModel');
        $this->userModel = $this->CreateModel('UserModel');
        $this->authModel = $this->CreateModel('AuthModel');
        $this->orderModel = $this->CreateModel('OrderModel');

        if (!$this->authModel->check_logged_in_customer()) {
            $this->authModel->logout();
        }

        $productFromCart = $this->shoppingCartModel->getProductCartByUsername($_SESSION['currentUser']['username']);
        if (!empty($productFromCart))
        {
            $this->data['slideCart']['productFromCart'] = $productFromCart;
        } else {
            $this->data['slideCart']['productFromCart'] = [0];
        }
    }

    function PayView()
    {
        if (!isset($_GET['username']))
        {
            echo "<script>alert('" . "username is Required!" . "'); window.location.href = '" . _WEB_ROOT . "/Home/404" . "';</script>";
            return;
        }

        $productFromCart = $this->shoppingCartModel->getProductCartByUsername($_GET['username']);
        if (!empty($productFromCart))
        {
            $this->data['slideCart']['productFromCart'] = $productFromCart;
        } else {
            $this->data['slideCart']['productFromCart'] = [0];
        }
        $user = $this->userModel->GetCustomerByUsername($_GET['username']);
        $this->data['views'] = 'orders/pay';
        $this->data['subData']['pageTitle'] = 'Pay';
        $this->data['subData']['productFromCart'] = $productFromCart;
        $this->data['subData']['user'] = $user[0];
        $this->data['subData']['addresses'] = $this->userModel->GetCustomerAddressById($user[0]['Id']);
        //subdata address
        $province_json = file_get_contents(_WEB_ROOT . "/public/assets/addresses/tinh_tp.json");
        // Chuyển đổi dữ liệu JSON thành mảng PHP
        $provinces = json_decode($province_json, true);
        // var_dump($provinces);
        // die;
        $this->data['subData']['provinces'] = $provinces;
        //end
        $this->RenderView('layouts/clientLayout',$this->data);
    }

    function order()
    {
        if (!isset($_POST['phone']) || $_POST['phone'] == "") {
            echo "<script>alert('" . "Phone is Required!" . "'); window.location.href = '" . _WEB_ROOT . "Order/PayView?username=" . $_SESSION['currentUser']['username'] . "';</script>";
            die;
        }
        if (!isset($_POST['address']) || $_POST['address'] == "") {
            echo "<script>alert('" . "Address is Required!" . "'); window.location.href = '" . _WEB_ROOT . "Order/PayView?username=" . $_SESSION['currentUser']['username'] . "';</script>";
            die;
        }
        if (!isset($_POST['payment_method']) || $_POST['payment_method'] == "") {
            echo "<script>alert('" . "Payment method is Required!" . "'); window.location.href = '" . _WEB_ROOT . "Order/PayView?username=" . $_SESSION['currentUser']['username'] . "';</script>";
            die;
        }
        if (!isset($_POST['customer_id']) || $_POST['customer_id'] == "") {
            echo "<script>alert('" . "Can not find your id! Please try again later!" . "'); window.location.href = '" . _WEB_ROOT . "Order/PayView?username=" . $_SESSION['currentUser']['username'] . "';</script>";
            die;
        }
        if (!isset($_POST['total_value']) || $_POST['total_value'] == "") {
            echo "<script>alert('" . "Can not calculate your total price! Please try again later!" . "'); window.location.href = '" . _WEB_ROOT . "Order/PayView?username=" . $_SESSION['currentUser']['username'] . "';</script>";
            die;
        }
        if (!isset($_POST['total_amount']) || $_POST['total_amount'] == "") {
            echo "<script>alert('" . "Can not calculate your total amount of product! Please try again later!" . "'); window.location.href = '" . _WEB_ROOT . "Order/PayView?username=" . $_SESSION['currentUser']['username'] . "';</script>";
            die;
        }

        //insert order, order details
        $productFromCart = $this->shoppingCartModel->getProductCartByCustomerId($_POST['customer_id']);
        foreach($productFromCart as $prod)
        {
            $currentProductAmount = $this->orderModel->currentAmountOfAProduct($prod['Id']);
            if ($prod['cart_amount'] > $currentProductAmount)
            {
                echo "<script>alert('Sản phẩm ". $prod['Title'] ." tạm hết hàng!'); window.location.href = '" . _WEB_ROOT . "/Home" . "';</script>";
                return;
            }
        }

        $order_id = $this->orderModel->createOrder($_POST['customer_id'], $_POST['total_value'], $_POST['total_amount'], $_POST['payment_method'], $_POST['phone'], $_POST['address']);
        foreach($productFromCart as $prod)
        {
            $this->orderModel->createOrderDetail($order_id, $prod['Id'], $prod['Price'], $prod['cart_amount']);
        }
        //delete cart
        $this->shoppingCartModel->DeleteCartByCustomerId($_POST['customer_id']);

        echo "<script>alert('" . "Đặt hàng thành công! Chúng tôi sẽ liên lạc với bạn sớm nhất có thể" . "'); window.location.href = '" . _WEB_ROOT . "/Home" . "';</script>";
    }

    public function handleVerifyOrder()
    {
        var_dump($_POST['orderId']);
        die;
        if (isset($_POST['orderId']))
        {
            $order_id = $_POST['orderId'];
            // $customer_id = $_POST['customerId'];

            header('Content-Type: application/json');
            $result = $this->orderModel->handleVerifyOrder($order_id);
            if ($result)
            {
                // Trả về dữ liệu dưới dạng JSON
                echo json_encode("pass");
            } else {
                echo json_encode("fail");
            }
        }
    }

    public function handleOrderStatus()
    {
        header('Content-Type: application/json');
        if (isset($_POST['orderId']) && isset($_POST['status']))
        {
            $order_id = $_POST['orderId'];
            $status = $_POST['status'];
            // $customer_id = $_POST['customerId'];

            $result = $this->orderModel->handleOrderStatus($order_id, $status);
            if ($result)
            {
                // Trả về dữ liệu dưới dạng JSON
                echo json_encode("pass");
            } else {
                echo json_encode("fail");
            }
        } else {
            echo json_encode("fail");
        }
    }

    public function handlePaidOrder()
    {
        header('Content-Type: application/json');
        if (isset($_POST['orderId']) && isset($_POST['paid']))
        {
            $order_id = $_POST['orderId'];
            $paid = $_POST['paid'];
            // $customer_id = $_POST['customerId'];

            $result = $this->orderModel->handlePaidOrder($order_id, $paid);
            if ($result)
            {
                // Trả về dữ liệu dưới dạng JSON
                echo json_encode("pass");
            } else {
                echo json_encode("fail");
            }
        } else {
            echo json_encode("fail");
        }
    }
}