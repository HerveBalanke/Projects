<?php  
include_once("../sessions/session_secretaire.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$groupe=$_GET['groupe'];
$out_membre=$con->query("select mid, nom, prenom, tel, photo from membre where branche='$bid';") or die (print_r($con->errorInfo()));
$count_membre=$out_membre->rowCount();
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
					      <li><a href="membre_out.php">GERER MEMBRES</a></li>
					      <li class="active"><a href="gerer_groupe.php">GERER GROUPES</a></li>
					      <li><a href="communication.php">COMMUNICATION</a></li>
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
				    <h3 class="text-center"><b> GERER GROUPES </b></h3>

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
						       		 <a  href="gerer_groupe.php">CREER UN GROUPE</a>
									</li>
									<li class="active"><a href="repartition.php" >REPARTITION</a>
									</li>
									</ul>

										<br/>

								<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> GROUPE </b> 
  											 <!-- <a href='gerer_groupe.php'id='retour' style="color:rgb(255, 213, 29);" title="Retournez ?? la Liste des Groupes" class="pull-right"> <b> Retour </b> </a> -->
  										</div>
  										<div class="panel-body">

  											<div class="row">
  												<div class="col-md-1"> </div>
  											<div class="col-md-10">
  											<div class="panel panel-default">
											  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">AJOUT MULTIPLE</div>
											  <div class="panel-body">
											  	<div id='flash'> </div>
											  	<form role="form" id="form" method="POST" action="ajout_multiple_groupe.php"> <br/>
											  		<input  type="hidden" class="form-control" id="groupe"  value="<?php echo $groupe;?>" maxlength="30">
  									<div class="table-responsive">
									  <table class="table table-striped table-condensed table-hover" id="tab">
									    <thead>
									      <tr>
									        <th class="text-center">Photo</th>
									        <th class="text-center">ID</th>
									        <th class="text-center">Nom</th>
									        <th class="text-center">Prenom</th>
									        <th class="text-center"> </th>
									      </tr>
									    </thead>
									    <tbody>

									    	<?php
									    	for($i=0; $i<$count_membre; $i++){
									    		$fetch_mem=$out_membre->fetch();
									    		?>

									      <tr>
									        <td class="text-center" style="vertical-align:middle"><img src="<?php echo $fetch_mem ['photo'];?>" class="img-thumbnail img-responsive" alt="<?php echo $fetch_mem ["nom"];?> <?php echo $fetch_mem ["prenom"];?>" style="width:150px; height:150px"></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_mem ["mid"];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_mem ["nom"];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_mem ["prenom"];?></td>
									        <td class="text-center" style="vertical-align:middle">
									        	<div class="checkbox">
											  <label><input type="checkbox" id="choix" name="choix" value="<?php echo $fetch_mem ["mid"];?>" ></label>
											</div>
										
										</td>
									      </tr>

									      <?php
											}
											?>
									    </tbody>
									  </table>
									  </div>
									  <br/>
									  <input type="checkbox" id="tout"> <label for="tout">Selectionnez tout </label> <div id='select' style="color:red"></div> <br/> <br/>

									  <button type="button" id="submit" class="btn btn-default">Ajouter</button> &nbsp;&nbsp;&nbsp;
									  <a href='gerer_liste.php?groupe=<?php echo $groupe;?>' title="Annuler l'op??ration">Annuler</button> 
									</form>
									</div>

											</div>
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
    	$('#select').hide();
        $(document).ready(function(){
        $('#tab').dataTable();
		$("#tout").change(function () {
		$("input:checkbox").prop('checked', $(this).prop("checked"));
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
        });
        </script>

	<script>
	$(function() {

	$("#submit").click(function() {
		
	var groupe= $("#groupe").val();
	var choix = [];
    $.each($("input[name='choix']:checked"), function(){            
        choix.push($(this).val());
    });
    if (choix.length == 0 ) {
$('#select').html("*Selectionnez des <strong>Membres</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#choix").focus(); 

$("#choix").change(function(){ $('#select').hide();
});
return false;
}

var dataString = "choix="+ choix + "&groupe=" + groupe;

// alert(dataString);

$("#flash").show();
$("#flash").fadeIn(400).html(" <div class='progress'> <div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'><strong> Ajout en cours...</strong></div></div>");
$.ajax({
type: "POST",
url: "ajout_multiple_groupe_eng.php",
data:dataString,
cache:true,
success: function(result){
	{
	// $("#flash").fadeIn(400).html(result);
	$('#form').clearForm();	
	if (result=="OK"){
		$("#flash").fadeIn(400).html(bootbox.alert("<b>Membres Ajout??s.</b>" , function(result) {
			window.location.href ="gerer_liste.php?groupe="+groupe;
		}));
		}
	}	
}  
});
return false;

});
});

</script>


		</body>
			


</html>