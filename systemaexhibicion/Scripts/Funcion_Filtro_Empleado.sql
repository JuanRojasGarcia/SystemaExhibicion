--Funcion para insertar Articulo
create or Replace function juan.Funcion_Filtro_Empleado(p_search_nom varchar(50),p_search_apell varchar(50))
returns text
as $body$
declare 
filtroNom varchar(200);
v_sql text;
v_json json;
begin

v_sql = 'select row_to_json(t)
from (
  select 
    (
      select array_to_json(array_agg(row_to_json(d)))
      from ( 
	select num_empleado, idu_centro, nombre_empleado, apellido_empleado,email_empleado from juan.cat_empleados';

	if (p_search_nom != '' or p_search_apell != '') then
		v_sql := v_sql || ' where nombre_empleado ILIKE ''%'  || p_search_nom || '%'' and apellido_empleado ILIKE ''%'  || p_search_apell || '%'' ';	
	end if;

	v_sql := v_sql || ' ) d
		) as empleados
		) t';
		
	execute v_sql into v_json;
	RETURN v_json;
	

end;
$body$ language plpgsql;

DROP FUNCTION juan.funcion_filtro_empleado(character varying,character varying) 

select * from juan.Funcion_Filtro_Empleado('j','ga');

 SELECT * FROM juan.cat_empleados
 where nombre_empleado ILIKE '%j%' and apellido_empleado ILIKE '%ga%'

select idu_centro, nombre_centro from juan.cat_centros where nombre_centro ILIKE '%%';
