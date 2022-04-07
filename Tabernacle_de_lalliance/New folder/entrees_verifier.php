

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

						
						<ul  class="nav nav-tabs">
									<li class="active">
						       		 <a  href="">Offrandes</a>
									</li>
									<li ><a href="" >Dimes</a>
									</li>
								</ul>	

									<br/>

										<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> OFFRANDES </b> 
  										</div>
  										<div class="panel-body">

											<div class="row">
  											<div class="col-md-1"></div>
  											<div class="col-md-10">
  											<div class="panel panel-default">
											  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">VERIFICATION DES ENTREES</div>
											  <div class="panel-body" id="er">
											  	<?php include_once'entrees_valider.php'; ?>
												  </div>
											</div>
  											</div>
  											<div class="col-md-1"></div>
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

	 <script type="text/javascript">

						function sup_vid(oid)
						{
							var info="oid="+ oid;
						bootbox.confirm("<b>Valider l'entrée?</b>" , function(result) {
						if(result)
						{
							$.ajax({
							type: "POST",
							url: "valider_offrande.php",
							data: info,
							cache:true,
							processData:false,
							success: function(html){
								//$('#er').load("er.php");
								//$('#cul').load("cultes_charge.php");
								bootbox.alert("<b>Entreé validée.</b>" , function(result) {
								window.location.href ="gerer_entrees.php";
							});
	
								}
									});		  
										}
											});
								
						}


						function sup_rid(oid)
						{
							var info="eid="+ eid;
						bootbox.confirm("<b>Rejeter l'entrée?</b>" , function(result) {
						if(result)
						{
							$.ajax({
							type: "POST",
							url: "rejeter_offrande.php",
							data: info,
							cache:true,
							processData:false,
							success: function(result){
								{ 
									if(result=="OK"){
								//$('#er').load("er.php");
								//$('#cul').load("cultes_charge.php");
								bootbox.alert("<b>Entreé rejetée.</b>" , function(result) {
								window.location.href ="gerer_entrees.php";
								
								}
							); }
	
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

var dataString = "date="+ date + "&culte="+ culte +"&rec="+ rec + "&culte_alt=" + culte_alt;

//alert(dataString);

$("#flash").show();
$("#flash").fadeIn(400).html(" <div class='progress'> <div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'><strong> Sauvegarde...</strong></div></div>");
$.ajax({
type: "POST",
url: "gerer_entrees_eng.php",
data:dataString,
cache:true,
success: function(result){
	
	{
	if (result=="OK"){
		$('#check_date').hide();
	
	$("#flash").fadeIn(400).html("<div class='alert alert-success text-center'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Entrée Faite</strong></div>");
	$('#form_entree').clearForm();
	$("#block_culte").hide()
	function hidealert(){
				$("#flash").hide();
			}
	setTimeout(hidealert , 10000);
	$('#er').load("er.php");
	$('#cul').load("cultes_charge.php");
       
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