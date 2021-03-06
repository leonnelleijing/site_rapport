// Demande de création de commande  
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
				var data=JSON.parse(res)
				showModal(data)
			}
		})

	})

	//Envoyer une analyse paramétrée
	$('#btnR').click(function(){
		var formdata=new FormData($('#paramAnalyse')[0])
		var nomPU=$("select[name='CodePU'] option:selected").text()
		var nomKPI=$("select[name='idKPI'] option:selected").text()
		var nomContenu=nomPU+':'+ ' '+nomKPI
		$.ajax({
			type:'post',
			url:'analyse_rapport.php',
			processData: false,
			contentType: false,
			data:formdata,
			success:function(res){
					
				var resultat=JSON.parse(res).resultat;
				var length=resultat.length;
				if(length==0){
					var data={request:nomKPI,
							  resultat: "Il n'y pas de données dans la base de données"}
					showModal(data);
				}
				var depth=resultat[0].length;
				var newResultat=new Array(depth-1);
				for(i=0;i<depth;i++){
					newResultat[i]=new Array(length-1);
					for(j=0; j<length;j++){

						newResultat[i][j]='<td scope="col">'+resultat[j][i]+'</td>';
					}	
				}
				
				// console.log(newResultat)
				var ligne=new Array();
				$.each(newResultat,function(index,item){
					ligne[index]='<tr>'+item.toString().replace(/,/g, " ")+'</tr>'
				})
				var content='';
				content='<div class="my-4" id="">'
						+'<h4>'+nomContenu+'</h4>'
						+'<table class="table table-hover">'
						+ ligne.toString().replace(/,/g, " ")
						+'</table>'
						+'<div class="form-group">'
							+'<label for="commentaireRapport">'
							+'<small>Synthèse</small></label>'
							+'<textarea class="form-control" id="commentaireRapport" rows="3"></textarea>'
						+'</div>'
				 		+'<button class="btn btn-warning" id="btn" onclick="removeAll(this)">Supprimer</button><hr>'
				  +'</div>';

				$('#analyseBody').append(content);

			}
		})	
	})

	// Strcuturer des données dans un objet, ce dernier est composé de plusieurs tableaux de données,
	// Chaque tableau est composé de 3 champs: data , synthese, idContenu
	// Si cette analyse est ajoutée après, son idContenu est null  
	$('#soumettre').click(function(){
		function stucture(data, synthese,idContenu,nomContenu){
			this['data']=data
			this['synthese']=synthese
			this['idContenu']=idContenu
			this['nomContenu']=nomContenu
		}
		var rapport = new Array()
		var data =$('.my-4> table')
		var synthese=$('.my-4 textarea')
		var idContenu=$('.my-4').attr('id')
		var nomContenu =$('.my-4 h4')

		// console.log(idContenu)
		data.each(function(index,ele){
			var obj= new stucture(ele.outerHTML,
				synthese[index].value,
				(idContenu[index]==undefined?null:idContenu[index]),
				nomContenu[index].innerText)
			rapport.push(obj)
		})
		// console.log(rapport)
		$.ajax({
			type:'post',
			url:'./mettre_analyse_rapport.php',
			traditional: true,
			data:{
				array:JSON.stringify(rapport)
			},
			dataType: "json",
			success:function(res){
				showModal(res)
			}
		})
		
	})

	//Une fois validé,
	//Envoyer le contenu avec des css java/script link dans un fichier html
	$('#validerAnalyse').click(function(){
		String.prototype.sansAccents = function() {
   			return this.replace(/[ùûü]/g,"u").replace(/[îï]/g,"i").replace(/[àâä]/g,"a").replace(/[ôö]/g,"o").replace(/[éèêë]/g,"e").replace(/ç/g,"c").replace(/°/g,' ');
		}
		var htmlHead='<head lang="en">'
				+'<meta charset="utd-8">'
				+'<link rel="stylesheet" href="../css/bootstrap.css">'
				+'<link rel="stylesheet" href="../css/open-iconic-bootstrap.css">'
				+'<link rel="stylesheet" href="../css/custom.css">'
				+'<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>'
				+'<script type="text/javascript" src="../js/bootstrap.min.js"></script>'
			    +'<script type="text/javascript" src="../js/ajax.js"></script>'
      	  	+'</head>'
		var nomRapport=$('#nomRapport').text().toLowerCase().sansAccents()
		var htmlBody = $('.col-md-10 .col-9 .card').html()
		var html=htmlHead+htmlBody
		var html_ = new Blob([html],{ "type" : "text/html;charset=utf-8" })
		var formdata = new FormData()
		formdata.append('file', html_,nomRapport)
		$.ajax({
			type:'post',
			url:'../rapport_valide/enregis_analyse_rapport.php',
			data:formdata,
			processData: false,
			contentType: false,
  			responseType:'blob',
			success:function(res){
				showModal(res)
			}
		})
		
	})


	// créer un nouveua login
	$("#creerLogin").click(function(){
		var formdata=new FormData($("#newLogin")[0])
		$.ajax({
			type: 'post',
			url:'creer_login.php',
			data:formdata,
			processData: false,
			contentType: false,
			success:function(res){
				var data=JSON.parse(res)
				if(data.fail==1){
					showModal(data)
				}else{
					var mail=data.resultat.mail
					var mdp=data.resultat.mdp
					var html="<form action='mailto:"+mail+"'>"
							+"<h3>"
							+"Nouveau Login :"
							+"</h3>"
							+"<p>Mail:"+mail+"</p>"
							+"<p>Mot de passe:"+mdp+"</p>"
							+"<button type='submit' class='btn btn-info'>Envoyer</button>"
							+"</form>"
					$("#Modal h5").text(data.request)
					$("#Modal .modal-body").empty()
										   .append(html)
					$('#Modal').modal('show');
				}
			}

		})
	})



	function showModal(data){
		// var data= JSON.parse(res)
		$("#Modal h5").text(data.request)
		$("#Modal .modal-body").text(data.resultat)
		$('#Modal').modal('show')
	}

})

// Fonction pour supprimer une analyse
// 1. Vérifier s'il existe déjà dans la base de données par le id de son parent 
// 2. S'il existe, envoyer une demande d'ajax pour supprimer cette annalyse 

	function removeAll(eve){
		var btn=$(eve)
		console.log(btn.text())
		if(confirm("Vous allez supprimer cette partie")){
			var idContenu=btn.parent().attr('id')
			// console.log(btn.parent)
			if(idContenu!==undefined){
				$.ajax({
				type:'post',
				url:'supprim_analyse_rapport.php',
				data:{
					idContenu:idContenu
				},
				success:function(res){
					console.log(res);
				}
			})
			}
			
			btn.parent().remove();
		}	
	}

	


