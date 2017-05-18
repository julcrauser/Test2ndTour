CREATE TABLE Votants(
	id NUMERIC(12) PRIMARY KEY,
	nom VARCHAR(30) NOT NULL,
	prenom VARCHAR(30) NOT NULL,
	datedn DATE NOT NULL,
	villedn VARCHAR(30) NOT NULL,
	depdn NUMERIC(2) NOT NULL,
	sexe CHAR(1) NOT NULL,
	adresse VARCHAR(100) NOT NULL,
	ville VARCHAR(30) NOT NULL,
	codepostal NUMERIC(5) NOT NULL,
	mdp VARCHAR(30) NOT NULL,
	CHECK (sexe = 'F' OR sexe = 'H')
);

CREATE TABLE Prenoms(
	id NUMERIC(12),
	prenom VARCHAR(30),
	FOREIGN KEY (id) REFERENCES Votants(id),
	PRIMARY KEY (id, prenom)
);

CREATE TABLE Candidats(
	id NUMERIC(12) PRIMARY KEY,
	programme VARCHAR(500),
	parti VARCHAR(50),
	validation BOOLEAN NOT NULL,
	FOREIGN KEY (id) REFERENCES Votants(id)
);

CREATE TABLE Vote(
	id NUMERIC(12) PRIMARY KEY,
	candidat NUMERIC(12) REFERENCES Candidats(id),
	FOREIGN KEY (id) REFERENCES Votants(id)
);

CREATE TABLE Administrateurs(
	login VARCHAR(50) PRIMARY KEY,
	mdp VARCHAR(50) NOT NULL
);
