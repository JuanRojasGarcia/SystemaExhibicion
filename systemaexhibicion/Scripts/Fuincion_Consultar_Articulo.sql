--Funcion para insertar Articulo
create or Replace function juan.Funcion_Consultar_Articulo(p_search varchar, p_iOpcion integer)
returns table(idarticulo integer, descrip varchar, model varchar, prec numeric, exist integer) 
as $body$
begin
	if p_iOpcion = 1 then
		return query SELECT * FROM juan.cat_articulos 
			     WHERE descripcion ILIKE p_search;
	elseif p_iOpcion = 2 then
		return query SELECT * FROM juan.cat_articulos ORDER BY idu_articulo;
	end if;

end;
$body$ language plpgsql;


DROP FUNCTION juan.funcion_consultar_articulo(character varying,integer)

select * from juan.Funcion_Consultar_Articulo('%m%',1);

