 <?php
function getBankData(){
	$db = db_connect();
	$req = $db -> prepare("SELECT id, account_name, account_type, account_balance, account_currency FROM BankAccount WHERE id_users = :id_users");
	$req -> execute(array("id_users" => $_SESSION["id_users"]));

	$bankData = $req -> fetchAll();

	return $bankData; 
}
