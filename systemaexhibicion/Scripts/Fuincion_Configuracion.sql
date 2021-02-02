--Funcion para insertar Articulo
create or Replace function juan.Funcion_Consultar_Articulo(p_serach varchar, p_iOpcion integer)
returns table(idarticulo integer, descrip varchar, model varchar, prec numeric, exist integer) 
as $body$
begin
	if p_iOpcion = 1 then
		SELECT * FROM juan.cat_articulos 
		WHERE descripcion LIKE 'p_serach%'
	elseif p_iOpcion = 2 then
		SELECT * FROM juan.cat_articulos ORDER BY idu_articulo
	end if;

end;
$body$ language plpgsql;

select * from juan.cat_articulos


SELECT * FROM juan.cat_articulos 
    WHERE descripcion LIKE 'Si%'

        SELECT * FROM juan.cat_articulos ORDER BY idu_articulo
