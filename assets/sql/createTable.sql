create table IF NOT EXISTS contact (
    id INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR (50) NOT NULL,
    prenom VARCHAR (50) NOT NULL,
    telephone VARCHAR (20) NOT NULL,
    email VARCHAR (100),
    adresse VARCHAR (100),
    date_anniversaire DATE,
    note VARCHAR (100),
    PRIMARY KEY (id)
);