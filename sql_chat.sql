create table chatUserTec(
id serial not null,
idUser integer not null,
idTec integer not null,
data timestamp default now(),
mensagem varchar(255) not null,
foreign key (idUser) references users,
foreign key (idTec) references tecnicos
);

create table chatUserAdm(
id serial not null,
idUser integer not null,
idAdm integer not null,
data timestamp default now(),
mensagem varchar(255) not null,
foreign key (idUser) references users,
foreign key (idAdm) references admins
);

create table chatTecAdm(
id serial not null,
idTec integer not null,
idAdm integer not null,
data timestamp default now(),
mensagem varchar(255) not null,
foreign key (idAdm) references admins,
foreign key (idTec) references tecnicos
);