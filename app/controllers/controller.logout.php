<?php

function logout() {
    $_SESSION = array(); // Eliminar todas las variables de sesión
    session_destroy(); // Destruir la sesión
    header("Location: inicio"); // Redirigir a la página de inicio o login
    exit();
}

?>