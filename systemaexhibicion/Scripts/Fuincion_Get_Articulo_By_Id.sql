--Funcion para obtener los empleados
create or Replace function juan.get_artciulo_id(P_idarticulo integer)
returns table (idarticulo integer, descripcion varchar, modelo varchar, precio decimal, existencia integer) 
as $$
begin
	return query SELECT idu_articulo, descripcionm, modelo, precio, existencia 
	FROM juan.cat_articulos WHERE idu_articulo = P_idarticulo;

	
end;
$$ language plpgsql;

--select * from juan.get_artciulo_id(1000);

--SELECT * FROM juan.cat_articulos WHERE idu_articulo = 1000