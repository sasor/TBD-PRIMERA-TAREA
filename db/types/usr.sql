DROP TYPE IF EXISTS USR;

CREATE TYPE USR
AS
(
   usuario JSON,
   roles INTEGER[]
);
