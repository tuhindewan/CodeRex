<?php

namespace App\Classes;

use App\Lib\Database;
use App\Lib\Session;

/**
*Database Class
**/
Class File {
    private $db;

    // Initiate database connection
	function __construct()
	{
        $this->db = new Database();
	}

    // File information store to database
    // Redirect to index page with session
    public function storeFiletoDatabase($data)
    {
        // Allowed file extension
        $allowed_extension = array(
            "pdf",
            "jpeg"
        );

        $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        if (! file_exists($_FILES["file"]["tmp_name"])) { // File exist validation
            $msg = "<div class='alert alert-danger' role='alert'>Choose file to upload.</div>";
			return $msg;
        }else if (! in_array($file_extension, $allowed_extension)) { // File format extension validation
            $msg = "<div class='alert alert-danger' role='alert'>Upload valid files. Only PDF and JPEG are allowed.</div>";
			return $msg;
        }else if (($_FILES["file"]["size"] > 24000000)) { // File size validation
            $msg = "<div class='alert alert-danger' role='alert'>File size exceeds 24MB.</div>";
			return $msg;
        }else{
            // Moved to local folder
            $fname = time().'.'.$file_extension;
			$move = move_uploaded_file($_FILES['file']['tmp_name'],'../../assets/uploads/'.$fname);

            // Store to database
            if ($move) {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $file = $fname;
                $share = $_POST['share'];
                $uploader = Session::get('userid');
                if(isset($share) && $share == 'on'){
                    $is_public = 1 ;
                }else{
                    $is_public = 0; 
                }
                $query = "INSERT INTO files (name, description, file, is_public, uploader) VALUES ('$name', '$description', '$file', '$is_public', '$uploader')";
                $result = $this->db->insert($query);
                if($result){
                    $msg = "File uploaded succesfully";
                    Session::set('success',$msg);
                    header("Location:index.php");
                }
            } 
        }
        
    }

    // Return pecific users file list
    public function getIndividualUsersFiles()
    {
        $user = $_SESSION["userid"];
        $query = "SELECT * FROM files WHERE uploader='$user'";
        $result = $this->db->select($query);
        return $result;
    }

    // Return all sharebale files
    public function getAllPublicFiles()
    {
        $query = "SELECT * FROM files WHERE is_public='1'";
        $result = $this->db->select($query);
        return $result; 
    }

    // Delete a specific file
    // Redirect to index page with session
    public function deleteFile($id)
    {   
        $query = "SELECT * FROM files WHERE id='$id'";
        $result = $this->db->select($query);
        $file = mysqli_fetch_assoc($result);
        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]);
        $file_delete =  "$base_dir/src/assets/uploads/".$file['file'];
        if (file_exists($file_delete)) {
            unlink($file_delete);
        }
        $query = "DELETE FROM files WHERE id='$id'";
        $result = $this->db->delete($query);
        if($result){
            $msg = "File deleted succesfully";
            Session::set('success',$msg);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    // Update private file to shareable 
    public function shareFile($id)
    {
        $query = "UPDATE files SET is_public='1' WHERE id='$id'";
        $result = $this->db->delete($query);
        if($result){
            $msg = "File shared succesfully";
            Session::set('success',$msg);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    // Making file downloadable
    public function downloadFile($id)
    {
        $query = "SELECT * FROM files WHERE id='$id'";
        $result = $this->db->delete($query);
        $file = mysqli_fetch_assoc($result);
        $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]);
        $downloadable =  "$base_dir/src/assets/uploads/".$file['file'];
        $fp = fopen($downloadable, "r") ;
        if (file_exists($downloadable)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="'.basename($file['file']).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file['file']));
            readfile($downloadable);
            exit;
        }
    }

    // Count number of public files
    public function countPublicFiles()
    {
        $sql = "SELECT * FROM files WHERE is_public='1'";
        $result = $this->db->count($sql);
        return $result;
    }

}