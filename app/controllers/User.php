<?php
class User extends Controller{

    public $userModel,$data = [];
    public $shoppingCartModel;
    public $orderModel;
    public $productModel;
    function __construct()
    {
        $this->userModel = $this->CreateModel('UserModel');
        $this->orderModel = $this->CreateModel('OrderModel');
        $this->productModel = $this->CreateModel('ProductModel');
        $this->shoppingCartModel = $this->CreateModel('ShoppingCartModel');
        $this->data['header']['category']          = $this->userModel->GetProductCategory();
        $this->data['header']['subCategory']       = $this->userModel->GetProductSubCategory();
        if (isset($_SESSION['currentUser']['username']) && $_SESSION['currentUser']['username'] != "")
        {
            $this->data['header']['cart_count']       = $this->shoppingCartModel->GetCartCountByUsername($_SESSION['currentUser']['username']);
        } else {
            $this->data['header']['cart_count']       = 0;
        }

        $this->data['footer'] = [];
        $this->shoppingCartModel = $this->CreateModel('ShoppingCartModel');

        $productFromCart = $this->shoppingCartModel->getProductCartByUsername($_SESSION['currentUser']['username']);
        if (!empty($productFromCart))
        {
            $this->data['slideCart']['productFromCart'] = $productFromCart;
        } else {
            $this->data['slideCart']['productFromCart'] = [0];
        }
    }
    function Index(){
        $this->MyAccount();
    }
    function MyAccount(){
        $this->data['subData']['pageTitle'] = 'Tài Khoản Của Tôi';
        $this->data['views'] = 'users/myaccount';

        $customer = $this->userModel->GetCustomerByUsername($_GET['username']);
        $this->data['subData']['customer'] = $customer;

        $this->data['subData']['orders'] = $this->orderModel->GetAllOrderByCustomerId($customer[0]['Id']);
        $this->data['subData']['order_details'] = $this->orderModel->GetAllOrderDetail();
        $this->data['subData']['products'] = $this->productModel->GetAllProduct();
        $this->data['subData']['addresses'] = $this->userModel->GetCustomerAddressById($customer[0]['Id']);

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
    function Wishlist(){
        $this->data['subData']['pageTitle'] = 'Sản Phẩm Yêu Thích';
        $this->data['views'] = 'users/wishlist';
        $this->RenderView('layouts/clientLayout',$this->data); 
    }
    function ShoppingCart(){
        $this->data['subData']['pageTitle'] = 'Giỏ Hàng';
        $this->data['views'] = 'users/shoppingcart';
        $this->RenderView('layouts/clientLayout',$this->data); 
    }
    function CheckOut(){
        $this->data['subData']['pageTitle'] = 'Thanh Toán';
        $this->data['views'] = 'users/checkout';
        $this->RenderView('layouts/clientLayout',$this->data); 
    }

    function Login(){
        $this->data['subData']['pageTitle'] = 'Đăng Nhập';
        $this->data['views'] = 'users/login';
        $this->RenderView('layouts/clientLayout',$this->data); 
    }
    function Register(){
        $this->data['subData']['pageTitle'] = 'Đăng Ký';
        $this->data['views'] = 'users/register';
        $this->RenderView('layouts/clientLayout',$this->data); 
    }

    //HANDLE User

    function SaveCustomer()
    {
        if (!isset($_POST['FirstName']) || $_POST['FirstName'] == "") {
            $this->displayUserError("FirstName is Required!", $_POST);
        } else if (!isset($_POST['LastName']) || $_POST['LastName'] == "") {
            $this->displayUserError("LastName is Required!", $_POST);
        } else if (!isset($_POST['UserName']) || $_POST['UserName'] == "") {
            $this->displayUserError("UserName is Required!", $_POST);
        } else {
            if (isset($_POST['OldPassword']) && $_POST['OldPassword'] != "") {
                if (!isset($_POST['ConfirmPassword']) || $_POST['ConfirmPassword'] == "" || !isset($_POST['NewPassword']) || $_POST['NewPassword'] == "") {
                    $this->displayUserError("New Password & Confirm password is Required!", $_POST);
                } else {
                    $user = $this->userModel->GetCustomerByUsername($_POST['UserName']);
                    if (!password_verify($_POST['OldPassword'], $user[0]['Password']))
                    {
                        $this->displayUserError("Old Password doesn't match!", $_POST);
                    } else if ($_POST['ConfirmPassword'] != $_POST['NewPassword']) {
                        $this->displayUserError("Confirm password does not match!", $_POST);
                    } else {
                        $_POST['Password'] = true;
                    }
                }
            } 

            if (isset($_POST['id'])) {
                $_POST['customerId'] = $_POST['id'];
            }

            $result = $this->userModel->SaveCustomer($_POST);
            if ($result) {
                echo "<script>alert('Save successfully!'); window.location.href = '" . _WEB_ROOT . "/tai-khoan-cua-toi?tab=1&username=" . $_POST['UserName'] . "';</script>";
                die;
            } else {
                $errMsg = $_SESSION['error'];
                unset($_SESSION['error']);
                $this->displayUserError($errMsg, $_POST);
            }
        }
    }

    function SaveAddress() {
        if (!isset($_POST['id']) || $_POST['id'] == "") {
            $this->displayUserError('You must login!', $_POST);
        } else if (!isset($_POST['province']) || $_POST['province'] == "") {
            $this->displayUserError('Province is Required!', $_POST);
        } else if (!isset($_POST['district']) || $_POST['district'] == "") {
            $this->displayUserError('district is Required!', $_POST);
        } else if (!isset($_POST['ward']) || $_POST['ward'] == "") {
            $this->displayUserError('ward is Required!', $_POST);
        } else if (!isset($_POST['detail']) || $_POST['detail'] == "") {
            $this->displayUserError('detail is Required!', $_POST);
        } else {
            $result = $this->userModel->SaveAddress($_POST);
            if ($result) {
                echo "<script>alert('Save successfully!'); window.location.href = '" . _WEB_ROOT . "/tai-khoan-cua-toi?tab=1&username=" . $_POST['UserName'] . "';</script>";
            } else {
                $errMsg = $_SESSION['error'];
                unset($_SESSION['error']);
                $this->displayUserError($errMsg, $_POST);
            }
        }
    }

    function SavePayAddress() {
        if (!isset($_POST['id']) || $_POST['id'] == "") {
            $this->displayPayError('You must login!', $_POST);
        } else if (!isset($_POST['province']) || $_POST['province'] == "") {
            $this->displayPayError('Province is Required!', $_POST);
        } else if (!isset($_POST['district']) || $_POST['district'] == "") {
            $this->displayPayError('district is Required!', $_POST);
        } else if (!isset($_POST['ward']) || $_POST['ward'] == "") {
            $this->displayPayError('ward is Required!', $_POST);
        } else if (!isset($_POST['detail']) || $_POST['detail'] == "") {
            $this->displayPayError('detail is Required!', $_POST);
        } else {
            $result = $this->userModel->SaveAddress($_POST);
            if ($result) {
                echo "<script>alert('Save successfully!'); window.location.href = '" . _WEB_ROOT . "/Order/PayView?username=" . $_POST['UserName'] . "';</script>";
            } else {
                $errMsg = $_SESSION['error'];
                unset($_SESSION['error']);
                $this->displayPayError($errMsg, $_POST);
            }
        }
    }

    function displayPayError($msg, $post)
    {
        if (isset($post['id'])) {
            echo "<script>alert('" . $msg . "'); window.location.href = '" . _WEB_ROOT . "/Order/PayView?username=" . $post['UserName'] . "';</script>";
        } else {
            echo "<script>alert('" . $msg . "'); window.location.href = '" . _WEB_ROOT . "/Home" . "';</script>";
        }
        die;
    }

    function DeleteAddress() {
        $response = "";
        if (!isset($_POST['address_id']) || $_POST['address_id'] == "") {
            $response = "Delete Address fail! Something went wrong!";
        } else {
            $id = $_POST['address_id'];
            $result = $this->userModel->DeleteAddress($id);
            if ($result)
            {
                $response = "OK";
            } else {
                $response = "Delete Address fail! Something went wrong!";
            }
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function displayUserError($msg, $post)
    {
        if (isset($post['id'])) {
            echo "<script>alert('" . $msg . "'); window.location.href = '" . _WEB_ROOT . "/tai-khoan-cua-toi?tab=1&username=" . $post['UserName'] . "';</script>";
        } else {
            echo "<script>alert('" . $msg . "'); window.location.href = '" . _WEB_ROOT . "/Home" . "';</script>";
        }
        die;
    }

    function disableCustomer()
    {
        header('Content-Type: application/json');
        if (isset($_POST['customer_id']))
        {
            $customer_id = $_POST['customer_id'];
            // $customer_id = $_POST['customerId'];

            $result = $this->userModel->disableCustomer($customer_id);
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

    function enableCustomer()
    {
        header('Content-Type: application/json');
        if (isset($_POST['customer_id']))
        {
            $customer_id = $_POST['customer_id'];
            // $customer_id = $_POST['customerId'];

            $result = $this->userModel->enableCustomer($customer_id);
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

    function disableEmployee()
    {
        header('Content-Type: application/json');
        if (isset($_POST['employee_id']))
        {
            $employee_id = $_POST['employee_id'];
            // $customer_id = $_POST['customerId'];

            $result = $this->userModel->disableEmployee($employee_id);
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

    function enableEmployee()
    {
        header('Content-Type: application/json');
        if (isset($_POST['employee_id']))
        {
            $employee_id = $_POST['employee_id'];
            // $customer_id = $_POST['customerId'];

            $result = $this->userModel->enableEmployee($employee_id);
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