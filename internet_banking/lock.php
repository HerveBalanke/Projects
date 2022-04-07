<?php 
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'/>
<link rel="stylesheet" type="text/css" href="css/lock.css" />
<title>Login</title>
</head>

<body>
<header>
<nav>
		<ul>
			<a href="bank_account.php" class='n'> <li class="bk"> BANK ACCOUNT </li> <a>
			<a href="index.php" class='n'> <li class="lg"> LOGIN</li> </a>
		</ul>
</nav>
</header>
<section>
<br/><br/><br/>
<div class='lock'>
<h1> ACCOUNT LOCKED!</h1>
<p>Please contact one of our bank administrators to reset the account.</p>
</div>
	<a href='index.php'>
	<input type='button' value='Close' name='next' id='next' class='c'/>
	</a>
</section>

<footer>
<h5> &copy; Copyright JOSEPH HERVE BALANKE 2014 </h5>
</footer>
</body>

</html>