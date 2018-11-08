 <?php
function getBankDetails(){
	$db = db_connect();
	$req = $db -> prepare("SELECT id, account_name, account_type, account_balance, account_currency FROM BankAccount WHERE id = :id");
	$req -> execute(array("id" => 2));

	$bankData = $req -> fetch();

	return $bankData; 
}