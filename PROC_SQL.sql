/*PROCEDIMIENTOS DE EMPRESA*/

CREATE PROCEDURE sp_obtenerEmpresa
	@idEmpresa int
AS
	SELECT idEmpresa,ruc,razonSocial,direccion,telefono,imagen FROM Empresas WHERE idEmpresa=@idEmpresa AND stateEmpresa='1' AND isVerified='1'
GO

CREATE PROCEDURE sp_deleteEmpresa
	@idCompany int
AS
	UPDATE Empresas SET stateEmpresa='0' WHERE idEmpresa=@idCompany
GO

CREATE PROCEDURE sp_updateEmpresa
	@telefono varchar(9),
	@direccion varchar(100),
	@idEmpresa int
AS
	UPDATE Empresas SET telefono=@telefono, direccion=@direccion WHERE idEmpresa=@idEmpresa
GO

CREATE PROCEDURE sp_empresa_solicitud
	@idEmpresa int
AS
	SELECT idEmpresa,ruc,razonSocial,direccion,telefono,imagen FROM Empresas WHERE idEmpresa=@idEmpresa AND stateEmpresa='1' AND isVerified='0'
GO

CREATE PROCEDURE sp_obtener_empresas
AS
	SELECT idEmpresa,ruc,razonSocial,direccion,telefono,imagen FROM Empresas WHERE stateEmpresa='1' AND isVerified='1'
GO

CREATE PROCEDURE sp_validar_ruc
	@ruc char(11)
AS
	SELECT ruc FROM EMPRESAS WHERE ruc=@ruc;
GO

/*PROCEDIMIENTOS DE USUARIO*/

CREATE PROCEDURE sp_login
	@nameUser char(11)
AS
	SELECT idUsuario,idTipoUsuario,nameUser,pass,idEmpresa FROM Usuarios WHERE nameUser=@nameUser
GO

CREATE PROCEDURE sp_obtenerUsuarios
AS
	SELECT U.idUsuario as idUsuario,t.descripcion as descripcion,u.nameUser as usuario,e.razonSocial as razonSocial,e.imagen as imagen,u.stateUser as estado
            FROM Usuarios u inner join Empresas e on u.idEmpresa=e.idEmpresa inner join TipoUsuario t on t.idTipoUsuario=u.idTipoUsuario WHERE stateUser='1'
GO

CREATE PROCEDURE sp_obtenerUsuario
	@idUser int
AS
	SELECT U.idUsuario as idUsuario, u.idTipoUsuario,u.nameUser as usuario,u.pass,u.stateUser as estado,e.idEmpresa,e.razonSocial as razonSocial,e.ruc as ruc,e.imagen as imagen
            FROM Usuarios u inner join Empresas e on u.idEmpresa=e.idEmpresa WHERE u.idUsuario=@idUser
GO

CREATE PROCEDURE sp_deleteUsuario
	@idUser int
AS
	UPDATE Usuarios SET stateUser='0' WHERE idUsuario=@idUser
GO

CREATE PROCEDURE sp_obtenerUser_Empresa
	@idUser int
AS
	SELECT ruc,razonSocial,imagen FROM Empresas WHERE idEmpresa=@idUser
GO
/* Vista de productos usuario*/

CREATE PROCEDURE sp_obtenerProductos
AS
	SELECT P.idProducto,P.descripcion,P.nombre,P.precio,P.stock,P.imagen,E.razonSocial AS empresa FROM Producto P INNER JOIN Empresas E ON P.idEmpresa=E.idEmpresa WHERE P.estado=1
GO

CREATE PROCEDURE sp_Detalle_producto_usuario
	@idProducto int
AS
	SELECT P.idProducto,STUFF((SELECT ', ' + caracteristica +' '+ valor from Caracteristicas_Producto C JOIN Caracteristicas CA on C.id = CA.idCaracteristica AND  C.idProducto=P.idProducto for xml path('')),1,1,'') AS caracteristica,P.nombre,P.precio,P.stock,P.imagen,E.razonSocial AS empresa, E.ruc, E.direccion, E.telefono, CONVERT(VARCHAR(8),getDate(),105) fecha  FROM Producto P INNER JOIN Empresas E ON P.idEmpresa=E.idEmpresa
            WHERE P.idProducto=@idProducto AND P.estado=1
GO

CREATE PROCEDURE sp_producto_detallesmodel
	@idProducto int
AS
	SELECT P.idProducto,P.descripcion,P.nombre,P.precio,P.stock,P.imagen,E.razonSocial FROM Producto P INNER JOIN Empresas E ON P.idEmpresa=E.idEmpresa WHERE P.idProducto=@idProducto AND estado=1
GO

/*SOLICITUDES*/

CREATE PROCEDURE sp_obtenerSolicitudes
AS
	SELECT idEmpresa,ruc,razonSocial,direccion,telefono,imagen FROM Empresas WHERE stateEmpresa='1' AND isVerified='0'
GO

CREATE PROCEDURE sp_obtenerSolicitud
	@idEmpresa int
AS
	SELECT idEmpresa,ruc,razonSocial,direccion,telefono,imagen FROM Empresas WHERE idEmpresa=@idEmpresa AND stateEmpresa='1' AND isVerified='0'
GO

CREATE PROCEDURE sp_deleteSolicitud
	@idEmpresa int
AS
	UPDATE Empresas SET stateEmpresa='0' WHERE idEmpresa=@idEmpresa
GO

CREATE PROCEDURE sp_activarEmpresa
	@idEmpresa int
AS
	UPDATE Empresas SET isVerified='1' WHERE idEmpresa=@idEmpresa
GO


/*SOLICITUDES DE COTIZACION DE EMPRESAS*/

CREATE PROCEDURE sp_obtener_solicitudempresas
	@user int
AS
	SELECT SP.idSolicitud, P.nombre, RSE.stateEmpresa FROM Rel_SolicitudEmpresa RSE INNER JOIN Producto P ON RSE.idProducto=P.idProducto INNER JOIN SolicitudesPersonalizadas SP ON SP.idSolicitud=RSE.idSolicitud WHERE SP.idUsuario=@user
GO

CREATE PROCEDURE sp_obtenerrpta_empresa
	@idSolicitud int
AS
	SELECT P.idProducto,P.imagen,P.stock,STUFF((SELECT ', ' + caracteristica +' '+ valor from Caracteristicas_Producto C JOIN Caracteristicas CA on C.id = CA.idCaracteristica AND  C.idProducto=P.idProducto for xml path('')),1,1,'') AS caracteristica,P.nombre,P.precio,P.stock,P.imagen,E.razonSocial AS empresa, E.direccion, E.telefono, E.ruc, CONVERT(VARCHAR(8),SP.fecha,105) fecha, SP.numero FROM Producto P INNER JOIN Empresas E ON P.idEmpresa=E.idEmpresa 
            INNER JOIN Rel_SolicitudEmpresa RSE ON RSE.idProducto=P.idProducto INNER JOIN SolicitudesPersonalizadas SP ON SP.idSolicitud=RSE.idSolicitud WHERE RSE.idSolicitud=@idSolicitud
GO

CREATE PROCEDURE sp_actualizar_estado
	@idSolicitud int
AS
	UPDATE Rel_SolicitudEmpresa SET stateUser='2' WHERE idSolicitud=@idSolicitud
GO

CREATE PROCEDURE sp_validar_estado
	@idSolicitud int
AS
	SELECT stateUser FROM Rel_SolicitudEmpresa WHERE idSolicitud=@idSolicitud
GO

CREATE PROCEDURE sp_actualizar_estado_aceptado
	@idSolicitud int
AS
	UPDATE Rel_SolicitudEmpresa SET stateUser='3' WHERE idSolicitud=@idSolicitud
GO