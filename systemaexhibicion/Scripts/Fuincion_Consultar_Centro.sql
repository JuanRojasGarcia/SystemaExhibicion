--Funcion para insertar Articulo
create or Replace function juan.Funcion_Consultar_Centro(p_search varchar, p_iOpcion integer)
returns table(idCentro integer, Nombre varchar) 
as $body$
begin
	if p_iOpcion = 1 then
		return query SELECT idu_centro, nombre_centro  FROM juan.cat_centros
			     WHERE CAST(idu_centro AS TEXT) LIKE p_search;
	elseif p_iOpcion = 2 then
		return query SELECT idu_centro, nombre_centro  FROM juan.cat_centros ORDER BY idu_centro;
	end if;

end;
$body$ language plpgsql;

DROP FUNCTION juan.funcion_consultar_centro(character varying,integer)

select * from juan.Funcion_Consultar_Centro('25046%',1);

 SELECT * FROM juan.cat_centros
 WHERE CAST(idu_centro AS TEXT) LIKE '25046%';