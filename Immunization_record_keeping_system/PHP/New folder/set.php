<?php 
						try{
							$con=new PDO("mysql:host=localhost", "root");
							}catch (PDOexception $e){
							die( 'ERROR:'.$e->getMessage());
							}
							
							if(isset($_POST["submit"])){
							$db=$con->query("create database if not exists FVC");
							
							if($db){
							
							$con=NULL;
							}
							
							try{
							$cons= new PDO("mysql:host=localhost; dbname=FVC", 'root');
							}catch(PDOexception $e){
							die('ERROR:'.$e->getMessage());
							}
							
							$admin=$cons->query("create table if not exists admin(
												aid int(11) not null primary key auto_increment,
												fname character(30) not null,
												lname character(30) not null,
												dob date not null,
												email varchar(50)not null,
												tel int(11) not null,
												stname varchar(30) not null,
												hsenumber varchar(10) not null,
												city varchar(30) not null
												)") or (print_r($cons->errorInfo()));
												
							$adminac=$cons->query("create table if not exists admin_ac(
													aacid int(11) not null primary key auto_increment,
													uname character(30) not null,
													pass varchar(300) not null,
													aid int(11) not null,
													foreign key(aid) references admin(aid))") or (print_r($cons->errorInfo()));
							
							$nurse=$cons->query("create table if not exists nurse(
												nid int(11) not null primary key auto_increment,
												fname character(30) not null,
												lname character(30) not null,
												dob date not null,
												email varchar(50)not null,
												tel int(11) not null,
												stname varchar(30) not null,
												hsenumber varchar(10) not null,
												city varchar(30) not null
												)") or (print_r($cons->errorInfo()));
												
							$nurseac=$cons->query("create table if not exists nurse_ac(
													nacid int(11) not null primary key auto_increment,
													uname character(30) not null,
													pass varchar(300) not null,
													nid int(11) not null,
													foreign key(nid) references nurse(nid))") or (print_r($cons->errorInfo()));
													
							$vaccine=$cons->query("create table if not exists vaccine(
													vcode varchar(10) not null primary key,
													vname varchar(30) not null,
													nos int(3) not null,
													vinterval int(3) not null,
													vprice int(11) not null,
													vduration varchar(15) not null)") or (print_r($cons->errorInfo()));
							
							$stock_in=$cons->query("create table if not exists stock_in(
													stid int(11) not null primary key auto_increment,
													vcode varchar(10) not null, 
													qty int(11) not null,
													date date not null,
													foreign key(vcode) references vaccine(vcode))") or (print_r($cons->errorInfo()));
													
							$dose=$cons->query("create table if not exists dose(
												did int(5) not null primary key,
												dose varchar(10) not null)") or (print_r($cons->errorInfo()));
												
							$patient=$cons->query("create table if not exists patient(
													pid int(11) not null primary key auto_increment,
													fname character(30) not null,
													lname character(30) not null,
													gender character(1) not null,
													dob date not null,
													email varchar(50)not null,
													tel int(11) not null,
													stname varchar(30) not null,
													hsenumber varchar(10) not null,
													city varchar(30) not null)") or (print_r($cons->errorInfo()));
											
							$vaccination=$cons->query("create table if not exists vaccination(
													vid int(11) not null primary key auto_increment,
													vcode varchar(10) not null,
													patient int(11) not null,
													nurse_ac int(11) not null,
													dose int(11) not null,
													dates date not null,
													foreign key (vcode) references vaccine(vcode),
													foreign key (patient) references patient(pid),
													foreign key(nurse_ac) references nurse_ac(nacid),
													foreign key(dose) references dose(did)
													)") or (print_r($cons->errorInfo()));
													
							$appointment=$cons->query("create table if not exists appointment(
														apid int(11) not null primary key auto_increment,
														dates date not null,
														vaccination int(11) not null,
														foreign key(vaccination) references vaccination(vid)
														)") or (print_r($cons->errorInfo()));
														
							$sms=$cons->query("create table if not exists message(
											sid int(11) not null primary key auto_increment,
											patient int(11) not null,
											appointment int(11) not null,
											dates date not null,
											foreign key(patient) references patient(pid),
											foreign key(appointment) references appointment(apid))") or (print_r($cons->errorInfo()));
											
											
									
							}
							
					?>