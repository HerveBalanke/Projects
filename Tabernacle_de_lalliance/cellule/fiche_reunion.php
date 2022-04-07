<?php  
include_once("../sessions/session_cellule.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$cellule=$_SESSION['cellule'];
$zone_cel=$_SESSION['zone_cel'];
$rid=$_GET['rid'];
$get_reunion=$con->query("select * from reunion inner join cellule on reunion.cellule=cellule.cid where zone_cel='$zone_cel' and rid='$rid';") or die (print_r($con->errorInfo()));
$reunion=$get_reunion->fetch();
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
					      <li class="active"><a href="gerer_cellule.php">Gerer Cellule</a></li>
					      <li><a href="communication.php">Communication</a></li>
					    </ul>
				      <ul class="nav navbar-nav navbar-right" >
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
				    <h3 class="text-center">Gerer Cellule</h3>

				  </div>
      	</div>
        </div>
      </div>
    </div>


     <div class="section">
      <div class="container">
        <div class="row">
           <div class="col-md-12">
            <ul  class="nav nav-tabs">
                  <li  class="active">
                       <a  href="gerer_cellule.php" >REUNION</a>
                  </li>
                  <li ><a href="ajouter_membre.php" >MEMBRES</a>
                  </li>                
              </ul>
                  <br/>

          </div>
        
        </div>
        		<div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"><b>FICHE DE PRESENCE - <?php  echo $reunion['theme']; ?> - <?php  echo $reunion['date']; ?> </b></div>
                <div class="panel-body" id="tab">
          <br/>
          <ul  class="nav nav-tabs">
                  <li class="active">
                       <a  href="#1b" data-toggle="tab">Liste des Membres</a>
                  </li>
                  <li>
                       <a  href="#2b" data-toggle="tab">Presents</a>
                  </li>
                  <li><a href="#3b" data-toggle="tab">Absents</a>
                  </li>                </ul>

                <br/>

                <div class="tab-content clearfix">
                  <div class="tab-pane fade in active" id="1b">
                    <input type="hidden" class="form-control" id="zone" value="<?php  echo $rid; ?>">
                        <div class="panel panel-default">
                      <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"></div>
                      <div class="panel-body" id="tab_un">
                        
                      <?php include_once("presence_liste.php"); ?>
                  </div>
                  </div>
                  </div>
                  <div class="tab-pane fade " id="2b">
                        <input type="hidden" class="form-control" id="zone" value="<?php  echo $rid; ?>">
                        <div class="panel panel-default">
                      <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> </div>
                      <div class="panel-body" id="tab_deux">
                        <?php include_once("presents_liste.php"); ?> 
                  </div>
                  </div>

                  </div>

                  <div class="tab-pane fade " id="3b">
                        <input type="hidden" class="form-control" id="zone" value="<?php  echo $rid; ?>">
                        <div class="panel panel-default">
                      <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"></div>
                      <div class="panel-body" id="tab_trois">
                        <?php include_once("absent_liste.php"); ?> 
                  </div>
                  </div>

                  </div>
                  </div>

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
    $('#tab_2').dataTable();
    $('#tab_3').dataTable();
  });
  </script>


	<script type="text/javascript">

      function pre_mid(mid, rid)
            { 
              var info="mid="+ mid+ "&rid="+rid;
              $.ajax({
              type: "POST",
              url: "presence_membre.php",
              data: info,
              cache:true,
              processData:false,
              success: function(html){
               $('#tab_un').load("presence_liste.php?rid="+rid);
               $('#tab_deux').load("presents_liste.php?rid="+rid);
                }
                  }); 
                
            }


      function abs_mid(mid, rid)
            { 
              var info="mid="+ mid+ "&rid="+rid;
              $.ajax({
              type: "POST",
              url: "absent_membre.php",
              data: info,
              cache:true,
              processData:false,
              success: function(html){ 
               $('#tab_un').load("presence_liste.php?rid="+rid); 
               $('#tab_trois').load("absent_liste.php?rid="+rid);   
                    }
                      });
                
            }

      function elver_pre(mid, rid)
            { 
              var info="mid="+ mid+ "&rid="+rid;
              $.ajax({
              type: "POST",
              url: "elver_presence_liste.php",
              data: info,
              cache:true,
              processData:false,
              success: function(html){ 
               $('#tab_un').load("presence_liste.php?rid="+rid); 
               $('#tab_deux').load("presents_liste.php?rid="+rid);   
                    }
                      });
                
            }

      function elver_abs(mid, rid)
            { 
              var info="mid="+ mid+ "&rid="+rid;
              $.ajax({
              type: "POST",
              url: "elver_absent_liste.php",
              data: info,
              cache:true,
              processData:false,
              success: function(html){ 
               $('#tab_un').load("presence_liste.php?rid="+rid); 
               $('#tab_trois').load("absent_liste.php?rid="+rid);   
                    }
                      });
                
            }

       function clore(rid)
            { 
              var info="rid="+rid;
              $.ajax({
              type: "POST",
              url: "clore_reunion.php",
              data: info,
              cache:true,
              processData:false,
              success: function(html){ 
               $('#tab_un').load("presence_liste.php?rid="+rid);
               $('#tab_deux').load("presents_liste.php?rid="+rid); 
               $('#tab_trois').load("absent_liste.php?rid="+rid);   
                    }
                      });
                
            }

    </script>

		<?php
		$con=Null;
		?>


			

	</body>
			


</html>