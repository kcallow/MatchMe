create or replace procedure UPDATE_EVENTO(pSET IN VARCHAR, pEVENTO_ID IN NUMBER) is
begin
  update EVENTO
    set SET = pSET
      where EVENTO_id = pEVENTO_ID;
        end UPDATE_EVENTO;
