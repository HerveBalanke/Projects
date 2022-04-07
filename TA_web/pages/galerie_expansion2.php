<?php 
require_once("../connection.php");
$url=$_GET['url'];
$query=$con->query("SELECT lien from galerie where titre='$url';");
$count=$query->rowCount();

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
        <link type="text/css" rel="stylesheet" href="../Lib_bootstrap/light_gallery/src/css/lightgallery.css" /> 
        <link href="../country/dist/css/bootstrap-formhelpers.min.css" rel="stylesheet">
        <Link href="../country/js/tests/vendor/css/bootstrap-3.0.0.min.css" rel="stylesheet">
        <link href="../jasny/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="../Lib_bootstrap/dist/sweetalert.css">
        <link type="text/css" rel="stylesheet" href="../Lib_bootstrap/tab.css">

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
          <a class="navbar-brand" href="#"><img src="../images/logo_tuned.jpg" class="img-rounded img-responsive" alt="logo" style="width:180px;height:75px" ></a>
        </div> <br/>
        <div class="collapse navbar-collapse" id="navbar_col">
         <ul class="nav navbar-nav navbar-right" id="navbar">
          <li><a href="../index.php">Acceuil</a></li>
          <li><a href="program.php">Programmes</a></li>
          <li class="active"><a href="galerie.php">Galerie</a></li>
          <li><a href="branches.php">Branches</a></li>
            <li><a href="messages.php">Messages</a></li>  
          <li><a href="contacts.php">Contacts</a></li>
          </ul>
        </div>
      </div>
    </nav> 
    </div> <br/><br/><br/>

          <div class="jumbotron">
                <h1>Galerie</h1>
          </div><br/><br/>

      <div class="section">
      <div class="container-fluid">
<h1 class="text-center" style="color:rgb(255, 213, 29);"> <?php echo $url; ?> </h1>

        <!--START JUICEBOX EMBED-->
<script src="../images/juicebox_lite_1.5.0/porteur_de_joie_launching/jbcore/juicebox.js"></script>
<script>
new juicebox({
baseURL: "../images/juicebox_lite_1.5.0/porteur_de_joie_launching/",
containerId: "juicebox-container",
galleryWidth: "100%",
galleryHeight: "100%",
backgroundColor: "#222222"
});
</script>
<div id="juicebox-container"></div>
<!--END JUICEBOX EMBED-->

  

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
  
  <script type="text/javascript">
    $(document).ready(function() {
        // $("#lightgallery").lightGallery(); 
    });
</script>
  
  
</body>
</html>