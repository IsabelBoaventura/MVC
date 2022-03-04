# MVC

Baseado nas videos aulas de Miriam

    https://www.youtube.com/watch?v=OHyVbI0pGWI&list=PLYGFJHWj9BYqyAxiT02orCWbta5lWsCCL&index=2


Abrir o sistema:

        http://localhost/mvc/MiriamTechCod/projeto01/

CREATE DATABASE tela_login;


USE tela_login;


CREATE TABLE usuarios (
    id_usuario int(11) AUTO_INCREMENT primary key,
    nome varchar(30),
    telefone varchar(15),
    email varchar(40) ,
    senha varchar(32)
);


