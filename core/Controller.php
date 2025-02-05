<?php
// Author     : KyDing
// Description: Class Base Controller
// Date       : 06/03/2023
class Controller {

    // Model initialization function
    public function CreateModel($modelName){
        if(file_exists('./app/models/'.$modelName.'.php'))
           require_once './app/models/'.$modelName.'.php';
        if(class_exists($modelName)){
            $model = new $modelName();
            return $model; // Return model class
        }
        return false; 
    }


    public function RenderView($view,$data = []){
        extract($data);
        if(file_exists('./app/views/'.$view.'.php'))
        require_once './app/views/'.$view.'.php';
    }
}