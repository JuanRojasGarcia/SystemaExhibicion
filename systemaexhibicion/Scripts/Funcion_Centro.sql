--Funcion para insertar centro
create or Replace function juan.Funcion_Centro(p_idu_centro integer,
					       p_nombre_centro varchar(50),
					       p_iOpcion integer)

returns void 
as $body$
declare 
iMessage integer;
begin
	if p_iOpcion = 1 then
		INSERT INTO juan.cat_centros(idu_centro, nombre_centro) 
		select p_idu_centro,p_nombre_centro;
	elseif p_iOpcion = 2 then 
		UPDATE juan.cat_centros SET nombre_centro=p_nombre_centro 
		WHERE idu_centro = p_idu_centro;
	elseif p_iOpcion = 3 then 
		DELETE FROM juan.cat_centros WHERE idu_centro = p_idu_centro;
	end if;
end;
$body$ language plpgsql;

--DROP FUNCTION juan.funcion_centro(integer,character varying,integer)

--select * from juan.Funcion_Centro(25055,'Lonja',1);
--select juan.Funcion_Centro(25048,'',2);
--select juan.Funcion_Centro(25045,'',3);


select * from  juan.cat_centros
