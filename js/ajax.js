// Demande de créer une commande 
$(document).ready(function() {
	$('#btnRapport').click(function(){
		var formdata=new FormData($('#crerRapport')[0]);
		// console.log(formdata);
		$.ajax({
			type:'post',
			url:'creer_rapport.php',
			processData: false,
			contentType: false,
			data:formdata,
			success:function(res){
				console.log(res);
			}
		})

	})
})


