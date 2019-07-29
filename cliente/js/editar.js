
//Peticion para cargar el registro a editar
function editarEquipo(Codigo){
    limpiar();
    $.ajax({
        method:'get',
        //url:'http://localhost/apiRest/public/api/equipo/'+$('#idEliminar').val(),
        url:'http://127.0.0.1:8000/api/equipo/'+Codigo+'/edit',
     
        success:function(response){
            $("#CodigoM").val(response.Codigo);
            $("#NombreM").val(response.Nombre);
            $("#IntegrantesM").val(response.Integrantes);
            $("#EstadoM").val(response.Estado);
        }
        
    })
}

//funcion para ejecutar la peticion de actualizar el registro
function modificarEquipo(){
    $.ajax({
        method:'patch',
        //url:'equipo/'+$('#CodigoM').val(),
        url:'http://127.0.0.1:8000/api/equipo/'+$('#CodigoM').val(),
        data:{
            Codigo:$("#CodigoM").val(),
            Nombre:$("#NombreM").val(),
            Integrantes:$("#IntegrantesM").val(),
            Estado:$("#EstadoM").val(),
        },
        success: function (response) {
            if ((response.errors)) {
                setTimeout(function () {
                    swal("Ocurrió un error", "Revise los campos", "error");
                    $('#ModalModificar').modal('show');
                }, 1000);
                if (response.errors.Codigo) {
                    $('#CodigoMod').html('*'+response.errors.Codigo);
                }
                if (response.errors.Nombre) {
                    $('#NombreMod').html('*'+response.errors.Nombre);
                }
                if (response.errors.Integrantes) {
                    $('#IntegrantesMod').text('*'+response.errors.Integrantes);
                }
                if (response.errors.Estado) {
                    $('#EstadoMod').text('*'+response.errors.Estado);
                }

            } else {
               swal("Exito", "Registro actualizado satisfactoriamente!", "success");
                //limpiamos el modal de editar
                $('#modaledit').trigger("reset");
                //limpiamos la tabla
                $('#datosEquipos').html("");
                //Mandamos a llamar a la peticion que lista todos los registros
                cargarDatosTabla();

            }
        },
        error:function(error){
            swal("Ocurrió un error de conexión", "Intente más tarde", "error");
        }
    })
}
