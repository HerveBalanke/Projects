<?php  
include_once("session_deux.php");
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

            $culte=$_GET['culte'];
            $date=$_GET['date'];
            $orderdate = explode('-', $date);
                              $year = $orderdate[0];
                              $month   = $orderdate[1];


           $out_offrande_fiche=$con->query("select date, recette from offrande
            inner join evenement on offrande.evenement=evenement.eid where offrande.evenement='$culte' and YEAR(offrande.date) = '$year' AND MONTH(offrande.date) = '$month' order by offrande.date desc;
              ") or die (print_r($con->errorInfo()));
           $count_offrande_fiche=$out_offrande_fiche->rowCount();

           $out_offrande_fiche_sum=$con->query("select sum(recette) as sum from offrande
            inner join evenement on offrande.evenement=evenement.eid where offrande.evenement='$culte' and YEAR(offrande.date) = '$year' AND MONTH(offrande.date) = '$month';
              ") or die (print_r($con->errorInfo()));
           $fetch_sum= $out_offrande_fiche_sum->fetch();

           $out_evenement=$con->query("select evenement from evenement where eid='$culte';") or die (print_r($con->errorInfo()));
           $fetch_evenement=$out_evenement->fetch();
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
				    <h3 class="text-center">Rapports</h3>

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
                       <a  href="bilan.php">Membres</a>
                  </li>
                  <li class="active">
                    <a href="bilan_entrees.php" >Entrées</a>
                  </li>
                  <li>
                       <a  href="bilan_sorties.php">Sorties</a>
                  </li>
                  <li>
                       <a  href="bilan_groupe.php">Groupes</a>
                  </li>
                </ul>

									<br/>


					<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> STATISTIQUES DES OFFRANDES </b> 
                     <a href='bilan_entrees_stat.php?culte=<?php echo $culte;?>'id='retour' style="color:rgb(255, 213, 29);" title="Retournez a l'histogramme" class="pull-right"> <b> Retour </b> </a>
                      </div>
  										<div class="panel-body">

                  <div class="row">
        <div class="col-sm-1"> </div>
        <div class="col-sm-10">
    <div class="panel panel-default">
    <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> FICHE DES OFFRANDES - <?php echo strtoupper($fetch_evenement['evenement']); ?> - <?php echo $date; ?> </b> </div>
    <div class="panel-body">

                            <table class="table table-striped table-condensed table-hover" id="tab">
                          
                            <thead>
                              <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Recette (en GHS)</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                for($i=0; $i<$count_offrande_fiche; $i++){
                              $fetch_offrande_fiche=$out_offrande_fiche->fetch();
                                  ?>
                              <tr>
                                <td class="text-center"><?php echo $fetch_offrande_fiche['date'];?></td>
                                <td class="text-center"><?php echo $fetch_offrande_fiche['recette'];?></td>
                              </tr>
                            <?php 
                              } 
                           ?>
                           <tr>
                                <td class="text-center">&nbsp;</td>
                                <td class="text-center">&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="text-center"> <b>Total </b> </td>
                                <td class="text-center"> <b> <?php echo $fetch_sum['sum'];?> </b> </td>
                              </tr>
                            </tbody>
                          </table>

                  </div>
                  </div>

                     <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8 "> </div>
          <div class="col-md-2"></div>
          </div>

                  </div>
                    <div class="col-sm-1"> </div>
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
  <script src="../data_table/media/js/jquery.dataTables.min.js"></script>


     <script type="text/javascript">
     $(document).ready(function(){
      $('#tab').dataTable();
    });

  </script>


		</body>
			


</html>