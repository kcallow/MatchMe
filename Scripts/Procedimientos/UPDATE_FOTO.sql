create or replace procedure UPDATE_FOTO(pSET IN VARCHAR, pFOTO_ID IN NUMBER) is
begin
  update FOTO
    set SET = pSET
      where pais_id = pPAIS_ID;
        end UPDATE_FOTO;
