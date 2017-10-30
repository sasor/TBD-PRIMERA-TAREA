CREATE OR REPLACE FUNCTION do_bitacora_usuario_rol()
RETURNS TRIGGER 
AS
$BODY$
DECLARE
  user_name TEXT; 
  tpid INTEGER;
  user_id INTEGER;
  value TEXT;
BEGIN
    SELECT pg_backend_pid() INTO tpid;
    SELECT usuario_id FROM session WHERE pid = tpid INTO user_id;
    SELECT username FROM usuario WHERE usuario_id = user_id INTO user_name;

    IF TG_OP = 'INSERT' THEN
        value := CONCAT_WS('|', NEW.usuario, NEW.rol, NEW.activo); 

        INSERT INTO bitacora
        (data_new, data_old, operation, on_table, usuario, fecha)
        VALUES(value, '', TG_OP, TG_TABLE_NAME, user_name, NOW());
        RETURN NEW;
    END IF;

    IF TG_OP = 'DELETE' THEN
        value := CONCAT_WS('|', OLD.usuario, OLD.rol, OLD.activo); 

        INSERT INTO bitacora
        (data_new, data_old, operation, on_table, usuario, fecha)
        VALUES('', value, TG_OP, TG_TABLE_NAME, user_name, NOW());

        RETURN NULL;
    END IF;
    
    IF TG_OP = 'UPDATE' THEN
        value := CONCAT_WS('|', NEW.usuario, NEW.rol, NEW.activo); 
        INSERT INTO bitacora
        (data_new, data_old, operation, on_table, usuario, fecha)
        VALUES(value, '', TG_OP, TG_TABLE_NAME, user_name, NOW());

        value := CONCAT_WS('|', OLD.usuario, OLD.rol, OLD.activo); 
        INSERT INTO bitacora
        (data_new, data_old, operation, on_table, usuario, fecha)
        VALUES('', value, TG_OP, TG_TABLE_NAME, user_name, NOW());

        RETURN NEW;
    END IF;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER do_bitacora_usuario_rol
AFTER INSERT OR UPDATE OR DELETE
ON usuario_rol
FOR EACH ROW
EXECUTE PROCEDURE do_bitacora_usuario_rol();
