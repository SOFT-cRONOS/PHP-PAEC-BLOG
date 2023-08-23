<?php
// model.php
  
 require_once 'conect.php'; 
 
  
function openConex(){
    $conn=new mysqli(DBHOST, DBUSER, DBPWD, DBNAME); 
    return $conn;
}    
  
function getPosts()
{
    $mysqli = openConex();

    // Utilizar una sentencia preparada
    $stmt = $mysqli->prepare("SELECT * FROM post ORDER BY id DESC");

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
    $stmt = $mysqli->prepare("SELECT * FROM post WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" indica que el parámetro es un entero

    $stmt->execute();
    $result = $stmt->get_result();

    $row = $result->fetch_assoc();

    $stmt->close();

    return $row;
}
 

function getUltiPost()
{
    $conn = openConex();

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener el post más reciente
    $query = "SELECT * FROM post ORDER BY date DESC LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
        return $post;
    } else {
        return null; // No se encontraron posts
    }

    // Cerrar la conexión
    $conn->close();
    
}

function getPostsByCategory($category)
{
    $mysqli = openConex();

    // Utilizar una sentencia preparada
    $stmt = $mysqli->prepare("SELECT * FROM post WHERE categoria = ?");
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

?>