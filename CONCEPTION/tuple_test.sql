-- Pour la table users
INSERT INTO users (username, password, email) VALUES
('matheo', 'password', 'matheo@example.com'),
('michel', 'password2', 'michel@example.com'),
('jean', 'password3',  'jean@gmail.com'),
('paul', 'password4', 'paul@gmail.com'),
('pierre', 'password5', 'pierre@gmail.com'),
('jacques', 'password6', 'jacques@gmail.com'),
('louis', 'password7', 'louis@gmail.com'),
('marie', 'password8', 'marie@gmail.com'),
('lucie', 'password9', 'lucie@gmail.com'),
('luc', 'password10', 'luc@gmail.com');

-- Pour la table cards
INSERT INTO cards (question, answer, explication, creation, lastPlay, nbPlay, ration, rationP) VALUES
('Question 1', 'Answer 1', 'Explanation 1', 123456789, 123456789, 5, 0.75, 0.8),
('Question 2', 'Answer 2', 'Explanation 2', 123456789, 123456789, 3, 0.5, 0.6),
('Question 3', 'Answer 3', 'Explanation 3', 123456789, 123456789, 2, 0.25, 0.4),
('Question 4', 'Answer 4', 'Explanation 4', 123456789, 123456789, 1, 0.1, 0.2),
('Question 5', 'Answer 5', 'Explanation 5', 123456789, 123456789, 0, 0.0, 0.0),
('Question 6', 'Answer 6', 'Explanation 6', 123456789, 123456789, 0, 0.0, 0.0),
('Question 7', 'Answer 7', 'Explanation 7', 123456789, 123456789, 0, 0.0, 0.0),
('Question 8', 'Answer 8', 'Explanation 8', 123456789, 123456789, 0, 0.0, 0.0),
('Question 9', 'Answer 9', 'Explanation 9', 123456789, 123456789, 0, 0.0, 0.0),
('Question 10', 'Answer 10', 'Explanation 10', 123456789, 123456789, 0, 0.0, 0.0);

-- Pour la table themes
INSERT INTO themes (subTheme, descriptionTheme) VALUES
(1, 'Cisco'),
(2, 'Linux'),
(3, 'Windows'),
(4, 'Programmation'),
(5, 'Réseau'),
(6, 'Sécurité'),
(7, 'Matériel'),
(8, 'Divers'),
(9, 'Jeux vidéo'),
(10, 'Système');

-- Pour la table themesCards
INSERT INTO themesCards (idTheme, idCard) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- Pour la table usersCards
INSERT INTO usersCards (idUser, idCard) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- Pour la table usersThemes
INSERT INTO usersThemes (idUser, idTheme) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- Pour la table subThemes
INSERT INTO subThemes (idTheme, idSubTheme) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);