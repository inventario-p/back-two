<?php
$retorno = array('exito'=>1,'mensaje'=>'El archivo se subió correctamente','ruta'=>'');
foreach ($_FILES as $key){
    $nombre = $key['name'];
    $temporal = $key['tmp_name'];
    $tamano = $key['size'];
    $extension = substr(strrchr($nombre, "."), 1);
    $nombreArchivo = substr($nombre, 0, 6); 
    
    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
    $numerodeletras=5; //numero de letras para generar el texto
    $cadena = ""; //variable para almacenar la cadena generada
    for($i=0;$i<$numerodeletras;$i++){
        $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
        entre el rango 0 a Numero de letras que tiene la cadena */
    }

    $ruta = '../archivos/mantenimiento/'.$cadena.'.'.$extension;

    //$retorno['ruta'] = "https://www.publikya.com/webdisfrutar.co/admin/Appmovil/imagenesApp/ofertas/".$cadena.'.'.$extension;
    $retorno['ruta'] = $cadena.'.'.$extension;
    
    if($extension == 'pdf'){
        if(!move_uploaded_file($temporal, $ruta)){
            $retorno['exito'] = 0;
            $retorno['mensaje'] = '!Ocurrió un error subiendo el archivo! Vuelva a intentarlo ó verifique la extensión del archivo';
        } 
    }else{
        $retorno['exito'] = 0;
        $retorno['mensaje'] = 'Extensión inválida. el archivo debe estar en formato pdf.';
    }
}
echo json_encode($retorno);
?>