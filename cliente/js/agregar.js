
//Función para agregar un nuevo registro
function agregarEquipo() {
    $.ajax({
        type: 'post',
        //url:'http://localhost/apiRest/public/api/equipo',
        url:'http://127.0.0.1:8000/api/equipo',
        data: {
            Codigo:$('#Codigo').val(),
            Nombre:$('#Nombre').val(),
            Integrantes:$('#Integrantes').val(),
            Estado:$('#Estado').val(),
        },
        success: function (response) {
            //Validamos los posibles errores
            if ((response.errors)) {
                setTimeout(function () {
                    swal("Ocurrió un error", "Revise los campos", "error");
                    $('#ModalAgregar').modal('show');
                }, 1000);
                if (response.errors.Codigo) {
                    $('#CodigoAdd').html('*'+response.errors.Codigo);
                }
                if (response.errors.Nombre) {
                    $('#NombreAdd').html('*'+response.errors.Nombre);
                }
                if (response.errors.Integrantes) {
                    $('#IntegrantesAdd').text('*'+response.errors.Integrantes);
                }
                if (response.errors.Estado) {
                    $('#EstadoAdd').text('*'+response.errors.Estado);
                }

            } else {
               swal("Exito", "Registro creado satisfactoriamente!", "success");
                //limpiamos los campos del modal de agregar
                $('#modalForm').trigger("reset");
                //limpiamos la tabla
                $('#datosEquipos').html("");
                //Mandamos a llamar a la peticion que lista todos los registros
                cargarDatosTabla();

            }
        },
        error:function(){
            swal("Ocurrió un error de conexión", "Intente más tarde", "error");
        }
    });

}
