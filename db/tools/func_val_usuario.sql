CREATE OR REPLACE FUNCTION val_entries_usuario()
RETURNS TRIGGER
AS
$BODY$
BEGIN
   IF NEW.username IS NULL OR Length(NEW.username) = 0 THEN
      RAISE EXCEPTION 'username no debe ser nulo o vacio';
   END IF;

   IF NEW.password IS NULL OR Length(NEW.password) = 0 THEN
      RAISE EXCEPTION 'password no debe ser nulo o vacio';
   END IF;

   RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;


CREATE TRIGGER val_entries_usuario
BEFORE INSERT OR UPDATE
ON usuario
FOR EACH ROW
EXECUTE PROCEDURE  val_entries_usuario();
