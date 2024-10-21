<?php
session_start();
require_once 'app/inicio.php';
require_once 'app/categorias.php';
require_once 'app/login.php';
require_once 'app/dashboard.php';
require_once 'app/controllers/controller.telefonos.php';
require_once 'app/controllers/controller.logout.php';
require_once 'app/controllers/controller.items.php'; // Asegúrate de incluir el controlador de items
require_once 'app/controllers/controller.categorias.php'; // Asegúrate de incluir el controlador de categorías
require_once 'app/controllers/controller.admin.categorias.php';
require_once './app/db.php'; // Asegúrate de que la ruta sea correcta

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'inicio'; // Acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// Parsear la acción
$params = explode('/', $action);

// Tabla de ruteo
switch ($params[0]) {
    case 'inicio':
        showHome();
        break;

    case 'categorias':
        showCategory();
        break;

    case 'login':
        showLogin();
        break;

    case 'dashboard':
        include './templates/dashboardTemplate.phtml'; // Cargar la plantilla del dashboard
        break;

    case 'logout':
        logout(); // Llamar a la función de logout
        break;

    case 'detalle':
        if (isset($params[1])) {
            $id = $params[1];
            $telefono = showDetalle($id); // Obtener los detalles del teléfono
            if ($telefono) {
                include './templates/detalleTemplate.phtml'; // Cargar la plantilla del detalle
            } else {
                echo "Teléfono no encontrado.";
            }
        } else {
            echo "ID no proporcionado.";
        }
        break;

    case 'itemCategoria':
        if (isset($params[1])) {
            $categoria_id = $params[1];
            $telefonos = getTelefonosByCategoria($categoria_id); // Llama a la función que obtenga los teléfonos por categoría
            include './templates/itemCategoria.phtml'; // Cargar la plantilla de ítems por categoría
        } else {
            echo 'ID de categoría no proporcionado.';
        }
        break;

    case 'listar-item':
        include './templates/listar-item.phtml'; // Cargar la plantilla para listar ítems
        break;

    case 'visor-categorias':
        include './templates/visor-categorias.phtml'; // Cargar la plantilla para ver categorías
        break;

    case 'editar-item':
        if (isset($params[1])) {
            $id = $params[1];
            $telefono = getItemById($id); // Obtener el ítem por ID
        
            if ($telefono) {
                $categorias = getAllCategories(); // Obtener todas las categorías
                include './templates/editar-item.phtml'; // Cargar la plantilla de edición
            } else {
                echo "Teléfono no encontrado.";
            }
        } else {
            echo "ID no proporcionado.";
        }
        break;

    case 'actualizar-item':
        if (isset($params[1]) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $params[1];
            $modelo = $_POST['modelo'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            $categoria_id = $_POST['categoria_id'];
            $img = $_POST['imagen'];

            if (updateItem($id, $modelo, $precio, $descripcion, $categoria_id, $img)) {
                header('Location: ' . BASE_URL . 'listar-item');
                exit;
            } else {
                echo "Error al actualizar el ítem.";
            }
        } else {
            echo "ID no proporcionado.";
        }
        break;

    case 'eliminar-item':
        if (isset($params[1])) {
            $id = $params[1];
            deleteItem($id);
            header('Location: ' . BASE_URL . 'listar-item');
            exit;
        } else {
            echo "ID no proporcionado.";
        }
        break;

    case 'agregar-item':
        $categorias = agregarItem(); // Llama a la función que maneja la lógica
        include './templates/agregar-item.phtml'; // Carga la plantilla
        break;
        
        case 'agregar-categoria':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre = $_POST['nombre'];
                adminInsertCategoria($nombre);
                header('Location: ' . BASE_URL . 'visor-categorias');
                exit;
            }
            include './templates/agregar-categoria.phtml'; // Cargar la plantilla para agregar categoría
            break;
        
        case 'editar-categoria':
            if (isset($params[1])) {
                $id = $params[1];
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nombre = $_POST['nombre'];
                    adminUpdateCategoria($id, $nombre);
                    header('Location: ' . BASE_URL . 'visor-categorias');
                    exit;
                }
                $categoria = adminGetCategoriaById($id); // Obtener la categoría actual
                include './templates/editar-categoria.phtml'; // Cargar la plantilla para editar categoría
            } else {
                echo "ID no proporcionado.";
            }
            break;
        
        case 'eliminar-categoria':
            if (isset($params[1])) {
                $id = $params[1];
                adminDeleteCategoria($id);
                header('Location: ' . BASE_URL . 'visor-categorias');
                exit;
            } else {
                echo "ID no proporcionado.";
            }
            break;

    default:
        echo('404 Page not found'); // Manejo de error 404
        break;
}
