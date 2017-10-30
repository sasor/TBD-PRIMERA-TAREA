CREATE OR REPLACE FUNCTION logout
(_user INTEGER, _pid INTEGER)
RETURNS VOID
AS
$BODY$
BEGIN
   UPDATE session
   SET active = 'f'
   WHERE usuario_id = _user AND pid = _pid;

END;
$BODY$
LANGUAGE plpgsql;
