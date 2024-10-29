<?php
require_once 'Model.php';
class telefonoModel extends Model{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_iconnect;charset=utf8', 'root', '');
    }

    function selectTelefonos()
    {
        $query = $this->db->prepare("SELECT * FROM telefonos");
        $query->execute(); // Ejecutar la consulta
        return $query->fetchAll(PDO::FETCH_ASSOC); // Devolver los resultados
    }

    function showDetalle($id)
    {
        $query = $this->db->prepare("SELECT * FROM telefonos WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC); // Retorna el resultado
    }


    function getTelefonos()
    {
        $query = $this->db->query("SELECT * FROM telefonos");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Función para obtener un ítem por ID
    function getItemById($id)
    {
        $query = $this->db->prepare("SELECT * FROM telefonos WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Función para actualizar un ítem
    function updateItem($id, $modelo, $precio, $descripcion, $categoria_id, $img)
    {
        $query = $this->db->prepare("UPDATE telefonos SET modelo = ?, precio = ?, descripcion = ?, categoria_id = ?, img = ? WHERE id = ?");
        return $query->execute([$modelo, $precio, $descripcion, $categoria_id, $img, $id]);
    }

    // Función para Agregar un ítem
    public function addItem($modelo, $precio, $descripcion, $categoria_id) {
        $query = $this->db->prepare("INSERT INTO telefonos (modelo, precio, descripcion, categoria_id) VALUES (?, ?, ?, ?)");
        $query->execute([$modelo, $precio, $descripcion, $categoria_id]);
    }

    // Función para eliminar un ítem
    function deleteItem($id)
    {
        $query = $this->db->prepare("DELETE FROM telefonos WHERE id = ?");
        return $query->execute([$id]);
    }

    function getTelefonoById($id)
    {
        $query = $this->db->prepare("SELECT * FROM telefonos WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function updateTelefono($id, $modelo, $precio, $descripcion, $categoria_id, $img)
    {
        $updateQuery = $this->db->prepare("UPDATE telefonos SET modelo = ?, precio = ?, descripcion = ?, categoria_id = ?, img = ? WHERE id = ?");
        return $updateQuery->execute([$modelo, $precio, $descripcion, $categoria_id, $img, $id]);
    }

    public function getTelefonosByCategoria($categoria_id) {
        // Obtener los teléfonos que pertenecen a la categoría específica
        $query = $this->db->prepare("SELECT * FROM telefonos WHERE categoria_id = ?");
        $query->execute([$categoria_id]);
        $telefonos = $query->fetchAll(PDO::FETCH_ASSOC);

        // Obtener el nombre de la categoría
        $query_categoria = $this->db->prepare("SELECT * FROM categoria WHERE id = ?");
        $query_categoria->execute([$categoria_id]);
        $categoria = $query_categoria->fetch(PDO::FETCH_ASSOC);

        return [
            'telefonos' => $telefonos,
            'categoria' => $categoria
        ];
    }




}
