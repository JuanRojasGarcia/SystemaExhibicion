--Funcion para obtener los empleados
create or Replace function juan.get_email_empleado(P_idEmpleado integer)
returns table (email varchar) 
as $$
begin
	return query SELECT email_empleado FROM juan.cat_empleados WHERE num_empleado = P_idEmpleado;

	
end;
$$ language plpgsql;

--select * from juan.get_email_empleado(90091441);

