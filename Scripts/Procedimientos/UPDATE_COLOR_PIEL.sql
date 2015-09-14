create or replace procedure UPDATE_COLOR_PIEL(pnombre IN VARCHAR, pCOLOR_PIEL_ID IN NUMBER) is
begin
  update COLOR_PIEL
    set nombre = pnombre
      where pais_id = pPAIS_ID;
        end UPDATE_COLOR_PIEL;
