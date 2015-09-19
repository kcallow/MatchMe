CREATE OR REPLACE FUNCTION get_mascota(pMASCOTA_ID number)
       return VARCHAR2
       as nombre varchar2(30);
       BEGIN
 SELECT NOMBRE
 INTO nombre
 FROM MASCOTA
 WHERE MASCOTA_ID = pMASCOTA_ID;
       RETURN (nombre);
       commit;
       END get_mascota;
