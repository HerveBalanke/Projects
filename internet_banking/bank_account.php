<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'/>
<link rel="stylesheet" type="text/css" href="css/bk.css"/>
<title>Bank Account</title>
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
		<h1>Bank Account</h1>
		<form action="bank_account.php"  method="POST">
		<p><label for="fname">Firstname</label>
		<input type="text" name="fname" id="fname"  maxlength="50" required class="a" /></p>
		<p><label for="sname">Sirname</label>
		<input type="text" name="sname" id="sname" maxlength="50"  required class="a" /></p>
		<p><label for="dob">Date of birth</label>
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
		<input type="radio" name="gender" id="male" value="M" class="radio" required /> <label for="male" class="male">Male</label><br/>
		<input type="radio" name="gender" id="female" value="F" class="radio" required /> <label for="female" class="female">Female</label> <br/>
		</p>
		<p><label for="tel" >Telephone</label>
		<input type="tel" name="tel" id="tel" maxlength="10"  required class="a" /></p>
		<p><label for="email">Email</label>
		<input type="email" name="email" id="email" maxlength="50"  required class="a" /></p> 
		<p><label for="address"> Address</label>
		<input type="text" name="address" id="address" maxlength="50" required class="a" /></p>
		<br/>

		<p><label for="amount">Amount</label>
		<input type="number" name="amount" id="amount" maxlength="15"  required class="a" /></p>
		<p><label for="overdraft">Overdraft</label>
		<input type="number" name="overdraft" id="overdraft" maxlength="10"  required  class="a" /></p>
		<p><input type="reset" value="Reset" name="reset" id="reset" class="b"/>
		<input type="submit" value="Submit" name="submit" id="submit" class="c"/></p>
<?php
	$host="localhost";
	$user="root";
	$con= mysql_connect ($host, $user) or die(mysql_error());
	$db= mysql_select_db("internet_banking", $con);
	if (isset ($_POST["submit"])){
	$fname=strtoupper(mysql_real_escape_string($_POST["fname"]));
	$sname=strtoupper(mysql_real_escape_string($_POST["sname"]));
	$day=strtoupper(mysql_real_escape_string($_POST["day"]));
	$month=strtoupper(mysql_real_escape_string($_POST["month"]));
	$year=strtoupper(mysql_real_escape_string($_POST["year"]));
	$gender=strtoupper(mysql_real_escape_string($_POST["gender"]));
	$tel=strtoupper(mysql_real_escape_string($_POST["tel"]));
	$email=strtoupper(mysql_real_escape_string($_POST["email"]));
	$address=strtoupper(mysql_real_escape_string($_POST["address"]));
	$amount=strtoupper(mysql_real_escape_string($_POST["amount"]));
	$overdraft=strtoupper(mysql_real_escape_string($_POST["overdraft"]));
	$dob=$year."-".$month."-".$day;
	$query=mysql_query("insert into bank_account(fname, sname, dob, gender, tel, email, address, amount, overdraft)
		values('$fname', '$sname', '$dob', '$gender', '$tel', '$email', '$address',
		'$amount', '$overdraft' );",$con) or die(mysql_error());
			 if($query){
			 $query1=mysql_query("select * from bank_account;", $con) or die(mysql_error());
			 $row=mysql_num_rows($query1);
			 echo $row-=1;
			 $id=mysql_result($query1,$row,"account_id");
			$_SESSION["account"]=$id;
			echo $_SESSION["account"];
			header("location: bank_account_success.php");
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