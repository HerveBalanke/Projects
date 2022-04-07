<?php 
session_start ();

if (!isset($_SESSION['account']) || (trim($_SESSION['account']=='')))
{
header('location:../index.php');
exit();

}
?>

<!DOCTYPE html>
<html>

		<head>
							<meta charset="utf-8">
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<meta name="description" content="">
							<meta name="author" content="">
              <link type='text/css' rel='stylesheet' href='../CSS/radius.css'/>
              <link type='text/css' rel='stylesheet' href='../CSS/pagination.css'/>
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

        <style>


  @media print {

    #printtable{
  visibility:visible;
  position:absolute;
left:15px;
font-family: "Arial", Times, serif;
font-size:60px;
  width:674px;
  height:500px;
    }

    body{
  visibility:hidden;
}
}

</style>

    <?php

      try{
              $cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
            }catch(PDOexception $e){
              die('ERROR:'.$e->getMessage());
            }

        $query=$cons->query("select * from quantity;");
        $row=$query->rowCount();
$session=$_SESSION['account'];

            $fn=$cons->query("select * from nurse where uname='$session';");
            $session2= $fn->fetch();
            $session3=$session2["fname"];
            $session4=$session2["nid"];
       

    ?>

</head>

 <body>
    
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
      <a class="navbar-brand" href="wel.php"><?php echo $session3; ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Vaccines
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="view_vaccine.php">View Vaccine</a></li>
            <li><a href="vac_qty.php">Update Stock</a></li> 
            <li><a href="vac_chart.php">Vaccine Inventory</a></li> 
          </ul>
        </li>
        <li class="dropdown">
                 <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Patients
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
            <li><a href="vaccination.php">Record Vaccination</a></li>
            <li><a href="vac_account.php">Daily Vaccination</a></li>
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




  <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div id="printtable">
            <h1 class="text-center">Daily Vaccination  </h1> 
        


        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">



            <?php
            $today=date('Y-m-d');

            $out=$cons->query("select * from vaccination where dates='$today' and nurse='$session4';");
            $row= $out->rowCount();
            


            ?>
            <div class="table-responsive">
            <table class="table table-hover table-striped table-condensed">
                <thead>
                  <tr>
                  <th>Patient'ID</th>
                  <th>Patient Name</th>
                  <th>Vcode</th>
                  </tr>
                </thead>
                <tbody>
                


   <?php 
            
                for($i=0; $i<$row; $i++){ 
                $result=$out->fetch();
            $paid=$result['patient'];
            $outpatient=$cons->query("select * from patient where pid='$paid';");
            $fpid=$outpatient->fetch();



            ?>
          
                  <tr>
                  <td><?php print $paid; ?> </td>
                  <td><?php print $fpid['fname']." ".$fpid['lname'] ; ?> </td>
                  <td><?php print $result['vcode']; ?> </td>
                  </tr>
                 
            <?php   
                  }
            ?>
                



   </tbody>
                </table>
                </div>
              </div>
              <div class="col-md-2">
          </div>
          </div>
          </div>
          

           <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8 ">  </div>
          <div class="col-md-2"></div>
      </div>


        </div>
      
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

