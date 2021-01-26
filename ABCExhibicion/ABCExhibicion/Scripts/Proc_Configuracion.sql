USE ComprasMuebles
go
CREATE PROCEDURE dbo.proc_abconfiguracion (@iConfid INT,
									@iConfTasaFinanciamiento INT, 
									@iConfEnganche INT,
									@iConfPlazoMaximo INT,
									@iOpcion int)

--Descripcion: Se agregan las opciones para Configuraciones
	-- Variable "iOpcion"
		-- 1) Actualizar Configurcion
		-- 2) Obtener Configuracion 
		-- 3) Obtener plazo maximo 

AS
BEGIN

	 if @iOpcion = 1 
	 BEGIN
		UPDATE zabcconfiguracion SET num_plazomaximo = @iConfPlazoMaximo where idu_configuracion = @iConfid
	 END
	 ELSE IF @iOpcion = 2
	 BEGIN 
		Select *  FROM ComprasMuebles.dbo.zabcconfiguracion
	 END
	 ELSE IF @iOpcion = 3
	 BEGIN 
		Select num_plazomaximo  FROM ComprasMuebles.dbo.zabcconfiguracion where idu_configuracion = @iConfid
	 END
END


--DROP PROCEDURE dbo.proc_abconfiguracion
