<!DOCTYPE html>
<html lang="en"> 

		<head>
				<meta charset='utf-8'/>
				<title>FIIS </title>
				<link type='text/css' rel='stylesheet' href='../CSS/login.css'/>
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
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">FIIS</a>
    </div>
  </div>
</nav>
			
				</header>
				
				<section>
				<br/>
							<h1> Log In </h1>
							<br/>
							<form class="form-horizontal" role="form">
								  <div id='check_both' style="color:red" class="responsive"></div> <br/>
								  <div class="form-group">
									<label class="control-label col-sm-2" for="uname">Username:</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" id="uname" placeholder="Enter username">
									</div>
										<div id='u_check' style="color:red"></div> 
								  </div>
								  
									<br/>
								  <div class="form-group">
									<label class="control-label col-sm-2" for="pass">Password:</label>
									<div class="col-sm-10"> 
									  <input type="password" class="form-control" id="pass" placeholder="Enter password">
									</div>
											<div id='p_check' style="color:red"> </div> 
								  </div>
								  
									<br/>
								  <div class="form-group"> 
									<div class="col-sm-offset-2 col-sm-10">
									  <button type="submit" class="btn btn-default" id="submit">Submit</button>
									</div>
								  </div>
								</form>
															
				</section>
		
				    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Subscribe</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-offset-3 col-md-6">
            <form role="form">
               <div class="form-group">
				<label class="control-label col-sm-2" for="uname">Username:</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" id="uname" placeholder="Enter username">
				</div>
				<div id='u_check' style="color:red"></div> 
			 </div>
            </form>
          </div>
        </div>
      </div>
    </div>
				<footer>
							<h5> &copy; FIIS 2015</h5>
				
				</footer>
				
				  <script type="text/javascript" src="../JS/jquery-2.2.0.js"></script>
				  <script type="text/javascript" src="../JS/index_validation.js"> </script>
				
		
		
		</body>
		
</html>