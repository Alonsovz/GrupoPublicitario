drop database if exists grupoPublicitario;
create database grupoPublicitario;

use grupoPublicitario;

create table rol(
codigoRol int primary key auto_increment,
descRol varchar(50)
);

create table usuario (
    codigoUsuario int primary key auto_increment,
    nombre varchar(50),
    apellido varchar(50),
    nit varchar(20),
    dui varchar(10),
    fechaNac date,
    telefono varchar(50),
    celular varchar(50),
    email varchar(100),
    direccion varchar(500),
    MISSS varchar(50),
    afiliado varchar(60),
    MAFP varchar(50),
    estadoCivil varchar(30),
    conyuge varchar(100),
    hijos int,
    nomPadre varchar(60),
    nomMadre varchar(60),
    nomEmergencia varchar(60),
    telEmergencia varchar(10),
    celEmergenecia varchar(10),
    fechaIngreso date,
    salario double,
    codigoRol int,
    nomUsuario varchar(75),
    pass varchar(75),
    idEliminado int
);
create table hijosEmp(
codigoUsuario int,
nombreHijo varchar(50)
);

create table clientes(
idCliente int primary key  auto_increment,
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
idClasificacion int primary key  auto_increment,
clasificacion varchar(40)
);
create table clasificacionProductos(
idProducto int primary key auto_increment,
nombre varchar(100),
idClasificacion int,
idEliminado int
);


create table inventario(
idProducto int,
idColor int,
idAcabado int,	
cantidadExistencia double,
precioUnitario double
);


create table productoFinal(
idProductoFinal int primary key  auto_increment,
productoFinal varchar(100),
idProducto int
);

create table productosDetalle(
idProductoFinal int,
idColor int,
idAcabado int,
idMedida int
);


create table colores(
idColor int primary key auto_increment,
color varchar(100),
idClasificacion int,
idEliminado int
);

create table acabados(
idAcabado int primary key auto_increment,
acabado varchar(100),
idClasificacion int,
idEliminado int
);

create table medidas(
idMedida int primary key auto_increment,
medida varchar(100),
idClasificacion int,
idEliminado int
);
 
 create table proveedores(
idProveedor int primary key auto_increment,
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
idOrden int primary key auto_increment,
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
idDetalle int primary key auto_increment,
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
idOrden int primary key auto_increment,
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
idDetalle int primary key auto_increment,
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
idOrden int primary key auto_increment,
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
idDetalle int primary key auto_increment,
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
idRequisicion int primary key auto_increment,
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
idDetalle int primary key auto_increment,
idRequisicion int,
idProductoFinal int,
color int,
acabado int,
cantidad varchar(50),
medidas varchar(50),
descripcion varchar(500),
precioUnitario double,
total double,
estado int,
idEliminado int
);


create table gastosOficina(
idGasto int primary key auto_increment,
nombre varchar(100),
idEliminado int
);

create table gastos(
idDetalle int primary key auto_increment,
idGasto int,
descripcion varchar(500),
precio double,
fecha date,
estado int
);

create table notaCredito(
idNota int primary key auto_increment,
idCliente int,
fechaNota date,
nNota varchar(50),
nRegistro varchar(50),
ventaCuenta varchar(500),
condOper varchar(500),
nNotaAn varchar(500),
fechaNotaAn date
);

select o.*,DATE_FORMAT(o.fechaNota, '%d/%m/%Y') as fecha,DATE_FORMAT(o.fechaNotaAn, '%d/%m/%Y') as fechaNotaAn,
        c.*
       from notaCredito o
       inner join clientes c on c.idCliente = o.idCliente
       where o.idNota = (select max(idNota) from notaCredito)

create table detalleNota(
idDetalle int primary key auto_increment,
idNota int,
cantidad double,
descripcion varchar(500),
precioUni double,
ventasNo double,
ventasEx double,
ventasGra double
);




alter table usuario add constraint fk_usuario_rol foreign key (codigoRol) references rol(codigoRol);

 insert into rol values(1,'Administrador/a');
insert into rol values(2,'Produccion');
insert into rol values(3,'Secretaria/o');
 insert into rol values(4,'Propietario');
 


insert into usuario values(null,'Fabio','Mejia','8187-239817-239-8','01234567-8',
'1980-12-10','2312-2312','7121-1231','fabiomejiash@gmail.com','San Juan Opico','09123-1','AFP Crecer','123413-2',
'Soltero/a','',1,'Jose Lepoldo Mejia','Rebeca de Mejia','Juan Jose Lopez Maravilla','2314-5312','7980-1352',curdate(),450.00,4,'fabio',sha1(1234),1);

insert into hijosEmp values(1,'Carlos Mejia');


insert into usuario values(null,'Alonso','Velasquez','8187-239817-239-8','01234567-8',
'1980-12-10','2312-2312','7121-1231','mejiafabio383@gmail.com','San Juan Opico','09123-1','AFP Crecer','123413-2',
'Soltero/a','',1,'Jose Lepoldo Mejia','Rebeca de Mejia','Juan Jose Lopez Maravilla','2314-5312','7980-1352',curdate(),450.00,1,'alonso',sha1(1234),1);



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



insert into ordenTrabajoGR values(null,'OTGR00',curdate(),1,1,curdate(),'',9,1);
insert into ordenTrabajoIP values(null,'OTIP00',curdate(),1,1,curdate(),'',9,1);
insert into ordenTrabajoP values(null,'OTPR00',curdate(),1,1,curdate(),'',9,1);

insert into gastosOficina values(null,'Internet',1);
	
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

select r.*, d.* ,p.* from detalleRequisicion d
inner join requisiciones r on r.idRequisicion = d.idRequisicion
inner join proveedores p on p.idProveedor = r.idProveedor
where r.estado=5;