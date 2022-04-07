<?php
require_once("../connection.php");
$query_doc=$con->query("SELECT * from documents order by did desc;");
$count_doc=$query_doc->rowCount();

$query_au=$con->query("SELECT * from audios order by aid desc;");
$count_au=$query_au->rowCount();
?>

<!DOCTYPE html>
<html>
	<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
   			<title> Tabernacle de L'Alliance</title>
   			<link rel="shortcut icon" type="image/x-icon" href="../images/favicon(2).ico" />
   			<link href="../Lib_bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   			<link href="../Lib_bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
   			<link rel="stylesheet" type="text/css" href="../Lib_bootstrap/dist/sweetalert.css">
   			<link type="text/css" rel="stylesheet" href="../Lib_bootstrap/tab.css">

   	</head>

	<!-- <body> -->
<body>
		
		<div class="section">
	 	 <nav class="navbar navbar-default navbar-fixed-top">
		    <div class="container-fluid" id="nv">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar_col">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="../images/used/logo_tuned.jpg" class="img-rounded img-responsive" alt="logo"  style="width:180px;height:75px" ></a>
        </div> <br/>
        <div class="collapse navbar-collapse" id="navbar_col">
         <ul class="nav navbar-nav navbar-right" id="navbar">
          <li><a href="../index.php">Acceuil</a></li>
          <li><a href="program.php">Programmes</a></li>
          <li ><a href="galerie.php">Galerie</a></li>
          <li><a href="branches.php">Branches</a></li>
            <li class="active"><a href="messages.php">Messages</a></li>  
          <li><a href="contacts.php">Contacts</a></li>
          </ul>
        </div>
      </div>
		</nav> 
		</div><br/><br/><br/>


            <div class="jumbotron">
                    <h1>Messages</h1>
            </div><br/><br/>

        <div class="container-fluid">
    <div class="row">
      <div class="col-md-3"> </div>

        <div class="col-md-6"> 

          <form class="form-horizontal"  method="POST" id="form" action="newletter.php" multipart/form-data role="form">

                <div id="flash"></div>
                <br/>
                <h2 class="text-center" style="color:rgb(255, 213, 29);"> <b> Entrez vos données </b> </h2> <br/><br/>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="nom" style="color:rgb(255, 213, 29);" >Nom(s) <span style="color:red;">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nom" style="text-transform: capitalize;" placeholder="Entrez le(s) Nom(s)" maxlength="30">
                    <div id='check_nom' style="color:red"></div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="mail" style="color:rgb(255, 213, 29);">Email <span style="color:red;">*</span></label>
                  <div class="col-sm-8"> 
                    <input type="text" class="form-control" id="mail" style="text-transform: capitalize;" placeholder="Entrez l'email" maxlength="50">
                    <div id='check_mail' style="color:red"></div>
                  </div>
                </div>

                <div class="form-group"> 
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" id="submit" name="submit" class="btn btn-default">Souscrire</button> &nbsp;&nbsp;&nbsp;
                    <button type="reset" id="reset" name="reset" class="btn btn-default">Reprendre</button>&nbsp;&nbsp;&nbsp;
                     <img src="../images/default.gif"  id="lod" class="img-rounded" width="30" height="30">
                  </div>
                </div>

              </form>

        </div>

        <div class="col-md-3"> </div>
                </div>
              </div>
              <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
              <br/><br/><br/><br/><br/><br/><br/><br/>
        <div class="container-fluid">   
        <div class="row"  style="color:rgb(104, 1, 1); background:rgb(255, 213, 29);">
      <footer class="col-md-12">
          <h5 class="text-center">Tabernacle de L'Alliance &reg;</h5> 
        </footer>
      </div>
      </div>


	</body>

			<script src="../Lib_bootstrap/jquery-1.12.4.min.js"></script>
		  <script src="../Lib_bootstrap/docs/assets/js/vendor/jquery.min.js"></script>
			<script src="../Lib_bootstrap/dist/js/bootstrap.min.js"></script>
			<script src="../Lib_bootstrap/js/collapse.js"></script>
			<script src="../Lib_bootstrap/js/dropdown.js"></script>
			<script src="../Lib_bootstrap/js/button.js"></script>
			<script src="../Lib_bootstrap/bootbox.min.js"></script>
			<script src="../Lib_bootstrap/dist/sweetalert.min.js"></script>

      <script type="text/javascript">
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

      $(function() {

      $('#lod').hide();

        $("#reset").click(function() {
        $('#lod').hide();
        $("#nom").focus();
       });

        $("#submit").click(function() {

      var nom= $("#nom").val();
      var mail= $("#mail").val();
      var emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
      if (nom.length == 0 ) {
      $('#check_nom').html("*Entrez un <strong>Nom</strong>").show(); // This Segment Displays The Validation Rule For All Fields
      $("#nom").focus(); 

      $("#nom").change(function(){ $('#check_nom').hide();
      });
      return false;
      }
      else if ((mail.length == 0) || (!mail.match(emailRegex))) {
        $('#check_mail').html("*Entrez une addresse <strong>Email Valide</strong>").show(); // This Segment Displays The Validation Rule For All Fields
        $("#mail").focus(); 

        $("#mail").change(function(){ $('#check_mail').hide();
        });
        return false;
        }
        else{

        var dataString ="nom="+ nom +"&mail="+ mail;

                $('#lod').show();
        
        $.ajax({
        type: "POST",
        url: "newletter_eng.php",
        data:dataString,
        cache:true,
        processData:false,
        success: function(out){

          $("#flash").fadeIn(400).html(out);
          {
          if (out=="OK"){
          $('#form').clearForm();
          $('#lod').hide();
          bootbox.alert("<strong>Données enregistrées!</strong>", function(result) { 
          window.location.href ='messages.php';
          });
                  }
                }
                $("#nom").focus();
              }

            });
            return false;

          }
      })
 })

      </script>

	</html>