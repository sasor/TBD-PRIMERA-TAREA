CREATE TABLE rol_funcion (
  rol integer,
  funcion integer,
  active boolean,
  CONSTRAINT pk_rol_funcion PRIMARY KEY (rol, funcion)
);
