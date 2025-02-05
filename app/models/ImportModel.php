<?php

class ImportModel  extends Model{

    public function TableFill()
    {
        
    }
    public function FieldFill()
    {
        
    }
    

    public function CreateImportInvoice($amount, $totalValue)
    {
        $arr = [
            "date" => date("Y-m-d"),
            "amount" => $amount,
            "total_value" => $totalValue
        ];

        $id = $this->db->InsertButReturnProdId("fiama.import_invoice", $arr);
        return $id;
    }

    public function GetImportInvoiceDetailById($import_invoice_id, $product_id)
    {
        $data = $this->db->Query("SELECT * FROM fiama.import_invoice_detail WHERE import_invoice_id=" . $import_invoice_id . " AND product_id=" . $product_id)->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function CreateImportInvoiceDetail($import_invoice_id, $product_id, $amount, $value)
    {
        $isExist = $this->GetImportInvoiceDetailById($import_invoice_id, $product_id);
        if (!empty($isExist)) //update
        {
            $arr = [
                "amount" => $isExist[0]['amount'] + $amount,
                "value" => ($isExist[0]['value'] + $value)/2
            ];
            $this->db->Update("fiama.import_invoice_detail", $arr, "import_invoice_id=" . $import_invoice_id . " AND product_id=" . $product_id );
        } else { //create
            $arr = [
                "import_invoice_id" => $import_invoice_id,
                "product_id" => $product_id,
                "amount" => $amount,
                "value" => $value
            ];
    
            $this->db->Insert("fiama.import_invoice_detail", $arr);
        }
    }

    public function GetAllImportInvoice()
    {
        $data = $this->db->Query("SELECT * FROM fiama.import_invoice")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function GetAllImportInvoiceDetail()
    {
        $data = $this->db->Query("SELECT * FROM fiama.import_invoice_detail")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function changeImportDetail($importInvoiceId, $productId, $amount, $value) {
        $arr = [
            "amount" => $amount,
            "value" => $value
        ];

        $data = $this->db->Update("fiama.import_invoice_detail", $arr, "import_invoice_id=" . $importInvoiceId . " AND product_id=" . $productId);
        if ($data)
        {
            $data = $this->updateDateImportInvoice($importInvoiceId);
            if (!$data)
            {
                return false;
            }
        }
        return $data;
    }

    public function updateDateImportInvoice($importInvoiceId) {
        $arr = [
            "date" => date("Y-m-d")
        ];

        $data = $this->db->Update("fiama.import_invoice", $arr, "id=" . $importInvoiceId);
        return $data;
    }
}