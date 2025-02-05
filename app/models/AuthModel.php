<?php

class AuthModel extends Model
{
    function TableFill()
    {
            
    }
    function FieldFill()
    {
            
    }

    function login($POST)
    {
        $_SESSION['error'] = "";
        if (isset($POST['username']) && isset($POST['password']))
        {
            $username = $POST['username'];
            $password = $POST['password'];

            //$query = "select * from fiama.customer where username = '" . $username . "' && password = '" . $password . "' limit 1";
            $query = "select * from fiama.customer where username = '" . $username . "' limit 1";
            $data = $this->db->Query($query)->fetchAll(PDO::FETCH_ASSOC);
            
            // var_dump($data);
            // die;
            if (!empty($data) && password_verify($password, $data[0]['Password']))
            {
                if ($data[0]['Status'] == 0) {
                    $_SESSION['error'] = "Your account is disable!";
                    return;
                }
                //log in as a customer
                $this->setCustomerSession($data);
                $this->redirectTo("/Home");
                return;
            } else {
                $query = "select * from fiama.employee where username = '" . $username . "' limit 1";
                $data = $this->db->Query($query)->fetchAll(PDO::FETCH_ASSOC);
                
                if (!empty($data) && password_verify($password, $data[0]['Password']))
                {
                    if ($data[0]['Status'] == 0) {
                        $_SESSION['error'] = "Your account is disable!";
                        return;
                    }
                    //log in as an employee
                    $this->setEmployeeSession($data);
                    $this->redirectTo("/Admin");
                } else {
                    $_SESSION['error'] = "Wrong Username or Password";
                }
            }
        } else {
            $_SESSION['error'] = "Please enter a valid username and password!";
        }
    }

    function check_logged_in_customer()
    {
        if (!isset($_SESSION['currentUser']['LAST_ACTIVITY']))
        {
            return false; //chua dang nhap
        } 
        else {
            return $this->handleTimeOutSession(1800);
        }
    }

    function check_logged_in_employee()
    {
        if (!isset($_SESSION['currentUser']['LAST_ACTIVITY']) )
        {
            return false; //chua dang nhap
        } 
        else if (isset($_SESSION['currentUser']['LAST_ACTIVITY']) && $_SESSION['currentUser']['role'] != "employee")
        {
            return false; // khong phai employee
        }
        else {
            return $this->handleTimeOutSession(1800);
        }
    }

    function handleTimeOutSession($timeout)
    {
        if (time() - $_SESSION['currentUser']['LAST_ACTIVITY'] > $timeout) {
            // last request was more than 30 minutes ago
            if(isset($_SESSION['currentUser']['remember']))
            {
                $_SESSION['currentUser']['LAST_ACTIVITY'] = time();
                return true;
            }
            else {
                session_unset();     // unset $_SESSION variable for the run-time 
                session_destroy();   // destroy session data in storage
                return false;
            }
        } else {
            return true;
        }
    }

    function logout()
    {
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
        $this->redirectTo("/Authentication/SignIn");
    }

    function check_username($username) {
        $query = "
            SELECT COUNT(*) AS `count`
            FROM (
                SELECT username FROM fiama.employee WHERE username = '" . $username ."' 
                UNION ALL
                SELECT username FROM fiama.customer WHERE username = '" . $username ."' 
            ) AS `subquery`
        ";
        // var_dump($query);
        // die;
        $data = $this->db->Query($query)->fetchAll(PDO::FETCH_ASSOC);
        if ($data[0]['count'] > 0)
        {
            return false; //bi trung username
        }
        return true;
    }

    function signup_customer($POST)
    {
        $_SESSION['error'] = "";
        if(isset($POST['name']) && isset($POST['username']) && isset($POST['password']) && isset($POST['confirmPassword']))
        {
            $name = $POST['username'];
            $username = $POST['username'];
            $password = $POST['password'];
            $confirmPassword = $POST['confirmPassword'];

            if ($password != $confirmPassword)
            {
                $_SESSION['error'] = "ConfirmPassword doesn't match!";
            } else if (!$this->check_username($username)){
                $_SESSION['error'] = "Username existed!";
            }else {
                $arr = [
                    "FirstName" => $name,
                    "Username" => $username,
                    "password" => password_hash($password, PASSWORD_BCRYPT),
                    "CreatedDate" => date("d/m/Y"),
                    "Status" => 1
                ];
                $data = $this->db->Insert("fiama.customer", $arr);
                if ($data) {
                    $this->redirectTo("/Home");
                } else {
                    $_SESSION['error'] = "Insert error!";
                }
            }
        } else {
            $_SESSION['error'] = "Please enter all the fields!";
        }
    }

    function redirectTo($destination) {
        header("Location:" . _WEB_ROOT . $destination);
        die;
    }

    function setEmployeeSession($data)
    {
        $_SESSION['currentUser']['username'] = $data[0]['UserName'];
        $_SESSION['currentUser']['email'] = ($data[0]['Email'] != "") ? $data[0]['Email'] : "unknown-email";
        $_SESSION['currentUser']['role'] = "employee";
        $_SESSION['currentUser']['LAST_ACTIVITY'] = time();
        if (isset($POST['remember'])) {
            $_SESSION['currentUser']['remember'] = "remember";
        }
    }

    function setCustomerSession($data)
    {
        $_SESSION['currentUser']['username'] = $data[0]['UserName'];
        $_SESSION['currentUser']['role'] = "customer";
        $_SESSION['currentUser']['LAST_ACTIVITY'] = time();
        if (isset($POST['remember'])) {
            $_SESSION['currentUser']['remember'] = "remember";
        }
    }
}
