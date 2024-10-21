<?php
require_once './app/dashboard.php';

function selectTelefonos(){
    $db = new PDO('mysql:host=localhost;dbname=db_iconnect;charset=utf8', 'root', '');
    $query = $db->prepare("SELECT * FROM telefonos");
    $query->execute(); // Ejecutar la consulta
    return $query->fetchAll(PDO::FETCH_OBJ); // Devolver los resultados
}

function showDetalle($id){
    $db = new PDO('mysql:host=localhost;dbname=db_iconnect;charset=utf8', 'root', '');
    $query = $db->prepare("SELECT * FROM telefonos WHERE id = ?");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC); // Retorna el resultado
}


function getTelefonos() {
    $db = new PDO('mysql:host=localhost;dbname=db_iconnect;charset=utf8', 'root', '');
    $query = $db->query("SELECT * FROM telefonos");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}


?>