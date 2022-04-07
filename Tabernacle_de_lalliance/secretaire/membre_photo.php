<?php  
include_once("../sessions/session_secretaire.php");
$id=$_GET['id'];
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
   			<link rel="shortcut icon" type="image/x-icon" href="../images/favicon(2).ico" />
   			<link href="../Lib_bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   			<link href="../Lib_bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
   			<link href="../country/dist/css/bootstrap-formhelpers.min.css" rel="stylesheet">
   			<Link href="../country/js/tests/vendor/css/bootstrap-3.0.0.min.css" rel="stylesheet">
   			<link type="text/css" rel="stylesheet" href="../Lib_bootstrap/tab.css"  >
   			<link href="../jasny/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
   			<link rel="stylesheet" type="text/css" href="../Lib_bootstrap/dist/sweetalert.css">
			
			   			
			  
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
				      <a class="navbar-brand" href="bienvenue.php"> <?php echo $_SESSION['uname']; ?></a>
				    </div>
				    <div class="collapse navbar-collapse">
				      <ul class="nav navbar-nav" id="navbar" >
					      <li class="active"><a href="membre_out.php">GERER MEMBRES</a></li>
					      <li><a href="gerer_groupe.php">GERER GROUPES</a></li>
					      <li><a href="communication.php">COMMUNICATION</a></li>
					    </ul>
				      <ul class="nav navbar-nav navbar-right" id="dec">
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
				    <h3 class="text-center"><b>GERER MEMBRES</b></h3>

				  </div>
      	</div>
        </div>
      </div>
    </div>


     <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

						<div id="exTab3" class="container">	
						<ul  class="nav nav-tabs">
									<li class="active">
						       		 <a  href="ajouter_membre.php">AJOUTER</a>
									</li>
									<li><a href="membre_out.php" >LISTE DES MEMBRES</a>
									</li>
								</ul>

									<div class="tab-content clearfix">
									<div class="tab-pane fade in active" id="1b">
										<br/>
									  	
										  	<div class="panel panel-default">
												 <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b>PHOTO DU MEMBRE </b></div>


													<div class="panel-body">
														<div class="row">
         												 <div class="col-md-1"> </div>
         												 <div class="col-md-10">
														<form class="form-horizontal"  method="POST" id="form" action="ajaxupload_membre.php" multipart/form-data role="form">
																<div id="flash"></div>
															<div class="row">
         												 <div class="col-md-4"> </div>
         												 <div class="col-md-4">
															<div class="form-group">
														  	<div class="fileinput fileinput-new" style="padding: 0px 0px 0px 15px;" required data-provides="fileinput">
															  <div class="fileinput-preview thumbnail" id="preview" data-trigger="fileinput" style="width: 190px; height: 150px; repeat='no-repeat'; "></div>
															  <div id='check_photo' style="color:red"></div>
															  <div>
															    <span class="btn btn-default btn-file"><span class="fileinput-new">Choisissez une Photo</span><span class="fileinput-exists">Changez</span><input id="uploadImage" type="file" accept="image/*" name="image" ></span>
															    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Enlevez</a>
															  </div>
															</div>
															<input id="mid" name="id" type="hidden" value="<?php echo $id;?>">
															<br/>
															</div>
															 </div>
														  <div class="col-md-4"></div>
															</div>
															

														  <div class="row">
         												 <div class="col-md-3"> </div>
         												 <div class="col-md-4">
														  <div class="form-group"> 
														    <div class="col-sm-offset-2 col-sm-10">
														      <button id="button" type="submit" name="submit_photo" class="btn btn-default">Sauvegarder</button> &nbsp;&nbsp;&nbsp;
														      <button type="button" id="pass" name="pass" class="btn btn-default">Passer</button> 
														    </div>
														  </div>
														  </div>
														  <div class="col-md-4">


															<div id="flash"></div>
														  </div>
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
	



	<script>

$(function() {
	$("#pass").click(function() {
     bootbox.alert("<strong>Le membre a été ajouté avec success!</strong>", function(result) { 
    window.location.href ='ajouter_membre.php';
	});
     
	});
});

$(document).ready(function (e) {

	

 $("#form").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "ajaxupload_membre.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   success: function(data)
  { 
 	//$("#flash").fadeIn(400).html(data);
      
    if(data=='exists')
    {

	$("#flash").fadeIn(400).html("<div class='alert alert-warning text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Ce fichier existe deja dans le system, veuillez renomer le fichier et recommencer</strong </div>");
    }
    else if(data=='size')
    {
    $("#flash").fadeIn(400).html("<div class='alert alert-warning text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Inserer une image dont la taille est inferieur à 3 MO</strong </div>");
    }else if(data=='format')
    {
    $("#flash").fadeIn(400).html("<div class='alert alert-warning text-center '> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Veuillez inserer un fichier image</strong </div>");
    }else if(data=='OK')
    {
    bootbox.alert("<strong>Le membre a été ajouté avec success!</strong>", function(result) { 
    window.location.href ='ajouter_membre.php';
	});
    }else if(data=='redirect')
    {
    bootbox.alert("<strong>Veuillez entrer les données du membre</strong>", function(result) { 
    window.location.href ='ajouter_membre.php';
    });
    }
      }         
    });
 }));
});




	</script>

		<?php
		$con=Null;
		?>


			

	</body>
			


</html>