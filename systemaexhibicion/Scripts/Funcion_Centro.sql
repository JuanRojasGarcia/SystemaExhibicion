--Funcion para insertar centro
create or Replace function juan.Funcion_Centro(p_idu_centro integer,
					       p_nombre_centro varchar(50),
					       p_iOpcion integer)

returns integer 
as $body$
begin
	if p_iOpcion = 1 then
		if not exists (select idu_centro from juan.cat_centros  WHERE idu_centro = p_idu_centro) then
			INSERT INTO juan.cat_centros(idu_centro, nombre_centro) 
			select p_idu_centro,p_nombre_centro;
			return 1;
		else 
			return 2;
		end if;
	elseif p_iOpcion = 2 then 
		if exists (select idu_centro from juan.cat_centros  WHERE idu_centro = p_idu_centro) then
			UPDATE juan.cat_centros SET nombre_centro=p_nombre_centro 
			WHERE idu_centro = p_idu_centro;
			return 1;
		else 
			return 2;
		end if;
	elseif p_iOpcion = 3 then 
		if exists (select idu_centro from juan.cat_centros  WHERE idu_centro = p_idu_centro) then
			DELETE FROM juan.cat_centros WHERE idu_centro = p_idu_centro;
			return 1;
		else 
			return 2;
		end if;

	end if;
end;
$body$ language plpgsql;

 DROP FUNCTION juan.funcion_centro(integer,character varying,integer)

select * from juan.Funcion_Centro(9,'Lonja',1);
select juan.Funcion_Centro(9,'PruebaDos',2);
select juan.Funcion_Centro(9,'',3);


select * from  juan.cat_centros
