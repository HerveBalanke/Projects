<?php  
include_once("../sessions/session_secretaire.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];

$emid=$_GET['email_id'];
$out_emid=$con->query("select * from email where emid='$emid' and branche='$bid';") or die (print_r($con->errorInfo()));
$fetch_emid=$out_emid->fetch();
$out_det=$con->query("select * from email_envoi
inner join membre on email_envoi.address=membre.email where email_envoi.emailid ='$emid' and membre.branche='$bid' order by emailid desc;") or die (print_r($con->errorInfo()));
$count_det=$out_det->rowCount();
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
					      <li><a href="membre_out.php">GERER MEMBRES</a></li>
					      <li><a href="gerer_groupe.php">GERER GROUPES</a></li>
					      <li class="active"><a href="communication.php">COMMUNICATION</a></li>
					    </ul>
				      <ul class="nav navbar-nav navbar-right" id="dec">
				        <li ><a href="../sessions/logout.php" style="color:rgb(130, 0, 31);"><span class="glyphicon glyphicon-log-in"></span> Deconnection</a></li>
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
				    <h3 class="text-center"><b>COMMUNICATION</b></h3>

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
						       		 <a  href="communication.php">SMS</a>
									</li>
									<li class="active">
										<a href="email.php" >Email</a>
									</li>
								</ul>

										<br/>

								<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> Details du Mail </b> 
  										 <a href='email.php' style="color:rgb(255, 213, 29);" title="Retournez a la page d'envoi" class="pull-right"> <b> Retour </b> </a>
  										</div>
  										<div class="panel-body">
  							
         										<div id="flash"></div>
         										<div class="row"> 
         										<div class="col-md-2"> </div>
         										<div class="col-md-8"> 
         										<div class="panel panel-default">
  												<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> Mail </b> </div>
         										<div class="panel-body">

         										<table class="table table-striped">
												<thead>
												  <tr>
												    <th class="text-center"> Date: <?php echo $fetch_emid['date'];?></th>
												  </tr>
												</thead>
												<tbody>
												  <tr>
												    <td class="text-center" > <?php echo $fetch_emid['text'];?> </td>
												  </tr>
												</tbody>
												</table>
												</div>
												</div>
										          	
										<div class="col-md-2"> </div>
									</div>
								</div>



								<div class="row"> 
         										<div class="col-md-1"> </div>
         										<div class="col-md-10"> 
         										<div class="panel panel-default">
  												<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> Recepteurs</b> </div>
         										<div class="panel-body">

         										<table class="table table-striped">
												    <thead>
												      <tr>
												        <th></th>
												      </tr>
												    </thead>
												    <tbody>
												       	<?php
												       	if ($count_det>0){
												       		
													    	for($i=0; $i<$count_det; $i++){
															$fetch_det=$out_det->fetch();
													    		?>
													      <tr>
													        <td> <?php echo $fetch_det['email'];?> - <?php echo $fetch_det['nom'];?> <?php echo $fetch_det['prenom'];?></td>
													      </tr>
													      <?php 
													  	} 
													  }else if($count_det<=0){ 

													  	$out_detn=$con->query("select address from email_envoi where emailid ='$emid';") or die (print_r($con->errorInfo()));
											   			$count_detn=$out_detn->rowCount();

													    	for($i=0; $i<$count_detn; $i++){
															$fetch_detn=$out_detn->fetch();
													  	?>
													  	<tr>
													        <td> <?php echo $fetch_detn['address'];?> </td>
													      </tr>

													  <?php 
													  }
													}
													 ?>
												    </tbody>
												  </table>
												</div>
												</div>
										          	
										<div class="col-md-1"> </div>
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
    $('#tab').dataTable();
	});
	</script>





		</body>
			


</html>