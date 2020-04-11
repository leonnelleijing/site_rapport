$(document).ready(function(){
	var $aRapport= $('.hrefRappport');
	$aRapport.click(function(e){
		var $idRapport='idRapport'+'='+ $(this).parent().siblings().eq(1).html();
		var $nomRapport='nomRapport'+'='+ $(this).parent().siblings().eq(2).html();
		var $param= $idRapport+'&'+$nomRapport
		console.log($param);
		var $href=$aRapport.attr("href");
		$href=$href+'?'+$param;
		e.preventDefault();
		window.location.href=$href;
	});


})
	
