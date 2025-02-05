<?php

class Page extends Controller{

    public $pageModel,$data = [];
    public $shoppingCartModel;
    function __construct()
    {
        $this->pageModel = $this->CreateModel('PageModel');
        $this->shoppingCartModel = $this->CreateModel('ShoppingCartModel');

        $this->data['header']['category']          = $this->pageModel->GetProductCategory();
        $this->data['header']['subCategory']       = $this->pageModel->GetProductSubCategory();
        if (isset($_SESSION['currentUser']['username']) && $_SESSION['currentUser']['username'] != "")
        {
            $this->data['header']['cart_count']       = $this->shoppingCartModel->GetCartCountByUsername($_SESSION['currentUser']['username']);
        } else {
            $this->data['header']['cart_count']       = 0;
        }
        $this->data['footer'][] = [];
        $this->shoppingCartModel = $this->CreateModel('ShoppingCartModel');

        $productFromCart = $this->shoppingCartModel->getProductCartByUsername($_SESSION['currentUser']['username']);
        if (!empty($productFromCart))
        {
            $this->data['slideCart']['productFromCart'] = $productFromCart;
        } else {
            $this->data['slideCart']['productFromCart'] = [0];
        }
    }
    function AboutUs(){
        $this->data['views'] = 'pages/about';
        $this->data['subData'][] = [];
        $this->RenderView('layouts/clientLayout',$this->data);
    }
    function Portfolio(){
        $this->data['views'] = 'pages/portfolio';
        $this->data['subData'][] = [];
        $this->RenderView('layouts/clientLayout',$this->data);

    }
    function PortfolioDetail(){
        $this->data['views'] = 'pages/portfolio-detail';
        $this->data['subData'][] = [];
        $this->RenderView('layouts/clientLayout',$this->data);

    }
    function GoogleMapLocation(){
        $this->data['views'] = 'pages/google-map';
        $this->data['subData'][] = [];
        $this->RenderView('layouts/clientLayout',$this->data);
    }
    function Contact(){
        $this->data['views'] = 'pages/contact';
        $this->data['subData'][] = [];
        $this->RenderView('layouts/clientLayout',$this->data);

    }
    function CommingSoon(){
        $this->data['views'] = 'pages/comming-soon';
        $this->data['subData'][] = [];
        $this->RenderView('layouts/clientLayout',$this->data);
    }
    function News(){
        $this->data['views'] = 'pages/news';
        $this->data['subData'][] = [];
        $this->RenderView('layouts/clientLayout',$this->data);
    }
    function NewDetail(){
        $this->data['views'] = 'pages/new-details';
        $this->data['subData'][] = [];
        $this->RenderView('layouts/clientLayout',$this->data);

    }
}