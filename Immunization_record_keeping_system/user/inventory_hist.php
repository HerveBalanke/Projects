<?php 
session_start ();

if (!isset($_SESSION['account']) || (trim($_SESSION['account']=='')))
{
header('location:../index.php');
exit();

}
?>
<?php

/*Include the `fusioncharts.php` file that contains functions
  to embed the charts.
*/
  include("../JS/wrappers 2/php-wrapper/fusioncharts.php");

  /* The following 4 code lines contain the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection.   */

   try{
              $cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
            }catch(PDOexception $e){
              die('ERROR:'.$e->getMessage());
            }

            $session=$_SESSION['account'];

            $fn=$cons->query("select * from nurse where uname='$session';");
            $session2= $fn->fetch();
            $session3=$session2["fname"];

            $sessionid=$session2["nid"];
                   $session4=$session2["fname"];
                   $session5=$session2["lname"];

                  $agent= $session4." ".$session5." - ".$sessionid;

              $out=$cons->query("select * from quantity_invt where agent='$agent';");
              $row=$out->rowCount();
?>
<html>

		<head>
							<meta charset="utf-8">
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<meta name="description" content="">
							<meta name="author" content="">
              <link type='text/css' rel='stylesheet' href='../CSS/radius.css'/>
              <link type='text/css' rel='stylesheet' href='../CSS/pagination.css'/>
               <link  rel="stylesheet" type="text/css" href="css/style.css" />

              <script src="../JS/js/fusioncharts.js"></script>
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
<script type="text/javascript" language="javascript">
   
   $(document).ready(function() {

     $("#chart").click(function () {
        $("#chart-1").hide( );
     });

    /* $("#chart").click(function () {
        $("#chart-1").show( );
     }); */

   });

   </script>
		
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
          <div class="col-md-2">
          </div>
                    <div class="col-md-8">
<br/>
               <div id='printtable'>
            <h2 class="text-center">Stock Update History </h2>
                 <div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Vaccine Code</th>
        <th>Quantity</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>

      <?php
    for($i=0; $i<$row; $i++){ 

    $fetch=$out->fetch();

      ?>
<tr>
        <td><?php print $fetch["vcode"]; ?></td>
        <td> <?php print $fetch["qty"]; ?></td>
        <td> <?php print $fetch["dates"]; ?></td>
      </tr>

<?php

    }
    ?>
      
    </tbody>
  </table>
</div>
</div>
 <a href="javascript:window.print();" class="btn">Print <span class="glyphicon glyphicon-print"></span></a>&nbsp;&nbsp;&nbsp;
 <a href='vac_chart.php' class="btn"> Return </a>&nbsp;&nbsp;&nbsp;
          </div>
          <div class="col-md-2">
          </div>
          </div>

    <!--<div class="row">
            <div class="col-md-3">
            </div>
          <div class="col-md-8">
    <br/><br/><div id="chart-1">Fusion Charts will render here</div>

          </div>
          <div class="col-md-1">
            </div>
        </div>
      </div>
    </div>-->


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