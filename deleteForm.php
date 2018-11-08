<?php
//  initialise une session 
session_start();
$_SESSION["id_users"] = 1;

include_once "_functions/getBankData.php";
include_once "_functions/getBankDetails.php";
include_once "_functions/db_connect.php";
include_once "_functions/deleteBankAccount.php";

$bankData = getBankDetails();

function verifSelect(){
	if(isset($_POST['supprimer'])){
		$selectedAccount = ($_POST["select"]);
		deleteBankAccount($selectedAccount);
	}
}
verifSelect();
?>


<!-- Formulaire de suppression de compte -->

	<label for="deleteAccount">Vous pouvez supprimer vos comptes:</label>
	<form method="POST"name="deleteAccount">
		<select name="select">
			<?php
			foreach(getBankData() as $row){
				echo "<option value='" . $row['id'] . "'>" . $row['account_name'] . ' - ' . $row['account_balance'] . ' - ' . $row['account_currency'] . "</option>";
			}
			?> 
		</select>
		<input type="submit" name="supprimer" value="supprimer">
	</form>