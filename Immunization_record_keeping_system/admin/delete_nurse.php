
<?php
            
          try{
              $cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
            }catch(PDOexception $e){
              die('ERROR:'.$e->getMessage());
            }

            $nid=$_GET['delete_id'];

     $del=$cons->query("DELETE FROM nurse WHERE nid='$nid'");
     header("Location: create_account.php");

?>