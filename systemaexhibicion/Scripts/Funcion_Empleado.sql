--Funcion para insertar empleado
create or Replace function juan.Funcion_Empleado(p_numEmpleado integer,
						 p_iduCentro integer,
						 p_nombreEmp varchar(50),
						 p_apellidoEmp varchar(50),
						 p_correoEmp varchar(50),												 
						 p_iOpcion integer)

returns integer 
as $body$
begin
	if p_iOpcion = 1 then
		if not exists (select num_empleado from juan.cat_empleados WHERE num_empleado = p_numEmpleado) then
			INSERT INTO juan.cat_empleados(num_empleado, idu_centro, nombre_empleado, apellido_empleado,email_empleado) 
			select p_numEmpleado, p_iduCentro, p_nombreEmp, p_apellidoEmp, p_correoEmp;
			return 1;
		else 
			return 2;
		end if;
	elseif p_iOpcion = 2 then 
		if  exists (select num_empleado from juan.cat_empleados WHERE num_empleado = p_numEmpleado) then
			UPDATE juan.cat_empleados SET idu_centro=p_iduCentro, nombre_empleado=p_nombreEmp, apellido_empleado=p_apellidoEmp, email_empleado=p_correoEmp 
			WHERE num_empleado = p_numEmpleado;
			return 1;
		else 
			return 2;
		end if;

	elseif p_iOpcion = 3 then 
		if  exists (select num_empleado from juan.cat_empleados WHERE num_empleado = p_numEmpleado) then
			DELETE FROM juan.cat_empleados 
			WHERE num_empleado = p_numEmpleado;
			return 1;
		else 
			return 2;
		end if;
	end if;
end;
$body$ language plpgsql;

DROP FUNCTION juan.funcion_empleado(integer,integer,character varying,character varying,character varying,integer) 

select juan.Funcion_Empleado(1,25049,'q','asd','asd',1);
select juan.Funcion_Empleado(5555,25049,'q','q','q',2);

select * from  juan.cat_empleados
