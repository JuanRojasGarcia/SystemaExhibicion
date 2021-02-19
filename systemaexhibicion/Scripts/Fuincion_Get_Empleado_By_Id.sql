

--Funcion para obtener los empleados
create or Replace function juan.get_empleado_id(P_idempleado integer)
returns table (numEmpleado integer, iduCentro integer, nombreEmpleado varchar, apellidoEmpleado varchar, email varchar) 
as $$
begin
	return query SELECT num_empleado, idu_centro, nombre_empleado, apellido_empleado, email_empleado
	FROM juan.cat_empleados WHERE num_empleado = P_idempleado;

	
end;
$$ language plpgsql;

select * from juan.cat_empleados;

select * from juan.get_empleado_id(90091441);