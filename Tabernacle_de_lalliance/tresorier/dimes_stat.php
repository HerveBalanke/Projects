<?php  
include_once("../sessions/session_tresorier.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$treso=$_SESSION['tresorier'];
$date=$_GET['date'];
$orderdate = explode('-', $date);
                  $year = $orderdate[0];
                  $month = $orderdate[1];
                  $date_q= $orderdate[0]."-".$orderdate[1];

$out_dime_fiche=$con->query("select * from dime where YEAR(date)='$year' and MONTH(date)='$month' and tresorier='$treso' and admin='oui' and branche='$bid' order by dime.diid desc;") or die (print_r($con->errorInfo()));
$count_dime_fiche=$out_dime_fiche->rowCount();

$out_dime_sum=$con->query("select sum(montant) as sum from dime where YEAR(date)='$year' and MONTH(date)='$month' and tresorier='$treso' and admin='oui' and branche='$bid';") or die (print_r($con->errorInfo()));
$fetch_dime_sum=$out_dime_sum->fetch();
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
                <li class="active"><a href="gerer_entrees.php">GERER ENTREES</a></li>
                <li><a href="gerer_sorties.php">GERER SORTIES</a></li>
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
            <h3 class="text-center"> <b> GERER ENTREES </b></h3>

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
                       <a  href="gerer_entrees.php">OFFRANDES</a>
                  </li>
                  <li class="active"><a href="dimes_entree.php" >DIMES</a>
                  </li>
                </ul> 

                  <br/>


          <div class="panel panel-default">
                      <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> STATISTIQUES DES DIMES</b> 
                        <!-- <a href='dimes_entree.php' style="color:rgb(255, 213, 29);" title="Retour ?? la page principale" class="pull-right"> <b> Retour </b> </a>  -->
                      </div>
                      <div class="panel-body">

                  <div class="row">
        <div class="col-sm-1"> </div>
        <div class="col-sm-10">
    <div class="panel panel-default">
    <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> FICHE DES ENTREES - DIMES - <?php echo $date_q; ?> </b> </div>
    <div class="panel-body">
      
                            <div class="table-responsive">
                            <table class="table table-striped table-condensed table-hover" id="tab">
                          
                            <thead>
                              <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Membre</th>
                                <th class="text-center">Montant (en GHS)</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                for($i=0; $i<$count_dime_fiche; $i++){
                              $fetch_dime_fiche=$out_dime_fiche->fetch();
                                  ?>
                              <tr>
                                <td class="text-center"><?php echo $fetch_dime_fiche['date'];?></td>
                                <td class="text-center"><?php echo $fetch_dime_fiche['membre'];?></td>
                                <td class="text-center"><?php echo $fetch_dime_fiche['montant'];?></td>
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
                                <td class="text-center"> <b><?php echo $fetch_dime_sum['sum']; ?> </b></td>
                              </tr>
                            </tbody>
                          </table>
                          </div>

                  </div>
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


   <script type="text/javascript">
   $(document).ready(function(){
    $('#tab').dataTable();
  });
   </script>


    </body>
      


</html>