--SELECT proyecto, titulo_proyecto, status
--FROM (SELECT proyecto_id,status
--      FROM (SELECT proyecto_id,proyecto_status_id
--            FROM (SELECT proyecto
--                  FROM proyecto_usuario
--                  WHERE usuario = 1) p, proyecto
--            WHERE p.proyecto = proyecto.proyecto_id) ps, proyecto_status
--      WHERE ps.proyecto_status_id = proyecto_status.status_id) t, proyecto_detalle
--WHERE t.proyecto_id = proyecto_detalle.proyecto;

--SELECT row_to_json((proyecto, titulo_proyecto, status)::TYPE_LISTPROJECTS)
--FROM (SELECT proyecto_id,status
--      FROM (SELECT proyecto_id,proyecto_status_id
--            FROM (SELECT proyecto
--                  FROM proyecto_usuario
--                  WHERE usuario = 1) p, proyecto
--            WHERE p.proyecto = proyecto.proyecto_id) ps, proyecto_status
--      WHERE ps.proyecto_status_id = proyecto_status.status_id) t, proyecto_detalle
--WHERE t.proyecto_id = proyecto_detalle.proyecto

--INSERT INTO proyecto
--(tipo_proyecto_id, dependencia_id, proyecto_status_id)
--VALUES
--(1, 1, 1),
--(1, 2, 1),
--(1, 3, 1),
--(1, 2, 1),
--(1, 4, 1);

--SELECT proyecto
--FROM (SELECT proyecto
--      FROM proyecto_usuario
--      WHERE usuario = 2) p, proyecto
--WHERE p.proyecto = proyecto.proyecto_id;

--DELETE proyecto_usuario.*, proyecto.*, proyecto_detalle.*
--FROM proyecto_usuario AS t1
--INNER JOIN proyecto AS t2 ON t2.proyecto_id = t1.proyecto
--INNER JOIN proyecto_detalle AS t3 ON t3.proyecto = t1.proyecto
--WHERE t1.usuario = 2;

--WITH pivote AS
--(
--   SELECT proyecto
--   FROM proyecto_usuario
--   WHERE usuario = 1
--), first_table AS (
--   DELETE FROM proyecto_detalle WHERE proyecto IN (SELECT proyecto FROM pivote)
--), second_table AS (
--   DELETE FROM proyecto WHERE proyecto_id IN (SELECT proyecto FROM pivote)
--)
--DELETE FROM proyecto_usuario WHERE proyecto IN (SELECT proyecto FROM pivote);


--SELECT pa.proyecto_asignado_id, pa.proyecto, pd.titulo_proyecto
--FROM (SELECT proyecto_asignado_id,proyecto
--      FROM proyecto_asignado
--      WHERE usuario = 2) pa, proyecto_detalle pd
--WHERE pa.proyecto = pd.proyecto;

-- LISTAR ALL PROYECTOS
--SELECT b.proyecto_id, b.status, proyecto_detalle.titulo_proyecto
--FROM (SELECT a.proyecto_id, proyecto_status.status
--      FROM (SELECT proyecto_id, proyecto_status_id
--            FROM proyecto) a, proyecto_status
--      WHERE a.proyecto_status_id = proyecto_status.status_id) b, proyecto_detalle
--WHERE b.proyecto_id = proyecto_detalle.proyecto;

--ASIGNACIONES POR PARTE DIRECTOR
--SELECT proyecto_id
--FROM proyecto
--WHERE proyecto_id NOT IN (SELECT proyecto FROM proyecto_asignado);

-- PREPARACION DE ASIGNACION
--SELECT a.proyecto_id,
--       c.titulo_proyecto,
--       a.usuario,
--       g.username,
--       a.proyecto_status_id,
--       b.status,
--       a.dependencia_id,
--      d.dependencia_academica
--FROM (SELECT e.proyecto_id, e.dependencia_id, e.proyecto_status_id, f.usuario
--      FROM (SELECT proyecto_id, dependencia_id, proyecto_status_id
--            FROM proyecto
--            WHERE proyecto_id = 11) e, proyecto_usuario f
--      WHERE e.proyecto_id = f.proyecto) a, proyecto_status b, proyecto_detalle c, dependencia_academica d, usuario g
--WHERE a.proyecto_status_id = b.status_id
--      AND a.proyecto_id = c.proyecto
--      AND a.dependencia_id = d.dependencia_academica_id
--      AND a.usuario = g.usuario_id;

-- TRAER FUNCIONES QUE PERTENECEN A UN ROL Y SUS RESPECTIVAS UI
--(SELECT a.funcion, b.funcion
--FROM (SELECT funcion
      --FROM rol_funcion
      --WHERE rol = 1 AND active = 't') a, funcion b
--WHERE a.funcion = b.funcion_id) c, 

-- ESTA VERSION ATACA DIRECTAMENTE A LAS COMPOSICIONES
SELECT d.funcion, e.ui
FROM (SELECT a.funcion, b.ui
      FROM (SELECT funcion
            FROM rol_funcion
            WHERE rol = 1 AND active = 't') a, funcion_ui b
      WHERE a.funcion = b.funcion) c, funcion d, ui e
WHERE c.funcion = d.funcion_id AND c.ui = e.ui_id;
