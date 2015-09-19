CREATE OR REPLACE FUNCTION get_ciudad(pCIUDAD_ID number)
       return VARCHAR2
       as nombre varchar2(30);
       BEGIN
 SELECT NOMBRE
 INTO nombre
 FROM CIUDAD
 WHERE CIUDAD_ID = pCIUDAD_ID;
       RETURN (nombre);
       commit;
       END get_ciudad;
