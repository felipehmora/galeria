create database bdphp4_20210621;

use bdphp4_20210621;

create table tbl_galeria(
id integer auto_increment,
nombre_archivo text,
nombre text,
comentario text,
fecha date,
hora time,
primary key(id)
);
