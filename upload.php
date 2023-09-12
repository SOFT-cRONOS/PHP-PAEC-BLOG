<!DOCTYPE html>
<html>
<head>
    <title>Subir Imagen</title>
</head>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $mensaje = ''; // Variable para almacenar mensajes

    if (isset($_POST['submit'])) {
        // Verificar si se ha enviado un archivo
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $nombre_archivo = $_FILES['imagen']['name'];
            $tipo_archivo = $_FILES['imagen']['type'];
            $tamaño_archivo = $_FILES['imagen']['size'];
            $archivo_temporal = $_FILES['imagen']['tmp_name'];

            // Directorio de destino para subir la imagen
            $directorio_destino = '/opt/lampp/htdocs/PAEC/assets/img/images-post/';

            // Comprobar si el tipo de archivo es una imagen
            $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
            if (in_array($tipo_archivo, $allowed_types)) {
                // Mover el archivo desde la ubicación temporal al directorio de destino
                $ruta_destino = $directorio_destino . $nombre_archivo;
                if (move_uploaded_file($archivo_temporal, $ruta_destino)) {
                    $mensaje = 'La imagen se ha subido correctamente.';
                } else {
                    $mensaje = 'Ha ocurrido un error al subir la imagen.';
                }
            } else {
                $mensaje = 'Solo se permiten archivos JPEG, PNG y GIF.';
            }
        } else {
            $mensaje = 'Por favor, selecciona un archivo para subir.';
        }
    }
    ?>

    <h1>Subir una imagen</h1>
    <p><?php echo $mensaje; ?></p>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="imagen" accept="image/*" />
        <input type="submit" name="submit" value="Subir Imagen" />
    </form>
</body>
</html>