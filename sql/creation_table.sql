
-- Création de la table users 

CREATE TABLE users(
		id INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
		email VARCHAR(100) UNIQUE NOT NULL,
		tel VARCHAR(10) DEFAULT NULL,
		mdp VARCHAR(64) NOT NULL,
		admin BIT DEFAULT 0
	) DEFAULT CHARSET=utf8;

-- Création de la table categories

CREATE TABLE categories(
		id INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
		nom VARCHAR(100) UNIQUE NOT NULL
	) DEFAULT CHARSET=utf8;

-- Création de la table regions

CREATE TABLE regions(
		id INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
		nom VARCHAR(50) UNIQUE NOT NULL
	) DEFAULT CHARSET=utf8;

-- Création de la table villes

CREATE TABLE villes(
		id INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
		nom VARCHAR(50) UNIQUE NOT NULL,
		cp INT(5) NOT NULL,
		region_id INT(10) NOT NULL,
		FOREIGN KEY (region_id) REFERENCES regions(id)
	) DEFAULT CHARSET=utf8;


-- Création de la table users

CREATE TABLE annonces(
		id INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
		titre VARCHAR(60) UNIQUE NOT NULL,
		description TEXT NOT NULL,
		prix INT(10) DEFAULT NULL,
		user_id INT(10) NOT NULL,
		date DATE NOT NULL,
		categorie_id INT(10) DEFAULT NULL,
		ville_id INT(10) NOT NULL,
		FOREIGN KEY (user_id) REFERENCES users(id),
		FOREIGN KEY (categorie_id) REFERENCES categories(id)
	) DEFAULT CHARSET=utf8;
