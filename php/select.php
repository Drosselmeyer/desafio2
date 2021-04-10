<?php

//Incluimos la conexion a la db
include("db_conn.php");

$query = "SELECT * FROM usuarios";
$st = $conn->prepare($query);
$st->execute();
//Obtener todos los resultqdos y los guarda en la variable
$rs = $st->fetchAll();
//Contamos las filas
$filas_totales= $st->rowCount();

//Generando nuestro return y vamos dibujando la tabla
$salida ='
    <table class="table table-striped table-bordered">
        <tr>
            <th>Nombre Completo</th>
            <th>Identificacion</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
';

if($filas_totales >0){
    foreach($rs as $fila){
        $salida .= '
        <tr>
            <td width="40%">'.$fila["nombre_completo"].'</td>
            <td width="40%">'.$fila["identificacion"].'</td>
            <td width="10%">
                <button type="button" name="edit" class="btn btn-primary btn-xs edit" id="'.$fila["idUsuarios"].'">Editar</button>
            </td>
            <td width="10%">
                <button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$fila["idUsuarios"].'">Borrar</button>
            </td>
        </tr>
        ';
    }
}
else{
    $salida .= '
        <tr>
            <td colspan="4" align="center">Informacion no encontrada</td>
        </tr>
    ';

}

$salida .= '</table>';

echo $salida;

?>