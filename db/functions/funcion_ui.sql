CREATE OR REPLACE FUNCTION funcion_ui
(_rol INTEGER)
RETURNS SETOF JSON
AS
$BODY$
DECLARE
   i JSON;
BEGIN
   FOR i IN
      SELECT row_to_json((d.funcion, e.ui))
      FROM (SELECT a.funcion, b.ui
            FROM (SELECT funcion
                  FROM rol_funcion
                  WHERE rol = _rol AND active = 't') a, funcion_ui b
            WHERE a.funcion = b.funcion) c, funcion d, ui e
      WHERE c.funcion = d.funcion_id AND c.ui = e.ui_id
   LOOP
      RETURN NEXT i;
   END LOOP;
   RETURN;
END;
$BODY$
LANGUAGE plpgsql;
