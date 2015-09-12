tablas="Ocupacion Color_Pelo Idioma Religion Mascota Ejercicio Interes"
i=0
for tabla in $tablas
do
	cat > ${i}_Persona_DisponibleX${tabla}.sql <<- END
	create table PERSONA_DISPONIBLEX$tabla
	(
	  username		VARCHAR2(10),
	  es_real		VARCHAR2(1),  
	  CONSTRAINT fk_perdispx${tabla}_perdisp FOREIGN KEY (username,es_real) REFERENCES persona_disponible(username,es_real),
	  ${tabla}_id		NUMBER,
	  CONSTRAINT fk_perdispx${tabla}_${tabla} FOREIGN KEY (${tabla}_id) REFERENCES ${tabla}(${tabla}_id)
	);
	END
	let i+=1
done
