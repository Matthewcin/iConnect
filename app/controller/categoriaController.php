<?php
require_once 'app/model/categoriaModel.php';
require_once 'app/model/telefonoModel.php';

class categoriaController
{
    private $model;
    private $telefonoModel;
    public function __construct()
    {
        $this->model = new categoriaModel;
        $this->telefonoModel = new telefonoModel;
    }

    public function listarCategorias()
    {
        $categorias = $this->model->selectCategoria(); // Obtener todas las categorías
        include 'app/view/categoryList.phtml'; // Incluir la vista para mostrar categorías
    }

    public function visorCategorias()
    {
        // Obtener todas las categorías desde el modelo
        $categorias = $this->model->selectCategoria();

        // Incluir la vista y pasar los datos de las categorías
        include 'app/view/visor-categorias.phtml';
    }

    public function administrarCategoria()
    {
        // Obtenemos las categorías desde el modelo
        $categorias = $this->model->selectCategoria();

        // Incluimos la vista para mostrar las categorías
        include 'app/view/admin-categorias.phtml';
    }

    public function agregarCategoria()
    {
        // Verificar si los datos fueron enviados por POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener el valor de "nombre" desde el formulario
            $nombre = $_POST['nombre'];

            // Llamar al modelo para agregar la categoría
            $this->model->addCategoria($nombre);

            // Redirigir a la lista de categorías o mostrar un mensaje de éxito
            header('Location: ' . BASE_URL . 'visor-categorias');
            exit();
        }

        // Si no se ha enviado el formulario, mostrar la vista de agregar categoría
        include 'app/view/agregar-categoria.phtml';
    }

    public function mostrarDashboardCategorias()
    {
        // Obtener todas las categorías desde el modelo
        $categorias = $this->model->selectCategoria(); // Cambiado a selectCategoria()

        // Incluir la vista del dashboard de categorías
        include 'app/view/dashboard.categorias.phtml';
    }

    public function editarCategoria($id)
    {
        // Obtener la categoría por su ID
        $categoria = $this->model->getCategoriaById($id);

        // Verificar si se encontró la categoría
        if ($categoria) {
            // Incluir la vista y pasar los datos de la categoría
            include 'app/view/editar-categoria.phtml';
        } else {
            echo "Categoría no encontrada.";
        }
    }
    public function eliminarCategoria($id)
    {
        // Llamar al modelo para eliminar la categoría
        if ($this->model->deleteCategoria($id)) {
            // Redirigir a la lista de categorías después de eliminar
            header("Location: " . BASE_URL . "visor-categorias");
            exit();
        }
    }
    
    // Método para actualizar una categoría
    public function actualizarCategoria($id) {
        // Verificar si se envió el formulario por POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];  // Obtener el nombre actualizado

            // Llamar al modelo para actualizar la categoría
            if ($this->model->updateCategoria($id, $nombre)) {
                // Redirigir a la lista de categorías después de la actualización
                header("Location: " . BASE_URL . "visor-categorias");
                exit();
            } else {
                // Mostrar mensaje de error solo si realmente hubo un problema con la consulta
                echo "Error al actualizar la categoría.";
            }
        }
    }
}
