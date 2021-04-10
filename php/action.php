<?php

//Incluimos la conexion a la base de datos
include("db_conn.php");

if(isset($_POST["accion"]))
{
    if($_POST["accion"] == "insertar")
    {
        $query = "INSERT INTO usuarios(nombre_completo,identificacion) 
                  VALUES ('".$_POST["nombre_completo"]."','".$_POST["identificacion"]."')";

        $st = $conn->prepare($query);
        $st->execute();

        echo '<p>Usuario agregado</p>';

    }

    if($_POST["accion"] == "select_unico")
    {
        $query = "SELECT * FROM usuarios WHERE idUsuario='".$_POST["idUsuario"]."'" ;

        $st = $conn->prepare($query);
        $st->execute();

        $rs = $st->fetchAll();

        foreach($rs as $fila){
            $salida['nombre_completo'] = $fila['nombre_completo'];
            $salida['identificacion']  = $fila['identificacion'];
        }

        echo json_encode($salida);

    }

    if($_POST["accion"] == "actualizar")
    {
        $query = "UPDATE usuarios SET
                  nombre_completo = '".$_POST["nombre_completo"]."',
                  identificacion = '".$_POST["identificacion"]."'
                  WHERE id = '".$_POST["idUsuario"]."'";

        $st = $conn->prepare($query);
        $st->execute();

        echo '<p>Usuario actualizado</p>';

    }

    if($_POST["accion"] == "eliminar")
    {
        $query = "DELETE FROM usuarios
                  WHERE id = '".$_POST["idUsuario"]."'";

        $st = $conn->prepare($query);
        $st->execute();

        echo '<p>Usuario eliminado</p>';

    }


}



?>