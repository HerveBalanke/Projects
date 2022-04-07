<?php
require_once("../connection.php");
if (isset($_POST['submit'])) {
$titre=$_POST['album'];
$j = 0;     // Variable for indexing uploaded image.
$target_path = "../images/";     // Declaring Path for uploaded images.
for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
// Loop to get individual element from the array
$validextensions = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");      // Extensions which are allowed.
$ext = explode('.', basename($_FILES['file']['name'][$i]));   // Explode file name from dot(.)
$file_extension = end($ext); // Store extensions in the variable.
$target_path = "../images/". $titre . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
if (($_FILES["file"]["size"][$i] >0)     // Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
$query=$con->query("insert into galerie(titre, lien) values ('$titre', '$target_path');");
// If file moved to uploads folder.
echo "<div style='margin:10px 100px 10px 100px;' class='alert alert-success text-center'><a href='#'' id='noerror' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>".$j.").Image Envoyé!</strong></div>";
} else {     //  If File Was Not Moved.
echo "<div style='margin:10px 100px 10px 100px;' class='alert alert-info text-center'><a href='#'' id='noerror' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>".$j.").Réessayez!</strong></div>";
}
} else {     //   If File Size And File Type Was Incorrect.
echo "<div style='margin:10px 100px 10px 100px;' class='alert alert-danger text-center'><a href='#'' id='noerror' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>".$j.").***Taile ou type invalide***</strong></div>";
}
}
}
?>