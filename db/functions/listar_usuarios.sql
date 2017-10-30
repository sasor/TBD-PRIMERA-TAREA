CREATE OR REPLACE FUNCTION listar_usuarios
()
RETURNS SETOF JSON
AS
$BODY$
DECLARE
   r JSON;
BEGIN
   FOR r IN
      SELECT row_to_json((usuario_id,username,password)::usuario)
      FROM usuario
   LOOP
      RETURN NEXT r;
   END LOOP;
   RETURN;
END;
$BODY$
LANGUAGE plpgsql;
