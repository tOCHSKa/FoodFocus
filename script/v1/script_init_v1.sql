-- Insertion de données dans la table 'utilisateur'
INSERT INTO utilisateur (id_utilisateur, avatar, email, password, sexe, nom, prenom, date_naissance, taille, taux_activite_physique)
VALUES (1, 'avatar_man_3.jpg', 'user1@example.com', '$2y$13$1el2gtb6VcR8ARgg.3KWKe0EvrioZO60B/HnPqanBcAdeMbAT9E2a', 'F', 'Dupont', 'Alice', '1990-01-01', 170, 2);

-- Insertion de données dans la table 'produit'
INSERT INTO produit (id_produit, libelle_produit, type_produit, proteines, glucides, lipides, calories_produit)
VALUES (1, 'Pomme', 'en:fruits', 12, 34, 56, 52);

-- Insertion de données dans la table 'suivi_quotidien'
INSERT INTO suivi_quotidien (id_suivi, id_utilisateur, date, calories_calculees, poids_du_jour)
VALUES (1, 1, '2021-01-01', 2000, 60);

-- Insertion de données dans la table 'contient'
INSERT INTO contient (id_suivi, id_produit, quantite)
VALUES (1, 1, 2);
