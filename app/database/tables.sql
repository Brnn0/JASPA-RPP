DROP TABLE usuarios;

-- tabelas um pra muitos

CREATE TABLE IF NOT EXISTS usuarios (
    id              INTEGER PRIMARY KEY,
    id_score        INTEGER,
    loginUsuario    NVARCHAR(15),
    senhaUsuario    NVARCHAR(15),

    
    FOREIGN KEY (id_score) REFERENCES score (id)
);

DROP TABLE IF EXISTS score;
CREATE TABLE IF NOT EXISTS score (
    id              INTEGER PRIMARY KEY,  
    score           INTEGER
);

-- tabelas muitos pra muitos

DROP TABLE IF EXISTS animal;
CREATE TABLE IF NOT EXISTS animal (
    id              INTEGER PRIMARY KEY,
    nome            VARCHAR(10),
    especie         VARCHAR(10),
    habitat         VARCHAR(10),
    info            VARCHAR(200)
);

DROP TABLE IF EXISTS ameaca;
CREATE TABLE IF NOT EXISTS ameaca (
    id              INTEGER PRIMARY KEY,
    nome            VARCHAR(10)
);

DROP TABLE IF EXISTS animal_ameaca;
CREATE TABLE IF NOT EXISTS animal_ameaca (
    id              INTEGER PRIMARY KEY,
    id_animal       INTEGER,
    id_ameaca       INTEGER,

    FOREIGN KEY (id_animal) REFERENCES animal (id),
    FOREIGN KEY (id_ameaca) REFERENCES ameaca (id_ameaca)
    
);

