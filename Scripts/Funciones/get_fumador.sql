CREATE OR REPLACE FUNCTION get_fumador(pFUMADOR_ID number)
       return VARCHAR2
       as nombre varchar2(30);
       BEGIN
 SELECT NOMBRE
 INTO nombre
 FROM FUMADOR
 WHERE FUMADOR_ID = pFUMADOR_ID;
       RETURN (nombre);
       commit;
       END get_fumador;
