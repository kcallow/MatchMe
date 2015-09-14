create or replace procedure DELETE_PAIS(pNOMBRE IN VARCHAR, pPAIS_ID IN VARCHAR) is
begin
  DELETE from pais
  where pais_id = pPAIS_ID;
end  DELETE_PAIS;
