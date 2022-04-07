<?php 
session_start ();

if (!isset($_SESSION["admin"]) || (trim($_SESSION["admin"]=='')))
{
header('location:../index.php');
exit();

}
?>
<!DOCTYPE html>
<html>

		<head>
							<meta charset="utf-8">
							<meta http-equiv="X-UA-Compatible" ="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<meta name="description" content="">
							<meta name="author" content="">
              <link type='text/css' rel='stylesheet' href='../CSS/radius.css'/>
              <link type='text/css' rel='stylesheet' href='..content/CSS/pagination.css'/>
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

    <script type="text/javascript">
function delete_id(vid)
{
     if(confirm('Delete vaccine ?'))
     {
        window.location.href='delete_vac.php?delete_id='+vid;
     }
}
</script>
	
		
		</head>
		
		<body>
				<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <img src="../CSS/images/0.jpg"
            class="center-block img-responsive ">
                     <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="wel.php"><?php echo $_SESSION["admin"] ;?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Users
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="s_registration.php">Add Nurse</a></li> 
            <li><a href="create_account.php">View Nurses</a></li> 
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Vaccines
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="add_vac.php">Add Vaccine</a></li>
            <li><a href="view_vaccine.php">View Vaccine</a></li>
            <li><a href="vac_qty.php">Update Stock</a></li> 
            <li><a href="vac_chart.php">Vaccine Inventory</a></li> 
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage patients
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
             <li><a href="add_patient.php">Add Patient</a></li>
            <li><a href="view_patient.php">View Patients</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Vaccinations
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="vac_account.php">Vaccination Accounts</a></li>
            <li><a href="nurse_vac.php">Nurse's Vaccination</a></li>
            <li><a href="vaccination.php">Record Vaccination</a></li>
            <li><a href="view_app.php">View Appointments</a></li> 
            <li><a href="view_appointment.php">Daily Appointments</a></li>
          </ul>
        </li>
        
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
  </div>
  </div>
  </div>
				
				
				
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
				
				
				
				
				
							<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">

            <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Details Of Vaccine</h1> <br/>
          </div>
        </div>

              <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-hover table-striped">
                <tbody>
								
								
						<?php	
						
								for($i=0; $i<$row; $i++){ 
								$list=$out->fetch();
						?>
					
								  
									<tr><th>Vaccine Code</th><td><?php print $list["vcode"]; ?> </td></tr>
									<tr><th>Vaccine Name</th><td><?php print $list["vname"]; ?></td></tr>
									<tr><th>Number of dose(s)</th><td><?php print $list["nod"]; ?> </td></tr>
									<tr><th> Administration length</th><td><?php print $list["ad_length"]; ?>  </td></tr>
									<tr><th>Price of Dose</th><td><?php print $list["vprice"];?></td></tr>
									<tr><th>Manufacturer</th><td ><?php print $list["manufacturer"];?> </td></tr>
									<tr><th>Manufactturer Email</th><td><?php print$list["manuemail"] ;?></td></tr>
									<tr><th>Edit</th><td><a href="edit_vac.php?vid=<?php print $list["vid"]; ?>"><span class="glyphicon glyphicon-edit" style="color:orange"></span></a>
									</td></tr>
									<tr ><th>Delete</th><td><a href="javascript:delete_id(<?php echo $list["vid"]; ?>)"><span class="glyphicon glyphicon-trash" style="color:red"></span></a></td></tr>								 
						<?php	  
								  }
						?>
								
							    </tbody>
                </table>
                 </div>
               </div>
        </div>


          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>

     <footer class="section section-primary">
      <div class="container"> <h5 class="text-center">&copy; FIS 2016</h5> </div>
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