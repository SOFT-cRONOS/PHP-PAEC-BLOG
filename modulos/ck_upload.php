<?php
// Ruta donde se guardarán las imágenes cargadas
$uploadDir = '/opt/lampp/htdocs/PAEC/assets/img/images-post/';

// Si el directorio de carga no existe, créalo
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_FILES['upload']['error'] === UPLOAD_ERR_OK) {
    // Nombre original del archivo en la computadora del usuario
    $fileName = $_FILES['upload']['name'];
    
    // Ruta completa del archivo en el servidor
    $uploadFile = $uploadDir . $fileName;
    
    // Mover el archivo cargado al directorio de carga
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadFile)) {
        // URL de la imagen cargada
        $url = $uploadFile;
        
        // Crear una respuesta en formato JSON
        $response = [
            'uploaded' => 1,
            'fileName' => $fileName,
            'url' => $url
        ];
    } else {
        // Error al mover el archivo
        $response = [
            'uploaded' => 0,
            'error' => 'No se pudo mover el archivo al directorio de carga.'
        ];
    }
} else {
    // Error en la carga del archivo
    $response = [
        'uploaded' => 0,
        'error' => 'Error al cargar el archivo.'
    ];
}

// Devolver la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);