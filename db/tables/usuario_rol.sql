CREATE TABLE usuario_rol (
  usuario integer,
  rol integer,
  activo boolean,
  CONSTRAINT pk_rol_usuario PRIMARY KEY (usuario, rol)
);

ALTER TABLE ONLY usuario_rol ALTER COLUMN activo SET DEFAULT 't';
