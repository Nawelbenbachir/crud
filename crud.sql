SET NAMES 'utf8';
SET CHARACTER SET utf8;

DROP DATABASE IF EXISTS crud;
CREATE DATABASE crud DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE crud;

CREATE TABLE personnes(
   id INT PRIMARY KEY AUTO_INCREMENT,
   nom VARCHAR(50) NOT NULL,
   prenom VARCHAR(50) NOT NULL,
   email VARCHAR(50) NOT NULL,
   mot_de_passe VARCHAR(120),
   telephone VARCHAR(50),
   admin BOOLEAN,
   etudiant BOOLEAN,
   professeur BOOLEAN
);

CREATE TABLE cours(
   id INT PRIMARY KEY AUTO_INCREMENT,
   nom VARCHAR(50) NOT NULL
);

CREATE TABLE inscription(
   id INT PRIMARY KEY AUTO_INCREMENT,
   id_personne INT,
   id_cours INT,
   FOREIGN KEY(id_personne) REFERENCES personnes(id),
   FOREIGN KEY(id_cours) REFERENCES cours(id)
);


-- Insertion des données dans la table personnes
INSERT INTO personnes (nom, prenom, email, mot_de_passe, telephone, admin, etudiant, professeur) 
VALUES 
('Dupont', 'Jean', 'jean.dupont@example.com', 'motdepasse123', '0123456789', FALSE, TRUE, FALSE),
('Martin', 'Claire', 'claire.martin@example.com', 'mdp456', '0987654321', TRUE, FALSE, TRUE),
('Leclerc', 'Pierre', 'pierre.leclerc@example.com', 'mypassword789', '0112233445', FALSE, TRUE, FALSE),
('Lemoine', 'Sophie', 'sophie.lemoine@example.com', 'password321', '0167890123', FALSE, TRUE, FALSE),
('Bernard', 'Luc', 'luc.bernard@example.com', 'mdp12345', '0176543210', FALSE, TRUE, FALSE),
('Durand', 'Marie', 'marie.durand@example.com', 'password987', '0134657890', FALSE, TRUE, FALSE),
('Girard', 'Alice', 'alice.girard@example.com', 'mypwd456', '0145796328', FALSE, TRUE, FALSE),
('Roux', 'Thomas', 'thomas.roux@example.com', 'securepassword321', '0182456809', FALSE, TRUE, FALSE),
('Petit', 'Julien', 'julien.petit@example.com', 'newpassword123', '0193847562', FALSE, TRUE, FALSE),
('Faure', 'Nathalie', 'nathalie.faure@example.com', 'password1234', '0156278345', TRUE, FALSE, TRUE);

-- Insertion des données dans la table cours
INSERT INTO cours (nom) 
VALUES 
('Mathematics'),
('Physics'),
('Computer Science'),
('Biology'),
('Chemistry');

-- Insertion des données dans la table inscription (20 inscriptions)
INSERT INTO inscription (id_personne, id_cours) 
VALUES 
(1, 1), (1, 2), (1, 3), (1, 4), (1, 5),  -- Jean Dupont inscrit à tous les cours
(2, 1), (2, 2), (2, 5),                   -- Claire Martin inscrit à Mathematics, Physics et Chemistry
(3, 3), (3, 4), (3, 5),                   -- Pierre Leclerc inscrit à Computer Science, Biology et Chemistry
(4, 1), (4, 2), (4, 5),                   -- Sophie Lemoine inscrit à Mathematics, Physics et Chemistry
(5, 1), (5, 4), (5, 5),                   -- Luc Bernard inscrit à Mathematics, Biology et Chemistry
(6, 2), (6, 3), (6, 5),                   -- Marie Durand inscrit à Physics, Computer Science et Chemistry
(7, 1), (7, 3), (7, 4),                   -- Alice Girard inscrit à Mathematics, Computer Science et Biology
(8, 2), (8, 5),                           -- Thomas Roux inscrit à Physics et Chemistry
(9, 3), (9, 4),                           -- Julien Petit inscrit à Computer Science et Biology
(10, 1);                                  -- Nathalie Faure inscrit à Mathematics
