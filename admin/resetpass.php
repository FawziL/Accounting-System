<?php
// Función para leer el contenido de un archivo CSV y devolverlo como un array
function readCSV($filename) {
    $data = [];
    if (($handle = fopen($filename, "r")) !== FALSE) {
        while (($row = fgetcsv($handle)) !== FALSE) {
            $data[] = $row;
        }
        fclose($handle);
    }
    return $data;
}

// Función para escribir un array a un archivo CSV
function writeCSV($filename, $data) {
    $handle = fopen($filename, 'w');
    foreach ($data as $row) {
        fputcsv($handle, $row);
    }
    fclose($handle);
}

// Función para redirigir con un mensaje
function redirectWithMessage($message) {
    header("Location: resetpass.html?message=" . urlencode($message));
    exit();
}

// Procesar el formulario
// Función para procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $newPassword = $_POST['newpassword'];
    $newPasswordAux = $_POST['newpasswordaux'];

    // Verificar que las contraseñas coincidan
    if ($newPassword !== $newPasswordAux) {
        redirectWithMessage("Las contraseñas no coinciden.");
    }

    // Leer el archivo de contables
    $admin = readCSV('admin.csv');
    $userFound = false;

    // Buscar el usuario y actualizar la contraseña
    foreach ($admin as &$user) { // Cambia el nombre de la variable a $user
        if ($user[0] === $username) {
            $user[1] = $newPassword; // Actualizar la contraseña
            $userFound = true;
            break;
        }
    }

    if (!$userFound) {
        redirectWithMessage("Admin no encontrado.");
    }

    // Escribir los datos actualizados de vuelta al archivo
    writeCSV('admin.csv', $admin); // Asegúrate de pasar el array completo

    header("Location: menuadmin.html?mensaje=success");
}
?>