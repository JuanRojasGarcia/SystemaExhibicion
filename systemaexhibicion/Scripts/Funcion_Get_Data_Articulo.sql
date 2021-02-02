--Funcion para Optener los datos del a tabla articulo
create or Replace function juan.get_data_Articulos()

returns table(idarticulo integer, des varchar, model varchar, preci decimal, exis integer)
as $body$
begin
	return query SELECT idu_articulo, descripcion, modelo, precio, existencia FROM juan.cat_articulos;
end;
$body$ language plpgsql;

--DROP FUNCTION juan.get_data_articulos()
--select * from juan.get_data_Articulos();
