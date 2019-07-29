//Se carga el id del registro a eliminar
function eliminar(id){
    $("#idEliminar").val(id);

}
//confimacion de eliminar el usuario
function borrar(){
    $.ajax({
        method:'delete',
        //url:'http://localhost/apiRest/public/api/equipo/'+$('#idEliminar').val(),
        url:'http://127.0.0.1:8000/api/equipo/'+$('#idEliminar').val(),
        success:function(response){
           
            if(response){
                swal("Exito", "Registro eliminado", "success");
                $("#ModalEliminar").modal("hide");
                //se limpia la tabla
                $('#datosEquipos').html("");
                //Mandamos a llamar a la peticion que lista todos los registros
                cargarDatosTabla();
            }
        },
        error:function(){
            swal("Ocurrió un error de conexión", "Intente más tarde", "error");
        }
    })
}
