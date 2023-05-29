<?php
    ini_set("display_errors" , 1);
    ini_set("display_startup_errors" , 1);
    error_reporting(E_ALL);
    echo "<script> alert('Los Datos Fueron Registrados Satisfactoriamente'); document.location='categorias.php'</script>";

    if (isset($_POST['guardar'])){
        require_once("configCate.php");

        $config = new Categorias();

        $config -> setImagen($_POST['imagen']);
        $config -> setNombres($_POST['nombres']);
        $config -> setDescripcion($_POST['descripcion']);
        

        $config -> insertData();

        echo "<script> alert('Los Datos Fueron Registrados Satisfactoriamente'); document.location='categorias.php'</script>";
    }
?>