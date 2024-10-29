<?php

class authController {
    // Método para manejar el inicio de sesión
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            // Usuario y contraseña predefinidos
            $defaultUsuario = 'webadmin';
            $defaultPassword = 'admin';

            // Verificar si las credenciales coinciden con los valores predefinidos
            if ($usuario === $defaultUsuario && $password === $defaultPassword) {
                // Si las credenciales son correctas, almacenar información en la sesión
                $_SESSION['usuario'] = $usuario;
                header("Location: " . BASE_URL . "dashboard");
                exit();
            } else {
                $error = "ACCESO DENEGADO";
            }
        }

        // Mostrar la vista de login con mensajes de error si es necesario
        include 'app/view/loginForm.phtml';
    }

    // Método para cerrar sesión
    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . 'login');
        exit();
    }
}
