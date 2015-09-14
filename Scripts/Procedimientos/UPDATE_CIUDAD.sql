create or replace procedure UPDATE_CIUDAD(pnombre IN VARCHAR, pCIUDAD_ID IN NUMBER) is
begin
  update CIUDAD
    set nombre = pnombre
      where pais_id = pPAIS_ID;
        end UPDATE_CIUDAD;
