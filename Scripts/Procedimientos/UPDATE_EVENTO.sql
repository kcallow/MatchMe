create or replace procedure UPDATE_EVENTO(pSET IN VARCHAR, pEVENTO_ID IN NUMBER) is
begin
  update EVENTO
    set SET = pSET
      where pais_id = pPAIS_ID;
        end UPDATE_EVENTO;
