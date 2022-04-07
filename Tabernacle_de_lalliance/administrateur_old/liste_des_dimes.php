

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

   			  <style>


					  @media print {

					    #printtable{
					  visibility:visible;
					  position:absolute;
					 top:0px;
					//left:15px;
					font-family: "Arial", Times, serif;
					font-size:11px;
					 width:750px;
					    }

					    body, #retour {
					  visibility:hidden;
					}
					}

			</style>


		   			<?php

		   			require_once("../setup/connection.php");

		   	$date=$_GET['date'];
            $orderdate = explode('-', $date);
                              $year = $orderdate[0];
                              $month = $orderdate[1];
                              $date_q= $orderdate[0]."-".$orderdate[1];

            $out_dime_fiche=$con->query("select * from dime where YEAR(date)='$year' and MONTH(date)='$month' order by dime.diid desc;") or die (print_r($con->errorInfo()));
           $count_dime_fiche=$out_dime_fiche->rowCount();

           $out_dime_sum=$con->query("select sum(montant) as sum from dime where YEAR(date)='$year' and MONTH(date)='$month';") or die (print_r($con->errorInfo()));
           $fetch_dime_sum=$out_dime_sum->fetch();

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
				    <h3 class="text-center">Gerer Entrées</h3>

				  </div>
      	</div>
        </div>
      </div>
    </div>


    	<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">


    							<div class="panel panel-default" id="printtable">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> FICHE DES DIMES - <?php echo $date_q; ?> </b>
  										<a href='dimes_stat.php?date=<?php echo $date_q; ?>'id='retour' style="color:rgb(255, 213, 29);" title="Retournez aux Statistiques" class="pull-right"> <b> Retour </b> </a> 

  										</div>
  										<div class="panel-body">
                            <table class="table table-striped table-condensed table-hover">
                          
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

       		<div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8 "> <a href="javascript:window.print();" title="Imprimez La Page" class="btn">Imprimer <span class="glyphicon glyphicon-print"></span></a></div>
          <div class="col-md-2"></div>
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

	    <script type="text/javascript">

$('table.table-hover').each(function() {
    var currentPage = 0;
    var numPerPage = 15;
    var $table = $(this);
    $table.bind('repaginate', function() {
        $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
    });
    $table.trigger('repaginate');
    var numRows = $table.find('tbody tr').length;
    var numPages = Math.ceil(numRows / numPerPage);
    var $pager = $('<div class="pager"></div>');
    for (var page = 0; page < numPages; page++) {
        $('<span class="page-number"></span>').text(page + 1).bind('click', {
            newPage: page
        }, function(event) {
            currentPage = event.data['newPage'];
            $table.trigger('repaginate');
            $(this).addClass('active').siblings().removeClass('active');
        }).appendTo($pager).addClass('clickable');
    }
    $pager.insertAfter(printtable).find('span.page-number:first').addClass('active');
});
          
  </script>


			</body>
			


</html>