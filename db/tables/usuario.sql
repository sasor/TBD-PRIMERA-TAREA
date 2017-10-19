CREATE TABLE usuario
(
   usuario_id serial,
   username character varying(100),
   password character varying(128),
   CONSTRAINT pk_user PRIMARY KEY(usuario_id)
);
