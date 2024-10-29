<?php

require_once 'app/model/telefonoModel.php'; // Incluimos el modelo de teléfonos
require_once 'app/model/categoriaModel.php'; // Incluimos el modelo de categorías (para obtener categorías)

class telefonoController
{
    private $telefonoModel;
    private $categoriaModel;

    public function __construct()
    {
        $this->telefonoModel = new telefonoModel(); // Inicializamos el modelo de teléfonos
        $this->categoriaModel = new categoriaModel(); // Inicializamos el modelo de categorías
    }

    public function listarTelefonos()
    {
        // Obtener todos los teléfonos desde el modelo
        $telefonos = $this->telefonoModel->selectTelefonos();

        // Incluir la vista y pasar los datos de los teléfonos
        include 'app/view/phoneList.phtml';
    }

    public function listarItems() {
        // Obtener todos los teléfonos desde el modelo
        $telefonos = $this->telefonoModel->selectTelefonos();

        // Incluir la vista y pasar los datos de los teléfonos
        include 'app/view/listar-item.phtml';
    }

    // Método para agregar un nuevo teléfono (ítem)
    public function agregarItem()
    {
        // Si el formulario fue enviado (método POST), manejamos el envío de datos
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelo = $_POST['modelo'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            $categoria_id = $_POST['categoria_id'];

            // Llamamos al modelo para agregar el ítem (teléfono)
            $this->telefonoModel->addItem($modelo, $precio, $descripcion, $categoria_id);

            // Redirigimos al listado de ítems después de agregar
            header('Location: ' . BASE_URL . 'listar-item');
            exit();
        }

        // Si no se ha enviado el formulario, cargamos las categorías para el formulario
        $categorias = $this->categoriaModel->selectCategoria();

        // Incluir la vista para agregar el ítem, pasando las categorías
        include 'app/view/agregar-item.phtml';
    }

    // Método para mostrar el detalle de un teléfono
    public function mostrarDetalle($id)
    {
        // Obtener el teléfono por su ID
        $telefono = $this->telefonoModel->getTelefonoById($id);

        // Verificar si se encontró el teléfono
        if ($telefono) {
            // Incluir la vista y pasar los datos del teléfono
            include 'app/view/detalleTemplate.phtml';
        } else {
            echo "Teléfono no encontrado.";
        }
    }

    public function mostrarItemsPorCategoria($categoria_id)
    {
        // Obtener los teléfonos y la categoría desde el modelo
        $resultado = $this->telefonoModel->getTelefonosByCategoria($categoria_id);

        $telefonos = $resultado['telefonos'];
        $categoria = $resultado['categoria'];

        // Incluir la vista y pasar los datos
        include 'app/view/itemCategoria.phtml';
    }

    public function listarTelefonosPorCategoria($categoria_id)
    {
        // Obtener los teléfonos y la categoría desde el modelo
        $resultado = $this->telefonoModel->getTelefonosByCategoria($categoria_id);
        $telefonos = $resultado['telefonos'];
        $categoria = $resultado['categoria'];

        // Asegurarse de que tanto la categoría como los teléfonos están definidos
        if ($categoria && !empty($telefonos)) {
            include 'app/view/itemCategoria.phtml'; // Cargar la vista de los teléfonos
        } else {
            echo "No se encontraron teléfonos o categoría.";
        }
    }

    // Método para mostrar el formulario de edición de un teléfono
    public function editarItem($id)
    {
        // Obtener el teléfono por su ID
        $telefono = $this->telefonoModel->getItemById($id);
        $categorias = $this->categoriaModel->selectCategoria(); // Obtener las categorías disponibles

        // Verificar si se encontró el teléfono
        if ($telefono) {
            // Incluir la vista y pasar los datos del teléfono
            include 'app/view/editar-item.phtml';
        } else {
            echo "Teléfono no encontrado.";
        }
    }

    // Método para eliminar un ítem
    public function eliminarItem($id) {
        // Llamar al modelo para eliminar el ítem
        if ($this->telefonoModel->deleteItem($id)) {
            // Redirigir a la lista de ítems después de eliminar
            header("Location: " . BASE_URL . "listar-item");
            exit();
        } else {
            echo "Error al eliminar el ítem.";
        }
    }

    // Método para actualizar un teléfono
    public function actualizarItem($id)
    {
        // Verificar si se envió el formulario por POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelo = $_POST['modelo'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            $categoria_id = $_POST['categoria_id'];
            $img = $_POST['imagen'];

            // Llamar al modelo para actualizar el teléfono
            if ($this->telefonoModel->updateItem($id, $modelo, $precio, $descripcion, $categoria_id, $img)) {
                header("Location: " . BASE_URL . "listar-item");
                exit();
            } else {
                echo "Error al actualizar el teléfono.";
            }
        }
    }
}
