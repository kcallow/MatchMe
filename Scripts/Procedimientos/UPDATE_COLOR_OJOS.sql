create or replace procedure UPDATE_COLOR_OJOS(pnombre IN VARCHAR, pCOLOR_OJOS_ID IN NUMBER) is
begin
  update COLOR_OJOS
    set nombre = pnombre
      where pais_id = pPAIS_ID;
        end UPDATE_COLOR_OJOS;
