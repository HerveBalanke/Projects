<?php  
include_once("../sessions/session_pjr.php");
require_once("../setup/connection.php");
$pjr=$_SESSION['pjr'];
$sms=$_GET["sms"];
$out_evang=$con->query("select * from evangelisation inner join zone on zone.zid=evangelisation.zone;") or die (print_r($con->errorInfo()));
$count_evang=$out_evang->rowCount();
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
				      <a class="navbar-brand" href="#">TA Manager</a>
				    </div>
				    <div class="collapse navbar-collapse">
				      <ul class="nav navbar-nav" id="navbar" >
					      <li class="active"><a  href="ajouter_porteur.php">Gerer Porteur de Joie</a></li>
					      <li><a href="ajouter_evangelisation.php">Gerer l'Evang??lisation</a></li>
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
				    <h3 class="text-center">Communication</h3>

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
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> SMS - Selectionnez les numeros </b> 
  										<!-- <a href="communication.php?sms=<?php //echo $sms; ?>&zone=<?php /*echo $zone;*/ ?>" style="color:rgb(255, 213, 29);" title="Retour vers la page pr??c??dente" class="pull-right"> <b> <<< Revenir</b> </a> -->

  										</div>
  										<div class="panel-body">
  											<form role="form" id="form" method="POST" action="select_contact.php">
  												<div id="flash"></div>
  												<input type="hidden" class="form-control" value="<?php echo $sms; ?>" id="sms">
  											<div class="table-responsive" >
									  <table class="table table-striped table-condensed table-hover" id="tab">
									  	<div id='check_contact' style="color:red"></div><br/>
									    <thead>
									      <tr>
									        <th class="text-center">Nom</th>
									        <th class="text-center">Prenom</th>
									        <th class="text-center">Telephone</th>
									        <th class="text-center">Zone</th>
									        <th class="text-center">Select</th>
									      </tr>
									    </thead>
									    <tbody>

									    	<?php
									    	for($i=0; $i<$count_evang; $i++){
									    		$fetch_evang=$out_evang->fetch();
									    		?>

									      <tr>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_evang ["nom"];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_evang ["prenom"];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_evang ["tel"];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_evang ["zone"];?></td>
									        <td class="text-center" style="vertical-align:middle">
									        	<div class="checkbox">
											  <label><input type="checkbox" id="choix" name="choix" value="<?php echo $fetch_evang ['tel'];?>" ></label>
											</div>
										
										</td>


									        
									      </tr>

									      <?php
											}
											?>
									    </tbody>
									  </table> <br/>
									  </div>
									  <a href="groupe_com.php?sms=<?php echo $sms; ?>"> Envoi aux Zones </a>&nbsp;&nbsp;&nbsp;
									  <input type="checkbox" id="tout"> <label for="tout">Selectionnez tous </label> &nbsp;&nbsp;&nbsp;
									  <button type="button" id="submit" class="btn btn-default">Envoyer</button> &nbsp;&nbsp;&nbsp;
									 <button type="reset" id="reset" name="reset" class="btn btn-default">Annuler</button> &nbsp;&nbsp;&nbsp;
										<img src="../images/default.gif"  id="lod" class="img-rounded" width="30" height="30">
									</form>



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


	<script>
	$(function() {
	$('#lod').hide();
	$("#tout").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
		//$("#flash").hide();

		$("#reset").click(function() {
		window.location.href ='communication.php'
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

			var sms= $("#sms").val();
            var choix = [];
            $.each($("input[name='choix']:checked"), function(){            
                choix.push($(this).val());
            });
            var verif=choix.length; 
            if(verif<=0){
            $('#check_contact').html("*Selectionnez des <strong>Destinataires</strong>").show(); // This Segment Displays The Validation Rule For All Fields
            $("#choix").focus(); 

            $("#choix").change(function(){ $('#check_contact').hide();
            });
            return false;

            }else{
            var dataString = "sms="+ sms+ "&choix="+ choix;

			$('#lod').show();
			$.ajax({
			type: "POST",
			url: "sms_eng.php",
			data:dataString,
			cache:true,
			success: function(out){
				var result = out.slice(-2);
					{
				if (result=="OK"){
				$('#lod').hide();
				bootbox.alert("<strong> SMS envoy?? !</strong>" , function(result) { 
				$('#form').clearForm();
				window.location.href ='communication.php'
			});
			       
					}else if (result=="NO" || result!="OK"){
				$('#lod').hide();
				bootbox.alert("<strong> Envoi du SMS avort??! Verifiez le numero de tel du destinataire, la connection Internet et Le compte de credit SMS</strong>" , function(result) { 
				$('#form').clearForm();
				window.location.href ='communication.php'
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



		</body>
			


</html>