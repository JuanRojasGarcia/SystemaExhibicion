--Funcion para obtener los empleados
create or Replace function juan.get_all_Empleados()
returns table (idEmpleado integer, NomEmpleado varchar, appellidoEmp varchar, email varchar) 
as $$
begin
	return query SELECT num_empleado, nombre_empleado, apellido_empleado, email_empleado FROM juan.cat_empleados;

	
end;
$$ language plpgsql;

select * from juan.get_all_Empleados();
