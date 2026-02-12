DROP TABLE IF EXISTS salaire_chauffeur;
DROP TABLE IF EXISTS versement_minimum;
DROP TABLE IF EXISTS panne;
DROP TABLE IF EXISTS trajet;
DROP TABLE IF EXISTS chauffeur;
DROP TABLE IF EXISTS vehicule;

CREATE DATABASE betax;
use betax;
-- Vehicule
CREATE TABLE vehicule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    matricule VARCHAR(50) UNIQUE NOT NULL,
    marque VARCHAR(100),
    modele VARCHAR(100)
) ENGINE=InnoDB;

-- Chauffeur
CREATE TABLE chauffeur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100)
) ENGINE=InnoDB;

-- Trajet
CREATE TABLE trajet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_vehicule INT NOT NULL,
    id_chauffeur INT NOT NULL,
    point_depart VARCHAR(100) NOT NULL,
    point_arrivee VARCHAR(100) NOT NULL,
    distance_km DECIMAL(10,2) NOT NULL,
    date_debut DATETIME NOT NULL,
    date_fin DATETIME NOT NULL,
    recette DECIMAL(10,2) NOT NULL,
    carburant DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_trajet_vehicule
        FOREIGN KEY (id_vehicule) REFERENCES vehicule(id),
    CONSTRAINT fk_trajet_chauffeur
        FOREIGN KEY (id_chauffeur) REFERENCES chauffeur(id)
) ENGINE=InnoDB;

-- Panne
CREATE TABLE panne (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_vehicule INT NOT NULL,
    date_debut_panne DATE NOT NULL,
    date_fin_panne DATE NOT NULL,
    CONSTRAINT fk_panne_vehicule
        FOREIGN KEY (id_vehicule) REFERENCES vehicule(id)
) ENGINE=InnoDB;

-- Versement minimum
CREATE TABLE versement_minimum (
    id_vehicule INT PRIMARY KEY,
    montant_minimum DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_versement_vehicule
        FOREIGN KEY (id_vehicule) REFERENCES vehicule(id)
) ENGINE=InnoDB;

-- Salaire chauffeur
CREATE TABLE salaire_chauffeur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_chauffeur INT NOT NULL,
    date_jour DATE NOT NULL,
    montant_salaire DECIMAL(10,2) NOT NULL,
    pourcentage_applique DECIMAL(5,2) NOT NULL,
    CONSTRAINT fk_salaire_chauffeur
        FOREIGN KEY (id_chauffeur) REFERENCES chauffeur(id)
) ENGINE=InnoDB;


INSERT INTO vehicule (matricule, marque, modele) VALUES
('ABC-123', 'Toyota', 'Hiace'),
('DEF-456', 'Nissan', 'Caravan'),
('GHI-789', 'Hyundai', 'H1');

INSERT INTO chauffeur (nom, prenom) VALUES
('Randria', 'Marc'),
('Rakoto', 'Jean'),
('Rasol', 'Andry');

INSERT INTO versement_minimum VALUES
(1, 50000),
(2, 60000),
(3, 55000);

INSERT INTO trajet VALUES
(NULL,1,1,'Andoharanofotsy','Ambohibao',15,'2025-12-10 08:00','2025-12-10 09:00',40000,15000),
(NULL,1,1,'Ambohibao','Andoharanofotsy',15,'2025-12-10 10:00','2025-12-10 11:00',38000,14000),
(NULL,2,2,'Anosy','Analakely',5,'2025-12-10 09:00','2025-12-10 09:30',15000,5000),
(NULL,2,2,'Analakely','Anosy',5,'2025-12-10 10:00','2025-12-10 10:30',17000,6000),
(NULL,3,3,'Itaosy','Anosizato',7,'2025-12-10 07:30','2025-12-10 08:00',20000,7000);

INSERT INTO panne VALUES
(NULL,3,'2025-12-11','2025-12-12');

INSERT INTO salaire_chauffeur (id_chauffeur, date_jour, montant_salaire, pourcentage_applique) VALUES
(1, '2025-12-10', 50000, 10),
(2, '2025-12-11', 60000, 15),
(3, '2025-12-12', 55000, 12);
