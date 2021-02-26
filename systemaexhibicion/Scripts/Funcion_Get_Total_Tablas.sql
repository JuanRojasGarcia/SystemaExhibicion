--Funcion para optener el total de registro de cada tabla
create or Replace function juan.get_Total_Tablas(iOpcion integer)
returns integer 
as $$
declare 
total integer;
begin
	if iOpcion = 1 then
		SELECT Count(*) into total  from juan.cat_empleados;
		return total;
	elseif iOpcion = 2 then
		SELECT Count(*) into total from juan.cat_articulos;
		return total;
	elseif iOpcion = 3 then
		SELECT Count(*) into total from juan.cat_ventas;
		return total;
	elseif iOpcion = 4 then
		SELECT Count(*) into total from juan.cat_centros;
		return total;
	end if;
	
end;
$$ language plpgsql;

drop function juan.get_Total_Tablas(integer);

select * from juan.get_Total_Tablas(2);

select * from juan.cat_articulos;