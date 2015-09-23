CREATE OR REPLACE TRIGGER beforeInsert_per_dispxc_pelo
       BEFORE INSERT
       ON GE.PERSONA_DISPONIBLEXCOLOR_PELO FOR EACH ROW
BEGIN
  :NEW.USUARIO_CREACION:= USER;
  :NEW.FEC_CREACION:= SYSDATE;
END;