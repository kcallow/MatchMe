create or replace procedure UPDATE_BEBEDOR(pTIPO IN VARCHAR, pBEBEDOR_ID IN NUMBER) is
begin
  update BEBEDOR
    set TIPO = pTIPO
      where pais_id = pPAIS_ID;
        end UPDATE_BEBEDOR;
