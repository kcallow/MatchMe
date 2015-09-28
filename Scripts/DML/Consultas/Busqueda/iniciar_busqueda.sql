CREATE GLOBAL TEMPORARY TABLE TABLA_BUSQUEDA (
  
)
CREATE OR REPLACE PROCEDURE INICIAR_BUSQUEDA
AS
BEGIN
insert into tabla_busqueda (username, es_admin, nacimiento, primer_apellido, segundo_apellido, nombre, genero_id, ciudad_id, slogan, es_real, color_ojos_id, color_piel_id, contextura_id, nivel_educacion_id, estado_civil_id, fumador_id, bebedor_id, frecuencia_ejercicio_id, salario_id, altura, peso, num_hijos, quiere_hijos)
  SELECT (persona.username, es_admin, nacimiento, primer_apellido, segundo_apellido, nombre, genero_id, ciudad_id, slogan, es_real, color_ojos_id, color_piel_id, contextura_id, nivel_educacion_id, estado_civil_id, fumador_id, bebedor_id, frecuencia_ejercicio_id, salario_id, altura, peso, num_hijos, quiere_hijos)
  FROM PERSONA INNER JOIN PERSONA_DISPONIBLE
  WHERE PERSONA.USERNAME = PERSONA_DISPONIBLE.USERNAME AND PERSONA_DISPONIBLE.ES_REAL = 1;
END;
/

