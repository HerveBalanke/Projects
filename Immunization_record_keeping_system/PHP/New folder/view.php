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
						$nid=$_GET['id'];
						$out=$cons->query("select * from nurse where nid='$nid'") or die (print_r($out->errorInfo()));
						$row= $out-> rowCount();
						//$lis=$out->fetch();
						
						
				
				?>
				
				
				
				
				
							<section>
							<h1>  Staff's Data</h1>
							<br/>
								
	
							<table class="table table-hover table-striped">
								<tbody>
								
								
						<?php	
						
								for($i=0; $i<$row; $i++){ 
								$list=$out->fetch();
						?>
					
								  
									<tr><th>Firstname</th><td><?php print $list["fname"]; ?> </td></tr>
									<tr><th>Lastname</th><td><?php print $list["lname"]; ?></td></tr>
									<tr><th>Gender</th><td><?php print $list["gender"]; ?> </td></tr>
									<tr><th>Date of birth</th><td><?php print $list["dob"]; ?> </td></tr>
									<tr><th>Telephone</th><td><?php print $list["tel"]; ?> </td></tr>
									<tr><th>Email</th><td><?php print $list["email"]; ?>  </td></tr>
									<tr><th>Street Number</th><td><?php print $list["stname"];?></td></tr>
									<tr><th>House Number</th><td ><?php print $list["hsenumber"];?> </td></tr>
									<tr><th>City</th><td><?php print$list["city"] ;?></td></tr>
									<tr class='manage'><th>Edit</th><td><a href="#"><span class="glyphicon glyphicon-edit"></span></a>
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