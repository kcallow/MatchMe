CREATE OR REPLACE TRIGGER beforeUpdate_peso
       BEFORE UPDATE
       ON GE.PESO FOR EACH ROW
BEGIN
  :NEW.USUARIO_ULTIMA_MOD:= USER;
  :NEW.FEC_ULTIMA_MOD:= SYSDATE;
END;