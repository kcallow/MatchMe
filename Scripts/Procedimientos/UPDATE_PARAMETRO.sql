create or replace procedure UPDATE_PARAMETRO(pSET IN VARCHAR, pPARAMETRO_ID IN NUMBER) is
begin
  update PARAMETRO
    set SET = pSET
      where pais_id = pPAIS_ID;
        end UPDATE_PARAMETRO;
