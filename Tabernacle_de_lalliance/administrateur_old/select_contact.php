

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
		   			$sms=$_GET["sms"];
		   			$out_membre=$con->query("select mid, nom, prenom, tel from membre;") or die (print_r($con->errorInfo()));
		   			$count_membre=$out_membre->rowCount();
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
					      <li><a href="#">Rapports</a></li>
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

          				<ul  class="nav nav-tabs">
									<li class="active">
						       		 <a  href="communication.php">SMS</a>
									</li>
									<li >
										<a href="email.php" >Email</a>
									</li>
								</ul>

										<br/>

								<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> SMS - Selectionnez les numeros </b> </div>
  										<div class="panel-body">
  											<form role="form" id="form" method="POST" action="select_contact.php">
  												<div id="flash"></div>
  												<input type="hidden" class="form-control" value="<?php echo $sms; ?>" id="sms">
  											<div class="table-responsive" id="table">
									  <table class="table table-striped table-condensed table-hover">
									    <thead>
									      <tr>
									        <th class="text-center">ID</th>
									        <th class="text-center">Nom</th>
									        <th class="text-center">Prenom</th>
									        <th class="text-center">Telephone</th>
									        <th class="text-center">Select</th>
									      </tr>
									    </thead>
									    <tbody>

									    	<?php
									    	for($i=0; $i<$count_membre; $i++){
									    		$fetch_mem=$out_membre->fetch();
									    		?>

									      <tr>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_mem ['mid'];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_mem ["nom"];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_mem ["prenom"];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_mem ["tel"];?></td>
									        <td class="text-center" style="vertical-align:middle">
									        	<div class="checkbox">
											  <label><input type="checkbox" id="choix" name="choix" value="<?php echo $fetch_mem ['tel'];?>" ></label>
											</div>
										
										</td>


									        
									      </tr>

									      <?php
											}
											?>
									    </tbody>
									  </table>
									  </div>
									  <a href="groupe_com.php?sms=<?php echo $sms; ?>"> Envoi aux Groupes </a>&nbsp;&nbsp;&nbsp;
									  <input type="checkbox" id="tout"><label for="tout">Selectionnez tout </label> &nbsp;&nbsp;&nbsp;
									  <button type="button" id="submit" class="btn btn-default">Envoyer</button> &nbsp;&nbsp;&nbsp;
									 <button type="reset" id="reset" name="reset" class="btn btn-default">Annuler</button>
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


	<script>
	$(function() {

$("#tout").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
		$("#flash").hide();

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
            //alert("My favourite sports are: " + choix.join(", "));
            var dataString = "sms="+ sms+ "&choix="+ choix;

//alert(dataString);

$("#flash").show();
$("#flash").fadeIn(400).html(bootbox.alert("<strong> SMS en cours d'envoi ...</strong>"));
$.ajax({
type: "POST",
url: "sms_eng.php",
data:dataString,
cache:true,
success: function(out){
	var result = out.slice(-2);
		{
	if (result=="OK"){
	$("#flash").hide();
	bootbox.alert("<strong> SMS envoyé !</strong>" , function(result) { 
	$('#form').clearForm();
	window.location.href ='communication.php'
});
       
		}else if (result=="NO"){
	$("#flash").hide();
	bootbox.alert("<strong> Envoi du SMS avorté!</strong>" , function(result) { 
	$('#form').clearForm();
	window.location.href ='communication.php'
});
       
		}
	}	
}  
});
return false;


});
});

</script>

 <script type="text/javascript">

$('table.table-hover').each(function() {
    var currentPage = 0;
    var numPerPage = 30;
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