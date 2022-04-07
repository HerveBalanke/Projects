<!DOCTYPE html>
<html>

	<head>
		<title> FVC </title>
		<meta charset utf='8'/>
		<link type="text/css" rel="stylesheet" href="">
		
		
	</head>
		
	<body>	
		<section> 
			<form action="setup.php" method="POST"/>
				<p> Set up FIIS Database System</p> </br>
				<input type="submit" name="submit" id="submit" value="Set Up" />
				
				
					<?php 
						try{
							$con=new PDO("mysql:host=localhost", "root");
							}catch (PDOexception $e){
							die( 'ERROR:'.$e->getMessage());
							}
							
							if(isset($_POST["submit"])){
							$db=$con->query("create database if not exists FIIS");
							
							if($db){
							
							$con=NULL;
							}
							
							try{
							$cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
							}catch(PDOexception $e){
							die('ERROR:'.$e->getMessage());
							}
							
							$admin=$cons->query("create table if not exists admin(
												aid int(11) not null primary key auto_increment,
												fname character(30) not null,
												lname character(30) not null,
												email varchar(50)not null,
												tel int(11) not null,
												address varchar(30) not null,
												uname character(30) not null,
												pass varchar(300) not null
												);") or (print_r($cons->errorInfo()));

							$query=$cons->query("insert into admin(fname, lname, email, tel, address, uname, pass)
								values('adminfname', 'adminlname', 'admin@gmail.com', '01234567890', 'admin address', 'administrator', 'adminpass') ");

							$user=$cons->query("create table if not exists user(
												uid int(11) not null primary key auto_increment,
												fname character(30) not null,
												lname character(30) not null,
												dob date not null,
												gender character(1) not null,
												email varchar(50)not null,
												tel int(11) not null,
												address varchar(30) not null,
												uname character(30) not null,
												pass varchar(300) not null
												);") or (print_r($cons->errorInfo()));

							$query=$cons->query("insert into user(fname, lname, email, tel, address, uname, pass)
								values('userfname', 'userlname', 'user@gmail.com', '01234567890', 'user address', 'registrar', 'registrarpass') ");
												
							
							$nurse=$cons->query("create table if not exists nurse(
												nid int(11) not null primary key auto_increment,
												fname character(30) not null,
												lname character(30) not null,
												uname varchar(30) not null,
												pass varchar(300) not null,
												dob date not null,
												gender character(1) not null,
												email varchar(50) not null,
												tel int(11) not null,
												address varchar(50) not null
												
												);") or (print_r($cons->errorInfo()));
												
							/*$quantity=$cons->query("create table if not exists nurse_ac(
													nacid int(11) not null primary key auto_increment,
													uname character(30) not null,
													pass varchar(300) not null,
													nid int(11) not null,
													foreign key(nid) references nurse(nid));") or (print_r($cons->errorInfo()));*/
													
							$vaccine=$cons->query("create table if not exists vaccine(
													vid int(11) not null primary key auto_increment,
													vcode varchar(10) not null unique,
													vname varchar(30) not null,
													nod int(3) not null,
													vprice int(11) not null,
													ad_length varchar(30) not null,
													manufacturer varchar(30) not null,
													manuemail varchar(30) not null
													);") or (print_r($cons->errorInfo()));
							
							$quantity=$cons->query("create table if not exists quantity(
													qid int(11) not null primary key auto_increment,
													vcode varchar(10) not null, 
													qty int(11) default 0,
													dates timestamp default current_timestamp,
													foreign key(vcode) references vaccine(vcode) ON DELETE CASCADE 
													ON UPDATE CASCADE);") or (print_r($cons->errorInfo()));
													
							/*$dose=$cons->query("create table if not exists dose(
												did int(5) not null primary key,
												dose varchar(10) not null)") or (print_r($cons->errorInfo()));*/
												
							$patient=$cons->query("create table if not exists patient(
													pid int(11) not null primary key auto_increment,
													fname character(30) not null,
													lname character(30) not null,
													gender character(1) not null,
													dob date not null,
													email varchar(50)not null,
													tel int(11) not null,
													address varchar(30) not null);") or (print_r($cons->errorInfo()));
						$update=$cons->query("alter table patient auto_increment=100000;");
											
							$vaccination=$cons->query("create table if not exists vaccination(
													vid int(11) not null primary key auto_increment,
													vcode varchar(10) not null,
													patient int(11) not null,
													nurse varchar(30) not null,
													dates date not null,
													foreign key (vcode) references vaccine(vcode) ON DELETE CASCADE 
													ON UPDATE CASCADE, 
													foreign key (patient) references patient(pid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));
													
							$appointment=$cons->query("create table if not exists appointment(
														apid int(11) not null primary key auto_increment,
														dates date not null,
														vaccination int(11) not null,
														patient int(11) not null,
														dose_left int(11) not null,
														status varchar(30) not null,
														foreign key(patient) references patient(pid) ON DELETE CASCADE 
													ON UPDATE CASCADE,
														foreign key(vaccination) references vaccination(vid) ON DELETE CASCADE 
													ON UPDATE CASCADE
														);") or (print_r($cons->errorInfo()));
														
							$quantity2=$cons->query("create table if not exists quantity_invt(
													qid int(11) not null primary key auto_increment,
													vcode varchar(10) not null, 
													qty int(11) default 0,
													dates date not null,
													agent varchar(72) not null,
													foreign key(vcode) references vaccine(vcode) ON DELETE CASCADE 
													ON UPDATE CASCADE);") or (print_r($cons->errorInfo()));

							$message=$cons->query("create table message(
    												 mid int(11) primary key auto_increment,
    												 vcode varchar(30) not null,
     												dates date not null,
    												manuemail varchar(30) not null);") or (print_r($cons->errorInfo()));
											
							if($admin && $user && $nurse &&  $vaccine && $quantity && $patient && $vaccination && $appointment && $quantity2 && $message){
							
								echo "<a href=index.php> Continue to FIIS </a>";
							}				
									
							}
							
					?>
	
		</form>

	</section>


	</body>
</html>