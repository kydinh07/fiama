<?php


define('_DIR_ROOT',str_replace('\\','/', __DIR__));
define('REAL_PATH', realpath(dirname(__FILE__)));
// xử lý biến http root
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')
    $web_root = 'https://'.$_SERVER['HTTP_HOST'];
else 
    $web_root = 'http://'.$_SERVER['HTTP_HOST'];
$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),'',strtolower(_DIR_ROOT));
$web_root = $web_root.$folder;

define('_WEB_ROOT',$web_root);

require_once './configs/database.php';
require_once './configs/routes.php';
require_once './core/Route.php';

require_once './core/Route.php';
require_once './app/App.php';
if(!empty($config['database'])){
    $db_config = array_filter($config['database']);

    if(!empty($db_config)){
        require_once './core/Connection.php';
        require_once './core/Database.php';       

        $db = new Database();
        $listRoute = $db->Query("SELECT Url,Rewrite FROM fiama.routes")->fetchAll(PDO::FETCH_ASSOC);

        global $routes;
        foreach($listRoute as $Rewrite){
            $routes[$Rewrite['Url']] = $Rewrite['Rewrite'];
        }
    }
}

require_once './core/Model.php';



require_once './core/Controller.php';  // Load base controller