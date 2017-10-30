DROP TYPE IF EXISTS SKELPROJECT;

CREATE TYPE SKELPROJECT
AS
(
   tipos JSON[],
   areas JSON[],
   dependencias JSON[],
   keywords JSON[]
);
