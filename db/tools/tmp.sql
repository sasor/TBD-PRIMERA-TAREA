CREATE TABLE tmp(
  pid integer
);

CREATE OR REPLACE FUNCTION do_bitacora_tmp()
RETURNS TRIGGER 
AS
$BODY$
DECLARE
  user_name TEXT; 
  _pid INTEGER;
  user_id INTEGER;
  value TEXT;
BEGIN
    SELECT pg_backend_pid() INTO _pid;
    --SELECT usuario_id FROM session WHERE pid = tpid INTO user_id;
    --SELECT username FROM usuario WHERE usuario_id = user_id INTO user_name;

    IF TG_OP = 'INSERT' THEN
        INSERT INTO tmp
        (pid)
        VALUES(_pid);

        RETURN NEW;
    END IF;

    IF TG_OP = 'DELETE' THEN
        INSERT INTO tmp
        (pid)
        VALUES(_pid);

        RETURN NULL;
    END IF;
    
    IF TG_OP = 'UPDATE' THEN
        INSERT INTO tmp
        (pid)
        VALUES(_pid);

        RETURN NEW;
    END IF;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER do_bitacora_tmp
AFTER INSERT OR UPDATE OR DELETE
ON usuario
FOR EACH ROW
EXECUTE PROCEDURE do_bitacora_tmp();
