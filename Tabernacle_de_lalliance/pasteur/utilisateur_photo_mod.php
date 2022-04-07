<?php
include_once("../sessions/session_pasteur.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$pasteur=$_SESSION['pasteur'];
$id=$_GET["uid"];
$query=$con->query("select photo from utilisateur where uid='$id' and branche='$bid';") or die (print_r($con->errorInfo()));
$fetch_photo=$query->fetch();

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
   			<link rel="shortcut icon" type="image/x-icon" href="../images/favicon(2).ico"/>
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
					      <li class="active"><a href="ajouter_utilisateur.php">GERER UTILISATEURS</a></li>
					      <li><a href="gerer_entrees.php">GERER ENTREES</a></li>
					      <li ><a href="sorties_confirmation.php">GERER SORTIES</a></li>
					      <li><a href="bilan.php">RAPPORTS</a></li>
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
				    <h3 class="text-center"><b> GERER UTILISATEURS </b></h3>

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
									<li >
						       		 <a  href="ajouter_utilisateur.php">AJOUTER</a>
									</li>
									<li class="active"><a href="utilisateur_out.php" >LISTE DES UTILISATEURS</a>
									</li>
								</ul>
										<br/>
									  	
										  	<div class="panel panel-default">
												 <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b>CHANGER LA PHOTO </b></div>


													<div class="panel-body">
														<div class="row">
         												 <div class="col-md-1"> </div>
         												 <div class="col-md-10">
														<form class="form-horizontal"  method="POST" id="form" name="form" action="ajaxupload_update.php" multipart/form-data role="form">
																<div id="flash"></div>
															<div class="row">
         												 <div class="col-md-4"> </div>
         												 <div class="col-md-4">
         												 	<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>"  maxlength="10">
															<div class="form-group">
														  	<div class="fileinput fileinput-new" style="padding: 0px 0px 0px 15px;" required data-provides="fileinput">
															  <div class="fileinput-preview thumbnail" id="preview" data-trigger="fileinput" style="width: 250px; height: 200px; repeat='no-repeat'; ">
															  	<img src="<?php echo $fetch_photo['photo'];?>" /> 
															  </div>
															  <div id='check_photo' style="color:red"></div>
															  <!-- <div> 
															    <span class="btn btn-default btn-file"><span class="fileinput-new">Choisissez une Photo</span><span class="fileinput-exists">Changez</span><input id="uploadImage"  value="<?php echo $fetch_photo['photo']; ?>" type="file" accept="image/*" name="image" ></span>
															    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Enlevez</a>
															  </div>-->
															</div>
															<br/>
															</div>
															 </div>
														  <div class="col-md-4"></div>
															</div>
														
														  <div class="row">
         												 <div class="col-md-4"> </div>
         												 <div class="col-md-4">
														  <div class="form-group"> 
														   <div class="col-sm-offset-2 col-sm-10"> 
														     <button id="button" type="button" name="submit_photo" class="btn btn-default">Modifier</button> &nbsp;&nbsp;&nbsp;
														      <button type="button" id="pass" name="pass" class="btn btn-default">Passer</button> 
														    </div> 
														  </div>
														  </div>
														  <div class="col-md-3">


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
	var id=$("#id").val();
     bootbox.alert("<strong>Les donneés de l'utilisateur ont été modifié avec success!</strong>", function(result) { 
    window.location.href ='utilisateur_view_branche.php?id='+id;
	});
     
	});
});

$(function() {
	$("#button").click(function() {
		var id=$("#id").val();
		window.location.href ='modifier_photo.php?uid='+id;
		});
		});


	</script>

		<?php
		$con=Null;
		?>


			

	</body>
			


</html>