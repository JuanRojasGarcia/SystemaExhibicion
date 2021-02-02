--Funcion para insertar Articulo
create or Replace function juan.Funcion_Articulo(
						 p_iduArticulo integer,
						 p_descripcion varchar(50),
						 p_modelo varchar(50),
						 p_precio decimal(10,2),
						 p_existencia integer,
						 p_iOpcion integer)
returns void 
as $body$
begin
	if p_iOpcion = 1 then
		INSERT INTO juan.cat_articulos(descripcion, modelo, precio, existencia) 
		select p_descripcion, p_modelo, p_precio, p_existencia;
--	elseif p_iOpcion = 3 then
--		SELECT idu_articulo, descripcion, modelo, precio, existencia FROM juan.cat_articulos WHERE idu_articulo = p_idarticulo;
	elseif p_iOpcion = 3 then
 		DELETE FROM juan.cat_articulos WHERE idu_articulo = p_iduArticulo;
	end if;

end;
$body$ language plpgsql;

DROP FUNCTION juan.funcion_articulo(integer,character varying,character varying,numeric,integer,integer)
--DROP FUNCTION juan.funcion_articulo(character varying,character varying,numeric,integer,integer);

select juan.Funcion_Articulo(200,'Monitor HD','Bamboo FR32',5689.56,10,2);
select juan.Funcion_Articulo(200,' ',' ',0,0,3);



select * from  juan.cat_articulos
select * from juan.cat_empleados;
