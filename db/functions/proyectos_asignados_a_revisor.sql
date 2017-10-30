CREATE OR REPLACE FUNCTION proyectos_asignados_a_revisor
()
RETURNS SETOF JSON
AS
$BODY$
DECLARE
   i JSON;
BEGIN
   FOR i IN
      SELECT row_to_json((a.proyecto_asignado_id, a.proyecto, proyecto_detalle.titulo_proyecto))
      FROM (SELECT proyecto, proyecto_asignado_id
            FROM proyecto_asignado) a, proyecto_detalle
      WHERE a.proyecto = proyecto_detalle.proyecto
   LOOP
      RETURN NEXT i;
   END LOOP;
   RETURN;
END;
$BODY$
LANGUAGE plpgsql;
