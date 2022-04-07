<!DOCTYPE html>
<html>

		<head>
							<meta charset="utf-8">
							<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<meta name="description" content="">
							<meta name="author" content=""> -->
							<meta name="viewport" content="width=device-width, 
                                     initial-scale=1.0, 
                                     maximum-scale=1.0, 
                                     user-scalable=no">
								<title> FIIS</title>
								<link type='text/css' rel='stylesheet' href='../CSS/add_vac.css'/>
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
		<div class="container-fluid">
		<div class="row">
  <div class="col-lg-12">
	<header>
	<!--<img src="../CSS/images/11.png" alt="background"/>-->
		<nav class="navbar navbar-default" role="navigation">
  <!--<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li> 
      <li><a href="#">Page 3</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
  
  <nav >-->
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" 
         data-target="#example-navbar-collapse">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">FIIS</a>
   </div>
   <div class="collapse navbar-collapse" id="example-navbar-collapse">
      <ul class="nav navbar-nav">
         <li class="active"><a href="#">iOS</a></li>
         <li><a href="#">SVN</a></li>
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               Java <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
               <li><a href="#">jmeter</a></li>
               <li><a href="#">EJB</a></li>
               <li><a href="#">Jasper Report</a></li>
               <li class="divider"></li>
               <li><a href="#">Separated link</a></li>
               <li class="divider"></li>
               <li><a href="#">One more separated link</a></li>
            </ul>
         </li>
		
      <li><a href="#"><span class="glyphicon glyphicon-user right"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
   </div>

</nav>
</header>
</div>
</div>
</div>

	<div class="container-fluid">
	<div class="row">
  <div class="col-sm-12">
	<section>
	<h1> Add vaccine </h1>
<form class="form-inline" role="form" action="add_vac.php" method="POST">
<div id="flash"> </div><br/>
  <div class="form-group">
    <label for="vcode" class="a">Code</label>
    <input type="text" class="form-control" id="vcode" >
  </div>
  <div class="form-group">
    <label for="vname">Name</label>
    <input type="text" class="form-control" id="vname" >
  </div>
  <br/><br/><br/>
  <div class="form-group">
    <label for="nod" class="a">Dose(s)</label>
    <input type="number" class="form-control" id="nod" >
  </div>
  <div class="form-group">
    <label for="dur">Duration</label>
    <input type="dur" class="form-control" id="dur" >
  </div>
  <br/><br/><br/>
  <div class="form-group">
    <label for="in" class="a">Interval</label>
    <input type="number" class="form-control" id="in" >
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" id="price" >
  </div>
  <br/><br/><br/>
  <div class="form-group">
    <label for="manu">Manufacturer</label>
    <input type="text" class="form-control" id="manu" >
  </div>
  <div class="form-group">
    <label for="memail">Manufacturer Email</label>
    <input type="email" class="form-control" id="memail" >
  </div>
   <br/><br/><br/>
  <div class="form-group">
    <label for="qty">Quantity</label>
    <input type="number" class="form-control" id="qty" >
  </div>
  <br/><br/>
  <button type="submit" name="submit" id="submit" class="btn btn-default" onClick="submit()">Add</button>
</form>
		</section>	
		</div>
</div>
</div>
		
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
var vcode= $("#vcode").val();
var vname= $("#vname").val();
var nod= $("#nod").val();
var dur= $("#dur").val();
var qty= $("#qty").val();
var ins= $("#in").val();
var price= $("#price").val();
var manu= $("#manu").val();
var memail= $("#memail").val();

var dataString = "vcode="+ vcode +"&vname="+ vname +"&nod="+ nod +"&dur="+ dur + "&qty="+ qty  +"&ins="+ ins + "&price="+ price +"&manu="+ manu +"&memail=" + memail;
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
url: "vac_add.php",
data:dataString,
cache: true,
success: function(html){
$("#flash").html(html);
document.getElementById('vcode').value=' ';
document.getElementById('vname').value=' ';
document.getElementById('nod').value=' ';
document.getElementById('qty').value=' ';
document.getElementById('dur').value=' ';
document.getElementById('in').value=' ';
document.getElementById('price').value='';
document.getElementById('manu').value='';
document.getElementById('memail').value='';
$("#vcode").focus();
}  
});
//}
return false;
});
});
</script>
<div class="container-fluid">
	<div class="row">
  <div class="col-sm-12">
	
					<footer>
							<h5> &copy; FIIS 2015</h5>
				
				</footer>
				</div>
</div>
</div>
		</body>


</html>