
<!DOCTYPE html>
<html>

	<head>
		
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">

			<meta charset="utf-8">
    		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   			<meta name="viewport" content="width=device-width, initial-scale=1">
   			<title> TA Manager</title>
   			<link href="Lib_bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   			<link href="Lib_bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
   			<link type="text/css" rel="stylesheet" href="Lib_bootstrap/tab.css"  >
   			
			  
	</head>

	<body  style="background:rgb(130, 0, 31);">

			 <div class="section" >
      <div class="container" >
      		<!-- <br/><br/><br/><br/><br/> -->
          <div class="col-md-3"></div>
          <div class="col-md-6">
          	<div class="row">
          		<br/><br/><br/>
			 <div class="col-md-3"> </div>
			 <div class="col-md-6">
			<img src="images/3.jpg" class="img-responsive" style="width:300px; height:100px">
			</div>
			<div class="col-md-3"> </div>
			</div>
			<br/><br/>
			<div id="flash"></div>
          	<div class="well well-lg" style="background:rgb(255, 213, 29); border:rgb(255, 213, 29); height:320px; ">
          		<div class="row">
				 <div class="col-md-1"> </div>
				 <div class="col-md-10">
				 	<h3 class="text-center" style="color:rgb(130, 0, 31);" > <b>Se Connecter </b></h3>
          		<form class="form-horizontal"  method="POST" id="login" action="index.php" multipart/form-data role="form">

					  
							 <div class="form-group">
				  <label for="pseudo" style="color:rgb(130, 0, 31);">Pseudo <span style="color:red" >*</span>:</label>
				  <input type="text" class="form-control" id="pseudo" style="text-transform: capitalize;" placeholder="Entrez le Pseudo" maxlength="30">
				<div id='check_pseudo' style="color:red"></div>
				</div>  

						  	<div class="form-group">
				  <label for="mp" style="color:rgb(130, 0, 31);">Mot de passe <span style="color:red" >*</span>:</label>
				  <input type="password" class="form-control" id="mp" placeholder="Entrez le mot de passe" maxlength="50">
				  <div id='check_mp' style="color:red"></div>
				</div><br/>

				<div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			      <button type="button" id="submit" name="submit" class="btn btn-default">Entrer</button> 
			       <img src="images/default.gif"  id="lod" class="img-rounded" width="30" height="30"> 
			    </div>
			  </div>


			</form>

			</div>
			<div class="col-md-1"> </div>
			</div>

          	</div>

          </div>
			<div class="col-md-3"></div>		
			</div>
        </div>
      </div>
    </div>




    <script src="Lib_bootstrap/docs/assets/js/vendor/jquery.min.js"></script>
	<script src="Lib_bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="Lib_bootstrap/js/collapse.js"></script>
	<script src="Lib_bootstrap/js/dropdown.js"></script>
	<script src="Lib_bootstrap/js/button.js"></script>

	<script type="text/javascript">

	 $(function() {
	 	$('#lod').hide();
	 });

	 $.fn.clearForm = function() {
  return this.each(function() {
    var type = this.type, tag = this.tagName.toLowerCase();
    if (tag == 'form')
      return $(':input',this).clearForm();
    if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'number' || type == 'email')
      this.value = '';
    else if (type == 'checkbox' || type == 'radio')
      this.checked = false;
    else if (tag == 'select')
      this.selectedIndex = 0;
  });
};

	 $("#submit").click(function() {

	 		var pseudo= $("#pseudo").val();
			var mp= $("#mp").val();

		if (pseudo.length == 0 ) {
$('#check_pseudo').html("*Entrez un <strong>Pseudo</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#pseudo").focus(); 

$("#pseudo").change(function(){ $('#check_pseudo').hide();
});
return false;
}


else if (mp.length == 0 ) {
$('#check_mp').html("*Entrez un <strong>Le mot de passe</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#mp").focus(); 

$("#mp").change(function(){ $('#check_mp').hide();
});
return false;
}else{

var dataString = "pseudo="+ pseudo +"&mp="+mp;

// alert(dataString);

$('#lod').show();
$.ajax({
type: "POST",
url: "New folder/login_eng.php ",
data:dataString,
cache:true,
processData:false,
success: function(out){
 // $('#flash').html(out);
	
	{
		if (out=="OK_un"){
	$('#login').clearForm();
	$('#flash').html("<div class='alert alert-success text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Connection établie</strong> </div>");
	setTimeout(' window.location.href = "ajouter_membre.php"; ',4000);
	} else if (out=="OK_deux"){
	$('#login').clearForm();
	$('#flash').html("<div class='alert alert-success text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Connection établie</strong> </div>");
	setTimeout(' window.location.href = "utilisateur_deux/bienvenue.php"; ',4000);
	}else if (out=="OK_admin"){
	$('#login').clearForm();
	$('#flash').html("<div class='alert alert-success text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Connection établie</strong> </div>");
	setTimeout(' window.location.href = "administrateur/bienvenue.php"; ',4000);
	}else if (out=="OK_admin_super"){
	$('#login').clearForm();
	$('#flash').html("<div class='alert alert-success text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Connection établie</strong> </div>");
	setTimeout(' window.location.href = "administrateur_super/bienvenue.php"; ',4000);
	}else if (out=="NO"){
	$('#lod').hide();
	$('#flash').html("<div class='alert alert-danger text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Compte inconnu!</strong> </div>");
	
	}

	}
	}

	})
	}

	});



	 </script>

	</body>
			


</html>