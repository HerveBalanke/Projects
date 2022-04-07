<?php 
session_start ();

if (!isset($_SESSION["account"]) || (trim($_SESSION["account"]=='')))
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

              $out=$cons->query("select * from quantity;");
              $row=$out->rowCount();
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
<script type="text/javascript" >
$(function() {
$("#chart").click(function() {
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
            <h2 class="text-center"> Vaccine Inventory Bar Chart </h2>
                 
  
</div>
 
          </div>
          <div class="col-md-2">
          </div>
          </div>

           
          
            <?php

      // Form the SQL query that returns the top 10 most populous countries
      $strQuery = "SELECT * from quantity";

      // Execute the query, or else return the error message.
      $result = $cons->query($strQuery) or die(print_r($result->errorInfo()));

      // If the query returns a valid response, prepare the JSON string
      if ($result) {
          // The `$arrData` array holds the chart attributes and data
          $arrData = array(
                "chart" => array(
                    "caption" => "Inventory of Vaccine",
                    "paletteColors" => "#0075c2",
                    "bgColor" => "#ffffff",
                    "borderAlpha"=> "20",
                    "canvasBorderAlpha"=> "0",
                    "usePlotGradientColor"=> "0",
                    "plotBorderAlpha"=> "10",
                    "showXAxisLine"=> "1",
                    "xAxisLineColor" => "#999999",
                    "showValues"=> "0",
                    "divlineColor" => "#999999",
                    "divLineIsDashed" => "1",
                    "showAlternateHGridColor" => "0"
                )
            );

          $arrData["data"] = array();

  // Push the data into the array

          while($row = $result->fetch()) {
            array_push($arrData["data"], array(
                "label" => $row["vcode"],
                "value" => $row["qty"]
                )
            );
          }

          /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

          $jsonEncodedData = json_encode($arrData);

          /*Create an object for the column chart. Initialize this object using the FusionCharts PHP class constructor. The constructor is used to initialize the chart type, chart id, width, height, the div id of the chart container, the data format, and the data source. */
      new FusionCharts("type of chart", 
      "unique chart id", 
      "width of chart", 
      "height of chart", 
      "div id to render the chart", 
      "type of data", 
      "actual data");
          $columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);

          // Render the chart
          $columnChart->render();

          // Close the database connection
          $cons=null;

      }

    ?>
    <div class="row">
            <div class="col-md-3">
        

            </div>
          <div class="col-md-8">

    <br/><br/><div id="chart-1"><!-- Fusion Charts will render here--></div>
    <a href='vac_chart.php'> Return </a>

          </div>
          <div class="col-md-1">
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