-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
-- Script généré le 25/10/2012 - SGBD cible : MySql version 4
-- Génération d'un script SQL à partir d'une base Access V 1.0 - Pierre Loisel - CERTA
-- > Les n° auto pour des attributs non clé primaire ont été transformés en INTEGER.
-- > Les tables générées sont de type InnoDb.
-- > Les clés étrangères ne sont gérées que si MySql gère les tables InnoDb.
-- > Le jeu de caractères utilisé est LATIN-1.
-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
set names 'latin1';
create table `Adherents`(`numero-licence` INT not null,`Nom` VARCHAR(50),`Prenom` VARCHAR(50),`num-ligue` INT,`date_Naissance` DATETIME,`sexe` VARCHAR(50),primary key(`numero-licence`)) ;
create table `Demandeurs`(`adresse-mail` VARCHAR(50) not null,`nom` VARCHAR(50),`prenom` VARCHAR(50),`rue` VARCHAR(50),`cp` VARCHAR(50),`ville` VARCHAR(50),`num-recu` INT,`mdp` VARCHAR(50),`sexe` VARCHAR(50),primary key(`adresse-mail`)) ;
create table `lien`(`num-licence` INT not null,`adresse-mail` VARCHAR(50) not null,primary key(`num-licence`,`adresse-mail`)) ;
create table `Lignes-frais`(`adresse-mail` VARCHAR(50) not null,`date` VARCHAR(50) not null,`motif` VARCHAR(50),`trajet` VARCHAR(50),`km` INT,`cout-peage` INT,`cout-repas` INT,`cout-hebergement` INT,`km-validé` INT,`peage-validé` INT,`repas-validé` INT,`hebergement-validé` INT,primary key(`adresse-mail`,`date`)) ;
create table `Ligues`(`n°` INT not null,`Nom` VARCHAR(50),`sigle` VARCHAR(50),`président` VARCHAR(50),primary key(`n°`)) ;
create table `Motifs`(`libelle` VARCHAR(50) not null,primary key(`libelle`)) ;
alter table `lien` add foreign key (`num-licence`) references `Adherents`(`numero-licence`);
alter table `lien` add foreign key (`adresse-mail`) references `Demandeurs`(`adresse-mail`);
alter table `Lignes-frais` add foreign key (`adresse-mail`) references `Demandeurs`(`adresse-mail`);
alter table `Adherents` add foreign key (`num-ligue`) references `Ligues`(`n°`);
alter table `Lignes-frais` add foreign key (`motif`) references `Motifs`(`libelle`);
commit;
