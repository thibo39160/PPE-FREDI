-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
-- Script g�n�r� le 25/10/2012 - SGBD cible : MySql version 4
-- G�n�ration d'un script SQL � partir d'une base Access V 1.0 - Pierre Loisel - CERTA
-- > Les n� auto pour des attributs non cl� primaire ont �t� transform�s en INTEGER.
-- > Les tables g�n�r�es sont de type InnoDb.
-- > Les cl�s �trang�res ne sont g�r�es que si MySql g�re les tables InnoDb.
-- > Le jeu de caract�res utilis� est LATIN-1.
-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
set names 'latin1';
create table `Adherents`(`numero-licence` INT not null,`Nom` VARCHAR(50),`Prenom` VARCHAR(50),`num-ligue` INT,`date_Naissance` DATETIME,`sexe` VARCHAR(50),primary key(`numero-licence`)) ;
create table `Demandeurs`(`adresse-mail` VARCHAR(50) not null,`nom` VARCHAR(50),`prenom` VARCHAR(50),`rue` VARCHAR(50),`cp` VARCHAR(50),`ville` VARCHAR(50),`num-recu` INT,`mdp` VARCHAR(50),`sexe` VARCHAR(50),primary key(`adresse-mail`)) ;
create table `lien`(`num-licence` INT not null,`adresse-mail` VARCHAR(50) not null,primary key(`num-licence`,`adresse-mail`)) ;
create table `Lignes-frais`(`adresse-mail` VARCHAR(50) not null,`date` VARCHAR(50) not null,`motif` VARCHAR(50),`trajet` VARCHAR(50),`km` INT,`cout-peage` INT,`cout-repas` INT,`cout-hebergement` INT,`km-valid�` INT,`peage-valid�` INT,`repas-valid�` INT,`hebergement-valid�` INT,primary key(`adresse-mail`,`date`)) ;
create table `Ligues`(`n�` INT not null,`Nom` VARCHAR(50),`sigle` VARCHAR(50),`pr�sident` VARCHAR(50),primary key(`n�`)) ;
create table `Motifs`(`libelle` VARCHAR(50) not null,primary key(`libelle`)) ;
alter table `lien` add foreign key (`num-licence`) references `Adherents`(`numero-licence`);
alter table `lien` add foreign key (`adresse-mail`) references `Demandeurs`(`adresse-mail`);
alter table `Lignes-frais` add foreign key (`adresse-mail`) references `Demandeurs`(`adresse-mail`);
alter table `Adherents` add foreign key (`num-ligue`) references `Ligues`(`n�`);
alter table `Lignes-frais` add foreign key (`motif`) references `Motifs`(`libelle`);
commit;
