<!DOCTYPE html>
<html>

		<head>
							<meta charset="utf-8">
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<meta name="description" content="">
							<meta name="author" content="">
              <link type='text/css' rel='stylesheet' href='../CSS/radius.css'/>
								<title> FIS</title>
								
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
    <?php
            
          try{
              $cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
            }catch(PDOexception $e){
              die('ERROR:'.$e->getMessage());
            }
            
            $out=$cons->query("select * from nurse") or die (print_r($out->errorInfo()));
            $row= $out-> rowCount();
            
        
        ?>
		
		</head>

 <body>
    

     <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <img src="../CSS/images/111.png"
            class="center-block img-responsive ">
                     <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">FIS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Users
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="create_account.php">View Users</a></li> 
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Vaccine
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="add_vac.php">Add Vaccine</a></li>
            <li><a href="view_vaccine.php">View Vaccine</a></li>
            <li><a href="vac_qty.php">Update Stock</a></li> 
            <li><a href="vac_chart.php">Vaccine Inventory</a></li> 
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Sales
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Achimota</a></li>
            <li><a href="#">Lapaz</a></li>
            <li><a href="#">Tesano</a></li> 
          </ul>
        </li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
            <h1 class="text-center">Users</h1> <br/><br/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-offset-3 col-md-6">
           <form class="form-inline" role="form" action="view_staff.php" method="POST">
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
          </div>
        </div>
        <br/><br/>




        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover table-striped">
                <thead>
                  <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Telephone</th>
                  <th>Activate Account</th>
                  <th>Credentials</th>
                  <th>Lock Account</th>

                  
                  </tr>
                </thead>
                <tbody>
                
                
            <?php 
            
                for($i=0; $i<$row; $i++){ 
                $list=$out->fetch();
            ?>
          
                  <tr>
                  <td><a href="view_staff_details.php?nid=<?php print $list["nid"]; ?>"><?php print $list["fname"]; ?> </a> </td>
                  <td><a href="view_staff_details.php?nid=<?php print $list["nid"]; ?>"><?php print $list["lname"]; ?> </a> </td>
                  <td><?php print $list["tel"]; ?> </td>
                  <td><a href="open_account.php?nid=<?php print $list["nid"]; ?>"><span class="glyphicon glyphicon-user "></span></a></td>
                  <td> <?php print $list["uname"]; ?> / <?php print $list["pass"]; ?> </td>
                  <td><a href="lock_account.php?nid=<?php print $list["nid"]; ?>"><span class="glyphicon glyphicon-minus "></span></a></td>
                  
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








  <footer class="section section-primary">
      <div class="container"> <h5 class="text-center">&copy; FIS 2015</h5> </div>
    </footer>
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

    </html>