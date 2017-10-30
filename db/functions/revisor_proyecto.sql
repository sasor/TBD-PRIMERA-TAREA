CREATE OR REPLACE FUNCTION revisor_proyecto
(_usuario INTEGER)
RETURNS SETOF JSON
AS
$BODY$
DECLARE
   r JSON;
BEGIN
   -- var := ARRAY(); OR SELECT ARRAY() INTO var;

   FOR r IN
      SELECT row_to_json((pa.proyecto_asignado_id, pa.proyecto, pd.titulo_proyecto))
      FROM (SELECT proyecto_asignado_id,proyecto
            FROM proyecto_asignado
            WHERE usuario = _usuario AND calificado = 'f') pa, proyecto_detalle pd
      WHERE pa.proyecto = pd.proyecto
   LOOP
      RETURN NEXT r;
   END LOOP;

   RETURN;
END;
$BODY$
LANGUAGE plpgsql;
