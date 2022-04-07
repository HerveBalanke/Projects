

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
					      <li class="active"><a href="gerer_branche.php">GERER BRANCHES</a></li>
					      <li><a href="ajouter_utilisateur.php">GERER UTILISATEURS</a></li>
					      <li><a href="rapports.php">RAPPORTS</a></li>
					    </ul>
				      <ul class="nav navbar-nav navbar-right" id="dec">
				        <li ><a href="logout.php" style="color:rgb(130, 0, 31);"><span class="glyphicon glyphicon-log-in"></span> Deconnection</a></li>
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
				    <h3 class="text-center"> <b> GERER LES BRANCHES </b></h3>

				  </div>
      	</div>
        </div>
      </div>
    </div>


    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

									<br/>
							
									<div id="flash"> </div>
									<br/>

  											<ul  class="nav nav-tabs">
									<li class="active">
						       		 <a  href="#1b" data-toggle="tab">AJOUTER UNE BRANCHE</a>
									</li>
									<li><a href="#2b" data-toggle="tab">LISTE DES BRANCHES</a>
									</li>
								</ul>

								<br/>

								<div class="tab-content clearfix">
									<div class="tab-pane fade in active" id="1b">

  											<div class="panel panel-default">
											 <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b>AJOUTER UNE BRANCHE </b></div>


													<div class="panel-body">
														<div class="row">
         												 <div class="col-md-1"> </div>
         												 <div class="col-md-10" id="sec">
														<form class="form-horizontal"  method="POST" id="form" action="gerer_utilisateur.php" multipart/form-data role="form">

																
														  <div id="flash"></div>
															<div class="form-group">
														    <label class="control-label col-sm-2" for="branche">Branche:</label>
														    <div class="col-sm-8">
														      <input type="text" class="form-control" id="branche"  style="text-transform: capitalize;" placeholder="Entrez la Branche" maxlength="30">
														    	<div id='check_branche' style="color:red"></div>
														    </div>
														  </div>

														  <div class="form-group"> 
														    <div class="col-sm-offset-2 col-sm-10">
														      <button type="button" id="submit" name="submit" class="btn btn-default">Sauvegarder</button> &nbsp;&nbsp;&nbsp;
														      <button type="reset" id="reset" name="reset" class="btn btn-default">Reprendre</button> &nbsp;&nbsp;&nbsp;
														       <img src="../images/default.gif"  id="lod" class="img-rounded" width="30" height="30"> 
														    </div>
														  </div>

														</form>
														</div>

														<div class="col-md-1"></div>

													</div>

													</div>

											</div>
											</div>
									<div class="tab-pane fade " id="2b">

  											<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> BRANCHES </b> </div>
  										<div class="panel-body" id="tab_deux">
  											<?php include_once ('liste_branche.php'); ?> 
									</div>
									</div>

									</div>
									</div>





								
			</div>
        </div>
      </div>
    </div>



     <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

										<br/>
									  	
										  	
						  
				  

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

	//  $(document).ready(function(){
 //    $('#table_un').dataTable();
	// });
	 $(document).ready(function(){
    $('#table_deux').dataTable();
	});

	
	function sup_bid(bid)
	{
		var info="bid="+ bid;
	bootbox.confirm("<b>Supprimer la branche?</b>" , function(result) {
	if(result)
	{
		$.ajax({
		type: "POST",
		url: "supprimer_branche.php",
		data: info,
		cache:true,
		processData:false,
		success: function(html){
			$('#tab_deux').load("liste_branche.php");
			bootbox.alert("<b>Branche Supprimée.</b>");
			}
				});		  
					}
						});
			
	}
								
			</script>

	
	



	<script type="text/javascript">

	 $(function() {
	 	$('#lod').hide();

		$("#reset").click(function() {
	 	$('#lod').hide();
	 	$("#branche").focus();
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

var branche= $("#branche").val();

if (branche.length == 0 ) {
$('#check_branche').html("*Entrez la <strong>Branche</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#branche").focus(); 

$("#branche").change(function(){ $('#check_branche').hide();
});
return false;

 }else{

var dataString = "branche=" + branche;

// alert(dataString);

$('#lod').show();
$.ajax({
type: "POST",
url: "gerer_branche_eng.php",
data:dataString,
cache:true,
processData:false,
success: function(out){
	// $('#flash').html(out);
	{

	if (out=="OK"){
	$('#form').clearForm();
	$('#lod').hide();
	bootbox.alert("<strong>Branche ajoutée!</strong>", function(result) { 
	window.location.href ='gerer_branche.php';
	});
	}
	else if (out=="NO_branche"){
	$('#lod').hide();
	bootbox.alert("<strong>Cette branche existe déja</strong>", function(result) { 
	$("#branche").focus();
	});
	}
	
	}
	}
	
 
});
return false;
}

});
});


	</script>

		<?php
		$con=Null;
		?>


			

	</body>
			


</html>