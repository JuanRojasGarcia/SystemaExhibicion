USE ComprasMuebles
go
CREATE PROCEDURE dbo.proc_abclocaciones (@iLocacionid INT,
									@cMunicipio VARCHAR(50), 
									@cLocacion VARCHAR(50),
									@iOpcion tinyint)
--Descripcion: Se agregan las opciones para insertar, actualizar, eliminar y obtener datos "CRUD"
	-- Variable "iOpcion"
		-- 1) Insertar 
		-- 2) Actualizar 
		-- 3) Elimnar 
		-- 4) Obtener by ID
		-- 5) Obtener todo
		-- 6) Total 

AS
BEGIN
declare @iConsulta int, @iError int
		

set @iError = 0
set @iConsulta = 0


	 if @iOpcion = 1 
	 BEGIN
		IF NOT EXISTS (SELECT idu_locacion FROM zabccat_locaciones WHERE idu_locacion = @iLocacionid)
			BEGIN
				INSERT INTO zabccat_locaciones Values (@iLocacionid,@cMunicipio,@cLocacion)
			END
		ELSE
		set @iError  = 1
		select @iError as Error
	 END
	 ELSE IF @iOpcion = 2
	 BEGIN
		UPDATE zabccat_locaciones SET des_municipio = @cMunicipio, des_locacion = @cLocacion where idu_locacion = @iLocacionid
	 END
	 ELSE IF @iOpcion = 3
	 BEGIN
		DELETE FROM zabccat_locaciones where idu_locacion = @iLocacionid
	 END
	 ELSE IF @iOpcion = 4
	 BEGIN 
		Select *  FROM zabccat_locaciones where idu_locacion = @iLocacionid
	 END
	 ELSE IF @iOpcion = 5
	 BEGIN
		Select * From zabccat_locaciones
	 END
	 ELSE IF @iOpcion = 6
	 BEGIN
		Select Count(*) As total From zabccat_locaciones
	 END
END


--DROP PROCEDURE dbo.proc_abclocaciones
