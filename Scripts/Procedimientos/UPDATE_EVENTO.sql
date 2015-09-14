create or replace procedure UPDATE_EVENTO(pNOMBRE IN VARCHAR, pEVENTO_ID IN NUMBER) is
begin
  update EVENTO
    set NOMBRE = pNOMBRE
      where EVENTO_id = pEVENTO_ID;
        end UPDATE_EVENTO;
