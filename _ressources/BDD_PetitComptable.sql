 # STORY 1


CREATE DATABASE PetitComptable CHARACTER SET 'utf8';

USE PetitComptable; 
-- TABLE DE UTILISATEUR 
CREATE TABLE Users ( 
    id INT UNSIGNED NOT NULL AUTO_INCREMENT, -- NOT NULL NOUS OBLIGE DE SPECIFIER LA VALEUR DE CETTE DONNEE
    mail VARCHAR (30) NOT NULL UNIQUE, -- UNIQUE REND UNE VARIABLE COMME LE PSEUDO UNIQUE : IL NE PEUT PAS Y AVOIR DEUX ENTREE IDENTIQUE	
    password VARCHAR (30) NOT NULL,
    PRIMARY KEY (id) -- INDIQUE QUE LA CLE PRIMAIRE EST ID
    )
 ENGINE=INNODB DEFAULT CHARSET= 'utf8'; -- Type d'encodage pour les caractère

CREATE TABLE BankAccount (
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	id_users INT(10) UNSIGNED NULL DEFAULT NULL,
	account_name VARCHAR(45) NOT NULL,
	account_type ENUM("Current","Saving","joint_account") DEFAULT "Current",
	account_balance FLOAT(10,2) NOT NULL,
	account_currency ENUM("USD","EUR"),
	PRIMARY KEY (id)
  )  
ENGINE=INNODB DEFAULT CHARSET= 'utf8'; 

CREATE TABLE Operation(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_account INT UNSIGNED NOT NULL,
	id_category INT UNSIGNED NOT NULL,
	operation_name VARCHAR(45),
	operation_amount FLOAT(10,2),
	operation_date DATETIME NOT NUll,
	PRIMARY KEY (id)
)
ENGINE=INNODB DEFAULT CHARSET= 'utf8';

CREATE TABLE Category(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	category_name TEXT NOT NULL,
	transaction_type ENUM("Debit","Credit"),
	PRIMARY KEY (id)
)
ENGINE=INNODB DEFAULT CHARSET= 'utf8';

-------------------------------------------------------------------------------------------------------------------------------------------




 
 	







































 
    
    