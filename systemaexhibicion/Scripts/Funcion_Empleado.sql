--Funcion para insertar empleado
create or Replace function juan.Funcion_Empleado(p_numEmpleado integer,
						 p_iduCentro integer,
						 p_nombreEmp varchar(50),
						 p_apellidoEmp varchar(50),
						 p_correoEmp varchar(50),												 
						 p_iOpcion integer)

returns void 
as $body$
begin
	if p_iOpcion = 1 then
		INSERT INTO juan.cat_empleados(num_empleado, idu_centro, nombre_empleado, apellido_empleado,email_empleado) 
		select p_numEmpleado, p_iduCentro, p_nombreEmp, p_apellidoEmp, p_correoEmp;
	elseif p_iOpcion = 2 then 
		UPDATE juan.cat_empleados SET idu_centro=p_iduCentro, nombre_empleado=p_nombreEmp, apellido_empleado=p_apellidoEmp, email_empleado=p_correoEmp 
		WHERE num_empleado = p_numEmpleado;
	elseif p_iOpcion = 3 then 
		DELETE FROM juan.cat_empleados WHERE num_empleado = p_numEmpleado;
	end if;
end;
$body$ language plpgsql;


select juan.Funcion_Empleado(90091488,25049,'q','asd','asd',2);

select * from  juan.cat_empleados
