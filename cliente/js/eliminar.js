//dato a eliminar usuario
function eliminar(id){
    $("#idEliminar").val(id);

}
//confimacion de eliminar el usuario
function siEleminar(){
    $.ajax({
        method:'delete',
        url:'http://localhost/apiRest/public/api/equipo/'+$('#idEliminar').val(),
        success:function(response){
            //si fue un exito
            if(response){
                swal("Exito", "Registro eliminado", "success");
                $("#ModalEliminar").modal("hide");
                //limpiamos la data table
                $('#datosEquipos').html("");
                //Mandamos a llamar a la peticion que lista todos los registros
                cargarDatosTabla();
            }
        },//error en la conexion
        error:function(){
            swal("Ocurrió un error de conexión", "Intente más tarde", "error");
        }
    })
}
