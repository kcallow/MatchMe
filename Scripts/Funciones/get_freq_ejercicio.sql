CREATE OR REPLACE FUNCTION get_freq_ejercicio(pFREQ_EJERCICIO_ID number)
       return VARCHAR2
       as nombre varchar2(30);
       BEGIN
 SELECT NOMBRE
 INTO nombre
 FROM FREQ_EJERCICIO
 WHERE FREQ_EJERCICIO_ID = pFREQ_EJERCICIO_ID;
       RETURN (nombre);
       commit;
       END get_freq_ejercicio;
