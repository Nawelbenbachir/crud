CREATE TABLE personnes(
   id INT,
   nom VARCHAR(50),
   prenom VARCHAR(50),
   email VARCHAR(50),
   mot_de_passe VARCHAR(120),
   telephone VARCHAR(50),
   admin LOGICAL,
   etudiant LOGICAL,
   professeur LOGICAL,
   PRIMARY KEY(id)
);

CREATE TABLE cours(
   id INT,
   nom VARCHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE inscription(
   id_personne INT,
   id_cours INT,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES personnes(id),
   FOREIGN KEY(id_1) REFERENCES cours(id)
);
