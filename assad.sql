CREATE DATABASE Assdzoo;
use Assadzoo;

CREATE TABLE habitats (
    id_habitat INT AUTO_INCREMENT PRIMARY KEY,
   nom VARCHAR (50), 
   typeclimat VARCHAR (50),
   description TEXT,
   zonezoo VARCHAR (100)
   );

   CREATE TABLE animaux (
    id_animal INT AUTO_INCREMENT PRIMARY key,
    nom VARCHAR (50),
    espèce VARCHAR (100),
    alimentation  VARCHAR (50) ,
    image  VARCHAR (100),
    paysorigine  VARCHAR (100),
    descriptioncourte TEXT,
    id_habitat INT,
    FOREIGN KEY (id_habitat) REFERENCES habitats(id_habitat)
);

CREATE TABLE utilisateurs (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR (50),
    email  VARCHAR (50),
    rôle  VARCHAR (50), 
    motpasse_hash  VARCHAR (100)
);

CREATE TABLE visitesguidees (
    id_vist INT AUTO_INCREMENT PRIMARY KEY ,
    titre VARCHAR (100) NOT NULL,
    dateheure DATETIME,
    langue VARCHAR (100) NOT NULL, 
    capacite_max INT,
    statut VARCHAR (50) DEFAULT 'OFFLINE',
    duree FLOAT, 
    prix FLOAT,
    idutilisateur INT,
    FOREIGN KEY (idutilisateur) REFERENCES utilisateurs(id_user)
);

CREATE TABLE etapesvisite (
    id_etape INT AUTO_INCREMENT PRIMARY KEY,
    titreetape VARCHAR (50) ,
    descriptionetape TEXT,
    ordreetape INT,
    id_visite INT,
    FOREIGN KEY (id_visite) REFERENCES visitesguidees(id_vist)
);

CREATE TABLE reservations (
    id_reservation INT AUTO_INCREMENT PRIMARY KEY,
    idvisite INT,
    idutilisateur INT,
    nbpersonnes INT NOT NULL,
    datereservation DATE,
    FOREIGN KEY (idvisite) REFERENCES visitesguidees (id_vist),
    FOREIGN KEY (idutilisateur) REFERENCES utilisateurs (id_user)

);

CREATE TABLE commentaires (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    idvisitesguides INT,
    idutilisateur INT,
    note INT,
    texte TEXT,
    date_commentaire DATETIME,
    FOREIGN KEY (idvisitesguides) REFERENCES visitesguidees (id_vist),
    FOREIGN KEY (idutilisateur) REFERENCES utilisateurs (id_user)
);

INSERT INTO animals 

