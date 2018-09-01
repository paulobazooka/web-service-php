DROP TABLE IF EXISTS Usuario;
DROP TABLE IF EXISTS Solicitacao;
DROP TABLE IF EXISTS usuario;
DROP TABLE IF EXISTS solicitacao;

CREATE TABLE Usuario(id INT PRIMARY KEY NOT NULL UNIQUE,
					 nome VARCHAR(75) NOT NULL,
					 email VARCHAR(40) NOT NULL UNIQUE);

CREATE TABLE Solicitacao(id INT PRIMARY KEY NOT NULL UNIQUE,
						datasolicitacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
						latitude DOUBLE PRECISION NOT NULL,
						longitude DOUBLE PRECISION NOT NULL,
						tipo VARCHAR(20) NOT NULL,
						comentario TEXT,
						foisolucionado BOOLEAN NOT NULL DEFAULT FALSE);