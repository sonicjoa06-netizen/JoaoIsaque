create database dbUsuario;
use dbUsuario;

create table tbUsuarios(
codi_cr int primary key auto_increment,
nome_cr varchar(40) not null,
email_cr varchar(40) not null,
senha_cr varchar(8) null,
sexo_cr varchar(1),
dtna_cr date
);

select * from tbUsuarios