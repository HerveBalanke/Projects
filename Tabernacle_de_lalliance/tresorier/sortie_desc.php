<?php  
include_once("../sessions/session_tresorier.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$treso=$_SESSION['tresorier'];
$soid=$_GET['soid'];
$out_sor=$con->query("select * from depense where did='$soid' and tresorier='$treso' and administrateur='-' and branche='$bid';") or die (print_r($con->errorInfo()));
$fetch_sor=$out_sor->fetch();
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
					      <li><a href="gerer_entrees.php">GERER ENTREES</a></li>
					      <li class="active"><a href="gerer_sorties.php">GERER SORTIES</a></li>
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
				    <h3 class="text-center"><b>GERER SORTIES</b></h3>

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
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> SORTIES </b> </div>
  										<div class="panel-body">

  											
  											<div class="panel panel-default">
											  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> DETAILS DE LA SORTIE</div>
											  <div class="panel-body">
											  	<div class="row">
         										<div class="col-md-10">
         										<div id="flash"></div>
         											<table class="table table-bordered">
												    <tbody>
												      <tr>
												      	<th>Date</th>
												        <td> <?php echo $fetch_sor['date']; ?> </td>
												      </tr>
												      <tr>
												      	<th>Montant (en GHS)</th>
												        <td> <?php echo $fetch_sor['montant']; ?></td>
												      </tr>
												      <tr>
												      	<th>Motif</th>
												        <td> <?php echo $fetch_sor['motif']; ?> </td>
												      </tr>
												      <tr>
												      	<th>Description</th>
												        <td> <?php echo $fetch_sor['description']; ?></td>
												      </tr>
												    </tbody>
												  </table>
         										</div>
         										<div class="col-md-2">
         											<a href="modifier_sortie.php? soid=<?php echo $soid;?>" title="Modifier" style="color:orange;" >Modifier <span class="glyphicon glyphicon-edit"></span></a>
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
	<script src="../data_table/media/js/jquery.dataTables.min.js"></script>

	<script>


		$("#flash").hide();

		$("#reset").click(function() {

		$('#check_montant').hide();
		$('#check_desc').hide();
		$('#check_date').hide();
		$('#check_motif').hide();
	 	$("#montant").focus();
		});

		$.fn.clearForm = function() {
  return this.each(function() {
    var type = this.type, tag = this.tagName.toLowerCase();
    if (tag == 'form')
      return $(':input',this).clearForm();
    if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'number' || type == 'email')
      this.value = '';
    else if (type == 'checkbox' || type == 'radio')
      this.checked = false;
    else if (tag == 'select')
      this.selectedIndex = 0;
  });
};


		$("#submit").click(function() {
	var soid=$("#soid").val();
	var date= $("#date").val();
	var desc= $("#desc").val();
	var mon= $("#montant").val();
	var motif= $("#motif").val();

if (date.length == 0 ) {
$('#check_date').html("*Choisissez une <strong>Date</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#date").focus(); 

$("#date").change(function(){ $('#check_date').hide();
});
return false;
}
else if (motif.length == 0) {
$('#check_motif').html("*Entrez un <strong>Motif</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#motif").focus(); 

$("#motif").change(function(){ $('#check_motif').hide();
});
return false;
}
else if (desc.length == 0) {
$('#check_desc').html("*Entrez une <strong>Description</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#desc").focus(); 

$("#desc").change(function(){ $('#check_desc').hide();
});
return false;
}
else if (mon.length == 0 ) {
$('#check_mon').html("*Entrez Le <strong>Montant</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#montant").focus(); 

$("#montant").change(function(){ $('#check_mon').hide();
});
return false;
}else{

var dataString = "soid="+soid +"&date="+ date + "&desc="+ desc +"&motif="+ motif +"&mon="+ mon ;

// alert(dataString);

$("#flash").show();
$("#flash").fadeIn(400).html(" <div class='progress'> <div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'><strong> Modification en cours...</strong></div></div>");
$.ajax({
type: "POST",
url: "modifier_sortie_eng.php",
data:dataString,
cache:true,
success: function(result){
	
	{
	if (result=="OK"){
	
	$("#flash").fadeIn(400).html(bootbox.alert("<b>Modification terminée.</b>" , function(result) {
			window.location.href ="gerer_sorties.php";
		}));
	$('#form_entree').clearForm();
	
		}
	}	
}  
});
return false;
}


});


</script>




		</body>
			


</html>