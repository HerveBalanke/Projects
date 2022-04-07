<?php  
include_once("../sessions/session_pjr.php");
require_once("../setup/connection.php");
$pjr=$_SESSION['pjr'];
$out_zone=$con->query("select * from zone;") or die (print_r($con->errorInfo()));
$count_zone=$out_zone->rowCount();
$eid=$_GET["eid"]; 
$eid_det=$con->query("select * from evangelisation inner join zone on zone.zid=evangelisation.zone where eid='$eid';") or die(print_r($con->errorInfo()));
$fetch_eid=$eid_det->fetch();
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
              <ul class="nav navbar-nav" id="navbar">
                    <li class="active"><a href="ajouter_evangelisation.php">GERER L'EVANGELISATION</a></li>
                    <li><a href="communication.php">COMMUNICATION</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right" id="dec">
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
				    <h3 class="text-center"><b> GERER L'EVANGELISATION</b></h3>

				  </div>
      	</div>
        </div>
      </div>
    </div>

     <div class="section">
      <div class="container">
        <div class="row">
        <div class="col-md-3"></div>
          <div class="col-md-6">

									  	
										  	<div class="panel panel-default">
												 <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b>MODIFIER UN(E) EVANGELISE(E)</b></div>


													<div class="panel-body">
         	      <form role="form" id="form" method="POST" action="ajouter_porteur.php">
              <div id="flash"></div>
                <input type="hidden" class="form-control" id="eid" value="<?php  echo $fetch_eid["eid"]; ?>" style="text-transform: capitalize;" placeholder="Entrez Nom" maxlength="30">
                <div class="form-group">
                  <label for="nom">Nom:</label>
                  <input type="text" class="form-control" id="nom" value="<?php  echo $fetch_eid["nom"]; ?>" style="text-transform: capitalize;" placeholder="Entrez Nom" maxlength="30">
                  <div id='check_nom' style="color:red"></div>
                </div>
                <div class="form-group">
                  <label for="prenom">Prenom:</label>
                  <input type="text" class="form-control" id="prenom" value="<?php  echo $fetch_eid["prenom"]; ?>" style="text-transform: capitalize;" placeholder="Entrez Prenom" maxlength="30">
                  <div id='check_prenom' style="color:red"></div>
                </div>
                 <div class="form-group">
                  <label for="tel">Telephone:</label>
                  <input type="telephone" class="form-control" id="tel" value="<?php  echo $fetch_eid["tel"]; ?>" placeholder="Entrez le N° de Telephone" maxlength="10">
                  <div id='check_tel' style="color:red"></div>
                </div>
                <div class="form-group">
                  <label for="zone">Zone <span style="color:red;">*</span></label>
                     <select class="form-control" id="zone" >
                      <option value= "<?php echo $fetch_eid ["zid"];?>"> <?php echo $fetch_eid ["zone"];?> </option>

                    <?php
                    for($i=0; $i<$count_zone; $i++){
                      $fetch_zone=$out_zone->fetch();

                    ?>
                      <option value= "<?php echo $fetch_zone ["zid"];?>"> 
                      <?php echo $fetch_zone ["zone"];?>
                      
                      <?php
                    }

                      ?>

                    </option>
                    <option>Autre</option>

                    </select>
                    <div id="block_zone">
                    <br/>
                    <input type="text" class="form-control" id="zone_alt" style="text-transform: capitalize;" placeholder="Entrez la Zone" maxlength="30">
                    <div id='check_zone_alt' style="color:red"></div>
                    </div>
                    <div id='check_zone' style="color:red"></div>
                </div>
                 <div class="form-group">
                  <label class="control-label" for="dob">Date <span style="color:red;">*</span></label>
                   <div class="bfh-datepicker" data-format="y-m-d" data-date="today" id="date">
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
            <a href="ajouter_evangelisation.php">Annuler</a>&nbsp;&nbsp;&nbsp;
            <img src="../images/default.gif"  id="lod" class="img-rounded" width="30" height="30">
          </form>
														

													</div>

											</div>
						  
				  

          </div>
          <div class="col-md-3"></div>
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
	
	 // <script type="text/javascript">
  //  $(document).ready(function(){
  //   $('#tab_1').dataTable();
  // });
  // </script>


	<script type="text/javascript">

            $(function() {

            $('#lod').hide();
            $('#block_zone').hide();

            var zone= $("#zone").val();
            var zone_alt= $("#zone_alt").val();

        $('#zone').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_zone").show();
        }
        else{
        $("#block_zone").hide();
        $("#zone_alt").val("");
        }
    });

          $("#reset").click(function() {
    $("#nom").focus();
    $('#block_zone').hide();
    $('#check_date').hide();
    $('#lod').hide();
    });

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

              var eid= $("#eid").val();
              var nom= $("#nom").val();
              var prenom= $("#prenom").val();
              var tel= $("#tel").val();
              var zone= $("#zone").val();
              var zone_alt= $("#zone_alt").val();
              var date= $("#date").val();
              var phoneNumber = /[0-9-()+]{3,20}/;

              if (zone=="Autre") {
                  zone = zone_alt;
                    }

                    if (nom.length == 0 ) {
                    $('#check_nom').html("*Entrez un <strong>Nom</strong>").show(); // This Segment Displays The Validation Rule For All Fields
                    $("#nom").focus(); 

                    $("#nom").change(function(){ $('#check_nom').hide();
                    });
                    return false;
                    }


                    else if (prenom.length == 0 ) {
                    $('#check_prenom').html("*Entrez un <strong>Prenom</strong>").show(); // This Segment Displays The Validation Rule For All Fields
                    $("#prenom").focus(); 

                    $("#prenom").change(function(){ $('#check_prenom').hide();
                    });
                    return false;
                    }

                     else if ((tel.length < 10) || (!tel.match(phoneNumber))) {
                    $('#check_tel').html("*Entrez un <strong>Numero Tel Valide</strong>").show(); // This Segment Displays The Validation Rule For All Fields
                    $("#tel").focus(); 

                    $("#tel").change(function(){ $('#check_tel').hide();
                    });
                    return false;
                    }

                    else if (zone.length == 0 || zone=="--- Choisir une Zone ---" || zone=="Autre") {
                    $('#check_prof').html("*Selectionnez une <strong>Zone</strong>").show(); // This Segment Displays The Validation Rule For All Fields
                    $("#zone").focus(); 

                    $("#zone").change(function(){ $('#check_zone').hide();
                    });
                    return false;
                    } else if (date.length == 0 ) {
                    $('#check_date').html("*Choisissez une <strong>Date</strong>").show(); // This Segment Displays The Validation Rule For All Fields
                    $("#date").focus(); 

                    $("#date").change(function(){ $('#check_date').hide();
                    });
                    return false;
                    }else{

                    var dataString ="eid="+ eid +"&nom="+ nom + "&prenom=" + prenom + "&tel=" + tel + "&zone=" + zone+ "&zone_alt=" + zone_alt + "&date=" + date;

                    $('#lod').show();
                    $.ajax({
                    type: "POST",
                    url: "modifier_evangelisation_eng.php",
                    data:dataString,
                    cache:true,
                    processData:false,
                    success: function(out){
                    {

                          $('#check_date').hide();
                          if (out=="OK"){
                          $('#form').clearForm();
                          $('#lod').hide();
                          bootbox.alert("<strong>Evangélisé(e) modifié(e)!</strong>", function(result){
                            window.location.href="ajouter_evangelisation.php";
                          });
                          } else if (out=="NO_zone"){
                          $('#lod').hide();
                          bootbox.alert("<strong>Cette zone a deja été enregistré, veuillez la selectionner dans la liste déroulante</strong>", function(result) { 
                          $("#zone").focus();
                          $('#check_zone').html("*Choisissez cette zone dans <strong>la liste déroulante</strong>").show();
                          });
                          $("#zone").change(function(){ $('#check_zone').hide();
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