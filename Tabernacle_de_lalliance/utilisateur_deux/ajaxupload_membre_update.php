<?php
include_once("session_deux.php");
require_once("../setup/connection.php");
if (isset($_SESSION["id_mem"])){
$id=$_SESSION["id_mem"];
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
 $final_image = rand(1000,1000000).$img;

 // Check if file already exists
if (file_exists($final_image)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
    echo "exists";
    exit();
}
// Check file size
 if ($_FILES["image"]["size"] > 3000000) {
	echo "size";
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
    exit();
}

if($ext != "jpg" && $ext != "png" && $ext != "jpeg"
&& $ext != "gif" && $ext != "bmp") {
   // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
echo "format";
exit();
}
 
     if($uploadOk!== 0){

  $path = $path.strtolower($final_image); 
  
   
  if(move_uploaded_file($tmp,$path)) 
  {
  	$query=$con->query("update membre set photo='$path' where mid='$id'") or (print_r($con->errorInfo()));
   echo "OK";

  }
}
session_destroy(); 
$con=Null;
}
 
}else{
echo "redirect";
}

?>