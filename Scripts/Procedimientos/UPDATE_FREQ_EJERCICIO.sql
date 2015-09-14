create or replace procedure UPDATE_FREQ_EJERCICIO(prango IN VARCHAR, pFREQ_EJERCICIO_ID IN NUMBER) is
begin
  update FREQ_EJERCICIO
    set rango = prango
      where pais_id = pPAIS_ID;
        end UPDATE_FREQ_EJERCICIO;
