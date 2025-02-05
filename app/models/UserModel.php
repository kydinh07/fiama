<?php

class UserModel  extends Model{

    public function TableFill()
    {
        
    }
    public function FieldFill()
    {
        
    }
    public function GetListCustomer(){
        $data = $this->db->Query("SELECT * FROM fiama.customer")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function GetCustomerByUsername($username) 
    {
        $data = $this->db->Query("SELECT * FROM fiama.customer WHERE UserName='" . $username . "'")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function GetEmployeeByUsername($username) 
    {
        $data = $this->db->Query("SELECT * FROM fiama.employee WHERE UserName='" . $username . "'")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //INSERT AND UPDATE EMPLOYEE
    function SaveCustomer($postData)
    {
        $_SESSION['error'] = "";
        $arr = [
            "LastName" => $postData['LastName'],
            "FirstName" => $postData['FirstName'],
            "Status" => 1,
            "Phone" => isset($postData['Phone']) ? $postData['Phone'] : "",
            "Email" => isset($postData['Email']) ? $postData['Email'] : "",
            "Address" => isset($postData['Address']) ? $postData['Address'] : "",
        ];

        if (isset($postData['Password']) && $postData['Password'] == true)
        {
            $arr["Password"] = password_hash($postData['NewPassword'], PASSWORD_BCRYPT);
        }

        if (isset($postData['customerId']))    //edit
        {
            $isCusExist = $this->db->Query("select * from fiama.customer where id=" . $postData['customerId'])->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($isCusExist))
            {
                $data = $this->db->Update("fiama.customer", $arr, "Id=" . $postData['customerId'] );
                if ($data) 
                {
                    return true;
                } else {
                    $_SESSION['error'] = "Save error!";
                    return false;
                }
            } else {
                $_SESSION['error'] = "Customer doesn't exist!";
                return false;
            }
        } else {    //create
            $data = $this->db->Insert("fiama.customer", $arr);
            if ($data) {
                return true;
            } else {
                $_SESSION['error'] = "Save error!";
                return false;
            }
        }
    }

    public function disableCustomer($customer_id)
    {
        $arr = [
            "Status" => 0
        ];

        $data = $this->db->Update("fiama.customer", $arr, "Id=" . $customer_id);
        return $data;
    }

    public function enableCustomer($customer_id)
    {
        $arr = [
            "Status" => 1
        ];

        $data = $this->db->Update("fiama.customer", $arr, "Id=" . $customer_id);
        return $data;
    }

    public function disableEmployee($employee_id)
    {
        if (isset($_SESSION['currentUser']['username']) && $_SESSION['currentUser']['username'] != "")
        {
            $employee = $this->GetEmployeeByUsername($_SESSION['currentUser']['username']);
            if ($employee[0]['Id'] == $employee_id) return false;
        } else {
            return false;
        }
        $arr = [
            "Status" => 0
        ];

        $data = $this->db->Update("fiama.employee", $arr, "Id=" . $employee_id);
        return $data;
    }

    public function enableEmployee($employee_id)
    {
        $arr = [
            "Status" => 1
        ];

        $data = $this->db->Update("fiama.employee", $arr, "Id=" . $employee_id);
        return $data;
    }

    public function GetCustomerAddressById($id)
    {
        $data = $this->db->Query("SELECT * FROM fiama.customer_address WHERE customer_id='" . $id . "'")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function SaveAddress($postData)
    {
        $_SESSION['error'] = "";
        $arr = [
            "customer_id" => $postData['id'],
            "province" => $postData['province'],
            "district" => $postData['district'],
            "ward" => $postData['ward'],
            "detail" => $postData['detail'],
        ];

        $data = $this->db->Insert("fiama.customer_address", $arr);
        if ($data) {
            return true;
        } else {
            $_SESSION['error'] = "Save customer's address error!";
            return false;
        }
    }

    public function DeleteAddress($id)
    {
        $result = $this->db->Delete("customer_address", "id = " . $id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}