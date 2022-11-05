

CREATE TABLE picture (
                         id_picture INT UNSIGNED NOT NULL  AUTO_INCREMENT,
                         picture_label VARCHAR (255),
                         PRIMARY KEY (id_picture),
                         INDEX (picture_label)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





/*Table période qui prend en paramètre chaque mois de l'année*/

CREATE TABLE period (
                        id_period INT UNSIGNED NOT NULL  AUTO_INCREMENT,
                        period_label VARCHAR (255),
                        date_start DATETIME,
                        date_end DATETIME,
                        PRIMARY KEY (id_period),
                        INDEX (period_label)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


/*Table qui prend en paramètre les themes des voyages*/

CREATE TABLE theme (
                          id_category INT UNSIGNED NOT NULL  AUTO_INCREMENT,
                          category_label VARCHAR (255),
                          PRIMARY KEY (id_category),
                          INDEX (category_label)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table qui prend en paramètre les continents des voyages*/

CREATE TABLE continent (
                         id_continent INT UNSIGNED NOT NULL  AUTO_INCREMENT,
                         continent_label VARCHAR (255),
                         PRIMARY KEY (id_continent),
                         INDEX (continent_label)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table qui prend en paramètre les pays des voyages*/

CREATE TABLE country (
                         id_country INT UNSIGNED NOT NULL  AUTO_INCREMENT,
                         country_label VARCHAR (255),
                         PRIMARY KEY (id_country),
                         INDEX (country_label),
                         continent_id INT(11) UNSIGNED NOT NULL,
                         FOREIGN KEY (continent_id)
                        REFERENCES continent(id_continent),
                         

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



/*Table qui prend en paramètre les séjours des voyages*/


CREATE TABLE  journey (
                         id_journey INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                         title VARCHAR (255) NOT NULL,
                         content TEXT NOT NULL,
                         abstract TEXT NOT NULL,
                         category_id INT(11) UNSIGNED NOT NULL,
                         period_id INT(11) UNSIGNED NOT NULL ,
                         country_id INT(11) UNSIGNED NOT NULL,
                             FOREIGN KEY (country_id)
                                REFERENCES country(id_country),
                             FOREIGN KEY (period_id)
                                 REFERENCES period(id_period),
                             FOREIGN KEY (country_id)
                                 REFERENCES country(id_country)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


/*Table qui prend en paramètre les photos attribuées aux voyages*/


CREATE TABLE journey_picture (
                         id_journey_picture INT UNSIGNED NOT NULL  AUTO_INCREMENT,
                         journey_picture_label VARCHAR (255),
                         PRIMARY KEY (id_journey_picture),
                         INDEX (journey_picture_label),
                        journey_id INT(11) UNSIGNED NOT NULL,
                        FOREIGN KEY (journey_id)
                        REFERENCES journey(id_journey),

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table qui prend en paramètre les utilisateurs*/

CREATE TABLE  user (
                         id_user INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        firstname VARCHAR (255) NOT NULL,
                         lastname VARCHAR (255) NOT NULL,
                         email TEXT NOT NULL,
                         adress VARCHAR (255) NOT NULL,
                         pass VARCHAR (255) NOT NULL,
                         role_user_id INT(11) UNSIGNED NOT NULL,

                             FOREIGN KEY (role_user_id)
                                REFERENCES role_user(id_role_user)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



/*Table qui prend en paramètre les rôles utilisateurs*/

CREATE TABLE role_user (

    id_role_user INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    role_user_label VARCHAR (255)


);

DROP TABLE IF EXISTS subject;

CREATE TABLE subject(
                        `id_subject` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                        `subject_label` VARCHAR(255) NOT NULL UNIQUE,
                        PRIMARY KEY (`id_subject`),
                        INDEX (`subject_label`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS status;

CREATE TABLE status (
                        `id_status` INT UNSIGNED NOT NULL  AUTO_INCREMENT,
                        `status_label` VARCHAR (255),
                        PRIMARY KEY (id_status),
                        INDEX (status_label)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS request;

CREATE TABLE request (
                         `id_request` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                         `createdAt` DATETIME NOT NULL,
                         `firstname` VARCHAR (255) NOT NULL,
                         `lastname` VARCHAR (255) NOT NULL,
                         `email` VARCHAR (255) NOT NULL,
                         `phone` VARCHAR (40) NOT NULL,
                         `content` TEXT NOT NULL,
                         `subject_id` INT(11) UNSIGNED NOT NULL,
                         `status_id` INT UNSIGNED NOT NULL ,
                         CONSTRAINT `fk_id_subject`
                             FOREIGN KEY (`subject_id`)
                                 REFERENCES subject(`id_subject`),
                         CONSTRAINT `fk_status_id`
                             FOREIGN KEY (`status_id`)
                                 REFERENCES status(`id_status`),
                         INDEX (`status_id`),
                         INDEX (`subject_id`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;