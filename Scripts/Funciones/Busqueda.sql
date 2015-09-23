CREATE OR REPLACE FUNCTION fecha_to_edad(fecha IN DATE)
	RETURN NUMBER
	AS edad DATE
BEGIN
	RETURN trunc(months_between(sysdate,fecha)/12);
END;
--
CREATE OR REPLACE FUNCTION consulta_edad_min(edadMin IN number)
	RETURN sys_refcursor
	AS resultado sys_refcursor;

BEGIN
	OPEN resultado FOR
	SELECT username
	FROM persona
	WHERE fecha_to_edad(fecha) > edadMin;
	RETURN resultado;
END;
--
CREATE OR REPLACE FUNCTION consulta_edad_max(edadMax IN number)
	RETURN sys_refcursor
	AS resultado sys_refcursor;

BEGIN
	OPEN resultado FOR
	SELECT username
	FROM persona
	WHERE fecha_to_edad(fecha) < edadMax;
	RETURN resultado;
END;
