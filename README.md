# <center> Programmation Web 3 | Projet PHP </center>

Prénom : <em>Aymerick</em>

Nom : <em>LAURETTA-PERONNE</em>

----

__Objectif__ : Le but de ce projet est de créer un site web qui permettant de créer un compte, de s'y connecté et de pouvoir y déposer un fichier et de le consulter.

__Résultat__ : Ce programme répond à l'objectif de créer un site web qui permettrait de créer un compte, de s'y connecter et de pouvoir y déposer un fichier et de le consulter.

<a href="https://github.com/BenjaminPeronne/Web3_Project">Lien GitHub</a> | <a href="https://benjaminperonne.fr/src/digital_safe">Lien vers le site web projet</a> | <a href="https://github.com/BenjaminPeronne/Web3_Project/blob/main/Projet_programmation_WEB.pdf">Lien vers le PDF</a>

---

Ce projet respect le modèle MVC, il est composé de 4 dossier :
```
---- Controllers 
-------- controller.php 

---- Models
-------- config
-------- model.php 
----------------config.php 

---- public
-------- styles
---------------- main.css
-------- uploads

---- Views
-------- frontend
---------------- error.php
---------------- connection.php
---------------- register.php
---------------- template.php

-- index.php
```

```
controller.php : Contient les fonctions qui permettent de gérer les requêtes et la logique du site.

config.php : Contient les informations de connexion à la base de données.

model.php : Contient divers fonctions de création de requêtes SQL.

index.php : Contient les fonctions qui permettent de gérer le template.

template.php : Contient les bases HTML du site.
```

---
# Web_3 Project (Digital Safe)

We want to set up a digital safe. The site will be made in PHP and HTML. On the server there are two files and a directory. We must be able to connect, create an account, upload and retrieve a file.

With the MVC model for this project.

## Connection

We use the index.html which present :
- login & password form
- link to create account (if don't have) 

The validation of the form must call on the `controller_connexion.php `

The click on the link allows to call the view `creation_compte.php`

## For a logged in user
The correct identifiers in the database must allow this controller to call the `vue_coffre.php` which displays:
- the link of the file contained in the safe as well as a form for sending a file allowing the addition (in the case of an empty safe or the replacement in the case of a safe already equipped with a file.
- A link allowing disconnection

## For managing the open safe
Validation of the form in `vue_coffre.php` must call on `controleur_coffre.php` for file management:
- If a file exists, it is deleted using its link present in the database and then the new file is imported by updating its path in the database
- If no file is present, the import is carried out and its path is updated in the database

## Database

```
mysql> DESCRIBE users;
+----------+--------------+------+-----+---------+----------------+
| Field    | Type         | Null | Key | Default | Extra          |
+----------+--------------+------+-----+---------+----------------+
| id       | bigint(20)   | NO   | PRI | NULL    | auto_increment |
| username | varchar(500) | NO   |     | NULL    |                |
| password | varchar(500) | NO   |     | NULL    |                |
| link     | varchar(500) | YES  |     | NULL    |                |
+----------+--------------+------+-----+---------+----------------+
4 rows in set (0,01 sec)
```

```sql
CREATE TABLE users
(
  id                INT unsigned NOT NULL AUTO_INCREMENT,
  username          VARCHAR(500) NOT NULL,               
  password          VARCHAR(500) NOT NULL,                
  link              VARCHAR(500) NOT NULL,                
  PRIMARY KEY       (id)                                  
);
```