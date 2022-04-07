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
   			<link type="text/css" rel="stylesheet" href="../Lib_bootstrap/pagination.css"  >
   			<link href="../jasny/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
   			<link rel="stylesheet" type="text/css" href="../Lib_bootstrap/dist/sweetalert.css">
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

		   			<?php
		   			require_once("../setup/connection.php");
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
				    <h3 class="text-center">Gerer Utilisateur</h3>

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
						       		 <a  href="ajouter_utilisateur.php">Ajouter</a>
									</li>
									<li class="active"><a href="utilisateur_out.php" >Liste des Utilisateurs</a>
									</li>
								</ul>	

									<br/>
							
									<div id="flash"> </div>
									<br/>

										<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> LISTE DES UTILISATEURS </b> </div>
  										<div class="panel-body">
  											<br/>


  											<ul  class="nav nav-tabs">
									<li class="active">
						       		 <a  href="#1b" data-toggle="tab">Signataires 1</a>
									</li>
									<li><a href="#2b" data-toggle="tab">Signataires 2</a>
									</li>
									<li><a href="#3b" data-toggle="tab">Administrateurs</a>
									</li>
								</ul>

								<br/>

								<div class="tab-content clearfix">
									<div class="tab-pane fade in active" id="1b">

  											<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> LISTE DES SIGNATAIRES 1 </b> </div>
  										<div class="panel-body" id="tab_un">
  										<?php include_once 'uti_tab_un.php' ?> 
									</div>
									</div>
									</div>
									<div class="tab-pane fade " id="2b">

  											<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> LISTE DES SIGNATAIRES 2 </b> </div>
  										<div class="panel-body" id="tab_deux">
  											<?php include_once 'uti_tab_deux.php' ?> 
									</div>
									</div>

									</div>
									<div class="tab-pane fade " id="3b">
										<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> LISTE DES ADMINISTRATEURS </b> </div>
  										<div class="panel-body" id="tab_admin">
  											<?php include_once 'admin_tab.php' ?> 
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


	 <script type="text/javascript">


	 $(document).ready(function(){
    $('#table_un').dataTable();
	});
	 $(document).ready(function(){
    $('#table_deux').dataTable();
	});
	 $(document).ready(function(){
    $('#admin').dataTable();
	});

						function sup_uid_un(uid)
						{
							var info="uid_un="+ uid;
						bootbox.confirm("<b>Supprimer l'utilisateur ?</b>" , function(result) {
						if(result)
						{
							$.ajax({
							type: "POST",
							url: "supprimer_utilisateur.php",
							data: info,
							cache:true,
							processData:false,
							success: function(html){
								$('#tab_un').load("uti_tab_un.php");
								bootbox.alert("<b>Utilisateur Supprimé.</b>");
								}
									});		  
										}
											});
								
						}

						function sup_uid_deux(uid)
						{
							var info="uid_deux="+ uid;
						bootbox.confirm("<b>Supprimer l'utilisateur?</b>" , function(result) {
						if(result)
						{
							$.ajax({
							type: "POST",
							url: "supprimer_utilisateur.php",
							data: info,
							cache:true,
							processData:false,
							success: function(html){
								$('#tab_deux').load("uti_tab_deux.php");
								bootbox.alert("<b>Utilisateur Supprimé.</b>");
								}
									});		  
										}
											});
								
						}

						function sup_aid(uid)
						{
							var info="aid="+ uid;
						bootbox.confirm("<b>Supprimer Administrateur'?</b>" , function(result) {
						if(result)
						{
							$.ajax({
							type: "POST",
							url: "supprimer_utilisateur.php",
							data: info,
							cache:true,
							processData:false,
							success: function(html){
								$('#tab_admin').load("admin_tab.php");
								}
									});		  
										}
											});
								
						}
									
																
						     

						</script>



  	</body>
			


</html>

