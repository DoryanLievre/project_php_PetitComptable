<?php

function deleteBankAccount($selectedAccount){
	$db = db_connect();

	$req = $db->prepare("DELETE FROM bankAccount WHERE id = :id");
	$req->execute(array('id' => $selectedAccount));

}