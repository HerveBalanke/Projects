
<?php 
session_start ();

if (!isset($_SESSION['account']) || (trim($_SESSION['account']=='')))
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

     $del=$cons->query("DELETE FROM vaccine WHERE vid='$vid'");
     header("Location: view_vaccine.php");

?>