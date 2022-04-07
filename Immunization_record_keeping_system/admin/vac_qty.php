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

        $query=$cons->query("select * from quantity;");
        $row=$query->rowCount();
        //print $row;


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
             <h1 class="text-center">Update Stock</h1> <br/>

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

              <form class="form-horizontal" role="form" id="update" action="vac_qty.php" method="POST">
              <div class="form-group">
                <div class="col-md-2">
                  <label for="vcode" class="control-label">Vaccine Code</label>
                </div>
                <div class="col-md-7">
                  <select class="form-control" id="qid">
                    <option></option>

                  <?php

                  for($i=0; $i<$row; $i++){

                   $fetch=$query->fetch();
                    ?>

              <option value="<?php print $fetch['qid'];?>"><?php print $fetch['vcode'];?></option>


<?php

  }

 ?>
  </select>
  <div id='check_qid' style="color:red"></div>
                  
                </div>
                <div class="col-md-3"></div>
              </div>

              <div class="form-group">
                <div class="col-md-2">
                  <label for="qty" class="control-label">Quantity</label>
                </div>
                <div class="col-md-7">
                  <input type="number" class="form-control" id="qty" placeholder="Enter Vaccine Quantity" maxlength="30"
                  min="0" value="0"  max="300">
                  <div id='check_qty' style="color:red"></div>
                </div>
                <div class="col-md-3">
                  </div>
              </div>
                
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" name="submit" class="btn btn-default" id="submit" > Update </button>
                </div>
              </div>
            </form>
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


    <script type="text/JavaScript">
    $(function() {
$("#submit").click(function() {



var qid=$("#qid").val();
var qty= $("#qty").val();

if (qid.length == 0) {
$('#check_qid').html("*Please select <strong>Vaccine Code</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#qid").focus(); 

$("#qid").change(function(){ $('#check_qid').hide();
});
return false;
}
else if ((qty.length == 0) || (qty<=0) || (qty>999)) {
$('#check_qty').html("*<strong>Quantity should be between 0 and 999 </strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#qty").focus(); 

$("#qty").change(function(){ $('#check_qty').hide();
});
return false;
}else {


var dataString = "qty="+ qty +"&qid="+ qid;
//alert(dataString);

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
url: "qty_update.php",
data:dataString,
cache: true,
success: function(html){
$("#flash").html(html);
document.getElementById('update').reset();

}
 
});
return false;
} 
});
});




    </script>

    </html>