--db.sql
create table Cliente(
	id	   		int not null auto_increment,
	nombre		varchar(100) not null,
	login		varchar(25)  not null,
	password	varchar(100) not null,
	direccion	varchar(100) not null,
	telefono	varchar(15)  not null,
	estado		int 	not null,
	primary key(id)
);

insert into Cliente values
(0, 'UAGRM','uagrm@uagrm.edu.bo',password('uagrm'), 'Av. Bush, 2do Anillo', '10101010', 1 ),
(0, 'SOE','soe@uagrm.edu.bo',password('soe'), 'Calle Nuflo de Chavez', '20202020', 1 ),
(0, 'Fair Play','fairplay@fairplay.com',password('fairplay'), 'Calle Colon S/N', '30303030', 1 );


create table PuntoEntrega(
	id			int not null auto_increment,
	idCliente	int not null,
	nombre		varchar(50)    not null,
	direccion	varchar(100)   not null,
	latitud     decimal(14,10) not null,
	longitud    decimal(14,10) not null,
	primary key(id)
);

insert into PuntoEntrega values
(0, 1, 'Oficina Central', 'Av. Bush, 2do Anillo', -17.7792786,-63.1900349),
(0, 1, 'CDP', 'C/Mexico, 1er Anillo', -17.7785775,-63.1899428),
(0, 2, 'Oficina Central', 'Calle Nuflo de Chavez', -17.7859889,-63.1804854),
(0, 3, 'Oficina Central', 'Calle Colon S/N', -17.7849733,-63.1844612);
