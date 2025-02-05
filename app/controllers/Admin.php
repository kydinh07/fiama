<?php
class Admin extends Controller
{

    private $adminModel, $data = [];
    private $productModel;
    private $userModel;
    private $authModel;
    private $categoryModel;
    private $importModel;
    private $orderModel;

    function __construct()
    {
        $this->adminModel = $this->CreateModel('AdminModel');
        $this->productModel = $this->CreateModel('ProductModel');
        $this->userModel = $this->CreateModel('UserModel');
        $this->authModel = $this->CreateModel("AuthModel");
        $this->categoryModel = $this->CreateModel("CategoryModel");
        $this->importModel = $this->CreateModel("ImportModel");
        $this->orderModel = $this->CreateModel("OrderModel");

        $this->data['views']['header'] = 'admin/blocks/header';
        $this->data['views']['leftSideBar'] = 'admin/blocks/leftSideBar';
        $this->data['views']['footer'] = 'admin/blocks/footer';

        if (!$this->authModel->check_logged_in_employee()) {
            $this->authModel->logout();
        }
    }

    function Index()
    {
        $this->data['views']['content'] = 'admin/dashboard';
        $this->data['subData'] = [];
        $this->RenderView('layouts/adminLayout', $this->data);
    }
    function DashBoard()
    {
        $this->Index();
    }


    //HANDLE EMPLOYEE

    function SaveEmployee()
    {
        if (!isset($_POST['FirstName']) || $_POST['FirstName'] == "") {
            $this->displayEmployeeError("FirstName is Required!", $_POST);
        } else if (!isset($_POST['LastName']) || $_POST['LastName'] == "") {
            $this->displayEmployeeError("LastName is Required!", $_POST);
        } else if (!isset($_POST['UserName']) || $_POST['UserName'] == "") {
            $this->displayEmployeeError("UserName is Required!", $_POST);
        } else if (!$this->authModel->check_username($_POST['UserName']) && !isset($_POST['id'])) {
            $this->displayEmployeeError("UserName existed!", $_POST);
        } else if (!isset($_POST['Password']) || $_POST['Password'] == "") {
            $this->displayEmployeeError("Password is Required!", $_POST);
        } else if (!isset($_POST['ConfirmPassword']) || $_POST['ConfirmPassword'] == "") {
            $this->displayEmployeeError("Confirm password is Required!", $_POST);
        } else if ($_POST['ConfirmPassword'] != $_POST['Password']) {
            $this->displayEmployeeError("Confirm password does not match!", $_POST);
        } else {
            if (isset($_POST['id'])) {
                $_POST['staffId'] = $_POST['id'];
            }

            $result = $this->adminModel->SaveEmployee($_POST);
            if ($result) {
                echo "<script>alert('Save successfully!'); window.location.href = '" . _WEB_ROOT . "/admin/employee?action=list" . "';</script>";
                die;
            } else {
                $errMsg = $_SESSION['error'];
                unset($_SESSION['error']);
                $this->displayEmployeeError($errMsg, $_POST);
            }
        }
    }

    function displayEmployeeError($msg, $post)
    {
        if (isset($post['id'])) {
            echo "<script>alert('" . $msg . "'); window.location.href = '" . _WEB_ROOT . "/admin/employee?action=profile&id=" . $post['id'] . "';</script>";
        } else {
            echo "<script>alert('" . $msg . "'); window.location.href = '" . _WEB_ROOT . "/admin/employee?action=add" . "';</script>";
        }
    }

    function DeleteEmployee()
    {
        if (isset($_GET['id'])) {
            $result = $this->adminModel->DeleteEmployeeById($_GET['id']);
            if ($result) {
                echo "<script>alert('Delete successfully!'); window.location.href = '" . _WEB_ROOT . "/admin/employee?action=list" . "';</script>";
                die;
            } else {
                echo "<script>alert('Delete Failed!'); window.location.href = '" . _WEB_ROOT . "/admin/employee?action=list" . "';</script>";
            }
        } else {
            echo "<script>alert('Delete Failed!'); window.location.href = '" . _WEB_ROOT . "/admin/employee?action=list" . "';</script>";
        }
    }

    // END HANDLE EMPLOYEE

    public function RenderEmployee()
    {
        if (empty($_GET['action'])) {
            // render 404
            App::$app->LoadError();
        } else {
            switch ($_GET['action']) {
                case 'list':
                    $this->ViewListEmployee();
                    break;
                case 'add':
                    $this->ViewAddEmployee();
                    break;
                case 'edit':
                    $this->ViewListEmployee();
                    break;
                case 'profile':
                    $this->ViewProfileEmployee();
                    break;
                default:
                    App::$app->LoadError();
            }
        }
    }

    public function ViewListEmployee()
    {
        $this->data['views']['content'] = 'admin/employee/list';
        $this->data['subData']['listEmployee'] = $this->adminModel->GetListEmployee();
        $this->RenderView('layouts/adminLayout', $this->data);
    }
    public function ViewAddEmployee()
    {
        $this->data['views']['content'] = 'admin/employee/add';
        $this->data['subData'][] = [];
        $this->RenderView('layouts/adminLayout', $this->data);
    }
    public function ViewProfileEmployee()
    {

        if (!empty($_GET['id'])) {
            $this->data['views']['content'] = 'admin/employee/profile';
            $this->data['subData']['Employee'] = $this->adminModel->GetEmployeeById($_GET['id']);
            //var_dump($this->data['subData']['Employee']);
            $this->RenderView('layouts/adminLayout', $this->data);
        } else {
            App::$app->LoadError();
        }
    }


    // CUSTOMER
    public function RenderCustomer()
    {
        if (empty($_GET['action'])) {
            // render 404
            App::$app->LoadError();
        } else {
            switch ($_GET['action']) {
                case 'list':
                    $this->ViewListCustomer();
                    break;
                case 'add':
                    $this->ViewAddCustomer();
                    break;
                case 'edit':
                    $this->ViewListCustomer();
                    break;
                case 'profile':
                    $this->ViewProfileCustomer();
                    break;
                default:
                    App::$app->LoadError();
            }
        }
    }

    public function ViewListCustomer()
    {
        $this->data['views']['content'] = 'admin/customer/list';
        $this->data['subData']['listCustomer'] = $this->userModel->GetListCustomer();
        $this->RenderView('layouts/adminLayout', $this->data);
    }

    public function ViewAddCustomer()
    {
        $this->data['views']['content'] = 'admin/customer/add';
        $this->data['subData'][] = [];
        $this->RenderView('layouts/adminLayout', $this->data);
    }

    public function ViewProfileCustomer()
    {
        if (!empty($_GET['id'])) {
            $this->data['views']['content'] = 'admin/customer/profile';
            $this->data['subData']['Customer'] = $this->adminModel->GetCustomerById($_GET['id']);
            $this->RenderView('layouts/adminLayout', $this->data);
        } else {
            App::$app->LoadError();
        }
    }

    function SaveCustomer()
    {
        if (!isset($_POST['FirstName']) || $_POST['FirstName'] == "") {
            $this->displayCustomerError("FirstName is Required!", $_POST);
        } else if (!isset($_POST['LastName']) || $_POST['LastName'] == "") {
            $this->displayCustomerError("LastName is Required!", $_POST);
        } else if (!isset($_POST['UserName']) || $_POST['UserName'] == "") {
            $this->displayCustomerError("UserName is Required!", $_POST);
        } else if (!$this->authModel->check_username($_POST['UserName']) && !isset($_POST['id'])) {
            $this->displayCustomerError("UserName existed!", $_POST);
        } else if (!isset($_POST['Password']) || $_POST['Password'] == "") {
            $this->displayCustomerError("Password is Required!", $_POST);
        } else if (!isset($_POST['ConfirmPassword']) || $_POST['ConfirmPassword'] == "") {
            $this->displayCustomerError("Confirm password is Required!", $_POST);
        } else if ($_POST['ConfirmPassword'] != $_POST['Password']) {
            $this->displayCustomerError("Confirm password does not match!", $_POST);
        } else {
            if (isset($_POST['id'])) {
                $_POST['staffId'] = $_POST['id'];
            }

            $result = $this->adminModel->SaveCustomer($_POST);
            if ($result) {
                echo "<script>alert('Save successfully!'); window.location.href = '" . _WEB_ROOT . "/admin/customer?action=list" . "';</script>";
                die;
            } else {
                $errMsg = $_SESSION['error'];
                unset($_SESSION['error']);
                $this->displayCustomerError($errMsg, $_POST);
            }
        }
    }

    function displayCustomerError($msg, $post)
    {
        if (isset($post['id'])) {
            echo "<script>alert('" . $msg . "'); window.location.href = '" . _WEB_ROOT . "/admin/customer?action=profile&id=" . $post['id'] . "';</script>";
        } else {
            echo "<script>alert('" . $msg . "'); window.location.href = '" . _WEB_ROOT . "/admin/customer?action=add" . "';</script>";
        }
    }

    function DeleteCustomer()
    {
        if (isset($_GET['id'])) {
            $result = $this->adminModel->DeleteCustomerById($_GET['id']);
            if ($result) {
                echo "<script>alert('Delete successfully!'); window.location.href = '" . _WEB_ROOT . "/admin/customer?action=list" . "';</script>";
                die;
            } else {
                echo "<script>alert('Delete Failed!'); window.location.href = '" . _WEB_ROOT . "/admin/customer?action=list" . "';</script>";
            }
        } else {
            echo "<script>alert('Delete Failed!'); window.location.href = '" . _WEB_ROOT . "/admin/customer?action=list" . "';</script>";
        }
    }

    //END CUSTOMER




    // Categories

    public function RenderCategories()
    {
        $action = '';
        if (!empty($_GET['action'])) $action = $_GET['action'];

        if ($action == 'list') {
            $this->ViewListCategory();
        } else if ($action == 'edit' && !empty($_GET['id'])) {
            $this->ViewListCategory($_GET['id']);
        } else {
            App::$app->LoadError();
        }
    }


    public function ViewListCategory()
    {
        $this->data['views']['content'] = 'admin/categories/list';
        $this->data['subData']['listCategory'] = $this->adminModel->GetListCategory();
        $this->RenderView('layouts/adminLayout', $this->data);
    }

    public function ViewEditCategory($id)
    {
        $this->data['views']['content'] = 'admin/categories/list';
        $this->data['subData'][] = [];
        $this->RenderView('layouts/adminLayout', $this->data);
    }


    //Products


    public function RenderProduct()
    {


        $action = '';


        if (!empty($_GET['action'])) $action = $_GET['action'];


        if ($action == 'list') {
            $this->ViewProductList();
        } else if ($action == 'add') {
            $this->ViewProductAdd();
        } else if ($action == 'edit' && !empty($_GET['id'])) {
            $this->ViewProductEdit($_GET['id']);
        } else {
            App::$app->LoadError();
        }
    }


    function ViewProductAdd()
    {
        $this->data['views']['content'] = 'admin/products/add';
        $this->data['subData']['category'] = $this->categoryModel->GetProductCategory();
        $this->data['subData']['sub_category'] = $this->categoryModel->GetProductSubCategory();
        $this->RenderView('layouts/adminLayout', $this->data);
    }

    function ViewProductEdit()
    {
        //product sub_category_product sub_imgs_product
        if (!empty($_GET['id'])) {
            $this->data['subData']['product'] = $this->productModel->GetProductById($_GET['id']);;
            $this->data['subData']['sub_category_product'] = $this->productModel->GetSubCategoryProductById($_GET['id']);
            $this->data['subData']['sub_imgs_product'] = $this->productModel->GetSubImgsProduct($_GET['id']);
            $this->data['subData']['category'] = $this->categoryModel->GetProductCategory();
            $this->data['subData']['sub_category'] = $this->categoryModel->GetProductSubCategory();
            $this->data['subData']['storage'] = $this->orderModel->currentAmountOfAProduct($_GET['id']);
            $this->data['views']['content'] = 'admin/products/edit';
            // var_dump($this->productModel->GetSubImgsProduct($_GET['id']));
            // die;
            $this->RenderView('layouts/adminLayout', $this->data);
        } else {
            App::$app->LoadError();
        }
    }

    function AmountOfAProductAtADate()
    {
        if (isset($_POST['product_id']) && isset($_POST['date']) && $_POST['product_id'] != "" && $_POST['date'] != "")
        {
            $product_id = $_POST['product_id'];
            $date = $_POST['date'];
            
            // $customer_id = $_POST['customerId'];
            $result = $this->orderModel->AmountOfAProductAtADate($product_id, $date);
            header('Content-Type: application/json');
            echo json_encode($result);
        } else {
            header('Content-Type: application/json');
            echo json_encode("fail");
        }
    }

    function ViewProductList()
    {
        $products = $this->adminModel->GetListProduct();
        // $total = 0;
        foreach($products as $key => $prod)
        {
            $currentProductAmount = $this->orderModel->currentAmountOfAProduct($prod['Id']);
            // $total += $currentProductAmount;
            $products[$key]['amount'] = $currentProductAmount;
        }

        // $this->data['subData']['total_amount'] = $total;
        $this->data['subData']['listProduct'] = $products;
        $this->data['views']['content'] = 'admin/products/list';
        $this->RenderView('layouts/adminLayout', $this->data);
    }

    //HANDLE
    function GetAllProduct()
    {
        $products = $this->productModel->GetAllProduct();

        header('Content-Type: application/json');
        echo json_encode($products);
    }

    function SaveProduct()
    {
        if (!isset($_POST['Title']) || $_POST['Title'] == "") {
            $this->displayProductError("Flower\'s name is Required!", $_POST);
        } else if (!isset($_POST['ShortDescription']) || $_POST['ShortDescription'] == "") {
            $this->displayProductError("Short description is Required!", $_POST);
        } else if (!isset($_POST['SalePrice']) || $_POST['SalePrice'] == "") {
            $this->displayProductError("SalePrice is Required!", $_POST);
        } else if (!isset($_POST['Price']) || $_POST['Price'] == "") {
            $this->displayProductError("Price is Required!", $_POST);
        } else {
            if (isset($_POST['id'])) {
                $_POST['productId'] = $_POST['id'];
            }

            $countImage = 0;
            $count_files = count($_FILES);
            for ($i = 0; $i < $count_files; $i++)
            {
                if ($_FILES['thumb' . $i]['name'] != "")
                {
                    $countImage += 1;
                }
            }

            if ($countImage > 0) {
                //check imgs
                $thumb_array = array();
                for ($i = 0; $i < $count_files; $i++)
                {
                    ${"thumb".$i} = $this->check_error_img($_FILES['thumb'.$i]);
                    $thumb_array[] = ${"thumb".$i};
                }


                //save product with images
                $result = $this->productModel->SaveProduct($_POST, $thumb_array);
                
                if ($result) {
                    echo "<script>alert('Save successfully!'); window.location.href = '" . _WEB_ROOT . "/admin/product?action=list" . "';</script>";
                    die;
                } else {
                    $errMsg = $_SESSION['error'];
                    unset($_SESSION['error']);
                    $this->displayProductError($errMsg, $_POST);
                }
            } else { //if have no image uploaded
                $result = $this->productModel->SaveProduct($_POST);
                if ($result) {
                    echo "<script>alert('Save successfully!'); window.location.href = '" . _WEB_ROOT . "/admin/product?action=list" . "';</script>";
                } else {
                    $errMsg = $_SESSION['error'];
                    unset($_SESSION['error']);
                    $this->displayProductError($errMsg, $_POST);
                }
            }
        }
    }

    function DeleteProduct()
    {
        if (isset($_GET['id'])) {
            $result = $this->productModel->DeleteProductById($_GET['id']);
            if ($result) {
                echo "<script>alert('Delete successfully!'); window.location.href = '" . _WEB_ROOT . "/admin/product?action=list" . "';</script>";
                die;
            } else {
                echo "<script>alert('Delete Failed!'); window.location.href = '" . _WEB_ROOT . "/admin/product?action=list" . "';</script>";
            }
        } else {
            echo "<script>alert('Delete Failed!'); window.location.href = '" . _WEB_ROOT . "/admin/product?action=list" . "';</script>";
        }
    }

    function check_error_img($img)
    {
        if ($img['name'] == "") return null;
        $img_error = $img['error'];
        if ($img_error !== UPLOAD_ERR_OK) { //check if file cause error
            switch ($img_error) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $this->displayProductError("Image is too large!", $_POST);
                    die;
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $this->displayProductError("Image upload was not completed!", $_POST);
                    die;
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $this->displayProductError("No Image was uploaded!", $_POST);
                    die;
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                case UPLOAD_ERR_CANT_WRITE:
                    $this->displayProductError("Server error, please try again later!", $_POST);
                    die;
                    break;
                default:
                    $this->displayProductError("Unknown error!", $_POST);
                    die;
                    break;
            }
        } else {    //check if file is an image
            $allowed_types = array(IMAGETYPE_JPEG, IMAGETYPE_PNG);
            if (!in_array(exif_imagetype($img['tmp_name']), $allowed_types)) {
                $this->displayProductError("File " . $img['name'] . " is not an image!", $_POST);
                die;
            } else {
            }
        }
        return $img;
    }

    function displayProductError($msg, $post)
    {
        if (isset($post['id'])) {
            echo "<script>alert('" . $msg . "'); window.location.href = '" . _WEB_ROOT . "/admin/product?action=edit&id=" . $post['id'] . "';</script>";
        } else {
            echo "<script>alert('" . $msg . "'); window.location.href = '" . _WEB_ROOT . "/admin/product?action=add" . "';</script>";
        }
    }


    // Order
    public function RenderOrder()
    {


        $action = '';


        if (!empty($_GET['action'])) $action = $_GET['action'];


        if ($action == 'new-order') {
            $this->ViewNewOrder();
        } else if ($action == 'list') {
            $this->ViewAllListOrder();
        } else if ($action == 'detail' && !empty($_GET['id'])) {
            $this->ViewDetailOrder($_GET['id']);
        } else if ($action == 'invoice' && !empty($_GET['id'])) {
            $this->ViewInvoiceOrder($_GET['id']);
        } else {
            App::$app->LoadError();
        }
    }

    public function ViewNewOrder()
    {
        $this->data['subData'] = [];
        $this->data['views']['content'] = 'admin/orders/new';
        $this->RenderView('layouts/adminLayout', $this->data);
    }

    public function ViewAllListOrder()
    {
        $this->data['subData'] = [];
        $this->data['views']['content'] = 'admin/orders/list';

        //order, detail, product
        $this->data['subData']['orders'] = $this->orderModel->GetAllOrder();
        $this->data['subData']['order_details'] = $this->orderModel->GetAllOrderDetail();
        $this->data['subData']['products'] = $this->productModel->GetAllProduct();
        $this->data['subData']['customers'] = $this->userModel->GetListCustomer();

        //subdata address
        $province_json = file_get_contents(_WEB_ROOT . "/public/assets/addresses/tinh_tp.json");
        // Chuyển đổi dữ liệu JSON thành mảng PHP
        $provinces = json_decode($province_json, true);
        // var_dump($provinces);
        // die;
        $this->data['subData']['provinces'] = $provinces;
        //end

        //$this->data['subData']['orders'] = $this->orderModel->getAllOrderToShowToAdmin();
        $this->RenderView('layouts/adminLayout', $this->data);
    }

    public function ViewFilterOrder()
    {
        $status = $_POST['status'];
        $fromDate = isset($_POST['fromDate']) ? $_POST['fromDate'] : "";
        $toDate = isset($_POST['toDate']) ? $_POST['toDate'] : "";
        $province = isset($_POST['province']) ? $_POST['province'] : "";
        $district = isset($_POST['district']) ? $_POST['district'] : "";
        $ward = isset($_POST['ward']) ? $_POST['ward'] : "";
        
        $this->data['subData'] = [];
        $this->data['views']['content'] = 'admin/orders/list';

        //order, detail, product
        $this->data['subData']['orders'] = $this->orderModel->GetAllFilterOrder($status, $fromDate, $toDate, $province, $district, $ward);
        $this->data['subData']['order_details'] = $this->orderModel->GetAllOrderDetail();
        $this->data['subData']['products'] = $this->productModel->GetAllProduct();
        $this->data['subData']['customers'] = $this->userModel->GetListCustomer();


        //subdata address
        $province_json = file_get_contents(_WEB_ROOT . "/public/assets/addresses/tinh_tp.json");
        // Chuyển đổi dữ liệu JSON thành mảng PHP
        $provinces = json_decode($province_json, true);
        // var_dump($provinces);
        // die;
        $this->data['subData']['provinces'] = $provinces;
        //end

        $arrInfoFilter = [
            "status" => $status,
            "fromDate" => $fromDate,
            "toDate" => $toDate,
            "province" => $province,
            "district" => $district,
            "ward" => $ward
        ];
        $this->data['subData']['arrInfoFilter'] = $arrInfoFilter;
        //$this->data['subData']['orders'] = $this->orderModel->getAllOrderToShowToAdmin();
        $this->RenderView('layouts/adminLayout', $this->data);
    }

    public function ViewDetailOrder($id)
    {
        $this->data['subData'] = [];
        $this->data['views']['content'] = 'admin/orders/detail';
        $this->RenderView('layouts/adminLayout', $this->data);
    }
    public function ViewInvoiceOrder($id)
    {
        $this->data['subData'] = [];
        $this->data['views']['content'] = 'admin/orders/invoice';
        $this->RenderView('layouts/adminLayout', $this->data);
    }

    // Import
    public function RenderImport()
    {
        $action = '';

        if (!empty($_GET['action'])) $action = $_GET['action'];


        if ($action == 'import') {
            $this->ViewNewImport();
        } else if ($action == 'list') {
            $this->ViewAllListImport();
        } else if ($action == 'detail' && !empty($_GET['id'])) {
            $this->ViewDetailImport($_GET['id']);
        } else {
            App::$app->LoadError();
        }
    }

    public function ViewNewImport()
    {
        $this->data['subData'] = [];
        $this->data['views']['content'] = 'admin/imports/new';

        $products = $this->productModel->GetAllProduct();
        $this->data['subData']['products'] = $products;
        $this->RenderView('layouts/adminLayout', $this->data);
    }

    public function ViewAllListImport()
    {
        $this->data['subData'] = [];
        $this->data['views']['content'] = 'admin/imports/list';

        $products = $this->productModel->GetAllProduct();
        $this->data['subData']['products'] = $products;

        $importInvoice = $this->importModel->GetAllImportInvoice();
        $importInvoiceDetail = $this->importModel->GetAllImportInvoiceDetail();
        $this->data['subData']['importInvoices'] = $importInvoice;
        $this->data['subData']['importInvoiceDetails'] = $importInvoiceDetail;
        
        $this->RenderView('layouts/adminLayout', $this->data);
    }
    public function ViewDetailImport($id)
    {
        $this->data['subData'] = [];
        $this->data['views']['content'] = 'admin/imports/detail';

        

        $this->RenderView('layouts/adminLayout', $this->data);
    }

    //HANDLE IMPORT
    public function handleImportProducts()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {


            $product_ids = $_POST['product_id'];
            $product_amounts = $_POST['amount'];
            $product_values = $_POST['value'];

            $totalValue = 0;
            $totalAmount = 0;
            foreach($product_ids as $key => $name) {
                $totalValue += $product_values[$key] * $product_amounts[$key];
                $totalAmount += $product_amounts[$key];
            }
            $invoice_id = $this->importModel->CreateImportInvoice($totalAmount, $totalValue);
            
            foreach($product_ids as $key => $name) {
                $this->importModel->CreateImportInvoiceDetail($invoice_id, $product_ids[$key], $product_amounts[$key], $product_values[$key]);
            }
            // Hiển thị thông báo thành công hoặc chuyển hướng đến trang khác
            echo "<script>alert('Save successfully!'); window.location.href = '" . _WEB_ROOT . "/admin/import?action=list" . "';</script>";
        }
    }


    // Review

    public function RenderReview()
    {


        $action = '';


        if (!empty($_GET['action'])) $action = $_GET['action'];


        if ($action == 'list') {
            $this->ViewReview();
        } else if ($action == 'detail') {
        } else {
            App::$app->LoadError();
        }
    }
    public function ViewReview()
    {
        $this->data['subData'] = [];
        $this->data['views']['content'] = 'admin/reviews/review';
        $this->RenderView('layouts/adminLayout', $this->data);
    }
    public function ViewReviewDetail()
    {
    }


    //Brand

}
