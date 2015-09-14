create or replace procedure UPDATE_INTERES(pNOMBRE IN VARCHAR, pINTERES_ID IN NUMBER) is
begin
  update INTERES
    set NOMBRE = pNOMBRE
      where pais_id = pPAIS_ID;
        end UPDATE_INTERES;
