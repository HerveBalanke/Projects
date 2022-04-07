
<?php
require_once("../connection.php");
if (isset($_POST['submit'])) {
$date=ucfirst($_POST['date']);
$titre=ucfirst($_POST['titre']);
$file=$_FILES['file']['name'];
$j = 0;     // Variable for indexing uploaded image.
$target_path = "../Audios/";     // Declaring Path for uploaded images.
// for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
// Loop to get individual element from the array
$validextensions = array("mp3", "MP3");      // Extensions which are allowed.
$ext = explode('.', basename($file));   // Explode file name from dot(.)
$file_extension = end($ext); // Store extensions in the variable.
$target_path = "../Audios/" . $titre . md5(uniqid()) . "." . $ext[count($ext) - 1];    // Set the target path with a new name of image.
$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
if (($_FILES["file"]["size"]>0)     // Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
$query=$con->query("insert into audios(date, titre, lien) values ('$date', '$titre', '$target_path');");
// If file moved to uploads folder.
echo "<script> var person = alert('Audio envoyé');
    window.location.href='gerer_audios.php';
</script>";
} else {     //  If File Was Not Moved.
  echo "<script> var person = alert('Reessayez!');
     window.location.href='gerer_audios.php';
    </script>";
} 
}else {     //   If File Size And File Type Was Incorrect.
  echo"<script> var person = alert('***Taile ou type invalide***');
    window.location.href='gerer_audios.php';
</script>";
}
}
// }

    $con=Null;
    

?>

