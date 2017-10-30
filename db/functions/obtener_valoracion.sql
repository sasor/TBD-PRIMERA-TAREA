CREATE OR REPLACE FUNCTION obtener_valoracion
()
RETURNS VALORACION_PROYECTO[]
AS
$BODY$
DECLARE
   i VALORACION_PROYECTO[];
BEGIN
   SELECT ARRAY(
      SELECT (valoracion_id,valoracion)::VALORACION_PROYECTO
      FROM valoracion_proyecto
   ) INTO i;
   --RAISE NOTICE '%',i;
   RETURN i;
END;
$BODY$
LANGUAGE plpgsql;
