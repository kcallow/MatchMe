-- Create table
create table PESO
(
  PESO_id NUMBER not null,
  PESO    VARCHAR2(30),
  fec_creacion    DATE,
  usuario_creacion	VARCHAR2(10),
  fec_ultima_mod	DATE,
  usuario_ultima_mod	VARCHAR2(10)
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
alter table PESO
  add constraint PK_PESO primary key (PESO_ID)
  using index 
  tablespace GE_DATA
  pctfree 10
  initrans 2
  maxtrans 255;
-- Create/Recreate check constraints 
alter table PESO
  add constraint PESO_NOMBRE_NN
  check ("PESO" IS NOT NULL);
