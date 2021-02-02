--Funcion para Optener los datos del a tabla Ventas
create or Replace function juan.get_data_Ventas()
returns table(idVenta integer, nomEmpleado varchar, apellidoEmpleado varchar, totalVenta decimal, fechaVenta date)
as $body$
begin
	return query select v.idu_venta, em.nombre_empleado, em.apellido_empleado, v.total, v.fecha 
	from juan.cat_ventas as v join juan.cat_empleados as em on(v.num_empleado = em.num_empleado);
end;
$body$ language plpgsql;


--DROP FUNCTION juan.get_data_ventas();
--select * from juan.get_data_Ventas();



