<?php
// Funciones conexion
 require_once 'conect.php'; 
 
function openConexORIG(){
    $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
    return $conn;
}    

function openConex(){
    $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);

    // Verificar si hay errores de conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Establecer la codificación de caracteres a UTF-8
    $conn->set_charset("utf8");

    return $conn;
}

// geters de contenido
function getPosts()
{
    $mysqli = openConex();

    // Utilizar una sentencia preparada
    // $stmt = $mysqli->prepare("SELECT * FROM post ORDER BY id DESC");
    $stmt = $mysqli -> prepare("SELECT p.id, p.title, p.sinopsis, p.content, p.date, p.image_url, a.nick AS nick, c.nombre AS categoria
                                FROM post p
                                INNER JOIN autor a ON p.id_autor = a.id_autor
                                INNER JOIN categorias c ON p.id_categoria = c.id_categoria
                                ORDER BY p.id DESC
                                LIMIT 30;"); 
                                // limita a los 30 primeros registros

    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();

    return $result;
}
 
function getPostByIdoriginal($id)
{
    $mysqli = openConex();
    $result = $mysqli->query('SELECT date, title, content, author FROM post WHERE id ='.$id);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getPostById($id)
{
    $mysqli = openConex();

    // Utilizar una sentencia preparada
    // $stmt = $mysqli->prepare("SELECT * FROM post WHERE id = ?");
    $stmt = $mysqli -> prepare("SELECT p.id, p.title, p.sinopsis, p.content, p.date, p.image_url, a.nick AS nick, c.nombre AS categoria
                                FROM post p
                                INNER JOIN autor a ON p.id_autor = a.id_autor
                                INNER JOIN categorias c ON p.id_categoria = c.id_categoria
                                WHERE id = ?
                                ORDER BY p.id DESC");

    $stmt->bind_param("i", $id); // "i" indica que el parámetro es un entero

    $stmt->execute();
    $result = $stmt->get_result();

    $row = $result->fetch_assoc();

    $stmt->close();

    return $row;
}
 

function getUltiPost()
{
    $mysqli = openConex();

    // Obtener el post más reciente
    // $query = "SELECT * FROM post ORDER BY date DESC LIMIT 1";
    $stmt = $mysqli -> prepare("SELECT p.id, p.title, p.sinopsis, p.content, p.date, p.image_url, a.nick AS nick, c.nombre AS categoria
                                FROM post p
                                INNER JOIN autor a ON p.id_autor = a.id_autor
                                INNER JOIN categorias c ON p.id_categoria = c.id_categoria
                                ORDER BY date DESC LIMIT 1");

    $stmt->execute();
    
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
        return $post;
    } else {
        return null; // No se encontraron posts
    }

    // Cerrar la conexión
    $stmt->close();
    
}

function getPostsByCategory($category)
{
    $mysqli = openConex();

    // Utilizar una sentencia preparada
    // $stmt = $mysqli->prepare("SELECT * FROM post WHERE categoria = ?");
    $stmt = $mysqli -> prepare("SELECT p.id, p.title, p.sinopsis, p.content, p.date, p.image_url, a.nick AS nick, c.nombre AS categoria
                                FROM post p
                                INNER JOIN autor a ON p.id_autor = a.id_autor
                                INNER JOIN categorias c ON p.id_categoria = c.id_categoria
                                WHERE c.nombre = ?
                                ORDER BY date DESC LIMIT 1");
    $stmt->bind_param("s", $category); // "s" indica que el parámetro es una cadena

    $stmt->execute();
    $result = $stmt->get_result();

    $posts = array();

    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }

    $stmt->close();

    return $posts;
}

function getCategorias()
{
    $mysqli = openConex();

    $stmt = $mysqli->prepare("SELECT nombre, detalle FROM categorias");

    $stmt->execute();

    $result = $stmt->get_result();

    $stmt->close();

    return $result;

}


function getEmpresa()
{
    $conn = openConex();

    $stmt = $conn->prepare("SELECT * FROM empresa");

    $stmt->execute();

    $result = $stmt->get_result();

    $datos = $result->fetch_assoc();
    $stmt->close();

    return $datos;
}

function getTagsPost($tags){

    // Conexión a la base de datos (reemplaza con tus detalles)
    $mysqli = openConex();

    // Consulta para obtener los IDs de los posts que coinciden con los tags
    // separo por comas
    $tagsArray = explode(" ", $tags);
    // a cada elemento del array con trim elimina los espacios en blanco
    $tagsArray = array_map('trim', $tagsArray);
    // toma el array de placeholders y lo combina en una cadena usando la coma como separador y lo usa en la consulta
    $placeholders = implode(",", array_fill(0, count($tagsArray), "?"));
    $stmt = $mysqli->prepare("SELECT DISTINCT pt.post_id FROM post_tags pt
                              JOIN tags t ON pt.tag_id = t.id
                              WHERE t.name IN ($placeholders)");

    $stmt->bind_param(str_repeat("s", count($tagsArray)), ...$tagsArray);
    $stmt->execute();
    $result = $stmt->get_result();

    $postIds = [];
    while ($row = $result->fetch_assoc()) {
        $postIds[] = $row['post_id'];
    }

    // Consulta para obtener los detalles de los posts filtrados
    $filteredPosts = [];
    if (!empty($postIds)) {
        $placeholders = implode(",", array_fill(0, count($postIds), "?"));
        $stmt = $mysqli->prepare("SELECT * FROM post WHERE id IN ($placeholders)");
        $stmt->bind_param(str_repeat("i", count($postIds)), ...$postIds);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $filteredPosts[] = $row;
        }
    }


    $post = $result->fetch_assoc();
    return $filteredPosts;

}


function getTagsByPost($post){
    $mysqli = openConex();

    $stmt = $mysqli->prepare(
        "SELECT t.name 
         FROM post_tags 
         INNER JOIN tags t ON post_tags.tag_id = t.id
         WHERE post_tags.post_id = ?"
    );

    $stmt->bind_param('i', $post);

    $stmt->execute();

    $result = $stmt->get_result();

    $tags = array(); // Inicializar el array

    while ($row = $result->fetch_assoc()) {
        $tags[] = $row['name']; // Guardar solo el nombre de la etiqueta
    }

    return $tags;
}

function setNTags($tags_list){
    //conexión a la base de datos
    $conn  = openConex();

    // Obtener los tags ingresados por el usuario desde el input (supongamos que están separados por comas)
    $tags_input = $_POST["tags"]; // Asegúrate de que el nombre del campo coincida con tu formulario
    #separa el str por la coma
    $tags_list = explode(',', $tags_input);

    // Recorrer la lista de tags ingresados
    foreach ($tags_list as $tag_name) {
        // Escapar el nombre del tag para evitar SQL injection
        $tag_name = mysqli_real_escape_string($conn, trim($tag_name));

        // Verificar si el tag ya existe en la tabla tags
        $sql = "SELECT id FROM tags WHERE name = '$tag_name'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // El tag ya existe, obtener su id
            $row = $result->fetch_assoc();
            $tag_id = $row["id"];
        } else {
            // El tag no existe, insertarlo en la tabla tags y obtener su id
            $sql = "INSERT INTO tags (name) VALUES ('$tag_name')";
            if ($conn->query($sql) === TRUE) {
                $tag_id = $conn->insert_id;
            } else {
                echo "Error al insertar el tag: " . $conn->error;
                continue; // Continuar con el siguiente tag si hay un error
            }
        }

        // Crear la relación en la tabla post_tags (reemplaza 1 con el ID del nuevo post)
        $post_id = 1;
        $sql = "INSERT INTO post_tags (post_id, tag_id) VALUES ($post_id, $tag_id)";
        if ($conn->query($sql) !== TRUE) {
            echo "Error al crear la relación: " . $conn->error;
        }
    }

    // Cerrar la conexión
    $conn->close();
}


// Fin geters de contenido

// Metodos POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Registro de vicitas, clicks
        if (isset($_POST["accion"]) && $_POST["accion"] == "guardar_fecha") {

            $fecha = $_POST["fecha"];        
            $navegador = $_POST["navegador"];
            $token = $_POST["token"];
            $os = $_POST["os"];
            $link = $_POST["link"];

            $mysqli = openConex();

            $stmt = $mysqli->prepare("INSERT INTO historial (fecha, navegador, token, os, link) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $fecha, $navegador, $token, $os, $link);
            
            if ($stmt->execute()) {
                echo "Vista registrada correctamente";
            } else {
                echo "Error al registcxcrar la vista";
            }

            $stmt->close();
            $mysqli->close();

            // registro de visitante en la base de datos
        
        };
    // FIN Registro de vicitas, clicks

    // Registro de nuevo vicitante (uso de cookies token)
        if (isset($_POST["accion"]) && $_POST["accion"] == "reg_visitor") {
            $fecha = $_POST["fecha"];
            $token = $_POST["token"];

            $mysqli = openConex();
            
            $stmt = $mysqli->prepare("INSERT INTO visitantes (token, fecha) VALUES (?, ?)");
            $stmt->bind_param("ss", $token, $fecha);
            
            if ($stmt->execute()) {
                echo "visitante registrada correctamente";
            } else {
                echo "Error al registrar al visitante";
            }

            $stmt->close();
            $mysqli->close();
        }
    // FIN Registro de nuevo vicitante (uso de cookies token)
}


// Metodos GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    // Validacion de token no funciona, deberia entregar un dato"
        if (isset($_GET["accion"]) && $_GET["accion"] === "val_token") {

            // Recuperar el token enviado desde el cliente
            $token = $_POST["token"];

            $mysqli = openConex();

            $stmt = $mysqli->prepare("SELECT * FROM visitantes WHERE token = ?");
            $stmt->bind_param("s", $token);
            
            $stmt->execute();

            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }

            // Devolver los datos en formato JSON
            echo json_encode($filas);

            $stmt->close();
            $mysqli->close();


        } elseif (isset($_GET["accion"]) && $_GET["accion"] === "get_cat") {
            echo json_encode("hola");
            $mysqli = openConex();
    
            $stmt = $mysqli->prepare("SELECT nombre FROM categorias");
        
            $stmt->execute();
        
            $result = $stmt->get_result();
    
            $filas = array(); // Inicializar el arreglo
    
            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }
    
            // Devolver los datos en formato JSON
            echo json_encode($filas);
    
            $stmt->close();
            $mysqli->close();

        } elseif (isset($_GET["accion"]) && $_GET["accion"] === "get_categorias") {
            // devuelve las categorias al js
            $result = getCategorias();

            if ($result->num_rows > 0) {
                $categorias = array();
                while ($row = $result->fetch_assoc()) {
                    $categorias[] = $row;
                }
                echo json_encode($categorias); // Devolver las categorías en formato JSON
            } else {
                echo json_encode([]); // Devolver un array vacío si no hay categorías
            }
        }
    // FIN Validacion de token no funciona, deberia entregar un dato"
}
?>