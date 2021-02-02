--Funcion para obtener los empleados
create or Replace function juan.get_configuracion()
returns table (idconfig bigint, tasaFinanciamiento numeric, engancheConf bigint, plazoMaximo bigint) 
as $$
begin
	return query SELECT idu_configuracion, tasa_financiamiento, enganche, plazo_maximo FROM juan.configuracion;
	
end;
$$ language plpgsql;

--DROP FUNCTION juan.get_configuracion();
--select * from juan.get_configuracion();

