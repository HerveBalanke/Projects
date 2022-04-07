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
             <marquee behavior="scroll" scrollamount="7" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> <a href="newletter.php" style="color:rgb(104, 1, 1); outline:none;"> <b><span class="glyphicon glyphicon-list-alt"></span> Souscrire pour recevoir des messages d'exhortation Quotidiennement </b></a></marquee>
            </div><br/><br/>

        <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">            
          <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" style="background-color:rgb(255, 213, 29);">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div><br/>
          <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav nav-pills nav-stacked " id="navbar_2">
            <li class="active" > <a href="#1b"  data-toggle="pill">Documents</a></li>
            <li><a href="#2b"  data-toggle="pill">Audios</a></li>
          </ul>
        </div>
        </div>

        <div class="col-md-8"> 
         
                <br/>

                <div class="tab-content clearfix">
                  <div class="tab-pane fade in active" id="1b"  style="background-color:rgb(255, 213, 29);">

                          <br/><h3 class="text-center" style="color:rgb(104, 1, 1);"> <b>Documents</b></h3><br/>

                    <div class="table-responsive">
                    <table class="table" style="color:rgb(104, 1, 1); background-color:rgb(255, 213, 29);">
                        <tbody>
                           <?php
                    for($i=0; $i<$count_doc; $i++){
                      $fetch_doc=$query_doc->fetch();
                      ?>
                           <tr>
                              <div class="row" style=" border-bottom: 1px solid rgb(104, 1, 1);">
                            <br/>
                              <div class="col-md-3 text-center"> 
                              <b> <a href="apercu.php?lien=<?php echo $fetch_doc['lien'];?>" title="Aperçu" style="color:rgb(104, 1, 1);"><span class="glyphicon glyphicon-expand"></span> Aperçu</a></b> <i class="material-icons">face</i>
                              </div>
                            <div class="col-md-3 text-center" style="color:rgb(104, 1, 1);"> 
                              <?php echo $fetch_doc['date'];?>
                              </div>
                            <div class="col-md-3 text-center" style="color:rgb(104, 1, 1);"> 
                              <?php echo $fetch_doc['titre'];?>
                              </div>
                            <div class="col-md-3 text-center"> 
                              <b><a href="telecharger_doc.php?doc=<?php echo $fetch_doc['lien'];?>" title="Télécharger" style="color:rgb(104, 1, 1);"><span class="glyphicon glyphicon-download"></span> Télécharger</a></b>
                            </div><br/>
                            </div>
                          </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                      </div>
                  </div>
                  <div class="tab-pane fade " id="2b" style="background-color:rgb(255, 255, 255);">

                         <br/><h3 class="text-center" style="color:rgb(104, 1, 1);"> <b>Audios </b></h3><br/>
                    
                    <div class="table-responsive">
                    <table class="table" style="color:rgb(104, 1, 1);">
                        <tbody>
                            <?php
                    for($i=0; $i<$count_au; $i++){
                      $fetch_au=$query_au->fetch();
                      ?>
                          <tr>
                              <div class="row" style=" border-bottom: 1px solid rgb(104, 1, 1);">
                              <br/>
                            <div class="col-md-3 text-center" style="color:rgb(104, 1, 1);"> 
                              <?php echo $fetch_au['date'];?>
                              </div>
                            <div class="col-md-3 text-center" style="color:rgb(104, 1, 1);"> 
                              <?php echo $fetch_au['titre'];?>
                              </div>
                              <div class="col-md-3 text-center">
                                <audio controls style="width:200px;">
                                <source src="<?php echo $fetch_au['lien'];?>" type="audio/mpeg" >
                            </audio>
                            </div>
                            <div class="col-md-3 text-center"> 
                              <b><a href="telecharger_audio.php?au=<?php echo $fetch_au['lien'];?>" style="color:rgb(104, 1, 1);"><span class="glyphicon glyphicon-download"></span> Telecharger</a></b>
                            </div><br/>
                            </div>
                          </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                      </div>
                  </div>
                    </div>
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
      <script src="../Lib_bootstrap/material/index.js"></script>


	</html>