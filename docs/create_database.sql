CREATE DATABASE IF NOT EXISTS Arcadia CHARACTER SET utf8 COLLATE utf8_general_ci;

USE DATABASE Arcadia;

CREATE TABLE Aliment(
    id_aliment INT,
    nom VARCHAR(20) NOT NULL,
    type VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_aliment)
);

CREATE TABLE Zoo(
    id_zoo INT,
    nom VARCHAR(30) NOT NULL,
    PRIMARY KEY(id_zoo)
);

CREATE TABLE Habitat(
    id_habitat INT,
    nom VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    image_princ VARCHAR(100) NOT NULL,
    id_zoo INT NOT NULL,
    PRIMARY KEY(id_habitat),
    FOREIGN KEY(id_zoo) REFERENCES Zoo(id_zoo)
);

CREATE TABLE Utilisateur(
    id_utilisateur INT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50),
    email VARCHAR(150) NOT NULL,
    role VARCHAR(15) NOT NULL,
    password VARCHAR(50) NOT NULL,
    id_zoo INT NOT NULL,
    PRIMARY KEY(id_utilisateur),
    FOREIGN KEY(id_zoo) REFERENCES Zoo(id_zoo)
);

CREATE TABLE Commentaire(
    id_commentaire INT,
    pseudo VARCHAR(20) NOT NULL,
    avis TEXT NOT NULL,
    estValide BOOLEAN NOT NULL DEFAULT 0,
    id_zoo INT,
    PRIMARY KEY(id_commentaire),
    FOREIGN KEY(id_zoo) REFERENCES Zoo(id_zoo)
);

CREATE TABLE Service(
    id_service INT,
    nom VARCHAR(20) NOT NULL,
    description TEXT NOT NULL,
    image_service VARCHAR(100) NOT NULL,
    id_zoo INT NOT NULL,
    PRIMARY KEY(id_service),
    FOREIGN KEY(id_zoo) REFERENCES Zoo(id_zoo)
);

CREATE TABLE Horaire(
    id_horaire INT,
    jour DATE NOT NULL,
    heure_ouverture TIME NOT NULL,
    heure_fermeture TIME NOT NULL,
    id_zoo INT NOT NULL,
    PRIMARY KEY(id_horaire),
    FOREIGN KEY(id_zoo) REFERENCES Zoo(id_zoo)
);

CREATE TABLE Image_Habitat(
    id_image_habitat INT,
    nom VARCHAR(100),
    id_habitat INT NOT NULL,
    PRIMARY KEY(id_image_habitat),
    FOREIGN KEY(id_habitat) REFERENCES Habitat(id_habitat)
);

CREATE TABLE Animal(
    id_animal INT,
    prenom VARCHAR(100) NOT NULL,
    race VARCHAR(20) NOT NULL,
    image_princ VARCHAR(100) NOT NULL,
    id_habitat INT NOT NULL,
    PRIMARY KEY(id_animal),
    FOREIGN KEY(id_habitat) REFERENCES Habitat(id_habitat)
);

CREATE TABLE Image_Animal(
    id_image_animal INT,
    nom VARCHAR(100),
    id_animal INT NOT NULL,
    PRIMARY KEY(id_image_animal),
    FOREIGN KEY(id_animal) REFERENCES Animal(id_animal)
);

CREATE TABLE Compte_rendu(
    id_animal INT,
    id_aliment INT,
    id_utilisateur INT,
    grammage DECIMAL(15,2) NOT NULL,
    date_time DATETIME NOT NULL,
    etat VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_animal, id_aliment, id_utilisateur),
    FOREIGN KEY(id_animal) REFERENCES Animal(id_animal),
    FOREIGN KEY(id_aliment) REFERENCES Aliment(id_aliment),
    FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
);

CREATE TABLE Repas(
    id_animal INT,
    id_aliment INT,
    id_utilisateur INT,
    quantite DECIMAL(15,2) NOT NULL,
    date_time DATETIME NOT NULL,
    PRIMARY KEY(id_animal, id_aliment, id_utilisateur),
    FOREIGN KEY(id_animal) REFERENCES Animal(id_animal),
    FOREIGN KEY(id_aliment) REFERENCES Aliment(id_aliment),
    FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
);

INSERT INTO Aliment (nom, type) VALUES
('Banane', 'Fruit'),
('Pomme', 'Fruit'),
('Carotte', 'Légume');

INSERT INTO Zoo (nom) VALUES
('Zoo de Brocéliande');

INSERT INTO Habitat (nom, description, image_princ, id_zoo) VALUES
('Savane', 'Habitat pour les animaux de la savane', 'savane.jpg', 1),
('Jungle', 'Habitat pour les animaux de la jungle', 'jungle.jpg', 1),
('Marais', 'Habitat pour les animaux des marais', 'marais.jpg', 1);

INSERT INTO Animal (prenom, race, image_princ, id_habitat) VALUES
('Nico', 'Vélociraptor', 'velociraptor.jpg', 2),
('Wivine', 'Spinosaurus', 'spinosaurus.jpg', 1),
('Explo', 'Oryctodromeus', 'oryctodromeus.jpg', 1),
('Killa', 'Sarcosuchus', 'sarcosuchus.jpg', 3),
('Capt', 'Diplodocus', 'diplodocus.jpg', 1);
