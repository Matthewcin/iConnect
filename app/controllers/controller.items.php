<?php

require_once './app/db.php';

// Función para obtener un ítem por ID
function getItemById($id) {
    $db = getDBConnection(); // Asegúrate de que la conexión se establece aquí
    $query = $db->prepare("SELECT * FROM telefonos WHERE id = ?");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

// Función para actualizar un ítem
function updateItem($id, $modelo, $precio, $descripcion, $categoria_id, $img) {
    $db = getDBConnection();
    $query = $db->prepare("UPDATE telefonos SET modelo = ?, precio = ?, descripcion = ?, categoria_id = ?, img = ? WHERE id = ?");
    return $query->execute([$modelo, $precio, $descripcion, $categoria_id, $img, $id]);
}

// Función para eliminar un ítem
function deleteItem($id) {
    $db = getDBConnection();
    $query = $db->prepare("DELETE FROM telefonos WHERE id = ?");
    return $query->execute([$id]);
}

// Función para obtener todas las categorías
function getAllCategories() {
    $db = getDBConnection();
    $query = $db->query("SELECT * FROM categorias");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function agregarItem() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $modelo = $_POST['modelo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $categoria_id = $_POST['categoria_id'];

        $db = getDBConnection(); // Obtén la conexión a la base de datos
        $query = $db->prepare("INSERT INTO telefonos (modelo, precio, descripcion, categoria_id) VALUES (?, ?, ?, ?)");
        $query->execute([$modelo, $precio, $descripcion, $categoria_id]);

        header('Location: ' . BASE_URL . 'listar-item');
        exit;
    }

    // Obtener categorías para el formulario
    $db = getDBConnection();
    $query = $db->query("SELECT * FROM categorias");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getTelefonoById($id) {
    $db = getDBConnection(); // Obtener la conexión
    $query = $db->prepare("SELECT * FROM telefonos WHERE id = ?");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function updateTelefono($id, $modelo, $precio, $descripcion, $categoria_id, $img) {
    $db = getDBConnection(); // Obtener la conexión
    $updateQuery = $db->prepare("UPDATE telefonos SET modelo = ?, precio = ?, descripcion = ?, categoria_id = ?, img = ? WHERE id = ?");
    return $updateQuery->execute([$modelo, $precio, $descripcion, $categoria_id, $img, $id]);
}

function getAllCategorias() {
    $db = getDBConnection(); // Obtener la conexión
    $query_categoria = $db->query("SELECT * FROM categorias");
    return $query_categoria->fetchAll(PDO::FETCH_ASSOC);
}
?>