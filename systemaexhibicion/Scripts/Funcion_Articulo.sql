--Funcion para insertar Articulo
create or Replace function juan.Funcion_Articulo(
						 p_iduArticulo integer,
						 p_descripcion varchar(50),
						 p_modelo varchar(50),
						 p_precio decimal(10,2),
						 p_existencia integer,
						 p_iOpcion integer)
returns integer 
as $body$
begin	
	if p_iOpcion = 1 then
		if not exists (select idu_articulo from juan.cat_articulos WHERE idu_articulo = p_iduArticulo) then
			INSERT INTO juan.cat_articulos(descripcion, modelo, precio, existencia) 
			select p_descripcion, p_modelo, p_precio, p_existencia;
			return 1;
		else 
			return 2;
		end if;
	elseif p_iOpcion = 2 then
		if exists (select idu_articulo from juan.cat_articulos WHERE idu_articulo = p_iduArticulo) then
			UPDATE juan.cat_articulos SET descripcion=p_descripcion, modelo=p_modelo, precio=p_precio, existencia=p_existencia 
			WHERE idu_articulo = p_iduArticulo;
			return 1;
		else 
			return 2;
		end if;
	elseif p_iOpcion = 3 then
		if exists (select idu_articulo from juan.cat_articulos WHERE idu_articulo = p_iduArticulo) then
			DELETE FROM juan.cat_articulos WHERE idu_articulo = p_iduArticulo;
			return 1;
		else 
			return 2;
		end if;
	end if;

end;
$body$ language plpgsql;

DROP FUNCTION juan.funcion_articulo(integer,character varying,character varying,numeric,integer,integer)

select juan.Funcion_Articulo(0,'Monitor l','Bamboo FR32',5689.56,10,1);
select juan.Funcion_Articulo(200,' ',' ',0,0,3);
select juan.Funcion_Articulo(999,'Procesador','DEF-43F',5689.56,10,2);



select * from  juan.cat_articulos
select * from juan.cat_empleados;
