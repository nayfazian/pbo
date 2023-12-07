<?php

namespace App\Core;

use PDO;

class Model
{

	protected object $db;

	public function __construct()
	{
		try {
			$this->db = new PDO("mysql:host=localhost;dbname=pbwl-project10", "root", "");
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die("Connection failed: " . $e->getMessage());
		}
	}
	

	public function select($stmt)
	{
		//Menampilkan satu data
		return $stmt->fetch();
	}

	public function selects($stmt)
	{
		//Menampilkan banyak data
		$data = [];

		while ($rows = $stmt->fetch()) {
			$data[] = $rows;
		}

		return $data;
	}
}
