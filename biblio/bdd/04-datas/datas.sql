/* Contenue de la table continent*/

INSERT INTO continent(continent_label)
VALUES
('Europe'),
('Asie'),
('Amérique'),
('Afrique'),
('Océanie');


/* Contenue de la table pays*/

INSERT INTO country(country_label, continent_id)
VALUES
('Thaïlande','2'),
('Maroc','4'),
('Alaska','3'),
('Espagne','1'),
('Australie','5'),
('Nouvelle-Zélande','5'),
('Vietnam','2'),
('Croatie','1')
;



/* Contenue des themes des voyages*/


INSERT INTO theme (`category_label`)
VALUES
    ('Gastronomique'),
    ('Nature et aventure'),
    ('Détente & bien-être'),
    ('Culture et patrimoine');

/* Contenue de la table period*/

INSERT INTO period (`period_label`)
VALUES
    ('Janvier'),
    ('Février'),
    ('Mars'),
    ('Avril'),
    ('Mai'),
    ('Juin'),
    ('Juillet'),
    ('Août'),
    ('Septembre'),
    ('Octobre'),
    ('Novembre'),
    ('Décembre');


INSERT INTO journey (title,content, abstract, category_id, period_id, country_id)
VALUES
    ('Semaine de méditation à Bangkok',
     'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget ligula semper, aliquet lorem at, fermentum erat. Nulla arcu arcu, sagittis eu tristique sit amet, vestibulum in ligula. Phasellus sit amet sapien at nunc vestibulum pretium vitae ut quam. Phasellus vel neque nec libero placerat fermentum. Mauris et ultrices arcu, ut blandit diam. Nulla placerat mollis turpis. Nulla ut sapien eget tortor egestas viverra. Vivamus et feugiat libero. Praesent consectetur nulla id nunc malesuada fringilla. In faucibus felis lacus. Cras elementum eu velit rutrum lacinia. Morbi dapibus erat sed mauris luctus aliquet. Ut id leo in magna euismod malesuada. Praesent porttitor, felis nec tempor posuere, leo odio sollicitudin orci, vel suscipit felis enim ac nisi.

Ut consectetur, tellus id posuere posuere, ex purus sodales ipsum, a varius diam eros sit amet dui. Aenean finibus semper nunc, non mattis velit pellentesque at. Fusce nec velit purus. Nam semper felis non nibh viverra, sit amet luctus elit tempus. Nullam pellentesque dictum mauris non laoreet. Phasellus sagittis rutrum lectus, non vehicula leo. Vestibulum suscipit non diam in tempor. Duis mollis libero quis efficitur tincidunt. Fusce eu mi quis odio eleifend facilisis ut at diam. Donec accumsan est lacus, quis eleifend leo porttitor a. Cras ac elementum risus. Aliquam augue turpis, imperdiet non tortor eu, suscipit aliquet sapien. Cras sit amet ultrices felis. Aenean ultrices mauris nec porta congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
     'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget ligula semper, aliquet lorem at, fermentum erat. Nulla arcu arcu, sagittis eu tristique sit amet, vestibulum in ligula. Phasellus sit amet sapien at nunc vestibulum pretium vitae ut quam. Phasellus vel neque nec libero placerat fermentum. Mauris et ultrices arcu, ut blandit diam. Nulla placerat mollis turpis. Nulla ut sapien eget tortor egestas viverra. Vivamus et feugiat libero. ',
     '3',
     '5',
     '1'
     );


     INSERT INTO journey_picture (journey_picture_label,journey_id)
VALUES
    ('thailande.jpg','1'),
    ('thailande2.jpg','1'),
    ('thailande3.jpg','1')

;