CREATE GLOBAL TEMPORARY TABLE TABLA_BUSQUEDA (
  username		VARCHAR2(10),
  es_admin		VARCHAR2(1),
  nacimiento		DATE,
  primer_apellido 	VARCHAR2(30),
  segundo_apellido 	VARCHAR2(30),
  nombre		VARCHAR2(40),
  genero_id		NUMBER,
  ciudad_id		NUMBER,
  es_real		VARCHAR2(1),  
  color_ojos_id 	NUMBER,      
  color_piel_id 	NUMBER,      
  contextura_id 	NUMBER,      
  nivel_educacion_id 	NUMBER,      
  estado_civil_id 	NUMBER,      
  fumador_id 		NUMBER,      
  bebedor_id 		NUMBER,      
  frecuencia_ejercicio_id 	NUMBER,      
  salario_id 		NUMBER,      
  altura		NUMBER,
  peso		NUMBER,
  num_hijos	NUMBER,
  quiere_hijos	VARCHAR2(1)
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
