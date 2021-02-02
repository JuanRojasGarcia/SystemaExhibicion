--Funcion para Optener los datos del a tabla Empleado
create or Replace function juan.get_data_Empleados()

returns table(idEmpleado integer, idCentro integer, nombre varchar, apellido varchar, email varchar)
as $body$
begin
	return query SELECT num_empleado, idu_centro, nombre_empleado, apellido_empleado, email_empleado FROM juan.cat_empleados;
end;
$body$ language plpgsql;


--select * from juan.get_data_Empleados();