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
          <a class="navbar-brand" href="#"><img src="../images/used/logo_tuned.jpg" class="img-rounded img-responsive" alt="logo"  style="width:180px;height:75px" ></a>
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
						<div class="row">
							<?php
							for($i=0; $i<$count; $i++){
								$fetch_titre=$query->fetch();
							?>
					  <div class="col-md-3 ">
					    <a href="galerie_expansion.php?url=<?php echo $fetch_titre['titre'];?>" class="thumbnail galerie" style="border-color:rgb(255, 213, 29);">
					      <img src="<?php echo $fetch_titre['lien'];?>" alt="Pulpit Rock" style="width:304px; height:200px;"> <br/>
					      <p style="overflow:auto;  height:50px; "><?php echo $fetch_titre['titre'];?></p> 
					    </a>
					  </div>
					  <?php
					  }
					  ?>
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




		


		  
         <div class="row"  style="color:rgb(104, 1, 1); background:rgb(255, 213, 29);" id="footer">
			<footer class="col-md-12" >
     			<h5 class="text-center">Tabernacle de L'Alliance &reg;</h5> 
    		</footer>
    	</div>
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
			<script src="../Lib_bootstrap/jasny/js/jasny-bootstrap.min.js"></script>


	</html>