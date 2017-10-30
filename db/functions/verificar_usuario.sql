CREATE OR REPLACE FUNCTION verificar_usuario
(_username TEXT, _pass TEXT)
RETURNS INTEGER
AS
$BODY$
DECLARE
   r INTEGER;
   output INTEGER;
BEGIN
   EXECUTE format('SELECT usuario_id FROM usuario WHERE username = $1 AND password = $2') USING _username, _pass INTO output;
   GET DIAGNOSTICS r = ROW_COUNT;
   IF r > 0 THEN
      RETURN output;
   ELSE
      RAISE EXCEPTION 'usuario not found';
   END IF;
END;
$BODY$
LANGUAGE plpgsql;
