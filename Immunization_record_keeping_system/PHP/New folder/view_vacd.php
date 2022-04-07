<!DOCTYPE html>
<html>

		<head>
							<meta charset='utf-8'/>
							<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">
						<meta name="viewport" content="width=device-width, initial-scale=1"> -->
								<title> FIIS</title>
								<link type='text/css' rel='stylesheet' href='../CSS/view_staff.css'/>
				 <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
		
		</head>
		
		<body>
				<header>
					<nav class="navbar navbar-inverse ">
					<div class="navbar-header">
					  <a class="navbar-brand" href="#">FIIS</a>
					</div>
					<ul class="nav navbar-nav">
					  <li class="active"><a href="registration.php">Registration</a></li>
					  <li><a href="view_staff.php">View Staff</a></li>
					  <!--<li><a href="#">Page 2</a></li> 
					  <li><a href="#">Page 3</a></li> -->
					</ul>
				 
				</nav>		
				
				</header>
				
				<?php
						
					try{
							$cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
						}catch(PDOexception $e){
							die('ERROR:'.$e->getMessage());
						}
						$vid=$_GET['id'];
						$out=$cons->query("select * from vaccine where vid='$vid'") or die (print_r($out->errorInfo()));
						$row= $out-> rowCount();
						//$lis=$out->fetch();
						
						
				
				?>
				
				
				
				
				
							<section>
							<h1>  Details of Vaccine</h1>
							<br/>
								
	
							<table class="table table-hover table-striped">
								<tbody>
								
								
						<?php	
						
								for($i=0; $i<$row; $i++){ 
								$list=$out->fetch();
						?>
					
								  
									<tr><th>Vaccine Code</th><td><?php print $list["vcode"]; ?> </td></tr>
									<tr><th>Vaccine Name</th><td><?php print $list["vname"]; ?></td></tr>
									<tr><th>Number of dose(s)</th><td><?php print $list["nod"]; ?> </td></tr>
									<tr><th>Dose(s) Interval</th><td><?php print $list["vinterval"]; ?> </td></tr>
									<tr><th>Quantity</th><td><?php print $list["qty"]; ?> </td></tr>
									<tr><th> Administration lenght</th><td><?php print $list["vduration"]; ?>  </td></tr>
									<tr><th>Price of Dose</th><td><?php print $list["vprice"];?></td></tr>
									<tr><th>Manufacturer</th><td ><?php print $list["vmanufacturer"];?> </td></tr>
									<tr><th>Manufactturer Email</th><td><?php print$list["memail"] ;?></td></tr>
									<tr class='manage'><th>Edit</th><td><a href="edit_vac.php?id=<?php print $list["vid"]; ?>"><span class="glyphicon glyphicon-edit"></span></a>
									</td></tr>
									<tr class='manage'><th>Delete</th><td><a href="#"><span class="glyphicon glyphicon-trash"></span></a></td></tr>								 
						<?php	  
								  }
						?>
								
								</tbody>
							  </table>

				</section>
				 <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
	
				
				<footer>
							<h5> &copy; FIIS 2015</h5>
				
				</footer>
		
		</body>

</html>