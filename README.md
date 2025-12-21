# Site web Contact Manager

## Description

Ce projet est une application web basique de gestion des contacts.

À ce moment, seul le système d'authentification (connexion et inscription) est complètement opérationnel.

Le but de ce projet est de mettre en pratique PHP, MySQL et les concepts de base du développement web, en particulier l'authentification des utilisateurs et l'interaction avec les bases de données.


## Technologies utilisées


**HTML** – Structure des pages

**Bootstrap** – Conception et style réactifs

**PHP** – Logique côté serveur

**MySQ**L – Base de données pour le stockage des données utilisateur


## Fonctionnalités implémentées


Inscription des utilisateurs

Connexion des utilisateurs

Authentification basée sur les sessions

Validation de formulaire de base

Traduit avec DeepL.com (version gratuite)




## Script mysql utilisé pour créer la base de données

```
CREATE DATABASE contactmanager;
USE contactmanager;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    inscriptiondate DATE NOT NULL DEFAULT CURRENT_DATE
);

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    number VARCHAR(20) NOT NULL,
    owner INT NOT NULL,
    FOREIGN KEY (owner) REFERENCES users(id)
);

```

## UML diagramme de class

<img width="1124" height="547" alt="image" src="https://github.com/user-attachments/assets/36b5bf77-ac67-4789-ba43-f9cfcddc4292" />

## UML diagramme de cas d'utilisation,

<img width="659" height="948" alt="image" src="https://github.com/user-attachments/assets/4e8e829f-28da-425c-833a-c6246db8a7e4" />
