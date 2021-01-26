USE ComprasMuebles
go
CREATE PROCEDURE dbo.proc_abcarticulos (@iArticuloid INT,
									@cArticuloNom VARCHAR(20), 
									@cArticuloModelo VARCHAR(20),
									@cArticuloMarca VARCHAR(20),
									@dArticuloPrecio DECIMAL(10,2),
									@iArticuloExistencia smallint,
									@iOpcion SMALLINT)
--Descripcion: Se agregan las opciones para insertar, actualizar, eliminar y obtener datos "CRUD"
	-- Variable "iOpcion"
		-- 1) Insertar Articulo
		-- 2) Actualizar Articulo
		-- 3) Elimnar Articulo
		-- 4) Obtener Articulo ID
		-- 5) Obtener todos los Articulos
		-- 6) Total Articulos

AS
BEGIN
declare @iConsulta int, @iMessage int
		

set @iMessage = 0
set @iConsulta = 0


	 if @iOpcion = 1 
	 BEGIN
		IF NOT EXISTS (SELECT idu_articulo FROM zabccat_articulos WHERE idu_articulo = @iArticuloid)
			BEGIN
				INSERT INTO zabccat_articulos Values (@iArticuloid,@cArticuloNom,@cArticuloModelo,@cArticuloMarca,@dArticuloPrecio,@iArticuloExistencia)
			END
		ELSE
		set @iMessage  = 1
		select @iMessage as Messagge
	 END
	 ELSE IF @iOpcion = 2
	 BEGIN
		UPDATE zabccat_articulos SET des_articulo = @cArticuloNom, des_modelo = @cArticuloModelo, des_marca = @cArticuloMarca, num_preciounitario = @dArticuloPrecio, num_existencia = @iArticuloExistencia where idu_articulo = @iArticuloid
	 END
	 ELSE IF @iOpcion = 3
	 BEGIN
		DELETE FROM zabccat_articulos where idu_articulo = @iArticuloid
	 END
	 ELSE IF @iOpcion = 4
	 BEGIN 

		/*IF EXISTS (select idu_articulo FROM ComprasMuebles.dbo.zabccat_articulos WHERE idu_articulo = @iArticuloid)
			 BEGIN
				Select  des_articulo as NombreArticulo, des_modelo as NomModelo,  des_marca as NomMarca,  num_preciounitario as NumPrecio, num_existencia as NumStock  FROM ComprasMuebles.dbo.zabccat_articulos where idu_articulo = @iArticuloid
			 END
		ELSE
			BEGIN
				SET @iConsulta = 1			
			END*/
		Select *  FROM ComprasMuebles.dbo.zabccat_articulos where idu_articulo = @iArticuloid
			
		--select @iConsulta AS Resultado
	 END
	 ELSE IF @iOpcion = 5
	 BEGIN
		Select * From zabccat_articulos
	 END
	 ELSE IF @iOpcion = 6
	 BEGIN
		Select Count(*) As total From zabccat_articulos
	 END
END


--DROP PROCEDURE dbo.proc_abcarticulos
