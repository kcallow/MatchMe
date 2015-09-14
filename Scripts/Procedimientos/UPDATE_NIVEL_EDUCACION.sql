create or replace procedure UPDATE_NIVEL_EDUCACION(pNOMBRE IN VARCHAR, pNIVEL_EDUCACION_ID IN NUMBER) is
begin
  update NIVEL_EDUCACION
    set NOMBRE = pNOMBRE
      where pais_id = pPAIS_ID;
        end UPDATE_NIVEL_EDUCACION;
