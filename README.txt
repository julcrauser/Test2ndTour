Ce dépôt comporte 4 dossiers :

-	UML : comportant le MCD

-	Relationnel : comportant le MLD

-	SQL : comportant 4 fichiers

Création des tables : create.sql  
Suppression des tables : delete.sql  
Remplissage de la bdd pour tester : insert.sql 
Création de la vue pour l’affichage des résultats de l’élection : resultat.sql

-	Site : comportant 12 pages HTML et PHP

Page d’accueil : accueil.html
Pour l’inscription : inscription.html, inscrire.php
Pour voter : votelogin.html, voter.php, ajoutervote.php
Pour candidater : candidaturelogin.html, candidater.php, ajoutercandidature.php
Pour administrer : administrateurlongin.html, administrateuraction.php, validercandidat.php

Ce qui n’a pas été fait :

-	Créer des utilisateurs sur la bdd, et gérer les permissions
-	Affichage du résultat de l’élection, verrouillage des votes
Solution imaginée : créer une table singleton qui permet de savoir si l’élection est finie ou non.