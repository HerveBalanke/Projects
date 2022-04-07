<?php
include('session2.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'/>
<link rel="stylesheet" type="text/css" href="css/new_account.css" />
<title> eRegistration</title>
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
	<h1>WELCOME TO eBANKING</h1>
<?php
	$host="localhost";
	$user="root";
	$con= mysql_connect ($host, $user) or die(mysql_error());
	$db= mysql_select_db("internet_banking", $con);
	$uname= $_SESSION['uname'];
    $query=mysql_query ("select account_id, security1, answer1, security2, answer2, security3, answer3 from user where uname='".$_SESSION['uname']."';", $con);
	$query= mysql_fetch_array($query) or die(mysql_error());
	$account=$query["account_id"];
	echo "<fieldset>
		<legend> eBanking account details </legend>";
		echo"<p><label> Username </label> <label class='a'>"." " .$_SESSION['uname']. "</label> <br/> </p>";
		echo "<p> <label> Acc N° </label> <label class='a'>"." ".$account."</label> <br/> </p>
		</fieldset>";
		
	echo "<aside> <a href='index.php'>
	<input type='button' value='Log in' name='next' id='next' class='c'/>
	</a>
	</aside>";
?>

	</section>

	<footer>
	<h5> &copy; Copyright JOSEPH HERVE BALANKE 2014 </h5>
	</footer>

</body>
</html>




