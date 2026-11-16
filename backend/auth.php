<?php
function tienePermiso($permiso) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Si no hay permisos en sesión, denegamos todo por seguridad
    if (!isset($_SESSION['usuario_permisos']) || empty($_SESSION['usuario_permisos'])) {
        return false;
    }

    // Convertimos la cadena "ver_ordenes,cobrar" en un arreglo
    $permisos_usuario = explode(',', $_SESSION['usuario_permisos']);
    
    // Limpiamos espacios en blanco por si acaso
    $permisos_usuario = array_map('trim', $permisos_usuario);

    return in_array($permiso, $permisos_usuario);
}
?>