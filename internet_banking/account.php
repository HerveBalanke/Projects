<?php
include('session2.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'/>
<title> Account</title>
<link rel="stylesheet" type="text/css" href="css/account.css" />
</head>
<body>
	<header>
		<nav>
			<a href="account.php" > <li class="bk"> ACCOUNT </li> <a>
			<a href="search.php" > <li class="lg"> SEARCH</li> </a>
		</nav>
	</header>

	<section>
		<h1>Account</h1>
		<form action="account.php" method="POST">
<input type="submit" value="Log out" name="logout" class="lo"/>
			</form>
<?php
	$host="localhost";
	$user="root";
	$con= mysql_connect ($host, $user) or die(mysql_error());
	$db= mysql_select_db("internet_banking", $con);
	$uname= $_SESSION['uname'];
	$query= mysql_fetch_array(mysql_query ("select account_id from user where uname='".$_SESSION['uname']."';", $con));
		$account=$query["account_id"];
	$amount= mysql_fetch_array(mysql_query ("select amount, overdraft from bank_account where account_id='$account' ;", $con));
		echo"<p class='top'> <span style='font-weight:bold;'> Username</span><span class='element1'>"." ".$uname. "</span><br/>";
		echo "<span style='font-weight:bold;'>Account N°</span><span class='element2'>"." ".$account."</span></p>";
	
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

	echo"<form method='POST' action='account.php'class='form'>
		<h2>Transfer</h2>
		<p> <label> Amount </label>
		<input type='number' name='amount' id='amount' class='a' />
		<label> to </label>";
	if(isset($_GET['value'])){ 
		$value=$_GET['value'];
		echo"<input type='text' name='to' id='to' value='$value' placeholder=\"receiver's username\" class='a'/> </p>
		<p><input type='reset' id='cancel' name='cancel' value='Cancel' class='b'/>
		<input type='submit' id='send' name='send' value='Send' class='c'/></p><br/><br/> </form>";
	}else{
		echo"<input type='text' name='to' id='to' placeholder=\"receiver's username\" class='a'/> </p>
		<p><input type='reset' id='cancel' name='cancel' value='Cancel' class='b'/>
		<input type='submit' id='send' name='send' value='Send' class='c'/></p><br/><br/> </form>";
	}

	echo"<form method='POST' action='account.php'> 
		<div class='filter'><label> Filter transactions by: </label><select name='filter' class='s'>
		<option value='date'>Date </option>
		<option value='amount'>Amount </option>
		<option value='recipient'>Recipient </option>
		</select>
		<label> for</label>
		<input type='text' name='for' class='e'/>
		<input type='submit' value= 'Search' name='search' class='f'/> 
		</div>";
	if(isset($_POST['search'])){
		$element1=$_POST['filter'];
		$element2=strtoupper(mysql_real_escape_string($_POST['for']));
		echo "<p class='over'><span style='font-weight:bold;'>Amount GHC </span><span class='element3'>"." ".$amount["amount"]."</span><br/>";
		echo " <span style='font-weight:bold;'>Overdraft GHC </span> <span class='element4'>"." ".$amount["overdraft"]."</span></p>";
	if($element1=='date' && $element2!==""){
		echo "</form>
		<aside><h2 class='h2'>Transactions</h2>
		<div class='tab'><table>
		<thead> 
		<tr>
		<th>Date and Time</th>
		<th>Amount</th>
		<th>Recipient</th>
		</tr>
		</thead>";
		$query=mysql_query("select * from transaction where sender='$account' and date like '$element2%';") or die(mysql_error());
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
					echo"<td>".$ret['date']."</td>";
					echo"<td>".$ret['amount']."</td>";
					echo"<td>".$ret['receiver']."</td>";
					echo"</tr>
					</tbody>";
					}
					ends();
					exit;
	}elseif($element1=='amount' && $element2!==""){
		echo "</form>
		<aside><h2 class='h2'>Transactions</h2>
		<div class='tab'><table>
		<thead> 
		<tr>
		<th>Amount</th>
		<th>Date and Time</th>
		<th>Recipient</th>
		</tr>
		</thead>";
		$query=mysql_query("select * from transaction where sender='$account' and amount like '$element2%';") or die(mysql_error());
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
					echo"<td>".$ret['amount']."</td>";
					echo"<td>".$ret['date']."</td>";
					echo"<td>".$ret['receiver']."</td>";
					echo"</tr>
					</tbody>";
					}
					ends();
					exit;
	}elseif($element1=='recipient' && $element2!==""){
		echo "</form>
		<aside><h2 class='h2'>Transactions</h2>
		<div class='tab'><table>
		<thead> 
		<tr>
		<th>Recipient</th>
		<th>Amount</th>
		<th>Date and Time</th>
		</tr>
		</thead>";
		$query=mysql_query("select * from transaction where sender='$account' and receiver like '$element2%';") or die(mysql_error());
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
				echo"<td>".$ret['receiver']."</td>";
				echo"<td>".$ret['amount']."</td>";
				echo"<td>".$ret['date']."</td>";

				echo"</tr>
				</tbody>";
				}
				ends();
				exit;
	}else{
		echo "</form>
		<aside><h2 class='h2'>Transactions</h2>
		<div class='tab'><table>
		<thead> 
		<tr>
		<th>Date and Time</th>
		<th>Amount</th>
		<th>Recipient</th>
		</tr>
		</thead>";
		if(isset($_SESSION["uname"])){
		$query=mysql_query("select * from transaction where sender='$account';") or die(mysql_error());
		$rows=mysql_num_rows($query);
		for($i=0; $i<$rows; $i++){
		$ret=mysql_fetch_array($query);
		echo "<tbody>
		<tr>";
		echo"<td>".$ret['date']."</td>";
		echo"<td>".$ret['amount']."</td>";
		echo"<td>".$ret['receiver']."</td>";
		echo"</tr>
		</tbody>";
		}
		}
		ends();
		exit;
		}
	echo "</form>";
}
	function display($account, $uname, $account){$amount= mysql_fetch_array(mysql_query ("select amount, overdraft from bank_account where account_id='$account' ;"));
		echo "<p class='over'> <span style='font-weight:bold;'>Amount GHC </span><span class='element3'>"." ".$amount["amount"]."</span><br/>";
		echo " <span style='font-weight:bold;'>Overdraft GHC </span> <span class='element4'>"." ".$amount["overdraft"]."</span></p>";
		echo "
		<aside><h2 class='h2'>Transactions</h2>
		<div class='tab'><table>
		<thead> 
		<tr>
		<th>Date and Time</th>
		<th>Amount</th>
		<th>Recipient</th>
		</tr>
		</thead>";
		if(isset($_SESSION["uname"])){
		$query= mysql_fetch_array(mysql_query ("select account_id from user where uname='$uname';"));
		$query=mysql_query("select * from transaction where sender='$account';") or die(mysql_error());
		$rows=mysql_num_rows($query);
		for($i=0; $i<$rows; $i++){
		$ret=mysql_fetch_array($query);
		echo "<tbody>
		<tr>";
		echo"<td>".$ret['date']."</td>";
		echo"<td>".$ret['amount']."</td>";
		echo"<td>".$ret['receiver']."</td>";
		echo"</tr>
		</tbody>";
		}
		}
		echo"</table> </div>";
		}

	if(isset($_POST["send"])){
		$uname= $_SESSION['uname'];
		$send=$_POST["amount"];
		$to=strtoupper(mysql_real_escape_string($_POST["to"]));
		$query= mysql_fetch_array(mysql_query ("select account_id from user where uname='".$_SESSION['uname']."';", $con));
		$account=$query["account_id"];
		$amount= mysql_fetch_array(mysql_query ("select amount, overdraft from bank_account where account_id='$account' ;", $con));
			if($send<0){
			display($account, $uname, $account);
			echo "<script> alert('INVALID AMOUNT!') </script>";
			ends();
			exit;
			}

			if($amount==0 || $to==""){
			display($account, $uname, $account);
			ends();
			exit;
			}

			if($to==$uname){
			display($account, $uname, $account);
			echo "<script> alert('INVALID RECEIVER!') </script>";
			ends();
			exit;
			}

			if($amount["amount"]-$send>=$amount["overdraft"]){
				$uamount=$amount["amount"]-$send;
				$update=mysql_query("update bank_account set amount='$uamount' where account_id='$account';", $con) or die (mysql_error());
				$inquery=mysql_fetch_array(mysql_query("select account_id from user where uname='$to';", $con)) or die(mysql_error());
				$inquery=$inquery["account_id"];
				$query=mysql_fetch_array(mysql_query("select amount from bank_account where account_id='$inquery';", $con)) or die (mysql_error());
				$add=$query["amount"]+$send;
				$update1= mysql_query("update bank_account set amount='$add' where account_id='$inquery';", $con) or die (mysql_error());
				echo "<p class='success'>Transaction successfull ! </p>";
				$save=mysql_query("insert into transaction (sender, amount, receiver, date) 
				values ('$account', '$send', '$to', NOW());", $con) or die (mysql_error());
			}else{
				echo "<script> alert('SORRY YOU DO NOT HAVE ENOUGH FUNDS TO COMPLETE THIS TRANSACTION !') </script>";
				}
				}
		
	display($account, $uname, $account);
	ends();
?>

	</section>

<footer>
<h5> &copy; Copyright JOSEPH HERVE BALANKE 2014 </h5>
</footer>

</body>
</html>