<?php

class contact extends db
{
    private $phone;
    private $email;
    private $adresa;
    private $about;

    public function __construct($phone,$email,$adresa,$about)
    {
        $this->phone = $phone;
        $this->email = $email;
        $this->adresa = $adresa;
        $this->about = $about;
    }


    public function update_con(){
        if (!$this->emptyInput()){
            $_SESSION['fall'] = "Pleas fill in all fileds!";
            header("location:../");
            exit();
        }
        if (!$this->validEmail()){
            $_SESSION['fall'] = "Pleas enter a valid email!";
            header("location:../");
            exit();
        }
        if (!$this->validPhone()){
            $_SESSION['fall'] = "Pleas enter a valid phone number!";
            header("location:../");
            exit();
        }
        if (!$this->validAbout()){
            $_SESSION['fall'] = "Pleas enter a valid about text!";
            header("location:../");
            exit();
        }

        if ($this->save_db()){
            $_SESSION['fall'] = "Your contact info was succesfully updated!";
            header("location:../");
            exit();
        }

    }

    protected function save_db(){

        try {
            $sql = $this->connect()->prepare("UPDATE contact SET phone = ?,email = ?, adresa = ?, about = ? WHERE id = ?");
            if (!$sql->execute(array($this->phone,$this->email,$this->adresa,$this->about,1))){
                $sql = null;
                $_SESSION['fall'] = "SQL_ERROR";
                header("location:../");
            }
            return true;
        }
        catch (PDOException $e){
            die("SQL_ERROR->".$e->getMessage());
        }

    }


    //validation

    protected function emptyInput(){
        if (empty($this->phone) || empty($this->email) || empty($this->adresa) || empty($this->adresa)){
            return false;
        }else{
            return true;
        }
    }

    protected function validEmail(){
        if (!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            return false;
        }else{
            return true;
        }
    }

    protected function validAbout(){
        if (strlen($this->about) > 300 || strlen($this->about) < 50){
            return false;
        }else{
            return true;
        }
    }

    protected function validPhone(){
        if (!is_numeric($this->phone)){
            return false;
        }else{
            return true;
        }
    }

}