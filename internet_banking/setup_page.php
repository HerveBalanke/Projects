<html>
<head>
<meta charset='utf-8'/>
<link rel="stylesheet" type="text/css" href="css/index.css" />
<title>Setup page</title>
</head>

<body>
<?php
$host="localhost";
$user="root";
$con= mysql_connect($host, $user) or die (mysql_error());

$database=mysql_query("create database if not exists internet_banking;", $con);
if($database){
echo "<p>Table DATABASE created </p><br/>";
}				
else{
die (mysql_error());
exit;
}

$db=mysql_select_db("internet_banking", $con);

$tbank_a= mysql_query("create table if not exists bank_account (
						account_id int(10) primary key not null auto_increment ,
						fname char(50) not null,
						sname char(50) not null,
						dob date not null,
						gender char(1) not null,
						tel integer(10) not null,
						email varchar(50) not null,
						address varchar(50) not null,
						amount int(15) not null ,
						overdraft int(10) not null);", $con);
if($tbank_a){
echo "<p>Table BANK ACCOUNT created </p><br/>";
}				
else{
die (mysql_error());
exit;
}
mysql_query("alter table bank_account auto_increment=1000000000;", $con);
 		
$tuser= mysql_query("create table if not exists user(
						uname varchar(20) primary key not null ,
						account_id int(10) not null unique,
						email varchar(50) not null unique,
						password varchar(20) not null,
						security1 varchar(2) not null,
						answer1 varchar(50) not null,
						security2 varchar(2) not null,
						answer2 varchar(50) not null,
						security3 varchar(2) not null,
						answer3 varchar(50) not null,
						attemps int(5) not null,
						foreign key (account_id) references bank_account(account_id));",$con);
if($tuser){
echo "<p>Table USER created </p><br/>";
}
else{
die (mysql_error());
exit;
}						
						
$tusecurity= mysql_query("create table if not exists security (
						sid int(2) primary key not null auto_increment,
						security varchar(50) not null);",$con);
						
mysql_query("insert into security (security) values ('What is your level of education?');", $con);
mysql_query("insert into security (security) values ('What is your favourite module?');", $con);
mysql_query("insert into security (security) values ('What was the name of your primary school?');", $con);
mysql_query("insert into security (security) values ('What is your favourite sport?');", $con);
mysql_query("insert into security (security) values ('What is the name of your favourite team?');", $con);
mysql_query("insert into security (security) values ('What is your favourite competion?');", $con);
mysql_query("insert into security (security) values ('What is your favourite activity?');", $con);
mysql_query("insert into security (security) values ('What is your dream?');", $con);
mysql_query("insert into security (security) values ('What is your type of companion?');", $con);

if($tusecurity){
echo "<p>Table SECURITY  created </p><br/>";
}				
else{
die (mysql_error());
exit;
}
$tinstant= mysql_query("create table if not exists instant(
                        iid int primary key not null auto_increment,
						account_id int(10) not null,
						instant int not null,
						foreign key (account_id) references bank_account(account_id));",$con);
if($tinstant){
echo "<p>Table INSTANT QUESTION  created</p> <br/>";
}				
else{
die (mysql_error());
exit;
}

$ttrans= mysql_query("create table if not exists transaction (
						tid int primary key not null auto_increment,
						sender int(10) not null,
						amount int(15) not null,
						receiver varchar(20) not null,
						date datetime not null,
						foreign key (sender) references bank_account(account_id),
						foreign key (receiver) references user(uname));", $con);
if ($ttrans){
echo "<p>Table TRANSACTION created </p><br/>";
}
else{
die (mysql_error());
exit;
}
echo " <p>DATABASE and TABLES created successfully! </p>";
echo " <a href='index.php'>eBanking</a>!";		
?>
<footer>
<h5> &copy; Copyright JOSEPH HERVE BALANKE 2014 </h5>
</footer>
</body>

</html>