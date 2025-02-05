<?php
use Illuminate\Http\Request;
class ShoppingCart extends Controller {

    public $shoppingCartModel;
    public $userModel;
    public $orderModel;

    function __construct()
    {
        $this->shoppingCartModel = $this->CreateModel('ShoppingCartModel');
        $this->userModel = $this->CreateModel('UserModel');
        $this->orderModel = $this->CreateModel('OrderModel');
    }

    function AddToCart()
    {
        $response = array();
        //receive data
        $productId = $_POST['productId'];
        $username = $_POST['username'];

        if ( !isset($username) || $username == "")
        {
            $response['msg'] = "Bạn phải đăng nhập để thêm sản phẩm này vào giỏ hàng!";
        } else {
            $currentProductAmount = $this->orderModel->currentAmountOfAProduct($productId);
            if ($currentProductAmount <= 0)
            {
                $response['msg'] = "Sản phẩm này đã hết hàng!";
            } else {
                //check if shopping cart exist or not
                $user = $this->userModel->GetCustomerByUsername($username);
                $result = $this->shoppingCartModel->checkShoppingCart($productId, $username); //check is shopping cart of this customer exist or not
                if ($result)
                {
                    $product = $this->shoppingCartModel->AddToCart($productId, $username);
                    if (!empty($product)) {
                        $response['msg'] = "pass";
                        $response['img'] = $product['Img'];
                        $response['title'] = $product['Title'];
                        $response['price'] = $product['Price'];
                        $response['product_id'] = $product['Id'];
                        $response['customer_id'] = $user[0]['Id'];
                    } else {
                        $response['msg'] = "Add Fail!";
                    }
                    
                } else {
                    $response['msg'] = "Đã có trong giỏ hàng";
                }
            }
        }

        
        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function DeleteProductFromCart()
    {
        $response['msg'] = "fail";
        //receive data
        $productId = $_POST['productId'];
        $customerId = $_POST['customerId'];

        if ( !isset($customerId) || $customerId == "")
        {
            $response['msg'] = "Bạn phải đăng nhập để thêm sản phẩm này vào giỏ hàng!";
        } else {
            $result = $this->shoppingCartModel->DeleteProductFromCart($customerId, $productId);
            if ($result)
            {
                $response['msg'] = 'pass';
            } else {
                $response['msg'] = "Something wrong! Try again later!";
            }
        }

        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function decreaseShoppingCart()
    {
        $response['msg'] = "fail";
        //receive data
        $product_id = $_POST['product_id'];
        $customer_id = $_POST['customer_id'];

        if ( !isset($customer_id) || $customer_id == "")
        {
            $response['msg'] = "Bạn phải đăng nhập!";
        } else {
            $cart = $this->shoppingCartModel->GetOneShoppingCart($customer_id, $product_id);
            if ($cart['amount'] <= 1) {
                $response['msg'] = "Số lượng không thể nhỏ hơn 0";
            } else {
                $result = $this->shoppingCartModel->decreaseShoppingCart($customer_id, $product_id);
                if ($result)
                {
                    $response['msg'] = 'pass';
                } else {
                    $response['msg'] = "Something wrong! Try again later!";
                }
            }
        }

        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function increaseShoppingCart()
    {
        $response['msg'] = "fail";
        //receive data
        $product_id = $_POST['product_id'];
        $customer_id = $_POST['customer_id'];

        if ( !isset($customer_id) || $customer_id == "")
        {
            $response['msg'] = "Bạn phải đăng nhập!";
        } else {
            $currentProductAmount = $this->orderModel->currentAmountOfAProduct($product_id);
            if ($currentProductAmount <= 1) {
                $response['msg'] = "Sản phẩm đã hết hàng!";
            } else {
                $result = $this->shoppingCartModel->increaseShoppingCart($customer_id, $product_id);
                if ($result)
                {
                    $response['msg'] = 'pass';
                } else {
                    $response['msg'] = "Something wrong! Try again later!";
                }
            }
        }

        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}