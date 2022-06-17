CREATE DATABASE store;

USE store;

CREATE TABLE category (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(100) NOT NULL
);

CREATE TABLE product (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(100) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    valor FLOAT(7,2) NOT NULL,
    categoria_id INT(11) NOT NULL,
    quantity INT(5) NOT NULL,
    created_at DATETIME NOT NULL
);

CREATE TABLE clients (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL,
    telefone VARCHAR(11) UNIQUE NOT NULL,
    endereco VARCHAR(255) NOT NULL
);

INSERT INTO category (name, description)
VALUES
('informática', 'produtos de informática'),
('escritório', 'canetas, cadernos, folhas'),
('eletrônicos', 'tvs, celulares, som');

INSERT INTO product (name, description, photo, valor, categoria_id, quantity, created_at)
VALUES
('Dell GAMER G15-I1000-A20p', 'INTEL Core i5 10500H série H (10ª geração), RAM 8 GB, SSD 512 GB NVMe', 'db\photo\note1.jfif', 4392.99, 1, 10, now()),
('Dell GAMER G15-i1100-M50P', 'INTEL Core i7 11800H série H (11ª geração), RAM 16 GB, SSD 512 GB NVMe', 'db\photo\note2.jfif', 7515.00, 1, 10, now()),
('Dell GAMER G15 i1100-M30P', 'INTEL Core i5 11400H série H (11ª geração), RAM 8 GB, SSD 512 GB NVMe', 'ProjetoFinal\db\photo\note3.jfif', 5399.00, 1, 5, now()),
('Macbook Air M1 APPLE GOLD', 'Processador Apple M1, RAM 8 GB, SSD  256 GB', 'ProjetoFinal\db\photo\note4.jfif', 7019.00, 1, 3, now()),
('Acer Aspire 5 A515-54G-52FY', 'Intel Core i5 10210U (10ª geração), RAM 8 GB, SSD 512 GB PCIe NVMe x4', 'ProjetoFinal\db\photo\note5.jfif', 3590.00, 1, 12, now());

INSERT INTO clients (name, cpf, email, telefone, endereco)
VALUES
('romário faz 1000', '32589145888', 'baixinho@gmail.com', '17991997700', 'Av. Maracanã, 1000 - bairro Flamengo, Rio de Janeiro');
