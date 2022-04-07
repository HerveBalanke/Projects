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
    <?php
            
          try{
              $cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
            }catch(PDOexception $e){
              die('ERROR:'.$e->getMessage());
            }

            $session=$_SESSION['account'];

            $fn=$cons->query("select * from nurse where uname='$session';");
            $session2= $fn->fetch();
            $session3=$session2["fname"];

            ?>
  
    <script type="text/javascript">
function delete_id(pid)
{
     if(confirm('Delete Patient?'))
     {
        window.location.href='delete_patient.php?delete_id='+pid;
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

            $pid=$_GET['pid'];
            $out=$cons->query("select * from patient where pid='$pid'") or die (print_r($out->errorInfo()));
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
            <h1 class="text-center">Patient's Details</h1> <br/>
          </div>
        </div>

              <div class="row">
          <div class="col-md-12">
              <table class="table table-hover table-striped">
                <tbody>
                
                
            <?php 
            
                for($i=0; $i<$row; $i++){ 
                $list=$out->fetch();
            ?>
          
                  
                  <tr><th>Patient's ID</th><td><?php print $list["pid"]; ?> </td></tr>
                  <tr><th>Firstname</th><td><?php print $list["fname"]; ?></td></tr>
                  <tr><th>Lastname</th><td><?php print $list["lname"]; ?></td></tr>
                  <tr><th>Gender</th><td><?php print $list["gender"]; ?>  </td></tr>
                  <tr><th>Date Of Birth</th><td><?php print $list["dob"]; ?> </td></tr>
                  <tr><th>Telephone</th><td><?php print $list["tel"]; ?>  </td></tr>
                  <tr><th>Email</th><td><?php print $list["email"];?></td></tr>
                  <tr><th>Address</th><td ><?php print $list["address"];?> </td></tr>
                  <tr><th>History of Immunization</th><td><a href="history.php?pid=<?php print $list["pid"]; ?>" style="color:#009900">History</a></td></tr>
                  <tr><th>Edit</th><td><a href="edit_patient.php?pid=<?php print $list["pid"]; ?>"><span class="glyphicon glyphicon-edit" style="color:orange"></span></a>
                  </td></tr>
                  <tr ><th>Delete</th><td><a href="javascript:delete_id(<?php echo $list["pid"]; ?>)"><span class="glyphicon glyphicon-trash" style="color:red"></span></a></td></tr>                
            <?php   
                  }
            ?>
                
                  </tbody>
                </table>
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