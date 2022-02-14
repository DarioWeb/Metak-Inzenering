<?php

class uploadControl extends db
{
    private $file;
    private $type;
    private $target_file;


    public function __construct($file,$type)
    {
        $this->type = $type;
        $this->file = $file;
        $this->target_file = "uploads/stankovski".$type."_".Date("Ymdihs").".". strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));


    }

    public function upload(){


        if (!$this->alredyExist()){
            $_SESSION['fall'] = "This file is alredy exist!";
            header("location:../");
            exit();
        }

        if (!$this->fileSize()){
            $_SESSION['fall'] = "This file is too large (max:8mb)";
            header("location:../");
            exit();
        }

        if (!$this->fileType()){

            $_SESSION['fall'] = "You can only upload (png, jpg, jpeg, gif, mp4) ".$this->target_file;
            header("location:../");
            exit();
        }

        if ($this->saveFile()){
            $_SESSION['fall'] = "Your file is succesfully uploaded!";
            header("location:../");
            exit();
        }else{
            $_SESSION['fall'] = "Something went wrong!";
            header("location:../");
            exit();
        }

    }



    protected function alredyExist(){
        if (file_exists($this->target_file)){
            return false;
        }else{
            return true;
        }
    }

    protected function fileSize(){
        if ($this->file['size'] > 8000000){
            return false;
        }else{
            return true;
        }
    }

    protected function fileType(){
        $imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
        if ($imageFileType != "png" &&
            $imageFileType != "jpg" &&
            $imageFileType != "gif" &&
            $imageFileType != "mp4" &&
            $imageFileType != "jpeg"
        ){
        return false;
        }else {
        return true;
        }
    }


    protected function saveFile(){
        if (move_uploaded_file($this->file['tmp_name'],$this->target_file)){
           $ext = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
            $sql = $this->connect()->prepare("INSERT INTO uploads (url,type,ext) VALUES (?,?,?)");
            if (!$sql->execute(array($this->target_file,$this->type,$ext))){
                $_SESSION['fall'] = "Something went wrong!";
                header("location:../");
                exit();
            }

            return true;

        }else{
            return false;
        }
    }

}