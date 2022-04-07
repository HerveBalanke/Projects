

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

		   			$mem_ma=$con->query("select * from membre where sit_mat='Marie(e)';") or die (print_r($con->errorInfo()));
		   			$count_membre=$mem_ma->rowCount();

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
				    <h3 class="text-center">Rapports</h3>

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
						       		 <a  href="bilan.php">Membres</a>
									</li>
									<li >
										<a href="bilan_entrees.php" >Entrées</a>
									</li>
									<li>
						       		 <a  href="bilan_sorties.php">Sorties</a>
									</li>
									<li>
						       		 <a  href="bilan_groupe.php">Groupes</a>
									</li>
								</ul>

										<br/>

								<div class="panel panel-default">
  										<div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> MEMBRES MARIES </b> </div>
  										<div class="panel-body">
  									
         										<div class="col-md-1"> </div>
         										<div class="col-md-10">
         										<div id="flash"></div>
         										<table class="table table-striped table-condensed table-hover">
												    <thead>
												      <tr>
												        <th>Nom</th>
												        <th>Prenom</th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
									    	for($i=0; $i<$count_membre; $i++){
									    		$fetch_mem_ma=$mem_ma->fetch();
									    		?>
												      <tr>
												        <td><a href="view_membre.php?mid=<?php echo $fetch_mem_ma['mid']?>"><?php echo $fetch_mem_ma['nom']?></td>
												        <td><?php echo $fetch_mem_ma['prenom']?> </td>
												      </tr>
												      <?php
														}
												      ?>
												    </tbody>
												  </table>
         										</div>
         										<div class="col-md-1"> </div>
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

		$("#reset").click(function() {

		$('#check_montant').hide();
		$('#check_id').hide();
		$('#check_date').hide();
	 	$("#montant").focus();
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
	var id= $("#id").val();
	var mon= $("#montant").val();

if (date.length == 0 ) {
$('#check_date').html("*Choisissez une <strong>Date</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#date").focus(); 

$("#date").change(function(){ $('#check_date').hide();
});
return false;
}
else if (id.length == 0 || id=="--- Selectionnez un membre ---") {
$('#check_id').html("*Selectionnez un <strong>Identifiant</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#id").focus(); 

$("#id").change(function(){ $('#check_id').hide();
});
return false;
}
else if (mon.length == 0 ) {
$('#check_mon').html("*Entrez Le <strong>Montant</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#montant").focus(); 

$("#montant").change(function(){ $('#check_mon').hide();
});
return false;
}else{

var dataString = "date="+ date + "&id="+ id +"&mon="+ mon ;

//alert(dataString);

$("#flash").show();
$("#flash").fadeIn(400).html(" <div class='progress'> <div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'><strong> Sauvegarde...</strong></div></div>");
$.ajax({
type: "POST",
url: "dimes_entree_eng.php",
data:dataString,
cache:true,
success: function(result){
	
	{
	if (result=="OK"){
		$('#check_date').hide();
	
	$("#flash").fadeIn(400).html("<div class='alert alert-success text-center'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Entrée Faite</strong></div>");
	$('#form_entree').clearForm();
	function hidealert(){
				$("#flash").hide();
			}
	setTimeout(hidealert , 10000);
		}
	}	
}  
});
return false;
}


});
});

</script>

<script type='text/javascript'>
      var table = $('#er');
     // refresh every 5 seconds
     var refresher = setInterval(function(){
       $('#er').load(document.URL +  ' #er');
     }, 5000);
     setTimeout(function() {
       clearInterval(refresher);
     }, 1800000);
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