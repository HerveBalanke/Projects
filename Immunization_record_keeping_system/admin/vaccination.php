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
    <?php

      try{
              $cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
            }catch(PDOexception $e){
              die('ERROR:'.$e->getMessage());
            }


           /* $session=$_SESSION['account'];

            $fn=$cons->query("select * from nurse where uname='$session';");
            $session2= $fn->fetch();
            $session3=$session2["fname"];*/
       
        $query=$cons->query("select * from quantity where qty>0;");
        $row=$query->rowCount();


    ?>

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


<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Vaccination Details</h1> 
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
        </div>
          <div class="col-md-4">
          <div id="flash"> </div>
        </div>
         <div class="col-md-4">
        </div>
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-8">
            <form class="form-horizontal" role="form" id="vaccination" action="vaccination.php" method="POST">
              <div class="form-group">
    <input type="hidden" class="form-control" id="qty" value=0>
  </div>

              <div class="form-group">
                <div class="col-sm-2">
                  <label for="vcode" class="control-label">Patient ID</label>
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="pid" placeholder="Enter Patient ID" maxlength="30">
                  <div id='check_pid' style="color:red"></div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-2">
                  <label for="vcode" class="control-label">Vaccine Code</label>
                </div>
                <div class="col-sm-4">
                  <select class="form-control" id="vcode">
                    <option></option>

                  <?php

                  for($i=0; $i<$row; $i++){

                   $fetch=$query->fetch();
                    ?>

              <option value="<?php print $fetch['vcode'];?>"><?php print $fetch['vcode'];?></option>


<?php

  }

 ?>
  </select>
                  <div id='check_vcode' style="color:red"></div>
                </div>
              </div>

              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="submit" class="btn btn-default" id="submit" onClick="submit ()"> Enter </button>
                  <button type="reset" class="btn btn-default">Clear</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-1"></div>
        </div>
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
$('#check_pid').html("*Please enter <strong>Patient's ID</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#pid").focus(); 

$("#pid").change(function(){ $('#check_pid').hide();
});
return false;
}


else if (vcode.length == 0 ) {
$('#check_vcode').html("*Please select <strong>Vaccine Code</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#vcode").focus(); 

$("#vcode").change(function(){ $('#check_vcode').hide();
});
return false;
}else{


var dataString = "pid="+ pid +"&vcode="+ vcode;
//alert(dataString);

/*if(textcontent=='')
{
alert("Enter some text..");
$("#content").focus();
}
else
{*/
$("#flash").show();
$("#flash").fadeIn(400).html("<div class='progress'><div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Recording...</strong></div></div>");
$.ajax({
type: "POST",
url: "vaccination_add.php",
data:dataString,
cache: true,
success: function(response){
  if(response=="no"){
         
      $("#flash").html("<div class='alert alert-danger text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Unknown Patient!</strong> </div>");
      document.getElementById('vaccination').reset();
     }else{

$("#flash").html(response).hide();
 setTimeout(' window.location.href = "receipt.php";');
document.getElementById('vaccination').reset();
}

} 
})
}
//}
return false;
});
});
      </script> 

    </html>
