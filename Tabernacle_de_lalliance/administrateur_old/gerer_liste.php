

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
		   			$groupe=$_GET['groupe'];

		   			$out_membre=$con->query("select * from grou_mem
		   			inner join membre on grou_mem.membre=membre.mid where grou_mem.gid='$groupe' order by membre.mid desc;
		   				") or die (print_r($con->errorInfo()));
		   			$count_membre=$out_membre->rowCount();
		   			

		   			$groupe_out=$con->query("select * from groupe
		   				inner join membre on groupe.leader=membre.mid where groupe.gid='$groupe';")or die (print_r($con->errorInfo()));
		   			$groupe_out=$groupe_out->fetch();

		   			$mem_nom=$con->query("select count(membre) as nombre from grou_mem
		   				where gid='$groupe';")or die (print_r($con->errorInfo()));
		   			$fetch_nom=$mem_nom->fetch();

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
					      <li class="active"><a href="#">Gerer Membre</a></li>
					      <li><a href="#">Gerer Offrande</a></li>
					      <li><a href="#">Gerer Dimes</a></li>
					      <li><a href="#">Gerer Depenses</a></li>
					      <li><a href="#">Gerer Groupe</a></li>
					      <li><a href="#">Bilan</a></li>
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
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> GROUPE </b> 
  											 <a href='gerer_groupe.php'id='retour' style="color:rgb(255, 213, 29);" title="Retournez à la Liste des Groupes" class="pull-right"> <b> Retour </b> </a>
  										</div>
  										<div class="panel-body">

  											<div class="row">
  												<div class="col-md-2"> </div>
  											<div class="col-md-8">
  											<div class="panel panel-default">
											  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">AJOUTER UN MEMBRE</div>
											  <div class="panel-body">
											  	<div class="row">
         										<div class="col-md-1"> </div>
         										<div class="col-md-10">
         										<div id="flash"></div>
         										<form class="form-horizontal"  method="POST" id="form_entree" action="gerer_liste.php" multipart/form-data role="form">

         											<input  type="hidden" class="form-control" id="groupe"  value="<?php echo $groupe;?>" maxlength="30">
												<div class="form-group">
													
														    <label class="control-label col-sm-4" for="membre">Membre ID</label>
														    <div class="col-sm-8"> 
																   <select class="form-control" id="membre" >
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
																  <div id='check_membre' style="color:red"></div>
														    </div>
														  </div>

														  <div class="form-group"> 
														    <div class="col-sm-offset-2 col-sm-10">
														      <button type="button" id="submit" name="submit" class="btn btn-default">Ajouter</button>
														    </div>
														  </div>

												</form>
         										</div>
         										<div class="col-md-1"> </div>
         										</div>
											  	
											</div>
											</div>
											</div>
											<div class="col-md-2"> </div>
											
											</div>

											<div class="row">
												<div class="col-md-1"></div>
  											<div class="col-md-10">
											<div class="panel panel-default" >
												<div id="mem_groupe">
											  <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);">LISTE DES MEMBRES - <?php echo $groupe_out['groupe']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Leader: ".$groupe_out['nom']." ".$groupe_out['prenom']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nombre de Membres: ".$fetch_nom['nombre']; ?>  </div>
											  <div class="panel-body">	
											  <div class="table-responsive">
												    <table class="table table-striped table-condensed table-hover" id="tab">
												    	<thead>
													      <tr>
													        <th class="text-center"> </th>
													        <th class="text-center"> </th>
													      </tr>
													    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_membre; $i++){
															$fetch_membre=$out_membre->fetch();
													    		?>
												      <tr>
												        <td><?php echo $fetch_membre['nom']." ".$fetch_membre['prenom']." - ".$fetch_membre['mid'] ;?></td>
												        <?php $info=$fetch_membre['mid'].'.'.$groupe; 
												        	if($groupe_out['mid']!=$fetch_membre['mid']){
												        ?>

													 <td class="text-center" style="vertical-align:middle"><a href="javascript:sup_id(<?php echo $info; ?>)" style="color:red; " ><span class="glyphicon glyphicon-remove"> </span></a></td>
												      </tr>
												    <?php 
												}else{ ?>
													<td class="text-center"> </td>
												<?php
												}
													  	} 
													 ?>
												    </tbody>
												  </table>
												  </div>									  	
											 </div>	
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
						function sup_id(info)
						{
							var info="info="+ info;
						bootbox.confirm("<b>Retirer le Membre du Groupe?</b>" , function(result) {
						if(result)
						{
							$.ajax({
							type: "POST",
							url: "retirer_membre_groupe.php",
							data: info,
							cache:true,
							processData:false,
							success: function(result){
								{
								if (result=="OK"){
								$('#mem_groupe').load(document.URL +  ' #mem_groupe');
								bootbox.alert("<b>Membre Retiré du Groupe.</b>");
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

		$('#check_membre').hide();


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
	var membre= $("#membre").val();
	var groupe= $("#groupe").val();

if (membre.length == 0 || membre=='--- Selectionnez un Membre ---' ) {
$('#check_membre').html("*Selectionnez un <strong>Membre</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#membre").focus(); 

$("#membre").change(function(){ $('#check_membre').hide();
});
return false;
}else{

var dataString = "membre="+ membre+ "&groupe=" + groupe;

//alert(dataString);

$("#flash").show();
$("#flash").fadeIn(400).html(" <div class='progress'> <div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'><strong> Sauvegarde...</strong></div></div>");
$.ajax({
type: "POST",
url: "mem_groupe_eng.php",
data:dataString,
cache:true,
success: function(result){
	{
	if (result=="OK"){
	
	$("#flash").fadeIn(400).html("<div class='alert alert-success text-center'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Membre Ajouté(e)</strong></div>");
	$('#form_entree').clearForm();
	function hidealert(){
				$("#flash").hide();
			}
	setTimeout(hidealert , 10000);
	//$('#mem_groupe').load("mem_groupe.php");
	$('#mem_groupe').load(document.URL +  ' #mem_groupe');
		}else if(result=="NO"){
			$("#flash").fadeIn(400).html("<div class='alert alert-warning text-center'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Ce Membre fait deja partir du groupe</strong></div>");
	$('#form_entree').clearForm();
	function hidealert(){
				$("#flash").hide();
			}
	setTimeout(hidealert , 10000);
	$('#mem_groupe').load(document.URL +  ' #mem_groupe');

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