CREATE OR REPLACE FUNCTION listar_proyectos_sin_asignar
(_dependencia INTEGER)
RETURNS SETOF JSON
AS
$BODY$
DECLARE
   r JSON;
BEGIN
   FOR r IN
      SELECT row_to_json((cuatro.proyecto, cuatro.titulo_proyecto, cuatro.usuario, cuatro.username, cuatro.proyecto_status_id, proyecto_status.status)::TYPE_NOASIGNADO)
      FROM (SELECT tres.proyecto, tres.titulo_proyecto, tres.usuario, usuario.username, tres.proyecto_status_id
            FROM (SELECT dos.proyecto, proyecto_detalle.titulo_proyecto, dos.usuario, dos.proyecto_status_id
                  FROM (SELECT proyecto, usuario, uno.proyecto_status_id
                        FROM (SELECT proyecto_id,proyecto_status_id
                              FROM proyecto
                              WHERE dependencia_id = _dependencia) uno, proyecto_usuario
                        WHERE uno.proyecto_id = proyecto_usuario.proyecto) dos, proyecto_detalle
                  WHERE dos.proyecto = proyecto_detalle.proyecto) tres, usuario
            WHERE tres.usuario = usuario.usuario_id) cuatro, proyecto_status
      WHERE cuatro.proyecto_status_id = proyecto_status.status_id
   LOOP
      RETURN NEXT r;
   END LOOP;
   RETURN;
END;
$BODY$
LANGUAGE plpgsql;
