

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
        <link href="../Lib_bootstrap/social_icon/bootstrap-social.css" rel="stylesheet">
        <link href="../Lib_bootstrap/social_icon/assets/css/font-awesome.css" rel="stylesheet">
        <link href="../Lib_bootstrap/social_icon/assets/css/bootstrap.css" rel="stylesheet">
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
          <li><a href="messages.php">Messages</a></li>  
          <li class="active"><a href="contacts.php">Contacts</a></li>
          </ul>
        </div>
      </div>
		</nav> 
		</div><br/><br/><br/>


            <div class="jumbotron">
                    <h1>Contacts</h1>
            </div><br/><br/>

        <div class="container-fluid">
        <div class="row">

           <div class="col-md-4">
            <div class="text-center well" style="background:rgb(255, 213, 29) !important; border-color:rgb(255, 213, 29) !important;">
              <div class="row">
           <div class="col-md-12">
            <h4 class="" style="color:rgb(104, 1, 1);"><span class="glyphicon glyphicon-phone"></span> 054 5814 024</h4> <br/>
            <h4 style="color:rgb(104, 1, 1);"><span class="glyphicon glyphicon-envelope"></span> tabernacledelalliance@gmail.com</h4> <br/>
            <h4 style="color:rgb(104, 1, 1);"><span class="glyphicon glyphicon-globe"></span> www.tabernacledelalliance.com</h4> <br/>
            <a class="btn btn-social-icon btn-facebook" title="Facebook"> <span class="fa fa-facebook"></span></a> 
            <a class="btn btn-social-icon btn-twitter" title="Twitter"><span class="fa fa-twitter"></span></a> 
            <a class="btn btn-social-icon btn-instagram" title="Instagram"><span class="fa fa-instagram"></span></a>
          </div></div>
          </div>
          </div>

          <div class="col-md-8 ">
            <form id="form">
              <div id="flash"> </div>
            <div class="text-center well" style="background:rgb(255, 213, 29) !important; border-color:rgb(255, 213, 29) !important;">
              <h5 style="color:rgb(104, 1, 1);"><b>Envoyez un email</b></h5>
              <input type="email" class="form-control" id="address" maxlength="50" placeholder="Entrez votre address email...">
              <div id='check_address' style="color:red"></div>
              <br/>
              <input type="nom" class="form-control" id="nom" maxlength="50" placeholder="Entrez votre Nom...">
              <div id='check_nom' style="color:red"></div>
              <br/>
              <textarea class="form-control" rows="5" id="mail" placeholder="Saisissez votre mail..."></textarea>
              <div id='check_mail' style="color:red"></div>
              <br/>
              <button type="button" id="sub_un" class="btn btn-default">Envoyer</button>&nbsp;&nbsp;&nbsp;
              <button type="reset" id="reset" name="reset" class="btn btn-default">Reprendre</button>&nbsp;&nbsp;&nbsp;
              <img src="../images/default.gif"  id="lod" class="img-rounded" width="30" height="30">
          </div>
        </form>

            



            </div>
     
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
      <script>

  $(function() {
    $('#lod').hide();
    $('#check_address').hide();
    $('#check_mail').hide();

    $("#flash").hide();

    $("#reset").click(function() {
    $('#check_address').hide();
    $('#check_mail').hide();
    $("#mail").focus();
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


    $("#sub_un").click(function() {
  var address= $("#address").val();
  var mail= $("#mail").val();
  var nom= $("#nom").val();
  var emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
      

if ((address.length == 0) || (!address.match(emailRegex))) {
$('#check_address').html("*Entrez un <strong>Address Valide</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#address").focus(); 

$("#address").change(function(){ $('#check_address').hide();
});
return false;
} 
else if(nom.length == 0 ) {
$('#check_nom').html("*Entrez votre <strong>Nom</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#nom").focus(); 

$("#nom").change(function(){ $('#check_nom').hide();
});
return false;
}else if(mail.length == 0 ) {
$('#check_mail').html("*Entrez un <strong>Message</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#mail").focus(); 

$("#mail").change(function(){ $('#check_mail').hide();
});
return false;
}else{

var dataString = "address="+ address + "&nom="+ nom + "&mail="+ mail;

$('#lod').show();
$.ajax({
type: "POST",
url: "email_un_eng.php",
data:dataString,
cache:true,
success: function(result){
  
  {
  if (result=="OK"){
  $('#lod').hide();
  bootbox.alert("<strong> Email envoyé !</strong>" , function(result) { 
  $('#form').clearForm();
});
       
    }else if (result!="OK"){
  $('#lod').hide();
  bootbox.alert("<strong> Envoi de l'email avorté!</strong>" , function(result) { 
  $('#form').clearForm();
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


	</html>