<?php  
include_once("../sessions/session_pjr.php");
require_once("../setup/connection.php");
$pjr=$_SESSION['pjr'];
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
              <ul class="nav navbar-nav" id="navbar" >
                 <li> <a  href="ajouter_porteur.php">GERER PORTEURS DE JOIE</a></li>
                    <li><a href="ajouter_evangelisation.php">GERER L'EVANGELISATION</a></li>
                    <li class="active"><a href="communication.php">COMMUNICATION</a></li>
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
				    <h3 class="text-center"><b>PORTEURS DE JOIE</b></h3>

				  </div>
      	</div>
        </div>
      </div>
    </div>

    <?php 
            require_once("../setup/connection.php");
            $pid=$_GET["pid"]; 
            $uti_det=$con->query("select * from porteur where pid='$pid';") or die(print_r($con->errorInfo()));
            $fetch_uti=$uti_det->fetch();
            ?>


     <div class="section">
      <div class="container">
        <div class="row">
        <div class="col-md-3"></div>
          <div class="col-md-6">

									  	
										  	<div class="panel panel-default">
												 <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b>MODIFIER UN PORTEUR DE JOIE</b></div>


													<div class="panel-body">
         	<form role="form" id="form" method="POST" action="ajouter_porteur.php">
              <div id="flash"></div>
                <input type="hidden" class="form-control" id="uid" value="<?php  echo $fetch_uti["pid"]; ?>" style="text-transform: capitalize;" placeholder="Entrez Nom" maxlength="30">
                <div class="form-group">
                  <label for="nom">Nom:</label>
                  <input type="text" class="form-control" id="nom" value="<?php  echo $fetch_uti["nom"]; ?>" style="text-transform: capitalize;" placeholder="Entrez Nom" maxlength="30">
                  <div id='check_nom' style="color:red"></div>
                </div>
                <div class="form-group">
                  <label for="prenom">Prenom:</label>
                  <input type="text" class="form-control" id="prenom" value="<?php  echo $fetch_uti["prenom"]; ?>" style="text-transform: capitalize;" placeholder="Entrez Prenom" maxlength="30">
                  <div id='check_prenom' style="color:red"></div>
                </div>
                 <div class="form-group">
                  <label for="tel">Telephone:</label>
                  <input type="telephone" class="form-control" id="tel" value="<?php  echo $fetch_uti["tel"]; ?>" placeholder="Entrez le N° de Telephone" maxlength="10">
                  <div id='check_tel' style="color:red"></div>
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email"  value="<?php  echo $fetch_uti["email"]; ?>" placeholder="Entrez L'address e-mail" maxlength="30">
                  <div id='check_email' style="color:red"></div>
                </div>
  
            <button type="button" id="submit" name="submit" class="btn btn-default">Sauvegarder</button> &nbsp;&nbsp;&nbsp;
            <button type="reset" id="reset" name="reset" class="btn btn-default">Reprendre</button>&nbsp;&nbsp;&nbsp;
            <a href="ajouter_porteur.php">Annuler</a>&nbsp;&nbsp;&nbsp;
            <img src="../images/default.gif"  id="lod" class="img-rounded" width="30" height="30">
          </form>
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
	
	 // <script type="text/javascript">
  //  $(document).ready(function(){
  //   $('#tab_1').dataTable();
  // });
  // </script>


	 <script type="text/javascript">

            $(function() {

            $('#nom').focus();
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

              var pid= $("#pid").val();
              var nom= $("#nom").val();
              var prenom= $("#prenom").val();
              var tel= $("#tel").val();
              var email= $("#email").val();
              var phoneNumber = /[0-9-()+]{3,20}/; 
              var emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

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

                    else if ((email.length == 0) || (!email.match(emailRegex))) {
                    $('#check_email').html("*Entrez une addresse <strong>Email Valide</strong>").show(); // This Segment Displays The Validation Rule For All Fields
                    $("#email").focus(); 

                    $("#email").change(function(){ $('#check_email').hide();
                    });
                    return false;
                    } else{

                    var dataString ="pid=" + pid + "&nom="+ nom + "&prenom=" + prenom + "&tel=" + tel + "&email=" + email;
                    
                    $('#lod').show();
                    $.ajax({
                    type: "POST",
                    url: "modifier_porteur_eng.php",
                    data:dataString,
                    cache:true,
                    processData:false,
                    success: function(out){
                    {
                          
                          if (out=="OK"){
                          $('#form').clearForm();
                          $('#lod').hide();
                          bootbox.alert("<strong>Compte modifié!</strong>", function(result) {
                          window.location.href ='ajouter_porteur.php';
                          });
                          }else if (out=="exist_email"){
                          $('#lod').hide();
                          bootbox.alert("<strong>Cette addresse est en cours d'utilisation, veuillez entrer une autre</strong>");
                          $("#email").focus();
                          $('#check_email').html("*Entrez une autre addresse <strong>Email Valide</strong>").show();
                          $('#tab').load("porteur_liste.php");
                          $("#email").change(function(){ $('#check_email').hide();
                          })
                          }else if (out=="exist_tel"){
                          $('#lod').hide();
                          bootbox.alert("<strong>Ce numéro est en cours d'porteur, veuillez entrer un autre</strong>");
                          $("#tel").focus();
                          $('#check_tel').html("*Entrez un autre <strong>Numero Tel Valide</strong>").show();
                          $('#tab').load("porteur_liste.php");
                          $("#tel").change(function(){ $('#check_tel').hide();
                          })
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