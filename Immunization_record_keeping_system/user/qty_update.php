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

						$session=$_SESSION['account'];
           				 $fn=$cons->query("select * from nurse where uname='$session';");
           				 $session2= $fn->fetch();
           				 $session3=$session2["nid"];
           				 $session4=$session2["fname"];
           				 $session5=$session2["lname"];

          				$agent= $session4." ".$session5." - ".$session3;

						
								$qty= $_POST["qty"];
								$qid= $_POST["qid"];
								
								
						$out=$cons->query("select * from quantity where qid='$qid' ;");
						$fetch=$out->fetch();
						$oldqty=$fetch['qty'];
						$vcode=$fetch['vcode'];
						 $nqty= $oldqty+$qty;
						 $date= date('Y-m-d');

						 $inv=$cons->query("insert into quantity_invt (vcode, qty, dates, agent) 
						 	values ('$vcode', '$qty', '$date', '$agent') ") or die(print_r($cons->errorInfo()));

						$in=$cons->prepare("update quantity set qty=? where qid=? ;");
						$in->execute(array( $nqty, $qid )) or die(print_r($cons->errorInfo()));
						if ($in){
						
						echo"<div class='alert alert-success text-center'>
  <a href='view_staff.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Stock Updated!</strong>
</div>";

	
						}
								
						
						$cons=Null;
						
						
						?>