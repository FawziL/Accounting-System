<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$password = $_POST["password"];

	// Abre el archivo users.csv en modo lectura 
	$fp = fopen("accountant.csv", "r");

    while (($line = fgetcsv($fp)) !== FALSE) {
        if (isset($line[0]) && $line[0] == $username && isset($line[1]) && $line[1] == $password) { //Busca y compara los datos ingresados en el formulario con los almacenados en el .csv
            echo "Inicio de sesión exítoso!";
            header("Location: menuempleado.html");
            // Aquí se indica pa donde agarra despues de iniciar sesion
            exit;
        }
    }
    echo "Usuario o contraseña no válidos";
    header("Location: failedlog.html");
    fclose($fp);

} else {
	echo "Error: Invalid request method";
}



?>
