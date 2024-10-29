# Sitio web de ventas de telefonos Xiaomi

## Descripción

Este proyecto diseña una base de datos y una aplicación web para una tienda de telefonos Xiaomi u Otros Dispositivos Mobiles, con el objetivo de almacenar y gestionar información sobre los Productos. Además, la aplicación permite realizar operaciones CRUD (Create, Read, Update y Delete) sobre los Telefonos y las Categorias.

## Diagrama de la Base de Datos

![Diagrama de la Base de Datos](/iConnect/iConnect-Diagrama.jfif)

## Estructura de la Base de Datos

### Tablas

- **Telefono**: Almacena las los telefonos Xiaomi
- **Categoria**: Almacena las categorias (Gama del producto)

### Relaciones

- Un Telefono puede tener una Categoria

## Funcionalidades de la Pagina

### Público

- **Inicio**: Los usuarios verán el listado actual de telefonos Xiaomi con su Precio (En pesos argentinos) y ademas de un botón para visualizar los detalles
- **Ver Detalle**: Cada telefono Xiaomi tiene su respectiva información. (Nombre del dispositivo - Foto - Descripción - Precio)
### Administrador

- **Autenticación**: El administrador webadmin tiene que iniciar sesion para modificar la base de datos desde la pagina
- **Gestión de Categorías**:
  - Listar, agregar, editar y eliminar categorías.
- **Gestión de Telefonos/Ítems**:
  - Listar, agregar, editar y eliminar ítems.

## Estructura

- **`app`**: Esta carpeta contiene las tres carpetas escenciales para su funcionamiento. Controller - Model - View.
- **`css`**: Contiene un archivo Style.css.
- **`templates`**: Contiene plantillas. Header.phtml - Footer.phtml.
- **`.htaccess`**: Archivo que muestra las URL Amigables.
- **`db_iconnect.sql`**: Base de Datos de la pagina.
- **`README.md`**: El archivo que esta leyendo en este momento.
- **`router.php/`**: Controlador principal de las URL y acciones del Usuario.

## Cómo Ejecutar el Proyecto

1. **Instalar XAMPP**: Este proyecto fue desarrollado usando XAMPP.
2. **Clonar el Repositorio**: Clona el repositorio en el directorio `htdocs` de XAMPP.
3. **Importar la Base de Datos**: Utiliza `phpMyAdmin` para importar el archivo `db_iconnect.sql` y crear la base de datos.
4. **Iniciar el Servidor**: Inicia Apache y MySQL desde el panel de control de XAMPP.
5. **Navegar a la Aplicación**: Accede a `http://localhost/iConnect/` en tu navegador para interactuar con la aplicación. :)

## Tecnologías Utilizadas

- **PHP**: Lenguaje de programación del lado del servidor.
- **MySQL**: Base de datos relacional para almacenar la información.
- **HTML/CSS**: Para el diseño y estructura de la interfaz de usuario.
- **XAMPP**: Entorno de servidor local para desarrollo.

## Consideraciones

- **Autenticación**: El acceso a las funcionalidades administrativas requiere autenticación. El usuario de prueba es `webadmin` con la contraseña `admin`.
- **Patrón MVC**: El proyecto sigue el patrón arquitectónico Modelo-Vista-Controlador para una mejor separación de responsabilidades y facilidad de mantenimiento.