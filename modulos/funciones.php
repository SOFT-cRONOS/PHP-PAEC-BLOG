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

?>