--Funcion obtener todos los centros 
create or Replace function juan.get_all_Centros()
returns table (idcentro bigint) 
as $$
begin
	return query SELECT idu_centro FROM juan.cat_centros;
	
end;
$$ language plpgsql;

--drop function juan.get_all_Centros();

--select * from juan.get_all_Centros();