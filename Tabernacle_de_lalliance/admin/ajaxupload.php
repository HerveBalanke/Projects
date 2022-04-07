<?php
include_once("../sessions/session_admin.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$admin=$_SESSION['admin'];

if (isset($_POST["uid"]) && $_POST["uid"]!=""){
$id=$_POST["uid"];
//$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); // valid extensions
$path = '../uploads/'; // upload directory

if(isset($_FILES['image']))
{
 $img = $_FILES['image']['name'];
 $tmp = $_FILES['image']['tmp_name'];
 $uploadOk= 1;
  
 // get uploaded file's extension
 $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
 
 // can upload same image using rand function
 $final_image = rand(1000,1000000).$id.$img;

 // Check if file already exists
if (file_exists($final_image)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
    echo "exist";
    exit();
}
// Check file size
 if ($_FILES["image"]["size"] > 3000000) {
	echo "sizey";
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
    exit();
}

if($ext != "jpg" && $ext != "png" && $ext != "jpeg"
&& $ext != "gif" && $ext != "bmp") {
   // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
echo "frmat";
exit();
}
 
     if($uploadOk!== 0){

  $path = $path.strtolower($final_image); 
  
   
  if(move_uploaded_file($tmp,$path)) 
  {

   $query=$con->query("update utilisateur set photo='$path' where uid='$id'") or (print_r($con->errorInfo()));
   $out_ut=$con->query("select tel, uname, pass from utilisateur where uid='$id' ;") or (print_r($con->errorInfo()));
                  $out_ut=$out_ut->fetch();
                  $nom=$out_ut['nom'];
                  $prenom=$out_ut['prenom'];
                  $tel=$out_ut['tel'];
                  $uname=$out_ut['uname'];
                  $pass=$out_ut['pass'];

   if ($query){
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
             // $messageResponse = $messagingApi->sendQuickMessage("TA", "+233".$tel, "$nom $prenom Bienvenue au Tabernacle de l'Alliance, L'auditorium de la transformation");


              $mesg = new Message();
              $mesg->setContent("$nom $prenom bienvenue au TA Manager. Votre Uname est: $uname et votre mot de passe: $pass. Merci, Jesus t'aime.");
              $mesg->setTo("$tel");
              $mesg->setFrom("TA");
              $mesg->setRegisteredDelivery(true);

              // Let us say we want to send the message 3 days from today
             // $mesg->setTime(date('Y-m-d H:i:s', strtotime('+1 week')));*/

                $messageResponse = $messagingApi->sendMessage($mesg);

              if ($messageResponse instanceof MessageResponse) {
                  echo "SENTY";
              } elseif ($messageResponse instanceof HttpResponse) {
                  echo "SENTN";
              }
          } catch (Exception $ex) {
              echo $ex->getTraceAsString();
          }
                      
            }


  }
}

}
 
}else{
echo "rdect";
}

?>