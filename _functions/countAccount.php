<?php

// Fonction de comptage de compte  
function countAccount(){
	$db = db_connect();

	$req = $db -> prepare("SELECT COUNT(id) as accountNumber FROM BankAccount WHERE id_users = :id_users" );
	$req -> execute(array("id_users" => $_SESSION["id_users"]));
	$data = $req->fetch();

	return $data['accountNumber'];
}