<?php

class send_email_class extends db
{

    private $name;
    private $phone;
    private $email;
    private $msg;

    public function __construct($name,$phone,$email,$msg)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->msg = $msg;
    }


    public function send_mail(){

        if (!$this->emptyInput()){
            echo "Pleas fill in all fileds!";
            exit();
        }

        if (!$this->validEmail()){
            echo "Pleas enter a valid email!";
            exit();
        }

        if (!$this->validPhone()){
            echo "Pleas enter a valid phone number!";
            exit();
        }

        if (!$this->validName()){
            echo "Pleas enter a valid name!";
            exit();
        }

        if (!$this->validMsg()){
            echo "Message must be between 20 and 300 chr.";
            exit();
        }

        if ($this->send()){
            echo "Your email was successfully sent! Thanks you.";
            exit();
        }else{
            echo "Something went wrong in sending your email!";
            exit();
        }


    }

    //Validation

    protected function emptyInput(){
        if (empty($this->name) || empty($this->phone) || empty($this->email) || empty($this->msg)){
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

    protected function validPhone(){
        if (!is_numeric($this->phone)){
            return false;
        }else{
            return true;
        }
    }


    protected function validName(){
        if (strlen($this->name) < 2 || is_numeric($this->name)){
            return false;
        }else{
            return true;
        }
    }

    protected function validMsg(){
        if (strlen($this->msg) < 20){
            return false;
        }else{
            return true;
        }
    }

    protected function send(){

        $sql = $this->connect()->prepare("SELECT email FROM contact WHERE id = ?");
        if (!$sql->execute(array(1))){
            $sql = null;
            echo "SQL_ERROR";
            exit();
        }
        $row = "";
        if ($sql->rowCount() > 0){
            $row = $sql->fetch(PDO::FETCH_ASSOC)['email'];
        }

        $receiver = $row;
        $subject = "Email Test via PHP using Localhost";
        $body = "Hi, there...This is a test email send from Localhost.";
        $sender = "From:sender email address here";
        if(mail($receiver, $subject, $body, $sender)){
            return true;
        }else{
          return false;
        }

    }

}

