<?php 
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'/>
<link rel="stylesheet" type="text/css" href="css/login.css" />
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
<br/><br/>
	<h1> LOGIN </h1>
	<form action='login1.php'  method='POST'>
	<input type="submit" value="Log out" name="logout" class="lo"/>
	</form>
	<form action='login1.php'  method='POST'>
	<p><label for='uname'> Username</label>
	<input type='text' name='uname' id='uname'  maxlength='20' class='a' required /></p>
	<p><label for='password'>Password</label>
	<input type='password' name='password' id='password'  maxlength='3' class='a' required /></p>
	
<?php
	$host="localhost";
	$user="root";
	$con= mysql_connect ($host, $user) or die(mysql_error());
	$db= mysql_select_db("internet_banking", $con);
	$account=$_SESSION['account'];
	$query=mysql_query("select security1, security2, security3 from user where account_id='".$_SESSION['account']."';", $con) or die(mysql_error());
		$get=mysql_fetch_array($query);
		$rand=array_rand($get);
		$security=$get[$rand];
	$loto=mysql_query("select * from security where sid='$security';", $con);
		$match=mysql_fetch_array($loto);
	$instant=mysql_query("insert into instant ( account_id, instant) values('$account', '$security');", $con);
		echo "<p> <label> Question </label> <span class='a'>".$match['security']."</span></p>";
		echo'<p><label for="answer">Answer </label>
		<input type="password" name="answer" id="answer"  maxlength="50" class="a" required /> </p>
		<input type="reset" value="Reset" name="reset" id="reset" class="b" />
		<input type="submit" value="Log in" name="log" id="log" class="c"/>';
		if (isset($_POST['logout'])){
	session_destroy ();
	header('location:index.php');
	exit();
	}
	
	function ends($account){
	$query=mysql_query("select attemps from user where account_id='$account';");
	$query2=mysql_fetch_array($query);
	$attemp=$query2['attemps'];
	$attleft=3-$attemp;
if($attleft==0){ 
	header('location: lock.php');
}elseif($attleft==1){
	echo"<p style='color: rgb(251,100,83); position:absolute; bottom:150px; font-weight:bold;'> Last attempt!</p>";
}elseif($attleft==2){
	echo" <p style='color:orange; position:absolute; bottom:150px; font-weight:bold;'>". $attleft. " "."attempts left ! </p>";
}elseif($attleft==3){
	echo " <p style='color:green; position:absolute; bottom:150px; font-weight:bold;'>".$attleft." "."attempts left ! </p>";
}

echo"</form>
</section>

<footer>
	<h5> &copy; Copyright JOSEPH HERVE BALANKE 2014 </h5>
</footer>
</body>

</html>";
	}
	
if(isset($_POST["log"])){
	$uname=strtoupper(mysql_real_escape_string($_POST["uname"]));
	$password= strtoupper(mysql_real_escape_string($_POST["password"]));
	$query= mysql_query("select * from user where uname='$uname' and account_id='".$_SESSION['account']."';", $con ) or die(mysql_error());
	$num_result=mysql_num_rows($query);
	
	if($num_result<0){
	echo "<script> alert('Incorrect credentials!') </script>";
	$query=mysql_query("select attemps from user where account_id='$account';", $con);
		$query2=mysql_fetch_array($query);
	if($query2['attemps']<3){
	$attemp=$query2['attemps'];
		$attemp++;
		$update=mysql_query("update user set attemps='$attemp' where account_id='".$_SESSION['account']."';", $con);
	}elseif($query2['attemps']>=3){
	header('location: lock.php');
	}
		ends($account);
		exit;
	}
	
	$pass=mysql_fetch_array($query);
	$pass1=$pass["password"];
	$des=str_split($pass1);
	
	if(strlen($password)<3){
	echo "<script> alert('Incorrect credentials!') </script>";
	$query=mysql_query("select attemps from user where account_id='$account';", $con);
		$query2=mysql_fetch_array($query);
	if($query2['attemps']<3){
	$attemp=$query2['attemps'];
		$attemp++;
		$update=mysql_query("update user set attemps='$attemp' where account_id='".$_SESSION['account']."';", $con);
	}elseif($query2['attemps']>=3){
	header('location: lock.php');
	}
		ends($account);
		exit;
	}
	
	$ppass=str_split($password);
	$answer=strtoupper(mysql_real_escape_string($_POST["answer"]));
	$query2=mysql_query("select security1, answer1, security2, answer2, security3, answer3 from user where uname='$uname';", $con) or die(mysql_error());
		$query3=mysql_fetch_array($query2);
		$check= array(array($query3["security1"]=>$query3["answer1"]), array($query3["security2"]=>$query3["answer2"]), 
				array($query3["security3"]=>$query3["answer3"]));
	$retreive=mysql_query("select instant from instant where account_id='".$_SESSION['account']."';", $con);
		$row= mysql_num_rows($retreive);
		$qid=mysql_result($retreive,$row-=2,'instant');
		$set=array($qid=>$answer);
		
		if( $num_result>0 && in_array($set, $check) && in_array($ppass['0'], $des) && in_array($ppass['1'], $des) && in_array($ppass['2'], $des)){
	$_SESSION["uname"]=$uname;
	$query=mysql_query("select attemps from user where account_id='".$_SESSION['account']."';", $con);
		$query2=mysql_fetch_array($query);
		
if($query2['attemps']>=3){
	header('location: lock.php');
}else{
	$update=mysql_query("update user set attemps=0 where account_id='".$_SESSION['account']."';", $con);
	header("location: account.php");
}
	}else{
	echo "<script> alert('Incorrect credentials!') </script>";
	$query=mysql_query("select attemps from user where account_id='".$_SESSION['account']."';", $con);
		$query2=mysql_fetch_array($query);
	if($query2['attemps']<3){
	$attemp=$query2['attemps'];
		$attemp++;
		$update=mysql_query("update user set attemps='$attemp' where account_id='".$_SESSION['account']."';", $con);
	}elseif($query2['attemps']>=3){
	header('location: lock.php');
	}
	}
	}

$query=mysql_query("select attemps from user where account_id='".$_SESSION['account']."';", $con);
	$query2=mysql_fetch_array($query);
	$attemp=$query2['attemps'];
	$attleft=3-$attemp;
if($attleft==0){ 
	header('location: lock.php');
}elseif($attleft==1){
	echo"<p style='color: rgb(251,100,83); position:absolute; bottom:150px; font-weight:bold;'> Last attempt!</p>";
}elseif($attleft==2){
	echo" <p style='color:orange; position:absolute; bottom:150px; font-weight:bold;'>". $attleft. " "."attempts left ! </p>";
}elseif($attleft==3){
	echo " <p style='color:green; position:absolute; bottom:150px; font-weight:bold;'>".$attleft." "."attempts left ! </p>";
}

?>

</form>
</section>

<footer>
	<h5> &copy; Copyright JOSEPH HERVE BALANKE 2014 </h5>
</footer>
</body>

</html>