<?php  
include_once("../sessions/session_admin.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$admin=$_SESSION['admin'];
 $out_dime_fiche=$con->query("select distinct extract(year from date) as year , extract(month from date) as month FROM dime where 
  tresorier!='-' and usher='oui' and admin='oui' and admin_id='$admin' and branche='$bid' ORDER BY date desc;
") or die (print_r($con->errorInfo()));
$count_dime_fiche=$out_dime_fiche->rowCount();
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
   			<link type="text/css" rel="stylesheet" href="../Lib_bootstrap/pagination.css"  >
   			<link href="../jasny/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
   			<link rel="stylesheet" type="text/css" href="../Lib_bootstrap/dist/sweetalert.css">
        <link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">
   			<script src="../3/js/fusioncharts.js"></script>
   			<script src="../3/js/themes/fusioncharts.theme.fint.js"></script>

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
                <li><a href="ajouter_utilisateur.php">GERER UTILISATEURS</a></li>
                <li><a href="gerer_entrees.php">GERER ENTREES</a></li>
                <li ><a href="sorties_confirmation.php">GERER SORTIES</a></li>
                <li class="active"><a href="bilan.php">RAPPORTS</a></li>
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
				    <h3 class="text-center"><b>RAPPORTS</b></h3>

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
                       <a  href="bilan.php">MEMBRES</a>
                  </li>
                  <li class="active">
                    <a href="bilan_entrees.php" >ENTREES</a>
                  </li>
                  <li>
                       <a  href="bilan_sorties.php">SORTIES</a>
                  </li>
                  <li>
                       <a  href="bilan_groupe.php">GROUPES</a>
                  </li>
                </ul>

                    <br/>

					<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> STATISTIQUES DES DIMES </b> 
                        <input type="hidden" id="user" value="<?php echo '<br/><br/> Par: '.$_SESSION['uname']; ?>">
                        <input type="hidden" id="title" value="STATISTIQUES DES DIMES <br/><br/><br/>" >
                        <!-- <a href='bilan_entrees.php'id='retour' style="color:rgb(255, 213, 29);" title="Retournez vers le bilan des entrees" class="pull-right"> <b> Retour </b> </a> -->
                      </div>
  										<div class="panel-body">


  								<div class="panel panel-default" id="tabone">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> HISTOGRAMME</b> </div>
  										<div class="panel-body">
  										<div id="chart-1"></div>


<?php

include("../1/wrappers 2/php-wrapper/fusioncharts.php"); 

$out_dime=$con->query("select * from (select distinct extract(year from date) as year , extract(month from date) as month FROM dime  where tresorier!='-' and usher='oui' and admin='oui' and admin_id='$admin' and branche='$bid' ORDER BY date desc limit 6) as tab order by tab.year, tab.month asc;") or die (print_r($con->errorInfo()));

$cata= array();
$set_1= array();
//$set_2= array();
//$set_3= array();
// select * from (
//     select * from your_table order by id desc limit 20
// ) tmp order by tmp.id asc

while($fetch_dime=$out_dime->fetch()){

$date_q = $fetch_dime['year']."-".$fetch_dime['month'];

$yearc=$fetch_dime['year'];
$monthc=$fetch_dime['month'];

$out_dime_c_sum=$con->query("select sum(montant) as sum FROM dime where year(date)='$yearc' and month(date)='$monthc' and tresorier!='-' and usher='oui' and admin='oui' and admin_id='$admin' and branche='$bid';") or die (print_r($con->errorInfo()));
$fetch_sum=$out_dime_c_sum->fetch();

  array_push($cata, array(
    "label" => $date_q
                         )
            );

  array_push($set_1, array(
    "value" => $fetch_sum['sum']
                         )
            );
  /*array_push($set_2, array(
    "label" => $fetch_offrande['date']
                         )
            );
  array_push($set_3, array(
    "label" => $fetch_offrande['date']
                         )
            );*/

}

$arrData = array(
"chart"=> array(
        "caption"=> "Historique des Dimes " ,
        //"subcaption"=> "",
        "xaxisname"=> "Date",
        "yaxisname"=> "Montant (en GHS)",
        "numberprefix"=> "GHS",
        "theme"=> "fint"
    ),

"categories" =>array(

                array(

                        "category"=> array( 

                                       $cata
                                     
                                      )
                      )
                ),

"dataset"=> array(
        /*array(
            "seriesname" =>"Actual Revenue",
            "data"=> array(
                $set_1
                
            )
        ),*/
        array(
            //"seriesname" => "Projected Revenue",
            "renderas"=> "",
            "showvalues"=> "1",
            "data"=> array(

               $set_1
            )
        )/*,
        array( "seriesname" => "Profit",
            "renderas" => "area",
            "showvalues"=> "0",
            "data"=> array(
               $set_1
            )
        )*/
        )
    
    );

$jsonEncodedData = json_encode($arrData);

$mscombi2dChart = new FusionCharts("mscombi2d", "ex3", "100%", 400, "chart-1", "json", $jsonEncodedData);
// Render the chart
$mscombi2dChart->render();

 // krsort($cata);
 // krsort($set_1);
 // print_r($cata);
 // print_r($set_1);
?>


  								</div>
    							</div>

                  <div class="row">
        <div class="col-sm-1"> </div>
        <div class="col-sm-10">
    <div class="panel panel-default">
    <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> LISTE DES MOIS </b> </div>
    <div class="panel-body">
      
                            <div class="table-responsive">
                            <table class="table table-striped table-condensed table-hover" id="tab">
                          
                            <thead>
                              <tr>
                                <th class="text-center">Mois</th>
                                <th class="text-center">Montant (en GHS)</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                for($i=0; $i<$count_dime_fiche; $i++){
                              $fetch_dime_fiche=$out_dime_fiche->fetch();
                              $date_q = $fetch_dime_fiche['year']."-".$fetch_dime_fiche['month'];
                                  ?>
                              <tr>
                                <td class="text-center"><a href='rapport_fiche_dime.php?date=<?php echo $date_q;?>' ><?php echo $date_q;?> </a></td>
                                <td class="text-center"><?php
                                $year=$fetch_dime_fiche['year'];
                                $month=$fetch_dime_fiche['month'];
                                $out_dime_fiche_sum=$con->query("select sum(montant) as sum FROM dime where year(date)='$year' and month(date)='$month' and tresorier!='-' and usher='oui' and admin='oui' and admin_id='$admin' and branche='$bid'; ") or die (print_r($con->errorInfo()));
                             $fetch_sum=$out_dime_fiche_sum->fetch();
                              echo $fetch_sum['sum'];?></td>
                              </tr>
                            <?php 
                              } 
                           ?>
                            </tbody>
                          </table>
                          </div>

                  </div>
                  <a href="javascript:print()" class="btn">Imprimer <span class="glyphicon glyphicon-print"></span></a>
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
  <script src="../Lib_bootstrap/print/printThis.js"></script>


    <script type="text/javascript">

        $(document).ready(function(){
        $('#tab').dataTable();
        });

        function print()
            {

        var user= $('#user').val();
        var title = $('#title').val();


        $('#tabone, #tab').printThis({
            importCSS: false,
            printContainer: false,
            header: title,
            footer: user 
              

        });
      }
        </script>


		</body>
			


</html>