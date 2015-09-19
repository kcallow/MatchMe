CREATE OR REPLACE FUNCTION get_bebedor(pBEBEDOR_ID number)
       return VARCHAR2
       as nombre varchar2(30);
       BEGIN
 SELECT NOMBRE
 INTO nombre
 FROM BEBEDOR
 WHERE BEBEDOR_ID = pBEBEDOR_ID;
       RETURN (nombre);
       commit;
       END get_bebedor;
