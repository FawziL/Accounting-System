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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameAdmin = $_POST['username-admin'];
    $passwordAdmin = $_POST['password-admin'];
    $username = $_POST['username'];
    $newPassword = $_POST['newpassword'];
    $newPasswordAux = $_POST['newpasswordaux'];

    // Verificar que las contraseñas coincidan
    if ($newPassword !== $newPasswordAux) {
        redirectWithMessage("Las contraseñas no coinciden.");
    }

    // Leer el archivo de administradores
    $admins = readCSV('../admin/admin.csv');
    $adminValid = false;

    // Validar las credenciales del administrador
    foreach ($admins as $admin) {
        if ($admin[0] === $usernameAdmin && $admin[1] === $passwordAdmin) {
            $adminValid = true;
            break;
        }
    }

    if (!$adminValid) {
        redirectWithMessage("Credenciales de administrador inválidas.");
    }

    // Leer el archivo de contables
    $accountants = readCSV('accountant.csv');
    $userFound = false;

    // Buscar el usuario y actualizar la contraseña
    foreach ($accountants as &$accountant) {
        if ($accountant[0] === $username) {
            $accountant[1] = $newPassword; // Actualizar la contraseña
            $userFound = true;
            break;
        }
    }

    if (!$userFound) {
        redirectWithMessage("Usuario no encontrado.");
    }

    // Escribir los datos actualizados de vuelta al archivo
    writeCSV('accountant.csv', $accountants);

    header("Location: menuempleado.html?mensaje=success");
}
?>