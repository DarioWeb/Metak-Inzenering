<?php

class loginControl extends db
{

    private $email;
    private $psw;

    public function __construct($email,$psw)
    {
        $this->email = $email;
        $this->psw = $psw;
    }

    //login

    public function login(){
        if (!$this->emptyInput()){
            $_SESSION['fall'] = "Pleas fill in all fields!";
            header("location:../../login.php");
            exit();
        }

        if (!$this->checkEmail()){
            $_SESSION['fall'] = "Incorrect email or password!";
            header("location:../../login.php");
            exit();
        }else{
            if (!$this->checkPsw($this->checkEmail())){
                $_SESSION['fall'] = "Incorrect email or password!";
                header("location:../../login.php");
                exit();
            }else{

                $_SESSION['login'] = true;
                $_SESSION['email'] = $this->email;
                header("location:../../auth/");

            }
        }
    }

    //Validation

    protected function emptyInput(){
        if (empty($this->email) || empty($this->psw)){
            return false;
        }else{
            return true;
        }
    }

    protected function checkEmail(){
        $sql = $this->connect()->prepare("SELECT password FROM users WHERE email = ?");

        if (!$sql->execute(array($this->email))){
            $sql = null;
            $_SESSION['fall'] = "sql_error";
            header("location:../../login.php");
            exit();
        }

        if ($sql->rowCount() > 0){
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            return $row['password'];
        }else{
            return false;
        }

    }

    protected function checkPsw($hashPsw){
        if (password_verify($this->psw,$hashPsw)){
            return true;
        }else{
            return false;
        }
    }

}