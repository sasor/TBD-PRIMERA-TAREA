CREATE OR REPLACE FUNCTION traer_revisores
()
RETURNS JSON[]
AS
$BODY$
DECLARE
   revisores JSON[];
BEGIN
   SELECT ARRAY(
      SELECT row_to_json((a.usuario, u.username))
      FROM (SELECT usuario
            FROM usuario_rol
            WHERE rol = 3 AND activo = 't') a, usuario u
      WHERE a.usuario = u.usuario_id
   ) INTO revisores;
   RETURN revisores;
END;
$BODY$
LANGUAGE plpgsql;
