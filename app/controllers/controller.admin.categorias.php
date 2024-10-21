<?php
// app/controllers/controller.admin.categorias.php

function adminSelectCategoria() {
    $db = getDBConnection();
    $query = $db->query("SELECT * FROM categorias");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function adminInsertCategoria($nombre) {
    $db = getDBConnection();
    $query = $db->prepare("INSERT INTO categorias (nombre) VALUES (?)");
    return $query->execute([$nombre]);
}

function adminUpdateCategoria($id, $nombre) {
    $db = getDBConnection();
    $query = $db->prepare("UPDATE categorias SET nombre = ? WHERE id = ?");
    return $query->execute([$nombre, $id]);
}

function adminDeleteCategoria($id) {
    $db = getDBConnection();
    $query = $db->prepare("DELETE FROM categorias WHERE id = ?");
    return $query->execute([$id]);
}

function adminGetCategoriaById($id) {
    $db = getDBConnection();
    $query = $db->prepare("SELECT * FROM categorias WHERE id = ?");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

?>