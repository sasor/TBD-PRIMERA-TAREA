CREATE TABLE usuario
(
   usuario_id serial,
   username character varying(100) NOT NULL,
   password character varying(128) NOT NULL,
   CONSTRAINT pk_user PRIMARY KEY(usuario_id)
);
