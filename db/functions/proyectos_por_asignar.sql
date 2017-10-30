CREATE OR REPLACE FUNCTION proyectos_por_asignar
()
RETURNS SETOF JSON
AS
$BODY$
DECLARE
   i JSON;
BEGIN
   FOR i IN
      SELECT row_to_json((b.proyecto_id, b.status, proyecto_detalle.titulo_proyecto))
      FROM (SELECT a.proyecto_id, proyecto_status.status
            FROM (SELECT proyecto_id, proyecto_status_id
                  FROM proyecto WHERE proyecto_id NOT IN (SELECT proyecto FROM proyecto_asignado)) a, proyecto_status
            WHERE a.proyecto_status_id = proyecto_status.status_id) b, proyecto_detalle
      WHERE b.proyecto_id = proyecto_detalle.proyecto
   LOOP
      RETURN NEXT i;
   END LOOP;
END;
$BODY$
LANGUAGE plpgsql;
