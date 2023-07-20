DROP TABLE usuarios;

-- tabelas um pra muitos

CREATE TABLE IF NOT EXISTS usuarios (
    id              INTEGER PRIMARY KEY,
    user            TEXT,
    email           TEXT,
    senha           TEXT

);

DROP TABLE IF EXISTS score;
CREATE TABLE IF NOT EXISTS score (
    id_user         INTEGER,
    id              INTEGER PRIMARY KEY,  
    score           INTEGER,

        FOREIGN KEY (id_user) REFERENCES usuarios (id)
);
