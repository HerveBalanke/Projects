<?php 
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'/>
<link rel="stylesheet" type="text/css" href="css/index.css" />
<title>Login</title>
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
<aside>
<a href="registration.php">
<p> <input type="button" value="e-Registration" name="add" id="add" class="add" /> </p> <br/>
</a>
</aside>
<h1> LOGIN </h1>
<form action='index.php'  method='POST'>
<p><label for="account"> Account Number</label>
<input type="Number" name="account" id="account"  maxlength="10" class="a" required /></p>
<input type="reset" value="Reset" name="reset" id="reset" class="b" />
<input type="submit" value="Next" name="next" id="next" class="c"/>
<?php
$host="localhost";
$user="root";
$con= mysql_connect ($host, $user) or die(mysql_error());
$db= mysql_select_db("internet_banking", $con);
if (isset($_POST["next"])){
$account=strtoupper(mysql_real_escape_string($_POST["account"]));
$query=mysql_query("select * from user where account_id='$account';", $con)or die(mysql_error());
$count=mysql_num_rows($query);
if($count>0){
$_SESSION["account"]=$account;
header("location:login1.php");
}
else{
echo "<script> alert('Unknown account number!') </script>";
}
}
?>

</form>
</section>

<footer>
<h5> &copy; Copyright JOSEPH HERVE BALANKE 2014 </h5>
</footer>
</body>

</html>