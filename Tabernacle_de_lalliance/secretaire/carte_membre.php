<?php  
include_once("../sessions/session_secretaire.php");
require_once("../setup/connection.php");
header ("Content-type: image/png");
  $bid=$_SESSION['bid'];
  $mid=$_GET['mid'];
  $out_membre=$con->query("select * from membre
 inner join t_membre on membre.t_membre=t_membre.tmid
 inner join profession on membre.profession=profession.pid
 inner join filiere on membre.filiere=filiere.fid
 inner join ecole on membre.ecole=ecole.eid
 inner join info_spi on membre.info_spi=info_spi.isid
 inner join urgence on membre.per_urgence=urgence.uid
 inner join eglise on info_spi.a_eglise=eglise.egid
 inner join activite_ac on membre.activite_ac=activite_ac.acaid 
 inner join activite on info_spi.ae_activite=activite.acid
 inner join relation on urgence.relation=relation.rid
 inner join branche on membre.branche=branche.bid
 where membre.mid='$mid' and membre.branche='$bid'
 ;") or die(print_r($con->errorInfo()));
      $fetch_out_membre= $out_membre->fetch();

$carte="../carte/id_front.jpg";
$photo=$fetch_out_membre ["photo"];
$qr_code=$fetch_out_membre ["qr_code"];
$mid=$fetch_out_membre ["mid"];
$nom=$fetch_out_membre ["nom"];
$prenom=$fetch_out_membre ["prenom"];
$genre=$fetch_out_membre ["genre"];
$dob=$fetch_out_membre ["dob"];
$pays=$fetch_out_membre ["pays"];
$fonction=$fetch_out_membre ["activite_ac"];
$branche=$fetch_out_membre ["branche"];
$da=$fetch_out_membre ["date_adhesion"];

$nom1=explode(" ",$nom);
$length=count($nom1);
if($length=1){
    $nom=$nom1[0];
}else if($length>1){
    $nom=$nom1[0]." ".$nom1[1];
}

$prenom1=explode(" ",$prenom);
$length_pre=count($prenom1);
if($length_pre=1){
    $prenom=$prenom1[0];
}else if($length_pre>1){
    $prenom=$prenom1[0]." ".$prenom1[1];
}


$background = imagecreatefromjpeg($carte);
$insert = imagecreatefrompng($qr_code);
$image_info = getImageSize($photo); // see EXIF for faster way
 switch ($image_info['mime']) {
     case 'image/gif':
         if (imagetypes() & IMG_GIF)  { // not the same as IMAGETYPE
             $insert2 = imageCreateFromGIF($photo) ;
         } else {
             $ermsg = 'GIF images are not supported<br />';
         }
         break;
     case 'image/jpeg':
         if (imagetypes() & IMG_JPG)  {
             $insert2 = imageCreateFromJPEG($photo) ;
         } else {
             $ermsg = 'JPEG images are not supported<br />';
         }
         break;
     case 'image/png':
         if (imagetypes() & IMG_PNG)  {
             $insert2 = imageCreateFromPNG($photo) ;
         } else {
             $ermsg = 'PNG images are not supported<br />';
         }
         break;
     case 'image/wbmp':
         if (imagetypes() & IMG_WBMP)  {
             $insert2 = imageCreateFromWBMP($photo) ;
         } else {
             $ermsg = 'WBMP images are not supported<br />';
         }
         break;
     default:
         $ermsg = $image_info['mime'].' images are not supported<br />';
         break;
 }


imagealphablending( $insert, false );
imagesavealpha( $insert, true );
imagecolortransparent($insert,imagecolorat($insert,0,0));
imagecolortransparent($insert2,imagecolorat($insert2,0,0));

$insert_x = imagesx($insert);
$insert_y = imagesy($insert);


$is = imagesx($insert2);
$iy = imagesy($insert2);

//$insert_x2 = imagesx($insert2);
$iw = 261;
$ih = 250;
// $ih = imagesy($insert2) * 100 / imagesx($insert2);
//$lokasi = "coba";
$img_dst = imagecreatetruecolor( $iw, $ih );
imagecolortransparent($img_dst, imagecolorallocatealpha($img_dst, 0, 0, 0, 0));
imagealphablending( $img_dst, true );
imagesavealpha( $img_dst, true );
imagecopyresized( $img_dst, $insert2, 0, 0, 0, 0, $iw, $ih, $is, $iy );

imagecopymerge($background,$img_dst,18,125,0,0,$iw,$ih,100);
imagecopymerge($background,$insert,40,410,0,0,$insert_x,$insert_y,100);
imagefttext($background,30,0,522,151,1,"OpenSans-Regular.ttf",$mid);
imagefttext($background,30,0,522,196,1,"OpenSans-Regular.ttf",$nom);
imagefttext($background,30,0,522,242,1,"OpenSans-Regular.ttf",$prenom);
imagefttext($background,30,0,522,300,1,"OpenSans-Regular.ttf",$genre);
imagefttext($background,30,0,522,345,1,"OpenSans-Regular.ttf",$dob);
imagefttext($background,30,0,522,395,1,"OpenSans-Regular.ttf",$pays);
imagefttext($background,30,0,522,450,1,"OpenSans-Regular.ttf",$fonction);
imagefttext($background,30,0,522,498,1,"OpenSans-Regular.ttf",$branche);
imagefttext($background,30,0,522,545,1,"OpenSans-Regular.ttf",$da);


//header ("Content-type: image/png");
imagepng($background);
$save=$mid.".png";
imagepng($background, $save);
imagedestroy($background);

?>
