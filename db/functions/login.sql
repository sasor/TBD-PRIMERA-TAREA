CREATE OR REPLACE FUNCTION login
(_username TEXT, _pass TEXT)
RETURNS JSON
AS
$BODY$
DECLARE
   usr_id INTEGER;
   pid INTEGER;
   roles INTEGER[];
   output TYPE_SESSION;
BEGIN
   usr_id := verificar_usuario(_username, _pass);
   SELECT pg_backend_pid() INTO pid;

   roles := obtener_roles(usr_id);

   -- INSERTA en SESSION
   INSERT INTO session (usuario_id, pid, active) VALUES (usr_id, pid, 't');

   output.usuario := usr_id;
   output.rol := roles;
   output.pid := pid;

   RETURN row_to_json(output);
END;
$BODY$
LANGUAGE plpgsql;
