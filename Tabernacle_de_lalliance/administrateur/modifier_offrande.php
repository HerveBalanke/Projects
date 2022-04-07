<?php  
include_once("../sessions/session_tresorier.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$treso=$_SESSION['tresorier'];
$oid=$_GET['oid'];
$out_culte=$con->query("select * from evenement order by evenement asc;") or die(print_r($con->errorInfo()));
$count_culte=$out_culte->rowCount();
$out_off=$con->query("select * from offrande 
inner join evenement on offrande.evenement=evenement.eid where oid='$oid' 
and tresorier='$treso' and branche='$bid';") or die(print_r($con->errorInfo()));
$fetch_off=$out_off->fetch();
$count_row=$out_off->rowCount();
if($count_row<=0){
	header('location:alert_used.php');
exit();
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
									<li class="active">
						       		 <a  href="gerer_entrees.php">Offrandes</a>
									</li>
									<li ><a href="dimes_entree.php" >Dimes</a>
									</li>
								</ul>	

									<br/>

										<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> OFFRANDES </b> </div>
  										<div class="panel-body">

  											<div class="row">
  											<div class="col-md-12">
  											<div class="panel panel-default">
											  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">MODIFIEZ UNE ENTREE</div>
											  <div class="panel-body">
											  	<div class="row">
         										<div class="col-md-1"> </div>
         										<div class="col-md-10">
         										<div id="flash"></div>
         										<form class="form-horizontal"  method="POST" id="form_entree" action="gerer_entrees.php" multipart/form-data role="form">
											  	<div class="form-group">
											  		<input type="hidden" class="form-control" id="oid"  value= "<?php echo $oid; ?>" >
											  		<input type="hidden" class="form-control" id="tid"  value= "<?php echo $treso; ?>" >
														    <label class="control-label col-sm-3" for="date">Date:</label>
														    <div class="col-sm-9"> 
														     <div class="bfh-datepicker" data-format="y-m-d" data-date="<?php echo $fetch_off['date'];?>" id="date">
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
														    <label class="control-label col-sm-3" for="culte">Culte</label>
														    <div class="col-sm-9"> 
																   <select class="form-control" id="culte" >
																   	<option value= "<?php echo $fetch_off['eid']; ?>"><?php echo $fetch_off['evenement']; ?></option>

																	<?php
																	for($i=0; $i<$count_culte; $i++){
																		$fetch_culte=$out_culte->fetch();

																	?>
																    <option value= "<?php echo $fetch_culte ["eid"];?>"> 
																    <?php echo $fetch_culte ["evenement"];?>
																    
																    <?php
																	}

																    ?>

																	</option>
																	<option>--- Program Special ---</option>

																  </select>
																  <div id="block_culte">
																  <br/>
																  <input type="text" class="form-control" id="culte_alt" style="text-transform: capitalize;" placeholder="Entrez le Program Special" maxlength="30">
																  <div id='check_culte_alt' style="color:red"></div>
																  </div>
																  <div id='check_culte' style="color:red"></div>
														    </div>
														  </div>

													<div class="form-group">
														    <label class="control-label col-sm-3" for="recette">Recette:</label>
														    <div class="col-sm-9">
														    	<div class="input-group"> 
															        <span class="input-group-addon">¢</span>
															        <input type="number" min="0"  step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" placeholder="Entrez la Recette"
															                  id="recette"  maxlength="11" value="<?php echo $fetch_off['recette'];?>" class="form-control currency" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57">
															    </div>
														    	<div id='check_recette' style="color:red"></div>
														    </div>
														  </div>

														  <div class="form-group"> 
														    <div class="col-sm-offset-2 col-sm-10">
														      <button type="button" id="submit" name="submit" class="btn btn-default">Sauvegarder</button> &nbsp;&nbsp;&nbsp;
														      <button type="reset" id="reset" name="reset" class="btn btn-default">Reprendre</button> &nbsp;&nbsp;&nbsp;
														      <a href="gerer_entrees.php" title="Annuler l'operation">Annuler</a>
														    </div>
														  </div>

												</form>
         										</div>
         										<div class="col-md-1"> </div>
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



	<script>
	$(function() {

		$("#flash").hide();
		$('#block_culte').hide();
	$('#culte').on('change',function(){
        if( $(this).val()=="--- Program Special ---"){
        $("#block_culte").show();
        }
        else{
        $("#block_culte").hide();
        $("#culte_alt").val("");
        }
    });

		$("#reset").click(function() {

		$('#block_culte').hide();
		$('#check_recette').hide();
		$('#check_culte').hide();
		$('#check_date').hide();
	 	$("#recette").focus();
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
	var oid= $("#oid").val();
	var tid= $("#tid").val();
	var date= $("#date").val();
	var culte= $("#culte").val();
	var culte_alt= $("#culte_alt").val();
	var rec= $("#recette").val();

if (culte=="--- Program Special ---") {
				culte = culte_alt;
					}

if (date.length == 0 ) {
$('#check_date').html("*Choisissez une <strong>Date</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#date").focus(); 

$("#date").change(function(){ $('#check_date').hide();
});
return false;
}
else if (culte.length == 0 || culte=="--- Choisir un Culte ---" || culte=="--- Program Special ---") {
$('#check_culte').html("*Selectionnez un <strong>Culte</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#culte").focus(); 

$("#culte").change(function(){ $('#check_culte').hide();
});
return false;
}
else if (rec.length == 0 ) {
$('#check_recette').html("*Entrez la <strong>Recette</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#recette").focus(); 

$("#recette").change(function(){ $('#check_recette').hide();
});
return false;
}else{

var dataString = "oid="+oid +"&tid="+tid +"&date="+ date + "&culte="+ culte +"&rec="+ rec + "&culte_alt=" + culte_alt;

//alert(dataString);

$("#flash").show();
$("#flash").fadeIn(400).html(" <div class='progress'> <div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'><strong> Modification en cours...</strong></div></div>");
$.ajax({
type: "POST",
url: "modifier_offrande_eng.php",
data:dataString,
cache:true,
success: function(result){

	{
	if (result=="OK"){
		$('#check_date').hide();
	$('#form_entree').clearForm();
	$("#block_culte").hide();
	$("#flash").fadeIn(400).html(bootbox.alert("<b>Modification terminée.</b>" , function(result) {
			window.location.href ="gerer_entrees.php";
		}));
	
	
		}else if(result=="NO"){
	$("#flash").fadeIn(400).html(bootbox.alert("<b>Ce culte a deja été enregistré. Veillez le selectionner dans la liste déroulante</b>"));
	$('#culte_alt').focus(); 
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