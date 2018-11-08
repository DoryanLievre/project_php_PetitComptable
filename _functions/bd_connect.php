<?php
		
	function db_connect() {
		try {
			$host  = "localhost";
			$dbname = "PetitComptable";
			$user = "root";
			$password = "";

			$db = new PDO(
				"mysql:host=$host;dbname=$dbname",
				$user,
				$password);

		return $db;
			}
		catch (Exception $e) {
			die('Erreur : '. $e -> getMessage());
		}
	}