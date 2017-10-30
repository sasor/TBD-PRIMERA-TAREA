CREATE OR REPLACE FUNCTION actualizar_usuario
(_user INTEGER, _username TEXT, _pass TEXT, _rols INTEGER[])
RETURNS VOID
AS
$BODY$
DECLARE
   i INTEGER;
   r INTEGER;
BEGIN
   --UPDATE usuario
   --SET username = _username,
       --password = _pass
   --WHERE usuario_id = _user;

   --  eliminamos todos los records de usuario_rol
   DELETE FROM usuario_rol WHERE usuario = _user;

   -- iterando sobre array
   -- https://stackoverflow.com/questions/10214392/iterating-over-integer-in-pl-pgsql
   FOREACH i IN ARRAY _rols
   LOOP
      --EXECUTE format('SELECT activo FROM usuario_rol WHERE usuario = $1 AND rol = $2') USING _user, i;
      --GET DIAGNOSTICS r = ROW_COUNT;
      --IF r > 0 THEN
      --   RAISE NOTICE 'rol % found',i;
      --ELSE
         -- sino existe creamos el registro
         INSERT INTO usuario_rol (usuario,rol,activo)
         VALUES (_user,i,'t');
      --END IF;
   END LOOP;
END;
$BODY$
LANGUAGE plpgsql;
