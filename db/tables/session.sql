CREATE TABLE session
(
   session_id serial,
   usuario_id integer,
   pid integer,
   active boolean,
   CONSTRAINT pk_session PRIMARY KEY (session_id)
);
