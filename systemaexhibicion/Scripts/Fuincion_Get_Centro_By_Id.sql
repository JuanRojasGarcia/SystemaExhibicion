--Funcion para obtener los empleados
create or Replace function juan.get_centro_id(P_idcentro integer)
returns table (idcentro integer, nomCentro varchar) 
as $$
begin
	return query SELECT idu_centro, nombre_centro FROM juan.cat_centros WHERE idu_centro = P_idcentro;

	
end;
$$ language plpgsql;


select * from juan.cat_centros;

select * from juan.get_centro_id(25045);