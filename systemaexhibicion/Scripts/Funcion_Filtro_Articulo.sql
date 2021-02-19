--Funcion para insertar Articulo
create or Replace function juan.Funcion_Filtro_Articulo(p_search_idu varchar(50),p_search_des varchar(50), p_search_mod varchar(50))
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
	select idu_articulo, descripcion, modelo, precio,existencia 
	from juan.cat_articulos 
	where CAST(idu_articulo AS TEXT)  LIKE ''%' || p_search_idu || '%'' 
	and descripcion ILIKE ''%'  || p_search_des || '%''
	and modelo ILIKE ''%'  || p_search_mod || '%''';

	--if (p_search_des != '') then
	--	v_sql := v_sql || ' and descripcion ILIKE ''%'  || p_search_des || '%''';	
	--end if;

	--if ( p_search_mod != '') then
	--	v_sql := v_sql || ' and modelo ILIKE ''%'  || p_search_mod || '%''';	
	--end if;

	v_sql := v_sql || ' ) d
		) as articulos
		) t';
		
	execute v_sql into v_json;
	RETURN v_json;
	

end;
$body$ language plpgsql;

 DROP FUNCTION juan.funcion_filtro_articulo(character varying,character varying,character varying)
 

select * from juan.Funcion_Filtro_Articulo('1','','');

 SELECT * FROM juan.cat_articulos
 where idu_articulo = 178 and descripcion ILIKE '%%' and modelo ILIKE '%%'

