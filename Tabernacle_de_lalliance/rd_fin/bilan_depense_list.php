<?php  
include_once("../sessions/session_rd_fin.php");
require_once("../setup/connection.php");
$rd_fin=$_SESSION['rd_fin'];
$bid=$_GET['bid'];

$date=$_GET['date'];
$orderdate = explode('-', $date);
$year = $orderdate[0];
$month = $orderdate[1];
$date_q= $orderdate[0]."-".$orderdate[1];

$out_depense_fiche=$con->query("select * from depense where YEAR(date)='$year' and MONTH(date)='$month' and tresorier!='-' and administrateur='oui' and branche='$bid' order by did desc;") or die (print_r($con->errorInfo()));
$count_depense_fiche=$out_depense_fiche->rowCount();

$out_depense_sum=$con->query("select sum(montant) as sum from depense where YEAR(date)='$year' and MONTH(date)='$month' and tresorier!='-' and administrateur='oui' and branche='$bid';") or die (print_r($con->errorInfo()));
$fetch_depense_sum=$out_depense_sum->fetch();
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
                <li><a href="rapport.php">GERER ENTREES</a></li>
                <li class="active"><a href="branche_sortie.php">GERER SORTIES</a></li>
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

					<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> RAPPORT DES SORTIES</b> 
                        <!-- <a href='bilan_sorties.php'id='retour' style="color:rgb(255, 213, 29);" title="Retournez à l'histogramme" class="pull-right"> <b> Retour </b> </a> -->
                      </div>
  										<div class="panel-body">

                  <div class="row">
        <div class="col-sm-1"> </div>
        <div class="col-sm-10">
    <div class="panel panel-default">
    <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> FICHE DES SORTIES - <?php echo $date_q; ?> </b> </div>
    <input type="hidden" id="user" value="<?php echo '<br/><br/> Par: '.$_SESSION['uname']; ?>">
    <input type="hidden" id="title" value="FICHE DES SORTIES - <?php echo $date_q; ?> <br/><br/><br/>" >
    <div class="panel-body">
                            <table class="table table-striped table-condensed table-hover" id="tab">
                          
                            <thead>
                              <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Motif</th>
                                <th class="text-center">Montant (en GHS)</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                for($i=0; $i<$count_depense_fiche; $i++){
                              $fetch_depense_fiche=$out_depense_fiche->fetch();
                                  ?>
                              <tr>
                                <td class="text-center"><?php echo $fetch_depense_fiche['date'];?></td>
                                <td class="text-center"> <a href="sortie_desc_rap.php?soid=<?php echo $fetch_depense_fiche['did'];?>& date=<?php echo $date;?>&bid=<?php echo $bid;?>"> <?php echo $fetch_depense_fiche['motif'];?> </a></td>
                                <td class="text-center"><?php echo $fetch_depense_fiche['montant'];?></td>
                              </tr>
                             
                            <?php 
                              } 
                           ?>
                            <tr>
                              <td>&nbsp; </td>
                              <td> &nbsp;</td>
                              <td> &nbsp;</td>
                              </tr>
                              <tr>
                                <td class="text-center"> <b> Total </b></td>
                                <td class="text-center">&nbsp;</td>
                                <td class="text-center"> <b><?php echo $fetch_depense_sum['sum']; ?> </b></td>
                              </tr>
                            </tbody>
                          </table>
                          <a href="javascript:print()" class="btn">Imprimer <span class="glyphicon glyphicon-print"></span></a>

                  </div>
                  </div>

                  <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8 "> 
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


        $('#tab').printThis({
            importCSS: false,
            printContainer: false,
            header: title,
            footer: user 
              

        });
      }
    </script>

		</body>
			


</html>