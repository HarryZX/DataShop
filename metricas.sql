CREATE DATABASE metricas;
USE metricas;

-- ###############################################
-- # CREAMOS LAS TABLAS DE NUESTRA BASE DE DATOS #
-- ###############################################

-- TABLA QUE CONTENDRÁ LAS MARCAS DE LOS PRODUCTOS
CREATE TABLE tipos(
	idTipo smallint primary key null auto_increment,
	marca char(30) null
);

-- TABLA QUE CONTENDRÁ LA LISTA DE TODOS LOS PRODUCTOS
CREATE TABLE productos(
	idProducto smallint primary key null auto_increment,
	idTipo smallint null,
	nombreProducto char(20) null,
	descripcionProducto char(150) null,
	precioProducto float(3,2) null,
	foreign key (idTipo) references tipos(idTipo)
);

-- TABLA QUE CONTENDRÁ LA CANTIDAD DE PRODUCTOS COMPRADOS
CREATE TABLE lotes(
	idLote smallint primary key null auto_increment,
	idProducto smallint null,
	unidadPorLote smallint null,
	foreign key (idProducto) references productos(idProducto)
);

-- TABLA QUE CONTENDRÁ LOS REGISTROS DE CADA COMPRA
CREATE TABLE compras(
	idCompra smallint primary key null auto_increment,
	idLote smallint null,
	fechaCompra date null,
	cantidadLote smallint null,
	cantidadUnitaria smallint null,
	totalCompra float(3,2) null,
	foreign key (idLote) references lotes(idLote)
);

-- TABLA QUE MOSTRARÁ LAS EXISTENCIAS DE LOS PRODUCTOS
CREATE TABLE existencias(
	idExistencia smallint primary key null auto_increment,
	idLote smallint null,
	disponible enum('en existencia','agotado') null,
	foreign key (idLote) references lotes(idLote)
);

-- TABLA QUE CONENDRÁ LOS REGISTROS DE CADA VENTA
CREATE TABLE ventas(
	idVentas smallint primary key null auto_increment,
	idLote smallint null,
	fechaVenta date null,
	cantidadVenta smallint null,
	totalVenta float(3,2) null,
	foreign key (idLote) references lotes(idLote)
);

-- ########################################
-- # TRIGGERS PARA AUTOMATIZAR LAS TABLAS #
-- ########################################

-- TRIGGER PARA MODIFICAR LA CANTIDAD DE LOS LOTES AL REALIZAR UNA VENTA
DELIMITER |
CREATE TRIGGER cambiaCantidad AFTER INSERT ON ventas
	FOR EACH ROW BEGIN
		IF NEW.cantidadVenta > 0 THEN
			UPDATE lotes SET unidadPorLote = unidadPorLote - NEW.cantidadVenta WHERE idLote = NEW.idLote;
		END IF;
	END;
|
DELIMITER ;

-- TRIGGER PARA MODIFICAR EL ESTADO DE LAS EXISTENCIAS AL NO HABER MÁS LOTES
DELIMITER |
CREATE TRIGGER cambiaEstado AFTER UPDATE ON lotes
	FOR EACH ROW BEGIN
		IF NEW.unidadPorLote <= 0 THEN
			UPDATE existencias SET disponible = 'agotado' WHERE idLote = NEW.idLote;
		ELSE
			UPDATE existencias SET disponible = 'en existencia';
		END IF;
	END;
|
DELIMITER ;

-- TRIGGER PARA MODIFICAR LA CANTIDAD DE LOS LOTES AL REALIZAR UNA COMPRA
DELIMITER |
CREATE TRIGGER cambiaValor AFTER INSERT ON compras
	FOR EACH ROW BEGIN
		IF NEW.cantidadLote > 0 THEN
			UPDATE lotes SET unidadPorLote = unidadPorLote + (NEW.cantidadUnitaria * NEW.cantidadLote) WHERE idLote = NEW.idLote;
		END IF;
	END;
|
DELIMITER ;

-- ###################
-- # DATOS INICIALES #
-- ###################

-- AGREGAMOS LAS MARCAS QUE MÁS SE VENDEN
INSERT INTO `tipos`(`marca`) VALUES ("DIANA"),("YUMMIES"),("BOCADELI"),("SEÑORIAL");

-- AGREGAMOS LA LISTA DE LOS PRODUCTOS CON SUS RESPECTIVAS MARCAS
INSERT INTO `productos`(`idTipo`,`nombreProducto`,`descripcionProducto`,`precioProducto`) VALUES (1,"NACHOS","Tortilla frita cubierta de queso",0.10),(2,"TAQUERITOS QUESO","Tortilla frita en forma de taco cubierta de queso",0.25),(3,"KITOS","Chicharrón frito con chile y limón",0.10),(4,"NACHOS","Tortilla frita cubierta de queso",0.10);

-- AGREGAMOS LA CANTIDAD DE PRODUCTOS EN EL ALMACEN
INSERT INTO `lotes`(`idProducto`, `unidadPorLote`) VALUES (1,12),(2,12),(3,12),(4,12);

-- AGREGAMOS LOS ESTADOS DE LAS EXISTENCIAS DE LOS PRODUCTOS ALMACENADOS
INSERT INTO `existencias`(`idLote`, `disponible`) VALUES (1,'en existencia'),(2,'en existencia'),(3,'en existencia'),(4,'en existencia');

