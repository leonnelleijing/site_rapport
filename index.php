<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="stylesheet" href="./css/open-iconic-bootstrap.css">
	<link rel="stylesheet" href="./css/custom.css">
	<script type="text/javascript" src="./js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/validator.js"></script>

</head>
<body>
  
	<div class="container">
		<div class="row">
		<div class="col-md-6 offset-3">
			<div class="col-md-9 offset-1 border rounded shadow"  id="login">
				<h2 class="text-center text-info">Log In</h2>
				<form action="" method="post">
					<div class="form-group row">
					    <label for="staticEmail"></label>
					    <div class="input-group mb-3 col-md-8 offset-2">
					      <div class="input-group-prepend">
					      	<span class="oi oi-person input-group-text" aria-hidden="true"></span>
					      </div>
					      <input id="email" type="email" class="form-control" name="email" placeholder="Votre email" required>
					      <div class="invalid-feedback">
					      	Veuiiez vérifier votre email 
					      </div>
					    </div>
					</div>
					<div class="form-group row">
					    <label for="inputPassword"></label>
					    <div class="input-group mb-3 col-md-8 offset-2">
					      	<div class="input-group-prepend">
					      		<span class="oi oi-key input-group-text" aria-hidden="true"></span>
					      	</div>
					      	<input id="mdp" type="password" class="form-control" name="mdp" placeholder="Votre mot de passe" required>
					      	<div class="invalid-feedback">
					      	Mot de passe incorrect
					      </div>
						</div>
					</div>
					<div class="form-group row col-md-4 offset-8">
				  		<button class="btn btn-outline-info">Login</button>
				    </div>
	            </form>
	        </div>
	    </div>
	    </div>
	</div>
    </div>
    <script>
        $.ajax({
            type:'post',
            url:'verifier.php',
            data:{
                email: $('#email').val(),
                mdp:$('#mdp').val()
            },
            success:function(res){
                console.log(res);
            }
        });
    </script>
</body>
</html>
