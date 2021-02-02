--Funcion para obtener los empleados
create or Replace function juan.update_existencia_Articulo(P_idarticulo integer,
							   p_existencia integer)
returns integer 
as $$
begin
	UPDATE juan.cat_articulos SET existencia = p_existencia  WHERE idu_articulo = P_idarticulo;
	return 1; --Se actualizo correctamente
	
end;
$$ language plpgsql;

DROP FUNCTION juan.update_existencia_articulo(integer,integer);
select * from juan.update_existencia_Articulo(100,10);
select * from juan.cat_articulos;

--UPDATE juan.cat_articulos SET existencia = 4 WHERE idu_articulo = 100;