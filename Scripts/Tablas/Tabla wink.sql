-- Create table
create table WINK
(
  WINK_id           NUMBER not null,
  fec_WINK                    DATE,
  fec_creacion                DATE,
  fec_ultima_modificacion     DATE,
  usuario_creacion            VARCHAR2(10),
  usuario_ultima_modificacion VARCHAR2(10)
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
alter table WINK
  add constraint PK_WINK primary key (WINK_ID)
  using index 
  tablespace GE_DATA
  pctfree 10
  initrans 2
  maxtrans 255;
