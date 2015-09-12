create table FOTO(
  foto_id NUMBER not null,
  ruta    BLOB
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

alter table FOTO
  add constraint PK_FOTO primary key (FOTO_ID)
  using index 
  tablespace GE_DATA
  pctfree 10
  initrans 2
  maxtrans 255;
