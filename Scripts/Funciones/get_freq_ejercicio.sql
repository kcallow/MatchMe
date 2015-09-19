CREATE OR REPLACE FUNCTION get_frecuencia_ejercicio(pfrecuencia_EJERCICIO_ID number)
       return VARCHAR2
       as nombre varchar2(30);
       BEGIN
 SELECT NOMBRE
 INTO nombre
 FROM frecuencia_EJERCICIO
 WHERE frecuencia_EJERCICIO_ID = pfrecuencia_EJERCICIO_ID;
       RETURN (nombre);
       commit;
       END get_frecuencia_ejercicio;
