create table WINK
(
  wink_id		   	NUMBER,
  using index 
  tablespace GE_DATA pctfree 10
  storage ( initial 64K minextents 1 maxextents unlimited),
  CONSTRAINT pk_wink PRIMARY KEY (wink_id),
  fec_WINK			DATE,
--  fec_creacion			DATE,
--  fec_ultima_modificacion	DATE,
  username_emisor		VARCHAR2(10),
  CONSTRAINT fk_emisor FOREIGN KEY (username_emisor) REFERENCES PERSONA(username),
  username_receptor	 	VARCHAR2(10)
  CONSTRAINT fk_receptor FOREIGN KEY (username_receptor) REFERENCES PERSONA(username),
)
