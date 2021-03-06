﻿--Insert Into 

insert into juan.cat_articulos (descripcion,modelo,precio,existencia)  
SELECT 'Monitor','27ul500-w',5689.56,10 union all
SELECT 'Escritorio','',15697.99,15  union all
SELECT 'Teclado','HP keyboard 100',3489.87,20  union all
SELECT 'Silla','Cairo',6548.44,7  union all
SELECT 'Sillon','',25649.12,5  union all
SELECT 'Estufa','EMC5044CAISO',18649.15,4  union all
SELECT 'Lavadora','Wsa1102pd',21639.55,1  union all
SELECT 'Refrigerador','Dfr-25210gn 9p',29498.45,9  union all
SELECT 'Laptop','15-da2017la',16748.99,12  union all
SELECT 'Play 4','Cuh-2015a/500gb',10948.99,7  union all
SELECT 'Audifonos','WH-CH510/WZ UC',5489.11,11  union all
SELECT 'Tablet','Galaxy tab s7',18649.99,8  

insert into juan.cat_centros(idu_centro, nombre_centro)  
SELECT 25045,'Calexico' union all
SELECT 25046,'Compras muebles'  union all
SELECT 25047,'Compras internas'  union all
SELECT 25048,'Programacion I' union all
SELECT 25049,'Programacion II' union all
SELECT 25050,'CEDIS'
	
insert into juan.cat_ventas(num_empleado,total,fecha)  
SELECT 90091441,2994.99,'1/01/2021' 
insert into juan.cat_ventas(num_empleado,total,fecha)  
SELECT 90091442,39456.99,'2/01/2021' 
insert into juan.cat_ventas(num_empleado,total,fecha)  
SELECT 90091443,5478.99,'3/01/2021' 
insert into juan.cat_ventas(num_empleado,total,fecha)  
SELECT 90091444,15297.99,'4/01/2021' 
insert into juan.cat_ventas(num_empleado,total,fecha)  
SELECT 90091445,15478.99,'5/01/2021' 
insert into juan.cat_ventas(num_empleado,total,fecha)  
SELECT 90091446,96157.99,'6/01/2021'
insert into juan.cat_ventas(num_empleado,total,fecha)  
SELECT 90091447,2994.99,'7/01/2021' 
insert into juan.cat_ventas(num_empleado,total,fecha)  
SELECT 90091448,39456.99,'8/01/2021' 
insert into juan.cat_ventas(num_empleado,total,fecha)  
SELECT 90091441,5478.99,'1/01/2021' 
insert into juan.cat_ventas(num_empleado,total,fecha)  
SELECT 90091442,15297.99,'2/01/2021' 
insert into juan.cat_ventas(num_empleado,total,fecha)  
SELECT 90091443,15478.99,'3/01/2021' 
insert into juan.cat_ventas(num_empleado,total,fecha)  
SELECT 90091444,96157.99,'4/01/2021'
	
insert into juan.cat_empleados(num_empleado,idu_centro,nombre_empleado,apellido_empleado,email_empleado)
SELECT 90091441,25045,'Juan Carlos ','Rojas Garcia','r_ojasjc@hotmail.com' union all
SELECT 90091442,25046,'Ismael Alejandro ','Garcia Lopez','ismamfi@hotmail.com' union all
SELECT 90091443,25047,'German Velarde ','Ramirez Velarde','gerge@hotmail.com' union all
SELECT 90091444,25048,'Luis Angel ','Leon Valenzuela','levistraus@hotmail.com' union all
SELECT 90091445,25049,'Irving ','Juarez Penueñas','irvingmarquez@hotmail.com' union all
SELECT 90091446,25050,'Jesus Gaualupe ','Garcia Konz','konz@hotmail.com' union all
SELECT 90091447,25045,'Jose Francisco ','Almanza Piña','joseAlPi@hotmail.com' union all
SELECT 90091448,25046,'Fernando ','Moreno Bernal','FerBernal@hotmail.com'


