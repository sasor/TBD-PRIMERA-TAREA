CREATE OR REPLACE FUNCTION guardar_usuario
(_username TEXT, _pass TEXT)
RETURNS INTEGER
AS
$BODY$
DECLARE
   --i INTEGER;
   _id INTEGER;
BEGIN

   INSERT INTO usuario
   (username,password)
   VALUES
   (_username, _pass) RETURNING usuario_id INTO _id;

   --FOREACH i IN ARRAY _roles
   --LOOP
   --   RAISE NOTICE '%',_roles;
   --END LOOP;
   RETURN _id;
END;
$BODY$
LANGUAGE plpgsql;
