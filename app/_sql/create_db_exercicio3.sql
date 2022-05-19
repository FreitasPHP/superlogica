DROP DATABASE if EXISTS exercicio3;

CREATE DATABASE IF NOT EXISTS exercicio3;

use exercicio3;

CREATE TABLE usuario (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cpf VARCHAR(11) NOT NULL,
  nome VARCHAR(255) NOT NULL,
  PRIMARY KEY(id, cpf)
);

CREATE TABLE info (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cpf VARCHAR(11) NOT NULL,
  genero char(1) NOT NULL,
  ano_nascimento CHAR(4) NOT NULL,
  PRIMARY KEY(id)   
);


INSERT INTO usuario(cpf, nome) VALUES
(16798125050, 'Luke Skywalker'),
(59875804045, 'Bruce Wayne'),
(04707649025, 'Diane Prince'),
(21142450040, 'Bruce Banner'),
(83257946074, 'Harley Quinn'),
(07583509025, 'Peter Parker'); 


INSERT INTO info(cpf, genero, ano_nascimento) VALUES
(16798125050, 'M', 1976),
(59875804045, 'M', 1960),
(04707649025, 'F', 1988),
(21142450040, 'M', 1954),
(83257946074, 'F', 1970),
(07583509025, 'M', 1972);

SELECT 
concat(usuario.nome, ' - ', info.genero) AS usuario,
if(YEAR(CURDATE()) - info.ano_nascimento > 50, 'SIM', 'NÃO') AS maior_50_anos
FROM usuario
INNER JOIN info ON info.cpf = usuario.cpf
WHERE usuario.cpf IN (16798125050, 07583509025, 21142450040)
ORDER BY 2;
