
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
   			<link rel="shortcut icon" type="image/x-icon" href="images/favicon(2).ico" />
   			<link href="Lib_bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   			<link href="Lib_bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
   			<link href="country/dist/css/bootstrap-formhelpers.min.css" rel="stylesheet">
   			<Link href="country/js/tests/vendor/css/bootstrap-3.0.0.min.css" rel="stylesheet">
   			<link type="text/css" rel="stylesheet" href="Lib_bootstrap/tab.css"  >
   			<link href="jasny/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
   			<link rel="stylesheet" type="text/css" href="Lib_bootstrap/dist/sweetalert.css">
   			
			  
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




    <script src="Lib_bootstrap/jquery-1.12.4.min.js"></script>
    <script src="Lib_bootstrap/docs/assets/js/vendor/jquery.min.js"></script>
	<script src="Lib_bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="Lib_bootstrap/js/collapse.js"></script>
	<script src="Lib_bootstrap/js/dropdown.js"></script>
	<script src="Lib_bootstrap/js/button.js"></script>
	<script src="Lib_bootstrap/bootbox.min.js"></script>
	<script src="Lib_bootstrap/dist/sweetalert.min.js"></script>
	<script src="country/js/tests/vendor/js/bootstrap-3.0.0.min.js"></script>
	<script src="country/js/tests/vendor/js/jquery-1.10.2.js"></script>
	<script src="country/js/lang/fr_FR/bootstrap-formhelpers-countries.fr_FR.js"></script>
	<script src="country/js/bootstrap-formhelpers-countries.js"></script>
	<script src="country/js/bootstrap-formhelpers-datepicker.js"></script>
	<script src="country/js/bootstrap-formhelpers-selectbox.js"></script>
	<script src="country/js/bootstrap-formhelpers-phone.js"></script>
	<script src="country/js/bootstrap-formhelpers-languages.js"></script>
	<script src="country/dist/js/bootstrap-formhelpers.min.js"></script>
	<script src="jasny/js/jasny-bootstrap.min.js"></script>

	<script type="text/javascript">

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

	 $(function() {
	 	$('#lod').hide();
	 });

	 </script>

	 <script type="text/javascript">

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
url: "login_eng.php",
data:dataString,
cache: true,
success: function(response){

 $('#flash').html(response);
 {
if (response== 2){
	$('#login').clearForm();
	$('#flash').html("<div class='alert alert-success text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Connection établie</strong> </div>");
	setTimeout('window.location.href = "secretaire/ajouter_membre.php";',2000);
	} else if (response== 5){
	$('#login').clearForm();
	$('#flash').html("<div class='alert alert-success text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Connection établie</strong> </div>");
	setTimeout(' window.location.href = "tresorier/gerer_entrees.php"; ',2000);
	}else if (response== 1){
	$('#login').clearForm();
	$('#flash').html("<div class='alert alert-success text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Connection établie</strong> </div>");
	setTimeout(' window.location.href = "usher/gerer_entrees.php"; ',2000);
	}else if (response== 3){
	$('#login').clearForm();
	$('#flash').html("<div class='alert alert-success text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Connection établie</strong> </div>");
	setTimeout(' window.location.href = "admin/ajouter_utilisateur.php"; ',2000);
	}else if (response== 61){
	$('#login').clearForm();
	$('#flash').html("<div class='alert alert-success text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Connection établie</strong> </div>");
	setTimeout(' window.location.href = "rd_fin/rapport.php"; ',2000);
	}else if (response== 62){
	$('#login').clearForm();
	$('#flash').html("<div class='alert alert-success text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Connection établie</strong> </div>");
	setTimeout(' window.location.href = "porteur_de_joie/ajouter_porteur.php"; ',2000);
	}else if (response== 621){
	$('#login').clearForm();
	$('#flash').html("<div class='alert alert-success text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Connection établie</strong> </div>");
	setTimeout(' window.location.href = "porteur_de_joie_p/ajouter_evangelisation.php"; ',2000);
	}else if (response== 4){
	$('#login').clearForm();
	$('#flash').html("<div class='alert alert-success text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Connection établie</strong> </div>");
	setTimeout(' window.location.href = "pasteur/ajouter_utilisateur.php"; ',2000);
	}else if (response== 11){
	$('#login').clearForm();
	$('#flash').html("<div class='alert alert-success text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Connection établie</strong> </div>");
	setTimeout(' window.location.href = "cellule/gerer_cellule.php"; ',2000);
	}else if (response== 5){
	$('#lod').hide();
	$('#flash').html("<div class='alert alert-danger text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Compte inconnu!</strong> </div>");
	
	}
 }	
	

	
	}

	});
return false;
	}

	});



	 </script>

	</body>
			


</html>