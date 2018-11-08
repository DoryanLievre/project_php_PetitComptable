<?php

session_start();
?>


<?php 
// va chercher les fonctions dans l'arborescence
include_once "./../_functions/db_connect.php";
include_once "./../_functions/editForm.php";
include_once "./../_functions/countAccount.php";
include_once "./../_functions/updateBankData.php";
?> 


<?php 
// verification de la cohérence des données du formulaire 
	if(isset($_GET['check'])){
        $id                 = $_GET['id'];
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
			updateBankData($id, $accountName, $accountType, $accountBalance, $accountCurrency);

			echo "Votre compte a bien été modifié";
			}
			header('Location: ../base.php?message=' . $message);
		}
