<?php

namespace App\Classes;

use App\Lib\Database;

/**
*Database Class
**/
Class User {
    private $db;

	// Initiate database connection
	function __construct()
	{
		$this->db = new Database();
	}

    // Count number of users
	public function countAllUsers(){
        $sql = "SELECT * FROM users";
        $result = $this->db->count($sql);
        return $result;
	}
}