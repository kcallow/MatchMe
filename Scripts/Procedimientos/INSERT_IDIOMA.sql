create or replace procedure INSERT_IDIOMA(pIDIOMA_ID IN NUMBER, pNOMBRE IN VARCHAR2,FEC_CREACION IN DATE, USUARIO_CREACION IN VARCHAR, FEC_ULTIMA_MOD IN DATE, USUARIO_ULTIMA_MOD IN VARCHAR2  ) is
begin
  INSERT INTO IDIOMA
  VALUES (pIDIOMA_ID,pNOMBRE,FEC_CREACION , USUARIO_CREACION , FEC_ULTIMA_MOD, USUARIO_ULTIMA_MOD );
  
end INSERT_IDIOMA;
