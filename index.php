<?php

session_start();
?> 

<?php			
include_once "_functions/bd_connect.php";

	if(isset($_GET['monFormulaire'])){
		$accountName 		= $_GET['accountName'];
		$accountCurrency 	= floatval($_GET['accountCurrency']);
		$accountType		= $_GET['accountType'];

		$availableType 		= ["compte_suisse", "courant", "epargne", "compte_joint"];


		if(strlen($accountName) > 30 OR strlen($accountName) == 0){
			echo "Le nom doit contenir entre 1  et 30 caractères";
		}
		else if (!in_array($accountType, $availableType)) {
			echo "Erreur";
		}
		else if (!in_array($accountCurrency,["USD","EUR"])){
			echo "Erreur1";
		}
		else{
			$db = db_connect();
			// INSERT 

			$req = $db -> prepare("INSERT INTO BankAccount(id_users,account_name,account_type,account_balance,account_currency)VALUES(:id_users,:account_name,:account_type,:account_balance,:account_currency);");

			$req -> execute(array("id_users" => 1,"account_name" => $_GET['account_name'], "account_type" => $_GET['account_type'],
						  "account_balance" => $_GET['account_balance'],"account_currency" => $_GET['account_currency'])); 

			echo "Votre formulaire a bien été pris en compte";
		}
	}

	

?> 


	<form method="GET" action="index.php" id="formulaire" class="monForm">
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
					<input type="radio" name="accountCurrency" id="accountCurrency" value="dollard" required> USD $
  					<input type="radio" name="accountCurrency" id="accountCurrency" value="euro" required> EUR €
			</div>

			<div>
				<label for="Add"></label>
				<input class="envoyer" name="monFormulaire" type="submit" id="Add" value="Envoyer" required/>
			</div>
		</main>
	</form>




	








