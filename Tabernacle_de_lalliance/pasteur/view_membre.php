<?php  
include_once("../sessions/session_pasteur.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$pasteur=$_SESSION['pasteur'];
$mid=$_GET['mid'];
$out_membre=$con->query("select * from membre
 inner join t_membre on membre.t_membre=t_membre.tmid
 inner join profession on membre.profession=profession.pid
 inner join filiere on membre.filiere=filiere.fid
 inner join ecole on membre.ecole=ecole.eid
 inner join info_spi on membre.info_spi=info_spi.isid
 inner join urgence on membre.per_urgence=urgence.uid
 inner join eglise on info_spi.a_eglise=eglise.egid
 inner join activite_ac on membre.activite_ac=activite_ac.acaid 
 inner join activite on info_spi.ae_activite=activite.acid
 inner join relation on urgence.relation=relation.rid
 where membre.mid='$mid' and branche='$bid'
 ;") or die(print_r($con->errorInfo()));

$fetch_out_membre= $out_membre->fetch();
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
									<br/>

									<div id="flash"> </div>

										<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> INFORMATION DU MEMBRE </b> 
  											<!-- <a href='membre_out.php' style="color:rgb(255, 213, 29);" title="Retour à La Liste des Membres" class="pull-right"> <b> Retour </b> </a>  -->
  										</div>
  										<div class="panel-body">

										        <div class="row">
										          <div class="col-md-6">
										          		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												 		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										          	<img src="<?php echo $fetch_out_membre ["photo"];?>" class="img-thumbnail img-responsive" alt="Cinque Terre" style="width:300px;height:300px">

										          		<div class="panel panel-default">
														  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">ADDRESSE
														  </div>
														  <div class="panel-body">
														  	<div class="table-responsive table-condensed" id="table">
														  	<table class="table table-striped">

														    <tbody>
														  		<tr>
														        <th>Lieu d'Habitation</th>
														        <td><?php echo $fetch_out_membre ["address"];?></td>
														      </tr>
														      <tr>
														        <th>E-mail</th>
														        <td><?php echo $fetch_out_membre ["email"];?></td>
														      </tr>
														      <tr>
														        <th>Facebook</th>
														        <td><?php echo $fetch_out_membre ["facebook"];?></td>
														      </tr>
														      <tr>
														        <th>N° Telephone</th>
														        <td><?php echo $fetch_out_membre ["codetel"];?> <?php echo $fetch_out_membre ["tel"];?></td>
														      </tr>
														      <tr>
														        <th>Whatsapp</th>
														        <td> <?php echo $fetch_out_membre ["codewhat"];?>  <?php echo $fetch_out_membre ["whatsapp"];?></td>
														      </tr>
														      </tbody>
														  </table>
														  </div>

														  </div>
														</div>
										          	</div>

										          	<div class="col-md-6">

										          		<div class="panel panel-default">
													  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">INFORMATION PERSONELLE
													  </div>
													  <div class="panel-body">
													  	<div class="table-responsive table-condensed">
													  	<table class="table table-striped">
														      
														    <tbody>
														    	<tr>
														        <th>Identifiant</th>
														        <td><?php echo $fetch_out_membre ["mid"];?></td>
														      </tr>
														    <tr>
														        <th>Nom</th>
														        <td><?php echo $fetch_out_membre ["nom"];?></td>
														      </tr>
														      <tr>
														        <th>Prenom</th>
														        <td><?php echo $fetch_out_membre ["prenom"];?></td>
														      </tr>
														      <tr>
														        <th>Genre</th>
														        <td><?php echo $fetch_out_membre ["genre"];?></td>
														      </tr>
														      <tr>
														        <th>Date de Naissance</th>
														        <td><?php echo $fetch_out_membre ["dob"];?></td>
														      </tr>
														      <tr>
														        <th>Pays d'Origine</th>
														        <td><span class="bfh-countries" data-country="<?php echo $fetch_out_membre ["pays"];?>" data-flags="true"></span></td>
														      </tr>
														      <tr>
														        <th>Profession</th>
														        <td><?php echo $fetch_out_membre ["profession"];?></td>
														      </tr>
														      <tr>
														        <th>Filiere</th>
														        <td><?php echo $fetch_out_membre ["filiere"];?></td>
														      </tr>
														      <tr>
														        <th>Ecole/Universite</th>
														        <td><?php echo $fetch_out_membre ["ecole"];?></td>
														      </tr>
														      <tr>
														        <th>Situation Matrimoniale</th>
														        <td><?php echo $fetch_out_membre ["sit_mat"];?></td>
														      </tr>
														      <tr>
														        <th>Nombre d'Enfant</th>
														        <td><?php echo $fetch_out_membre ["nbre_denfant"];?></td>
														      </tr>
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
													  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">INFORMATION SUR LE PLAN SPIRITUEL
													  </div>
													  <div class="panel-body">
													  	<div class="table-responsive table-condensed" id="table">
													  		<table class="table table-striped">
														      
														    <tbody>
														  		<tr>
														        <th>Temps en Jesus</th>
														        <td><?php echo $fetch_out_membre ["temps"];?></td>
														      </tr>
														      <tr>
														        <th>Baptisé(e) par Immersion?</th>
														        <td><?php 
														        if($fetch_out_membre ["bapt_immersion"]=='o'){
														        echo 'Oui';
														    	}else if($fetch_out_membre ["bapt_immersion"]=='n'){
														    	echo 'Non';
														    	}
														        ?></td>
														      </tr>
														      <tr>
														        <th>Ancienne Eglise</th>
														        <td><?php echo $fetch_out_membre ["eglise"];?></td>
														      </tr>
														      <tr>
														        <th>Activité dans l'Ancienne Eglise</th>
														        <td><?php echo $fetch_out_membre ["activite"];?></td>
														      </tr>
														      <tr>
														        <th>Statut Actuel au TA</th>
														        <td><?php echo $fetch_out_membre ["type"];?></td>
														      </tr>
														      <tr>
														        <th>Activité au TA</th>
														        <td><?php echo $fetch_out_membre ["activite_ac"];?></td>
														      </tr>
														      </tbody>
														  </table>
														  </div>
													  </div>
													</div>





										          	</div>

										          	<div class="col-md-6">

										          		<div class="panel panel-default">
														  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">PERSONNE A CONTACTER EN CAS D’URGENCE
														  </div>
														  <div class="panel-body">
														  	<div class="table-responsive table-condensed" id="table">
														  		<table class="table table-striped">
														      
														    <tbody>
														  		<tr>
														        <th>Nom</th>
														        <td><?php echo $fetch_out_membre ["nom_ur"];?></td>
														      </tr>
														      <tr>
														        <th>Prenom</th>
														        <td><?php echo $fetch_out_membre ["prenom_ur"];?></td>
														      </tr>
														      <tr>
														        <th>N° Telephone</th>
														        <td> <?php echo $fetch_out_membre ["codetel_ur"];?> <?php echo $fetch_out_membre ["tel_ur"];?></td>
														      </tr>
														      <tr>
														        <th>e-mail</th>
														        <td><?php echo $fetch_out_membre ["email_ur"];?></td>
														      </tr>
														      <tr>
														        <th>Relation</th>
														        <td><?php echo $fetch_out_membre ["relation"];?></td>
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

