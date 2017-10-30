CREATE OR REPLACE FUNCTION guardar_asignacion
(_proyecto INTEGER, _usuario INTEGER)
RETURNS VOID
AS
$BODY$
DECLARE
BEGIN
   INSERT INTO proyecto_asignado
   (usuario, proyecto, calificado)
   VALUES
   (_usuario, _proyecto, 'f');
END;
$BODY$
LANGUAGE plpgsql;
