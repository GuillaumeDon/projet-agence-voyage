/* Création de l'utilisateur 'admin' pour les gestionnaires du site internet*/

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'mdptest';

GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' WITH GRANT OPTION;

FLUSH PRIVILEGES;


