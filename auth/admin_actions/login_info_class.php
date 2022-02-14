<?php

class login_info_class extends db
{

    private $old_psw;
    private $new_psw;
    private $confirm;

    public function __construct($old_psw,$new_psw,$confirm)
    {
        $this->old_psw = $old_psw;
        $this->new_psw = $new_psw;
        $this->confirm = $confirm;
    }

    public function loginUpd(){
        if (!$this->emptyInput()){
            $_SESSION['fall'] = "Pleas fill in all fields!";
            header("location:../");
            exit();
        }

        if (!$this->validOldPsw()){
            $_SESSION['fall'] = "Old password is incorrect!";
            header("location:../");
            exit();
        }

        if (!$this->validNewPsw()){
            $_SESSION['fall'] = "Your new password is to short! (min:8chr).";
            header("location:../");
            exit();
        }

        if (!$this->confirm()){
            $_SESSION['fall'] = "Password doesn't match!";
            header("location:../");
            exit();
        }

        try {
            $hashPsw = password_hash($this->new_psw,PASSWORD_BCRYPT);
            $sql = $this->connect()->prepare("UPDATE users SET password = ? WHERE id = ?");
            if (!$sql->execute(array($hashPsw,1))){
                $sql = null;
                $_SESSION['fall'] = "SQL_ERROR";
                header("location:../");
            }
        }
        catch (PDOException $e){
            die('SQL_ERROR->'.$e->getMessage());
        }

    }



    //Validation

    protected function emptyInput(){
        if (empty($this->old_psw) || empty($this->new_psw) || empty($this->confirm)){
            return false;
        }else{
            return true;
        }
    }

    protected function validOldPsw(){
        $sql = $this->connect()->prepare("SELECT password FROM users WHERE id = ?");
        if (!$sql->execute(array(1))){
            $sql = null;
            $_SESSION['fall'] = "SQL_ERROR";
            header("location:../");
        }
        if ($sql->rowCount() > 0){
            $row = $sql->fetch(PDO::FETCH_ASSOC);

            if (password_verify($this->old_psw,$row['password'])){
                return true;
            }else{
                return false;
            }

        }else{
            $sql = null;
            $_SESSION['fall'] = "SQL_ERROR";
            header("location:../");
        }

    }

    protected function validNewPsw(){
        if (strlen($this->new_psw) < 8){
            return false;
        }else{
            return true;
        }
    }

    protected function confirm(){
        if ($this->new_psw != $this->confirm){
            return false;
        }else{
            return true;
        }
    }

}