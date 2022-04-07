

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
		   			$gid=$_GET['gid'];

		   			$out_groupe=$con->query("select * from groupe
		   				inner join membre on groupe.leader=membre.mid where groupe.gid='$gid';") or die (print_r($con->errorInfo()));
		   			$fetch_groupe=$out_groupe->fetch();

		   			$out_mem=$con->query("select * from membre;") or die (print_r($con->errorInfo()));
		   			$count_mem=$out_mem->rowCount();

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
				    <h3 class="text-center">Gerer Groupe </h3>

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
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> GROUPE </b> </div>
  										<div class="panel-body">

  											<div class="row">
  											<div class="col-md-2"> </div>
  											<div class="col-md-8">
  											<div class="panel panel-default">
											  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">CREER UN GROUPE</div>
											  <div class="panel-body">
											  	<div class="row">
         										<div class="col-md-12">
         										<div id="flash"></div>
         										<form class="form-horizontal"  method="POST" id="form_entree" action="modifier_groupe.php" multipart/form-data role="form">
											  	<div class="form-group">

											  		<input  type="hidden" class="form-control" value="<?php echo $gid ;?>" id="gid">
														    <label class="control-label col-sm-4" for="groupe">Nom du Groupe:</label>
														    <div class="col-sm-8">
															    <input  type="text" class="form-control" placeholder="Entrez le Nom du Groupe"  value='<?php echo $fetch_groupe['groupe']; ?>' id="groupe"  maxlength="30">
														    	<div id='check_groupe' style="color:red"></div>
														    </div>
														  </div>

												<div class="form-group">
														    <label class="control-label col-sm-4" for="leader">Leader</label>
														    <div class="col-sm-8"> 
																   <select class="form-control" id="leader" >
																   	<option value="<?php echo $fetch_groupe['leader']; ?>" selected='selected'><?php echo $fetch_groupe['leader']; ?></option>

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
																  <div id='check_leader' style="color:red"></div>
														    </div>
														  </div>

														  <div class="form-group"> 
														    <div class="col-sm-offset-2 col-sm-10">
														      <button type="button" id="submit" name="submit" class="btn btn-default">Sauvegarder</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														      <a href="gerer_groupe.php">Annuler </a>
														    </div>
														  </div>

												</form>
         										</div>
         										</div>
											  	
											</div>
											</div>
											</div>
											<div class="col-md-2"> </div>
											</div>
											<div class="row">
  											<div class="col-md-1"> </div>

											<div class="col-md-10">
											<div class="panel panel-default">
											  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">LISTE DES GROUPES </div>
											  <div class="panel-body" id="groupe_liste">	
											  <?php include_once'groupe_liste.php'; ?>										  	
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

	<script>
	$(function() {


		$("#groupe").focus();
		$("#flash").hide();
		$('#check_groupe').hide();
		$('#check_leader').hide();


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
	var groupe= $("#groupe").val();
	var leader= $("#leader").val();
	var gid= $("#gid").val();

if (groupe.length == 0 ) {
$('#check_groupe').html("*Entrez le <strong>Nom Du Groupe</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#groupe").focus(); 

$("#groupe").change(function(){ $('#check_groupe').hide();
});
return false;
}else if (leader.length == 0 || leader=='--- Selectionnez un Leader ---' ) {
$('#check_leader').html("*Entrez le <strong>Nom Du Leader</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#leader").focus(); 

$("#leader").change(function(){ $('#check_leader').hide();
});
return false;
}
else{

var dataString = "groupe="+ groupe+ "&leader=" + leader + "&gid="+ gid;

//alert(dataString);

$("#flash").show();
$("#flash").fadeIn(400).html(" <div class='progress'> <div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'><strong> Sauvegarde...</strong></div></div>");
$.ajax({
type: "POST",
url: "modifier_groupe_eng.php",
data:dataString,
cache:true,
success: function(result){

		
	{
		if (result=="NO"){
	
	$("#flash").fadeIn(400).html("<div class='alert alert-warning text-center'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Ce nom est deja utilisé</strong></div>");
	$("#groupe").focus();
	function hidealert(){
				$("#flash").hide();
			}
	setTimeout(hidealert , 10000);
	$('#groupe_liste').load("groupe_liste.php");
	}else if (result=="OK"){
	$("#flash").fadeIn(400).html(" <div class='progress'> <div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'><strong> Chargement...</strong></div></div>");
	bootbox.alert("<strong>Groupe Modifié!</strong>", function() {
	window.location.href ='gerer_groupe.php'
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


 <script type="text/javascript">

$('table.table-hover').each(function() {
    var currentPage = 0;
    var numPerPage = 5;
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