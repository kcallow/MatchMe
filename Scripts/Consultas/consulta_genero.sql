CREATE OR REPLACE
PROCEDURE get_personas (p_genero IN persona.genero_id%TYPE,
p_recordset OUT SYS_REFCURSOR) AS 
BEGIN 
OPEN p_recordset FOR
SELECT persona.nombre,
persona.primer_apellido
FROM persona
WHERE persona.genero_id = p_genero
ORDER BY persona.nombre;
END get_personas;
