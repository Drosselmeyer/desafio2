<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery.min.js"></script>  
    <script src="js/jquery-ui.js"></script>
    <title>Ejemplo DSS Ajax y JQuery UI</title>
</head>
<body>
    <div class="container">
        <br>
        <h3 align="center">Registro de usuarios con PHP, Ajax y Jquery UI </h3>
        <br>
    
        <div align="right" style="margin-bottom:5px">
            <button type="button" name="agregar" id="agregar" class="btn btn-success btn-xs"> Agregar </button>
        </div>

        <div class="tabla-responsiva" id="datos_usuarios">
        
        </div>

    </div>

    <div id="dialogo_usuario" title="Agregar información">
    
        <form method="post" id="formulario_usuarios">
            <div class="form-group">
                <label>Ingrese el nombre completo</label>
                <input type="text" name="nombre_completo" id="nombre_completo" class="text-danger"/>
                <span id="error_nombre_completo" class="text-danger"></span>
            </div>

            <div class="form-group">
                <label>Ingrese la identificacion</label>
                <input type="text" name="identificacion" id="identificacion" class="text-danger"/>
                <span id="error_identificacion" class="text-danger"></span>
            </div>

            <div class="form-group">
                <input type="hidden" name="accion" id="accion" value="insertar"/>
                <input type="hidden" name="idUsario" id="idUsuario" />
                <input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insertar" />
            </div>

        </form>

    </div>

    <div id="alerta_accion" title="Accion">
    
    </div>

    <div id="confirmacion_borrar" title="Confirmacion">
        <p>¿Estas seguro que deseas borrar esta información?</p>
    </div>
</body>

<script src="js/funcionalidad.js"></script>

</html>