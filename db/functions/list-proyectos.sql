CREATE OR REPLACE FUNCTION listar_proyectos
(_usuario INTEGER)
RETURNS JSON[]
AS
$BODY$
DECLARE
   r JSON[];
BEGIN
   -- var := ARRAY(); OR SELECT ARRAY() INTO var;

   r := ARRAY(
      SELECT row_to_json((proyecto, titulo_proyecto, status)::TYPE_LISTPROJECTS)
      FROM (SELECT proyecto_id,status
            FROM (SELECT proyecto_id,proyecto_status_id
                  FROM (SELECT proyecto
                        FROM proyecto_usuario
                        WHERE usuario = _usuario) p, proyecto
                  WHERE p.proyecto = proyecto.proyecto_id) ps, proyecto_status
            WHERE ps.proyecto_status_id = proyecto_status.status_id) t, proyecto_detalle
      WHERE t.proyecto_id = proyecto_detalle.proyecto
   );
   RETURN r;
END;
$BODY$
LANGUAGE plpgsql;
