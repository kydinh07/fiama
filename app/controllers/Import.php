<?php
class Import extends Controller
{

    public $importModel;
    public $orderModel;

    function __construct()
    {
        $this->importModel = $this->CreateModel('ImportModel');
        $this->orderModel = $this->CreateModel('OrderModel');
    }

    public function changeImportDetail()
    {
        try {
            $response['msg'] = "fail";
            //receive data
            $value = $_POST['value'];
            $amount = $_POST['amount'];
            $productId = $_POST['productId'];
            $importInvoiceId = $_POST['importInvoiceId'];

            if (!isset($importInvoiceId) || $importInvoiceId == "" || !isset($value) || $value == "" || !isset($amount) || $amount == "" || !isset($productId) || $productId == "") {
                
            } else {
                //check
                $currentProductAmount = $this->orderModel->currentAmountOfAProduct($productId);
                $invoice_detail = $this->importModel->GetImportInvoiceDetailById($importInvoiceId, $productId);
                $invoice_detail_amount = $invoice_detail[0]['amount'];

                

                if ($invoice_detail_amount > $amount && (($currentProductAmount - ($invoice_detail_amount - $amount)) < 0))
                {
                    $response['msg'] = "Số lượng thấp hơn số lượng đã bán";
                } else {
                    $result = $this->importModel->changeImportDetail($importInvoiceId, $productId, $amount, $value);
                    if ($result)
                    {
                        $response['msg'] = "pass";
                    }
                }
            }

            // Trả về dữ liệu dưới dạng JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        } catch (Exception $e) {
            $response['msg'] = $e->getMessage();
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}
