<?php
class Home extends Controller {
    public $homeModel;
    public $shoppingCartModel;
    private $data = [];
    public function __construct()
    {
        $this->homeModel = $this->CreateModel('HomeModel');
        $this->shoppingCartModel = $this->CreateModel('ShoppingCartModel');

        if (isset($_SESSION['currentUser']['username']))
        {
            $productFromCart = $this->shoppingCartModel->getProductCartByUsername($_SESSION['currentUser']['username']);
            if (!empty($productFromCart))
            {
                $this->data['slideCart']['productFromCart'] = $productFromCart;
            } else {
                $this->data['slideCart']['productFromCart'] = [0];
            }
        } else {
            $this->data['slideCart']['productFromCart'] = [0];
        }
        
        
    }
    public function index(){
        $authModel = $this->CreateModel("AuthModel");
        if ($authModel->check_logged_in_employee()) {
            $authModel->logout();
        }
        $this->data['subData']['pageTitle'] = 'Fiama';
        $this->data['views'] = 'home/index';
        $this->data['subData']['newArrivalItem']   = $this->homeModel->GetNewArrivalItem();
        $this->data['subData']['promotion']        = $this->homeModel->GetPromotion();
        $this->data['subData']['promotionProduct'] = $this->homeModel->GetPromotionProduct();
        $this->data['subData']['topProduct']       = $this->homeModel->GetTopProduct();
        $this->data['subData']['news']             = $this->homeModel->GetNews();

        //data header
        $this->data['header']['category']          = $this->homeModel->GetProductCategory();
        $this->data['header']['subCategory']       = $this->homeModel->GetProductSubCategory();
        if (isset($_SESSION['currentUser']['username']) && $_SESSION['currentUser']['username'] != "")
        {
            $this->data['header']['cart_count']       = $this->shoppingCartModel->GetCartCountByUsername($_SESSION['currentUser']['username']);
        } else {
            $this->data['header']['cart_count']       = 0;
        }

        //data footer

        $this->data['footer'][] = [];

        $this->RenderView('layouts/clientLayout',$this->data);
        
    }

}