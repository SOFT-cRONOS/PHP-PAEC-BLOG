<?php
// model.php
  
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


function getTagsbypost($post){
    $mysqli = openConex();

    $stmt = $mysqli-> prepare(
                            "SELECT t.name 
                            FROM post_tags 
                            INNER JOIN tags t ON post_tags.tag_id = t.id
                            WHERE post_tags.post_id = $post"
                            );

    $stmt->execute();

    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $tags[] = $row;
    }

    return $tags;

}
?>