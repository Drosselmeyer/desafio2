$(document).ready(function(){

    load_usuarios();

    function load_usuarios()
    {
        $.ajax({
            url:"http://localhost:3000/Semana 11/Ejemplo DSSAjax/php/select.php",
            method: "POST",
            success: function(data)
            {
                $('#datos_usuarios').html(data);
            }
        })
    }

    $("#dialogo_usuario").dialog({
        autoOpen:false,
        width:400
    });

    $('#agregar').click(function(){
        $('#dialogo_usuario').attr('title','Agregar Usuario');
        $('#accion').val('insertar');
        $('#form_action').val('Insertar');
        $('#formulario_usuarios')[0].reset();
        $('#form_action').attr('disabled',false);
        $('#dialogo_usuario').dialog('open');
    });

    $('#formulario_usuarios').on('submit',function(event){
        event.preventDefault();
        var error_nombre_completo = '';
        var error_identificacion = '';

        //Validar el nombre
        if($('#nombre_completo').val() == '')
        {
            error_nombre_completo = 'El nombre es requerido';
            $('#error_nombre_completo').text(error_nombre_completo);
            $('#nombre_completo').css('border-color','#cc0000');
        }
        else
        {
            error_nombre_completo = '';
            $('#error_nombre_completo').text(error_nombre_completo);
            $('#nombre_completo').css('border-color','');
        }

         //Validar la identificacion
         if($('#identificacion').val() == '')
         {
             error_identificacion = 'La identificacion es requerida';
             $('#error_identificacion').text(error_identificacion);
             $('#identificacion').css('border-color','#cc0000');
         }
         else
         {
            error_identificacion = '';
            $('#error_identificacion').text(error_identificacion);
            $('#identificacion').css('border-color','');
         }

         if(error_nombre_completo != '' || error_identificacion != '')
         {
             return false;
         }
         else
         {
            $('#form_action').attr('disabled','disabled');
            var datos_form = $(this).serialize();
            
            $.ajax({
                url:"http://localhost:3000/Semana 11/Ejemplo DSSAjax/php/action.php",
                method: "POST",
                data: datos_form,
                success: function(data){
                    $('#dialogo_usuario').dialog('close');
                    $('#alerta_accion').html(data);
                    $('#alerta_accion').dialog('open');

                    load_usuarios();
                    $('#form_action').attr('disabled',false);

                }
            })
         }

    });

    $('#alerta_accion').dialog({
        autoOpen: false
    });

    //Al dar clic en el boton editar busca en la clase edit
    $(document).on('click', '.edit', function(){
		var id = $(this).attr('id'); //Obtiene el id de la columna que creamos
		var action = 'select_unico';
		$.ajax({
			url:"http://localhost:3000/Semana 11/Ejemplo DSSAjax/php/action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#nombre_completo').val(data.nombre_completo);
				$('#identificacion').val(data.identificacion);
				$('#dialogo_usuario').attr('title', 'Editar datos');
				$('#accion').val('Actualizar');
				$('#idUsuario').val(id);
				$('#form_action').val('actualizar');
				$('#dialogo_usuario').dialog('open');
			}
		});
	});

    //Al dar clic en el boton eliminar
    $('#confirmacion_borrar').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var id = $(this).data('id');
				var action = 'eliminar';
				$.ajax({
					url:"http://localhost:3000/Semana 11/Ejemplo DSSAjax/php/action.php",
					method:"POST",
					data:{id:id, action:action},
					success:function(data)
					{
						$('#confirmacion_borrar').dialog('close');
						$('#alerta_accion').html(data);
						$('#alerta_accion').dialog('open');
						load_data();
					}
				});
			},
			Cancel : function(){
				$(this).dialog('close');
			}
		}	
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		$('#confirmacion_borrar').data('id', id).dialog('open');
	});

});