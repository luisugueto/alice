$(document).ready(function() {
	$("#registro").click(function(){
		var dato = $("#genre").val();
		var route = "http://localhost:8000/genero";
		var token = $("#_token").val();

		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'POST',
			dataType: 'json',
			data: {genre: dato},
			success:function(){
				$('#msg-error').fadeOut();
				$('#msg-success').fadeIn();
			},
			error: function(res)
			{
				$('#msg-success').fadeOut();
				$('#msg').html(res.responseJSON.genre);
				$('#msg-error').fadeIn();

			}
		});
	});
});