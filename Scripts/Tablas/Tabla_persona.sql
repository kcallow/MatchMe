create table PERSONA
(
  username		VARCHAR2(10),
  CONSTRAINT pk_username PRIMARY KEY (username),
  nacimiento		DATE,
--identidad_id	 	NUMBER not null,
  primer_apellido 	VARCHAR2(30),
  segundo_apellido 	VARCHAR2(30),
  nombre		VARCHAR2(40)
  genero_id		NUMBER,
  CONSTRAINT fk_genero_id FOREIGN KEY (genero_id) REFERENCES GENERO(genero_id),
  ciudad_id		NUMBER,
  CONSTRAINT fk_ciudad_id FOREIGN KEY (ciudad_id) REFERENCES CIUDAD(ciudad_id),
)
