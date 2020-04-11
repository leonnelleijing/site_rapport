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

	$('#btnR').click(function(){
		var formdata=new FormData($('#paramAnalyse')[0]);
		$.ajax({
			type:'post',
			url:'analyse_rapport.php',
			processData: false,
			contentType: false,
			data:formdata,
			success:function(res){
					
				var resultat=JSON.parse(res).resultat;
				console.log(resultat);
				var length=resultat.length;
				var depth=resultat[0].length;
				var newResultat=new Array(depth-1);
				for(i=0;i<depth;i++){
					newResultat[i]=new Array(length-1);
					for(j=0; j<length;j++){

						newResultat[i][j]='<th scope="col">'+resultat[j][i]+'</th>';
					}	
				}
				
				console.log(newResultat)
				var a=new Array();
				$.each(newResultat,function(index,item){
					a[index]='<tr>'+item.toString().replace(/,/g, " ")+'</tr>'
				})
				console.log(a);
				var b='';
				b='<div class="my-4">'+
						'<table class="table table-hover">'
							+ a.toString().replace(/,/g, " ")+
						'</table>'+
						'<div class="form-group">'+
							'<label for="commentaireRapport">'+
							'<small>Commentaire</small></label>'+
							'<textarea class="form-control" id="commentaireRapport" rows="3"></textarea>'+
						'</div>'+
				 		'<button class="btn btn-warning">Supprimer</button><hr>'+
				  '</div>';

				$('#analyseBody').append(b);

			}
		})	
	})
})
