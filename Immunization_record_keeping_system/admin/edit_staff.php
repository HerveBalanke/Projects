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

            
            
            $nid=$_GET['nid'];
            $out=$cons->query("select * from nurse where nid='$nid'") or die (print_r($out->errorInfo()));
            $row= $out-> rowCount();
            $lis=$out->fetch();
          $date=$lis['dob'];
            $dob=str_split($date);
            $year=$dob['0'].$dob['1'].$dob['2'].$dob['3'];
           $month=$dob['5'].$dob['6'];
           $day=$dob['8'].$dob['9'];

           
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
            <h1 class="text-center">Edit Nurse</h1> <br/>
          </div>
        </div>
          <div="section">
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
          <div class="col-md-8" id="sec">
            <form class="form-horizontal" id="login-form" role="form" action="edit_staff.php" method="POST">
              <div class="form-group">
    <input type="hidden" class="form-control" id="nid" value="<?php print $lis["nid"]; ?>">
  </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="fname" class="control-label">Firstname</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="fname" placeholder="Firstname" maxlength="30" value="<?php print $lis["fname"]; ?>">
                  <div id='check_fname' style="color:red"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="lname" class="control-label">Lastname</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="lname" placeholder="Lastname" maxlength="30" value="<?php print $lis["lname"]; ?>">
                  <div id='check_lname' style="color:red"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="gender" > Gender </label> 
                  </div>
                  <div class="col-sm-10">
                  <input type="radio" name="gender" id="gender"   value="M" <?php echo ($lis["gender"]=='M')?'checked':'' ?>> <span >Male</span>  <br/>
                  <input type="radio" name="gender" id="gender"  value="F" <?php echo ($lis["gender"]=='F')?'checked':'' ?>> <span >Female</span> 
                  <div id='check_gender' style="color:red"></div>
                  </div>
                  </div>
              <div class="form-group">
                 <div class="col-sm-2">
                    <label for="date" >Date of Birth</label>
                    </div>
                    <div class="col-sm-10">
                   <div class='form-inline'>
                    &nbsp;&nbsp;&nbsp;&nbsp;<div class='form-group'>
                   <select name="day" id="day" class="form-control" >
                    <option></option> 
  <option value="01">1</option>
  <option value="02">2</option>
  <option value="03">3</option>
  <option value="04">4</option>
  <option value="05">5</option>
  <option value="06">6</option>
  <option value="07">7</option>
  <option value="08">8</option>
  <option value="09">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="24">24</option>
  <option value="25">25</option>
  <option value="26">26</option>
  <option value="27">27</option>
  <option value="28">28</option>
  <option value="29">29</option>
  <option value="30">30</option>
  <option value="31">31</option>
  </select>
  <div id='check_day' style="color:red"></div>
</div>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                   <div class='form-group'>
                   <select name="month" id="month" class="form-control" >
                    <option></option> 
  <option value="01">1</option>
  <option value="02">2</option>
  <option value="03">3</option>
  <option value="04">4</option>
  <option value="05">5</option>
  <option value="06">6</option>
  <option value="07">7</option>
  <option value="08">8</option>
  <option value="09">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  </select>
  <div id='check_month' style="color:red"></div>
  </div>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <div class='form-group'>
                    <select name="year" id="year" class="form-control" >
                      <option></option> 
  <option value="2016">2016</option>                  
  <option value="2015">2015</option>                   
  <option value="2014">2014</option>
  <option value="2013">2013</option>
  <option value="2012">2012</option>
  <option value="2011">2011</option>
  <option value="2010">2010</option>
  <option value="2009">2009</option>
  <option value="2008">2008</option>
  <option value="2007">2007</option>
  <option value="2006">2006</option>
  <option value="2005">2005</option>
  <option value="2004">2004</option>
  <option value="2003">2003</option>
  <option value="2002">2002</option>
  <option value="2001">2001</option>
  <option value="2000">2000</option>
  <option value="1999">1999</option>
  <option value="1998">1998</option>
  <option value="1997">1997</option>
  <option value="1996">1996</option>
  <option value="1995">1995</option>
  <option value="1994">1994</option>
  <option value="1993">1993</option>
  <option value="1992">1992</option>
  <option value="1991">1991</option>
  <option value="1990">1990</option>
  <option value="1989">1989</option>
  <option value="1988">1988</option>
  <option value="1987">1987</option>
  <option value="1986">1986</option>
  <option value="1985">1985</option>
  <option value="1984">1984</option>
  <option value="1983">1983</option>
  <option value="1982">1982</option>
  <option value="1981">1981</option>
  <option value="1980">1980</option>
  <option value="1979">1979</option>
  <option value="1978">1978</option>
  <option value="1977">1977</option>
  <option value="1976">1976</option>
  <option value="1975">1975</option>
  <option value="1974">1974</option>
  <option value="1973">1973</option>
  <option value="1972">1972</option>
  <option value="1971">1971</option>
  <option value="1970">1970</option>
  <option value="1969">1969</option>
  <option value="1968">1968</option>
  <option value="1967">1967</option>
  <option value="1966">1966</option>
  <option value="1965">1965</option>
  <option value="1964">1964</option>
  <option value="1963">1963</option>
  <option value="1962">1962</option>
  <option value="1961">1961</option>
  <option value="1960">1960</option>
  <option value="1959">1959</option>
  <option value="1958">1958</option>
  <option value="1957">1957</option>
  <option value="1956">1956</option>
  <option value="1955">1955</option>
  <option value="1954">1954</option>
  <option value="1953">1953</option>
  <option value="1952">1952</option>
  <option value="1951">1951</option>
  <option value="1950">1950</option>
  <option value="1949">1949</option>
  <option value="1948">1948</option>
  <option value="1947">1947</option>
  <option value="1946">1946</option>
  <option value="1945">1945</option>
  <option value="1944">1944</option>
  <option value="1943">1943</option>
  <option value="1942">1942</option>
  <option value="1941">1941</option>
  <option value="1940">1940</option>
  <option value="1939">1939</option>
  <option value="1938">1938</option>
  <option value="1937">1937</option>
  <option value="1936">1936</option>
  <option value="1935">1935</option>
  <option value="1934">1934</option>
  <option value="1933">1933</option>
  <option value="1932">1932</option>
  <option value="1931">1931</option>
  <option value="1930">1930</option>

                </select>
                <div id='check_year' style="color:red"></div>
                  </div>
                  </div>
                  </div>
                  </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="tel" class="control-label">Telephone</label>
                </div>
                <div class="col-sm-10">
                  <input type="telephone" class="form-control" id="tel" placeholder="0123456789" maxlength="10" value="<?php print $lis["tel"]; ?>">
                  <div id='check_tel' style="color:red"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="email" class="control-label">Email</label>
                </div>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" placeholder="FIS@gmail.com" maxlength="30" value="<?php print $lis["email"]; ?>">
                  <div id='check_email' style="color:red"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="add" class="control-label">Address</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="add" placeholder="32 Cresent Labone" maxlength="50" value="<?php print $lis["address"]; ?>">
                  <div id='check_add' style="color:red"></div>
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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script type="text/javascript"> 
  document.getElementById("fname").focus();
   $(function() {

$("#submit").click(function() {
  var nid= $("#nid").val();
var fname= $("#fname").val();
var lname= $("#lname").val();
var gender= $("#gender").val();
var day= $("#day").val();
var month= $("#month").val();
var year= $("#year").val();
var email= $("#email").val();
var tel= $("#tel").val();
var add= $("#add").val();
var phoneNumber = /[0-9-()+]{3,20}/; 
var emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 

if (fname.length == 0 ) {
$('#check_fname').html("*Please enter <strong>Firstname</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#fname").focus(); 

$("#fname").change(function(){ $('#check_fname').hide();});
return false;
}


else if (lname.length == 0 ) {
$('#check_lname').html("*Please enter <strong>Lastname</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#lname").focus(); 

$("#lname").change(function(){ $('#check_lname').hide();
});
return false;
}

 else if ($('input[name=gender]:checked').length == 0 ) {
$('#check_gender').html("*Please Select <strong>Gender</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#gender").focus(); 

$("#gender").change(function(){ $('#check_gender').hide();
});
return false;
}



 else if (day.length == 0 ) {
$('#check_day').html("*Please select a <strong>Day</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#day").focus(); 

$("#day").change(function(){ $('#check_day').hide();
});
return false;
}
else if (month.length == 0 ) {
$('#check_month').html("*Please select a <strong>Month</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#month").focus(); 

$("#month").change(function(){ $('#check_month').hide();
});
return false;
}
else if (year.length == 0 ) {
$('#check_year').html("*Please select a <strong>Year</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#year").focus(); 

$("#year").change(function(){ $('#check_year').hide();
});
return false;
}

 else if ((tel.length < 10) || (!tel.match(phoneNumber))) {
$('#check_tel').html("*Please enter a valid <strong>Telephone Number</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#tel").focus(); 

$("#tel").change(function(){ $('#check_tel').hide();
});
return false;
}

else if ((email.length == 0) || (!email.match(emailRegex))) {
$('#check_email').html("*Please enter a valid <strong>Email</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#email").focus(); 

$("#email").change(function(){ $('#check_email').hide();
});
return false;
}



 if (add.length == 0 ) {
$('#check_add').html("*Please enter an <strong>address</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#add").focus(); 

$("#add").change(function(){ $('#check_add').hide();
});
return false;
}else{

var dob=year+"-"+month+"-"+day;


var dataString = "nid="+ nid +"&fname="+ fname +"&lname="+ lname +"&gender="+ gender +"&dob="+ dob 
+"&email="+ email + "&tel="+ tel +"&add="+ add;
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
url: "update_staff.php",
data:dataString,
cache: true,
success: function(html){
  //$("#sec").load("form.php");
$("#flash").html(html);
setTimeout(' window.location.href = "create_account.php"; ',2000);
document.getElementById('login-form').reset();
$("#fname").focus();
}  
});
//}
return false;
}
});
});
</script>
  

    </html>

