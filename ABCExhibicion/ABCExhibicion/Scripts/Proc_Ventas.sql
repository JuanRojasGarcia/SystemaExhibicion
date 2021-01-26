USE ComprasMuebles
go
CREATE PROCEDURE dbo.proc_ventas (@iVentaid INT,
									@iClienteid INT,
									@iTotalVenta decimal(18,2),
									@iArticulosComprados INT,
									@iFechaVenta smalldatetime,
									@iArticuloid int,
									@dtFechaModificacion smalldatetime,
									@iOpcion SMALLINT)
--Descripcion: Se agregan las opciones para insertar, actualizar, eliminar y obtener datos "CRUD"
	-- Variable "iOpcion"
		-- 1) Insertar Venta
		-- 2) Actualizar Venta
		-- 3) Elimnar Venta
		-- 4) Obtener Venta ID
		-- 5) Obtener todas las Ventas
		-- 6) Obtener empleados
		-- 7) Obtener Articulos
		-- 8) Obtenr Nombre locacion 
		-- 9) Obtener Articulos por Nombre 
		-- 10) obtener configuracion
		-- 11) Ventas Totales


AS
BEGIN
declare @iMessage int
		

set @iMessage = 0


	 if @iOpcion = 1 
	 BEGIN
		INSERT INTO zabccat_ventas Values (@iClienteid,@iTotalVenta, @iArticulosComprados, @iFechaVenta,@dtFechaModificacion)
	 END
	 ELSE IF @iOpcion = 2
	 BEGIN
		UPDATE zabccat_ventas 
		SET idu_cliente = @iClienteid, num_totalventa = @iTotalVenta, fecha_modificacionVenta = @dtFechaModificacion
		where idu_venta = @iVentaid
	 END
	 ELSE IF @iOpcion = 3
	 BEGIN
		DELETE FROM zabccat_ventas 
		where idu_venta = @iVentaid
	 END
	 ELSE IF @iOpcion = 4
	 BEGIN 
		Select v.idu_venta, c.idu_cliente, c.nom_cliente, v.num_totalventa, v.fech_venta
		FROM zabccat_ventas as v join zabccat_cliente as c on(v.idu_cliente = c.idu_cliente) 
		where idu_venta = @iVentaid
	 END
	 ELSE IF @iOpcion = 5
	 BEGIN
		Select * From zabccat_ventas
	 END
	 ELSE IF @iOpcion = 6
	 BEGIN
		select idu_cliente, nom_cliente 
		from zabccat_cliente 
	 END
	 ELSE IF @iOpcion = 7
	 BEGIN
		select  idu_articulo,des_articulo 
		from zabccat_articulos 
	 END
	 ELSE IF @iOpcion = 8
	 BEGIN
		select lo.des_locacion
		from zabccat_cliente as c join zabccat_locaciones as lo on(c.idu_locacion = lo.idu_locacion)
		where c.idu_cliente = @iClienteid 
	 END
	 ELSE IF @iOpcion = 9
	 BEGIN
		select  des_articulo, des_modelo, num_preciounitario 
		from zabccat_articulos where idu_articulo = @iArticuloid
	 END
	 ELSE IF @iOpcion = 10
	 BEGIN
		select idu_configuracion, num_tasafinanciamiento, num_enganche , num_plazomaximo 
		from zabcconfiguracion
	 END
	 ELSE IF @iOpcion = 11
	 BEGIN
		select Count(*) As total from zabccat_ventas
	 END

	 /*if object_id('tempdb.dbo.#tmpClientes', 'U') is not null
		drop table #tmpClientes

	Create table #tmpClientes
	(
		idu_cliente int not null default 0,
		idu_locacion int not null default 0,
		
	)*/
END


--DROP PROCEDURE dbo.proc_ventas
