CREATE OR REPLACE FUNCTION ver_usuario
(_usuario INTEGER)
RETURNS JSON
AS
$BODY$
DECLARE
   urol INTEGER[];
   usr JSON;
   output USR;
BEGIN
   usr := (SELECT row_to_json((usuario_id,username,password)::usuario)
          FROM usuario
          WHERE usuario_id = _usuario);
   urol := obtener_roles(_usuario);

   output.usuario := usr;
   output.roles := urol;
   --RAISE NOTICE '%',row_to_json(output);
   RETURN row_to_json(output);
END;
$BODY$
LANGUAGE plpgsql;
