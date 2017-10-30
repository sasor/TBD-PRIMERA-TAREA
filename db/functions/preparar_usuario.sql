CREATE OR REPLACE FUNCTION preparar_usuario
()
RETURNS SETOF JSON --ROL
AS
$BODY$
DECLARE
   r JSON; --ROL
BEGIN
   FOR r IN
      SELECT row_to_json((rol_id, rol)::ROL)
      FROM rol
   LOOP
      RETURN NEXT r;
   END LOOP;
   RETURN;
END;
$BODY$
LANGUAGE plpgsql;
