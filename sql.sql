create table status(
	id serial primary key,
	descricao varchar(50) not null
);

create table tecnicos(

id serial not null,
nome varchar(100) not null,
sobrenome varchar(200) not null,
email varchar(100) not null,
senha varchar not null,
rg char(10) not null,
cpf varchar(14) not null,
endereco varchar(200) not null,
numero int not null,
telefone varchar(20) not null,
complemento varchar,
bairro varchar(20) not null,
login varchar(50) not null,
ativo boolean default true,
primary key(id)

);

create table admins(

id serial not null,
nome varchar(100) not null,
sobrenome varchar(200) not null,
email varchar(100) not null,
senha varchar not null,
rg char(10) not null,
cpf varchar(14) not null,
endereco varchar(200) not null,
numero int not null,
telefone varchar(20) not null,
complemento varchar,
bairro varchar(20) not null,
login varchar(50) not null,
ativo boolean default true,
primary key(id)

);

create table users(
id serial not null,
nome varchar(100) not null,
sobrenome varchar(200) not null,
email varchar(100) not null,
senha varchar not null,
login varchar(16) not null,
primary key(id)

);



create table compusers(

id int not null,
rg char(10) not null,
cpf varchar(14) not null,
endereco varchar(200) not null,
numero int not null,
telefone varchar(20) not null,
complemento varchar,
bairro varchar(20) not null,
primary key(id),
foreign key(id) references users
);

create table chamados(
id serial not null,
id_user int not null,
id_tecnico int,
data_horainicio timestamp without time zone DEFAULT now(),
data_horafim timestamp without time zone ,
descricao varchar,
status boolean not null,
primary key(id),
foreign key(id_user) references users,
foreign key(id_tecnico) references tecnicos
);

create table equipamentos(
id serial not null,
id_cliente int not null,
marca varchar(50),
tipo varchar(20),
nserie int,
ram varchar(10),
processador varchar(200),
hd varchar(8),
video varchar(100),
primary key(id),
foreign key(id_cliente) references users
);

create table os(
id serial not null,
id_cliente int not null,
id_tecnico int not null,
id_equip int not null,
descricao varchar,
defeito varchar,
data_horaentrada timestamp without time zone DEFAULT now(),
data_horasaida timestamp without time zone,
id_status int not null,
enc_os boolean,
obs varchar,
primary key(id),
foreign key(id_cliente) references users,
foreign key(id_tecnico) references tecnicos,
foreign key(id_equip) references equipamentos,
foreign key(id_status) references status
 );

create table chatusertec(
id serial not null,
iduser integer not null,
idtec integer not null,
idfrom integer not null,
data timestamp default now(),
mensagem varchar(255) not null,
foreign key (idUser) references users,
foreign key (idTec) references tecnicos
);

create table chatuseradm(
id serial not null,
iduser integer not null,
idadm integer not null,
idfrom integer not null,
data timestamp default now(),
mensagem varchar(255) not null,
foreign key (idUser) references users,
foreign key (idAdm) references admins
);

create table chattecadm(
id serial not null,
idtec integer not null,
idadm integer not null,
idfrom integer not null,
data timestamp default now(),
mensagem varchar(255) not null,
foreign key (idAdm) references admins,
foreign key (idTec) references tecnicos
);