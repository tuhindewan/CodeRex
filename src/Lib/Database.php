<?php
namespace App\Lib;

require_once 'Config/Config.php';

Class Database{
    public $host   = DB_HOST;
    public $user   = DB_USER;
    public $pass   = DB_PASS;
    public $dbname = DB_NAME;
 
 
    public $link;
    public $error;
 
    public function __construct(){
        $this->connectDB();
    }
 
    // Database connection check
    private function connectDB(){
        $this->link = new \mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->link){
            $this->error ="Connection fail".$this->link->connect_error;
            return false;
        }else{
            return true;
        }
    }

    // Insert data
public function insert($query){
 $insert_row = $this->link->query($query) or 
   die($this->link->error.__LINE__);
 if($insert_row){
   return $insert_row;
 } else {
   return false;
  }
 }

}
