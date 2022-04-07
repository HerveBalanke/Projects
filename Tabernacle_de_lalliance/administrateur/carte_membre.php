<?php  
// include_once("session_admin.php");
require_once("../setup/connection.php");
  $bid=$_SESSION['bid'];
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
 inner join branche on membre.branche=branche.bid
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

		   				<div class="container">
      				  	<div class="row">
         		 		<div class="col-md-2"> </div>
         		 		<div class="col-md-6"> 
		   				<div class="panel panel-default">
						<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">CARTE TA</div>
						<div class="panel-body">

						<div class="container">

      				  	<div class="row">
         		 		<div class="col-md-2">

         		 	
         		 	<img src="<?php echo $fetch_out_membre ["photo"];?>" class="img-rounded img-responsive" alt="photo" style="width:170px;height:170px" >
              <br>
              <div class="row">
                <div class="col-md-2"> </div>
                <div class="col-md-8">
              <span class="text-center"> <b> Le Pasteur </b> </span>
            </div>
            <div class="col-md-2"> </div>
            </div>
         		 
         		 </div>
         		 <div class="col-md-3">
               <div class="row">
                <div class="col-md-2"> </div>
                <div class="col-md-8">
              <img src="../images/t_id.jpg" class="img-rounded img-responsive" alt="logo"  style="width:150px;height:75px" >
            </div>
            <div class="col-md-2"> </div>
          </div>
              <br>
         		 	<table class="table table-hover">
      <tr>
        <th>Nom</th>
        <td><?php echo $fetch_out_membre ["nom"];?></td>
      </tr>
      <tr>
        <th>Prenom</th>
        <td><?php echo $fetch_out_membre ["prenom"];?></td>
      </tr>
      <tr>
        <th>Date de Naissance</th>
        <td><?php echo $fetch_out_membre ["dob"];?></td>
      </tr>
      <tr>
        <th>Nationalité</th>
         <td><span class="bfh-countries" data-country="<?php echo $fetch_out_membre ["pays"];?>" data-flags="true"></span></td>
      </tr>
      <tr>
        <th>Profession</th>
        <td><?php echo $fetch_out_membre ["profession"];?></td>
      </tr>
      <tr>
        <th>Fonction au TA</th>
        <td><?php echo $fetch_out_membre ["activite_ac"];?></td>
      </tr>
      <tr>
        <th>Branche</th>
        <td><?php echo $fetch_out_membre ["branche"];?></td>
      </tr>
      
  </table>



  					
  					</div>
         		 </div>
         		 </div>
         		 </div>
         		 </div>
         		 <div class="col-md-1"> </div>
         		 

         		 </div>
         		 </div>
         		 </div>










		   			</body>



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
