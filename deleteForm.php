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
<link rel="stylesheet" type="text/css" href="./css/formulaire_style.css">
<link rel="stylesheet" type="text/css" href="./css/header.css">
<body>
	<header class="head"> 
		Futur Project
	</header>
	<h1>Choisissez le compte à supprimer:</h1>
	<form method="POST"name="deleteAccount" id="formulaire" class="monForm">
		<select name="select">
			<?php
			foreach(getBankData() as $row){
				echo "<option value='" . $row['id'] . "'>" . $row['account_name'] . ' - ' . $row['account_balance'] . ' - ' . $row['account_currency'] . "</option>";
			}
			?> 
		</select>
		<input type="submit" class="envoyer name="supprimer" value="supprimer">
	</form>