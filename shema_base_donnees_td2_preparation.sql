CREATE TABLE 'Categorie'
(
    'id'        int(11)      NOT NULL AUTO_INCREMENT,
    'nom'       varchar(128) NOT NULL,
    'descr'     varchar(128),
    'idannonce' int(11),
    PRIMARY KEY (`id`),
    CONSTRAINT fk_annonce
        FOREIGN KEY (idannonce)
            REFERENCES annonce (id)
);

CREATE TABLE 'annonce'
(
    'id'          int(11)      NOT NULL AUTO_INCREMENT,
    'titre'       varchar(128) NOT NULL,
    'date'        DATE,
    'texte'       varchar(128),
    'idcategorie' int(11),
    'idphoto'     int(11),
    PRIMARY KEY (`id`),
    CONSTRAINT fk_categorie
        FOREIGN KEY (idcategorie)
            REFERENCES Categorie (id),
    CONSTRAINT fk_photo
        FOREIGN KEY (idphoto)
            REFERENCES photo (id)
);


CREATE TABLE 'photo'
(
    'id'           int(11)      NOT NULL AUTO_INCREMENT,
    'file'         varchar(128) NOT NULL,
    'date'         DATE,
    'taille_octet' int(12),
    'idannonce'    int(11),
    PRIMARY KEY (id),
    CONSTRAINT fk_annonce
        FOREIGN KEY (idannonce)
            REFERENCES annonce (id)
);
