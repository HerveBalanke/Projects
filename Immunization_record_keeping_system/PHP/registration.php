<!DOCTYPE html>
<html>

		<head>
							<meta charset="utf-8">
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<meta name="description" content="">
							<meta name="author" content="">
								<title> FIIS</title>
								<!--<link type='text/css' rel='stylesheet' href='../CSS/registration.css'/>-->
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
		
		</head>
		
		<body>
		
			
				<header>
					<nav class="navbar navbar-inverse ">
				  <div class="container-fluid">
					<div class="navbar-header">
					  <a class="navbar-brand" href="#">FIIS</a>
					</div>
					<ul class="nav navbar-nav">
					  <li class="active"><a href="registration.php">Registration</a></li>
					  <li><a href="view_staff.php">View Staff</a></li>
					  <!--<li><a href="#">Page 2</a></li> 
					  <li><a href="#">Page 3</a></li> -->
					</ul>
				  </div>
				</nav>		
				
				</header>
	
	
				<section>
				<div class="section">
				
							<h1> REGISTRATION </h1>
							<br/>
							
							
      <div class="container">
        <div class="row">
          <div class="col-md-12"></div>
        </div>
      </div>
    
						
							<form class="form-inline" role="form" action="registration.php" method="POST">
							<div id="flash"> </div><br/>
								<div class="container-fluid">
							<div class="row">
						
								  <div class="form-group">
									<div class="col-md-3"><label for="fname" class='a'>First Name</label></div>
									<div class="col-md-4"><input type="fname" class="form-control" name="fname" id="fname" maxlength="30" ></div>
								  </div>
								  		
								  <div class="form-group">
									<div class="col-md-3"><label for="lname" class='b'>Last Name</label></div>
									<div class="col-md-4"><input type="lname" class="form-control" name="lname" id="lname" maxlength="30"></div>
								  </div> 
								   		</div>
</div>
<br/><br/><br/>
								  
								   <div class="form-group">
								  <label for="gender" class='a' for="gender"> Gender </label> 
								  <span class='lo'>Male</span> <input type="radio" name="gender" id="gender"  class="l" value="M" > <br/>
									<span class="lo" >Female</span> <input type="radio" name="gender" id="gender" class='l' value="M" >
									</div>
									
									<div class="form-group">
										<label for="date" class='b'>Date of Birth</label>
										<div class="form-group">
									 <div class='input-group date' id='date'>
									 <input type='text' class="form-control" name="dob"/>
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
									</div>
									<script type="text/javascript">
										var (function () {
											var ('#date').datetimepicker();
										});
									</script>
									</div>
									
								   <br/><br/><br/>
								  
								  <div class="form-group">
									<label for="tel" class='a'>Telephone</label>
									<input type="tel" class="form-control" name="tel" id="tel" maxlength="10">
								  </div>
								  
								  <div class="form-group" >
									<label for="email" class="b">Email</label>
									<input type="email" class="form-control" name="email" id="email" maxlength="30">
								  </div>
								  
								  <br/><br/><br/>
								  
								  <div class="form-group">
									<label for="sn" class="a">Street Number</label>
									<input type="text" class="form-control" name="sn" id="sn" maxlength="30">
								  </div>
								  <div class="form-group">
									<label for="hn" class='b'>House Number</label>
									<input type="text" class="form-control" name="hn" id="hn" maxlength="10">
									</div>
									<br/><br/><br/>
									 <div class="form-group" >
									<label for="ct" class="a">City</label>
									<input type="text" class="form-control" name="ct" id="ct" maxlength="30">
								  </div>
								   <br/><br/><br/><br/><br/>
								  
								  <button type="submit" name="submit" class="btn btn-default" id="submit" onClick="submit ()">Submit</button>
								   <button type="reset" class="btn btn-default">Clear</button>
								</form>
								
								<div class="space"></div>
								<div id="flash"></div>
								<div id="show"></div>

							</div>
				</section>
					

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
	
	$(function() {
$("#submit").click(function() {
var fname= $("#fname").val();
var lname= $("#lname").val();
var gender= $("#gender").val();
var dob= $("#dob").val();
var email= $("#email").val();
var tel= $("#tel").val();
var sn= $("#sn").val();
var hn= $("#hn").val();
var ct= $("#ct").val();

var dataString = "fname="+ fname +"&lname="+ lname +"&gender="+ gender +"&dob="+ dob 
+"&email="+ email + "&tel="+ tel +"&sn="+ sn +"&hn="+ hn +"&ct="+ ct;

/*if(textcontent=='')
{
alert("Enter some text..");
$("#content").focus();
}
else
{*/
$("#flash").show();
$("#flash").fadeIn(400).html("<div class='progress'><div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Loading</strong></div></div>");
$.ajax({
type: "POST",
url: "submit.php",
data:dataString,
cache: true,
success: function(html){
$("#flash").html(html);
$('#fname').val()=' ';
$('#lname').val()=' ';
$('#gender').val()=' ';
$('#dob').val()=' ';
$('#email').val()=' ';
$('#tel').val()='';
$('#sn').val()='';
$('#hn').val()='';
$('#ct').val()='';
$("#fname").focus();
}  
});
//}
return false;
});
});
</script>
	
	
				
				<footer>
							<h5> &copy; FIIS 2015</h5>
				
				</footer>
		
		</body>

</html>