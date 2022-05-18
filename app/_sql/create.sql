DROP DATABASE if EXISTS superlogica;
CREATE DATABASE IF NOT EXISTS superlogica;

use superlogica;

CREATE TABLE usuario (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  userName VARCHAR(255) NOT NULL,
  zipCode VARCHAR(64),
  email VARCHAR(128) NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT current_timestamp(),
  updated_at TIMESTAMP DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY(id)
);
