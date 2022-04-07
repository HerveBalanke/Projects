
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
		</div> <br/><br/><br/>

					<div class="jumbotron">
			  				<h1>Gerer galerie</h1>
			  				<ul> 
			       <li style="color:rgb(104, 1, 1);"> <a href='ajouter_photo.php' style="color:rgb(104, 1, 1);"> Ajouter photos </a> </li>
                  <li style="color:rgb(255, 213, 29);"> <a href='gerer_photo.php' style="color:rgb(255, 213, 29); font-weight:bold;"> Photos </a> </li>
                  <li style="color:rgb(104, 1, 1);"> <a href='gerer_photo_album.php' style="color:rgb(104, 1, 1);"> Albums </a> </li> 
			                </ul>
					</div><br/><br/>


		
		<div class="section" style="color:rgb(255, 213, 29);">
			<div class="container-fluid" >
			<div id='load'>
				  <?php include('gerer_photo_load.php'); ?>
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
	

			<script src="../Lib_bootstrap/jquery-1.12.4.min.js"></script>
		    <script src="../Lib_bootstrap/docs/assets/js/vendor/jquery.min.js"></script>
			<script src="../Lib_bootstrap/dist/js/bootstrap.min.js"></script>
			<script src="../Lib_bootstrap/js/collapse.js"></script>
			<script src="../Lib_bootstrap/js/dropdown.js"></script>
			<script src="../Lib_bootstrap/js/button.js"></script>
			<script src="../Lib_bootstrap/bootbox.min.js"></script>
			<script src="../Lib_bootstrap/dist/sweetalert.min.js"></script>
			<script src="../Lib_bootstrap/jasny/js/jasny-bootstrap.min.js"></script>
			<script src="../data_table/media/js/jquery.dataTables.min.js"></script>
			<script type="text/javascript">

    			function sup_gid(gid)
						{
						var info="gid="+ gid;
						bootbox.confirm("<b>Supprimer la photo?</b>" , function(result) {
						if(result)
						{
							$.ajax({
							type: "POST",
							url: "supprimer_photo.php",
							data: info,
							cache:true,
							processData:false,
							success: function(response){
									if(response=="OK"){
								$('#load').load("gerer_photo_load.php");
								}
								}
									});		  
										}
											});
								}
	
	$(document).ready(function(){
    $('#tab').dataTable();					
	});
	</script>
	</body>


	</html>