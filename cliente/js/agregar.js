
function agregarEquipo() {
    $.ajax({
        type: 'post',
        url:'http://localhost/apiRest/public/api/equipo',
        data: {
            Codigo:$('#Codigo').val(),
            Nombre:$('#Nombre').val(),
            Integrantes:$('#Integrantes').val(),
            Estado:$('#Estado').val(),
        },
        success: function (response) {
            if ((response.errors)) {
                setTimeout(function () {
                    swal("Ocurrió un error", "Revise los campos", "error");
                    $('#ModalAgregar').modal('show');
                }, 1000);
                if (response.errors.Codigo) {
                    $('#CodigoAdd').html('*'+response.errors.Nombre);
                }
                if (response.errors.Nombre) {
                    $('#NombreAdd').html('*'+response.errors.Nombre);
                }
                if (response.errors.Integrantes) {
                    $('#IntegrantesAdd').text('*'+response.errors.Integrantes);
                }
                if (response.errors.Estado) {
                    $('#EstadoAdd').text('*'+'Debe selecionar un estado');
                }

            } else {
               swal("Exito", "Registro creado satisfactoriamente!", "success");
                //limpiamos el modal de agregar
                $('#modalForm').trigger("reset");
                //limpiamos la data table
                $('#datosEquipos').html("");
                //Mandamos a llamar a la peticion que lista todos los registros
                cargarDatosTabla();

            }
        },
    });

}
