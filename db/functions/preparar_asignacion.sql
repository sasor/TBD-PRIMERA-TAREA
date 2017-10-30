CREATE OR REPLACE FUNCTION preparar_asignacion
(_proyecto_id INTEGER)
RETURNS JSON
AS
$BODY$
DECLARE
   i JSON;
   revisores JSON[];
BEGIN
   SELECT row_to_json(
             (a.proyecto_id,
             c.titulo_proyecto,
             a.usuario,
             g.username,
             a.proyecto_status_id,
             b.status,
             a.dependencia_id,
             d.dependencia_academica)
          ) INTO i
   FROM (SELECT e.proyecto_id, e.dependencia_id, e.proyecto_status_id, f.usuario
         FROM (SELECT proyecto_id, dependencia_id, proyecto_status_id
               FROM proyecto
               WHERE proyecto_id = _proyecto_id) e, proyecto_usuario f
         WHERE e.proyecto_id = f.proyecto) a, proyecto_status b, proyecto_detalle c, dependencia_academica d, usuario g
   WHERE a.proyecto_status_id = b.status_id
         AND a.proyecto_id = c.proyecto
         AND a.dependencia_id = d.dependencia_academica_id
         AND a.usuario = g.usuario_id;

   revisores := traer_revisores();

   RETURN row_to_json((i, revisores)); 
END;
$BODY$
LANGUAGE plpgsql;
