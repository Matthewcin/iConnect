<?php
require_once 'Model.php';

class categoriaModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_iconnect;charset=utf8', 'root', '');
    }

    public function selectCategoria()
    {
        $query = $this->db->query("SELECT * FROM categoria");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCategoria($nombre)
    {
        $query = $this->db->prepare("INSERT INTO categoria (nombre) VALUES (?)");
        $query->execute([$nombre]);
    }

    public function updateCategoria($id, $nombre) {
        $query = $this->db->prepare("UPDATE categoria SET nombre = ? WHERE id = ?");
        $result = $query->execute([$nombre, $id]);
        return $result;
    }

    public function deleteCategoria($id) {
        $query = $this->db->prepare("DELETE FROM categoria WHERE id = ?");
        $result = $query->execute([$id]);
        return $result;
    }

    public function getCategoriaById($id)
    {
        $query = $this->db->prepare("SELECT * FROM categoria WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getTelefonosByCategoria()
    {
        $query = $this->db->prepare("SELECT * FROM telefonos WHERE categoria_id = ?");
        $query->execute();
        $telefonos = $query->fetchAll(PDO::FETCH_ASSOC);

        $query_categoria = $this->db->prepare("SELECT nombre FROM categoria WHERE id = ?");
        $query_categoria->execute();
        $categoria = $query_categoria->fetch(PDO::FETCH_ASSOC);

        return [
            'telefonos' => $telefonos,
            'categoria' => $categoria
        ];
    }
}
