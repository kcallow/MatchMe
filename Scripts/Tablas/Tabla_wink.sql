create table WINK
(
  using index 
  tablespace GE_DATA pctfree 10
  storage ( initial 64K minextents 1 maxextents unlimited),
  WINK_id		   	NUMBER,
  constraint PK_WINK primary key (WINK_ID),
  fec_WINK			DATE,
  fec_creacion			DATE,
  fec_ultima_modificacion	DATE,
  id_usuario_emisor		VARCHAR2(10),
  id_usuario_receptor	 	VARCHAR2(10)
)
