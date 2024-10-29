<?php

session_start();
require_once 'app/controller/telefonoController.php';
require_once 'app/controller/categoriaController.php';
require_once 'app/controller/authController.php';
require_once 'app/controller/dashboardController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// Acción por defecto
$action = 'inicio';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// Parsear la acción
$params = explode('/', $action);

// Instanciar los controladores
$telefonoController = new telefonoController();
$categoriaController = new categoriaController();
$authController = new authController();
$dashboardController = new dashboardController();

switch ($params[0]) {

    case 'login':
        $authController->login(); // Mostrar la vista de login
        break;

    case 'logout':
        $authController->logout(); // Cerrar sesión
        break;

    case 'inicio':
        // Llamar al controlador para listar los teléfonos
        $telefonoController->listarTelefonos();
        break;

    case 'visor-categorias':
        // Llamar al controlador para lsitar las categorias
        $categoriaController->visorCategorias();
        break;

    case 'detalle':
        if (isset($params[1])) {
            // Obtener el ID del teléfono desde la URL
            $id = $params[1];
            // Llamar al controlador para mostrar el detalle del teléfono
            $telefonoController->mostrarDetalle($id);
        } else {
            echo "ID no proporcionado.";
        }
        break;

    case 'dashboard':
        $dashboardController->mostrarDashboard(); // Mostrar el dashboard si está autenticado
        break;

    case 'admin-categorias':
        // Llamar al método que muestra la vista de administración de categorías
        $categoriaController->administrarCategoria();
        break;

    case 'agregar-categoria':
        // Llamar al método que muestra la vista de administración de categorías
        $categoriaController->agregarCategoria();
        break;

    case 'listar-item':
        // Mostrar el listado de ítems
        $telefonoController->listarItems();
        break;
    case 'agregar-item':
        // Llamar al método que muestra la vista de administración de categorías
        $telefonoController->agregarItem();
        break;

    case 'listar-categorias':
        // Llamar al método del controlador de categorías para listar categorías
        $categoriaController->listarCategorias();
        break;

    case 'dashboard-categorias':
        // Llamar al método del controlador para mostrar el dashboard de categorías
        $categoriaController->mostrarDashboardCategorias();
        break;

    case 'categorias':
        // Mostrar todas las categorías
        $categoriaController->listarCategorias();
        break;

    case 'itemCategoria':
        // Mostrar los teléfonos por categoría si se proporciona el ID
        if (isset($params[1])) {
            $categoria_id = $params[1];
            $telefonoController->listarTelefonosPorCategoria($categoria_id);
        } else {
            echo "ID de categoría no proporcionado.";
        }
        break;

    case 'editar-categoria':
        if (isset($params[1])) {
            $categoria_id = $params[1];
            // Mostrar el formulario de edición de la categoría
            $categoriaController->editarCategoria($categoria_id);
        } else {
            echo "ID de categoría no proporcionado.";
        }
        break;

    case 'eliminar-categoria':
        // Verificar si se proporciona un ID de categoría
        if (isset($params[1])) {
            $categoria_id = $params[1];
            // Llamar al método para eliminar la categoría
            $categoriaController->eliminarCategoria($categoria_id);
        } else {
            echo "ID de categoría no proporcionado.";
        }
        break;

    case 'actualizar-categoria':
        if (isset($params[1])) {
            $categoria_id = $params[1];
            // Actualizar la categoría
            $categoriaController->actualizarCategoria($categoria_id);
        } else {
            echo "ID de categoría no proporcionado.";
        }
        break;

    case 'editar-item':
        if (isset($params[1])) {
            $item_id = $params[1];
            // Mostrar el formulario de edición del ítem
            $telefonoController->editarItem($item_id);
        } else {
            echo "ID del ítem no proporcionado.";
        }
        break;
    case 'eliminar-item':
        // Verificar si se proporciona un ID de ítem
        if (isset($params[1])) {
            $item_id = $params[1];
            // Llamar al método para eliminar el ítem
            $telefonoController->eliminarItem($item_id);
        } else {
            echo "ID del ítem no proporcionado.";
        }
        break;
    case 'actualizar-item':
        if (isset($params[1])) {
            $item_id = $params[1];
            // Actualizar el ítem
            $telefonoController->actualizarItem($item_id);
        } else {
            echo "ID del ítem no proporcionado.";
        }
        break;
    default:
        echo '404 Page not found'; // Página de error para rutas no encontradas
        break;
}
