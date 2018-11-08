<?php 
session_start();
?>


<?php 
// va chercher les fonctions dans l'arborescence
include_once "./../_functions/db_connect.php";
include_once "./../_functions/editForm.php";
include_once "./../_functions/countAccount.php";
?> 


<?php 
// verification de la cohérence des données du formulaire 
	if(isset($_GET['monFormulaire'])){

		$accountName 		= $_GET['accountName'];
		$accountCurrency 	= $_GET['accountCurrency'];
		$accountType		= $_GET['accountType'];
		$accountBalance     = floatval($_GET['accountBalance']);
		$availableType 		= ["compte_suisse", "courant", "epargne", "compte_joint"];
		
		if(strlen($accountName) > 30 OR strlen($accountName) == 0){
			$message = "Le nom doit contenir entre 1  et 30 caractères";
		}
		else if (!in_array($accountType, $availableType)) {
			$message = "Erreur";
		}
		else if (!in_array($accountCurrency,["USD","EUR"])){
			$message = "Erreur1";
		}
		else{

			if (countAccount()>= 10) {
				$message = "Vous avez atteint la limite maximal de création de compte.";
			}	
			else{
			$db = db_connect();

			$req = $db -> prepare("INSERT INTO BankAccount(id_users, account_name, account_type, account_balance, account_currency)VALUES(:id_users, :accountName, :accountType, :accountBalance, :accountCurrency);");

			$req -> execute(array(
					"id_users" => 1,
					"accountName" => $accountName,
					"accountType" => $accountType,
				    "accountBalance" => $accountBalance,
				    "accountCurrency" => $accountCurrency)); 


					$message = "Votre formulaire a bien été pris en compte";
			}
		}

		header('Location: ../index.php?message=' . $message);
	}

