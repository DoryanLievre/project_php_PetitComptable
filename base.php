<?php
//  initialise une session 
session_start();
$_SESSION["id_users"] = 1;

if(isset($_GET['message'])){
echo $_GET['message'];
}
include_once "_functions/getBankData.php";
include_once "_functions/getBankDetails.php";
include_once "_functions/db_connect.php";

$bankData = getBankDetails();

?>


<!-- Formulaire de création de compte -->
<link rel="stylesheet" type="text/css" href="./css/formulaire_style.css">
<link rel="stylesheet" type="text/css" href="./css/header.css">
<body>
	<header class="head"> 
		Futur Project
	</header>
	<h1>Créer un compte:</h1>
	<form method="GET" action="./traitement_php/verifForm.php" id="formulaire" class="monForm">
		<main id="form">
			
	
			<div>
				<label for="accountName">Nom du Compte:</label>
				<input type="text" name="accountName" id="accountName" value="" placeholder="Nom de votre compte" required />
			</div>

			<div>
				<label for="accountType">Type de Compte:</label>
					<select name="accountType" id="accountType" required>
					   <option value="compte_suisse">Compte Suisse</option>
					   <option value="courant">Courant</option>
					   <option value="epargne">Epargne</option>
					   <option value="compte_joint">Compte joint</option>
					</select>
			</div>

			<div>
				<label for="accountBalance">Provision du Compte:</label>
				<input type="number" step="0.01" name="accountBalance" id="accountBalance" value="" placeholder="Provision de votre compte" required />
			</div>

			<div>
				<label for="accountCurrency">Devise du compte:</label>
					<input type="radio" name="accountCurrency" id="accountCurrency" value="USD" required> USD $
  					<input type="radio" name="accountCurrency" id="accountCurrency" value="EUR" required> EUR €
			</div>

			<div>
				<label for="Add"></label>
				<input class="envoyer" name="monFormulaire" type="submit" id="Add" value="Envoyer" required/>
			</div>
		</main>
	</form>
</body>


