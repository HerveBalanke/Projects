<?php  
include_once("session_admin.php");
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
   			<link rel="shortcut icon" type="image/x-icon" href="../images/favicon(2).ico" />`
   			<link href="../Lib_bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   			<link href="../Lib_bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
   			<link href="../country/dist/css/bootstrap-formhelpers.min.css" rel="stylesheet">
   			<Link href="../country/js/tests/vendor/css/bootstrap-3.0.0.min.css" rel="stylesheet">
   			<link type="text/css" rel="stylesheet" href="../Lib_bootstrap/tab.css"  >
   			<link href="../jasny/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
   			<link rel="stylesheet" type="text/css" href="../Lib_bootstrap/dist/sweetalert.css">


		   			<?php
		   			require_once("../setup/connection.php");

		   			$aid=$_SESSION['id_admin'];
		   			$out_aid=$con->query("select * from administrateur where aid='$aid';") or die (print_r($con->errorInfo()));
		   			$det=$out_aid->fetch();
		   			$nua=$det["uname"];
		   			$passa=$det["pass"];
		   			
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
				    <h3 class="text-center">Compte</h3>

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
									  	
										  	<div class="panel panel-default">
												 <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b>MODIFIER LE COMPTE </b></div>


													<div class="panel-body">
														<div class="row">
         												 <div class="col-md-1"> </div>
         												 <div class="col-md-10" id="sec">
														<form class="form-horizontal"  method="POST" id="form" action="compte_actuel.php" multipart/form-data role="form">

															<div id="flash"></div>
															 <input type="hidden" class="form-control" id="aid" value="<?php echo $aid; ?>" >

															<div class="form-group">
														    <label class="control-label col-sm-4" for="nu"> Nom d'utilisateur Actuel<span style="color:red;">*</span></label>
														    <div class="col-sm-8">
														      <input type="text" class="form-control" id="nu"  placeholder="Entrez le Nom d'utilisateur Actuel" maxlength="30">
														      <input type="hidden" class="form-control" id="nua" value="<?php echo $nua; ?>" >
														    	<div id='check_nu' style="color:red"></div>
														    </div>
														  </div>
														  <div class="form-group">
														    <label class="control-label col-sm-4" for="pass">Mot de Passe Actuel<span style="color:red;">*</span></label>
														    <div class="col-sm-8"> 
														      <input type="password" class="form-control" id="pass"  placeholder="Entrez le Mot de Passe Actuel" maxlength="30">
														      <input type="hidden" class="form-control" id="passa" value="<?php echo $passa; ?>" >
														      <div id='check_pass' style="color:red"></div>
														    </div>
														  </div>


														  
														  <div class="form-group"> 
														      <button type="button" id="submit" name="submit" class="btn btn-default">Entrer</button> &nbsp;&nbsp;&nbsp;
														      <button type="reset" id="reset" name="reset" class="btn btn-default">Reprendre</button>&nbsp;&nbsp;&nbsp;
														      <a href="bienvenue.php"> Annuler </a>&nbsp;&nbsp;&nbsp;
														       <img src="../images/default.gif"  id="lod" class="img-rounded" width="30" height="30">
														  </div>

														</form>
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
	



	<script type="text/javascript">

	 $(function() {
	 $('#lod').hide();
	 $("#nu").focus();

	$("#reset").click(function() {
 	$('#lod').hide();
 	$("#nu").focus();
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

	 		var aid= $("#aid").val();
	 		var nu= $("#nu").val();
	 		var nua= $("#nua").val();
			var pass= $("#pass").val();
			var passa= $("#passa").val();
		
if (nu.length == 0 || nu!=nua) {
$('#check_nu').html("*Entrez un <strong>Nom d'utilisateur Valide</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#nu").focus(); 

$("#nu").change(function(){ $('#check_nu').hide();
});
return false;
}
else if (pass.length == 0 || pass!=passa) {
$('#check_pass').html("*Entrez un <strong>Mot de passe valide, 8 characteres au minimum</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#pass").focus(); 

$("#pass").change(function(){ $('#check_pass').hide();
});
return false;
} else{
alert("yes");
$('#lod').show();
$('#form').clearForm();
$('#lod').hide();
window.location.href ='modifier_compte.php';
}

});

});

	</script>

		<?php
		$con=Null;
		?>


			

	</body>
			


</html>