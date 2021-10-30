<?php

namespace App\Classes;

use App\Lib\Database;
use App\Lib\Session;

Class Auth {
    private $db;

	function __construct()
	{
		$this->db = new Database();
	}

	public function login($data){

		$password = md5($_POST['password']);
		$username = $_POST['username'];

		$username = mysqli_real_escape_string($this->db->link,$username);
		$password = mysqli_real_escape_string($this->db->link,$password);
		
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$result = $this->db->select($query);
		if ($result!=false) {
			$value = $result->fetch_assoc();
			session_start();
			Session::set('userlogin',true);
			Session::set('userid',$value['id']);

			Session::set('username',$value['username']);
			header("Location:index.php?page=home");
		}else{
			$msg = "<div class='alert alert-danger' role='alert'>Something went wrong!!.</div>";
			return $msg;
		}

	}
}