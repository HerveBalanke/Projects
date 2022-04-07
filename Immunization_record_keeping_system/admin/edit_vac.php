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

    <script type="javascript">
     $(function() {
    $('#vcode').focus();
  });
    </script>

    <?php
            
          try{
              $cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
            }catch(PDOexception $e){
              die('ERROR:'.$e->getMessage());
            }

            
            $vid=$_GET['vid'];
            $out=$cons->query("select * from vaccine where vid='$vid'") or die (print_r($out->errorInfo()));
            $row= $out-> rowCount();
            $lis=$out->fetch();
            
           
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
            <h1 class="text-center">Edit Vaccine</h1>
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
          <div class="col-md-2"></div>
          <div class="col-md-8" id="sec">
            <form class="form-horizontal" id="vaccine" role="form" action="add_vac.php" method="POST">
              <div class="form-group">
    <input type="hidden" class="form-control" id="qty" value=0>
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" id="vid" value="<?php print $lis["vid"]; ?>">
  </div>

              <div class="form-group">
                
                <div class="col-sm-2">
                  <label for="vcode" class="control-label">Vaccine Code</label>
                  <?php //echo date("Y-m-d"); ?>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="vcode" placeholder="vac" value="<?php print $lis["vcode"]; ?>" maxlength="30">
                  <div id='check_code' style="color:red"></div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-2">
                  <label for="vname" class="control-label">Vaccine Name</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="vname" value="<?php print $lis["vname"]; ?>" placeholder="vaccine" maxlength="30">
                  <div id='check_name' style="color:red"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="vprice" class="control-label">Price</label>
                </div>
                <div class="col-sm-5">
                  
                  <div class="input-group"> 
        <span class="input-group-addon">¢</span>
        <input type="number" value="<?php print $lis["vprice"]; ?>" min="0" max="999" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" 
                  id="vprice"  maxlength="10" class="form-control currency" />
    </div>

                  <div id='check_price' style="color:red"></div>
                </div>
              </div>
              <div class="form-group">
                 <div class="col-sm-2">
                    <label for="ndose" >Number of Dose(s)</label>
                    </div>
                    <div class="col-sm-5">
                      <div id='check_comparison' style="color:red"></div>
                   <input type="number" class="form-control" id="ndose" min="0" value="<?php print $lis["nod"]; ?>"  max="300"  >
                   <div id='check_ndose' style="color:red"></div>
                  </div>
                  </div>
              <div class="form-group">
                 <div class="col-sm-2">
                    <label for="alength" >Length of Administration</label>
                    </div>
                    <div class="col-sm-5">
                                <div class="input-group"> 
        
        <input type="number"  class="form-control" id="alength"  min="0" value="<?php print $lis["ad_length"]; ?>" max="300"  />
        <span class="input-group-addon">Days</span>
    </div>
                   <div id='check_length' style="color:red"></div>
                  </div>
                  </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="manu" class="control-label">Manufacturer</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="manu"  value="<?php print $lis["manufacturer"]; ?>" placeholder="Boots" maxlength="50">
                  <div id='check_manu' style="color:red"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="manuemail" class="control-label"> Manufacturer Email</label>
                  
                </div>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="manuemail" value="<?php print $lis["manuemail"]; ?>" placeholder="Boots@gmail.com" maxlength="50">
                  <div id='check_manuemail' style="color:red"></div>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" name="submit" class="btn btn-default" id="submit"> Update </button>
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
  var qty= $("#qty").val();
  var vid= $("#vid").val();
  var date= $("#date").val();
var vcode= $("#vcode").val();
var vname= $("#vname").val();
var nod= $("#ndose").val();
var length= $("#alength").val();
var price= $("#vprice").val();
var manu= $("#manu").val();
var manuemail= $("#manuemail").val();

var emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 

if (vcode.length == 0) {
$('#check_code').html("*Please enter <strong>Vaccine Code</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#vcode").focus(); 

$("#vcode").change(function(){ $('#check_code').hide();
});
return false;
}


if (vname.length == 0) {
$('#check_name').html("*Please enter <strong>Vaccine Name</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#vname").focus(); 

$("#vcode").change(function(){ $('#check_name').hide();
});
return false;
}


else if ( price.length == 0 || (price<=0)  || (price>999)) {
$('#check_price').html("*<strong>Price between 0 and 1000 </strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#vprice").focus(); 

$("#vprice").change(function(){ $('#check_price').hide();
});
return false;
}

 else if ((nod.length == 0) || (nod<=0) || (nod>999)) {
$('#check_ndose').html("*<strong>Number of Dose should be between 0 and 1000 </strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#ndose").focus(); 

$("#ndose").change(function(){ $('#check_ndose').hide();
});
return false;
}


 else if ((length.length == 0) || (length<=0) || (length>999)) {
$('#check_length').html("*<strong> Length of Administration should be between 0 and 1000</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#alength").focus(); 

$("#alength").change(function(){ $('#check_length').hide();
});
return false;
}

 if (nod>length) {
$('#check_comparison').html("*Please<strong> N. of dose <= L. of Administration </strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#ndose").focus(); 

$("#ndose").change(function(){ $('#check_comparison').hide();
});
return false;
}

 

else if (manu.length == 0) {
$('#check_manu').html("*Please enter <strong>Manufacturer</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#manu").focus(); 

$("#manu").change(function(){ $('#check_manu').hide();
});
return false;
}


else if (manuemail.length==0) {
$('#check_manuemail').html("*Please enter <strong>Manufacturer Email</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#manuemail").focus(); 

$("#manuemail").change(function(){ $('#manuemail').hide();
});
return false;
}else{

var dataString = "vcode="+ vcode +"&vname="+ vname +"&nod="+ nod +"&length="+ length +"&price="+ price +"&manu="+ manu +"&manuemail="+ manuemail +"&qty="+ qty +"&date="+ date +"&vid="+ vid;
//alert(dataString);

/*if(textcontent=='')
{
alert("Enter some text..");
$("#content").focus();
}
else
{*/
$("#flash").show();
$("#flash").fadeIn(400).html("<div class='progress'><div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Editing</strong></div></div>");
$.ajax({
type: "POST",
url: "vac_update.php",
data:dataString,
cache: true,
success: function(html){
$("#flash").html(html);
// $("#sec").load("form.php");
document.getElementById('vaccine').reset();
$("#vcode").focus();
setTimeout(' window.location.href = "view_vaccine.php"; ',2000);
}  
});
//}
return false;
}
});
});
</script>

    </html>