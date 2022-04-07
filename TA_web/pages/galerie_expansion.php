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
        <title> Tabernacle de L'Alliance</title>
        <link rel="shortcut icon" type="image/x-icon" href="../images/favicon(2).ico" />
        <link href="../Lib_bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Lib_bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../Lib_bootstrap/dist/sweetalert.css">
        <link type="text/css" rel="stylesheet" href="../Lib_bootstrap/light_gallery/src/css/lightgallery.css" /> 
        <link href="../Lib_bootstrap/jasny/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
        <link type="text/css" rel="stylesheet" href="../Lib_bootstrap/tab.css">

        <style type="text/css">

      body
      {
       /*background:#fff;*/
      }
      #img
      {
       width:auto;
       box-shadow:0px 0px 20px #cecece;
       -moz-transform: scale(0.7);
       -moz-transition-duration: 0.6s; 
       -webkit-transition-duration: 0.6s;
       -webkit-transform: scale(0.7);
       
       -ms-transform: scale(0.7);
       -ms-transition-duration: 0.6s; 
      }
      #img:hover
      {
        box-shadow: 20px 20px 20px rgb(255, 213, 29);
       -moz-transform: scale(0.8);
       -moz-transition-duration: 0.6s;
       -webkit-transition-duration: 0.6s;
       -webkit-transform: scale(0.8);
       
       -ms-transform: scale(0.8);
       -ms-transition-duration: 0.6s;
       
      }
      </style>

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
          <a class="navbar-brand" href="#"><img src="../images/used/logo_tuned.jpg" class="img-rounded img-responsive" alt="logo" style="width:180px;height:75px" ></a>
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
                <a href="galerie.php" title="Retournez vers les albums" class="pull-right"> <button type="button" class="btn btn-default" style="outline:none; background:rgb(255, 213, 29); border:rgb(255, 213, 29);"><b  style="color:rgb(104, 1, 1); outline:none;"> Retour</b></button>  </a>
          </div><br/><br/>

      <div class="section">
      <div class="container-fluid">
        <div class="row">

  <h1 class="text-center" style="color:rgb(255, 213, 29);"> <b><?php echo $url; ?> </b></h1>
  <div class="col-md-12 ">
  <div id="lightgallery">
    <?php
  for($i=0; $i<$count; $i++){
            $fetch_titre=$query->fetch();
          ?>
        <a href="<?php echo $fetch_titre['lien'];?>" style="outline:none;">
      <img src="<?php echo $fetch_titre['lien'];?>" height="200" id="img" class="img-responsive"/>
      </a>
        <?php
        }
        ?>
  </div>
  </div>
  </div>
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
  
  <script type="text/javascript">
    $(document).ready(function() {
        $("#lightgallery").lightGallery(); 
    });
</script>
  
  
</body>
</html>