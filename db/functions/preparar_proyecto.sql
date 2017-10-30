CREATE OR REPLACE FUNCTION preparar_proyecto
()
RETURNS JSON
AS
$BODY$
DECLARE
   tipos JSON[];
   dependencias JSON[];
   keywords JSON[];
   areas JSON[];
   output SKELPROJECT;
BEGIN
   tipos := ARRAY(
                  SELECT row_to_json((tipo_proyecto_id,tipo_proyecto)::tipo_proyecto)
                  FROM tipo_proyecto
            );
   dependencias := ARRAY(
                        SELECT row_to_json((dependencia_academica_id,dependencia_academica)::dependencia_academica)
                        FROM dependencia_academica
                   );
   keywords := ARRAY(
                     SELECT row_to_json((keyword_id, keyword)::keyword)
                     FROM keyword
               );
   areas := ARRAY(
               SELECT row_to_json((area_academica_id, area_academica)::area_academica)
               FROM area_academica 
            );

   output.tipos := tipos;
   output.areas := areas;
   output.dependencias := dependencias;
   output.keywords := keywords;
   
   RETURN row_to_json(output);
END;
$BODY$
LANGUAGE plpgsql;
