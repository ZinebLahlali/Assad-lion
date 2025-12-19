CREATE DATABASE assdzoo;
use assadzoo;

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

INSERT INTO habitats (nom, typeclimat, description, zonezoo,image) VALUES 
("Forêt Tropicale", "Humide", "Habitat pour singes, oiseaux et reptiles tropicaux.","Amazonie","https://img.freepik.com/photos-premium/erable-fougere-verte-dans-ruisseau-dans-foret-tropicale_46740-182.jpg?semt=ais_hybrid&w=740&q=80");


INSERT INTO animaux (nom, espèce, alimentation, image, paysorigine, descriptioncourte, id_habitat) VALUES
('Zèbre', 'Equus quagga', 'Herbivore', 'https://ici.exploratv.ca/upload/site/post/picture/1911/652061ea5a026.1765222003.jpg', 'Botswana', 'Zèbre avec des rayures noires et blanches.', 1),
('Éléphant', 'Loxodonta africana', 'Herbivore', 'https://medias.pourlascience.fr/api/v1/images/view/613f01863e45464ddb3791e6/wide_1000-webp/image.jpg', 'Afrique du Sud', 'Éléphant africain au grand corps.', 1),
('Hippopotame', 'Hippopotamus amphibius', 'Herbivore', 'https://www.mnhn.fr/system/files/styles/16_10_highest/private/2023-08/Hippopotame.jpg.webp?itok=1kc4iq7S', 'Zambie', 'Hippopotame vivant près des rivières et lacs.', 1),
('Girafe', 'Giraffa camelopardalis', 'Herbivore', 'https://www.monde-animal.fr/wp-content/uploads/2020/04/fiche-animale-monde-animal-girafe.jpg', 'Afrique du Sud', 'Girafe avec un long cou et des taches.', 1),
('Crocodile', 'Crocodylus niloticus', 'Carnivore', 'https://r.fashionunited.com/VHimOjTF8MmcC3BdMmsfOwihi1xbmSD1oV1Ccrt3PzA/resize:fit:1200:630:0/gravity:ce/quality:70/aHR0cHM6Ly9mYXNoaW9udW5pdGVkLmNvbS9pbWcvdXBsb2FkLzIwMjQvMDIvMjkvc2hlbGx5LWNvbGxpbnMteXBwbWJlcHlmZnEtdW5zcGxhc2gtb3BrNXhveGQtMjAyNC0wMi0yOS5qcGVn.jpeg', 'Égypte', 'Crocodile du Nil, prédateur puissant.', 1),
('Rhinocéros', 'Diceros bicornis', 'Herbivore', 'https://www.aquaportail.com/pictures2310/rhinocerotidae-ceratotherium-simum.jpg', 'Namibie', 'Rhinocéros noir, fort et rare.', 1),
('Guépard', 'Acinonyx jubatus', 'Carnivore', 'https://www.imagesdoc.com/wp-content/uploads/sites/33/2020/09/Capture-d%E2%80%99e%CC%81cran-2020-07-23-a%CC%80-15.18.49.png', 'Botswana', 'Guépard rapide, tacheté et svelte.', 1),
('Gorille', 'Gorilla beringei', 'Herbivore', 'https://safaris-a-la-carte.com/thumb/ar__x/f__jpg/h__288/q__60/w__420/zc__1/src/fichier/p_item/30543/item_img_fr_rwanda_family_of_gorillas_shutterstock_fiona_ayerst_74180836.jpg', 'Rwanda', 'Gorille de montagne, géant doux.', 4),
('Singe', 'Chlorocebus sabaeus', 'Omnivore', 'https://lemagdesanimaux.ouest-france.fr/images/tags/singe-084128.jpg', 'Kenya', 'Singe agile souvent trouvé dans la savane.', 4);






