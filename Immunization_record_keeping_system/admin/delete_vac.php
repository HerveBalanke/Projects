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

            $vid=$_GET['delete_id'];

     $del=$cons->prepare("delete from vaccine where vid=?;") ;
     $del->execute(array( $vid)) or die(print_r($del->errorInfo()));
     header("Location: view_vaccine.php");

?>