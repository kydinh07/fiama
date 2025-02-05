<?php

// Base Model
abstract class Model extends Database {
    protected $db,$tablename;
    function __construct()
    {
        $this->db = new Database();
    }
    abstract function TableFill();
    abstract function FieldFill();


    public function GetProductCategory(){
        $data = $this->db->Query("SELECT * FROM fiama.category")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    
    public function GetProductSubCategory(){
        $data = $this->db->Query("SELECT * FROM fiama.sub_category")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // Get all record
    public function Get(){
        $tablename = $this->TableFill();
        $fieldSelect = $this->FieldFill();
        if(empty($fieldSelect))
            $fieldSelect = '*';
        $sql = "SELECT $fieldSelect FROM $tablename";
        $query = $this->db->Query($sql);
        if(!empty($query))
            return $query->fetchAll(PDO::FETCH_ASSOC);
        return false;
    }

    // Get first record
    public function First(){
        $tablename = $this->TableFill();
        $fieldSelect = $this->FieldFill();
        if(empty($fieldSelect))
        $fieldSelect = '*';
        $sql = "SELECT TOP 1 $fieldSelect FROM $tablename";
        $query = $this->db->Query($sql);
        if(!empty($query))
            return $query->fetchAll(PDO::FETCH_ASSOC);
        return false;
        
    }


}

?>