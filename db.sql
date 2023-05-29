CREATE DATABASE supermarket;

USE supermarket;

CREATE TABLE
    categorias (
        categoriaId INT PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(50) NOT NULL,
        descripcion VARCHAR(100),
        imagen MEDIUMBLOB
    );

CREATE TABLE
    clientes(
        clienteId INT PRIMARY KEY AUTO_INCREMENT,
        celular VARCHAR(20),
        compañia VARCHAR(50)
    );

CREATE TABLE
    empleados(
        empleadoId INT PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(50),
        celular VARCHAR(20),
        direccion VARCHAR(50),
        imagen MEDIUMBLOB
    );

CREATE TABLE
    facturas(
        facturaId INT PRIMARY KEY AUTO_INCREMENT,
        empleadoId INT,
        clienteId INT,
        fecha DATE,
        Foreign Key (empleadoId) REFERENCES empleados(empleadoId),
        Foreign Key (clienteId) REFERENCES clientes(clienteId)
    );

CREATE TABLE
    proveedores(
        proveedorId INT PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(50),
        telefono VARCHAR(20),
        ciudad VARCHAR(50)
    );

CREATE TABLE
    productos(
        productoId INT PRIMARY KEY AUTO_INCREMENT,
        categoriaId INT,
        precioUnitario INT,
        stock INT,
        unidadesPedidas INT,
        proveedorId INT,
        descontinuado VARCHAR(50),
        Foreign Key (categoriaId) REFERENCES categorias(categoriaId),
        Foreign Key (proveedorId) REFERENCES proveedores(proveedorId)
    );

CREATE TABLE
    facturaDetalle(
        facturaId INT,
        productoId INT,
        cantidad INT,
        precioVenta INT,
        Foreign Key (facturaId) REFERENCES facturas(facturaId),
        Foreign Key (productoId) REFERENCES productos(productoId)
    );

ALTER TABLE productos ADD nombre VARCHAR(50);

INSERT INTO
    productos (
        categoriaId,
        precioUnitario,
        stock,
        unidadesPedidas,
        proveedorId,
        descontinuado,
        nombre
    )
values (4, 10000, 35, 5, 1, "no", "bate");

INSERT INTO
    proveedores (nombre, telefono, ciudad)
values (
        "nike",
        3142353278,
        "San francisco"
    );

INSERT INTO
    clientes (celular, compañia)
values (3122353278, "Google");

INSERT INTO
    empleados (nombre, celular, direccion)
values (
        "Cristian Luna",
        3122353278,
        "Transversal 149"
    );

INSERT INTO
    facturas (empleadoId, clienteId, fecha)
values (1, 1, "28-5-2023");

SELECT categorias.nombre
FROM categorias
    INNER JOIN productos ON categorias.categoriaId = productos.categoriaId;

SELECT proveedores.nombre
FROM proveedores
    INNER JOIN productos ON proveedores.proveedorId = productos.proveedorId;

SELECT empleados.nombre
FROM empleados
    INNER JOIN facturas ON empleados.empleadoId = facturas.empleadoId;