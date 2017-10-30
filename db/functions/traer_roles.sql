CREATE OR REPLACE FUNCTION traer_roles
()
RETURNS SETOF JSON
AS
$BODY$
DECLARE
   i JSON;
BEGIN
   FOR i IN
      SELECT row_to_json((rol_id,rol)::ROL)
      FROM rol
   LOOP
      RETURN NEXT i;
   END LOOP;
   RETURN;
END;
$BODY$
LANGUAGE plpgsql;
