-- MySQL Script generated by MySQL Workbench
-- Mon Aug  3 14:16:25 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
SHOW WARNINGS;
-- -----------------------------------------------------
-- Schema willie
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `willie` ;

-- -----------------------------------------------------
-- Schema willie
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `willie` DEFAULT CHARACTER SET utf8 ;
SHOW WARNINGS;
USE `willie` ;

-- -----------------------------------------------------
-- Table `willie`.`Cargo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `willie`.`Cargo` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `willie`.`Cargo` (
  `IdCargo` INT(15) NOT NULL AUTO_INCREMENT COMMENT 'aca ira el id identificardor unico del cargo',
  `NombreCargo` VARCHAR(20) NOT NULL COMMENT 'aca ira el nombre del cargo',
  `DescripcionCargo` VARCHAR(150) NOT NULL COMMENT 'aca vendra una breve descripcion del cargo',
  PRIMARY KEY (`IdCargo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `willie`.`DetFacturVenta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `willie`.`DetFacturVenta` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `willie`.`DetFacturVenta` (
  `IdDetFacturaVenta` INT(15) NOT NULL AUTO_INCREMENT COMMENT 'ira la llave de identificacion de cada Detalle de factura que se ira auto incclemenrado',
  `IdFacturaVenta` INT(11) NOT NULL COMMENT 'llave forane',
  `IdProducto` INT(11) NOT NULL COMMENT 'llave forane',
  PRIMARY KEY (`IdDetFacturaVenta`),
  CONSTRAINT `det_factura_venta_ibfk_2`
    FOREIGN KEY (`IdProducto`)
    REFERENCES `willie`.`Producto` (`IdProducto`),
  CONSTRAINT `det_factura_venta_ibfk_1`
    FOREIGN KEY (`IdFacturaVenta`)
    REFERENCES `willie`.`FacturaVenta` (`IdFacturaVenta`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `Id_Factura_Venta` ON `willie`.`DetFacturVenta` (`IdFacturaVenta` ASC) ;

SHOW WARNINGS;
CREATE INDEX `Id_Producto` ON `willie`.`DetFacturVenta` (`IdProducto` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `willie`.`DetFacturaCompra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `willie`.`DetFacturaCompra` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `willie`.`DetFacturaCompra` (
  `IdDetFacturaCompra` INT(15) NOT NULL AUTO_INCREMENT COMMENT 'ira la identificacion del detalle de factura compra',
  `IdFacturaCompra` INT(11) NOT NULL COMMENT 'Llave foranea',
  `IdProducto` INT(11) NOT NULL COMMENT 'Llave foranea',
  PRIMARY KEY (`IdDetFacturaCompra`),
  CONSTRAINT `det_factura_compra_ibfk_2`
    FOREIGN KEY (`IdProducto`)
    REFERENCES `willie`.`Producto` (`IdProducto`),
  CONSTRAINT `det_factura_compra_ibfk_1`
    FOREIGN KEY (`IdFacturaCompra`)
    REFERENCES `willie`.`FacturaCompra` (`IdFacturaCompra`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `Id_Factura_Compra` ON `willie`.`DetFacturaCompra` (`IdFacturaCompra` ASC) ;

SHOW WARNINGS;
CREATE INDEX `Id_Producto` ON `willie`.`DetFacturaCompra` (`IdProducto` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `willie`.`FacturaCompra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `willie`.`FacturaCompra` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `willie`.`FacturaCompra` (
  `IdFacturaCompra` INT(15) NOT NULL AUTO_INCREMENT COMMENT 'Ira la identificacion de la factura compra y se ira auto inclementando',
  `FechaFacturaCompra` DATE NOT NULL COMMENT 'Ira la fecha de la factuta compra',
  `EstadoFacturaCompra` INT(11) NOT NULL COMMENT 'Ira el estado de la factura compra',
  `IdProveedor` INT(11) NOT NULL COMMENT 'llave forane',
  `IdEmpleado` INT(11) NOT NULL COMMENT 'llave forane',
  PRIMARY KEY (`IdFacturaCompra`),
  CONSTRAINT `factura_compra_ibfk_2`
    FOREIGN KEY (`IdEmpleado`)
    REFERENCES `willie`.`empleado` (`IdEmpleado`),
  CONSTRAINT `factura_compra_ibfk_1`
    FOREIGN KEY (`IdProveedor`)
    REFERENCES `willie`.`Proveedor` (`IdProveedor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `Id_Proveedor` ON `willie`.`FacturaCompra` (`IdProveedor` ASC) ;

SHOW WARNINGS;
CREATE INDEX `Id_Empleado` ON `willie`.`FacturaCompra` (`IdEmpleado` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `willie`.`FacturaVenta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `willie`.`FacturaVenta` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `willie`.`FacturaVenta` (
  `IdFacturaVenta` INT(15) NOT NULL AUTO_INCREMENT COMMENT 'ira la identificacion de la factura deventa que sera auto inclementado',
  `FechaFacturaVenta` DATE NOT NULL COMMENT 'ira la fecha de la factura venta',
  `IdCliente` INT(11) NOT NULL COMMENT 'llave forane',
  `IdEmpleado` INT(11) NOT NULL COMMENT 'llave forane',
  PRIMARY KEY (`IdFacturaVenta`),
  CONSTRAINT `factura_venta_ibfk_2`
    FOREIGN KEY (`IdEmpleado`)
    REFERENCES `willie`.`empleado` (`IdEmpleado`),
  CONSTRAINT `factura_venta_ibfk_1`
    FOREIGN KEY (`IdCliente`)
    REFERENCES `willie`.`cliente` (`IdCliente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `Id_Cliente` ON `willie`.`FacturaVenta` (`IdCliente` ASC) ;

SHOW WARNINGS;
CREATE INDEX `Id_Empleado` ON `willie`.`FacturaVenta` (`IdEmpleado` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `willie`.`Producto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `willie`.`Producto` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `willie`.`Producto` (
  `IdProducto` INT(15) NOT NULL AUTO_INCREMENT COMMENT 'Irala identificaciondel producto que es auto inclementable',
  `NombreProducto` VARCHAR(50) NOT NULL COMMENT 'Ira el nombre del prodcuto',
  `Descripcion_Producto` VARCHAR(500) NOT NULL COMMENT 'Ira la descripcion del producto',
  `ValorEntradaProducto` VARCHAR(50) NOT NULL COMMENT 'Ira el Valor de entrada del producto',
  `ValorSalidaProducto` VARCHAR(50) NOT NULL COMMENT 'Ira el valor de salida del producto',
  `Stock` INT(15) NOT NULL COMMENT 'Ira la cactidad existente del producto',
  `CodigoBarrasProducto` INT(20) NOT NULL COMMENT 'Ira el codigo de barras del producto',
  PRIMARY KEY (`IdProducto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `willie`.`Proveedor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `willie`.`Proveedor` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `willie`.`Proveedor` (
  `IdProveedor` INT(15) NOT NULL AUTO_INCREMENT COMMENT 'ura la identificacion del Proveedor que se auto incrementara',
  `NombreProveedor` VARCHAR(45) NOT NULL COMMENT 'ira el nombre del Proveedor',
  `NitProveedor` INT(11) NOT NULL COMMENT 'ura el Nit del Proveedor',
  `DescripcionProveedor` VARCHAR(500) NULL DEFAULT NULL COMMENT 'ira la descripcion del Proveedor',
  PRIMARY KEY (`IdProveedor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `willie`.`TipoCargo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `willie`.`TipoCargo` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `willie`.`TipoCargo` (
  `IdTipoCargo` INT(15) NOT NULL COMMENT 'sera el id unico identificador del tipo cargo autoincrementable',
  `NombreTipoCargo` VARCHAR(500) NOT NULL COMMENT 'aca ira el nombre del tipo de cargo',
  `Cargo_IdCargo` INT(15) NOT NULL COMMENT 'Llave foranea',
  PRIMARY KEY (`IdTipoCargo`),
  CONSTRAINT `fk_TipoCargo_Cargo1`
    FOREIGN KEY (`Cargo_IdCargo`)
    REFERENCES `willie`.`Cargo` (`IdCargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_TipoCargo_Cargo1_idx` ON `willie`.`TipoCargo` (`Cargo_IdCargo` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `willie`.`cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `willie`.`cliente` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `willie`.`cliente` (
  `IdCliente` INT(15) NOT NULL AUTO_INCREMENT COMMENT 'aca vendra e identificador unico de cada cliente ',
  `persona_IdPersona` INT(15) NOT NULL,
  PRIMARY KEY (`IdCliente`),
  CONSTRAINT `fk_cliente_persona1`
    FOREIGN KEY (`persona_IdPersona`)
    REFERENCES `willie`.`persona` (`IdPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_cliente_persona1_idx` ON `willie`.`cliente` (`persona_IdPersona` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `willie`.`empleado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `willie`.`empleado` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `willie`.`empleado` (
  `IdEmpleado` INT(15) NOT NULL AUTO_INCREMENT COMMENT 'es el identificador unico de cada empleado ',
  `CodigoEmpleado` INT(11) NOT NULL COMMENT 'aca ira un codigo unico por cada empleado asignado',
  `persona_IdPersona` INT(15) NOT NULL,
  `TipoCargo_IdTipoCargo` INT(15) NOT NULL,
  PRIMARY KEY (`IdEmpleado`),
  CONSTRAINT `fk_empleado_persona1`
    FOREIGN KEY (`persona_IdPersona`)
    REFERENCES `willie`.`persona` (`IdPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empleado_TipoCargo1`
    FOREIGN KEY (`TipoCargo_IdTipoCargo`)
    REFERENCES `willie`.`TipoCargo` (`IdTipoCargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_empleado_persona1_idx` ON `willie`.`empleado` (`persona_IdPersona` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_empleado_TipoCargo1_idx` ON `willie`.`empleado` (`TipoCargo_IdTipoCargo` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `willie`.`persona`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `willie`.`persona` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `willie`.`persona` (
  `IdPersona` INT(15) NOT NULL AUTO_INCREMENT COMMENT 'es el identificador unico de cada persona',
  `DocumentoIdentificacionPersona` INT(15) NOT NULL,
  `NombrePersona` VARCHAR(50) NOT NULL COMMENT 'aca va el nombre de cada persona',
  `ApellidoPersona` VARCHAR(50) NOT NULL COMMENT 'aca va el apellido de cada persona',
  `DireccionPersona` VARCHAR(50) NOT NULL COMMENT 'aca va la direccion de cada persona',
  `TelefonoPersona` INT(15) NOT NULL COMMENT 'aca va el telefono de cada persona',
  PRIMARY KEY (`IdPersona`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Data for table `willie`.`Cargo`
-- -----------------------------------------------------
START TRANSACTION;
USE `willie`;
INSERT INTO `willie`.`Cargo` (`IdCargo`, `NombreCargo`, `DescripcionCargo`) VALUES (1, 'Administrativo', 'Monejo del sistema');
INSERT INTO `willie`.`Cargo` (`IdCargo`, `NombreCargo`, `DescripcionCargo`) VALUES (2, 'Operario', 'Funciones logisticas');
INSERT INTO `willie`.`Cargo` (`IdCargo`, `NombreCargo`, `DescripcionCargo`) VALUES (3, 'Seguridad', 'Brindar canfianza');

COMMIT;


-- -----------------------------------------------------
-- Data for table `willie`.`DetFacturVenta`
-- -----------------------------------------------------
START TRANSACTION;
USE `willie`;
INSERT INTO `willie`.`DetFacturVenta` (`IdDetFacturaVenta`, `IdFacturaVenta`, `IdProducto`) VALUES (1, 1, 2);
INSERT INTO `willie`.`DetFacturVenta` (`IdDetFacturaVenta`, `IdFacturaVenta`, `IdProducto`) VALUES (2, 1, 3);
INSERT INTO `willie`.`DetFacturVenta` (`IdDetFacturaVenta`, `IdFacturaVenta`, `IdProducto`) VALUES (3, 1, 1);
INSERT INTO `willie`.`DetFacturVenta` (`IdDetFacturaVenta`, `IdFacturaVenta`, `IdProducto`) VALUES (4, 1, 4);
INSERT INTO `willie`.`DetFacturVenta` (`IdDetFacturaVenta`, `IdFacturaVenta`, `IdProducto`) VALUES (5, 2, 1);
INSERT INTO `willie`.`DetFacturVenta` (`IdDetFacturaVenta`, `IdFacturaVenta`, `IdProducto`) VALUES (6, 2, 2);
INSERT INTO `willie`.`DetFacturVenta` (`IdDetFacturaVenta`, `IdFacturaVenta`, `IdProducto`) VALUES (7, 3, 5);
INSERT INTO `willie`.`DetFacturVenta` (`IdDetFacturaVenta`, `IdFacturaVenta`, `IdProducto`) VALUES (8, 3, 6);
INSERT INTO `willie`.`DetFacturVenta` (`IdDetFacturaVenta`, `IdFacturaVenta`, `IdProducto`) VALUES (9, 3, 7);
INSERT INTO `willie`.`DetFacturVenta` (`IdDetFacturaVenta`, `IdFacturaVenta`, `IdProducto`) VALUES (10, 4, 8);

COMMIT;


-- -----------------------------------------------------
-- Data for table `willie`.`DetFacturaCompra`
-- -----------------------------------------------------
START TRANSACTION;
USE `willie`;
INSERT INTO `willie`.`DetFacturaCompra` (`IdDetFacturaCompra`, `IdFacturaCompra`, `IdProducto`) VALUES (1, 1, 1);
INSERT INTO `willie`.`DetFacturaCompra` (`IdDetFacturaCompra`, `IdFacturaCompra`, `IdProducto`) VALUES (2, 1, 2);
INSERT INTO `willie`.`DetFacturaCompra` (`IdDetFacturaCompra`, `IdFacturaCompra`, `IdProducto`) VALUES (3, 1, 3);
INSERT INTO `willie`.`DetFacturaCompra` (`IdDetFacturaCompra`, `IdFacturaCompra`, `IdProducto`) VALUES (4, 2, 4);
INSERT INTO `willie`.`DetFacturaCompra` (`IdDetFacturaCompra`, `IdFacturaCompra`, `IdProducto`) VALUES (5, 2, 5);
INSERT INTO `willie`.`DetFacturaCompra` (`IdDetFacturaCompra`, `IdFacturaCompra`, `IdProducto`) VALUES (6, 2, 6);
INSERT INTO `willie`.`DetFacturaCompra` (`IdDetFacturaCompra`, `IdFacturaCompra`, `IdProducto`) VALUES (7, 3, 7);
INSERT INTO `willie`.`DetFacturaCompra` (`IdDetFacturaCompra`, `IdFacturaCompra`, `IdProducto`) VALUES (8, 3, 8);
INSERT INTO `willie`.`DetFacturaCompra` (`IdDetFacturaCompra`, `IdFacturaCompra`, `IdProducto`) VALUES (9, 3, 9);
INSERT INTO `willie`.`DetFacturaCompra` (`IdDetFacturaCompra`, `IdFacturaCompra`, `IdProducto`) VALUES (10, 1, 10);

COMMIT;


-- -----------------------------------------------------
-- Data for table `willie`.`FacturaCompra`
-- -----------------------------------------------------
START TRANSACTION;
USE `willie`;
INSERT INTO `willie`.`FacturaCompra` (`IdFacturaCompra`, `FechaFacturaCompra`, `EstadoFacturaCompra`, `IdProveedor`, `IdEmpleado`) VALUES (1, '2020-01-21', 1, 1, 1);
INSERT INTO `willie`.`FacturaCompra` (`IdFacturaCompra`, `FechaFacturaCompra`, `EstadoFacturaCompra`, `IdProveedor`, `IdEmpleado`) VALUES (2, '2020-01-21', 1, 1, 1);
INSERT INTO `willie`.`FacturaCompra` (`IdFacturaCompra`, `FechaFacturaCompra`, `EstadoFacturaCompra`, `IdProveedor`, `IdEmpleado`) VALUES (3, '2020-02-23', 1, 1, 1);
INSERT INTO `willie`.`FacturaCompra` (`IdFacturaCompra`, `FechaFacturaCompra`, `EstadoFacturaCompra`, `IdProveedor`, `IdEmpleado`) VALUES (4, '2020-01-23', 1, 2, 1);
INSERT INTO `willie`.`FacturaCompra` (`IdFacturaCompra`, `FechaFacturaCompra`, `EstadoFacturaCompra`, `IdProveedor`, `IdEmpleado`) VALUES (5, '2020-01-23', 1, 2, 1);
INSERT INTO `willie`.`FacturaCompra` (`IdFacturaCompra`, `FechaFacturaCompra`, `EstadoFacturaCompra`, `IdProveedor`, `IdEmpleado`) VALUES (6, '2020-05-21', 1, 3, 1);
INSERT INTO `willie`.`FacturaCompra` (`IdFacturaCompra`, `FechaFacturaCompra`, `EstadoFacturaCompra`, `IdProveedor`, `IdEmpleado`) VALUES (7, '2020-01-21', 1, 3, 1);
INSERT INTO `willie`.`FacturaCompra` (`IdFacturaCompra`, `FechaFacturaCompra`, `EstadoFacturaCompra`, `IdProveedor`, `IdEmpleado`) VALUES (8, '2020-12-22', 1, 4, 1);
INSERT INTO `willie`.`FacturaCompra` (`IdFacturaCompra`, `FechaFacturaCompra`, `EstadoFacturaCompra`, `IdProveedor`, `IdEmpleado`) VALUES (9, '2020-01-22', 1, 5, 1);
INSERT INTO `willie`.`FacturaCompra` (`IdFacturaCompra`, `FechaFacturaCompra`, `EstadoFacturaCompra`, `IdProveedor`, `IdEmpleado`) VALUES (10, '2020-01-22', 1, 5, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `willie`.`FacturaVenta`
-- -----------------------------------------------------
START TRANSACTION;
USE `willie`;
INSERT INTO `willie`.`FacturaVenta` (`IdFacturaVenta`, `FechaFacturaVenta`, `IdCliente`, `IdEmpleado`) VALUES (1, '2020-12-23', 1, 1);
INSERT INTO `willie`.`FacturaVenta` (`IdFacturaVenta`, `FechaFacturaVenta`, `IdCliente`, `IdEmpleado`) VALUES (2, '2020-12-23', 1, 2);
INSERT INTO `willie`.`FacturaVenta` (`IdFacturaVenta`, `FechaFacturaVenta`, `IdCliente`, `IdEmpleado`) VALUES (3, '2020-12-23', 1, 2);
INSERT INTO `willie`.`FacturaVenta` (`IdFacturaVenta`, `FechaFacturaVenta`, `IdCliente`, `IdEmpleado`) VALUES (4, '2020-12-23', 1, 2);
INSERT INTO `willie`.`FacturaVenta` (`IdFacturaVenta`, `FechaFacturaVenta`, `IdCliente`, `IdEmpleado`) VALUES (5, '2020-12-22', 1, 4);
INSERT INTO `willie`.`FacturaVenta` (`IdFacturaVenta`, `FechaFacturaVenta`, `IdCliente`, `IdEmpleado`) VALUES (6, '2020-12-22', 2, 4);
INSERT INTO `willie`.`FacturaVenta` (`IdFacturaVenta`, `FechaFacturaVenta`, `IdCliente`, `IdEmpleado`) VALUES (7, '2020-12-22', 2, 4);
INSERT INTO `willie`.`FacturaVenta` (`IdFacturaVenta`, `FechaFacturaVenta`, `IdCliente`, `IdEmpleado`) VALUES (8, '2020-12-21', 2, 3);
INSERT INTO `willie`.`FacturaVenta` (`IdFacturaVenta`, `FechaFacturaVenta`, `IdCliente`, `IdEmpleado`) VALUES (9, '2020-12-21', 1, 3);
INSERT INTO `willie`.`FacturaVenta` (`IdFacturaVenta`, `FechaFacturaVenta`, `IdCliente`, `IdEmpleado`) VALUES (10, '2020-12-21', 1, 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `willie`.`Producto`
-- -----------------------------------------------------
START TRANSACTION;
USE `willie`;
INSERT INTO `willie`.`Producto` (`IdProducto`, `NombreProducto`, `Descripcion_Producto`, `ValorEntradaProducto`, `ValorSalidaProducto`, `Stock`, `CodigoBarrasProducto`) VALUES (1, 'Chocoramo', 'Ponde de chocolate', '900', '2000', 2000, 1);
INSERT INTO `willie`.`Producto` (`IdProducto`, `NombreProducto`, `Descripcion_Producto`, `ValorEntradaProducto`, `ValorSalidaProducto`, `Stock`, `CodigoBarrasProducto`) VALUES (2, 'Arequipe', 'Dulce de leche', '1000', '2500', 2000, 2);
INSERT INTO `willie`.`Producto` (`IdProducto`, `NombreProducto`, `Descripcion_Producto`, `ValorEntradaProducto`, `ValorSalidaProducto`, `Stock`, `CodigoBarrasProducto`) VALUES (3, 'Frunas', 'Goma en forma cuadrada de 5 gr', '350', '700', 2000, 3);
INSERT INTO `willie`.`Producto` (`IdProducto`, `NombreProducto`, `Descripcion_Producto`, `ValorEntradaProducto`, `ValorSalidaProducto`, `Stock`, `CodigoBarrasProducto`) VALUES (4, 'Barrilette', 'Goma en foma de baston de 10 gr', '200', '500', 2000, 4);
INSERT INTO `willie`.`Producto` (`IdProducto`, `NombreProducto`, `Descripcion_Producto`, `ValorEntradaProducto`, `ValorSalidaProducto`, `Stock`, `CodigoBarrasProducto`) VALUES (5, 'Gomas Trululu', 'Goma de 120 gr', '200', '500', 2000, 5);
INSERT INTO `willie`.`Producto` (`IdProducto`, `NombreProducto`, `Descripcion_Producto`, `ValorEntradaProducto`, `ValorSalidaProducto`, `Stock`, `CodigoBarrasProducto`) VALUES (6, 'Doritos', 'paqute de 60 gr', '900', '2000', 2000, 6);
INSERT INTO `willie`.`Producto` (`IdProducto`, `NombreProducto`, `Descripcion_Producto`, `ValorEntradaProducto`, `ValorSalidaProducto`, `Stock`, `CodigoBarrasProducto`) VALUES (7, 'Cheetos', 'paqute de 60 gr', '800', '1500', 2000, 7);
INSERT INTO `willie`.`Producto` (`IdProducto`, `NombreProducto`, `Descripcion_Producto`, `ValorEntradaProducto`, `ValorSalidaProducto`, `Stock`, `CodigoBarrasProducto`) VALUES (8, 'Cheestrys', 'paqute de 60 gr', '600', '1200', 2000, 8);
INSERT INTO `willie`.`Producto` (`IdProducto`, `NombreProducto`, `Descripcion_Producto`, `ValorEntradaProducto`, `ValorSalidaProducto`, `Stock`, `CodigoBarrasProducto`) VALUES (9, 'Barquillos', 'paqute de 10 gr', '800', '2000', 2000, 9);
INSERT INTO `willie`.`Producto` (`IdProducto`, `NombreProducto`, `Descripcion_Producto`, `ValorEntradaProducto`, `ValorSalidaProducto`, `Stock`, `CodigoBarrasProducto`) VALUES (10, 'Ponque Ramo', 'paqute de 180 gr', '1500', '3400', 2000, 10);

COMMIT;


-- -----------------------------------------------------
-- Data for table `willie`.`Proveedor`
-- -----------------------------------------------------
START TRANSACTION;
USE `willie`;
INSERT INTO `willie`.`Proveedor` (`IdProveedor`, `NombreProveedor`, `NitProveedor`, `DescripcionProveedor`) VALUES (1, 'Colombianas S.a.S.', 1, 'Vende todo tupo de Dulces');
INSERT INTO `willie`.`Proveedor` (`IdProveedor`, `NombreProveedor`, `NitProveedor`, `DescripcionProveedor`) VALUES (2, 'Frunas LTDA', 2, 'Vende todo tupo de Dulces');
INSERT INTO `willie`.`Proveedor` (`IdProveedor`, `NombreProveedor`, `NitProveedor`, `DescripcionProveedor`) VALUES (3, 'RAMO LTDA', 3, 'Vende todo tupo de Dulces');
INSERT INTO `willie`.`Proveedor` (`IdProveedor`, `NombreProveedor`, `NitProveedor`, `DescripcionProveedor`) VALUES (4, 'Chocosos S.A.S.', 4, 'Vende todo tupo de Dulces');
INSERT INTO `willie`.`Proveedor` (`IdProveedor`, `NombreProveedor`, `NitProveedor`, `DescripcionProveedor`) VALUES (5, 'Nutritiva LTDA', 5, 'Vende todo tupo de Dulces');

COMMIT;


-- -----------------------------------------------------
-- Data for table `willie`.`TipoCargo`
-- -----------------------------------------------------
START TRANSACTION;
USE `willie`;
INSERT INTO `willie`.`TipoCargo` (`IdTipoCargo`, `NombreTipoCargo`, `Cargo_IdCargo`) VALUES (1, 'Lider', 1);
INSERT INTO `willie`.`TipoCargo` (`IdTipoCargo`, `NombreTipoCargo`, `Cargo_IdCargo`) VALUES (2, 'Caja', 2);
INSERT INTO `willie`.`TipoCargo` (`IdTipoCargo`, `NombreTipoCargo`, `Cargo_IdCargo`) VALUES (3, 'Surtidor', 2);
INSERT INTO `willie`.`TipoCargo` (`IdTipoCargo`, `NombreTipoCargo`, `Cargo_IdCargo`) VALUES (4, 'Domicilario', 2);
INSERT INTO `willie`.`TipoCargo` (`IdTipoCargo`, `NombreTipoCargo`, `Cargo_IdCargo`) VALUES (5, 'Recorredor de pasillos', 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `willie`.`cliente`
-- -----------------------------------------------------
START TRANSACTION;
USE `willie`;
INSERT INTO `willie`.`cliente` (`IdCliente`, `persona_IdPersona`) VALUES (1, 6);
INSERT INTO `willie`.`cliente` (`IdCliente`, `persona_IdPersona`) VALUES (2, 7);
INSERT INTO `willie`.`cliente` (`IdCliente`, `persona_IdPersona`) VALUES (3, 8);
INSERT INTO `willie`.`cliente` (`IdCliente`, `persona_IdPersona`) VALUES (4, 9);
INSERT INTO `willie`.`cliente` (`IdCliente`, `persona_IdPersona`) VALUES (5, 10);

COMMIT;


-- -----------------------------------------------------
-- Data for table `willie`.`empleado`
-- -----------------------------------------------------
START TRANSACTION;
USE `willie`;
INSERT INTO `willie`.`empleado` (`IdEmpleado`, `CodigoEmpleado`, `persona_IdPersona`, `TipoCargo_IdTipoCargo`) VALUES (1, 1, 1, 1);
INSERT INTO `willie`.`empleado` (`IdEmpleado`, `CodigoEmpleado`, `persona_IdPersona`, `TipoCargo_IdTipoCargo`) VALUES (2, 2, 2, 2);
INSERT INTO `willie`.`empleado` (`IdEmpleado`, `CodigoEmpleado`, `persona_IdPersona`, `TipoCargo_IdTipoCargo`) VALUES (3, 3, 3, 2);
INSERT INTO `willie`.`empleado` (`IdEmpleado`, `CodigoEmpleado`, `persona_IdPersona`, `TipoCargo_IdTipoCargo`) VALUES (4, 4, 4, 2);
INSERT INTO `willie`.`empleado` (`IdEmpleado`, `CodigoEmpleado`, `persona_IdPersona`, `TipoCargo_IdTipoCargo`) VALUES (5, 5, 5, 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `willie`.`persona`
-- -----------------------------------------------------
START TRANSACTION;
USE `willie`;
INSERT INTO `willie`.`persona` (`IdPersona`, `DocumentoIdentificacionPersona`, `NombrePersona`, `ApellidoPersona`, `DireccionPersona`, `TelefonoPersona`) VALUES (1, 1, 'Juan', 'Velandia', 'av 1', 1);
INSERT INTO `willie`.`persona` (`IdPersona`, `DocumentoIdentificacionPersona`, `NombrePersona`, `ApellidoPersona`, `DireccionPersona`, `TelefonoPersona`) VALUES (2, 2, 'Andres', 'Benitez', 'av 1', 2);
INSERT INTO `willie`.`persona` (`IdPersona`, `DocumentoIdentificacionPersona`, `NombrePersona`, `ApellidoPersona`, `DireccionPersona`, `TelefonoPersona`) VALUES (3, 3, 'Pedro', 'Tellez', 'av 2', 3);
INSERT INTO `willie`.`persona` (`IdPersona`, `DocumentoIdentificacionPersona`, `NombrePersona`, `ApellidoPersona`, `DireccionPersona`, `TelefonoPersona`) VALUES (4, 4, 'Daniel', 'Batista', 'av 2', 4);
INSERT INTO `willie`.`persona` (`IdPersona`, `DocumentoIdentificacionPersona`, `NombrePersona`, `ApellidoPersona`, `DireccionPersona`, `TelefonoPersona`) VALUES (5, 5, 'Fernanda', 'Spelman', 'av 3', 5);
INSERT INTO `willie`.`persona` (`IdPersona`, `DocumentoIdentificacionPersona`, `NombrePersona`, `ApellidoPersona`, `DireccionPersona`, `TelefonoPersona`) VALUES (6, 6, 'Paola', 'Contreraz', 'av 3', 6);
INSERT INTO `willie`.`persona` (`IdPersona`, `DocumentoIdentificacionPersona`, `NombrePersona`, `ApellidoPersona`, `DireccionPersona`, `TelefonoPersona`) VALUES (7, 7, 'Karen', 'Giraldo', 'av 4', 7);
INSERT INTO `willie`.`persona` (`IdPersona`, `DocumentoIdentificacionPersona`, `NombrePersona`, `ApellidoPersona`, `DireccionPersona`, `TelefonoPersona`) VALUES (8, 8, 'Tatiana', 'Gonzales', 'av 4', 8);
INSERT INTO `willie`.`persona` (`IdPersona`, `DocumentoIdentificacionPersona`, `NombrePersona`, `ApellidoPersona`, `DireccionPersona`, `TelefonoPersona`) VALUES (9, 9, 'Sebastian', 'Claus', 'av 1', 9);
INSERT INTO `willie`.`persona` (`IdPersona`, `DocumentoIdentificacionPersona`, `NombrePersona`, `ApellidoPersona`, `DireccionPersona`, `TelefonoPersona`) VALUES (10, 10, 'Jose', 'Moterreal', 'av 1', 10);

COMMIT;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
