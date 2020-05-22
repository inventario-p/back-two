<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/tmp'));
ini_set('session.gc_probability', 1);
session_start();
require_once("../entorno/Conexion.php");
$retorno = array("exito"=>1,"mensaje"=>"", "menu"=>null);
try{
    $formulario = $_REQUEST['fbeFormulario'];
    $idRol = $_SESSION['idRol'];
    //($formulario == "fbeGraficas.html") ? "" : "".
    switch($formulario){
        case "fbeGraficas.html":
            $active1 = "active";
        break;
        case "fbeAnexosEmpresa.html":
            $active2 = "active";
        break;
        case "fbeMantenimiento.html":
            $active3 = "active";
        break;
        case "fbeEquipo.html":
            $active4 = "active";
        break;
        case "fbePersona.html":
            $active5 = "active";
        break;
        case "fbeUsuario.html":
            $active6 = "active";
        break;
        case "fbeEmpleado.html":
            $active7 = "active";
        break;
        case "fbeRol.html":
            $active8 = "active";
        break;
        case "fbeEmpresa.html":
            $active9 = "active";
        break;
        case "fbeMantenimientosProgramados.html":
            $active10 = "active";
        break;
    }
    $menu = '
            <ul class="list">
                <li class="header"></li>
                <li class="active">
                    <a href="frmPrimerPantallazo.html">
                        <i class="material-icons md-36">home</i>
                        <span style="font-size: 19px;">Inicio</span>
                    </a>
                </li>
                <li class="header">Administrar</li>
                <li class="'.$active1.'">
                    <a href="fbeGraficas.html">
                        <i class="material-icons md-36 col-gray">timeline</i>
                        <span style="font-size: 19px;">Estadisticas</span>
                    </a>
                </li>
                <li class="'.$active2.'">
                    <a href="fbeAnexosEmpresa.html">
                        <i class="material-icons md-36 col-red">build</i>
                        <span style="font-size: 19px;">Anexos Empresa</span>
                    </a>
                </li>
                <li class="'.$active3.'">
                    <a href="fbeMantenimiento.html">
                        <i class="material-icons md-36 col-red">build</i>
                        <span style="font-size: 19px;">Mantenimientos</span>
                    </a>
                </li>
                <li class="'.$active4.'">
                    <a href="fbeEquipo.html">
                        <i class="material-icons md-36 col-amber">camera</i>
                        <span style="font-size: 19px;">Equipos</span>
                    </a>
                </li>
                <li class="'.$active5.'">
                    <a href="fbePersona.html">
                        <i class="material-icons md-36 col-light-blue">accessibility</i>
                        <span style="font-size: 19px;">Personas</span>
                    </a>
                </li>
                <li class="'.$active6.'">
                    <a href="fbeUsuario.html">
                        <i class="material-icons md-36 col-amber">person</i>
                        <span style="font-size: 19px;">Usuarios</span>
                    </a>
                </li>
                <li class="'.$active7.'">
                    <a href="fbeEmpleado.html">
                        <i class="material-icons md-36 col-red">work</i>
                        <span style="font-size: 19px;">Empleados</span>
                    </a>
                </li>
                <li class="'.$active8.'">
                    <a href="fbeRol.html">
                        <i class="material-icons md-36 col-light-blue">people</i>
                        <span style="font-size: 19px;">Roles</span>
                    </a>
                </li>
                <li class="'.$active9.'">
                    <a href="fbeEmpresa.html">
                        <i class="material-icons md-36 col-green">store</i>
                        <span style="font-size: 19px;">Empresas</span>
                    </a>
                </li>
                <li class="'.$active10.'">
                    <a href="fbeMantenimientosProgramados.html">
                        <i class="material-icons md-36 col-light-blue">timer</i>
                        <span style="font-size: 19px;">Mantenimientos Programados</span>
                    </a>
                </li>
            </ul>';

    $menu1 = '
            <ul class="list">
                <li class="header"></li>
                <li class="active">
                    <a href="frmPrimerPantallazoUser.html">
                        <i class="material-icons md-36">home</i>
                        <span style="font-size: 19px;">Inicio</span>
                    </a>
                </li>
                <li class="header">Administrar</li>
                <li class="'.$active1.'">
                    <a href="fbeGraficasUser.html">
                        <i class="material-icons md-36 col-gray">timeline</i>
                        <span style="font-size: 19px;">Estadisticas</span>
                    </a>
                </li>
                <li class="'.$active2.'">
                    <a href="fbeAnexosEmpresaUser.html">
                        <i class="material-icons md-36 col-red">build</i>
                        <span style="font-size: 19px;">Anexos Empresa</span>
                    </a>
                </li>
                <li class="'.$active3.'">
                    <a href="fbeMantenimientoUser.html">
                        <i class="material-icons md-36 col-red">build</i>
                        <span style="font-size: 19px;">Mantenimientos</span>
                    </a>
                </li>
                
            </ul>';

    if($idRol == "2"){
        $retorno['menu'] = $menu1;
    }else{
        $retorno['menu'] = $menu;
    }
}catch(Exception $e){
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $e->getMessage();
}
echo json_encode($retorno);
?>