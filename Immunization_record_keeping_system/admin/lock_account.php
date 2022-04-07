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

            require '../SendingMail/classes/class.phpmailer.php';
            require '../SendingMail/classes/class.smtp.php';
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


<?php

$nid=$_GET["nid"];
$out=$cons->query("select * from nurse where nid='$nid';");
$out=$out->fetch();
$lname=$out['lname'];
$fname=$out['fname'];
$dob=$out['dob'];
$address=$out['address'];
$tel=$out['tel'];
$email=$out['email'];
$string=$lname.$fname.$tel;
$string_pass=$dob.$address.$email;


 
 if ($out["uname"]=='-' && $out["pass"]=='-'){
 	//$uname=substr(str_shuffle($string), 0,5);
//$pass=substr(str_shuffle($string_pass), 0,8);

//$in=$cons->query("update nurse set uname='$uname', pass='$pass' where nid='$nid';")or die(print_r($in->errorInfo()));

?>

<div class="section">
      <div class="container">
      	     <div class="row">
        	<div class="col-md-4"></div>
          <div class="col-md-4">
<div class='alert alert-info text-center'>
  			<a href='view_staff.php' class='close' data-dismiss='alert' ></a>
  			<strong>Inactivated Account</strong>
			</div>
          </div>
          
<div class="col-md-4"></div>
        </div>

           <!-- <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Account Details</h1> <br/>
          </div>
        </div>

              <div class="row">
              	<div class="col-md-2"></div>
          <div class="col-md-8">
              <table class="table table-hover table-striped">
                <tbody>
                
          
                  
                  <tr><th>Firstname</th><td><?php //print $out["fname"]; ?> </td></tr>
                  <tr><th>Lastname</th><td><?php //print $out["lname"]; ?></td></tr>
                  <tr><th>Telephone</th><td><?php //print $out["tel"]; ?> </td></tr>
                  <tr><th>Email</th><td><?php //print $out["email"]; ?>  </td></tr>
                  <tr><th>Username</th><td><?php //print "********"; ?></td></tr> 
                  <tr><th>Password</th><td><?php //print "********"; ?></td></tr>
                                 
                
                </tbody>
                </table>
                 </div>
                 	 <div class="col-md-2"></div>
        </div>-->
         
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4"> <br/> <h6 class="text-center"> <a href="create_account.php"> Return</a> </h6> </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
             <div class="row">

<?php

}else if($out["uname"]!='-' && $out["pass"]!='-'){

  $in=$cons->query("update nurse set uname='-', pass='-' where nid='$nid';")or die(print_r($in->errorInfo()));
  $message="Hello $fname $lname, your
                               FIS account has been deactivated. Kindly get closer to the Administrator
                               for more details";



$mail = new PHPMailer();

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP(); 
$mail->SMTPDebug = 0;                                       // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hbalanke@gmail.com';                 // SMTP username
$mail->Password = '<password>';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('hbalanke@gmail.com');
$mail->addAddress($email);     // Add a recipient
//$mail->addAddress('');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'FIS account deactivated';
$mail->Body    = $message;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

/*if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}*/
        if(!$mail->send()) {
   // echo 'Message could not be sent.';
     ?>
     <div class="col-md-2"></div>
    <div class="col-md-8">
    <div class='alert alert-warning text-center'>
        <a href='lock_account.php' class='close' data-dismiss='alert' ></a>
        <p><strong>Account Locked <br/> Message could not be sent.<br/><br/>

           Mailer Error: <?php echo $mail->ErrorInfo;?></strong></p> 
      </div>
      </div>
      <div class="col-md-2"></div>
        
<?php  } else { ?>
<div class="col-md-4"></div>
<div class="col-md-4">
    <div class='alert alert-success text-center'>
        <a href='view_staff.php' class='close' data-dismiss='alert' ></a>
        <p> <strong> Account Locked <br/> Message has been sent. </strong></p>
      </div>
      </div>
      <div class="col-md-4"></div>
        
<?php  } 
/*$auth = new BasicAuth("gvtmltsv", "ejyrwxpk");
// instance of ApiHost
$apiHost = new ApiHost($auth);

// instance of AccountApi
$accountApi = new AccountApi($apiHost);
// Get the account profile
// Let us try to send some message
$messagingApi = new MessagingApi($apiHost);
try {
    // Send a quick message
    $messageResponse = $messagingApi->sendQuickMessage("Flex Centre", "$tel", " Hello '$fname' '$lname', her are your
                                                        FIS account credentials<br/>
                                                         Username: '$uname' <br/>
                                                         Password: '$pass'");


    if ($messageResponse instanceof MessageResponse) {
        echo $messageResponse->getStatus();
    } elseif ($messageResponse instanceof HttpResponse) {
        echo "\nServer Response Status : " . $messageResponse->getStatus();
    }
} catch (Exception $ex) {
    echo $ex->getTraceAsString();
}

*/
?>

        </div>

           <!-- <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Account Details</h1> <br/>
          </div>
        </div>

              <div class="row">
              	<div class="col-md-2"></div>
          <div class="col-md-8">
              <table class="table table-hover table-striped">
                <tbody>
                
          
                  
                  <tr><th>Firstname</th><td><?php //print $out["fname"]; ?> </td></tr>
                  <tr><th>Lastname</th><td><?php //print $out["lname"]; ?></td></tr>
                  <tr><th>Telephone</th><td><?php //print $out["tel"]; ?> </td></tr>
                  <tr><th>Email</th><td><?php //print $out["email"]; ?>  </td></tr>
                  <tr><th>Username</th><td><?php //print "********"; ?></td></tr> 
                  <tr><th>Password</th><td><?php //print "********"; ?></td></tr>
                                 
                
                </tbody>
                </table>
                 </div>
                 	 <div class="col-md-2"></div>
        </div>-->
         
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4"> <br/> <h6 class="text-center"> <a href="create_account.php"> Return</a> </h6> </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>
<?php
}
?>


<footer class="section section-primary">
      <div class="container"> <br/> <h5 class="text-center">&copy; FIS 2016</h5> </div>
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