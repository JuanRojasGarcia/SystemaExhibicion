--Funcion para insertar Articulo
create or Replace function juan.Funcion_Filtro_Ventas( p_search_nomEmp varchar(50),p_search_apellEmp varchar(50),p_search_fechaIni date, p_search_fechaFin date)
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
      from ( select v.idu_venta, v.num_empleado, em.nombre_empleado,em.apellido_empleado , v.total, v.fecha 
      FROM juan.cat_ventas as v join juan.cat_empleados as em 
      on(v.num_empleado = em.num_empleado)
      where v.fecha >= ''' || p_search_fechaIni || ''' and v.fecha <= ''' || p_search_fechaFin || '''';


	if (p_search_nomEmp != '') then
		v_sql := v_sql || ' and em.nombre_empleado ILIKE ''%'  || p_search_nomEmp || '%''';	
	end if;

	if ( p_search_apellEmp != '') then
		v_sql := v_sql || ' and em.apellido_empleado ILIKE ''%'  || p_search_apellEmp || '%''';	
	end if;

	v_sql := v_sql || ' ) d
		) as empleados
		) t';
		
	execute v_sql into v_json;
	RETURN v_json;

		

	

end;
$body$ language plpgsql;

DROP FUNCTION juan.Funcion_Filtro_Ventas(character varying,character varying,date,date)

select * from juan.Funcion_Filtro_Ventas('','','2021-01-1','2021-12-23');

 SELECT em.nombre_empleado FROM juan.cat_ventas as v 
 join juan.cat_empleados as em on(v.num_empleado = em.num_empleado)
 where em.nombre_empleado ILIKE '%j%'

 
select v.idu_venta, v.num_empleado, em.nombre_empleado,em.apellido_empleado , v.total, v.fecha 
FROM juan.cat_ventas as v 
join juan.cat_empleados as em on(v.num_empleado = em.num_empleado) 
where v.fecha between '2021-10-01' and '2021-10-04';


select * from juan.cat_ventas


	select v.idu_venta, v.num_empleado, em.nombre_empleado,em.apellido_empleado , v.total, v.fecha 
	FROM juan.cat_ventas as v join juan.cat_empleados as em 
	on(v.num_empleado = em.num_empleado)
	where v.fecha between '2021-10-01' and '2021-10-03' 
	and em.nombre_empleado ILIKE '%%'
	and em.apellido_empleado  ILIKE '%%';	
