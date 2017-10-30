CREATE OR REPLACE FUNCTION obtener_roles
(_user INTEGER)
RETURNS INTEGER[]
AS
$BODY$
DECLARE
   outs INTEGER[];
BEGIN
   -- http://blog.lerner.co.il/turning-postgresql-rows-arrays-array/
   -- http://blog.lerner.co.il/turning-postgresql-arrays-rows-unnest/
   -- https://stackoverflow.com/questions/533256/concatenate-multiple-rows-in-an-array-with-sql-on-postgresql
   SELECT ARRAY(
      SELECT rol
      FROM usuario_rol
      WHERE usuario = _user AND activo = 't'
   ) INTO outs;
   -- RAISE NOTICE '%',outs;
   RETURN outs;
END;
$BODY$
LANGUAGE plpgsql;
