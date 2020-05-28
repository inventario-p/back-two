<?php
	ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/tmp'));
	ini_set('session.gc_probability', 1);
    header("Access-Control-Allow-Origin: *");

    session_start();

    unset($_SESSION['autenticado']);
    unset($_SESSION['nombre']);
    unset($_SESSION['identificacion']);
    unset($_SESSION['mail']);
    unset($_SESSION['usuario']);
    
    session_destroy();
    header('location: ../');
?>
