CREATE DATABASE supermarket;

USE supermarket;

CREATE TABLE Categorias(
    id INT primary key AUTO_INCREMENT,
    nombres VARCHAR (50) NOT NULL,
    descripcion VARCHAR (50) NOT NULL,
    imagen LONGBLOB
);

CREATE TABLE Clientes(
    id INT primary key AUTO_INCREMENT,
    celular BIGINT NOT NULL,
    compañia VARCHAR (50) NOT NULL
);

CREATE TABLE Empleados(
    id INT primary key AUTO_INCREMENT,
    nombres VARCHAR (50) NOT NULL,
    celular BIGINT NOT NULL,
    direccion VARCHAR (50) NOT NULL,
    imagen LONGBLOB
);

CREATE TABLE Proveedores(
    id INT primary key AUTO_INCREMENT,
    nombres VARCHAR (50) NOT NULL,
    celular BIGINT NOT NULL,
    ciudad VARCHAR (50) NOT NULL
);

CREATE TABLE Productos(
    id INT primary key AUTO_INCREMENT,
    categoria_id INT,
    FOREIGN KEY (categoria_id) REFERENCES Categorias(id),
    precioUnitario VARCHAR (50) NOT NULL,
    stock VARCHAR (50) NOT NULL,
    unidadesPedidas VARCHAR (50) NOT NULL,
    proveedor_id INT,
    FOREIGN KEY (proveedor_id) REFERENCES Proveedores(id),
    nombreProducto VARCHAR (50) NOT NULL,
    descontinuado VARCHAR (50) NOT NULL
);

CREATE TABLE Facturas(
    id INT primary key AUTO_INCREMENT,
    empleados_id INT,
    FOREIGN KEY (empleados_id) REFERENCES Empleados(id),
    clientes_id INT,
    FOREIGN KEY (clientes_id) REFERENCES Clientes(id),
    fecha DATE
);

CREATE TABLE FacturaDetalle(
    factura_id INT,
    FOREIGN KEY (factura_id) REFERENCES Facturas(id),
    producto_id INT,
    FOREIGN KEY (producto_id) REFERENCES Productos(id),
    cantidad VARCHAR (50) NOT NULL,
    precioVenta VARCHAR (50) NOT NULL
);  