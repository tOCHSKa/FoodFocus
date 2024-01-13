CREATE TABLE utilisateur (
    id_utilisateur INT PRIMARY KEY,
    pseudo VARCHAR(10),
    avatar VARCHAR(20),
    email VARCHAR(254),
    password VARCHAR(300),
    sexe VARCHAR(5),
    nom VARCHAR(15),
    prénom VARCHAR(15),
    date_naissance DATE,
    taille INT,
    taux_activité_physique INT
);

CREATE TABLE suivi_quotidien (
    id_suivi INT PRIMARY KEY,
    id_utilisateur INT,
    date DATE,
    calories_calculées INT,
    poids_du_jour INT,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur)
);

CREATE TABLE produit (
    id_produit INT PRIMARY KEY,
    libellé_produit VARCHAR(50),
    calories_produit INT
);

CREATE TABLE contient (
    id_suivi INT,
    id_produit INT,
    quantité INT,
    FOREIGN KEY (id_suivi) REFERENCES suivi_quotidien(id_suivi),
    FOREIGN KEY (id_produit) REFERENCES produit(id_produit)
);
