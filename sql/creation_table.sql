
-- Création de la table users 

CREATE TABLE users(
		id INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
		email VARCHAR(60) NOT NULL,
		tel INT(10) DEFAULT NULL
	) DEFAULT CHARSET=utf8;

-- Création de la table categories

CREATE TABLE categories(
		id INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
		nom VARCHAR(100) NOT NULL
	) DEFAULT CHARSET=utf8;

-- Création de la table regions

CREATE TABLE regions(
		id INT(10) AUTO_INCREMENT NOT NULL,
		nom VARCHAR(50) NOT NULL,
		PRIMARY KEY (id)
	) DEFAULT CHARSET=utf8;

-- Création de la table villes

CREATE TABLE villes(
		id INT(10) AUTO_INCREMENT NOT NULL,
		nom VARCHAR(50) NOT NULL,
		cp INT(5) NOT NULL,
		region_id INT(10) NOT NULL,
		PRIMARY KEY (id, nom, cp, region_id)
	) DEFAULT CHARSET=utf8;


-- Création de la table users

CREATE TABLE annonces(
		id INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
		titre VARCHAR(60) NOT NULL,
		description TEXT NOT NULL,
		prix VARCHAR(10) DEFAULT NULL,
		user_id INT(10) DEFAULT NULL,
		date DATE NOT NULL,
		categorie_id INT(10) DEFAULT NULL,
		ville_id INT(10) NOT NULL
	) DEFAULT CHARSET=utf8;
