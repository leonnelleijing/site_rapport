// Ce code permet de prévenir l'utilisateur s'il s'est trompé lors de l'envoi du formulaire dans son mail ou mot de passe
$(document).ready(function () {
		$('#log').click(function(){
		var email=$('#email').val();
		var mdp=$('#mdp').val();
		$.ajax({
			type:'post',
	            url:'verifier.php',
	            data:{
	                email:email ,
	                mdp:mdp
	            },
	        success: function(res){
	        	// console.log(res);
	        	var data =JSON.parse(res)
	        	var info=data.info
	        	var dir=data.directeur
	        	var id=data.id
	        	switch(info){
	        		case 0:
	        			alert('Vérifier votre connexion internet');
	        		break;

	        		case 1:
	        			$('#email').addClass('is-invalid');
                                        $('#feedback-mail').html("Ce mail n'existe pas");
	        		break;

	        		case 2:
	        			$('#mdp').addClass('is-invalid');
        				$('#feedback-mdp').html("Mot de passe incorrect");
	        		break;

	        		case 3:
	        			if(dir==0){
	        			  // console.log(dir);
	        			  if(data.userNom==0){
	        			  	window.location.href = './directeur/complete_info.php';
	        			  }
	        			  window.location.href = './utilisateur/utilisateur.php';
	        			}else{
	        			  // console.log(dir);
	        			  window.location.href = './directeur/admin.php';
	        			}	
	        		break;
	        	}

	        }
		})
	})

})