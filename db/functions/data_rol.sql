CREATE OR REPLACE FUNCTION data_rol
(_id INTEGER)
RETURNS SETOF JSON
AS
$BODY$
DECLARE
   i JSON;
BEGIN
   FOR i IN
      SELECT row_to_json((a.funcion, a.active, funcion.funcion))
      FROM (SELECT funcion,active
            FROM rol_funcion
            WHERE rol = _id) a, funcion
      WHERE a.funcion = funcion.funcion_id
   LOOP
      RETURN NEXT i;
   END LOOP;
   RETURN;
END;
$BODY$
LANGUAGE plpgsql;
