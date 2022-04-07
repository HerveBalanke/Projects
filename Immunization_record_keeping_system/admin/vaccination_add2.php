<?php 
session_start ();

if (!isset($_SESSION["admin"]) || (trim($_SESSION["admin"]=='')))
{
header('location:../index.php');
exit();

}
?>
<?php
						try{
							$cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
						}catch(PDOexception $e){
							die('ERROR:'.$e->getMessage());
						}

						require '../gh/Smsgh/Api.php';

						/*$session=$_SESSION['account'];
						$fn=$cons->query("select * from nurse where uname='$session';");
           				 $session2= $fn->fetch();*/
           				 $session3=$_SESSION["admin"];

								$pid= $_POST["pid"];
								$vid= $_POST["vid"];
								$vcode= $_POST["vcode"];
								$odate= date('Y-m-d');
								//$did= $_POST["did"];
								$nurse= $session3;

								$check_patient=$cons->query("select * from patient where pid='$pid';");
								$pfetch=$check_patient->fetch();
								$plname=$pfetch['lname'];
								$pfname=$pfetch['fname'];
								$ptel=$pfetch['tel'];
								$pstel="+233".$ptel;
								$p_count=$check_patient->rowCount();
								if($p_count<0 || $p_count==0 ){

									echo"<div class='alert alert-danger text-center'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Unknown Patient!</strong>
</div>";
								}else{

								$in=$cons->prepare("insert into vaccination (vcode, patient, nurse, dates) values (?,?,?,?)");
						$in->execute(array($vcode, $pid, $nurse, $odate )) or die(print_r($in->errorInfo()));


						$vac=$cons->query("select vid from vaccination order by vid desc limit 1;") or die(print_r($vac->errorInfo()));
						$vfetch=$vac->fetch();
						$vacid=$vfetch['vid'];

						/*$dose=$cons->query("select nod from vaccine where vcode='$vcode';") or die(print_r($vac->errorInfo()));
						$dfetch=$dose->fetch();
						$dos=$dfetch['nod'];
						$dos.=-1;*/
						$update=$cons->query("update appointment set status='fulfilled' where vaccination='$vid';");
						$query=$cons->query("select * from appointment where vaccination='$vid';");
						$nods=$query->fetch(); 
						$nodss=$nods['dose_left'];
						$dos=$nodss-1;

						if($nodss>0){

								$query=$cons->query("select * from vaccine where vcode='$vcode';") or die(print_r($query->errorInfo()));
								$fetch=$query->fetch();
								$nodi=$fetch['nod'];
								$nod=$fetch['nod']-1;
								$days=$fetch['ad_length']/$nodi;
								$mul=1;

								//for( $i=0; $i<$nod; $i++){

										//$days=$days*$mul;
										$ndate= date('Y-m-d', strtotime("+$days days"));
										$insert=$cons->query("insert into appointment (dates, vaccination, patient, dose_left, status) 
															values ('$ndate','$vacid', $pid, $dos, 'Unfulfilled');");
										//$mul++;

								//}

						}

						$vac=$cons->query("select vid from vaccination order by vid desc limit 1;") or die(print_r($vac->errorInfo()));
						$vfetch=$vac->fetch();
						$vacid=$vfetch['vid'];

						$query=$cons->query("select * from appointment where vaccination='$vacid';");
						$nods=$query->fetch(); 
						$nodss=$nods['dose_left'];

						if($nodss==0 || $nodss<0){
							$update=$cons->query("update appointment set status='passed' where vaccination='$vacid';")or die(print_r($vac->errorInfo()));
							$update=$cons->query("update appointment set dates='0000-00-00' where vaccination='$vacid';")or die(print_r($vac->errorInfo()));

						}else{

							$ndays=$days-1;

	$auth = new BasicAuth("gvtmltsv", "ejyrwxpk");
// instance of ApiHost
$apiHost = new ApiHost($auth);

// instance of AccountApi
$accountApi = new AccountApi($apiHost);
// Get the account profile
// Let us try to send some message
$messagingApi = new MessagingApi($apiHost);
try {
    // Send a quick message
   // $messageResponse = $messagingApi->sendQuickMessage("Herve", "+233241729977", "I love you dearly Honey. See you in the evening...");
$mesg = new Message();
        $mesg->setContent("Hello $pfname $plname kindly come for your vaccine dose tomorrow, $ndate.
         Thank You.");
        $mesg->setTo("$pstel");
        $mesg->setFrom("Flex Centre");
        $mesg->setRegisteredDelivery(true);
        $mesg->setTime(date('Y-m-d H:i:s', strtotime('+$ndays days'))); // Here we are scheduling the message to be sent next week
        $messageResponse = $messagingApi->sendMessage($mesg);

    if ($messageResponse instanceof MessageResponse) {
        echo $messageResponse->getStatus();
    } elseif ($messageResponse instanceof HttpResponse) {
        echo "\nServer Response Status : " . $messageResponse->getStatus();
    }
} catch (Exception $ex) {
    echo $ex->getTraceAsString();
}
}



						}
						
						if ($in){
						
						$_SESSION['vac']=$vacid;
						

						echo"
							<div class='progress'><div class='progress-bar progress-bar-success progress-bar-striped active' role='progressbar'aria-valuenow='40' 
							aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Vaccination details saved successfuly, processing receipt!</strong></div></div>
						";
						}
								
	
						$cons=Null;
						
						
						?>