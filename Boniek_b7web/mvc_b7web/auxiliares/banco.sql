use user  ;

CREATE TABLE videos (
id_video int(11) not null auto_increment primary key,
titulo varchar(20),
url varchar(50),
descricao varchar(50)

);


INSERT INTO  videos ( titulo, url, descricao)
values 
(' video 01 ', 'http://video01.com', 'primeiro video'),
(' video 02 ', 'http://video02.com', 'segundo video'),
(' video 03 ', 'http://video03.com', 'terceiro  video'),
(' video 04 ', 'http://video01.com', 'mais um video'),
(' video 05 ', 'http://video01.com', 'outro video'),
(' video 06 ', 'http://video01.com', 'mais outro  video');