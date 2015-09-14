create or replace procedure UPDATE_ESTADO_CIVIL(pNOMBRE IN VARCHAR, pESTADO_CIVIL_ID IN NUMBER) is
begin
  update ESTADO_CIVIL
    set NOMBRE = pNOMBRE
      where pais_id = pPAIS_ID;
        end UPDATE_ESTADO_CIVIL;
