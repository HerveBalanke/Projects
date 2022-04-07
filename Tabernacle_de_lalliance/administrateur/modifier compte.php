<?php  
include_once("session_admin.php");
?>

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
   			<link rel="shortcut icon" type="image/x-icon" href="../images/favicon(2).ico" />`
   			<link href="../Lib_bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   			<link href="../Lib_bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
   			<link href="../country/dist/css/bootstrap-formhelpers.min.css" rel="stylesheet">
   			<Link href="../country/js/tests/vendor/css/bootstrap-3.0.0.min.css" rel="stylesheet">
   			<link type="text/css" rel="stylesheet" href="../Lib_bootstrap/tab.css"  >
   			<link href="../jasny/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
   			<link rel="stylesheet" type="text/css" href="../Lib_bootstrap/dist/sweetalert.css">


		   			<?php
		   			require_once("../setup/connection.php");

		   			$out_prof=$con->query("select * from profession;") or die (print_r($con->errorInfo()));
		   			
		   			?>


			
			   			
			  
	</head>

	<body>

			 <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

						 <nav class="navbar navbar-default navbar-fixed-top">
				  <div class="container-fluid" id="nv">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="#">TA Manager</a>
				    </div>
				    <div class="collapse navbar-collapse">
				      <ul class="nav navbar-nav" id="navbar" >
					      <li class="active"><a href="membre_out.php">Gerer Membre</a></li>
					      <li><a href="gerer_entrees.php">Gerer Entrées</a></li>
					      <li><a href="gerer_sorties.php">Gerer Sorties</a></li>
					      <li><a href="gerer_groupe.php">Gerer Groupes</a></li>
					      <li><a href="bilan.php">Rapports</a></li>
					      <li><a href="communication.php">Communication</a></li>
					    </ul>
				      <ul class="nav navbar-nav navbar-right" >
				        <li ><a href="#" style="color:rgb(130, 0, 31);"><span class="glyphicon glyphicon-log-in"></span> Deconnection</a></li>
				      </ul>
				    </div>
				  </div>
				</nav>

			</div>
        </div>
      </div>
    </div>



    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
				<div class="jumbotron">
				    <h3 class="text-center">Gerer Membre</h3>

				  </div>
      	</div>
        </div>
      </div>
    </div>


     <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

						
						<ul  class="nav nav-tabs">
									<li class="active">
						       		 <a  href="ajouter_membre.php">Ajouter</a>
									</li>
									<li><a href="membre_out.php" >Liste des Membres</a>
									</li>
								</ul>

										<br/>
									  	
										  	<div class="panel panel-default">
												 <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b>FICHE DE RENSEIGNEMENT </b></div>


													<div class="panel-body">
														<div class="row">
         												 <div class="col-md-1"> </div>
         												 <div class="col-md-10" id="sec">
														<form class="form-horizontal"  method="POST" id="form_membre" action="gerer_membre.php" multipart/form-data role="form">

															<div id="flash"></div>
															<br/>
															<label style="color:rgb(130, 0, 31);">A.	INFORMATION PERSONNELLE </label> <br/><br/>

															<div class="form-group">
														    <label class="control-label col-sm-2" for="nom">Nom(s) <span style="color:red;">*</span></label>
														    <div class="col-sm-8">
														      <input type="text" class="form-control" id="nom" style="text-transform: capitalize;" placeholder="Entrez le(s) Nom(s)" maxlength="30">
														    	<div id='check_nom' style="color:red"></div>
														    </div>
														  </div>
														  <div class="form-group">
														    <label class="control-label col-sm-2" for="prenom">Prenom(s) <span style="color:red;">*</span></label>
														    <div class="col-sm-8"> 
														      <input type="text" class="form-control" id="prenom" style="text-transform: capitalize;" placeholder="Entrez le(s) Prenom(s)" maxlength="50">
														      <div id='check_prenom' style="color:red"></div>
														    </div>
														  </div>


														  
														  <div class="form-group"> 
														      <button type="button" id="submit" name="submit" class="btn btn-default">Sauvegarder</button> &nbsp;&nbsp;&nbsp;
														      <button type="reset" id="reset" name="reset" class="btn btn-default">Reprendre</button>&nbsp;&nbsp;&nbsp;
														       <img src="../images/default.gif"  id="lod" class="img-rounded" width="30" height="30">
														  </div>

														</form>
														</div>

														<div class="col-md-1"></div>

													</div>

													</div>

											</div>
						  
				  

          </div>
        </div>
      </div>
    </div>


    <script src="../Lib_bootstrap/jquery-1.12.4.min.js"></script>
    <script src="../Lib_bootstrap/docs/assets/js/vendor/jquery.min.js"></script>
	<script src="../Lib_bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../Lib_bootstrap/js/collapse.js"></script>
	<script src="../Lib_bootstrap/js/dropdown.js"></script>
	<script src="../Lib_bootstrap/js/button.js"></script>
	<script src="../Lib_bootstrap/bootbox.min.js"></script>
	<script src="../Lib_bootstrap/dist/sweetalert.min.js"></script>
	<script src="../country/js/tests/vendor/js/bootstrap-3.0.0.min.js"></script>
	<script src="../country/js/tests/vendor/js/jquery-1.10.2.js"></script>
	<script src="../country/js/lang/fr_FR/bootstrap-formhelpers-countries.fr_FR.js"></script>
	<script src="../country/js/bootstrap-formhelpers-countries.js"></script>
	<script src="../country/js/bootstrap-formhelpers-datepicker.js"></script>
	<script src="../country/js/bootstrap-formhelpers-selectbox.js"></script>
	<script src="../country/js/bootstrap-formhelpers-phone.js"></script>
	<script src="../country/js/bootstrap-formhelpers-languages.js"></script>
	<script src="../country/dist/js/bootstrap-formhelpers.min.js"></script>
	<script src="../jasny/js/jasny-bootstrap.min.js"></script>
	



	<script type="text/javascript">

	 $(function() {

			$("#reset").click(function() {

		$('#block_prof').hide();
	 	$('#block_fil').hide();
	 	$('#block_ecole').hide();
	 	$('#block_ae').hide();
	 	$('#block_ac').hide();
	 	$('#block_ac_ta').hide();
	 	$('#block_sta').hide();
	 	$('#block_rel').hide();
	 	$('#lod').hide();
	 	$("#nom").focus();
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

	 		var nom= $("#nom").val();
			var prenom= $("#prenom").val();
			

		
if (nom.length == 0 ) {
$('#check_nom').html("*Entrez un <strong>Nom</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#nom").focus(); 

$("#nom").change(function(){ $('#check_nom').hide();
});
return false;
}


else if (prenom.length == 0 ) {
$('#check_prenom').html("*Entrez un <strong>Prenom</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#prenom").focus(); 

$("#prenom").change(function(){ $('#check_prenom').hide();
});
return false;
} else{

var dataString ="nom="+ nom +"&prenom="+ prenom +"&genre="+ genre;

//alert(dataString);
$('#lod').show();
//$("#flash").show();
//$("#flash").fadeIn(400).html(bootbox.alert("<div class='progress' ><div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Loading</strong></div></div>"));
$.ajax({
type: "POST",
url: "gerer_membre_eng.php",
data:dataString,
cache:true,
processData:false,
success: function(out){

	$("#flash").fadeIn(400).html(out);
	{
	if (out=="OK"){
	//$('#form_membre').clearForm();
	$('#lod').hide();
	bootbox.alert("<strong>Données du membre enregistrées!</strong>", function(result) { 
	window.location.href ='membre_photo.php';
	});
	
	} else if (out=="NO_prof"){
	$('#lod').hide();
	bootbox.alert("<strong>Cette profession a deja été enregistré, veuillez la selectionner dans la liste déroulante</strong>", function(result) { 
	$("#prof").focus();
	$('#check_prof').html("*Choisissez cette profession dans <strong>la liste déroulante</strong>").show();
	});
	$("#prof").change(function(){ $('#check_prof').hide();
	});
	}

	}
	$("#nom").focus();
}  
});
return false;
}

});

});

	</script>

		<?php
		$con=Null;
		?>


			

	</body>
			


</html>