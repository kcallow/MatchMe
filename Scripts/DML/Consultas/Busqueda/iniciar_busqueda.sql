CREATE OR REPLACE PROCEDURE INICIAR_BUSQUEDA
AS
BEGIN
insert into tabla_busqueda (username, es_admin, nacimiento, primer_apellido, segundo_apellido, nombre, genero_id, ciudad_id, slogan, es_real, color_ojos_id, color_piel_id, contextura_id, nivel_educacion_id, estado_civil_id, fumador_id, bebedor_id, frecuencia_ejercicio_id, salario_id, altura, peso, num_hijos, quiere_hijos)
  SELECT persona.username, persona.es_admin, persona.nacimiento, persona.primer_apellido, persona.segundo_apellido, persona.nombre, persona.genero_id, persona.ciudad_id, persona.slogan, persona_disponible.es_real, persona_disponible.color_ojos_id, persona_disponible.color_piel_id, persona_disponible.contextura_id, persona_disponible.nivel_educacion_id, persona_disponible.estado_civil_id, persona_disponible.fumador_id, persona_disponible.bebedor_id, persona_disponible.frecuencia_ejercicio_id, persona_disponible.salario_id, persona_disponible.altura, persona_disponible.peso, persona_disponible.num_hijos, persona_disponible.quiere_hijos
  FROM PERSONA, PERSONA_DISPONIBLE
  WHERE PERSONA.USERNAME = PERSONA_DISPONIBLE.USERNAME AND PERSONA_DISPONIBLE.ES_REAL = 1;
END;
/
