<?php
    class AdminModel extends Model{
        function TableFill()
        {
            
        }
        function FieldFill()
        {
            
        }

        function GetListProduct(){
            $data = $this->db->Query("SELECT * FROM fiama.product")->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        function GetListEmployee(){
            $data = $this->db->Query("SELECT * FROM fiama.employee")->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        function GetListCategory(){
            $data = $this->db->Query("SELECT * FROM fiama.categories")->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        //INSERT AND UPDATE EMPLOYEE
        function SaveEmployee($postData)
        {
            $_SESSION['error'] = "";
            $arr = [
                "LastName" => $postData['LastName'],
                "FirstName" => $postData['FirstName'],
                "Username" => $postData['UserName'],
                "Password" => password_hash($postData['Password'], PASSWORD_BCRYPT),
                "Position" => $postData['Position'],
                "CreatedDate" => date("Y-m-d"),
                "Status" => 1,
                "Phone" => $postData['Phone'] ? $postData['Phone'] : "",
                "Email" => $postData['Email'] ? $postData['Email'] : "",
            ];

            if (isset($postData['staffId']))    //edit
            {
                $isEmpExist = $this->db->Query("select * from fiama.employee where id=" . $postData['staffId'])->fetchAll(PDO::FETCH_ASSOC);
                if (!empty($isEmpExist))
                {
                    $data = $this->db->Update("fiama.employee", $arr, "Id=" . $postData['staffId'] );
                    if ($data) 
                    {
                        return true;
                    } else {
                        $_SESSION['error'] = "Save error!";
                        return false;
                    }
                } else {
                    $_SESSION['error'] = "Employee doesn't exist!";
                    return false;
                }
            } else {    //create
                $data = $this->db->Insert("fiama.employee", $arr);
                if ($data) {
                    return true;
                } else {
                    $_SESSION['error'] = "Save error!";
                    return false;
                }
            }
        }

        function GetEmployeeById($id)
        {
            $data = $this->db->Query("SELECT * FROM fiama.employee WHERE Id = " . $id)->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }


        function DeleteEmployeeById($id)
        {
            $result = $this->db->Delete("employee", "Id = " . $id);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        //END EMPLOYEE

        //CUSTOMER

        function GetCustomerById($id)
        {
            $data = $this->db->Query("SELECT * FROM fiama.customer WHERE Id = " . $id)->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        function SaveCustomer($postData)
        {
            $_SESSION['error'] = "";
            $arr = [
                "LastName" => $postData['LastName'],
                "FirstName" => $postData['FirstName'],
                "UserName" => $postData['UserName'],
                "Password" => $postData['Password'],
                "CreatedDate" => date("Y-m-d"),
                "Status" => 1,
                "Phone" => $postData['Phone'] ? $postData['Phone'] : "",
                "Email" => $postData['Email'] ? $postData['Email'] : "",
            ];

            if (isset($postData['customerId']))    //edit
            {
                $isCusExist = $this->GetCustomerById($postData['customerId']);
                if (!empty($isCusExist))
                {
                    $data = $this->db->Update("fiama.employee", $arr, "Id=" . $postData['customerId'] );
                    if ($data) 
                    {
                        return true;
                    } else {
                        $_SESSION['error'] = "Save error!";
                        return false;
                    }
                } else {
                    $_SESSION['error'] = "This Customer doesn't exist!";
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

        function DeleteCustomerById($id)
        {
            $result = $this->db->Delete("customer", "Id = " . $id);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        //END CUSTOMER

        
    }
?>