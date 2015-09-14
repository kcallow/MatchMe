create or replace procedure UPDATE_FOTO(pRUTA IN VARCHAR, pFOTO_ID IN NUMBER) is
begin
  update FOTO
    set RUTA = pRUTA
      where FOTO_id = pFOTO_ID;
        end UPDATE_FOTO;
