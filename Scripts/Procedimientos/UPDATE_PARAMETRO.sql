create or replace procedure UPDATE_PARAMETRO(pSET IN VARCHAR, pPARAMETRO_ID IN NUMBER) is
begin
  update PARAMETRO
    set SET = pSET
      where PARAMETRO_id = pPARAMETRO_ID;
        end UPDATE_PARAMETRO;
