--Funcion para insertar empleado
create or Replace function juan.Funcion_Ventas(p_idventa integer,
						p_numEmpleado integer,
						 p_total numeric,
						 p_fecha date,												 
						 p_iOpcion integer)

returns void 
as $body$
begin
	if p_iOpcion = 1 then
		INSERT INTO juan.cat_ventas(num_empleado, total, fecha) 
		VALUES (p_numEmpleado,p_total,p_fecha);
	elseif p_iOpcion = 3 then 
		DELETE FROM juan.cat_ventas WHERE idu_venta = p_idventa;
	end if;
end;
$body$ language plpgsql;


--select juan.Funcion_Ventas(90091449,25648.99,'02/02/2021',1);

select juan.Funcion_Ventas(2,0,0.0,'01/01/1900',3);

select * from juan.cat_ventas;

--select * from juan.get_data_Ventas();