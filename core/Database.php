<?php
class Database
{
    private $__conn;
    private $__db;
    function __construct()
    {
        global $db_config;
        $this->__db = $db_config;
        $this->__conn = Connection::getInstance($db_config);
    }

    function Query($sql){
            $statement = $this->__conn->prepare($sql);
            $statement->execute();
            
            return $statement;
    }

    function Delete($table,$condition = ''){
        if(!empty($condition))
            $sql = 'DELETE FROM '.$this->__db['db']. "." .$table.' WHERE '.$condition;
        else
            $sql = 'DELETE FROM '.$this->__db. "." .$table; 
            // var_dump($sql);
            // die;
        $status = $this->Query($sql);
        if($status)
            return true;
        return false;
    }
    function Insert($table,$data){

        if(!empty($data)){
            $fieldStr = '';
            $valueStr = '';
            foreach($data as $key => $value){
                $fieldStr.=$key . ",";
                $valueStr.="'".$value."',";
            }
            $fieldStr = rtrim($fieldStr,',');
            $valueStr = rtrim($valueStr,',');

            $sql = "INSERT INTO $table ($fieldStr) VALUES ($valueStr)";
            // var_dump($sql);
            // die;
            $status = $this->Query($sql);
            if($status){
                return true;
            }
            return false;
        }
        return false;
    }

    //return last auto id that's just inserted
    function InsertButReturnProdId($table,$data){
        if(!empty($data)){
            $fieldStr = '';
            $valueStr = '';
            foreach($data as $key => $value){
                $fieldStr.=$key . ",";
                $valueStr.="'".$value."',";
            }
            $fieldStr = rtrim($fieldStr,',');
            $valueStr = rtrim($valueStr,',');

            $sql = "INSERT INTO $table ($fieldStr) VALUES ($valueStr)";
            // var_dump($sql);
            // die;
            $status = $this->Query($sql);
            if($status){
                $prod_id = $this->__conn->lastInsertId();
                return $prod_id;
            }
            return false;
        }
        return false;
    }
    
    function Update($table,$data,$condition =''){
        if(!empty($data)){
            $updateStr = '';
            foreach($data as $key => $value){
                $updateStr.="$key='$value',";
            }
            $updateStr = rtrim($updateStr,',');
            if(!empty($condition)){
                $sql = "UPDATE $table set $updateStr WHERE $condition";
            }else {
                $sql = "UPDATE $table SET $updateStr";
            }
            $status = $this->Query($sql);
            if($status){
                return true;
            }
            return false;
        }
    }
}
