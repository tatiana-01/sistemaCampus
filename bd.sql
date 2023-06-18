-- Active: 1687028720666@@127.0.0.1@3306@sistemacampus
CREATE TABLE 
    ruta_entrenamiento(
        id_ruta INT(11) NOT NULL  UNIQUE PRIMARY KEY  AUTO_INCREMENT,
        nombre_ruta VARCHAR(50) NOT NULL UNIQUE,
        descripcion_ruta VARCHAR(100)
    );

CREATE TABLE
     stack_tecnologico(
        id_stack_tecnologico INT(11) NOT NULL UNIQUE PRIMARY KEY  AUTO_INCREMENT,
        nombre_stack VARCHAR(50) NOT NULL UNIQUE,
        descripcion_stack VARCHAR(50),
        id_ruta  INT,
        FOREIGN KEY(id_ruta) REFERENCES ruta_entrenamiento(id_ruta)
     );

CREATE TABLE/* Es independiente */
    unidades_tematicas(
        id_unidad_tematica INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
        nombre_unidad_tematica VARCHAR(120) NOT NULL UNIQUE,
        id_stack_tecnologico INT,
        FOREIGN KEY (id_stack_tecnologico) REFERENCES stack_tecnologico(id_stack_tecnologico),
        CONSTRAINT pk_id_unidad_tematica PRIMARY KEY(id_unidad_tematica)
    );

CREATE TABLE
    capitulos(
        id_capitulo INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
        capitulo_name VARCHAR(100) NOT NULL,
        id_unidad_tematica INT,
        CONSTRAINT pk_id_capitulo PRIMARY KEY(id_capitulo),
        CONSTRAINT fk_id_unidad_tematica FOREIGN KEY(id_unidad_tematica) REFERENCES unidades_tematicas(id_unidad_tematica)
    );


CREATE TABLE
    temas(
        id_tema INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
        tema_nombre VARCHAR(100) NOT NULL,
        id_capitulo INT,
        CONSTRAINT pk_id_tema PRIMARY KEY(id_tema),
        CONSTRAINT fk_id_capitulo FOREIGN KEY(id_capitulo) REFERENCES capitulos(id_capitulo)
    );



INSERT INTO `paises`(`nombre_pais`) VALUES ('colombia');
INSERT INTO `regiones`(`id_pais`,`nombre_region`) VALUES (1,'santander');

INSERT INTO `ciudad`(`id_region`,`ciudad_nombre`) VALUES (1,'Bucaramanga');

INSERT INTO `eps`(`eps_nombre`) VALUES ('SURA');

INSERT INTO `roles`(`name_rol`) VALUES ('camper');
INSERT INTO `roles`(`name_rol`) VALUES ('trainer');
INSERT INTO `roles`(`name_rol`) VALUES ('empleado');
INSERT INTO `salones`( `nombre_salon`) VALUES ('Apolo');
INSERT INTO `ruta_entrenamiento`( `nombre_ruta`) VALUES ('front');

