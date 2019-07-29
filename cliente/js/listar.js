
//Esta función se carga al finalizar de cargar el html
$(document).ready(cargarDatosTabla);

function limpiar(){
    $(".inputs").val("");
    $(".select").val("0")
    $(".errors").html("")
}

//Funcion que realiza la peticion para cargar todos los datos de la tabla
function cargarDatosTabla(){
    $.ajax({
        method:'get',
        // url:'http://localhost/apiRest/public/api/equipo',
        url:'http://127.0.0.1:8000/api/equipo',
        success:listarEquipos,
        error:error
    });
}

function listarEquipos(response){
    response.forEach(element => {
        $('#datosEquipos').append('<tr>'
                                +'<td class="text-center">'+element.Codigo+'</td>'
                                +'<td class="text-center">'+element.Nombre+'</td>'
                                +'<td class="text-center">'+element.Integrantes+'</td>'
                                +'<td class="text-center">'+element.Estado+'</td>'
                                +'<td class="text-center">'
                                +'<button type="button" class="btn btn-warning" onclick="editarEquipo('+element.Codigo+')" data-toggle="modal" data-target="#ModalModificar">Modificar</button> | '
                                +'<button type="button" class="btn btn-danger" onclick="eliminar('+element.Codigo+')" data-toggle="modal" data-target="#ModalEliminar">Eliminar</button>'
                                +'</td>'+
                                +'</tr>');
    });
}

//funcion de error si falla la conexion
function error(e){
    swal("Falla en la conexión con el servidor", "Intentelo más tarde", "error");
}