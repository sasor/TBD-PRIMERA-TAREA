CREATE OR REPLACE FUNCTION guardar_proyecto
(_user INTEGER, _titulo TEXT, _resumen TEXT, _tipo INTEGER, _area INTEGER, _dependencia INTEGER)
RETURNS VOID
AS
$BODY$
DECLARE
   p_id INTEGER;
BEGIN
   -- crea proyecto
   INSERT INTO proyecto
   (tipo_proyecto_id, dependencia_id, proyecto_status_id, area_academica_id)
   VALUES
   (_tipo, _dependencia, 5, _area) RETURNING proyecto_id INTO p_id;

   -- crea proyecto detalle
   INSERT INTO proyecto_detalle
   (proyecto, titulo_proyecto, resumen_proyecto)
   VALUES
   (p_id, _titulo, _resumen);

   -- relaciona usuario con proyecto
   INSERT INTO proyecto_usuario
   (proyecto, usuario, activo)
   VALUES
   (p_id, _user, 't');
END;
$BODY$
LANGUAGE plpgsql;
