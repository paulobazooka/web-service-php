DROP TABLE IF EXISTS usuario;
DROP TABLE IF EXISTS solicitacao;

CREATE TABLE usuario(id INT PRIMARY KEY NOT NULL UNIQUE,
					 senha VARCHAR(50),
					 nome VARCHAR(75) NOT NULL,
					 email VARCHAR(40) NOT NULL UNIQUE,
					 datacadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP);


CREATE TABLE solicitacao(id INT PRIMARY KEY NOT NULL UNIQUE,
						 datasolicitacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
						 latitude DOUBLE PRECISION NOT NULL,
						 longitude DOUBLE PRECISION NOT NULL,
						 tipo VARCHAR(20) NOT NULL,
						 comentario TEXT,
						 foisolucionado BOOLEAN NOT NULL DEFAULT FALSE,
						 imagem VARCHAR(75),
						 usuarioId INT NOT NULL,
						 FOREIGN KEY(usuarioId) REFERENCES usuario(id));


INSERT INTO usuario(id, nome, email, senha) values
				   (1, 'Lucas Dias', 'lucas@dias.com', MD5('123')),
				   (2, 'Paulo Sérgio do Nascimento', 'paulo@nas.com', MD5('123')),
				   (3, 'Maria Amélia da Silva', 'maria@silva', MD5('123'));


INSERT INTO solicitacao(id, latitude, longitude, tipo, usuarioId) values
				   (1, -22.991111, -47.138806, 'BURACO', 1),
				   (2, -22.859589, -47.152802, 'BUEIRO ENTUPIDO', 2),
				   (3, -22.927446, -47.023605, 'LIMPEZA DE PRAÇA', 3);

