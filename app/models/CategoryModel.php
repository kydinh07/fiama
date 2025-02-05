<?php
    class CategoryModel extends Model
    {
        function TableFill()
        {
        }
        function FieldFill()
        {
        }

        public function GetProductCategory(){
            $data = $this->db->Query("SELECT * FROM fiama.category")->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        
        public function GetProductSubCategory(){
            $data = $this->db->Query("SELECT * FROM fiama.sub_category")->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }
?>
