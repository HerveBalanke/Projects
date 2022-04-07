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

            
            $vid=$_GET['vid'];
            $out=$cons->query("select * from vaccine where vid='$vid'") or die (print_r($out->errorInfo()));
            $row= $out-> rowCount();
            $lis=$out->fetch();
            
           
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
            <h1 class="text-center">Edit Vaccine</h1> <br/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
        </div>
          <div class="col-md-4">
          <div id="flash"> </div><br/>
        </div>
         <div class="col-md-4">
        </div>
        </div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <form class="form-horizontal" role="form" action="edit_vac.php" method="POST">
              <div class="form-group">
    <input type="hidden" class="form-control" id="vid" value="<?php print $lis["vid"]; ?>">
  </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="vcode" class="control-label">Vaccine Code</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="vcode" placeholder="Enter Vaccine code" maxlength="30" value="<?php print $lis["vcode"]; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="vname" class="control-label">Vaccine Name</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="vname" placeholder="Enter Vaccine Name" maxlength="30" value="<?php print $lis["vname"]; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="vprice" class="control-label">Price</label>
                </div>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="vprice" placeholder="30" maxlength="50" value="<?php print $lis["vprice"]; ?>">
                </div>
              </div>
              <div class="form-group">
                 <div class="col-sm-2">
                    <label for="ndose" >Number of Dose(s)</label>
                    </div>
                    <div class="col-sm-10">
                   <input type="number" class="form-control" id="ndose" placeholder="Enter Number of Dose" maxlength="30" value="<?php print $lis["nod"]; ?>">
                  </div>
                  </div>
              <div class="form-group">
                 <div class="col-sm-2">
                    <label for="alength" >Lenght of Administration</label>
                    </div>
                    <div class="col-sm-10">
                   <input type="number" class="form-control" id="alength" placeholder="60 days" maxlength="30" value="<?php print $lis["ad_length"]; ?>">
                  </div>
                  </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="dinterval" class="control-label">Dose Interval</label>
                </div>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="dinterval" placeholder="30 days" maxlength="30" value="<?php print $lis["dinterval"]; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="manu" class="control-label">Manufacturer</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="manu" placeholder="Boots" maxlength="50" value="<?php print $lis["manufacturer"]; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="manuemail" class="control-label"> Manufacturer Email</label>
                </div>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="manuemail" placeholder="Boots@gmail.com" maxlength="50" value="<?php print $lis["manuemail"]; ?>">
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="submit" class="btn btn-default" id="submit" onClick="submit ()"> Update </button>
                  <button type="reset" class="btn btn-default">Clear</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-2"></div>
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

 <script type="text/javascript">  
 document.getElementById("vcode").focus();
  $(function() {
$("#submit").click(function() {
  var vid= $("#vid").val();
var vcode= $("#vcode").val();
var vname= $("#vname").val();
var nod= $("#ndose").val();
var length= $("#alength").val();
var interval= $("#dinterval").val();
var price= $("#vprice").val();
var manu= $("#manu").val();
var manuemail= $("#manuemail").val();

var dataString = "vid="+ vid +"&vcode="+ vcode +"&vname="+ vname +"&nod="+ nod +"&length="+ length +"&interval="+ interval + "&price="+ price +"&manu="+ manu +"&manuemail="+ manuemail;
alert(dataString);

/*if(textcontent=='')
{
alert("Enter some text..");
$("#content").focus();
}
else
{*/
$("#flash").show();
$("#flash").fadeIn(400).html("<div class='progress'><div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Updating</strong></div></div>");
$.ajax({
type: "POST",
url: "vac_update.php",
data:dataString,
cache: true,
success: function(html){
$("#flash").html(html);
document.getElementById('vcode').value=' ';
document.getElementById('vname').value=' ';
document.getElementById('ndose').value=' ';
document.getElementById('alength').value=' ';
document.getElementById('dinterval').value=' ';
document.getElementById('vprice').value='';
document.getElementById('manu').value='';
document.getElementById('manuemail').value='';
document.getElementById("vcode").focus();
}  
});
//}
return false;
});
});
</script>

    </html>