<?php  
include_once("../sessions/session_cellule.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$cellule=$_SESSION['cellule'];
$zone_cel=$_SESSION['zone_cel'];
$rid=$_GET['rid'];
$reunion_det=$con->query("select * from reunion where rid='$rid';") or die(print_r($con->errorInfo()));
$fetch_reunion=$reunion_det->fetch();
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
					      <li class="active"><a  href="ajouter_leader.php">Gerer Leader</a></li>
					      <li><a href="gerer_cellule.php">Gerer Cellule</a></li>
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
				    <h3 class="text-center">Gerer Cellule</h3>

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
                       <a  href="gerer_cellule.php" >REUNION</a>
                  </li>
                  <li><a href="#2b">MEMBRES</a>
                  </li>                
                </ul>
                  <br/>

          </div>
        </div>
        		<div class="row">
              <div class="col-md-2"> </div>
          <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"><b>MODIFIER LA REUNION</b></div>
                <div class="panel-body" id="tab1">

                <form role="form" id="form" method="POST" action="gerer_cellule.php">
                 <input type="hidden" class="form-control" id="rid" value="<?php  echo $rid; ?>" >

              <div id="flash"></div>

                <div class="form-group">
                  <label for="nom">Theme <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" id="theme" value="<?php  echo $fetch_reunion["theme"]; ?>" style="text-transform: capitalize;" placeholder="Entrez le Theme" maxlength="30">
                  <div id='check_theme' style="color:red"></div>
                </div>
                                <div class="form-group">
                                <label class="control-label " for="date">Date de la Réunion <span style="color:red;">*</span></label> 
                                 <div class="bfh-datepicker" data-format="y-m-d" data-date="<?php  echo $fetch_reunion["date"]; ?>" id="date">
                                <div class="input-prepend bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                                  <span class="add-on"><i class="icon-calendar"></i></span>
                                  <input type="text" class="input-medium" id="dat" readonly>
                                </div>
                                <div class="bfh-datepicker-calendar">
                                  <table class="calendar table table-bordered">
                                    <thead>
                                      <tr class="months-header">
                                        <th class="month" colspan="4">
                                          <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                          <span></span>
                                          <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                                        </th>
                                        <th class="year" colspan="3">
                                          <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                          <span id="year"></span>
                                          <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                                        </th>
                                      </tr>
                                      <tr class="days-header">
                                      </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div id='check_date' style="color:red"></div>
                              </div>
  
            <button type="button" id="submit" name="submit" class="btn btn-default">Sauvegarder</button> &nbsp;&nbsp;&nbsp;
            <button type="reset" id="reset" name="reset" class="btn btn-default">Reprendre</button>&nbsp;&nbsp;&nbsp;
            <a href="gerer_cellule.php" title="Annuler le processus"> Annuler </a>&nbsp;&nbsp;&nbsp;
            <img src="../images/default.gif"  id="lod" class="img-rounded" width="30" height="30">
          </form>

              </div>
            </div>
          </div>
          <div class="col-md-2"> </div>
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
    $('#tab_1').dataTable();
  });
  </script>


	<script type="text/javascript">

    $("#reset").click(function() {
    $('#check_date').hide();
    });

            $(function() {

            $('#lod').hide();

              $("#submit").click(function() {


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

              var rid= $("#rid").val();
              var theme= $("#theme").val();
              var date= $("#date").val();
                    if (theme.length == 0 ) {
                    $('#check_theme').html("*Entrez un <strong>Theme</strong>").show(); // This Segment Displays The Validation Rule For All Fields
                    $("#theme").focus(); 

                    $("#theme").change(function(){ $('#check_theme').hide();
                    });
                    return false;
                    } else if (date.length == 0 ) {
                    $('#check_date').html("*Choisissez une <strong>Date</strong>").show(); // This Segment Displays The Validation Rule For All Fields
                    $("#date").focus(); 

                    $("#date").change(function(){ $('#check_date').hide();
                    });
                    return false;
                    } else{

                    var dataString ="rid="+ rid + "&theme="+ theme+ "&date="+ date;
                    
                    $('#lod').show();
                    $.ajax({
                    type: "POST",
                    url: "modifier_reunion_eng.php",
                    data:dataString,
                    cache:true,
                    processData:false,
                    success: function(out){
                    {
                          if (out=="OK"){
                          $('#form').clearForm();
                          $('#lod').hide();
                          $('#check_date').hide();
                          bootbox.alert("<strong>Reunion modifiée</strong>", function(result){
                            window.location.href='gerer_cellule.php';
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