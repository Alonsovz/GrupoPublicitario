drop database if exists grupoPublicitario;
create database grupoPublicitario;

use grupoPublicitario;

create table rol(
codigoRol int primary key unique auto_increment,
descRol varchar(50)
);

create table usuario (
    codigoUsuario int primary key unique auto_increment,
    nombre varchar(50),
    apellido varchar(50),
    nomUsuario varchar(75),
    email varchar(100),
    direccion varchar(500),
    pass varchar(75),
    telefono varchar(50),
    dui varchar(10),
    fechaNac date,
    codigoRol int,
    idEliminado int
);

create table clientes(
idCliente int primary key unique auto_increment,
nombre varchar(100),
nit varchar(40),
nrc varchar(40),
direccion varchar(500),
departamento varchar(40),
giro varchar(500),
categoria varchar(40),
tipoDoc varchar(40),
condicionCredito varchar(50),
telefono varchar(30),
celular varchar(50),
contacto varchar(80),
correo varchar(50),
idEliminado int
);

create table tipoProductos(
idClasificacion int primary key unique auto_increment,
clasificacion varchar(40)
);
create table clasificacionProductos(
idProducto int primary key unique auto_increment,
nombre varchar(100),
idClasificacion int,
idEliminado int
);

create table productoFinal(
idProductoFinal int primary key unique auto_increment,
productoFinal varchar(100),
idProducto int
);

create table productosColores(
idProductoFinal int,
idColor int
);

create table productosAcabados(
idProductoFinal int,
idAcabado int
);

create table productosMedidas(
idProductoFinal int,
idMedida int
);

create table colores(
idColor int primary key unique auto_increment,
color varchar(100),
idClasificacion int,
idEliminado int
);

create table acabados(
idAcabado int primary key unique auto_increment,
acabado varchar(100),
idClasificacion int,
idEliminado int
);

create table medidas(
idMedida int primary key unique auto_increment,
medida varchar(100),
idClasificacion int,
idEliminado int
);
 
 create table proveedores(
idProveedor int primary key unique auto_increment,
nombre varchar(100),
nit varchar(40),
nrc varchar(40),
direccion varchar(500),
departamento varchar(40),
giro varchar(500),
categoria varchar(40),
tipoSuministro int,
idClasificacion int,
condicionCredito varchar(50),
telefono varchar(30),
celular varchar(50),
contacto varchar(80),
correo varchar(50),
idEliminado int
);


create table ordenTrabajoGR(
idOrden int primary key unique auto_increment,
correlativo varchar(20),
fechaOT date,
responsable int,
cliente int,
fechaEntrega date,
descripcionesE varchar(500),
estado int,
idEliminado int
);



create table detalleOrdenGR(
idDetalle int primary key unique auto_increment,
idOrden int ,
idProductoFinal int,
idColor int,
idAcabado int,
cantidad varchar(20),
altura varchar(20),
base varchar(20),
cuadrosImp varchar(100),
ubicacion varchar(100),
ancho varchar(40),
longitud varchar(49),
anchoMat varchar(59),
copias varchar(50),
mts2 varchar(50),
desperdicio varchar(50),
descripciones varchar(500),
precio double
);


create table ordenTrabajoIP(
idOrden int primary key unique auto_increment,
correlativo varchar(20),
fechaOT date,
responsable int,
cliente int,
fechaEntrega date,
descripcionesE varchar(500),
estado int,
idEliminado int
);

create table detalleOrdenIP(
idDetalle int primary key unique auto_increment,
idOrden int ,
idProductoFinal int,
idColor int,
idAcabado int,
cantidad varchar(20),
tipo varchar(50),
descripciones varchar(500),
precio double
);


create table ordenTrabajoP(
idOrden int primary key unique auto_increment,
correlativo varchar(20),
fechaOT date,
responsable int,
cliente int,
fechaEntrega date,
descripcionesE varchar(500),
estado int,
idEliminado int
);

create table detalleOrdenP(
idDetalle int primary key unique auto_increment,
idOrden int ,
idProductoFinal int,
idColor int,
idAcabado int,
cantidad varchar(20),
tipo varchar(50),
descripciones varchar(500),
precio double
);

create table requisiciones(
idRequisicion int primary key unique auto_increment,
fecha date,
responsable int,
tipoCompra varchar(50),
idProveedor int,
tipoDoc varchar(50),
idClasificacion int,
fechaEntrega date,
estado int,
idEliminado int
);



create table detalleRequisicion(
idDetalle int primary key unique auto_increment,
idRequisicion int,
idProductoFinal int,
color int,
acabado int,
cantidad varchar(50),
medidas varchar(50),
descripcion varchar(500),
precio double,
idEliminado int
);


alter table usuario add constraint fk_usuario_rol foreign key (codigoRol) references rol(codigoRol);

 insert into rol values(1,'Administrador/a');
insert into rol values(2,'Produccion');
insert into rol values(3,'Asistente');



insert into usuario values(null,'Fabio','Mejia','fabio','fabiomejiash@gmail.com','San Juan Opico',sha1('123'),'7121-1231','01211242-1','1999-12-02',1,1);
 
 insert into usuario values(null,'Juan','Perez','juan','juan@gmail.com','Santa Tecla',sha1('123'),'7912-7680','01234324-1','1980-09-04',2,1);

 insert into usuario values(null,'Juana','Lopez','juana','juan123@gmail.com','San Salvador',sha1('123'),'7912-1241','09237913-1','1997-02-02',3,1);
 


insert into clientes values(null,'Adriana Marina Panameno','0614-110475-120-7','123642-2','BLOCK630SDA9-A URB, NUEVO LOURDESNº6 COLON ','La Libertad ','VENTA ALA POR MAYOR DE PRODUCTOS MEDICINALES','Frecuente','01234','Fiscal','2312-1231','7123-4324','Fabio Mejia','fabiomejiash@gmail.com',1);
 insert into clientes values(null,'Juan Jose','0614-110475-120-7','123642-2','BLOCK630SDA9-A URB, NUEVO LOURDESNº6 COLON ','La Union ','VENTA ALA POR MAYOR DE PRODUCTO','Especial','012345','Factura','2461-1231','7912-4324','Juan Mejia','juan@gmail.com',1);
 
 
 insert into tipoProductos values(null,'Gran Formato');
insert into tipoProductos values(null,'Impresion digital');
insert into tipoProductos values(null,'Promocionales');

insert into clasificacionProductos values(null,'Seleccione una opcion',1,1);
insert into clasificacionProductos values(null,'Seleccione una opcion',2,1);
insert into clasificacionProductos values(null,'Seleccione una opcion',3,1);
   
 insert into clasificacionProductos values(null,'LONAS-BANNER',1,1);
  insert into clasificacionProductos values(null,'LAMINADOR FILM',1,1);
insert into clasificacionProductos values(null,'PAPEL /TABLOIDES',2,1);
insert into clasificacionProductos values(null,'DISENO',2,1);
insert into clasificacionProductos values(null,'Tazas',3,1);
insert into clasificacionProductos values(null,'Vasos',3,1);



insert into colores values(null,'No Definido',1,1);
insert into colores values(null,'De Fabrica',1,1);
insert into colores values(null,'Blanco',1,1);
insert into colores values(null,'Negro',1,1);
insert into colores values(null,'Gris',1,1);

insert into colores values(null,'No Definido',2,1);
insert into colores values(null,'De Fabrica',2,1);
insert into colores values(null,'CYAN',2,1);
insert into colores values(null,'Magenta',2,1);
insert into colores values(null,'Yellow',2,1);

insert into colores values(null,'No Definido',3,1);
insert into colores values(null,'De Fabrica',3,1);
insert into colores values(null,'Beige',3,1);
insert into colores values(null,'Blanco',3,1);
insert into colores values(null,'Negro',3,1);


insert into acabados values(null,'No definido',1,1);
insert into acabados values(null,'De Fabrica',1,1);
insert into acabados values(null,'Brillante/Glossy',1,1);
insert into acabados values(null,'Mate',1,1);
insert into acabados values(null,'Glossy',1,1);


insert into acabados values(null,'No definido',2,1);
insert into acabados values(null,'De Fabrica',2,1);
insert into acabados values(null,'Mate',2,1);
insert into acabados values(null,'Brillante/Gloss',2,1);


insert into acabados values(null,'No definido',3,1);
insert into acabados values(null,'De Fabrica',3,1);
insert into acabados values(null,'CON AGARRADERO',3,1);
insert into acabados values(null,'SIN AGARRADERO',3,1);

insert into medidas values(null,'Metro',1,1);
insert into medidas values(null,'Yardas',1,1);
insert into medidas values(null,'Lamina',1,1);

insert into medidas values(null,'Tabloide',2,1);
insert into medidas values(null,'Hora',2,1);
insert into medidas values(null,'LITROS',2,1);

insert into medidas values(null,'UNIDAD',3,1);




insert into productoFinal values(null,'Seleccione una opcion',0);
insert into productoFinal values(null,'LONA BANNER',4);
insert into productoFinal values(null,'FILM BACKLITE',4);
insert into productoFinal values(null,'LAMINADOR FILM',5);

insert into productoFinal values(null,'PAPEL FOLCOTE',6);
insert into productoFinal values(null,'Diseno',7);

insert into productoFinal values(null,'Taza de ceramica',8);
insert into productoFinal values(null,'VASOS DE ACRILICO',9);

insert into productosAcabados values(2,2);
insert into productosAcabados values(2,3);
insert into productosColores values(2,3);
insert into productosColores values(2,4);
insert into productosMedidas values(2,1);
insert into productosMedidas values(2,2);

insert into ordenTrabajoGR values(null,'OTGR00',curdate(),1,1,curdate(),'',1,1);
insert into ordenTrabajoIP values(null,'OTIP00',curdate(),1,1,curdate(),'',1,1);
insert into ordenTrabajoP values(null,'OTPR00',curdate(),1,1,curdate(),'',1,1);
 delimiter $$
 
create procedure login(
	in user varchar(50),
    in contra varchar(75)
)
begin
	select u.*, r.descRol
	from usuario u
	inner join rol r on r.codigoRol = u.codigoRol
    where u.nomUsuario = user and u.pass = contra and u.idEliminado=1;
end	
$$

delimiter $$
create procedure mostrarUsuarios()
begin
	select u.*, r.descRol
	from usuario u
	inner join rol r on r.codigoRol = u.codigoRol
    where u.idEliminado=1;
end
$$



delimiter $$
create procedure datosNomUsuario(
	in nom varchar(50)
)
begin
	select u.*, r.descRol
    from usuario u
    inner join rol r on r.codigoRol = u.codigoRol
    where u.nomUsuario = nom;
end
$$

delimiter $$
create procedure mostrarClientes()
begin
	select * from clientes
    where idEliminado=1;
end
$$

delimiter $$
create procedure mostrarProveedores()
begin
	select * from proveedores
    where idEliminado=1;
end
$$

select r.*, p.nombre as proveedor from requisiciones r
inner join proveedor p on p.idProveedor = r.idProveedor
 where r.idEliminado=1 and r.idClasificacion=1