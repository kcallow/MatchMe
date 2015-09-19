CREATE OR REPLACE FUNCTION get_nivel_educacion(pNIVEL_EDUCACION_ID number)
       return VARCHAR2
       as nombre varchar2(30);
       BEGIN
 SELECT NOMBRE
 INTO nombre
 FROM NIVEL_EDUCACION
 WHERE NIVEL_EDUCACION_ID = pNIVEL_EDUCACION_ID;
       RETURN (nombre);
       commit;
       END get_nivel_educacion;
