-- Create table
create table signo_zodiacal
(
  signo_zodiacal_id NUMBER not null,
  nombre  VARCHAR2(30)
)
tablespace GE_DATA
  pctfree 10
  initrans 1
  maxtrans 255
  storage
  (
    initial 64K
    minextents 1
    maxextents unlimited
  );
-- Create/Recreate primary, unique and foreign key constraints 
alter table signo_zodiacal
  add constraint PK_signo_zodiacal primary key (signo_zodiacal_ID)
  using index 
  tablespace GE_DATA
  pctfree 10
  initrans 2
  maxtrans 255;
-- Create/Recreate check constraints 
alter table signo_zodiacal
  add constraint signo_zodiacal_NOMBRE_NN
  check ("NOMBRE" IS NOT NULL);
  
alter table signo_zodiacal
  add FEC_CREACION DATE;
alter table signo_zodiacal
  add FEC_ULTIMA_MODIFICACION DATE;
alter table signo_zodiacal
  add USUARIO_CREACION VARCHAR(10);
alter table signo_zodiacal
  add USUARIO_ULTIMA_MODIFICACION VARCHAR(10);
