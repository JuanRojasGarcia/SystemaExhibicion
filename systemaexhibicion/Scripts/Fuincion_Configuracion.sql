--Funcion para insertar Articulo
create or Replace function juan.Funcion_Configuracion(
						 p_iduConfig integer,
						 p_tasaFinanc decimal,
						 p_enganche integer,
						 p_plazoMaximo integer,
						 p_iOpcion integer)
returns integer 
as $body$
begin	
	if p_iOpcion = 1 then
		if not exists (select idu_configuracion from juan.configuracion WHERE idu_configuracion = p_iduConfig) then
			INSERT INTO juan.configuracion(tasa_financiamiento, enganche, plazo_maximo) 
			select p_tasaFinanc, p_enganche, p_plazoMaximo;
			return 1;
		else 
			return 2;
		end if;
	elseif p_iOpcion = 2 then
		if exists (select idu_configuracion from juan.configuracion WHERE idu_configuracion = p_iduConfig) then
			UPDATE juan.configuracion SET tasa_financiamiento=p_tasaFinanc, enganche=p_enganche, plazo_maximo=p_plazoMaximo 
			WHERE idu_configuracion = p_iduConfig;
			return 1;
		else 
			return 2;
		end if;
	elseif p_iOpcion = 3 then
		if exists (select idu_configuracion from juan.configuracion WHERE idu_configuracion = p_iduConfig) then
			DELETE FROM juan.configuracion WHERE idu_configuracion = p_iduConfig;
			return 1;
		else 
			return 2;
		end if;
	end if;

end;
$body$ language plpgsql;

DROP FUNCTION juan.funcion_configuracion(integer,numeric,integer,integer,integer)

select juan.Funcion_Configuracion(0,2.8,20,9,1);
select juan.Funcion_Configuracion(12,2.8,10,12,2);
select juan.Funcion_Configuracion(13,0,0,0,3);



select * from  juan.configuracion;
