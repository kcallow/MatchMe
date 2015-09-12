-- Create table
create table IDENTIDAD
(
  identidad_id     NUMBER not null,
  primer_apellido  VARCHAR2(30),
  segundo_apellido VARCHAR2(30),
  nombre           VARCHAR2(40)
)
tablespace GE_DATA
  pctfree 10
  initrans 1
  maxtrans 255;
-- Create/Recreate primary, unique and foreign key constraints 
alter table IDENTIDAD
  add constraint PK_IDENTIDAD primary key (IDENTIDAD_ID)
  using index 
  tablespace GE_IND
  pctfree 20
  initrans 2
  maxtrans 255
  storage
  (
    initial 16K
    next 16K
  );
-- Create/Recreate check constraints 
alter table IDENTIDAD
  add constraint IDENTIDAD_NOMBRE_NN
  check ("NOMBRE" IS NOT NULL);
