<?php
ob_start();
session_start();
//session_destroy();
?>
<!DOCTYPE html>
<html>

		<head>
							<meta charset="utf-8">
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<meta name="description" content="">
							<meta name="author" content="">
              <link type='text/css' rel='stylesheet' href='..content/CSS/pagination.css'/>
              <link type='text/css' rel='stylesheet' href='../CSS/radius.css'/>
								<title> FIS</title>
								
					 <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
		
		</head>

 <body>
    

     <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <img src="CSS/images/0.jpg"
            class="center-block img-responsive ">
            <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header border: none !important;">
      <a class="navbar-brand" href="#">FIS</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
      
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
            <h1 class="text-center">Log In</h1>
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
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <form class="form-horizontal"  action="index.php" method="POST" role="form">
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputEmail3" class="control-label">Username</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="uname" placeholder="Username">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">Password</label>
                </div>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="pass" placeholder="Password">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default" id="submit" onClick="submit ()" >Log in</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-3"></div>
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
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script type="text/javascript"> 
  
 $(function() {
$("#submit").click(function() {
var uname= $("#uname").val();
var pass= $("#pass").val();



var dataString = "uname="+ uname +"&pass="+ pass ;
//alert(dataString);

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
url: "login.php",
data:dataString,
cache: true,
success: function(response)
 {      
     if(response=="ok"){
         
      $("#flash").html("<div class='progress'><div class='progress-bar progress-bar-success progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Signing In</strong></div></div>");
      setTimeout(' window.location.href = "user/wel.php"; ',4000);
     }else if(response=="ok1"){
         
      $("#flash").html("<div class='progress'><div class='progress-bar progress-bar-success progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Signing In</strong></div></div>");
      setTimeout(' window.location.href = "admin/wel.php"; ',4000);
     }else if(response=="ok2"){
         
      $("#flash").html("<div class='progress'><div class='progress-bar progress-bar-success progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Signing In</strong></div></div>");
      setTimeout(' window.location.href = "hr/wel.php"; ',4000);
     }else if(response=="no"){

      $("#flash").html("<div class='alert alert-danger text-center'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong> Invalid Credential Provided!</strong></div>");
     }
}  
});
//}
return false;
});
});
</script>

		</html>