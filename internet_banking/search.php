<?php
include('session2.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'/>
<title> Account</title>
<link rel="stylesheet" type="text/css" href="css/search.css" />
</head>
<body>
	<header>
		<nav>
			<a href="account.php" class='n'> <li class="bk">  ACCOUNT </li> <a>
			<a href="search.php" class='n'> <li class="lg"> SEARCH</li> </a>
		</nav>
	</header>

	<section>
	<h1>SEARCH FOR USERS</h1> <br/>
	<form action="search.php" method="POST">
<input type="submit" value="Log out" name="logout" class="lo"/>
			</form>
<?php
	$host="localhost";
	$user="root";
	$con= mysql_connect ($host, $user) or die(mysql_error());
	$db= mysql_select_db("internet_banking", $con);
	$uname= $_SESSION["uname"];
	$query= mysql_fetch_array(mysql_query ("select account_id from user where uname='".$_SESSION["uname"]."';", $con));
	$account=$query["account_id"];
	$amount= mysql_fetch_array(mysql_query ("select amount, overdraft from bank_account where account_id='$account' ;", $con));
		echo"<p class='top'> <span style='font-weight:bold;'> Username</span><span class='element1'>"." ".$_SESSION["uname"]."</span><br/>";
		echo "<span style='font-weight:bold;'>Account N°</span><span class='element2'>"." ".$account."</span><br/>";
		echo "<span style='font-weight:bold;'>Amount GHC </span><span class='element3'>"." ".$amount["amount"]."</span><br/>";
	echo " <span style='font-weight:bold;'>Overdraft GHC </span> <span class='element4'>"." ".$amount["overdraft"]."</span></p>";

	if (isset($_POST['logout'])){
	session_destroy ();
	header('location:index.php');
	exit();
	}
	
	function ends(){ echo"</table> </div>
		</section>
		<footer>
		<h5> &copy; Copyright JOSEPH HERVE BALANKE 2014 </h5>
		</footer>
		</body>
		</html>";
}

	echo"<form method='POST' action='search.php'>
		<div class='filter'> <label>Search by: </label> <select name='filter'  class='s'>
		<option value='firstname'>Firstname</option>
		<option value='sirname'>Sirname </option>
		<option value='username'>Username </option>
		</select>
		<label> for</label>
		<input type='text' name= 'for' class='e'/>
		<input type='submit' value= 'Search' name='search' class='f'/>
		</div>";

	if(isset($_POST['search'])){
		$element1=$_POST['filter'];
		$element2=strtoupper(mysql_real_escape_string($_POST['for']));
		if($element1=='firstname' && $element2!==""){
			echo "</form>
			<aside>
			<div class='tab'> <table>
			<thead> 
			<tr>
			<th>Firstname</th>
			<th>Sirname</th>
			<th>Username</th>
			</tr>
			</thead>";
			$query=mysql_query("select bank_account.fname, bank_account.sname, user.uname from bank_account right join user on bank_account.account_id= user.account_id where fname like '$element2%';") or die(mysql_error());
			$rows=mysql_num_rows($query);
			if($rows==0){
			echo"<tbody>
			<tr> <td> No record found ! </td>
			<td> No record found ! </td>
			<td> No record found ! </td> </tr>
			</tbody>";
			ends();
			exit;
			}
			for($i=0; $i<$rows; $i++){
			$ret=mysql_fetch_array($query);
			echo "<tbody>
			<tr>";
			echo"<td>".$ret['fname']."</td>";
			echo"<td>".$ret['sname']."</td>";
			echo"<td> <a href='account.php?value=".$ret['uname']."'>".$ret['uname']." </a></td>";
			echo"</tr>
			</tbody>";
			}
			ends();
			exit;
		}elseif($element1=='sirname' && $element2!==""){
			echo "</form>
			<aside>
			<div class='tab'> <table>
			<thead> 
			<tr>
			<th>Sirname</th>
			<th>Firstname</th>
			<th>Username</th>
			</tr>
			</thead>";
			$query=mysql_query("select bank_account.fname, bank_account.sname, user.uname from bank_account right join user on bank_account.account_id= user.account_id where sname like '$element2%';") or die(mysql_error());
			$rows=mysql_num_rows($query);
			if($rows==0){
			echo"<tbody>
			<tr> <td> No record found ! </td>
			<td> No record found ! </td>
			<td> No record found ! </td> </tr>
			</tbody>";
			ends();
			exit;
			}
			for($i=0; $i<$rows; $i++){
			$ret=mysql_fetch_array($query);
			echo "<tbody>
			<tr>";
			echo"<td>".$ret['sname']."</td>";
			echo"<td>".$ret['fname']."</td>";
			echo"<td> <a href='account.php?value=".$ret['uname']."'>".$ret['uname']." </a></td>";
			echo"</tr>
			</tbody>";
			}
			ends();
			exit;
		}elseif($element1=='username' && $element2!==""){
			echo "</form>
			<aside>
			<div class='tab'> <table>
			<thead> 
			<tr>
			<th>Username</th>
			<th>Firstname</th>
			<th>Sirname</th>
			</tr>
			</thead>";
			$query=mysql_query("select bank_account.fname, bank_account.sname, user.uname from bank_account right join user on bank_account.account_id= user.account_id where uname like '$element2%';") or die(mysql_error());
			$rows=mysql_num_rows($query);
			if($rows==0){
			echo"<tbody>
			<tr> <td> No record found ! </td>
			<td> No record found ! </td>
			<td> No record found ! </td> </tr>
			</tbody>";
			ends();
			exit;
			}
			for($i=0; $i<$rows; $i++){
			$ret=mysql_fetch_array($query);
			echo "<tbody>
			<tr>";
			echo"<td> <a href='account.php?value=".$ret['uname']."'>".$ret['uname']." </a></td>";
			echo"<td>".$ret['fname']."</td>";
			echo"<td>".$ret['sname']."</td>";
			echo"</tr>
			</tbody>";
			}
			ends();
			exit;
		}else{
			echo "</form>
			<aside>
			<div class='tab'> <table>
			<thead> 
			<tr>
			<th>Firstname</th>
			<th>Sirname</th>
			<th>Username</th>
			</tr>
			</thead>";
			if(isset($_SESSION["uname"])){
			$query=mysql_query("select bank_account.fname, bank_account.sname, user.uname from bank_account right join user on bank_account.account_id= user.account_id;") or die(mysql_error());
			$rows=mysql_num_rows($query);
			if($rows==0){
			echo"<tbody>
			<tr> <td> No record found ! </td>
			<td> No record found ! </td>
			<td> No record found ! </td> </tr>
			</tbody>";
			ends();
			exit;
			}
			for($i=0; $i<$rows; $i++){
			$ret=mysql_fetch_array($query);
			echo "<tbody>
			<tr>";
			echo"<td>".$ret['fname']."</td>";
			echo"<td>".$ret['sname']."</td>";
			echo"<td> <a href='account.php?value=".$ret['uname']."'>".$ret['uname']." </a></td>";
			echo"</tr>
			</tbody>";
			}
			ends();
			exit;
			}
			}
	}else{
		echo "</form>
		<aside>
		<div class='tab'> <table>
		<thead> 
		<tr>
		<th>Firstname</th>
		<th>Sirname</th>
		<th>Username</th>
		</tr>
		</thead>";
		if(isset($_SESSION["uname"])){
		$query=mysql_query("select bank_account.fname, bank_account.sname, user.uname from bank_account right join user on bank_account.account_id= user.account_id ;") or die(mysql_error());
		$rows=mysql_num_rows($query);
		if($rows==0){
		echo"<tbody>
		<tr> <td> No record found ! </td>
		<td> No record found ! </td>
		<td> No record found ! </td> </tr>
		</tbody>";
		ends();
		exit;
		}
		for($i=0; $i<$rows; $i++){
		$ret=mysql_fetch_array($query);
		echo "<tbody>
		<tr>";
		echo"<td>".$ret['fname']."</td>";
		echo"<td>".$ret['sname']."</td>";
		echo"<td> <a href='account.php?value=".$ret['uname']."'>".$ret['uname']."</a></td>";
		echo"</tr>
		</tbody>";
		}
		ends();
		exit;
		}
	}
?>
	
	</section>

	<footer>
		<h5> &copy; Copyright JOSEPH HERVE BALANKE 2014 </h5>
	</footer>

</body>
</html>


