-- Insertion de données dans la table 'utilisateur'
INSERT INTO utilisateur (id_utilisateur, avatar, email, password, sexe, nom, prénom, date_naissance, taille, taux_activité_physique)
VALUES (1, 'avatar_man_3.jpg', 'user1@example.com', 'hashedpassword', 'F', 'Dupont', 'Alice', '1990-01-01', 170, 2);

-- Insertion de données dans la table 'produit'
INSERT INTO produit (id_produit, libellé_produit, type_produit, proteines, glucides, lipides, calories_produit)
VALUES (1, 'Pomme', 'en:fruits', 12, 34, 56, 52);

-- Insertion de données dans la table 'suivi_quotidien'
INSERT INTO suivi_quotidien (id_suivi, id_utilisateur, date, calories_calculées, poids_du_jour)
VALUES (1, 1, '2021-01-01', 2000, 60);

-- Insertion de données dans la table 'contient'
INSERT INTO contient (id_suivi, id_produit, quantité)
VALUES (1, 1, 2);
