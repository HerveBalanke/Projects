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

<?php
$vacid=$_SESSION['vac'];
//echo $vacid;
 $query=$cons->query("select * from vaccination where vid='$vacid';");
 $fetch=$query->fetch();

 $pid=$fetch["patient"];
 $nurse=$fetch["nurse"];
$vcode=$fetch["vcode"];
//echo $vcode;


 $query2=$cons->query("select * from patient where pid='$pid';");
 $fetch2=$query2->fetch();
$fname=$fetch2['fname'];
$lname=$fetch2['lname'];

$query3=$cons->query("select * from nurse where nid='$nurse';");
 $fetch3=$query3->fetch();
$nfname=$fetch3['fname'];
$nlname=$fetch3['lname'];

$query4=$cons->query("select * from vaccine where vcode='$vcode';");
 $fetch4=$query4->fetch();
$vname=$fetch4['vname'];
$vprice=$fetch4['vprice'];

$query5=$cons->query("select * from appointment where vaccination='$vacid';");
 $fetch5=$query5->fetch();
$dates=$fetch5['dates'];





?>
        <div class="section" >
      <div class="container">
        <div id="printtable">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8 "> <h4 class="text-center">Payment Receipt</h4></div>
          <div class="col-md-2"></div>
        </div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">

                     
  <table class="table table-striped">
    

        <tr><td><th>Date</th> </td> <td><?php echo date('Y-m-d h:i:sa'); ?></td></tr>
        <tr><td><th>Patient's ID</th> </td> <td><?php echo $pid; ?></td></tr>
        <tr><td><th>Patient's Name</th> </td> <td><?php echo $fname." " ; echo $lname; ?></td></tr>
        <tr><td><th>Vaccine (Code)</th> </td> <td> <?php echo $vname; ?> (<?php echo $vcode; ?>)</td></tr>
        <tr><td><th>Dose Price</th> </td> <td>₵ <?php echo $vprice ; ?></td></tr>
        <tr><td><th>Next Appointment Date</th> </td> <td> <?php 
        if($dates=='0000-00-00'){
          echo '--------';
        }else{
        echo $dates; } ?></td></tr>
        <tr><td><th>Received By</th> </td> <td><?php echo $nfname." "; echo $nlname; ?></td></tr>

        
  </table>


          </div>
          <div class="col-md-2"> </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8 "> <a href="javascript:window.print();" class="btn">Print <span class="glyphicon glyphicon-print"></span></a>&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;<a href="vaccination.php">Return </a></div>
          <div class="col-md-2"></div>
      </div>
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
  var pid= $("#pid").val();
  var vcode= $("#vcode").val();

  if (pid.length == 0 ) {
$('#check_pid').html("*Please enter <strong>Patient's ID</strong>"); // This Segment Displays The Validation Rule For All Fields
$("#pid").focus(); 

//$("#uname").change(function(){ $('#check_both').hide();
//});
return false;
}


else if (vcode.length == 0 ) {
$('#check_vcode').html("*Please select <strong>Vaccine Code</strong>"); // This Segment Displays The Validation Rule For All Fields
$("#vcode").focus(); 

//$("#uname").change(function(){ $('#check_both').hide();
//});
return false;
}else{


var dataString = "pid="+ pid +"&vcode="+ vcode;
alert(dataString);

/*if(textcontent=='')
{
alert("Enter some text..");
$("#content").focus();
}
else
{*/
$("#flash").show();
$("#flash").fadeIn(400).html("<div class='progress'><div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Adding</strong></div></div>");
$.ajax({
type: "POST",
url: "vaccination_add.php",
data:dataString,
cache: true,
success: function(html){
$("#flash").html(html);
      //setTimeout(' window.location.href = "user/add_patient.php"; ',4000);
document.getElementById('vaccination').reset();

}  
})
}
//}
return false;
});
});
      </script> 

    </html>
