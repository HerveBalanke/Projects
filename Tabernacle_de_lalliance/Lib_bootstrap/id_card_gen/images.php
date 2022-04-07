<?php
header ("Content-type: image/png");

$nik = $_POST['nik'];
$name = $_POST['nama'];
$blog = $_POST['blog'];
$sns = $_POST['sns'];
$upl = $_POST['upl'];
$jk = $_POST['jk'];
$foto = $_POST['foto'];


$background = imagecreatefromjpeg("img/id_front.jpg");
$insert = imagecreatefrompng("img/3.png");
$image_info = getImageSize($foto) ; // see EXIF for faster way
 switch ($image_info['mime']) {
     case 'image/gif':
         if (imagetypes() & IMG_GIF)  { // not the same as IMAGETYPE
             $insert2 = imageCreateFromGIF($foto) ;
         } else {
             $ermsg = 'GIF images are not supported<br />';
         }
         break;
     case 'image/jpeg':
         if (imagetypes() & IMG_JPG)  {
             $insert2 = imageCreateFromJPEG($foto) ;
         } else {
             $ermsg = 'JPEG images are not supported<br />';
         }
         break;
     case 'image/png':
         if (imagetypes() & IMG_PNG)  {
             $insert2 = imageCreateFromPNG($foto) ;
         } else {
             $ermsg = 'PNG images are not supported<br />';
         }
         break;
     case 'image/wbmp':
         if (imagetypes() & IMG_WBMP)  {
             $insert2 = imageCreateFromWBMP($foto) ;
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
imagefttext($background,30,0,522,151,1,"OpenSans-Regular.ttf","TA01234567");
imagefttext($background,30,0,522,196,1,"OpenSans-Regular.ttf","Balankebb nnnnnnnnnn");
imagefttext($background,30,0,522,242,1,"OpenSans-Regular.ttf","Josephbbb Hervebbbbb");
imagefttext($background,30,0,522,300,1,"OpenSans-Regular.ttf","M");
imagefttext($background,30,0,522,345,1,"OpenSans-Regular.ttf","2017/03/17");
imagefttext($background,30,0,522,395,1,"OpenSans-Regular.ttf","Cameroun");
imagefttext($background,30,0,522,450,1,"OpenSans-Regular.ttf","Ouvrier");
imagefttext($background,30,0,522,498,1,"OpenSans-Regular.ttf","Tantra");
imagefttext($background,30,0,522,545,1,"OpenSans-Regular.ttf","2015/04/02");


// header ("Content-type: image/png");
imagepng($background);
$save="im.png";
imagepng($background, $save);

?>