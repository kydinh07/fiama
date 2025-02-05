<?php
class Authentication extends Controller {
    private $authModel;
    function __construct()
    {
        $this->authModel = $this->CreateModel("AuthModel");
    }

    function SignIn(){
        if ($this->checkLoggedIn("employee"))
        {
            header("Location: " . _WEB_ROOT . "/Admin");
            die;
        } else if ($this->checkLoggedIn("customer"))
        {
            header("Location: " . _WEB_ROOT . "/Home");
            die;
        }

        if ($this->authModel->check_logged_in_customer()) {
            header("Location: " . _WEB_ROOT . "/Home");
            die;
        }
        if ( isset($_POST['username']) && isset($_POST['username']) )
        {
            if (strlen($_POST['username']) < 2 && strlen($_POST['password']) < 2)
            {
                echo "<script>alert('At least 2 character for username and password please!')</script>";
            } else {
                $this->authModel->login($_POST);
                if (isset($_SESSION['error'])) {
                    echo "<script>alert('" . $_SESSION['error'] . "')</script>";
                    unset($_SESSION['error']);
                }
            }
        }
        $this->RenderView('authentication/sign_in');
    }

    function SignOut() {
        $this->authModel->logout();
    }

    function SignUp(){
        if ($this->authModel->check_logged_in_customer()) {
            header("Location: " . _WEB_ROOT . "/Home");
            die;
        }

        if ( isset($_POST['username']) && isset($_POST['username']))
        {
            $this->authModel->signup_customer($_POST);
            if (isset($_SESSION['error'])) {
                echo "<script>alert('" . $_SESSION['error'] . "')</script>";
                unset($_SESSION['error']);
             }
        }
        $this->RenderView('authentication/sign_up');
    }

    function checkLoggedIn($role)
    {
        if ( isset($_SESSION['currentUser']['LAST_ACTIVITY']) && $this->authModel->handleTimeOutSession(1800) )
        {
            if (isset($_SESSION['currentUser']['role']) &&  $_SESSION['currentUser']['role'] == $role)
            {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
