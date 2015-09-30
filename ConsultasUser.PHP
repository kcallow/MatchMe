<html>
<head>
        <link rel="shortcut icon" href="images\favicon.ico" >
   		<link rel="icon" type="image/gif" href="images\animated_favicon1.gif" >
<title>MatchMe.com - Consultas</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="ConsultasAdmin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
</head>
<body>

<?php // CONEXION Y VARIABLES
$c = oci_connect("ge", "ge", "localhost/BDMATCHME");

$array_INTERES = oci_parse($c, 'SELECT * FROM INTERES');
oci_execute($array_INTERES);

$array_EDAD = oci_parse($c, 'SELECT * FROM EDAD');
oci_execute($array_EDAD);

$array_GENERO = oci_parse($c, 'SELECT * FROM GENERO');
oci_execute($array_GENERO);

$array_PAIS = oci_parse($c, 'SELECT * FROM PAIS');
oci_execute($array_PAIS);

$array_CIUDAD = oci_parse($c, 'SELECT * FROM CIUDAD');
oci_execute($array_CIUDAD);

$array_ESTADO_CIVIL = oci_parse($c, 'SELECT * FROM ESTADO_CIVIL');
oci_execute($array_ESTADO_CIVIL);

$array_NIVEL_EDUCACION = oci_parse($c, 'SELECT * FROM NIVEL_EDUCACION');
oci_execute($array_NIVEL_EDUCACION);

$array_CONTEXTURA = oci_parse($c, 'SELECT * FROM CONTEXTURA');
oci_execute($array_CONTEXTURA);

$array_COLOR_OJOS = oci_parse($c, 'SELECT * FROM COLOR_OJOS');
oci_execute($array_COLOR_OJOS);

$array_COLOR_PELO = oci_parse($c, 'SELECT * FROM COLOR_PELO');
oci_execute($array_COLOR_PELO);


?>  
<div class="main">
  <div class="main_resize">
    <div class="header">
      <div class="logo">
        <h1><a href="PantallaUsuarioHtml.html"><span>Match</span>Me.com<small>Free Dating website</small></a> </h1>
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
        <ul>
          <li><a href="PantallaUsuarioHtml.html">Inicio</a></li>
         
           <li><a href="Match.html">Match</a></li>
          <li><a href="Perfil.html">Perfil</a></li>
          <li><a href="index.html">Salir</a></li>
        </ul>
        <div class="clr"></div>
      </div>
      
    </div>
    <div class="content">
      <div class="content_bg">
        <div class="mainbar">
          <div class="article">
            <h2><span>Filtros de Búsqueda</span></h2>
		<form>
		Nombre:
		<input type="text" name="Nombre"><br>
		Primer apellido:
		<input type="text" name="Apellido1"><br>
		Segundo apellido:
		<input type="text" name="Apellido2"><br>
		Email:
		<input type="text" name="Email"><br>
		Mínimo de winks:
		<input type="text" name="MinWinks"><br>
		Máximo de winks:
		<input type="text" name="MaxWinks"><br>
		Top de winks:
		<select>
		<option value="10">10</option>
		<option value="20">20</option>
		<option value="30">30</option>
		<option value="40">40</option>
		<option value="50">50</option>
		</select>
		<br>

		<table>
		<tr>
		  <th>Rango de edad</th>
		  <th>Género</th>
		  <th>País</th>
		  <th>Ciudad</th>
		  <th>Estado civil</th>
		  <th>Nivel más alto de educación</th>
		</tr>
		<tr>
		<td>
		<?php
echo "<select MULTIPLE name=\"combo_edad\">";
while (OCIFetch($array_EDAD))//Ciclo para recorrer la tabla
{
$campo_EDAD=OCIResult($array_EDAD,2);//aca va la columna
echo "<option value=\"$campo_EDAD\">$campo_EDAD</option>";
}
echo "</select>";
?>
</td>

		<td>		
		<?php
echo "<select MULTIPLE name=\"combo_genero\">";
while (OCIFetch($array_GENERO))//Ciclo para recorrer la tabla
{
$campo_GENERO=OCIResult($array_GENERO,2);//aca va la columna
echo "<option value=\"$campo_GENERO\">$campo_GENERO</option>";
}
echo "</select>";
?></td>

		<td><?php
echo "<select MULTIPLE name=\"combo_PAIS\">";
while (OCIFetch($array_PAIS))//Ciclo para recorrer la tabla
{
$campo_PAIS=OCIResult($array_PAIS,2);//aca va la columna
echo "<option value=\"$campo_PAIS\">$campo_PAIS</option>";
}
echo "</select>";
?></td>
		<td><?php
echo "<select MULTIPLE name=\"combo_CIUDAD\">";
while (OCIFetch($array_CIUDAD))//Ciclo para recorrer la tabla
{
$campo_CIUDAD=OCIResult($array_CIUDAD,2);//aca va la columna
echo "<option value=\"$campo_CIUDAD\">$campo_CIUDAD</option>";
}
echo "</select>";
?></td>


		<td><?php
echo "<select MULTIPLE name=\"combo_ESTADO_CIVIL\">";
while (OCIFetch($array_ESTADO_CIVIL))//Ciclo para recorrer la tabla
{
$campo_ESTADO_CIVIL=OCIResult($array_ESTADO_CIVIL,2);//aca va la columna
echo "<option value=\"$campo_ESTADO_CIVIL\">$campo_ESTADO_CIVIL</option>";
}
echo "</select>";
?></td>

		<td><?php
echo "<select MULTIPLE name=\"combo_NIVEL_EDUCACION\">";
while (OCIFetch($array_NIVEL_EDUCACION))//Ciclo para recorrer la tabla
{
$campo_NIVEL_EDUCACION=OCIResult($array_NIVEL_EDUCACION,2);//aca va la columna
echo "<option value=\"$campo_NIVEL_EDUCACION\">$campo_NIVEL_EDUCACION</option>";
}
echo "</select>";
?></td>
		</table>
		<br>
		<table>
		<tr>
		  <th>Contextura</th>
		  <th>Altura (cm)</th>
		  <th>Peso (kg)</th>
		  <th>Color de ojos</th>
		  <th>Color de pelo</th>
		</tr>
		<tr>
		<td><?php
echo "<select MULTIPLE name=\"combo_CONTEXTURA\">";
while (OCIFetch($array_CONTEXTURA))//Ciclo para recorrer la tabla
{
$campo_CONTEXTURA=OCIResult($array_CONTEXTURA,2);//aca va la columna
echo "<option value=\"$campo_CONTEXTURA\">$campo_CONTEXTURA</option>";
}
echo "</select>";
?></td>
		<td><select multiple>
		  <option value="0">Menos que 140</option>
		  <option value="1">141-150</option>
		  <option value="2">151-160</option>
		  <option value="3">161-170</option>
		  <option value="4">171-180</option>
		  <option value="5">181-190</option>
		  <option value="6">191-200</option>
		  <option value="7">201 o más</option>
		</select></td>
		<td><select multiple>
		  <option value="0">40 o menos</option>
		  <option value="1">41-45</option>
		  <option value="2">46-50</option>
		  <option value="3">51-55</option>
		  <option value="4">56-60</option>
		  <option value="5">61-65</option>
		  <option value="6">66-70</option>
		  <option value="7">71-75</option>
		  <option value="8">76-80</option>
		  <option value="9">81-85</option>
		  <option value="10">86-90</option>
		  <option value="11">91-95</option>
		  <option value="12">96-100</option>
		  <option value="13">101-105</option>
		  <option value="14">106-110</option>
		  <option value="15">111-115</option>
		  <option value="16">116-120</option>
		  <option value="17">121-125</option>
		  <option value="18">126-130</option>
		  <option value="19">131-135</option>
		  <option value="20">136-140</option>
		  <option value="21">141-145</option>
		  <option value="22">146-150</option>
		  <option value="23">151-155</option>
		  <option value="24">156-160</option>
		  <option value="25">161-165</option>
		  <option value="26">166-170</option>
		  <option value="27">171-175</option>
		  <option value="28">176-180</option>
		  <option value="29">181-185</option>
		  <option value="30">186-190</option>
		  <option value="31">191-195</option>
		  <option value="32">196-200</option>
		  <option value="33">201 o más</option>
		</select></td>
		<td><?php
echo "<select MULTIPLE name=\"combo_COLOR_OJOS\">";
while (OCIFetch($array_COLOR_OJOS))//Ciclo para recorrer la tabla
{
$campo_COLOR_OJOS=OCIResult($array_COLOR_OJOS,2);//aca va la columna
echo "<option value=\"$campo_COLOR_OJOS\">$campo_COLOR_OJOS</option>";
}
echo "</select>";
?></td>
		<td><?php
echo "<select MULTIPLE name=\"combo_COLOR_PELO\">";
while (OCIFetch($array_COLOR_OJOS))//Ciclo para recorrer la tabla
{
$campo_COLOR_OJOS=OCIResult($array_COLOR_OJOS,2);//aca va la columna
echo "<option value=\"$campo_COLOR_OJOS\">$campo_COLOR_OJOS</option>";
}
echo "</select>";
?></td>
		</table>
		<br>
		<table>
		<tr>
		  <th>Idioma</th>
		  <th>Religión</th>
		  <th>Fuma tabaco</th>
		  <th>Bebe alcohol</th>
		  <th>Frecuencia en que se ejercita</th>
		</tr>
		<tr>
		<td><select multiple>
		<option value="0">Chino</option>
		<option value="1">Inglés</option>
		<option value="2">Hindi</option>
		<option value="3">Español</option>
		<option value="4">Ruso</option>
		<option value="5">Árabe</option>
		<option value="6">Bengalí</option>
		<option value="7">Portugués</option>
		<option value="8">Indonesio</option>
		<option value="9">Francés</option>
		<option value="10">Japonés</option>
		<option value="11">Alemán</option>
		<option value="12">Turco</option>
		</select></td>

		<td><select multiple>
		<option value="0">Asatru</option>
		<option value="1">Bahai</option>
		<option value="2">Brahamismo</option>
		<option value="3">Budismo</option>
		<option value="4">Cao Dai</option>
		<option value="5">Cristianismo</option>
		<option value="6">Confucionismo</option>
		<option value="7">Deismo</option>
		<option value="8">Druidismo</option>
		<option value="9">Hinduísmo</option>
		<option value="10">I. Unitaria Universal</option>
		<option value="11">Islam</option>
		<option value="12">Jainismo</option>
		<option value="13">Judaismo</option>
		<option value="14">Massai</option>
		<option value="15">Nuer</option>
		<option value="16">Oromo</option>
		<option value="17">Panteismo</option>
		<option value="18">Rastafarismo</option>
		<option value="19">Sabaean Mandeans</option>
		<option value="20">Santa Muerte</option>
		<option value="21">Shintoismo</option>
		<option value="22">Shona</option>
		<option value="23">Sikismo</option>
		<option value="24">Sufismo</option>
		<option value="25">Taoismo</option>
		<option value="26">Vudú</option>
		<option value="27">Yezidismo</option>
		<option value="28">Yoruba</option>
		<option value="29">Zoroastrism</option>
		<td><select multiple>
		<option value="0">Todos los días</option>
		<option value="1">Semanalmente</option>
		<option value="2">Mensualmente</option>
		<option value="3">Cada 3-6 meses</option>
		<option value="4">Rara vez</option>
		</select></td>
		<td><select multiple>
		<option value="0">Todos los días</option>
		<option value="1">Semanalmente</option>
		<option value="2">Mensualmente</option>
		<option value="3">Cada 3-6 meses</option>
		<option value="4">Rara vez</option>
		</select></td>
		<td><select multiple>
		<option value="0">Todos los días</option>
		<option value="1">3-5 veces a la semana</option>
		<option value="2">1-2 veces a la semana</option>
		<option value="3">Cada 2-3 semanas</option>
		<option value="4">Cada 1-2 meses</option>
		<option value="5">Rara vez</option>
		</select></td>
		</table>
		<br>
		<table>
		<tr>
		  <th>Número de hijos</th>
		  <th>¿Quiere hijos?</th>
		  <th>Categorías de ocupación</th>
		  <th>Ocupación</th>
		  <th>Salario</th>
		</tr>
		<tr>
		<td><select multiple>
		  
		  <option value="0">0</option>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		  <option value="5">5</option>
		  <option value="6">6</option>
		  <option value="7">7</option>
		  <option value="8">8</option>
		  <option value="9">9</option>
		  <option value="10">10</option>
		  <option value="11">11</option>
		  <option value="12">12</option>
		  <option value="13">13</option>
		  <option value="14">14</option>
		  <option value="15">15</option>

		  </select></td>
		<td><select multiple>
		  
		  <option value="0">Sí</option>
		  <option value="1">No</option>
		</select></td>
		<td><select multiple>
		<option value="0">Ciencia y tecnología</option>
		<option value="1">Administración</option>
		<option value="2">Salud</option>
		<option value="3">Educación</option>
		<option value="4">Ciencias sociales</option>
		<option value="5">Lenguaje y literatura</option>
		<option value="6">Política</option>
		<option value="7">Derecho</option>
		</select></td>
		<td><select multiple>
		<option value="0">Ingeniero informático</option>
		<option value="1">Mantenimiento electromecánico</option>
		<option value="2">Administrador público</option>
		<option value="3">Auditor contable</option>
		<option value="4">Farmacólogo</option>
		<option value="5">Enfermero</option>
		<option value="6">Gerontólogo</option>
		<option value="7">Maestro de kinder</option>
		<option value="8">Sociólogo</option>
		<option value="9">Antropólogo</option>
		<option value="10">Profesor de filosofía</option>
		<option value="11">Lingüista</option>
		<option value="12">Presidente</option>
		<option value="13">Diputado</option>
		<option value="14">Juez</option>
		<option value="15">Notario</option>
		</select></td>
		<td><select multiple>
		<option value="0">Menos de 100.000</option>
		<option value="1">100.000-250.000</option>
		<option value="2">250.000-500.000</option>
		<option value="3">500.000-750.000</option>
		<option value="4">750.000-1.000.000</option>
		<option value="5">1.000.000-1.250.000</option>
		<option value="6">1.250.000-1.500.000</option>
		<option value="7">1.500.000-1.750.000</option>
		<option value="8">1.750.000-2.000.000</option>
		<option value="9">2.000.000-2.500.000</option>
		<option value="10">2.500.000-3.000.000</option>
		<option value="11">3.000.000-3.500.000</option>
		<option value="12">3.500.000-4.000.000</option>
		<option value="13">4.000.000-4.500.000</option>
		<option value="14">4.500.000-5.000.000</option>
		<option value="15">5.000.000-6.000.000</option>
		<option value="16">6.000.000-7.000.000</option>
		<option value="17">7.000.000-8.000.000</option>
		<option value="18">8.000.000-9.000.000</option>
		<option value="19">9.000.000-10.000.000</option>
		<option value="20">Más de 10.000.000</option>
		</select></td>
		</table>
		<table>
		<tr>
		  <th>Ejercicio</th>
		  <th>Categorías de Interés</th>
		  <th>Interés</th>
		</tr>
		<td><select multiple>
		<option value="0">Correr</option>
		<option value="1">Nadar</option>
		<option value="2">Andar en bicicleta</option>
		<option value="3">Futbol</option>
		<option value="4">Basketbol</option>
		<option value="5">Beisbol</option>
		<option value="6">Atletismo</option>
		<option value="7">Gimnasio</option>
		<option value="8">Gimnasia</option>
		<option value="9">Parkour</option>
		</select></td>
		<td><select multiple>
		  <option value="0">Deporte</option>
		  <option value="1">Manualidades</option>
		  <option value="2">Arte y música</option>
		  <option value="3">Juegos de mesa</option>
		  <option value="4">Actividades al aire libre</option>
		  <option value="5">Videojuegos</option>
		  <option value="6">Películas y series</option>
		  <option value="7">Religión</option>
		</select></td>
		<td>
<?php
echo "<select MULTIPLE name=\"combo_prueba\">";
while (OCIFetch($array_INTERES))//Ciclo para recorrer la tabla
{
$campo_interes=OCIResult($array_INTERES,2);//aca va la columna
echo "<option value=\"$campo_interes\">$campo_interes</option>";
}
echo "</select>";
?>

	
		</td>
		</table>
		<br>
		<b>Mascotas:</b> <br> <br>
		Gato:
		<select>
		  <option value="0">0</option>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		  <option value="5">5</option>
		  <option value="6">6</option>
		  <option value="7">7</option>
		  <option value="8">8</option>
		  <option value="9">9</option>
		  <option value="10">10</option>
		</select>
		Perro:
		<select>
		  <option value="0">0</option>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		  <option value="5">5</option>
		  <option value="6">6</option>
		  <option value="7">7</option>
		  <option value="8">8</option>
		  <option value="9">9</option>
		  <option value="10">10</option>
		</select>
		Pez:
		<select>
		  <option value="0">0</option>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		  <option value="5">5</option>
		  <option value="6">6</option>
		  <option value="7">7</option>
		  <option value="8">8</option>
		  <option value="9">9</option>
		  <option value="10">10</option>
		</select>
		Loro:
		<select>
		  <option value="0">0</option>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		  <option value="5">5</option>
		  <option value="6">6</option>
		  <option value="7">7</option>
		  <option value="8">8</option>
		  <option value="9">9</option>
		  <option value="10">10</option>
		</select>
		Mono:
		<select>
		  <option value="0">0</option>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		  <option value="5">5</option>
		  <option value="6">6</option>
		  <option value="7">7</option>
		  <option value="8">8</option>
		  <option value="9">9</option>
		  <option value="10">10</option>
		</select>
		Iguana:
		<select>
		  <option value="0">0</option>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		  <option value="5">5</option>
		  <option value="6">6</option>
		  <option value="7">7</option>
		  <option value="8">8</option>
		  <option value="9">9</option>
		  <option value="10">10</option>
		</select>
		Búho:
		<select>
		  <option value="0">0</option>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		  <option value="5">5</option>
		  <option value="6">6</option>
		  <option value="7">7</option>
		  <option value="8">8</option>
		  <option value="9">9</option>
		  <option value="10">10</option>
		</select>
		Sapo:
		<select>
		  <option value="0">0</option>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		  <option value="5">5</option>
		  <option value="6">6</option>
		  <option value="7">7</option>
		  <option value="8">8</option>
		  <option value="9">9</option>
		  <option value="10">10</option>
		</select>
		<br><br><input type="submit" value="Consultar usuarios">
		</form>
          </div>

	<div class="menu_nav"> </div>
        <div class="clr"></div>
          <div class="article">
            <h2><span>Resultados de Busqueda</span></h2>
            <div class="clr"></div>
            <p>Cantidad: 2 usuarios</p>
            <div class="clr"></div>
          </div>
            <div class="article">
            <h2><span>Kristin Kreuk</span></h2>
            <div class="clr"></div>
            <img src="https://images.duckduckgo.com/iu/?u=http%3A%2F%2F2.bp.blogspot.com%2F_6OJy2dJt-eU%2FTPEbZQg9pMI%2FAAAAAAAADng%2FC_XwQj1g5vw%2Fs1600%2Fatraer%252Bcon%252Bla%252Bmirada%252Ba%252Buna%252Bmujer.jpg&f=1" width="313" height="193" alt="" />
            <p class="spec"><a href="#" class="rm fl">Winks (35)</a></p>
            <div class="clr"></div>
          </div>
          <div class="article">
            <h2><span>Emma Roberts</span></h2>
            <div class="clr"></div>
            <img src="https://images.duckduckgo.com/iu/?u=http%3A%2F%2Fmetodosparaligar.com%2Fwp-content%2Fuploads%2F2011%2F08%2Ftecnica-para-seducir-una-mujer.jpg&f=1" width="313" height="193" alt="" />
            <p class="spec"><a href="#" class="rm fl">Winks (42)</a></p>
            <div class="clr"></div>
          </div>
        </div>
        <div class="sidebar">
            
            <div class="gadget">
            <h2 class="star"><span>Mi Información</span></h2>
            <div class="clr"></div>
            <ul class="sb_menu">
              <li><a href="">Moises ALvarez</a></li>
              <li><a href="">moisesapotuguez@gmail.com</a></li>
          
            </ul>
          </div>
            
          <div class="gadget">
            <h2 class="star"><span>Mis Acciones</span></h2>
            <div class="clr"></div>
            <ul class="sb_menu">
              
              <li><a href="#">Actualizar Datos</a></li>
            </ul>
          </div>
          
        </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
  </div>
</body>
</html>
