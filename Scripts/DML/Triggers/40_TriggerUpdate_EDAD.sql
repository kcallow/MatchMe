CREATE OR REPLACE TRIGGER beforeUpdate_edad
       BEFORE UPDATE
       ON GE.edad FOR EACH ROW
BEGIN
  :NEW.USUARIO_ULTIMA_MOD:= USER;
  :NEW.FEC_ULTIMA_MOD:= SYSDATE;
END;