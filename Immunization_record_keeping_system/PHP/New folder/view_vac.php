<!DOCTYPE html>
<html>

		<head>
							<meta charset="utf-8">
							<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<meta name="description" content="">
							<meta name="author" content=""> -->
							<meta name="viewport" content="width=device-width, 
                                     initial-scale=1.0, 
                                     maximum-scale=1.0, 
                                     user-scalable=no">
								<title> FIIS</title>
								<link type='text/css' rel='stylesheet' href='../CSS/add_vac.css'/>
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
		<div class="container-fluid">
		<div class="row">
  <div class="col-lg-12">
	<header>
	<?php
						
					try{
							$cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
						}catch(PDOexception $e){
							die('ERROR:'.$e->getMessage());
						}
						
						$out=$cons->query("select * from vaccine") or die (print_r($out->errorInfo()));
						$row= $out-> rowCount();
						
						
						
				
				?>
				
	<!--<img src="../CSS/images/11.png" alt="background"/>-->
		<nav class="navbar navbar-default" role="navigation">
  <!--<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li> 
      <li><a href="#">Page 3</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
  
  <nav >-->
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" 
         data-target="#example-navbar-collapse">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">FIIS</a>
   </div>
   <div class="collapse navbar-collapse" id="example-navbar-collapse">
      <ul class="nav navbar-nav">
         <li class="active"><a href="#">iOS</a></li>
         <li><a href="#">SVN</a></li>
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               Java <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
               <li><a href="#">jmeter</a></li>
               <li><a href="#">EJB</a></li>
               <li><a href="#">Jasper Report</a></li>
               <li class="divider"></li>
               <li><a href="#">Separated link</a></li>
               <li class="divider"></li>
               <li><a href="#">One more separated link</a></li>
            </ul>
         </li>
		
      <li><a href="#"><span class="glyphicon glyphicon-user right"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
   </div>

</nav>
</header>
</div>
</div>
</div>

	<div class="container-fluid">
	<div class="row">
  <div class="col-sm-12">
	<section>
	<h1> List of Vaccine </h1>
	<br/><br/>
							<form class="form-inline" role="form" action="view_vac.php" method="POST">
							<label for="search">Filter by</label>
							<select class="combobox">
							  <option></option>
							  <option value="PA">Pennsylvania</option>
							  <option value="CT">Connecticut</option>
							  <option value="NY">New York</option>
							  <option value="MD">Maryland</option>
							  <option value="VA">Virginia</option>
							</select>&nbsp;&nbsp;

							<script type="text/javascript">
							  $(document).ready(function(){
								$('.combobox').combobox();
							  });
							</script>
								  <input class="form-control form-inline" id="search" type="text">
								  <button type="button" class="btn btn-default btn-sm">
								<span class="glyphicon glyphicon-search"></span> Search 
							</button>
							
							</form>
							<br/><br/><br/>
							
							
							<table class="table table-hover table-striped">
								<thead>
								  <tr>
									<th>Vaccine Code</th>
									<th>Vaccine name</th>
									<th>Number of dose(s)</th>
									<th>Dose Interval</th>
									<th>Quantity</th>
									<th> Administration lenght</th>
									<th>Price of Dose</th>
									<th>Manufacturer</th>
									<th>Manufactturer Email</th>
									<th>Edit</th>
									<th>Delete</th>
								  </tr>
								</thead>
								<tbody>
								
								
						<?php	
						
								for($i=0; $i<$row; $i++){ 
								$list=$out->fetch();
						?>
					
								  <tr>
									<td><a href="view_vacd.php?id=<?php print $list["vid"]; ?>"><?php print $list["vcode"]; ?> </a> </td>
									<td><?php print $list["vname"]; ?> </td>
									<td><?php print $list["nod"]; ?> </td>
									<td><?php print $list["vinterval"]; ?>  </td>
									<td><?php print $list["qty"]; ?>  </td>
									<td><?php print $list["vduration"];?></td>
									<td><?php print $list["vprice"];?></td>
									<td><?php print $list["vmanufacturer"];?></td>
									<td><?php print $list["memail"];?></td>
									<td ><a href="edit_vac.php?id=<?php print $list["vid"]; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
									<td><a href="#"><span class="glyphicon glyphicon-trash"></span></a></td>
								  </tr>
								 
						<?php	  
								  }
						?>
								
								</tbody>
							  </table>

				
		</section>	
		</div>
</div>
</div>
		
		</body>
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
	
	
	
	<script type="text/javascript">	

</script>

	
					<footer>
							<h5> &copy; FIIS 2015</h5>
				
				</footer>
		
		</body>


</html>