USE ComprasMuebles
go
CREATE PROCEDURE dbo.proc_abclientes (@iClienteid INT,
									@iLocacionid INT, 
									@cClienteNom VARCHAR(50),									
									@iOpcion SMALLINT)

--Descripcion: Se agregan las opciones para insertar, actualizar, eliminar y obtener datos "CRUD"
	-- Variable "iOpcion"
		-- 1) Insertar Cliente
		-- 2) Actualizar Cliente
		-- 3) Elimnar Cliente
		-- 4) Obtener Cliente ID
		-- 5) Obtener todos los Cliente
		-- 6) Obtener Locaciones
		-- 7) Total Centros

AS
BEGIN
declare @iConsulta int, @iMessage int
		

set @iMessage = 0
set @iConsulta = 0

	 if @iOpcion = 1 
	 BEGIN
		IF NOT EXISTS (SELECT idu_cliente FROM zabccat_cliente WHERE idu_cliente = @iClienteid)
			BEGIN
				INSERT INTO  ComprasMuebles.dbo.zabccat_cliente (idu_cliente,idu_locacion,nom_cliente)
				select @iClienteid,@iLocacionid,@cClienteNom
			END
		ELSE
			set @iMessage  = 1	
		select @iMessage as Error
	 END
	 ELSE IF @iOpcion = 2
	 BEGIN
		UPDATE zabccat_cliente SET idu_locacion = @iLocacionid, nom_cliente = @cClienteNom  where idu_cliente = @iClienteid
	 END
	 ELSE IF @iOpcion = 3
	 BEGIN
		DELETE FROM zabccat_cliente where idu_cliente = @iClienteid
	 END
	 ELSE IF @iOpcion = 4
	 BEGIN 

		select c.idu_cliente, lo.idu_locacion, lo.des_locacion,c.nom_cliente 
		from zabccat_cliente as c join zabccat_locaciones as lo on(c.idu_locacion = lo.idu_locacion) 
		where idu_cliente = @iClienteid
			
	 END
	 ELSE IF @iOpcion = 5
	 BEGIN
		
	   -- select @NombreLocacion = l.des_locacion from zabccat_cliente as c join zabccat_locaciones as l on(c.idu_locacion = l.idu_locacion) where idu_cliente = @iClienteidu
		
		Select * From zabccat_cliente

		--select @NombreLocacion as nomLocacion
	 END
	 ELSE IF @iOpcion = 6
	 BEGIN
		select idu_locacion, des_locacion from zabccat_locaciones
	 END
	 ELSE IF @iOpcion = 7
	 BEGIN
		Select Count(*) As total From zabccat_cliente
	 END
	 /*ELSE IF @iOpcion = 8 
	 BEGIN
		Select 
	 END*/
END


--DROP PROCEDURE dbo.proc_abclientes
