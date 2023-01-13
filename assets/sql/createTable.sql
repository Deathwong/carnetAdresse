create table IF NOT EXISTS adresse (
    id INT NOT NULL AUTO_INCREMENT,
    numeroRue INT (3),
    nomRue VARCHAR (50),
    ville VARCHAR (50) not NULL,
    pays VARCHAR (20) not null,
    codePostal VARCHAR (5) not null,
    region VARCHAR (100),
    departement VARCHAR (100),
    lieuDit VARCHAR (10),
    complementUn VARCHAR (50),
    complementDeux VARCHAR (50),
    complementTrois VARCHAR (50),
    PRIMARY KEY (id)
)ENGINE=InnoDB;

create table IF NOT EXISTS contact (
    id INT NOT NULL AUTO_INCREMENT,
    idAdresse INT,
    nom VARCHAR (50) NOT NULL,
    prenom VARCHAR (50) NOT NULL,
    surnom VARCHAR (50),
    telephone VARCHAR (20) NOT NULL,
    email VARCHAR (100),
    age INT(3),
    dateAnniversaire DATE,
    sexe VARCHAR (10),
    reseauSocial VARCHAR (10),
    profession VARCHAR (100),
   	situationFamiliale VARCHAR(100),
    note VARCHAR (100),
    PRIMARY KEY (id),
    constraint fk_adresse FOREIGN key (idAdresse) references adresse(id)
)ENGINE=InnoDB;
