create or replace procedure UPDATE_COLOR_PELO(pnombre IN VARCHAR, pCOLOR_PELO_ID IN NUMBER) is
begin
  update COLOR_PELO
    set nombre = pnombre
      where pais_id = pPAIS_ID;
        end UPDATE_COLOR_PELO;
