<?php
$host = "localhost";
$user = "dygnmhgs_lm";
$password = "V8IDp#FxUq0I";
$database = "dygnmhgs_myblog";

$mysqli = new mysqli($host,$user,$password,$database);
if($mysqli->connect_errno){
	echo "falló la conexión";
}

//---armando la conexión, instanciando definición de conexión
$mysqli = new mysqli("localhost","dygnmhgs_lm","V8IDp#FxUq0I","dygnmhgs_myblog");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejemplo de Form y Select</title>
</head>
<body>
	<h1>Ejemplo de Form y select</h1>
	<p>Este ejemplo muestra como obtener los datos de un registro seleccionado</p>
	<p>Supongamos que queremos saber el detalle del id 1 y mostrar dentro de un campo de selección el que está registrado en la BD y después cambiarlo.</p>

	<p>El código sería así, donde "Technology" es el valor guardado en BD</p>
	<iframe
	  src="https://carbon.now.sh/embed/?bg=rgba(171%2C%20184%2C%20195%2C%201)&t=night-owl&wt=none&l=text%2Fx-php&ds=true&dsyoff=20px&dsblur=68px&wc=true&wa=true&pv=56px&ph=56px&ln=false&fm=Hack&fs=14px&lh=133%25&si=false&es=4x&wm=false&code=%253Cform%253E%250A%2509%2509%253Cselect%253E%250A%2509%2509%2509%253C%253Fphp%250A%2509%2509%2509%2509%252F%252F---ejecuci%25C3%25B3n%2520de%2520consulta%250A%2509%2509%2509%2509%2524query%2520%253D%2520%2522SELECT%2520*%2520FROM%2520categories%2520WHERE%2520id%2520%253D%25201%2522%253B%250A%2509%2509%2509%2509if(%2524result%2520%253D%2520%2524mysqli-%253Equery(%2524query))%257B%250A%2509%2509%2509%2509%2509%252F%252F---obtener%2520datos%2520de%2520la%2520consulta%2520por%2520medio%2520de%2520fetch%250A%2509%2509%2509%2509%2509%2524row%2520%253D%2520%2524result-%253Efetch_assoc()%253B%250A%2509%2509%2509%2509%2509%252F%252F---hacer%2520echo%2520con%2520la%2520estructura%2520del%2520tag%2520'option'%2520y%2520concatenar%2520el%2520nombre%2520de%2520la%2520columna%2520que%2520quisi%25C3%25A9ramos%2520mostrar%2520'%2524row%255B'%253C%253Cnombre_columna%253E%253E'%255D%250A%2509%2509%2509%2509%2509echo%2520'%253Coption%2520selected%253D%2522selected%2522%253E'%2520.%2520%2524row%255B%2522name%2522%255D%2520.%2520'%253C%252Foption%253E'%253B%250A%2509%2509%2509%2509%257D%250A%2509%2509%2509%2509%252F%252F---cerrar%2520conexi%25C3%25B3n%250A%2509%2509%2509%2509%2524mysqli-%253Eclose()%253B%250A%2509%2509%2509%253F%253E%250A%2509%2509%2509%253C!--el%2520resto%2520de%2520las%2520opciones%2520aqu%25C3%25AD--%253E%250A%2509%2509%2509%253Coption%2520value%253D%25221%2522%253EGaming%253C%252Foption%253E%250A%2509%2509%2509%253Coption%2520value%253D%25222%2522%253EAuto%253C%252Foption%253E%250A%2509%2509%253C%252Fselect%253E%250A%2509%2509%253Cinput%2520type%253D%2522submit%2522%2520name%253D%2522submit%2522%2520value%253D%2522Enviar%2522%253E%250A%2509%253C%252Fform%253E"
	  style="transform:scale(0.7); width:1024px; height:473px; border:0; overflow:hidden;"
	  sandbox="allow-scripts allow-same-origin">
	</iframe>
	<p>Aquí el formulario funcionando</p>
	<form>
		<select>
			<?php
				//---ejecución de consulta
				$query = "SELECT * FROM categories WHERE id = 1";
				if($result = $mysqli->query($query)){
					//---obtener datos de la consulta por medio de fetch
					$row = $result->fetch_assoc();
					//---hacer echo con la estructura del tag 'option' y concatenar el nombre de la columna que quisiéramos mostrar '$row['<<nombre_columna>>']
					echo '<option selected="selected">' . $row["name"] . '</option>';
				}
				//---cerrar conexión
				$mysqli->close();
			?>
			<!--el resto de las opciones aquí-->
			<option value="1">Gaming</option>
			<option value="2">Auto</option>
		</select>
		<input type="submit" name="submit" value="Enviar">
	</form>
</body>
</html>