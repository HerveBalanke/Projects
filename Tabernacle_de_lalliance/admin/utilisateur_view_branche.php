<?php
	include_once("../sessions/session_admin.php");
	require_once("../setup/connection.php");
	$bid=$_SESSION['bid'];
	$admin=$_SESSION['admin'];
	$id=$_GET['id'];
	$query=$con->query("select * from utilisateur 
	inner join profession on utilisateur.profession=profession.pid 
	inner join niveau on utilisateur.niveau=niveau.niid 
	inner join branche on utilisateur.branche=branche.bid 
	where utilisateur.uid='$id' and niveau.niid not in (6, 4, 3);") or die (print_r($con->errorInfo()));
	$fetch_info=$query->fetch();

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

									<div id="flash"> </div>

										<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> INFORMATION DE L'UTILISATEUR </b> 
  											<!-- <a href='utilisateur_out.php' style="color:rgb(255, 213, 29);" title="Retour à La Liste des Membres" class="pull-right"> <b> Retour </b> </a>  -->
  										</div>
  										<div class="panel-body">

										        <div class="row">
										          <div class="col-md-6">
										          	<div class="row">
										          <div class="col-md-2"> </div>
										          <div class="col-md-8"> 
										          	<img src="<?php echo $fetch_info["photo"];?>" class="img-thumbnail img-responsive" alt="<?php echo $fetch_info["nom"];?> <?php echo $fetch_info["prenom"];?>" style="width:300px;height:300px">
										          </div>
										          	
													<div class="col-md-2"> </div>
													</div>
													</div>
										          	
										          	<div class="col-md-6">

										          		<div class="panel panel-default">
													  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">INFORMATION PERSONELLE
													  	<a href="modifier_utilisateur_branche.php?id=<?php echo $id;?>" style="color:orange;" title="Modifier" class="pull-right"><span class="glyphicon glyphicon-edit"></span></a>
													  </div>
													  <div class="panel-body">
													  	<div class="table-responsive table-condensed">
													  	<table class="table table-striped">
														      
														    <tbody>
														        <th>Nom</th>
														        <td><?php echo $fetch_info ["nom"];?></td>
														      </tr>
														      <tr>
														        <th>Prenom</th>
														        <td><?php echo $fetch_info ["prenom"];?></td>
														      </tr>
														      <tr>
														        <th>Genre</th>
														        <td><?php echo $fetch_info ["genre"];?></td>
														      </tr>
														      <tr>
														        <th>Date de Naissance</th>
														        <td><?php echo $fetch_info ["dob"];?></td>
														      </tr>
														      <tr>
														        <th>Pays d'Origine</th>
														        <td><span class="bfh-countries" data-country="<?php echo $fetch_info ["pays"];?>" data-flags="true"></span></td>
														      </tr>
														      <tr>
														        <th>Profession</th>
														        <td><?php echo $fetch_info["profession"];?></td>
														      </tr>
														      <tr>
														    </tbody>
														  </table>
														  </div>
													  </div>
													  </div>
										          		</div>
													</div>

										          	<div class="row">
										          	<div class="col-md-6">
										          	<div class="panel panel-default">
														  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">ADDRESSE
														  	<a href="modifier_utilisateur_branche.php?id=<?php echo $id;?>=" style="color:orange;" title="Modifier" class="pull-right"><span class="glyphicon glyphicon-edit"></span></a>
														  </div>
														  <div class="panel-body">
														  	<div class="table-responsive table-condensed" id="table">
														  	<table class="table table-striped">

														    <tbody>
														  		<tr>
														        <th>Lieu d'Habitation</th>
														        <td><?php echo $fetch_info ["address"];?></td>
														      </tr>
														      <tr>
														        <th>E-mail</th>
														        <td><?php echo $fetch_info ["email"];?></td>
														      </tr>
														      <tr>
														        <th>Facebook</th>
														        <td><?php echo $fetch_info["facebook"];?></td>
														      </tr>
														      <tr>
														        <th>N° Telephone</th>
														        <td><?php echo $fetch_info ["codetel"].' ';?><?php echo $fetch_info ["tel"];?></td>
														      </tr>
														      <tr>
														        <th>Whatsapp</th>
														        <td><?php echo $fetch_info ["codewhat"].' ';?><?php echo $fetch_info ["whatsapp"];?></td>
														      </tr>
														      </tbody>
														  </table>
														  </div>
														  </div>
													</div>
													</div>
										          		
										          <div class="col-md-6">
										          	<div class="panel panel-default">
													  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">FONCTION AU TA

  														<a href="modifier_utilisateur_branche.php?id=<?php echo $id;?>" style="color:orange;" title="Modifier" class="pull-right"><span class="glyphicon glyphicon-edit"></span></a>
													  </div>
													  <div class="panel-body">
													  	<div class="table-responsive table-condensed">
													  		<table class="table table-striped">
														      
														    <tbody>
														  		<tr>
														        <th>Responsabilité</th>
														        <td><?php echo $fetch_info ["niveau"];?></td>
														      </tr>
														      <tr>
														        <th>Branche</th>
														        <td><?php echo $fetch_info ["branche"];?></td>
														      </tr>
														       
														      </tbody>
														  </table>
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

