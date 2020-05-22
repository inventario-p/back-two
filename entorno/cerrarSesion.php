<?php
	ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/tmp'));
	ini_set('session.gc_probability', 1);
    session_start();
    
    unset($_SESSION['autenticado']);
    unset($_SESSION['idUsuario']);
    unset($_SESSION['idRol']);
    unset($_SESSION['idEmpresa']);
    unset($_SESSION['usuario']);
    unset($_SESSION['nombre']);
    unset($_SESSION['apellido']);
    unset($_SESSION['correo']);
    unset($_SESSION['imagen']);
    
    session_destroy();
    header('location: ../index.html');
?>
