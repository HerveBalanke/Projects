<?php 
session_start ();

if (!isset($_SESSION['admin']) || (trim($_SESSION['admin']=='')))
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


           $session=$_SESSION['admin'];
            /*  $fn=$cons->query("select * from nurse where uname='$session';");
            $session2= $fn->fetch();
            $session3=$session2["fname"];
            $nses=$session2["nid"];
            */

            /*$out=$cons->query("select * from vaccination;") or die (print_r($out->errorInfo()));
            $row= $out-> rowCount();
             $list=$out->fetch();*/
             $today=date('Y-m-d');
             $query=$cons->query("select vaccination.vcode, count(vaccination.vcode) as number , vaccine.vprice
                                  from vaccination 
                                  inner join vaccine on vaccination.vcode=vaccine.vcode
                                  where vaccination.dates='$today' group by vaccination.vcode;");
             $row=$query->rowCount();
        
/*$query5=$cons->query("select * from appointment where vaccination='$vacid';");
 $fetch5=$query5->fetch();
$dates=$fetch5['dates'];*/


            // where date=today and dose left>0 and status=unpassed
             
             
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

<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div id="printtable">
            <h1 class="text-center">Accounts of Vaccination - <?php print $today; ?> </h1> 
        


        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
            <div class="table-responsive">
            <table class="table table-hover table-striped table-condensed">
                <thead>
                  <tr>
                  <th>Vcode</th>
                  <th>Quantity</th>
                  <th>Unit price (₵)</th>
                  <th>Total (₵)</th>
                  </tr>
                </thead>
                <tbody>
                


   <?php 
            
                for($i=0; $i<$row; $i++){ 
                $fetch=$query->fetch();



            ?>
          
                  <tr>
                  <td><?php print $fetch['vcode']; ?> </td>
                  <td><?php print $fetch['number']; ?> </td>
                  <td><?php print $fetch['vprice']; ?> </td>
                  <td><?php print $fetch['vprice']*$fetch['number']; ?> </td>
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
          <div class="col-md-8 "> <a href="javascript:window.print();" class="btn">Print <span class="glyphicon glyphicon-print"></span></a> </div>
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
    <script type="text/javascript">
     $(function() {
$("#submit").click(function() {
  var search= $("#search").val();

  if (search.length == 0 ) {
$('#check_search').html("*Please enter the <strong>Search Criteria</strong>"); // This Segment Displays The Validation Rule For All Fields
$("#search").focus(); 

//$("#uname").change(function(){ $('#check_both').hide();
//});
return false;
}else{
 
var dataString= "search="+ search;
//alert(dataString);

/*if(textcontent=='')
{
alert("Enter some text..");
$("#content").focus();
}{*/
//$("#flash").show();

//else
//$("#flash").fadeIn(400).html("<div class='progress'><div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Adding</strong></div></div>");
$.ajax({
type: "POST",
url: "search_vac.php",
data:dataString,
cache: true,
success: function(html){
//$("#flash").html(html);
$("#replace").html(html);
document.getElementById('search').value=' ';
}  
});
//}
return false;
}
});
});
      </script> 



    </html>