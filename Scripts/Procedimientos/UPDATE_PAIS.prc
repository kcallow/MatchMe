create or replace procedure UPDATE_PAIS(pNOMBRE IN VARCHAR, pPAIS_ID IN VARCHAR) is
begin
  update pais
  set NOMBRE = pNombre
  where pais_id = pPAIS_ID;
end UPDATE_PAIS;
/
