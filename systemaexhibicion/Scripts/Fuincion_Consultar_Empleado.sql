--Funcion para insertar Articulo
create or Replace function juan.Funcion_Consultar_Empleado(p_search varchar, p_iOpcion integer)
returns table(numempleado integer, iduCentro integer, nomEmpleado varchar, appelidoEmp  varchar, correo varchar) 
as $body$
begin
	if p_iOpcion = 1 then
		return query SELECT num_empleado, idu_centro, nombre_empleado, apellido_empleado, email_empleado
		FROM juan.cat_empleados 
		WHERE CAST(num_empleado AS TEXT) LIKE p_search;
	elseif p_iOpcion = 2 then
		return query SELECT num_empleado, idu_centro, nombre_empleado, apellido_empleado, email_empleado
		FROM juan.cat_empleados 
		ORDER BY num_empleado;
	end if;

end;
$body$ language plpgsql;

DROP FUNCTION juan.funcion_consultar_empleado(character varying,integer)

select * from juan.Funcion_Consultar_Empleado('',2);


SELECT * FROM juan.cat_empleados 
    WHERE CAST(num_empleado AS TEXT) LIKE '%".$search."%'

        SELECT * FROM juan.cat_empleados ORDER BY num_empleado
