<?php 
session_start ();

if (!isset($_SESSION["registrar"]) || (trim($_SESSION["registrar"]=='')))
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

    <script type="text/javascript">
function delete_id(nid)
{
     if(confirm('Delete Nurse ?'))
     {
        window.location.href='delete_nurse.php?delete_id='+nid;
     }
}
</script>
            <?php
            
          try{
              $cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
            }catch(PDOexception $e){
              die('ERROR:'.$e->getMessage());
            }
            $nid=$_GET['nid'];
            $out=$cons->query("select * from nurse where nid='$nid'") or die (print_r($out->errorInfo()));
            $row= $out-> rowCount();
            //$lis=$out->fetch();
            
            
        
        ?>
		
		</head>

 <body>
    

     <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <img src="../CSS/images/111.png"
            class="center-block img-responsive ">
          <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="wel.php"><?php echo $_SESSION["registrar"]; ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Nurse
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="s_registration.php">Register Nurse</a></li> 
            <li><a href="view_staff.php">View Nurse</a></li> 
          </ul>
        </li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href='logout.php'><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
          <div class="col-md-2"></div>
          <div class="col-md-8">

            <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Nurse's Details</h1> <br/>
          </div>
        </div>

              <div class="row">
          <div class="col-md-12">
              <table class="table table-hover table-striped">
                <tbody>
                
                
            <?php 
            
                for($i=0; $i<$row; $i++){ 
                $list=$out->fetch();
            ?>
          
                  
                  <tr><th>Firstname</th><td><?php print $list["fname"]; ?> </td></tr>
                  <tr><th>Lastname</th><td><?php print $list["lname"]; ?></td></tr>
                  <tr><th>Gender</th><td><?php print $list["gender"]; ?> </td></tr>
                  <tr><th>Date of birth</th><td><?php print $list["dob"]; ?> </td></tr>
                  <tr><th>Telephone</th><td><?php print $list["tel"]; ?> </td></tr>
                  <tr><th>Email</th><td><?php print $list["email"]; ?>  </td></tr>
                  <tr><th>Address</th><td><?php print $list["address"];?></td></tr>
                  <tr ><th>Edit</th><td><a href="edit_staff.php?nid=<?php print $list["nid"]; ?>"><span class="glyphicon glyphicon-edit" style="color:orange"></span></a>
                  </td></tr>
                  <tr><th>Delete</th><td><a href="javascript:delete_id(<?php echo $list["nid"]; ?>)"><span class="glyphicon glyphicon-trash" style="color:red"></span></a></td></tr>                
            <?php   
                  }
            ?>
                
                </tbody>
                </table>
                 </div>
        </div>


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

    </html>