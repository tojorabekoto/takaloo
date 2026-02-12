create database takalo_takalo;
use takalo_takalo;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(45) NOT NULL,
  email VARCHAR(45) NOT NULL,
  mot_de_passe VARCHAR(255) NOT NULL,
  status VARCHAR(20) NOT NULL
);

CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(45) NOT NULL
);

CREATE TABLE produits (
  id INT AUTO_INCREMENT PRIMARY KEY,
  owner_id INT NOT NULL,
  FOREIGN KEY (owner_id) REFERENCES users(id),
  nom VARCHAR(45) NOT NULL,
  categorie_id INT NOT NULL,
  description VARCHAR(255),
  photos VARCHAR(255)
);
