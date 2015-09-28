CREATE OR REPLACE PROCEDURE INICIAR_BUSQUEDA
(
  pNACIMIENTO_MIN DATE,
  pNACIMIENTO_MAX DATE,
  pPRIMER_APELLIDO varchar2,
  pSEGUNDO_APELLIDO varchar2,
  pNOMBRE VARCHAR2,
  pGENERO_ID number,
  pCIUDAD_ID number,
  pSLOGAN varchar2,
  pES_REAL varchar2,
  pCOLOR_OJOS_ID number,
  pCOLOR_PIEL_ID number,
  pCONTEXTURA_ID number,
  pNIVEL_EDUCACION_ID number,
  pESTADO_CIVIL_ID number,
  pFUMADOR_ID number,
  pBEBEDOR_ID number,
  pFRECUENCIA_EJERCICIO_ID number,
  pSALARIO_ID number,
  pALTURA_MIN number,
  pALTURA_MAX number,
  pPESO_MIN number,
  pPESO_MAX number,
  pNUM_HIJOS_MIN number,
  pNUM_HIJOS_MAX number,
  pQUIERE_HIJOS varchar2
)
AS
BEGIN
insert into tabla_busqueda (username, es_admin, nacimiento, primer_apellido, segundo_apellido, nombre, genero_id, ciudad_id, slogan, es_real, color_ojos_id, color_piel_id, contextura_id, nivel_educacion_id, estado_civil_id, fumador_id, bebedor_id, frecuencia_ejercicio_id, salario_id, altura, peso, num_hijos, quiere_hijos)
  SELECT persona.username, persona.es_admin, persona.nacimiento, persona.primer_apellido, persona.segundo_apellido, persona.nombre, persona.genero_id, persona.ciudad_id, persona.slogan, persona_disponible.es_real, persona_disponible.color_ojos_id, persona_disponible.color_piel_id, persona_disponible.contextura_id, persona_disponible.nivel_educacion_id, persona_disponible.estado_civil_id, persona_disponible.fumador_id, persona_disponible.bebedor_id, persona_disponible.frecuencia_ejercicio_id, persona_disponible.salario_id, persona_disponible.altura, persona_disponible.peso, persona_disponible.num_hijos, persona_disponible.quiere_hijos
  FROM PERSONA, PERSONA_DISPONIBLE
  WHERE PERSONA.USERNAME = PERSONA_DISPONIBLE.USERNAME 
  AND PERSONA.nacimiento >= pNACIMIENTO_MIN 
  AND PERSONA.nacimiento <= pNACIMIENTO_MAX 
  AND PERSONA.primer_apellido = pprimer_apellido
  AND PERSONA.segundo_apellido = psegundo_apellido
  AND PERSONA.nombre = pnombre
  AND PERSONA.GENERO_ID = pGENERO_ID
  AND PERSONA.CIUDAD_ID = pCIUDAD_ID 
  AND PERSONA.SLOGAN = pSLOGAN 
  AND PERSONA_DISPONIBLE.ES_REAL = pES_REAL 
  AND PERSONA_DISPONIBLE.COLOR_OJOS_ID = pCOLOR_OJOS_ID 
  AND PERSONA_DISPONIBLE.COLOR_PIEL_ID = pCOLOR_PIEL_ID 
  AND PERSONA_DISPONIBLE.CONTEXTURA_ID = pCONTEXTURA_ID 
  AND PERSONA_DISPONIBLE.NIVEL_EDUCACION_ID = pNIVEL_EDUCACION_ID 
  AND PERSONA_DISPONIBLE.ESTADO_CIVIL_ID = pESTADO_CIVIL_ID 
  AND PERSONA_DISPONIBLE.FUMADOR_ID = pFUMADOR_ID 
  AND PERSONA_DISPONIBLE.BEBEDOR_ID = pBEBEDOR_ID 
  AND PERSONA_DISPONIBLE.FRECUENCIA_EJERCICIO_ID = pFRECUENCIA_EJERCICIO_ID 
  AND PERSONA_DISPONIBLE.SALARIO_ID = pSALARIO_ID 
  AND PERSONA_DISPONIBLE.ALTURA >= pALTURA_MIN 
  AND PERSONA_DISPONIBLE.ALTURA <= pALTURA_MAX 
  AND PERSONA_DISPONIBLE.PESO >= pPESO_MIN 
  AND PERSONA_DISPONIBLE.PESO <= pPESO_MAX 
  AND PERSONA_DISPONIBLE.NUM_HIJOS >= pNUM_HIJOS_MIN
  AND PERSONA_DISPONIBLE.NUM_HIJOS <= pNUM_HIJOS_MAX
  AND PERSONA_DISPONIBLE.QUIERE_HIJOS = pQUIERE_HIJOS
  ;
END;
/
