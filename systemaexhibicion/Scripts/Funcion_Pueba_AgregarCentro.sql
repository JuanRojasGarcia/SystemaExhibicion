create or Replace function juan.Funcion_Pueba_AgregarCentro(p_idu_centro integer,
					       p_nombre_centro varchar(50))
returns void 
as $body$
begin

	INSERT INTO juan.cat_centros(idu_centro, nombre_centro) 
	select p_idu_centro,p_nombre_centro;

end;
$body$ language plpgsql;

--select * from  juan.Funcion_Pueba_AgregarCentro(123456,'Prueba Ajax');
