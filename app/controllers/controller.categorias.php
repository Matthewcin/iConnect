<?php

require_once './app/db.php'; // Asegúrate de usar require_once

function selectCategoria() {
    $db = getDBConnection();
    $query = $db->query("SELECT * FROM categorias");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function addCategoria($nombre) {
    $db = getDBConnection();
    $query = $db->prepare("INSERT INTO categorias (nombre) VALUES (?)");
    $query->execute([$nombre]);
}

function editCategoria($id, $nombre) {
    $db = getDBConnection();
    $query = $db->prepare("UPDATE categorias SET nombre = ? WHERE id = ?");
    $query->execute([$nombre, $id]);
}

function deleteCategoria($id) {
    $db = getDBConnection();
    $query = $db->prepare("DELETE FROM categorias WHERE id = ?");
    $query->execute([$id]);
}

function getCategoriaById($id) {
    $db = getDBConnection();
    $query = $db->prepare("SELECT * FROM categorias WHERE id = ?");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function getTelefonosByCategoria($categoria_id) {
    $db = getDBConnection();
    $query = $db->prepare("SELECT * FROM telefonos WHERE categoria_id = ?");
    $query->execute([$categoria_id]);
    $telefonos = $query->fetchAll(PDO::FETCH_ASSOC);

    $query_categoria = $db->prepare("SELECT nombre FROM categorias WHERE id = ?");
    $query_categoria->execute([$categoria_id]);
    $categoria = $query_categoria->fetch(PDO::FETCH_ASSOC);

    return [
        'telefonos' => $telefonos,
        'categoria' => $categoria
    ];
}
?>
