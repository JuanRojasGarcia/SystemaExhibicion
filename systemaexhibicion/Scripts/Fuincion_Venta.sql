--Funcion para insertar empleado
create or Replace function juan.Funcion_Ventas(p_idventa integer,
						p_numEmpleado integer,
						 p_total numeric,
						 p_fecha date,												 
						 p_iOpcion integer)

returns integer 
as $body$
begin
	if p_iOpcion = 1 then
		if not exists (select idu_venta from juan.cat_ventas WHERE idu_venta = p_idventa) then
			INSERT INTO juan.cat_ventas(num_empleado, total, fecha) 
			select p_numEmpleado, p_total, p_fecha;
			return 1;
		else
			return 2;
		end if;
	elseif p_iOpcion = 3 then 
		if exists  (select idu_venta from juan.cat_ventas WHERE idu_venta = p_idventa)  then
			DELETE FROM juan.cat_ventas WHERE idu_venta = p_idventa;
			return 1;
		else 
			return 2;
		end if;
	end if;
end;
$body$ language plpgsql;

DROP FUNCTION juan.funcion_ventas(integer,integer,numeric,date,integer) 

--select juan.Funcion_Ventas(90091449,25648.99,'02/02/2021',1);

INSERT INTO juan.cat_ventas(num_empleado, total, fecha) 
			VALUES (90091441,10.96,'1/02/2021');
			
select juan.Funcion_Ventas(0,0091441,10.96,'2/19/2021',1);

select * from juan.cat_ventas;
select idu_venta from juan.cat_ventas WHERE idu_venta = 31
--select * from juan.get_data_Ventas();