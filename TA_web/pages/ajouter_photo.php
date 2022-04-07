<?php 
          require_once("../connection.php");
          $query=$con->query("SELECT a.* FROM galerie a INNER JOIN 
          (SELECT titre, MIN(gid) as gid FROM galerie GROUP BY titre ) AS b
           ON a.titre = b.titre AND a.gid = b.gid;");
          $count=$query->rowCount();

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
        <link href="../Lib_bootstrap/jasny/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
        <link type="text/css" rel="stylesheet" href="../Lib_bootstrap/tab.css">
        <link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

<!-------Including jQuery from Google ------>
<script src="../Lib_bootstrap/jquery-1.12.4.min.js"></script>
<script src="script.js"></script>
<!------- Including CSS albume ------>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
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
      <a class="navbar-brand" href="../index.php"><img src="../images/used/logo_tuned.jpg" class="img-rounded img-responsive" alt="logo" style="width:180px;height:75px"></a>
    </div> <br/>
    <div class="collapse navbar-collapse" id="navbar_col">
     <ul class="nav navbar-nav navbar-right" id="navbar">
      <li><a href="gerer_programme.php">Gerer programmes</a></li>
          <li class="active"><a href='ajouter_photo.php'>Gerer galerie</a></li>
            <li><a href="gerer_messages.php">Gerer messages</a></li>
            <li style="background-color: rgb(255, 255, 255);"><a href="../index.php"> <span class="glyphicon glyphicon-new-window"></span> Site</a></li>
            <li><a href="../logout.php"> <span class="glyphicon glyphicon-log-out"></span> Deconnection</a></li>
      </ul>
    </div>
  </div>
</nav> 
</div> <br/><br/>

<div class="jumbotron">
      <h1>Gerer galerie</h1>
      <ul> 
        <li style="color:rgb(255, 213, 29);"> <a href='ajouter_photo.php'  style="color:rgb(255, 213, 29); font-weight:bold;"> Ajouter photos </a> </li>
        <li style="color:rgb(104, 1, 1);"> <a href='gerer_photo.php' style="color:rgb(104, 1, 1);"> Photos </a> </li>
        <li style="color:rgb(104, 1, 1);"> <a href='gerer_photo_album.php' style="color:rgb(104, 1, 1);"> Albums </a> </li>
      </ul> 
</div><br/><br/>

<div class="section">
<div class="container-fluid">
<!-- <div id="maindiv">
<div id="formdiv"> -->
<h1 class="text-center" style="color:rgb(255, 213, 29);"> <b style="color:rgb(255, 213, 29);"> Ajouter des photos </b></h1>
<div class="row">
<div class="col-md-2"> </div>
<div class="col-md-8">
<form enctype="multipart/form-data" action="ajouter_photo.php" method="POST">
	<div class="form-group">
<label class="control-label col-sm-2" for="album">Album <span style="color:red;">*</span></label>
<div class="col-sm-5"> 
    <select class="form-control" id="album" name="album">
      <option>--- Choisir un album ---</option>

    <?php
    for($i=0; $i<$count; $i++){
      $fetch_album=$query->fetch();

    ?>
      <option value= "<?php echo $fetch_album ["titre"];?>"> 
      <?php echo $fetch_album ["titre"];?>

      <?php
    }

      ?>

      </option>
  <option>Autre</option>

    </select>
    <div id="block_album">
    <br/>
    <input type="text" class="form-control" id="album_alt" style="text-transform: capitalize;" placeholder="Entrez l'album" maxlength="30">
    <div id='check_album_alt' style="color:red"></div>
    </div>
    <div id='check_album' style="color:red"></div>
  </div>
<!-- <div class="col-sm-8">
  <input type="text" id="album" name="album" placeholder="Nom de l'album" class="form-control"  style="text-transform: capitalize;" maxlength="30">
	<div id='check_album' style="color:red"></div>
</div> -->
</div><br/><br/><br/><br/><br/>
<label class="control-label col-sm-2" for="file">Photo <span style="color:red;">*</span></label>
<div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
<br/><br/><br/>
<button type="button" id="add_more" class="upload" class="btn btn-success">Ajouter des champs</button>
<button type="submit" name="submit" id="upload" class="upload" class="btn btn-success">Envoyez</button>
</form>
</div>
<div class="col-md-2"> </div>
</div>
<!------- Including PHP Script here ------>
<?php include "ajouter_photo_eng.php"; ?>
<!-- </div>
</div> -->

 <div class="row"  style="color:rgb(255, 213, 29);">
         <div class="col-md-12"> 
          <br/><br/><br/><br/>
          <br/><br/><br/><br/>
          <br/><br/><br/><br/>
          <br/><br/><br/><br/>
          <br/><br/><br/><br/>

         </div>
         </div>
    <div class="row"  style="color:rgb(104, 1, 1); background:rgb(255, 213, 29);">
      <footer class="col-md-12">
          <h5 class="text-center">Tabernacle de L'Alliance &reg;</h5> 
        </footer>
      </div>
      
  </div>
  </div>

  <script src="../Lib_bootstrap/jquery-1.12.4.min.js"></script>
  <script src="../Lib_bootstrap/docs/assets/js/vendor/jquery.min.js"></script>
  <script src="../Lib_bootstrap/bootbox.min.js"></script>
  <script src="../Lib_bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../Lib_bootstrap/light_gallery/dist/js/lightgallery.min.js"></script>
  <script src="../Lib_bootstrap/lg-thumbnail/dist/lg-thumbnail.min.js"></script>
  <script src="../Lib_bootstrap/lg-zoom/dist/lg-zoom.min.js"></script>
  <script src="../Lib_bootstrap/lg-fullscreen/dist/lg-fullscreen.min.js"></script>
  <script src="../Lib_bootstrap/lg-pager/dist/lg-pager.min.js"></script>
  <script src="../Lib_bootstrap/lg-hash/dist/lg-hash.min.js"></script>
  <script src="../Lib_bootstrap/lg-autoplay/dist/lg-autoplay.min.js"></script>

<script>
$("#upload").click(function() {

var album= $("#album").val();
var album_alt= $("#album_alt").val();

if (album=="Autre") {
    album = album_alt;
          }

if (album.length == 0 || album=="--- Choisir un album ---" || album=="Autre") {
$('#check_album').html("*Selectionnez un <strong>Album</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#album").focus(); 

$("#album").change(function(){ $('#check_album').hide();
});
return false;
}
});
var abc = 0;      // Declaring and defining global increment variable.
$(document).ready(function() {
  $('#block_album').hide();

  var album= $("#album").val();
  var album_alt= $("#album_alt").val();

  $('#album').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_album").show();
        }
        else{
        $("#block_album").hide();
        $("#album_alt").val("");
        }
    });
//  To add new input albume field dynamically, on click of "Add More albumes" button below function will be executed.
$('#add_more').click(function() {
$(this).before($("<div/>", {
id: 'filediv'
}).fadeIn('slow').append($("<input/>", {
name: 'file[]',
type: 'file',
id: 'file'
}), $("<br/>")));
});
// Following function will executes on change event of albume input to select different albume.
$('body').on('change', '#file', function() {
if (this.files && this.files[0]) {
abc += 1; // Incrementing global variable by 1.
var z = abc - 1;
var x = $(this).parent().find('#previewimg' + z).remove();
$(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
$("#abcd" + abc).append($("<img/>", {
id: 'img',
src: '../images/used/logo.jpg',
alt: 'Supprimer'
}).click(function() {
$(this).parent().parent().remove();
}));
}
});
// To Preview Image
function imageIsLoaded(e) {
$('#previewimg' + abc).attr('src', e.target.result);
};
$('#upload').click(function(e) {
var name = $(":file").val();
if (!name) {
alert("Selectionnez la première image");
e.preventDefault();
}
});
});

</script>
</body>
</html>