create database finalproject;
use finalproject;
create table fp_membre (
    id_membre int primary key auto_increment,
    nom varchar(100),
    date_naissance date,
    genre char(1),
    email varchar(50),
    ville varchar (50),
    mdp varchar(50),
    image_profile varchar(100)
);
create table fp_categorie_objet (
    id_categorie int primary key auto_increment,
    nom_categorie varchar(50)
);
create table fp_objet (
    id_objet int primary key auto_increment,
    nom_objet varchar(100),
    id_categorie int,
    id_membre int,
    foreign key (id_categorie) references fp_categorie_objet(id_categorie),
    foreign key (id_membre) references fp_membre(id_membre)
);
create table fp_images_objet (
    id_image int primary key auto_increment,
    id_objet int,
    nom_image varchar(100),
    foreign key (id_objet) references fp_objet(id_objet)
);
create table fp_emprunt (
    id_emprunt int primary key auto_increment,
    id_objet int,
    id_membre int,
    date_emprunt date,
    date_retour date,
    foreign key (id_objet) references fp_objet(id_objet),
    foreign key (id_membre) references fp_membre(id_membre)
);

insert into fp_membre (nom, date_naissance, genre, email, ville, mdp, image_profile) values
('Dupont', '1985-06-15', 'M', 'jean.dupont@example.com', 'Paris', 'password123', 'profile1.jpg'),
('Martin', '1990-03-22', 'F', 'claire.martin@example.com', 'Lyon', 'securepass', 'profile2.jpg'),
('Durand', '1982-11-08', 'M', 'pierre.durand@example.com', 'Marseille', 'mypassword', 'profile3.jpg'),
('Lemoine', '1995-07-30', 'F', 'sophie.lemoine@example.com', 'Toulouse', 'pass1234', 'profile4.jpg');

insert into fp_categorie_objet (nom_categorie) values
("esthetique"),
("bricolage"),
("mecanique"),
("cuisine");

insert into fp_objet (nom_objet, id_categorie, id_membre) values
('Objet1_Dupont', 1, 1),
('Objet2_Dupont', 2, 1),
('Objet3_Dupont', 3, 1),
('Objet4_Dupont', 4, 1),
('Objet5_Dupont', 1, 1),
('Objet6_Dupont', 2, 1),
('Objet7_Dupont', 3, 1),
('Objet8_Dupont', 4, 1),
('Objet9_Dupont', 1, 1),
('Objet10_Dupont', 2, 1),

('Objet1_Martin', 3, 2),
('Objet2_Martin', 4, 2),
('Objet3_Martin', 1, 2),
('Objet4_Martin', 2, 2),
('Objet5_Martin', 3, 2),
('Objet6_Martin', 4, 2),
('Objet7_Martin', 1, 2),
('Objet8_Martin', 2, 2),
('Objet9_Martin', 3, 2),
('Objet10_Martin', 4, 2),

('Objet1_Durand', 1, 3),
('Objet2_Durand', 2, 3),
('Objet3_Durand', 3, 3),
('Objet4_Durand', 4, 3),
('Objet5_Durand', 1, 3),
('Objet6_Durand', 2, 3),
('Objet7_Durand', 3, 3),
('Objet8_Durand', 4, 3),
('Objet9_Durand', 1, 3),
('Objet10_Durand', 2, 3),

('Objet1_Lemoine', 3, 4),
('Objet2_Lemoine', 4, 4),
('Objet3_Lemoine', 1, 4),
('Objet4_Lemoine', 2, 4),
('Objet5_Lemoine', 3, 4),
('Objet6_Lemoine', 4, 4),
('Objet7_Lemoine', 1, 4),
('Objet8_Lemoine', 2, 4),
('Objet9_Lemoine', 3, 4),
('Objet10_Lemoine', 4, 4);

insert into fp_emprunt (id_objet, id_membre, date_emprunt, date_retour) values
(1, 2, '2023-10-01', '2023-10-10'),
(2, 3, '2023-10-02', '2023-10-12'),
(3, 4, '2023-10-03', '2023-10-13'),
(4, 1, '2023-10-04', '2023-10-14'),
(5, 2, '2023-10-05', '2023-10-15'),
(6, 3, '2023-10-06', '2023-10-16'),
(7, 4, '2023-10-07', '2023-10-17'),
(8, 1, '2023-10-08', '2023-10-18'),
(9, 2, '2023-10-09', '2023-10-19'),
(10, 3, '2023-10-10', '2023-10-20');

select * from fp_objet as o where id_membre = %d;   

-- create or replace view v_info_objet as select  
-- o.id_objet, 
-- o.nom_objet, 
-- o.description_objet, 
-- o.date_creation, 
-- m.nom_membre, 
-- m.email_membre, 
-- c.nom_categorie
-- from fp_objet as o
-- join fp_membre as m on o.id_membre=m.id_membre
-- join fp_categorie_objet as c on o.id_categorie=c.id_categorie;