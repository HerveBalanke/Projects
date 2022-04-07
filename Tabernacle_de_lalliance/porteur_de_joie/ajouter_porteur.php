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
					      <li class="active"><a href="ajouter_porteur.php">GERER PORTEURS DE JOIE</a></li>
                <li><a href="ajouter_evangelisation.php">GERER L'EVANGELISATION</a></li>
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
				    <h3 class="text-center"><b>PORTEURS DE JOIE</b></h3>

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
												 <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b>AJOUTER UN PORTEUR DE JOIE</b></div>


													<div class="panel-body">
         	<form role="form" id="form" method="POST" action="ajouter_porteur.php">
              <div id="flash"></div>

                <div class="form-group">
                  <label for="nom">Nom:</label>
                  <input type="text" class="form-control" id="nom" style="text-transform: capitalize;" placeholder="Entrez Nom" maxlength="30">
                  <div id='check_nom' style="color:red"></div>
                </div>
                <div class="form-group">
                  <label for="prenom">Prenom:</label>
                  <input type="text" class="form-control" id="prenom" style="text-transform: capitalize;" placeholder="Entrez Prenom" maxlength="30">
                  <div id='check_prenom' style="color:red"></div>
                </div>
                 <div class="form-group">
                  <label for="tel">Telephone:</label>
                  <input type="telephone" class="form-control" id="tel" placeholder="Entrez le N° de Telephone" maxlength="10">
                  <div id='check_tel' style="color:red"></div>
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email"  placeholder="Entrez L'address e-mail" maxlength="30">
                  <div id='check_email' style="color:red"></div>
                </div>
  
            <button type="button" id="submit" name="submit" class="btn btn-default">Sauvegarder</button> &nbsp;&nbsp;&nbsp;
            <button type="reset" id="reset" name="reset" class="btn btn-default">Reprendre</button>&nbsp;&nbsp;&nbsp;
            <img src="../images/default.gif"  id="lod" class="img-rounded" width="30" height="30">
          </form>

													</div>

											</div>
						  
				  

          </div>
          <div class="col-md-3"></div>
        </div>
        		<div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"><b>LISTE DES PORTEUS DE JOIE</b></div>
                <div class="panel-body" id="tab">
                 <?php include_once('porteur_liste.php'); ?>
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
    $('#tab_1').dataTable();
  });
  </script>


	<script type="text/javascript">

      function sup_pid(pid)
            { 
              var info="pid="+ pid;
            bootbox.confirm("<b>Supprimer le Porteur de Joie?</b>" , function(result) {
            if(result)
            {
              $.ajax({
              type: "POST",
              url: "supprimer_porteur.php",
              data: info,
              cache:true,
              processData:false,
              success: function(html){
                $('#tab').load("porteur_liste.php");
                bootbox.alert("<b>Porteur de Joie Supprimé.</b>");
                }
                  });     
                    }
                      });
                
            }

    $("#reset").click(function() {
    $('#check_nom').hide();
    $('#check_prenom').hide();
    $('#check_tel').hide();
    $('#check_email').hide();
    $("#nom").focus();
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

                    var dataString ="nom="+ nom + "&prenom=" + prenom + "&tel=" + tel + "&email=" + email;
                    
                    $('#lod').show();
                    $.ajax({
                    type: "POST",
                    url: "ajouter_porteur_eng.php",
                    data:dataString,
                    cache:true,
                    processData:false,
                    success: function(result){
                    {

                          var out=result.slice(-5);
                          var txt=out.split(",");
                          
                          if (out=="SENTY"){
                          $('#form').clearForm();
                          $('#lod').hide();
                          bootbox.alert("<strong>Compte créé! Les données ont été envoyé à l'adresse teléphonique du Porteur J</strong>");
                          $('#tab').load("porteur_liste.php");
                          } else if (out=="SENTN"){
                          $('#form').clearForm();
                          $('#lod').hide();
                          bootbox.alert("<strong>Compte créé! Les données n'ont pas éte envoyé à l'addresse téléphonique du porteur J. Vérifiez le numero de tel du destinataire, le compte SMS et la connection internet!</strong>");
                          $('#tab').load("porteur_liste.php");
                          }else if (out=="email"){
                          $('#lod').hide();
                          bootbox.alert("<strong>Cette addresse est en cours d'utilisation, veuillez entrer une autre</strong>");
                          $("#email").focus();
                          $('#check_email').html("*Entrez une autre addresse <strong>Email Valide</strong>").show();
                          $('#tab').load("porteur_liste.php");
                          $("#email").change(function(){ $('#check_email').hide();
                          })
                          }else if (out=="extel"){
                          $('#lod').hide();
                          bootbox.alert("<strong>Ce numéro est en cours d'utilisateur, veuillez entrer un autre</strong>");
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