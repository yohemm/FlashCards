-- createdb -h localhost -U postgres cardsystem
CREATE TABLE IF NOT EXISTS users (
   id serial PRIMARY KEY,
   username VARCHAR(60) UNIQUE NOT NULL,
   password VARCHAR(80) NOT NULL,
   email VARCHAR(60) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS cards (
   idCard serial PRIMARY KEY,
   question VARCHAR(60) UNIQUE NOT NULL,
   answer VARCHAR(80) NOT NULL,
   explication VARCHAR(80),
   creation INT NOT NULL,
   lastPlay INT NOT NULL,
   nbPlay INT NOT NULL,
   ration FLOAT(50) NOT NULL,
   rationP FLOAT(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS themes (
   idTheme serial PRIMARY KEY,
   subTheme INT,
   descriptionTheme VARCHAR(250)
);

CREATE TABLE IF NOT EXISTS themesCards (
   idThemeCard serial PRIMARY KEY,
   idTheme INT NOT NULL,
   idCard INT NOT NULL
);

CREATE TABLE IF NOT EXISTS usersCards (
   idUserCard serial PRIMARY KEY,
   idUser INT NOT NULL,
   idCard INT NOT NULL
);

CREATE TABLE IF NOT EXISTS usersThemes (
   idUserTheme serial PRIMARY KEY,
   idUser INT NOT NULL,
   idTheme INT NOT NULL
);

CREATE TABLE IF NOT EXISTS subThemes (
   idThemeSubTheme serial PRIMARY KEY,
   idTheme INT NOT NULL,
   idSubTheme INT NOT NULL
);
