

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
									<li>
						       		 <a  href="communication.php">SMS</a>
									</li>
									<li  class="active">
										<a href="email.php" >Email</a>
									</li>
								</ul>

										<br/>

								<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> Email </b> </div>
  										<div class="panel-body">
  												<div class="row"> 
         										<div class="col-md-6"> 
         										<div id="flash"></div>
         										<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> Email </b> </div>
         										<div class="panel-body">
         										<form class="form"  method="POST" id="form" action="email.php" multipart/form-data role="form">

         											
												<div class="form-group">
														    <label class="control-label col-sm-2" for="email">Adresse:</label>
																  <select class="form-control" id="email">
																  	<option>--- Choisir un Adresse ---</option>

																	<?php
																	for($i=0; $i<$count_mem; $i++){
																		$fetch_mem=$out_mem->fetch();

																	?>
																    <option value= "<?php echo $fetch_mem ["email"];?>"> 
																    <?php echo $fetch_mem ["mid"]." - ".$fetch_mem ["nom"]." ".$fetch_mem ["prenom"]." - ".$fetch_mem ["email"] ;?>

																    <?php
																	}

																    ?>

																	</option>
																	<option>Autre</option>

																  </select>
																  </div>

																  <div id="block_email">
																  <div class="form-group">
																  <input type="text" class="form-control" id="email_alt"  placeholder="Entrez Un Email" >
																  </div>
																</div>
																  <div id='check_email' style="color:red"></div>
																
         											<div class="form-group">
													  <input type="text" class="form-control" id="head" placeholder="Entete" >
													  <div id='check_head' style="color:red"></div>
													</div>
												  <div class="form-group">
												  <textarea class="form-control" rows="8" id="mess" placeholder="Corps de l'email"></textarea>
												<div id='check_mess' style="color:red"></div>
												</div>
												
												  <button type="button" id="sub_un" class="btn btn-default">Envoyer</button> &nbsp;&nbsp;&nbsp;
												  <button type="button" id="submit" class="btn btn-default">Envoi multiple</button> &nbsp;&nbsp;&nbsp;
														      <button type="reset" id="reset" name="reset" class="btn btn-default">Reprendre</button>
												</form>

											  			</div>
											 			</div>
											 			</div>	
         										
         										<div class="col-md-6"> 

         											<div class="panel panel-default">
  												<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> Historique </b> </div>
         										<div class="panel-body">
         											<div class="table-responsive">
         											<table class="table table-striped table-condensed table-hover">
													    <thead>
													      <tr>
													        <th>Email</th>
													        <th>Message</th>
													        <th>Date</th>
													      </tr>
													    </thead>
													    <tbody>
													      <tr>
													        <td>John</td>
													        <td>Doe</td>
													        <td>john@example.com</td>
													      </tr>
													      <tr>
													        <td>Mary</td>
													        <td>Moe</td>
													        <td>mary@example.com</td>
													      </tr>
													      <tr>
													        <td>July</td>
													        <td>Dooley</td>
													        <td>july@example.com</td>
													      </tr>
													    </tbody>
													  </table>
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

		$('#block_email').hide();
		var email= $("#email").val();
		var email_alt= $("#email_alt").val();

		$('#email').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_email").show()
        }
        else{
        $("#block_email").hide()
        }
    	});

		$("#flash").hide();

		$("#reset").click(function() {
		$('#block_email').hide();
		$('#check_email').hide();
		$('#check_head').hide();
		$('#check_mess').hide();
	 	$("#mess").focus();
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
	var head= $("#head").val();
	var mess= $("#mess").val();
if (head.length == 0 ) {
$('#check_head').html("*Entrez un <strong>Entete</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#head").focus(); 

$("#head").change(function(){ $('#check_head').hide();
});
return false;
}else{

window.location.href ='select_email.php?mess='+ mess+'&head='+head;
}


});


		$("#sub_un").click(function() {
	var email= $("#email").val();
	var head= $("#head").val();
	var mess= $("#mess").val();
	var emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
			
			if (email=="Autre") {
				email = email_alt;
					}


if ((email.length == 0) || (!email.match(emailRegex)) || email=='--- Choisir un Adresse ---') {
$('#check_email').html("*Entrez un <strong>Email</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#email").focus(); 

$("#email").change(function(){ $('#check_email').hide();
});
return false;
} else if(head.length == 0 ) {
$('#check_head').html("*Entrez un <strong>Entete</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#head").focus(); 

$("#head").change(function(){ $('#check_head').hide();
});
return false;
}else if(mess.length == 0 ) {
$('#check_mess').html("*Entrez un <strong>SMS</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#mess").focus(); 

$("#mess").change(function(){ $('#check_mess').hide();
});
return false;
}else{

var dataString = "email="+ email + "&head="+ head+ "&mess="+ mess;

//alert(dataString);

$("#flash").show();
$("#flash").fadeIn(400).html(bootbox.alert("<strong> Envoi de l'email en cours...</strong>"));
$.ajax({
type: "POST",
url: "email_un_eng.php",
data:dataString,
cache:true,
success: function(result){
	
	{
	if (result=="OK"){
	$("#flash").hide();
	bootbox.alert("<strong> Email envoyé !</strong>" , function(result) { 
	$('#form').clearForm();
	window.location.href ='email.php'
});
       
		}else if (result=="NO"){
	$("#flash").hide();
	bootbox.alert("<strong> Envoi de l'email avorté!</strong>" , function(result) { 
	$('#form').clearForm();
	window.location.href ='email.php'
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
    var numPerPage = 20;
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