--Funcion para obtener los empleados
create or Replace function juan.update_Articulo(p_idarticulo integer,
						p_descripcion varchar(50),
						 p_modelo varchar(50),
						 p_precio numeric,
						 p_existencia integer)
returns integer 
as $$
begin
	UPDATE juan.cat_articulos SET descripcion=p_descripcion, modelo=p_modelo, precio=p_precio, existencia=p_existencia WHERE idu_articulo = p_idarticulo;
	return 1; --Se actualizo correctamente
	
end;
$$ language plpgsql;

DROP FUNCTION juan.update_existencia_articulo(integer,integer);
select * from juan.update_existencia_Articulo(100,10);
select * from juan.cat_articulos;

--UPDATE juan.cat_articulos SET existencia = 4 WHERE idu_articulo = 100
select juan.update_Articulo(200,'Monitor HD','',5689.56,20);


select * from  juan.cat_articulos
select * from juan.cat_empleados;

select * from juan.get_data_Articulos();