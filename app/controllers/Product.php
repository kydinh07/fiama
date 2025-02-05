<?php

class Product extends Controller
{
    public $productModel;
    public $data = [];
    public $categoryModel;
    public $shoppingCartModel;

    function __construct()
    {
        $this->productModel = $this->CreateModel('ProductModel');
        $this->shoppingCartModel = $this->CreateModel('ShoppingCartModel');
        $this->data['header']['category']          = $this->productModel->GetProductCategory();
        $this->data['header']['subCategory']       = $this->productModel->GetProductSubCategory();
        if (isset($_SESSION['currentUser']['username']) && $_SESSION['currentUser']['username'] != "") {
            $this->data['header']['cart_count']       = $this->shoppingCartModel->GetCartCountByUsername($_SESSION['currentUser']['username']);
        } else {
            $this->data['header']['cart_count']       = 0;
        }
        $this->categoryModel = $this->CreateModel('CategoryModel');

        $productFromCart = $this->shoppingCartModel->getProductCartByUsername($_SESSION['currentUser']['username']);
        if (!is_null($productFromCart) && !empty($productFromCart)) {
            $this->data['slideCart']['productFromCart'] = $productFromCart;
        } else {
            $this->data['slideCart']['productFromCart'] = [0];
        }
        //data footer

        $this->data['footer'][] = [];
    }


    function index()
    {
        $data = $this->productModel->GetList();

        $this->RenderView('products/list');
    }


    function swap(&$arr, $i, $j)
    {
        // Lưu giá trị của phần tử thứ i vào biến tạm
        $temp = $arr[$i];
        // Gán giá trị của phần tử thứ j cho phần tử thứ i
        $arr[$i] = $arr[$j];
        // Gán giá trị của biến tạm cho phần tử thứ j
        $arr[$j] = $temp;
    }


    function defaultSort($listProduct)
    {
        for ($i = 0; $i < count($listProduct) - 1; $i++) {
            for ($j = $i + 1; $j < count($listProduct); $j++) {
                if ($listProduct[$i]['Id'] > $listProduct[$j]['Id']) {
                    $this->swap($listProduct, $i, $j);
                }
            }
        }
        return $listProduct;
    }

    function lowToHighSort($listProduct)
    {
        for ($i = 0; $i < count($listProduct) - 1; $i++) {
            for ($j = $i + 1; $j < count($listProduct); $j++) {
                if ($listProduct[$i]['Price'] > $listProduct[$j]['Price']) {
                    $this->swap($listProduct, $i, $j);
                }
            }
        }
        return $listProduct;
    }
    function highToLowSort($listProduct)
    {
        for ($i = 0; $i < count($listProduct) - 1; $i++) {
            for ($j = $i + 1; $j < count($listProduct); $j++) {
                if ($listProduct[$i]['Price'] < $listProduct[$j]['Price']) {
                    $this->swap($listProduct, $i, $j);
                }
            }
        }
        return $listProduct;
    }

    function filterProductByPrice($listProduct, $low, $high)
    {
        $low = (int)$low;
        $high = (int)$high;
        $result = array(); // khởi tạo một mảng rỗng để lưu kết quả
        foreach ($listProduct as $item) { // duyệt qua mỗi phần tử của mảng đầu vào
            if ($item['Price'] >= $low  &&   $item['Price'] <= $high) { // nếu khóa của phần tử chia hết cho 2
                $result[] = $item; // thêm giá trị của phần tử vào mảng kết quả
            }
        }
        return $result; // trả về mảng kết quả
    }






    function list($idCategory = 0)
    {

        if (!empty($_GET['search'])) {
            $listProduct = $this->productModel->GetSearchProduct($_GET['search']);
        } else {
            $listProduct = $this->productModel->GetProductByCategory($idCategory);

            $temp = array(); // Khởi tạo một mảng tạm thời để lưu trữ các phần tử đã duyệt qua
            foreach ($listProduct as $item) {
                if (!isset($temp[$item['Id']])) { // Nếu phần tử chưa được duyệt qua
                    $temp[$item['Id']] = $item; // Lưu phần tử vào mảng tạm thời
                }
            }
            $listProduct = array_values($temp); // Chuyển mảng tạm thời thành mảng kết quả và duy trì chỉ số liên tục
        }
        if (!empty($_GET['low']) && !empty($_GET['high'])) {
            $listProduct = $this->filterProductByPrice($listProduct, $_GET['low'], $_GET['high']);
        }



        $category = $this->productModel->GetProCategory($idCategory);
        $pageCount = $this->PageCount($listProduct);
        $listCategory = $this->productModel->GetListCategory();

        // filter value here: color,price,size,sort





        if (!empty($_GET['sort'])) {
            $sortValue = $_GET['sort'];

            switch ($sortValue) {
                case '1':
                    $listProduct = $this->defaultSort($listProduct);
                    break;
                case '2':

                    break;
                case '3':

                    break;
                case '4':
                    $listProduct = $this->lowToHighSort($listProduct);


                    break;
                case '5':
                    $listProduct = $this->highToLowSort($listProduct);
                    break;
            }
        }



        // filter value end
        $this->data['subData']['category'] = $category;
        $this->data['subData']['pageCount'] = $pageCount;
        $this->data['subData']['listCategory'] = $listCategory;

        if (!empty($_GET['page'])) {
            $page = $_GET['page'];
            if (is_numeric($page)) {
                if ($page > $pageCount) {
                    App::$app->LoadError();
                } else {
                    $this->data['subData']['pageActive'] = $page;
                    $this->data['subData']['listProduct'] = ($page == $pageCount) ? array_slice($listProduct, ($page - 1) * 9, sizeof($listProduct)) : array_slice($listProduct, ($page - 1) * 9, 9);

                    $this->data['subData']['show'] = ($page == $pageCount) ? sizeof($listProduct) - ($page - 1) * 9 : 9;
                    $this->data['subData']['subShow'] = sizeof($listProduct);
                }
            } else {
                App::$app->LoadError();
            }
        } else {
            $this->data['subData']['pageActive'] = 1;
            $this->data['subData']['listProduct'] = array_slice($listProduct, 0, 9);
            $this->data['subData']['show'] = sizeof($listProduct) == 0 ? 0 : 9;
            $this->data['subData']['subShow'] = sizeof($listProduct);
        }




        if (!empty($_GET['search'])) {
            $this->data['subData']['search'] = $_GET['search'];
            $this->data['subData']['pageTitle'] = 'search';
        } else {
            $this->data['subData']['search'] = '';
            if ($idCategory != 0) {

                $this->data['subData']['pageTitle'] = $this->productModel->GetProCategory($idCategory)[0]['Title'];
            } else {
                $this->data['subData']['pageTitle'] = "Tất Cả Sản Phẩm";
            }
        }



        $this->data['views'] = 'products/list';
        $this->RenderView('layouts/clientLayout', $this->data);
    }
    function detail()
    {
        // $product =  $this->productModel->GetProduct($strPath)[0];
        $product = $this->productModel->GetProductById($_GET['prodId']);
        $product = $product[0];
        $this->data['subData']['pageTitle'] = $product['Title'];
        $this->data['views'] = 'products/detail';
        $this->data['subData']['product'] = $product;
        $this->data['subData']['relatedProduct'] = $this->productModel->GetRelatedProduct();

        $this->data['subData']['sub_category_product'] = $this->productModel->GetSubCategoryProductById($_GET['prodId']);
        $this->data['subData']['sub_imgs_product'] = $this->productModel->GetSubImgsProduct($_GET['prodId']);
        $this->data['subData']['category'] = $this->categoryModel->GetProductCategory();
        $this->data['subData']['sub_category'] = $this->categoryModel->GetProductSubCategory();

        $this->RenderView('layouts/clientLayout', $this->data);
    }


    function PageCount($arr)
    {
        if (sizeof($arr) % 9 == 0)
            return sizeof($arr) / 9;
        else
            return (int)(sizeof($arr) / 9) + 1;
    }

    function convert_name($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
        $str = preg_replace("/( )/", '-', $str);
        return $str;
    }
}
