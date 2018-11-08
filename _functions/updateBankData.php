<?php

function updateBankData($id, $accountName, $accountType, $accountBalance, $accountCurrency){
	$db = db_connect();

	$req = $db->prepare ("UPDATE BankAccount SET, account_name = :accountName, account_type = :accountType, account_balance = :accountBalance, account_currency = :accountCurrency WHERE id = :id");

	$req ->execute (array(
		"id"=> $id, 
		"account_name"=> $accountName,
		"account_type"=> $accountType,
		"account_balance"=> $accountBalance, 
		"account_currency"=> $accountCurrency));

	$req->closeCursor();
	return $req;

}