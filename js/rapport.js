// Permet d'afficher le rapport voulu en cliquant dessus
$(document).ready(function(){

	var $aRapport= $('.hrefRappport');
	$aRapport.click(function(e){
		var $idRapport='idRapport'+'='+ $(this).parent().siblings('.idRapport').html();
		var $nomRapport='nomRapport'+'='+ $(this).parent().siblings('.nomRapport').html();
		var $param= $idRapport+'&'+$nomRapport
		console.log($param);
		var $href=$aRapport.attr("href");
		$href=$href+'?'+$param;
		e.preventDefault();
		window.location.href=$href;
	});

})
		
	

	