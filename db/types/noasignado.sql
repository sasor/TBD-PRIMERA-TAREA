DROP TYPE IF EXISTS TYPE_NOASIGNADO;

CREATE TYPE TYPE_NOASIGNADO
AS
(
   proyecto_id INTEGER,
   titulo TEXT,
   usuario_id INTEGER,
   username TEXT,
   status_id INTEGER,
   status_name TEXT
);
