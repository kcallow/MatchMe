create table Visita_Perfil
(
  fec_visita_perfil			DATE,
--  fec_creacion			DATE,
--  fec_ultima_modificacion	DATE,
  username_visitante		VARCHAR2(10),
  CONSTRAINT fk_visita_perfil_persona_visitante FOREIGN KEY (username_visitante) REFERENCES PERSONA(username),
  username_visitada	 	VARCHAR2(10),
  CONSTRAINT fk_visita_perfil_persona_visitada FOREIGN KEY (username_visitada) REFERENCES PERSONA(username),
  CONSTRAINT pk_visita_perfil PRIMARY KEY (fec_Visita_Perfil, username_visitante, username_visitada)
);
