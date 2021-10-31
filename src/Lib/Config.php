<?php 
use App\Classes\File;
$file = new File(); 
if(isset($_GET['del'])){
    $fID = $_GET['del'];
    $msg = $file->deleteFile($fID);

}

?>