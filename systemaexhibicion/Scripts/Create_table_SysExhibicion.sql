	--Tablas 

	CREATE TABLE juan.cat_centros 
	(
	idu_centro int not null default 0 primary key,
	nombre_centro varchar(50) not null default ''

	)


	CREATE TABLE juan.cat_empleados 
	(
	num_empleado int not null default 0 primary key,
	idu_centro int not null default 0,
	nombre_empleado varchar(50) not null default '',
	apellido_empleado varchar(50) not null default '',
	email_empleado varchar(50) not null default ''

	)

	CREATE TABLE juan.cat_ventas 
	(
	idu_venta int GENERATED ALWAYS AS IDENTITY,
	num_empleado int not null default 0,
	total decimal(10,2) not null default 0,
	fecha date not null default '1900-01-1'
	)

	--drop table juan.cat_ventas



	CREATE TABLE juan.configuracion 
	(
	idu_configuracion int not null default 0 primary key,
	tasa_financiamiento decimal(10,2) not null default 0,
	enganche int not null default 0,
	plazo_maximo int not null default 0
	)

	--inserttablas

	insert into juan.configuracion(idu_configuracion,tasa_financiamiento,enganche,plazo_maximo)  
	values (1,2.8,20,12)