create or replace procedure UPDATE_FUMADOR(pTIPO IN VARCHAR, pFUMADOR_ID IN NUMBER) is
begin
  update FUMADOR
    set TIPO = pTIPO
      where pais_id = pPAIS_ID;
        end UPDATE_FUMADOR;
