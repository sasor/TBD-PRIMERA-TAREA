CREATE OR REPLACE FUNCTION revisados
(_usuario INTEGER)
RETURNS SETOF JSON
AS
$BODY$
DECLARE
   r JSON;
BEGIN

   FOR r IN
      SELECT row_to_json((pa.proyecto_asignado_id, pa.proyecto, pd.titulo_proyecto))
      FROM (SELECT proyecto_asignado_id,proyecto
            FROM proyecto_asignado
            WHERE usuario = _usuario AND calificado = 't') pa, proyecto_detalle pd
      WHERE pa.proyecto = pd.proyecto
   LOOP
      RETURN NEXT r;
   END LOOP;

   RETURN;
END;
$BODY$
LANGUAGE plpgsql;
