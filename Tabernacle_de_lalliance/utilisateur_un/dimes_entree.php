	<?php  
	include_once("../sessions/session_tresorier.php");
	require_once("../setup/connection.php");
	$bid=$_SESSION['bid'];
	$treso=$_SESSION['tresorier'];
	$out_mem=$con->query("select * from membre where branche='$bid';") or die (print_r($con->errorInfo()));
	$count_mem=$out_mem->rowCount();

	$out_dime=$con->query("select * from dime
	inner join membre on dime.membre=membre.mid where tresorier='$treso' and confirmation='non' and offrande.branche='$bid' ORDER BY date desc;
		") or die (print_r($con->errorInfo()));
	$count_dime=$out_dime->rowCount();

	$out_dime_ush=$con->query("select * from dime
	inner join membre on dime.membre=membre.mid where tresorier='$treso' and usher='non' and offrande.branche='$bid' ORDER BY date desc;
		") or die (print_r($con->errorInfo()));
	$count_dime_ush=$out_dime_ush->rowCount();
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

          				<ul  class="nav nav-tabs">
									<li >
						       		 <a  href="gerer_entrees.php">Offrandes</a>
									</li>
									<li class="active"><a href="dimes_entree.php" >Dimes</a>
									</li>
								</ul>

										<br/>

								<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> DIMES </b>
  											<?php 
  											if($count_dime>0){ ?>
  										<a href='dime_rejetees.php' style="color:rgb(255, 213, 29);" title="Entrées rejetées" class="pull-right"> <b> Entrées rejetées </b>  <span class="badge" style="color:rgb(130, 0, 31); background:rgb(255, 213, 29);"><b> <?php echo $count_dime ;?> </b></span> </a> 
  											<?php 
  											}
  											?>
  											<?php 
  											if($count_dime_ush>0){ ?>
  										<a href='dime_rejetees_ush.php' style="color:rgb(255, 213, 29);" title="Vérifier les entrées" class="pull-right"> <b> Entrées à vérifier </b>  <span class="badge" style="color:rgb(130, 0, 31); background:rgb(255, 213, 29);"><b> <?php echo $count_dime ;?> </b></span> </a> 
  											<?php 
  											}
  											?>
  										</div>
  										<div class="panel-body">

  											<div class="row">
  											<div class="col-md-6">
  											<div class="panel panel-default">
											  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">FAITES UNE ENTREE</div>
											  <div class="panel-body">
											  	<div class="row">
         										<div class="col-md-1"> </div>
         										<div class="col-md-10">
         										<div id="flash"></div>
         										<form class="form-horizontal"  method="POST" id="form_entree" action="dimes_entree.php" multipart/form-data role="form">
											  	<input type="hidden" class="form-control" id="tid" value="<?php echo $treso; ?>">
											  	<div class="form-group">
														    <label class="control-label col-sm-3" for="date">Date:</label>
														    <div class="col-sm-9"> 
														     <div class="bfh-datepicker" data-format="y-m-d" data-date="today" id="date">
															  <div class="input-prepend bfh-datepicker-toggle" data-toggle="bfh-datepicker">
															    <span class="add-on"><i class="icon-calendar"></i></span>
															    <input type="text" class="input-medium" readonly>
															  </div>
															  <div class="bfh-datepicker-calendar">
															    <table class="calendar table table-bordered">
															      <thead>
															        <tr class="months-header">
															          <th class="month" colspan="4">
															            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
															            <span></span>
															            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
															          </th>
															          <th class="year" colspan="3">
															            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
															            <span id="year"></span>
															            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
															          </th>
															        </tr>
															        <tr class="days-header">
															        </tr>
															      </thead>
															      <tbody>
															      </tbody>
															    </table>
															  </div>
															</div>
															<div id='check_date' style="color:red"></div>
														    </div>
														  </div>

													<div class="form-group">
														    <label class="control-label col-sm-3" for="id">ID du Membre</label>
														    <div class="col-sm-9"> 
																   <select class="form-control" id="id" >
																   	<option><b>--- Selectionnez un Membre --- </b></option>

																	<?php
																	for($i=0; $i<$count_mem; $i++){
																		$fetch_mem=$out_mem->fetch();

																	?>
																    <option value= "<?php echo $fetch_mem ["mid"];?>"> 
																    <?php echo $fetch_mem ["mid"];?>
																    
																    <?php
																	}

																    ?>

																	</option>

																  </select>
																  <div id='check_id' style="color:red"></div>
														    </div>
														  </div>

													<div class="form-group">
														    <label class="control-label col-sm-3" for="montant">Montant:</label>
														    <div class="col-sm-9">
														    	<div class="input-group"> 
															        <span class="input-group-addon">¢</span>
															        <input type="number" min="0"  step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" placeholder="Entrez le Montant"
															                  id="montant"  maxlength="11" class="form-control currency" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57">
															    </div>
														    	<div id='check_montant' style="color:red"></div>
														    </div>
														  </div>

														  <div class="form-group"> 
														    <div class="col-sm-offset-2 col-sm-10">
														      <button type="button" id="submit" name="submit" class="btn btn-default">Sauvegarder</button> &nbsp;&nbsp;&nbsp;
														      <button type="reset" id="reset" name="reset" class="btn btn-default">Reprendre</button>
														    </div>
														  </div>

												</form>
         										</div>
         										<div class="col-md-1"> </div>
         										</div>
											  	
											</div>
											</div>
											</div>
											<div class="col-md-6">
											<div class="panel panel-default">
											  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">ENTREES DES MOIS </div>
											  <div class="panel-body" id="mois">
												<?php include_once('mois_dimes.php'); ?>										  	
											 </div>
											</div>
											</div>
											</div>

											<div class="row">
  											<div class="col-md-2"></div>
  											<div class="col-md-8">
  											<div class="panel panel-default">
											  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">ENTREES RECENTES</div>
											  <div class="panel-body">
											  <div id="er">	
											  	<?php include_once('er_dime.php'); ?>
												  </div>
												  </div>
											</div>
  											</div>
  											<div class="col-md-2"></div>
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
    $('#tabone').dataTable();
	});
	 $(document).ready(function(){
    $('#tabtwo').dataTable();
	});

	 function sup_did(did, id)
						{
						var info="did="+ did + "&id="+ id;
						bootbox.confirm("<b>Supprimer l'entrée?</b>" , function(result) {
						if(result)
						{
							$.ajax({
							type: "POST",
							url: "supprimer_dime.php",
							data: info,
							cache:true,
							processData:false,
							success: function(response){
								{
									if(response=="OK"){
								$('#mois').load("mois_dimes.php");
								$('#er').load("er_dime.php");
								bootbox.alert("<b>Entrée supprimée</b>");
								}else if (response=="USED"){
								$('#mois').load("mois_dimes.php"); 
								$('#er').load("er_dime.php");
								bootbox.alert("<b>Donnée en cours d'utilisation... </b>");
								}
								}
	
								}
									});		  
										}
											});
								
						}

	</script>

	<script>
	$(function() {

		$("#flash").hide();

		$("#reset").click(function() {

		$('#check_montant').hide();
		$('#check_id').hide();
		$('#check_date').hide();
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
	var tid= $("#tid").val();
	var date= $("#date").val();
	var id= $("#id").val();
	var mon= $("#montant").val();

if (date.length == 0 ) {
$('#check_date').html("*Choisissez une <strong>Date</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#date").focus(); 

$("#date").change(function(){ $('#check_date').hide();
});
return false;
}
else if (id.length == 0 || id=="--- Selectionnez un membre ---") {
$('#check_id').html("*Selectionnez un <strong>Identifiant</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#id").focus(); 

$("#id").change(function(){ $('#check_id').hide();
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

var dataString = "tid="+ tid+ "&date="+ date + "&id="+ id +"&mon="+ mon ;

//alert(dataString);

$("#flash").show();
$("#flash").fadeIn(400).html(" <div class='progress'> <div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'><strong> Sauvegarde...</strong></div></div>");
$.ajax({
type: "POST",
url: "dimes_entree_eng.php",
data:dataString,
cache:true,
success: function(result){
	
	{
	if (result=="OK"){
		$('#check_date').hide();
	
	$("#flash").fadeIn(400).html("<div class='alert alert-success text-center'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Entrée Faite</strong></div>");
	$('#form_entree').clearForm();
	$('#er').load('er_dime.php');
	$('#mois').load('mois_dimes.php');
	function hidealert(){
				$("#flash").hide();
			}
	setTimeout(hidealert , 10000);
		}
	}	
}  
});
return false;
}


});
});

</script>

		</body>
			


</html>