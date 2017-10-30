CREATE OR REPLACE FUNCTION eliminar_usuario
(_user INTEGER)
RETURNS VOID
AS
$BODY$
DECLARE
BEGIN

   WITH pivote AS
   (
      SELECT proyecto
      FROM proyecto_usuario
      WHERE usuario = _user
   ), first_table AS (
      DELETE FROM proyecto_detalle WHERE proyecto IN (SELECT proyecto FROM pivote)
   ), second_table AS (
      DELETE FROM proyecto WHERE proyecto_id IN (SELECT proyecto FROM pivote)
   )
   DELETE FROM proyecto_usuario WHERE proyecto IN (SELECT proyecto FROM pivote);

   DELETE FROM usuario
   WHERE usuario_id = _user;

   DELETE FROM usuario_rol
   WHERE usuario = _user;

END;
$BODY$
LANGUAGE plpgsql;
