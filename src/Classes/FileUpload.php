<?php

namespace App\Classes;

use App\Lib\Database;
use App\Lib\Session;


Class FileUpload {
    private $db;

	function __construct()
	{
        $this->db = new Database();
	}

    public function storeFiletoDatabase($data)
    {
        $allowed_extension = array(
            "pdf",
            "jpeg"
        );
        $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        if (! file_exists($_FILES["file"]["tmp_name"])) {
            $msg = "<div class='alert alert-danger' role='alert'>Choose file to upload.</div>";
			return $msg;
        }else if (! in_array($file_extension, $allowed_extension)) {
            $msg = "<div class='alert alert-danger' role='alert'>Upload valid files. Only PDF and JPEG are allowed.</div>";
			return $msg;
        }else if (($_FILES["file"]["size"] > 24000000)) {
            $msg = "<div class='alert alert-danger' role='alert'>File size exceeds 24MB.</div>";
			return $msg;
        }else{
            $fname = time().'.'.$file_extension;
			$move = move_uploaded_file($_FILES['file']['tmp_name'],'../../assets/uploads/'.$fname);
            if ($move) {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $file = $fname;
                $share = $_POST['share'];
                if(isset($share) && $share == 'on'){
                    $is_public = 1 ;
                }else{
                    $is_public = 0; 
                }
                $query = "INSERT INTO files (name,description,file,is_public) VALUES ('$name','$description','$file','$is_public')";
                $result = $this->db->insert($query);
                if($result){
                    $msg = "File uploaded succesfully";
                    Session::set('success',$msg);
                    header("Location:index.php");
                }
            } 
        }
        
    }

}