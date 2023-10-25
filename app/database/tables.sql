DROP TABLE IF EXISTS score;
DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS animais;

CREATE TABLE IF NOT EXISTS usuarios (
    id              INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome            TEXT    NOT NULL,
    dataNascimento  TEXT    NOT NULL,
    email           TEXT    NOT NULL,
    tipo            INTEGER NOT NULL,
    senha           TEXT    NOT NULL

);

CREATE TABLE IF NOT EXISTS score (
    id_user         INTEGER,
    id              INTEGER PRIMARY KEY AUTO_INCREMENT,
    score           INTEGER,

        FOREIGN KEY (id_user) REFERENCES usuarios (id)
);


CREATE TABLE IF NOT EXISTS animais (
    id              INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome            TEXT NOT NULL,
    foto            TEXT NOT NULL,
    ameaca          TEXT NOT NULL,
    info            TEXT NOT NULL,
    situacao        BOOLEAN NOT NULL
);

