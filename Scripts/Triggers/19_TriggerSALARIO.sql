CREATE OR REPLACE TRIGGER beforeInsert_salario
       BEFORE INSERT
       ON GE.SALARIO FOR EACH ROW
BEGIN
  :NEW.USUARIO_CREACION:= USER;
  :NEW.FEC_CREACION:= SYSDATE;
END;
CREATE OR REPLACE TRIGGER beforeUpdate_salario
       BEFORE UPDATE
       ON GE.SALARIO FOR EACH ROW
BEGIN
  :NEW.USUARIO_ULTIMA_MOD:= USER;
  :NEW.FEC_ULTIMA_MOD:= SYSDATE;
END;
