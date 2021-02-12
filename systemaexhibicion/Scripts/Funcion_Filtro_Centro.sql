--Funcion para insertar Articulo
create or Replace function juan.Funcion_Filtro_Centro(p_search_idu integer,p_search_nom varchar(50))
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
	select idu_centro, nombre_centro from juan.cat_centros 
	where nombre_centro ILIKE ''%'  || p_search_nom || '%''';

	if (p_search_idu >= 0 and p_search_idu is not null) then
		v_sql := v_sql || 'and CAST(idu_centro AS TEXT) LIKE ''%'  || p_search_idu || '%''';	
	end if;

	v_sql := v_sql || ' ) d
		) as centros
		) t';
		
	execute v_sql into v_json;
	RETURN v_json;
	

end;
$body$ language plpgsql;

DROP FUNCTION juan.funcion_filtro_centro(integer,character varying)

select * from juan.Funcion_Filtro_Centro(null,'');

 SELECT * FROM juan.cat_centros
 WHERE CAST(idu_centro AS TEXT) LIKE '25046%';

select idu_centro, nombre_centro from juan.cat_centros where nombre_centro ILIKE '%%';
