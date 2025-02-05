<?php

class App {
    private $__controller;
    private $__action;
    private $__params; 
    private $__routes;
    public static $app;

    function __construct()
    {
        if (!isset($_SESSION['currentUser']['username']))
        {
            $_SESSION['currentUser']['username'] = "";
        }
        self::$app = $this;
        global $config;
        $this->__routes = new Route();
        $this->__controller = 'home';
        $this->__action = 'index';
        $this->__params = [];

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->HandleURL();
    }
    function GetURL(){
        if(!empty($_SERVER['PATH_INFO']))
            return $_SERVER['PATH_INFO'];
        else 
            return '/';
    }
    public function HandleURL(){
        $url = $this->GetURL();

        $url = $this->__routes->HandleRoute($url);
        $urlArr = array_values(array_filter(explode('/',$url)));

        //handle controller
        if(!empty($urlArr[0])){
            $this->__controller = ucfirst($urlArr[0]);
        }else {
            $this->__controller = ucfirst($this->__controller);
        }
        if(file_exists('./app/controllers/'.$this->__controller.'.php')){
            require_once './app/controllers/'.$this->__controller.'.php';
            if(class_exists($this->__controller))
                $this->__controller = new $this->__controller();
            else 
            $this->LoadError();
            unset($urlArr[0]);
        }
        else {
            $this->LoadError();
        }
        // handle action
        if(!empty($urlArr[1])){
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }

        //handle params
        $this->__params = array_values($urlArr);

        if(method_exists($this->__controller,$this->__action))
            call_user_func_array([$this->__controller,$this->__action],$this->__params);
        else 
            $this->LoadError();

    }

    public function LoadError($name = '404',$data = []){
        $controller = new Controller();
        $data['views'] = 'errors/404';
        $data['subData'] = [];

        $data['header'] = [];
        $data['slideCart']['productFromCart'] = [0];
        $controller->RenderView('layouts/clientLayout',$data);
    }
    
}

?>