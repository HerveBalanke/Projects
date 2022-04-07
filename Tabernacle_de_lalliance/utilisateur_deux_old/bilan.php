

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


		   			<?php
		   			require_once("../setup/connection.php");

		   			$count_mem=$con->query("select count(mid) as mem from membre;") or die (print_r($con->errorInfo()));
		   			$count_mem=$count_mem->fetch();
		   			$count_mem_max=$con->query("select count(mid) as max from membre where genre='M';") or die (print_r($con->errorInfo()));
		   			$count_mem_max=$count_mem_max->fetch();
		   			$count_mem_fem=$con->query("select count(mid) as fem from membre where genre='F';") or die (print_r($con->errorInfo()));
		   			$count_mem_fem=$count_mem_fem->fetch();
		   			$count_mem_ma=$con->query("select count(mid) as ma from membre where sit_mat='Marie(e)';") or die (print_r($con->errorInfo()));
		   			$count_mem_ma=$count_mem_ma->fetch();
		   			$count_mem_cel=$con->query("select count(mid) as cel from membre where sit_mat='Celibataire';") or die (print_r($con->errorInfo()));
		   			$count_mem_cel=$count_mem_cel->fetch();
		   			$count_mem_na=$con->query("select count( distinct pays) as na from membre;") or die (print_r($con->errorInfo()));
		   			$count_mem_na=$count_mem_na->fetch();

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
									<li class="active">
						       		 <a  href="bilan.php">Membres</a>
									</li>
									<li >
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
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> RAPPORT DES MEMBRES </b> </div>
  										<div class="panel-body">
  									
         										<div class="col-md-1"> </div>
         										<div class="col-md-10">
         										<div id="flash"></div>
         										<table class="table table-striped table-condensed table-hover">
												      <tr>
												        <th>Nombre De Membres</th>
												        <td> <?php echo $count_mem['mem']; ?> <br/> <br/>
												        	<b>M:</b> <?php echo $count_mem_max['max']; ?> &nbsp;&nbsp;&nbsp; <a href="rapport_masculin.php"> >>> </a><br/>
												        	<b>F:</b> <?php echo $count_mem_fem['fem']; ?> &nbsp;&nbsp;&nbsp; <a href="rapport_feminin.php"> >>> </a>
												        </td>
												      </tr>
												      <tr>
												        <th>Mariés </th>
												        <td><?php echo $count_mem_ma['ma']; ?> &nbsp;&nbsp;&nbsp; <a href="rapport_maries.php"> >>> </a></td>
												      </tr>
												      <tr>
												        <th>Celibataires</th>
												        <td><?php echo $count_mem_cel['cel']; ?> &nbsp;&nbsp;&nbsp; <a href="rapport_celibataire.php"> >>> </a></td>
												      </tr>
												      <tr>
												        <th>N° de Natiolanités Presentes</th>
												        <td><?php echo $count_mem_na['na']; ?> &nbsp;&nbsp;&nbsp; <a href="rapport_pays.php"> >>> </a></td>
												      </tr>
												  </table>
         										</div>
         										<div class="col-md-1"> </div>
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

	
 <script type="text/javascript">

$('').each(function() {
    var currentPage = 0;
    var numPerPage = 20;
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
    $pager.insertAfter($table).find('span.page-number:first').addClass('active');
});
          
  </script>



		</body>
			


</html>