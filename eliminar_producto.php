<?php
session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.html");
    exit();
}

include 'conexion.php';

if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];
    $sql = "DELETE FROM productos WHERE id_producto = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_producto);

    if ($stmt->execute()) {
        header("Location: gestion_productos.php");
    } else {
        echo "Error al eliminar el producto.";
    }
}
?>
