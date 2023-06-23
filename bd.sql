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


CREATE TABLE 
    modulos(
        id_modulo INT(11) NOT NULL AUTO_INCREMENT UNIQUE ,
        modulo_nombre VARCHAR(100) NOT NULL,
        id_tema INT,
        CONSTRAINT pk_id_modulo PRIMARY KEY(id_modulo),
        CONSTRAINT fk_id_tema FOREIGN KEY(id_tema) REFERENCES temas(id_tema)
    );

CREATE TABLE
    topico(
        id_topico INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
        topico_nombre VARCHAR(100) NOT NULL,
        id_modulo INT,
        CONSTRAINT pk_id_topico PRIMARY KEY(id_topico),
        CONSTRAINT fk_id_modulo FOREIGN KEY(id_modulo) REFERENCES modulos(id_modulo)
    );

CREATE TABLE 
   eps(
        id_eps INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
        eps_nombre VARCHAR(80) NOT NULL,
        CONSTRAINT pk_id_eps PRIMARY KEY(id_eps)
    );


CREATE TABLE 
   arls(
       id_arl INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
       arl_nombre VARCHAR(80) NOT NULL,
       CONSTRAINT pk_id_arl PRIMARY KEY(id_arl)
    );

CREATE TABLE
    paises(
        id_pais INT(11) NOT NULL AUTO_INCREMENT,
        nombre_pais VARCHAR(100) UNIQUE,
        CONSTRAINT pk_id_pais PRIMARY KEY(id_pais)
    );


CREATE TABLE 
    regiones(
        id_region INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
        nombre_region VARCHAR(100) NOT NULL,
        id_pais INT,
        CONSTRAINT pk_id_region PRIMARY KEY(id_region),
        CONSTRAINT fk_id_city_pais  FOREIGN KEY(id_pais) REFERENCES paises(id_pais)
    );

CREATE TABLE
    ciudad(
        id_ciudad INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
        ciudad_nombre VARCHAR(100) NOT NULL,
        id_region INT,
        CONSTRAINT PK_id_ciudad PRIMARY KEY(id_ciudad),
        CONSTRAINT fk_id_region_ciudad FOREIGN KEY(id_region)  REFERENCES regiones(id_region)
    );



CREATE TABLE 
    roles(
        id_rol INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
        name_rol VARCHAR(100) NOT NULL,
        CONSTRAINT pk_id_rol PRIMARY KEY(id_rol)
    );


CREATE TABLE 
    personas(
        id_persona VARCHAR(20) NOT NULL  UNIQUE,
        tipo_id VARCHAR(10) NOT NULL,
        foto_persona VARCHAR(200),
        persona_nombre VARCHAR(50) NOT NULL,
        persona_apellido VARCHAR(50) NOT NULL,
        fecha_nacimiento DATE NOT NULL,
        email VARCHAR(50) NOT NULL UNIQUE,
        persona_direccion VARCHAR(50) NOT NULL,
        persona_telefono VARCHAR(20)NOT NULL,
        id_ciudad INT,
        id_eps INT,
        id_rol INT,
        CONSTRAINT fk_id_ciudad_persona FOREIGN KEY(id_ciudad) REFERENCES ciudad(id_ciudad),
        CONSTRAINT fk_id_eps_persona FOREIGN KEY(id_eps) REFERENCES eps(id_eps),
        CONSTRAINT fk_id_rol_persona FOREIGN KEY(id_rol) REFERENCES roles(id_rol),
        CONSTRAINT pk_id__persona PRIMARY KEY(id_persona)
    );


CREATE TABLE 
    trainer(
        id_trainer INT(11) AUTO_INCREMENT NOT NULL UNIQUE,
        id_persona VARCHAR(20) ,
        id_arl INT,
        CONSTRAINT pk_id_trainer PRIMARY KEY(id_trainer),
        CONSTRAINT fk_id_trainer_persona FOREIGN KEY(id_persona) REFERENCES personas(id_persona),
        CONSTRAINT fk_id_trainer_arl FOREIGN KEY(id_arl) REFERENCES arls(id_arl)
    );

CREATE TABLE
    contacto_trainer(
        id_contacto_trainer INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
        id_trainer INT,
        telefono_trainer VARCHAR(20) NOT NULL,
        tipo_locacion_contacto VARCHAR(30) NOT NULL,
        PRIMARY KEY(id_contacto_trainer),
        FOREIGN KEY(id_trainer) REFERENCES trainer(id_trainer)
    );


CREATE TABLE salones (
    id_salon INT NOT NULL AUTO_INCREMENT,
    nombre_salon VARCHAR(50) NOT NULL UNIQUE,
    descripcion VARCHAR(100),
    CONSTRAINT PK_Salon PRIMARY KEY (id_salon)
);



CREATE TABLE nivel_campers (
    id_nivel_camper INT NOT NULL AUTO_INCREMENT,
    nivel_conocimiento VARCHAR(50),
    id_salon INT(11),
    CONSTRAINT PK_NivelCampers PRIMARY KEY (id_nivel_camper),
    CONSTRAINT FK_NivelSalon FOREIGN KEY (id_salon) REFERENCES salones(id_salon)
);

CREATE TABLE 
    campers(
        id_camper INT(11) AUTO_INCREMENT NOT NULL UNIQUE,
        id_persona VARCHAR(20) ,
        id_nivel_camper INT,
        CONSTRAINT pk_id_camper PRIMARY KEY(id_camper),
        CONSTRAINT fk_id_camper_persona FOREIGN KEY(id_persona) REFERENCES personas(id_persona),
        CONSTRAINT fk_id_camper_nivel FOREIGN KEY(id_nivel_camper) REFERENCES nivel_campers(id_nivel_camper)
    );

CREATE TABLE
    acudiente(
        id_acudiente VARCHAR(20) NOT NULL UNIQUE,
        nombre_acudiente VARCHAR(50) NOT NULL,
        tipo_id VARCHAR(10) NOT NULL,
        parentesco   VARCHAR(30) NOT NULL,
        telefono_acudiente VARCHAR(14) NOT NULL,
        PRIMARY KEY(id_acudiente)   
    );

CREATE TABLE 
    camper_acudiente(
        id_camper_acudiente INT AUTO_INCREMENT PRIMARY KEY,
        id_camper INT,
        id_acudiente VARCHAR(20),
        FOREIGN KEY(id_camper) REFERENCES campers(id_camper),
        FOREIGN KEY(id_acudiente) REFERENCES acudiente(id_acudiente)
    );


CREATE TABLE 
    matricula_camper_rutas(
        id_matricula INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
        id_camper INT,
        id_ruta INT,
        PRIMARY KEY(id_matricula),
        FOREIGN KEY(id_ruta) REFERENCES ruta_entrenamiento(id_ruta),
        FOREIGN KEY(id_camper) REFERENCES campers(id_camper)
    );



CREATE TABLE 
    empleado(
        id_empleado INT(11) AUTO_INCREMENT NOT NULL UNIQUE,
        id_persona VARCHAR(20),
        id_arl INT,
        CONSTRAINT pk_id_empleado PRIMARY KEY(id_empleado),
        CONSTRAINT fk_id_empleado_persona FOREIGN KEY(id_persona) REFERENCES personas(id_persona),
        CONSTRAINT fk_id_empleado_arl FOREIGN KEY(id_arl) REFERENCES arls(id_arl)
    );


CREATE TABLE 
    contacto_empleado(
        id_contacto_empleado VARCHAR(20) NOT NULL UNIQUE,
        tipo_id VARCHAR(10) NOT NULL,
        nombre_contacto_empleado VARCHAR(50) NOT NULL,
        telefono_contacto_empleado VARCHAR(20) NOT NULL,
        id_empleado INT,
        tipo_locacion_contacto VARCHAR(30) NOT NULL,
        PRIMARY KEY(id_contacto_empleado),
        FOREIGN KEY(id_empleado) REFERENCES empleado(id_empleado)
    );


CREATE TABLE trainers_salones (
    id_trainer_salon INT NOT NULL AUTO_INCREMENT,
    franja_horaria VARCHAR(40) NOT NULL ,
    id_salon INT(11),
    id_trainer INT(11),
    CONSTRAINT PK_TrainnerSalon PRIMARY KEY (id_trainer_salon),
    CONSTRAINT FK_TrainersSalones FOREIGN KEY (id_salon) REFERENCES salones(id_salon),
    CONSTRAINT FK_TrainnerSalonTrainner FOREIGN KEY (id_trainer) REFERENCES trainer(id_trainer)
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
INSERT INTO `nivel_campers`(`nivel_conocimiento`, `id_salon`) VALUES ('basico','1')
INSERT INTO `arls`( `arl_nombre`) VALUES ('noseeee')
