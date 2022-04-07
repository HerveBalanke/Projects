<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'/>
<link rel="stylesheet" type="text/css" href="css/bk_s.css" />
<title>Registration</title>
</head>

<body>
	<header>
		<nav>
			<ul>
				<a href="bank_account.php" > <li class="bk"> BANK ACCOUNT </li> <a>
				<a href="index.php" > <li class="lg"> LOGIN</li> </a>
			</ul>
		</nav>
	</header>
	
	<section>
		<br/>
		<h1> RECORD SAVED SUCCESSFULLY!</h1>
<?php
		$host="localhost";
		$user="root";
		$con= mysql_connect ($host, $user) or die(mysql_error());
		$db= mysql_select_db("internet_banking", $con);
		$id=$_SESSION["account"];
		$query2= mysql_fetch_array(mysql_query("select account_id, fname, sname, 
		amount, overdraft from bank_account where account_id='".$_SESSION["account"]."';", $con));
		echo"<fieldset>
			<legend> Bank account details </legend>";
			echo"<p><label> Full name </label> <label class='a'>"." " .$query2["fname"]." ".$query2["sname"]."</label> </p>";
			echo "<p> <label> Acc N° </label> <label class='a'>"." ".$query2["account_id"]."</label> <br/> </p>";
			echo "<p> <label> Amount </label> <label class='a'>GHC"." ".$query2["amount"]."</label> <br/> </p>";
			echo "<p> <label> Overdraft </label> <label class='a'>GHC"." ".$query2["overdraft"]."</label> <br/> </p>";
			echo "</fieldset>";

		?>
		<a href="index.php"> <input type="button" value="Close" class="c"/><a>
	</section>

	<footer>
		<h5> &copy; Copyright JOSEPH HERVE BALANKE 2014 </h5>
	</footer>
</body>

</html>