$(document).ready(function() {
	Carga();
});

function Carga(){
	var tablaDatos = $('#datos');
	var route = 'http://localhost:8000/generos';

	$('#datos').empty();
	$.get(route, function(res){
		$(res).each(function(key, value){
			tablaDatos.append("<tr><td>"+value.genre+"</td><td><button value="+value.id+" class='btn btn-primary open-modal' data-toggle='modal' data-target='#modal' onClick='Mostrar(this)'>Editar</button> <button value="+value.id+" class='btn btn-danger' onClick='Eliminar(this)'>Eliminar</button></td></tr>");
		});
	});
}

function Mostrar(btn)
{
	var route = 'http://localhost:8000/genero/'+btn.value+'/edit';

	$.get(route, function(value){
		$('#genre').val(value.genero);
		$('#id').val(value.id);
	});
}

function Eliminar(btn)
{
	var route = 'http://localhost:8000/genero/'+btn.value+'';
	var token = $('#token').val();

	$.ajax({
		url : route,
		headers : {'X-CSRF-TOKEN': token},
		type : 'DELETE',
		dataType: 'json',
		success: function(res){
			Carga();
			$('#msg-delete').fadeIn();
		}
	});
}

$('#actualizar').click(function(){
	var value = $('#id').val();
	var dato = $('#genre').val();
	var route = 'http://localhost:8000/genero/'+value+'';
	var token = $('#token').val();

	$.ajax({
		url : route,
		headers : {'X-CSRF-TOKEN': token},
		type : 'PUT',
		dataType: 'json',
		data : {genre: dato},
		success: function(){
			Carga();
			$('#myModal').modal('toggle');
			$('#close').click();
			$('#msg-success').fadeIn();
		} 
	});
});