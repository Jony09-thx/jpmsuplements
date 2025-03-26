CREATE DATABASE jpmsuple;
\c jpmsuple;

CREATE TABLE persona (
    id_persona SERIAL PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido_paterno VARCHAR(50) NOT NULL,
    apellido_materno VARCHAR(50) NOT NULL,
    calle VARCHAR(50) NOT NULL,
    numero_exterior VARCHAR(10),
    numero_interior VARCHAR(10),
    colonia VARCHAR(50) NOT NULL,
    codigo_postal VARCHAR(10) NOT NULL,
    correo VARCHAR(50) UNIQUE NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    sexo VARCHAR(2) NOT NULL);

CREATE TABLE usuario(
id_usuario SERIAL PRIMARY KEY,
usuario VARCHAR(50) NOT NULL,
password VARCHAR(30) NOT NULL,
id_persona INT NOT NULL,
FOREIGN KEY (id_persona) REFERENCES persona(id_persona)
);
ALTER TABLE usuario ALTER COLUMN password TYPE VARCHAR(255);
ALTER TABLE usuario ADD COLUMN rol VARCHAR(20) DEFAULT 'cliente';

 CREATE TABLE categoria (
   id_categoria SERIAL PRIMARY KEY,
   nombre VARCHAR(50) NOT NULL,
   descripcion VARCHAR(100) NOT NULL,
   fecha_registro date);

 CREATE TABLE proveedor (
    id_proveedor SERIAL PRIMARY KEY,
	 rfc_proveedor VARCHAR(30) NOT NULL,
	 agencia VARCHAR(50) NOT NULL,
	 id_persona INT NOT NULL,
    FOREIGN KEY (id_persona) REFERENCES persona(id_persona));

 CREATE TABLE producto (
    id_producto SERIAL PRIMARY KEY,
    sku VARCHAR(50) NOT NULL, 
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL, 
    fecha_registro date,
    id_categoria INT NOT NULL, 
    id_proveedor INT NOT NULL, 
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria),
    FOREIGN KEY (id_proveedor) REFERENCES proveedor(id_proveedor));
	
CREATE TABLE inventario (
id_inventario SERIAL PRIMARY KEY,
id_producto INT,
cantidad_actual INT,
fecha_registro DATE,
FOREIGN KEY (id_producto) REFERENCES producto(id_producto)
 ON UPDATE CASCADE
 ON DELETE CASCADE );

CREATE TABLE cliente(
id_cliente SERIAL PRIMARY KEY,
codigo_cliente BIGINT,
numero_tarjeta BIGINT, 
fecha_registro DATE,
id_persona INT, 
FOREIGN KEY (id_persona) REFERENCES persona(id_persona)
ON DELETE CASCADE
ON UPDATE CASCADE );

CREATE TABLE compra (
id_compra SERIAL PRIMARY KEY,
id_cliente INT,
codigo_compra VARCHAR(300),
subtotal DECIMAL(10,2),
descuento DECIMAL(10,2),
total DECIMAL(10,2),
fecha_pedido DATE,
FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
 ON UPDATE CASCADE
 ON DELETE CASCADE );

CREATE TABLE detalle_compra (
id_detalle_compra SERIAL PRIMARY KEY,
id_compra INT,
id_producto INT,
cantidad INT,
FOREIGN KEY (id_compra) REFERENCES compra(id_compra) 
 ON UPDATE CASCADE
 ON DELETE CASCADE,
FOREIGN KEY (id_producto) REFERENCES producto(id_producto)
 ON UPDATE CASCADE
 ON DELETE CASCADE);
 



