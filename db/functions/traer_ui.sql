CREATE OR REPLACE FUNCTION traer_ui
(_funcion_id INTEGER)
RETURNS SETOF JSON
AS
$BODY$
DECLARE
   i JSON;
BEGIN
   FOR i IN
      SELECT row_to_json((a.funcion, a.ui, ui.ui))
      FROM (SELECT funcion,ui
            FROM funcion_ui
            WHERE funcion = _funcion_id) a, ui
      WHERE a.ui = ui.ui_id
   LOOP
      RETURN NEXT i;
   END LOOP;
   RETURN;
END;
$BODY$
LANGUAGE plpgsql;
