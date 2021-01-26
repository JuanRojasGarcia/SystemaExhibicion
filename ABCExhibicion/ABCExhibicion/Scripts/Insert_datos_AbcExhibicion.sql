use ComprasMuebles
go

insert into ComprasMuebles.dbo.zabcconfiguracion(idu_configuracion,num_tasafinanciamiento,num_enganche,num_plazomaximo)  
values (1,2.8,20,12)
go

insert into ComprasMuebles.dbo.zabccat_locaciones(idu_locacion,des_municipio,des_locacion)  
SELECT 001,'Culiacan','Villas del Rio' union all
SELECT 002,'Culiacan','La Conquista' union all
SELECT 003,'Culiacan','Las Quintas' union all
SELECT 101,'Mazatlan','Santa Virginia' union all
SELECT 102,'Mazatlan','Villa verde' union all
SELECT 103,'Mazatlan','Puertas del Sol' union all
SELECT 201,'Navolato','Bachimeto' union all
SELECT 202,'Navolato','Altata' union all
SELECT 203,'Navolato','Bariometo' union all
SELECT 301,'Badiraguato','Surutato' union all
SELECT 302,'Badiraguato','Soyatita' union all
SELECT 303,'Badiraguato' ,'Bacuribito' 
go




--Insert de Prueba
insert into ComprasMuebles.dbo.zabccat_articulos(idu_articulo,des_articulo,des_marca,des_modelo,num_preciounitario,num_existencia)  
SELECT 100,'Monitor','LG','27ul500-w',5689.56,10 union all
SELECT 200,'Escritorio','Tamayo','',15697.99,15  union all
SELECT 300,'Teclado','HP','HP keyboard 100',3489.87,20  union all
SELECT 400,'Silla','Ikai','Cairo',6548.44,7  union all
SELECT 500,'Sillon','Imj','',25649.12,5  union all
SELECT 600,'Estufa','Mabe','EMC5044CAISO',18649.15,4  union all
SELECT 700,'Lavadora','Hisende','Wsa1102pd',21639.55,1  union all
SELECT 800,'Refrigerador','Winia','Dfr-25210gn 9p',29498.45,9  union all
SELECT 900,'Laptop','HP','15-da2017la',16748.99,12  union all
SELECT 1000,'Play 4','Sony','Cuh-2015a/500gb',10948.99,7  union all
SELECT 1100,'Audifonos','Sony','WH-CH510/WZ UC',5489.11,11  union all
SELECT 1200,'Tablet','Samsumg','Galaxy tab s7',18649.99,8  
go

insert into ComprasMuebles.dbo.zabccat_cliente(idu_cliente,idu_locacion,nom_cliente,num_articuloscomprados,num_totalcompragral,num_totalvecescompra,regalo_tipocliente,tipo_cliente)
SELECT 90091441,1,'Juan Carlos Rojas',0,0,0,'','' union all
SELECT 90091442,2,'Ismael Alejandro Garcia',0,0,0,'','' union all
SELECT 90091443,101,'German Velarde Ramirez',0,0,0,'','' union all
SELECT 90091444,102,'Luis Angel Leon',0,0,0,'','' union all
SELECT 90091445,201,'Irving Marquez Juarez',0,0,0,'','' union all
SELECT 90091446,202,'Jesus Gaualupe Garcia',0,0,0,'','' union all
SELECT 90091447,301,'Jose Francisco Almanza',0,0,0,'','' union all
SELECT 90091448,302,'Fernando Moreno',0,0,0,'',''
go


