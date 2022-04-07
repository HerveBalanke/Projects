

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
   			<link href="../jasny/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
   			<link rel="stylesheet" type="text/css" href="../Lib_bootstrap/dist/sweetalert.css">
   			
			  
	</head>

	<body>

			 <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

          		<div class="cover" style="background-image: url('../images/2.jpg');
										  background-repeat: no-repeat;"> 

    						 <div class="cover-image"></div>
    						 <div class="container"> 
    						 	<div class="row"> 
    						 	<div class="col-md-12 text-center"> <h1>Heading</h1> 

    						 		<p>Lorem ipsum dolor sit amet, consectetur adipisici eli.</p>

    						 		<br><br><a class="btn btn-lg btn-default">Click me</a> </div></div></div>
    						 		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



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
	



	<script type="text/javascript">

	 $(function() {

	 	$('#block_prof').hide();
	 	$('#block_fil').hide();
	 	$('#block_ecole').hide();
	 	$('#block_ae').hide();
	 	$('#block_ac').hide();
	 	$('#block_rel').hide();


			var prof= $("#prof").val();
			var prof_alt= $("#prof_alt").val();
			var fil= $("#fil").val();
			var fil_alt= $("#fil_alt").val();
			var ecole= $("#ecole").val();
			var ecole_alt= $("#ecole_alt").val();
			var ae= $("#ae").val();
			var ae_alt= $("#ae_alt").val();
			var ac= $("#ac").val();
			var ac_alt= $("#ac_alt").val();
			var rel= $("#rel").val();
			var rel_alt= $("#rel_alt").val();


		$('#prof').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_prof").show()
        }
        else{
        $("#block_prof").hide()
        }
    });

		$('#fil').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_fil").show()
        }
        else{
        $("#block_fil").hide()
        }
    });

		$('#ecole').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_ecole").show()
        }
        else{
        $("#block_ecole").hide()
        }
    });

		$('#ae').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_ae").show()
        }
        else{
        $("#block_ae").hide()
        }
    });

		$('#ac').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_ac").show()
        }
        else{
        $("#block_ac").hide()
        }
    });

			$('#rel').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_rel").show()
        }
        else{
        $("#block_rel").hide()
        }
    });

			$('#month').on('change',function(){
        if( $(this).val()==""){
        $("#check_date").show()
        }
        else{
        $("#check_date").hide()
        }
    });


			$("#reset").click(function() {

		$('#block_prof').hide();
	 	$('#block_fil').hide();
	 	$('#block_ecole').hide();
	 	$('#block_ae').hide();
	 	$('#block_ac').hide();
	 	$('#block_rel').hide();
	 	$("#nom").focus();
		});


	window.URL    = window.URL || window.webkitURL;
var elBrowse  = document.getElementById("photo"),
    elPreview = document.getElementById("preview"),
    useBlob   = false && window.URL; // `true` to use Blob instead of Data-URL

function readImage (file) {
  var reader = new FileReader();
  reader.addEventListener("load", function () {
    var image  = new Image();
    image.addEventListener("load", function () {
      var imageInfo = file.name    +' '+
                      image.width  +'×'+
                      image.height +' '+
                      file.type    +' '+
                      Math.round(file.size/1024) +'KB';
      //elPreview.appendChild( this );
      elPreview.insertAdjacentHTML("beforeend", imageInfo +'<br>');
    });
    image.src = useBlob ? window.URL.createObjectURL(file) : reader.result;
    if (useBlob) {
      window.URL.revokeObjectURL(file); // Free memory
    }
  });
  reader.readAsDataURL(file);  
}

elBrowse.addEventListener("change", function() {
  var files  = this.files;
  var errors = "";
  if (!files) {
    errors += "Le format du fichier n'est pas pris en charge par le navigateur.";
  }
  if (files && files[0]) {
    for(var i=0; i<files.length; i++) {
      var file = files[i];
      if ( (/\.(png|jpeg|jpg|gif)$/i).test(file.name) ) {
        readImage( file ); 
      } else {
        errors += file.name +" Le format de la photo n'est pas pris en charge par le system\n";  
      }
    }
  }
  if (errors) {
    alert(errors); 
  }
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



	$("#submit_photo").click(function() {
		alert("yes");


	$.ajax({
	type: "POST",
	url: "membre_photo_eng.php",
	//data:dataString,
	data:FormData,
	contentType: false,
	cache:true,
	processData:false,
	success: function(result){

	$("#flash").fadeIn(400).html(result);
	
	//{
	//if (result=="OK"){
	//$("#flash").fadeIn(400).html(bootbox.alert("<strong>Membre Ajouté(e)!</strong>"));
	//}
	
	//}

	//$('#form_membre').clearForm();
	$("#nom").focus();
	}  
	});

});




	 	$("#submit").click(function() {


	 		var photo= $("#photo").val();
	 		var nom= $("#nom").val();
			var prenom= $("#prenom").val();
			var genre= $("#genre").val();
			var date= $("#date").val();
			var pays= $("#pays").val();
			var prof= $("#prof").val();
			var prof_alt= $("#prof_alt").val();
			var fil= $("#fil").val();
			var fil_alt= $("#fil_alt").val();
			var ecole= $("#ecole").val();
			var ecole_alt= $("#ecole_alt").val();
			var sim= $("#sim").val();
			var ne= $("#ne").val();
			var lha= $("#lha").val();
			var mail= $("#mail").val();
			var fac= $("#facebook").val();
			var a= $("#a").val();
			var tel= $("#tel").val();
			var b= $("#b").val();
			var whatsapp= $("#whatsapp").val();

			var temps= $("#temps").val();
			var ae= $("#ae").val();
			var ae_alt= $("#ae_alt").val();
			var bpt= $("#bpt").val();
			var ac= $("#ac").val();
			var ac_alt= $("#ac_alt").val();

			var nom_ur= $("#nom_ur").val();
			var prenom_ur= $("#prenom_ur").val();
			var tel_ur= $("#tel_ur").val();
			var a_ur= $("#a_ur").val();
			var mail_ur= $("#mail_ur").val();
			var rel= $("#rel").val();
			var rel_alt= $("#rel_alt").val();
			var da=$('#da').val();

			var phoneNumber = /[0-9-()+]{3,20}/; 
			var emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
			
			if (prof=="Autre") {
				prof = prof_alt;
					}
				if (fil=="Autre") {
				fil = fil_alt;
					}
				if (ecole=="Autre") {
				ecole = ecole_alt;
					}
				if (ae=="Autre") {
				ae = ae_alt;
					}
				if (ac=="Autre") {
				ac = ac_alt;
					}
				if (rel=="Autre") {
				rel = rel_alt;
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

 else if ($('input[name=genre]:checked').length == 0 ) {
$('#check_genre').html("*Choisissez un <strong>Genre</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#genre").focus(); 

$("#genre").change(function(){ $('#check_genre').hide();
});
return false;
}

 else if (date.length == 0 ) {
$('#check_date').html("*Choisissez une <strong>Date</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#date").focus(); 

$("#date").change(function(){ $('#check_date').hide();
});
return false;
}
else if (pays.length == 0 ) {
$('#check_pays').html("*Selectionner un <strong>Pays</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#Pays").focus(); 

$("#Pays").change(function(){ $('#check_Pays').hide();
});
return false;
}
else if (prof.length == 0 || prof=="--- Choisir une Profession ---") {
$('#check_prof').html("*Selectionnez une <strong>Profession</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#prof").focus(); 

$("#prof").change(function(){ $('#check_prof').hide();
});
return false;
}
else if (fil.length == 0 || fil=="--- Choisir une Filière ---") {
$('#check_fil').html("*Selectionnez une <strong>Filière</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#fil").focus(); 

$("#fil").change(function(){ $('#check_fil').hide();
});
return false;
}
else if (ecole.length == 0 || ecole=="--- Choisir une Ecole/Université ---") {
$('#check_ecole').html("*Selectionnez une <strong>Ecole/Université</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#ecole").focus(); 

$("#ecole").change(function(){ $('#check_ecole').hide();
});
return false;
}
else if ($('input[name=sim]:checked').length == 0 ) {
$('#check_sim').html("*Choisissez une <strong> Option</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#sim").focus(); 

$("input[name=sim]").change(function(){ $('#check_sim').hide();
});
return false;
}
else if (ne.length == 0 ) {
$('#check_ne').html("*Entrez un <strong>Nombre</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#ne").focus(); 

$("#ne").change(function(){ $('#check_ne').hide();
});
return false;
}
else if (lha.length == 0 ) {
$('#check_lha').html("*Entrez un <strong>Lieu d'Habitation</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#lha").focus(); 

$("#lha").change(function(){ $('#check_lha').hide();
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
else if (fac.length == 0 ) {
$('#check_fac').html("*Entrez un pseudo <strong>Facebook</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#facebook").focus(); 

$("#fac").change(function(){ $('#check_fac').hide();
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

 else if ((whatsapp.length < 10) || (!whatsapp.match(phoneNumber))) {
$('#check_whatsapp').html("*Entrez un <strong>Numero Tel Valide</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#whatsapp").focus(); 

$("#whatsapp").change(function(){ $('#check_whatsapp').hide();
});
return false;
}



 else if (temps.length == 0 ) {
$('#check_temps').html("*Entrez un <strong>Temps</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#temps").focus(); 

$("#temps").change(function(){ $('#check_temps').hide();
});
return false;
}
else if (ae.length == 0 || ae=="--- Choisir une Eglise ---") {
$('#check_ae').html("*Selectionnez une <strong>Eglise</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#ae").focus(); 

$("#ae").change(function(){ $('#check_ae').hide();
});
return false;
}
else if ($('input[name=bpt]:checked').length == 0 ) {
$('#check_bpt').html("*Choisissez une <strong>Option</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#bpt").focus(); 

$("input[name=bpt]").change(function(){ $('#check_bpt').hide();
});
return false;
}
else if (ac.length == 0 || ac=="--- Choisir une Activité ---") {
$('#check_ac').html("*Selectionnez une <strong>Activité</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#ac").focus(); 

$("#ac").change(function(){ $('#check_ac').hide();
});
return false;
}

else if (nom_ur.length == 0 ) {
$('#check_nom_ur').html("*Entrez un <strong>Nom</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#nom_ur").focus(); 

$("#nom_ur").change(function(){ $('#check_nom_ur').hide();
});
return false;
}
 else if (prenom_ur.length == 0 ) {
$('#check_prenom_ur').html("*entrez un <strong>Prenom</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#prenom_ur").focus(); 

$("#prenom_ur").change(function(){ $('#check_prenom_ur').hide();
});
return false;
}
 else if (rel.length == 0 || rel=="--- Choisir une Relation ---") {
$('#check_rel').html("*Selectionnez une <strong>Relation</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#rel").focus(); 

$("#rel").change(function(){ $('#check_rel').hide();
});
return false;
}
 else if ((tel_ur.length < 10) || (!tel_ur.match(phoneNumber))) {
$('#check_tel_ur').html("*Entrez un <strong>Numero Tel Valide</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#tel_ur").focus(); 

$("#tel_ur").change(function(){ $('#check_tel_ur').hide();
});
return false;
}

else if ((mail_ur.length == 0) || (!mail_ur.match(emailRegex))) {
$('#check_mail_ur').html("*Entrez une addresse <strong>Email Valide</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#mail_ur").focus(); 

$("#mail_ur").change(function(){ $('#check_mail_ur').hide();
});
return false;
}
 else if (da.length == 0 ) {
$('#check_da').html("*Choisissez une <strong>Date</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#da").focus(); 

$("#da").change(function(){ $('#check_da').hide();
});
return false;
}
 else{

			 	

				if(tel.charAt(0) === '0'){
				tel=tel.substr(1);	
				}
				tel=a+tel;

				if(whatsapp.charAt(0) === '0'){
				whatsapp=whatsapp.substr(1);	
				}
				whatsapp=b+whatsapp;

				if(tel_ur.charAt(0) === '0'){
				tel_ur=tel_ur.substr(1);	
				}
				tel_ur=a_ur+tel_ur;
				
				



var dataString = "photo="+ photo + "&nom="+ nom +"&prenom="+ prenom +"&genre="+ genre +"&date="+ date +"&pays="+ pays + "&prof="+ prof +"&fil="+ fil+
"&ecole="+ ecole +"&sim="+ sim +"&ne="+ ne + "&lha="+ lha +"&mail="+ mail+"&fac="+ fac +"&tel="+ tel+ "&whatsapp="+ whatsapp +"&temps="+ temps+
"&ae="+ ae +"&bpt="+ bpt +"&ac="+ ac + "&nom_ur="+ nom_ur +"&prenom_ur="+ prenom_ur +"&tel_ur="+ tel_ur +"&mail_ur="+ mail_ur +"&rel="+ rel +"&prof_alt="+ prof_alt +"&fil_alt=" + fil_alt+ 
"&ecole_alt=" + ecole_alt+ "&ae_alt=" + ae_alt +"&ac_alt=" + ac_alt +"&rel_alt=" + rel_alt+ "&da=" + da;

//alert(dataString);

//$("#flash").show();
//$("#flash").fadeIn(400).html(bootbox.alert("<div class='progress' ><div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Loading</strong></div></div>"));
$.ajax({
type: "POST",
url: "gerer_membre_eng.php",
data:dataString,
//data:FormData,
//contentType: false,
cache:true,
processData:false,
success: function(result){

	$("#flash").fadeIn(400).html(result);
	
	//{
	//if (result=="OK"){
	//$("#flash").fadeIn(400).html(bootbox.alert("<strong>Membre Ajouté(e)!</strong>"));
	//}
	
	//}

//$('#form_membre').clearForm();
//$("#sec").load("membre_photo.php");
$("#nom").focus();
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