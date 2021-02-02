--Funcion para Optener los datos del a tabla centro
create or Replace function juan.get_data_Centros()

returns table(idcentro integer, nomCentro varchar)
as $body$
begin
	return query SELECT idu_centro, nombre_centro FROM juan.cat_centros;
end;
$body$ language plpgsql;


--select * from juan.get_data_Centros();
