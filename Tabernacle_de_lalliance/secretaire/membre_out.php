<?php  
include_once("../sessions/session_secretaire.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];

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
   			<link type="text/css" rel="stylesheet" href="../Lib_bootstrap/pagination.css"  >
   			<link href="../jasny/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
   			<link rel="stylesheet" type="text/css" href="../Lib_bootstrap/dist/sweetalert.css">
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">  
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

						
						<ul  class="nav nav-tabs">
									<li>
						       		 <a  href="ajouter_membre.php">AJOUTER</a>
									</li>
									<li  class="active"><a href="membre_out.php" >LISTE DES MEMBRES</a>
									</li>
						</ul>
									<div id="flash"> </div>
									<br/>
									
										<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> LISTE DE MEMBRES </b> </div>
  										<div class="panel-body" >

  									<ul  class="nav nav-tabs">
									<li class="active">
						       		 <a  href="#1b" data-toggle="tab">PRESENTS</a>
									</li>
									<li><a href="#2b" data-toggle="tab">PARTIES</a>
									</li>
								</ul>

								<br/>

								<div class="tab-content clearfix">
									<div class="tab-pane fade in active" id="1b">

  											<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> PRESENTS </b> </div>
  										<div class="panel-body" id="presents">
  										<?php include_once('membre_load.php'); ?>
									</div>
									</div>
									</div>
									<div class="tab-pane fade " id="2b">

  											<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> PARTIES </b> </div>
  										<div class="panel-body" id="parties">
  											 <?php include_once ('membre_load_parties.php'); ?> 
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
	<script src="../data_table/media/js/jquery.dataTables.min.js"></script>

	<script>

	$(document).ready(function(){
    $('#tab').dataTable();
	});
	$(document).ready(function(){
    $('#tab_parties').dataTable();
	});

     function sup_pre_id(mid)
		{
			
			var info="mid="+ mid;
		bootbox.confirm("<b>Supprimer le Membre?</b>" , function(result) {
		if(result)
		{
			$.ajax({
			type: "POST",
			url: "supprimer_membre.php",
			data: info,
			cache:true,
			processData:false,
			success: function(html){
				$('#presents').load("membre_load.php");
				bootbox.alert("<b>Membre Supprimé.</b>");
				}
					});		  
						}
							});
				
		}

		function sup_par_id(mid)
		{
			
			var info="mid="+ mid;
		bootbox.confirm("<b>Supprimer le Membre?</b>" , function(result) {
		if(result)
		{
			$.ajax({
			type: "POST",
			url: "supprimer_membre.php",
			data: info,
			cache:true,
			processData:false,
			success: function(html){
				$('#parties').load("membre_load_parties.php");
				bootbox.alert("<b>Membre Supprimé.</b>");
				}
					});		  
						}
							});
				
		}

		function statut_id(mid)
		{
			
			var info="mid="+ mid;
			$.ajax({
			type: "POST",
			url: "membre_partie.php",
			data: info,
			cache:true,
			processData:false,
			success: function(html){
				$('#presents').load("membre_load.php");
				$('#parties').load("membre_load_parties.php");
				}
					});		  
						
				
		}

		function statut_re_id(mid)
		{
			
			var info="mid="+ mid;
			$.ajax({
			type: "POST",
			url: "membre_retour.php",
			data: info,
			cache:true,
			processData:false,
			success: function(html){
				$('#parties').load("membre_load_parties.php");
				$('#presents').load("membre_load.php");
				}
					});		  
						
				
		}
	</script>

  	</body>
			


</html>

