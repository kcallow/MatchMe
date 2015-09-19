CREATE OR REPLACE FUNCTION get_contextura(pCONTEXTURA_ID number)
       return VARCHAR2
       as nombre varchar2(30);
       BEGIN
 SELECT NOMBRE
 INTO nombre
 FROM CONTEXTURA
 WHERE CONTEXTURA_ID = pCONTEXTURA_ID;
       RETURN (nombre);
       commit;
       END get_contextura;
