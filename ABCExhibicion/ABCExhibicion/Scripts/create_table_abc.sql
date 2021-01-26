USE ComprasMuebles
GO
IF EXISTS(SELECT name FROM sysobjects (NOLOCK) WHERE name = 'zabccat_articulos' AND type = 'u' AND uid = 1)
	DROP TABLE ComprasMuebles.dbo.zabccat_articulos 
	--ALTER TABLE zabccat_articulos DROP constraint [pk_zabccat_articulos]
GO

CREATE TABLE ComprasMuebles.dbo.zabccat_articulos 
(
	idu_articulo int not null default 0,
	des_articulo varchar(50) not null default '',
	des_modelo varchar(50) not null default '',
	des_marca varchar(50) not null default '',
	num_preciounitario decimal(10,2) not null default(0),
	num_existencia smallint not null default 0,
	constraint [pk_zabccat_articulos] primary key (idu_articulo)

)

GO
PROC_DOCUMENTACION 'zabccat_articulos','','tabla de articulos'
GO
PROC_DOCUMENTACION 'zabccat_articulos','idu_articulo','identificador de articulo'
GO
PROC_DOCUMENTACION 'zabccat_articulos','des_articulo','nombre del articulo'
GO
PROC_DOCUMENTACION 'zabccat_articulos','des_modelo','nombre del modelo del articulo'
GO
PROC_DOCUMENTACION 'zabccat_articulos','des_marca','noombre de la marca del articulo'
GO
PROC_DOCUMENTACION 'zabccat_articulos','num_preciounitario','precio por unidad del articulo'
GO
PROC_DOCUMENTACION 'zabccat_articulos','num_existencia','piezas de articulos en stock'
GO

--drop table ComprasMuebles.dbo.zabccat_articulos

USE ComprasMuebles
GO
IF EXISTS(SELECT name FROM sysobjects (NOLOCK) WHERE name = 'zabccat_locaciones' AND type = 'u' AND uid = 1)
	DROP TABLE ComprasMuebles.dbo.zabccat_locaciones 
	--ALTER TABLE zabccat_locaciones DROP constraint [pk_zabccat_locaciones]
GO

CREATE TABLE ComprasMuebles.dbo.zabccat_locaciones
(
	idu_locacion int not null default 0,
	des_municipio varchar(50) not null default '',
	des_locacion varchar(50) not null default '',
	constraint [pk_zabccat_locaciones] primary key (idu_locacion)
)

GO
PROC_DOCUMENTACION 'zabccat_locaciones','','tabla de locaciones'
GO
PROC_DOCUMENTACION 'zabccat_locaciones','idu_locacion','identificador de las locaciones'
GO
PROC_DOCUMENTACION 'zabccat_locaciones','des_municipio','nombre del municiopio'
GO
PROC_DOCUMENTACION 'zabccat_locaciones','idu_locacion','nombre de su locacion'
GO


--drop table ComprasMuebles.dbo.zabccat_locaciones

USE ComprasMuebles
GO
IF EXISTS(SELECT name FROM sysobjects (NOLOCK) WHERE name = 'zabcconfiguracion' AND type = 'u' AND uid = 1)
	DROP TABLE ComprasMuebles.dbo.zabcconfiguracion 
	--ALTER TABLE zabcconfiguracion DROP constraint [pk_zabcconfiguracion]

GO

CREATE TABLE ComprasMuebles.dbo.zabcconfiguracion 
(
	idu_configuracion int not null default 0,
	num_tasafinanciamiento float not null default(0),
	num_enganche tinyint not null default 0,
	num_plazomaximo  tinyint not null default 0,
	constraint [pk_zabcconfiguracion] primary key (idu_configuracion)
)

GO
PROC_DOCUMENTACION 'zabcconfiguracion','','configuraciones proceso ventas'
GO
PROC_DOCUMENTACION 'zabcconfiguracion','idu_configuracion','identificador de la configuracion'
GO
PROC_DOCUMENTACION 'zabcconfiguracion','num_tasafinanciamiento','Interes'
GO
PROC_DOCUMENTACION 'zabcconfiguracion','num_enganche','Porcentaje de enganche'
GO
PROC_DOCUMENTACION 'zabcconfiguracion','num_plazomaximo','Numero de meses a pagar'
GO

--drop table ComprasMuebles.dbo.zabcconfiguracion


USE ComprasMuebles
GO
IF EXISTS(SELECT name FROM sysobjects (NOLOCK) WHERE name = 'zabccat_cliente' AND type = 'u' AND uid = 1)
	DROP TABLE ComprasMuebles.dbo.zabccat_cliente 
	--ALTER TABLE zabccat_empleados DROP constraint [pk_zabccat_cliente]

GO

CREATE TABLE ComprasMuebles.dbo.zabccat_cliente 
(
	idu_cliente int not null default 0,
	idu_locacion int not null default 0,
	nom_cliente varchar(50) not null default '',
	tipo_cliente varchar(50) not null default '',
	num_articuloscomprados tinyint not null default 0,
	num_totalvecescompra int not null default 0,
	num_totalcompragral decimal(18,2) not null default 0,
	regalo_tipocliente varchar(50) not null default '',
	constraint [pk_zabccat_cliente] primary key (idu_cliente)
    
)

GO
PROC_DOCUMENTACION 'zabccat_cliente','','tabla clientes'
GO
PROC_DOCUMENTACION 'zabccat_cliente','idu_cliente','identificador empleado'
GO
PROC_DOCUMENTACION 'zabccat_cliente','idu_locacion','identificador del locacion'
GO
PROC_DOCUMENTACION 'zabccat_cliente','nom_cliente','nombre compelto del empleado'
GO
PROC_DOCUMENTACION 'zabccat_cliente','tipo_cliente','tipo de comprador cliente'
GO
PROC_DOCUMENTACION 'zabccat_cliente','num_articuloscomprados','Total de articulos comprados'
GO
PROC_DOCUMENTACION 'zabccat_cliente','num_totalvecescompra','total de veces que has comprado'
GO
PROC_DOCUMENTACION 'zabccat_cliente','num_totalcompragral','total de compra de todas las veces que has comprado'
GO
PROC_DOCUMENTACION 'zabccat_cliente','regalo_tipocliente','Nombre del regalo que se le asignara'
GO



--drop table ComprasMuebles.dbo.zabccat_cliente


USE ComprasMuebles
GO
IF EXISTS(SELECT name FROM sysobjects (NOLOCK) WHERE name = 'zabccat_ventas' AND type = 'u' AND uid = 1)
	DROP TABLE ComprasMuebles.dbo.zabccat_ventas 
	--ALTER TABLE zabccat_ventas DROP constraint [pk_zabccat_ventas]
GO

CREATE TABLE ComprasMuebles.dbo.zabccat_ventas 
(
	idu_venta int IDENTITY(1,1) not null,
	idu_cliente int not null default 0,
	num_totalventa decimal(18,2) not null default(0),
	num_articuloscomprados int not null default 0,
	fech_venta smalldatetime NOT NULL DEFAULT '1900-01-01',
	fecha_modificacionVenta smalldatetime not null Default '1900-01-01',
	constraint [pk_zabccat_ventas] primary key (idu_venta)
)

GO
PROC_DOCUMENTACION 'zabccat_ventas','','tabla ventas'
GO
PROC_DOCUMENTACION 'zabccat_ventas','idu_venta','identificador de la venta'
GO
PROC_DOCUMENTACION 'zabccat_ventas','idu_cliente','identificador del cliente'
GO
PROC_DOCUMENTACION 'zabccat_ventas','num_totalventa','costo toal de la venta'
GO
PROC_DOCUMENTACION 'zabccat_ventas','num_articuloscomprados','Numero de articulos que compro el cliente'
GO
PROC_DOCUMENTACION 'zabccat_ventas','fech_venta','fecha en que se efectuo la venta'
GO
PROC_DOCUMENTACION 'zabccat_ventas','fecha_modificacionVenta','fecha en que se modifico la venta'
GO
--drop table ComprasMuebles.dbo.zabccat_ventas


USE ComprasMuebles
GO
IF EXISTS(SELECT name FROM sysobjects (NOLOCK) WHERE name = 'zabccat_ventasdetalle' AND type = 'u' AND uid = 1)
	DROP TABLE ComprasMuebles.dbo.zabccat_ventasdetalle 
GO

CREATE TABLE ComprasMuebles.dbo.zabccat_ventasdetalle 
(
	idu_cliente int not null default 0,
	tipo_cliente varchar(20) not null default '',
	num_totalarticulos int not null default 0,
	regalo_tipocliente varchar(50) not null default '',
	constraint [pk_zabccat_ventasdetalle] primary key (idu_cliente)
)

GO
PROC_DOCUMENTACION 'zabccat_ventasdetalle','','tabla ventas'
GO
PROC_DOCUMENTACION 'zabccat_ventasdetalle','idu_cliente','identificador del cliente'
GO
PROC_DOCUMENTACION 'zabccat_ventasdetalle','tipo_cliente','Tipo de cliente'
GO
PROC_DOCUMENTACION 'zabccat_ventasdetalle','num_totalarticulos','Total de articulos que el cliente ha comprado'
GO
PROC_DOCUMENTACION 'zabccat_ventasdetalle','regalo_tipocliente','Nombre del regalo del cliente'
GO

--drop table ComprasMuebles.dbo.zabccat_ventasdetalle



