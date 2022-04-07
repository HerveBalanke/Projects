<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'/>
<link rel="stylesheet" type="text/css" href="css/registration.css"/> 
<title>eRegistration</title>
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
	<h1>eBanking Registration</h1>
	<fieldset>
	<legend>Personal details</legend>
	<form action="registration.php"  method="POST">
	<p><label for="fname">Firstname</label>
	<input type="text" name="fname" id="fname"  maxlength="50"  class="a" required /></p>
	<p><label for="sname">Sirname</label>
	<input type="text" name="sname" id="sname" maxlength="50"  class="a" required /></p>
	<p><label for="account">Account N°</label>
	<input type="number" name="account" id="account" maxlength="10"  class="a" required /></p>
	<p><label>Date of birth</label>
	<div class="date">
	<select name="day" id="day">
	<option value="01">1</option>
	<option value="02">2</option>
	<option value="03">3</option>
	<option value="04">4</option>
	<option value="05">5</option>
	<option value="06">6</option>
	<option value="07">7</option>
	<option value="08">8</option>
	<option value="09">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
	</select>
	<label></label>
	<select name="month" id="month">
	<option value="01">1</option>
	<option value="02">2</option>
	<option value="03">3</option>
	<option value="04">4</option>
	<option value="05">5</option>
	<option value="06">6</option>
	<option value="07">7</option>
	<option value="08">8</option>
	<option value="09">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	</select>
	<label></label>
	<select name="year" id="year">
	<option value="2014">2014</option>
	<option value="2013">2013</option>
	<option value="2012">2012</option>
	<option value="2011">2011</option>
	<option value="2010">2010</option>
	<option value="2009">2009</option>
	<option value="2008">2008</option>
	<option value="2007">2007</option>
	<option value="2006">2006</option>
	<option value="2005">2005</option>
	<option value="2004">2004</option>
	<option value="2003">2003</option>
	<option value="2002">2002</option>
	<option value="2001">2001</option>
	<option value="2000">2000</option>
	<option value="1999">1999</option>
	<option value="1998">1998</option>
	<option value="1997">1997</option>
	<option value="1996">1996</option>
	<option value="1995">1995</option>
	<option value="1994">1994</option>
	<option value="1993">1993</option>
	<option value="1992">1992</option>
	<option value="1991">1991</option>
	<option value="1990">1990</option>
	<option value="1989">1989</option>
	<option value="1988">1988</option>
	<option value="1987">1987</option>
	<option value="1986">1986</option>
	<option value="1985">1985</option>
	<option value="1984">1984</option>
	<option value="1983">1983</option>
	<option value="1982">1982</option>
	<option value="1981">1981</option>
	<option value="1980">1980</option>
	<option value="1979">1979</option>
	<option value="1978">1978</option>
	<option value="1977">1977</option>
	<option value="1976">1976</option>
	<option value="1975">1975</option>
	<option value="1974">1974</option>
	<option value="1973">1973</option>
	<option value="1972">1972</option>
	<option value="1971">1971</option>
	<option value="1970">1970</option>
	<option value="1969">1969</option>
	<option value="1968">1968</option>
	<option value="1967">1967</option>
	<option value="1966">1966</option>
	<option value="1965">1965</option>
	<option value="1964">1964</option>
	<option value="1963">1963</option>
	<option value="1962">1962</option>
	<option value="1961">1961</option>
	<option value="1960">1960</option>
	<option value="1959">1959</option>
	<option value="1958">1958</option>
	<option value="1957">1957</option>
	<option value="1956">1956</option>
	<option value="1955">1955</option>
	<option value="1954">1954</option>
	<option value="1953">1953</option>
	<option value="1952">1952</option>
	<option value="1951">1951</option>
	<option value="1950">1950</option>
	<option value="1949">1949</option>
	<option value="1948">1948</option>
	<option value="1947">1947</option>
	<option value="1946">1946</option>
	<option value="1945">1945</option>
	<option value="1944">1944</option>
	<option value="1943">1943</option>
	<option value="1942">1942</option>
	<option value="1941">1941</option>
	<option value="1940">1940</option>
	<option value="1939">1939</option>
	<option value="1938">1938</option>
	<option value="1937">1937</option>
	<option value="1936">1936</option>
	<option value="1935">1935</option>
	<option value="1934">1934</option>
	<option value="1933">1933</option>
	<option value="1932">1932</option>
	<option value="1931">1931</option>
	<option value="1930">1930</option>
	</select></p>
	</div>
	<p><label for="gender">Gender</label>
	<input type="radio" name="gender" id="male" value="M"  class="radio" required/> <label for="male" class="male" >Male</label><br/>
	<input type="radio" name="gender" id="female" value="F"  class="radio" required/> <label for="female" class="female">Female</label><br/>
	</p>
	<p><label for="email">Email</label>
	<input type="email" name="email" id="email" maxlength="50"  class="a" required /></p>
	</fieldset> <br/>
	<fieldset>
	<legend>Login details</legend>
	<p><label for=" uname"> Username</label>
	<input type="text" name="uname" id="uname" maxlength="20" class="a" required/> 
	</p>
	<p><label for="password">Password</label>
	<input type="password" name="password" id="password" maxlength="20" class="a" required/></p>
	<p><label for="cpassword"> Confirm Password</label>
	<input type="password" name="cpassword" id="cpassword" maxlength="20" class="a" required/></p>
	<label> Security Questions</label> <br/>
	<p><label for="security1"> Security Question 1</label>
	<select name="security1" class="a" >
	<option value="1"> What is your level of education?</option>
	<option value="2">  What is your favourite module?</option>
	<option value="3"> What was the name of your primary school?</option>
	</select> <br/> <br/>
	<label for="answer1" >Answer 1</label>
	<input type="text" name="answer1" id="answer1" class="a" required /></p>

	<p><label for="security2" required> Security Question 2</label>
	<select name="security2" class="a" >
	<option value="4"> What is your favourite sport? </option>
	<option value="5"> What is the name of your favourite team?</option>
	<option value="6"> What is your favourite competion?</option>
	</select> <br/> <br/>
	<label for="answer2">Answer 2</label>
	<input type="text" name="answer2" id="answer2" class="a" required /> </p>

	<p><label for="security3"> Security Question 3</label>
	<select name="security3" class="a" >
	<option value="7"> What is your favourite activity?</option>
	<option value="8"> What is your dream? </option>
	<option value="9"> What is your type of companion?</option>
	</select> <br/> <br/>
	<label for="answer3">Answer 3</label>
	<input type="text" name="answer3" id="answer3" class="a" required /> </p>

	</fieldset>
	<input type="reset" value="Reset" name="reset" id="reset" class="b"/>
	<input type="submit" value="Submit" name="submit" id="submit" class="c"/>
<?php
	$host="localhost";
	$user="root";
	$con= mysql_connect ($host, $user) or die(mysql_error());
	$db= mysql_select_db("internet_banking", $con);
	if (isset ($_POST["submit"])){
		$fname= strtoupper(mysql_real_escape_string($_POST["fname"]));
		$sname=strtoupper(mysql_real_escape_string($_POST["sname"]));
		$account=strtoupper(mysql_real_escape_string($_POST["account"]));
		$day=strtoupper(mysql_real_escape_string($_POST["day"]));
		$month=strtoupper(mysql_real_escape_string($_POST["month"]));
		$year=strtoupper(mysql_real_escape_string($_POST["year"]));
		$gender=strtoupper(mysql_real_escape_string($_POST["gender"]));
		$email=strtoupper(mysql_real_escape_string($_POST["email"]));
		$uname=strtoupper(mysql_real_escape_string($_POST["uname"]));
		$password=strtoupper(mysql_real_escape_string($_POST["password"]));
		$cpassword=strtoupper(mysql_real_escape_string($_POST["cpassword"]));
		$security1=strtoupper(mysql_real_escape_string($_POST["security1"]));
		$security2=strtoupper(mysql_real_escape_string($_POST["security2"]));
		$security3=strtoupper(mysql_real_escape_string($_POST["security3"]));
		$answer1=strtoupper(mysql_real_escape_string($_POST["answer1"]));
		$answer2=strtoupper(mysql_real_escape_string($_POST["answer2"]));
		$answer3=strtoupper(mysql_real_escape_string($_POST["answer3"]));
		$dob=$year."-".$month."-".$day;
		$set= array( $account, $fname, $sname,
		 $dob, $gender);
		 
		$query=mysql_query("select account_id, fname, sname, dob, gender, tel, 
		email, address from bank_account where account_id='$account';", $con) or die (mysql_error());
		$row=mysql_num_rows($query);
			if($row<0){
			echo "<script> alert('Please check your details!') </script>";
			exit;
			}
		$query=mysql_fetch_array($query);
		$insert= array($query["account_id"], $query["fname"], $query["sname"], $query["dob"], 
		$query["gender"]);
		
		$acheck=mysql_query("select * from user where account_id='$account';", $con) or die(mysql_error);
		 $arow=mysql_num_rows($acheck);
			 if($arow>0){
			 echo "<script> alert('Please check your details !') </script>";
			 exit;
			 }
			 
			  $echeck=mysql_query("select * from user where email='$email';", $con) or die(mysql_error);
		 $erow=mysql_num_rows($echeck);
			 if($erow>0){
			 echo "<style> #email{border: solid 1px red;} </style>";
			 echo "<script> alert('Email already in use !') </script>";
			 exit;
			 } 
			 
		 $ucheck=mysql_query("select * from user where uname='$uname';", $con) or die(mysql_error);
		 $urow=mysql_num_rows($ucheck);
			 if($urow>0){
			 echo "<style> #uname{border: solid 1px red;} </style>";
			 echo "<script> alert('Username already in use !') </script>";
			 exit;
			 }
			 
			 if(strlen($password)<8){
		 echo "<style> #password{border: solid 1px red;} </style>";
			 echo "<script> alert('The password should contain 8 or characters!') </script>";
			 exit;
		 }
		 if($password!=$cpassword){
		 echo "<style> #cpassword{border: solid 1px red;} </style>";
			 echo "<script> alert('Unconfirm Password!') </script>";
			 exit;
		 }
		 
		if($insert==$set){
		$query2=mysql_query("insert into user(account_id, uname, email, password, security1, answer1, security2, answer2, security3, answer3)
		values('$account','$uname', '$email', '$password', '$security1','$answer1', '$security2', '$answer2', '$security3', '$answer3');",$con) or die(mysql_error());
		$_SESSION["uname"]=$uname;
		header("location:new_account.php?");
		}else{
		echo "<script> alert('Please check your details!') </script>";
		}
	}
?>
	</form>
	<br/><br/><br/>
		<h6> *Only users with a bank account can register to eBanking <h6>
	</section>

	<footer>
		<h5> &copy; Copyright JOSEPH HERVE BALANKE 2014 </h5>
	</footer>
</body>

</html>