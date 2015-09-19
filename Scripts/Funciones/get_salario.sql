CREATE OR REPLACE FUNCTION get_salario(pSALARIO_ID number)
       return VARCHAR2
       as nombre varchar2(30);
       BEGIN
 SELECT NOMBRE
 INTO nombre
 FROM SALARIO
 WHERE SALARIO_ID = pSALARIO_ID;
       RETURN (nombre);
       commit;
       END get_salario;
