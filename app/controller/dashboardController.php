<?php

class dashboardController {
    // Método para mostrar el dashboard solo si el usuario ha iniciado sesión
    public function mostrarDashboard() {
        // Verificar si el usuario está autenticado
        if (isset($_SESSION['usuario'])) {
            // Mostrar la vista del dashboard
            include 'app/view/dashboardTemplate.phtml';
        } else {
            // Si no está autenticado, redirigir al login
            header('Location: ' . BASE_URL . 'login');
            exit();
        }
    }
}
