--criar um bd--
CREATE DATABASE escola;

--selecionar o bd--
USE escola;

--criar tabela--
CREATE TABLE professor (
    nome VARCHAR(100) NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE aluno (
    nome VARCHAR(100) NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    matricula VARCHAR(11) NOT NULL
);

CREATE TABLE curso (
    nome VARCHAR(100) NOT NULL,
    carga horaria VARCHAR(3) NOT NULL,
    ementa VARCHAR(255) NOT NULL,
);

CREATE TABLE disciplina (
    nome VARCHAR(100) NOT NULL,
    carga horaria VARCHAR(3) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    professor VARCHAR(100) NOT NULL
);

--inserir dados--
INSERT INTO professor (nome, email, cpf)
VALUES ('Wellington', 'ton@gmail.com', '12325898787');

INSERT INTO aluno (nome, email, cpf, matricula)
VALUES ('Celio', 'celio@gmail.com', '12388898787', '258-8');

--selecionar mostrar dados inseridos--
select * from professor;
show tables;
show databases;

--excluir tabela--
DROP TABLE professor;
