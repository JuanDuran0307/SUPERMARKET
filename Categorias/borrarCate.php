<?php
    ini_set("display_errors" , 1);
    ini_set("display_startup_errors" , 1);
    error_reporting(E_ALL);

    require_once("configCate.php");
    $record = new Categorias();
    
    if (isset($_GET['id']) && isset($_GET['req'])){
        if ($_GET['req'] == "delete"){
            $record -> setId($_GET['id']);
            $record -> delete();
            echo "<script> alert('Datos Borrados Exitosamente'); document.location='../Categorias/categorias.php'</script>";
        }
    }
?>