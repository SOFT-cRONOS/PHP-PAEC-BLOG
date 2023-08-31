<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'conect.php'; // Incluye tu archivo de conexión a la base de datos
// lee si se le envia un post o get

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se envió la acción "guardar_fecha"
    if (isset($_POST["accion"]) && $_POST["accion"] === "guardar_fecha") {


        $fecha = $_POST["fecha"];
        $navegador = $_POST["navegador"];
        $ip = $_POST["ip"];
        $os = $_POST["os"];
        $link = $_POST["link"];

        $mysqli = openConex();
        $stmt = $mysqli->prepare("INSERT INTO historial (fecha, navegador, ip, os, link) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fecha, $navegador, $ip, $os, $link);
        
        if ($stmt->execute()) {
            echo "Visita registrada correctamente";
        } else {
            echo "Error al registrar la visita";
        }

        $stmt->close();
        $mysqli->close();

    } else {
        // Si la acción no es "guardar_fecha", manejar otras acciones aquí
        // ...
    }
}
?>
