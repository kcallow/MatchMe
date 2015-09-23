CREATE OR REPLACE FUNCTION fecha_to_edad(fecha IN DATE)
	RETURN NUMBER
	AS edad DATE
BEGIN
	RETURN trunc(months_between(sysdate,fecha)/12);
END fecha_to_edad;
/
