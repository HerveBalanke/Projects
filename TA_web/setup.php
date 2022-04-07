<!DOCTYPE html>
<html>

	<head>
		
			  <meta charset="UTF-8">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <meta name="description" content="">

			    <meta charset="utf-8">
    		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   			 <meta name="viewport" content="width=device-width, initial-scale=1">
   			 <title> TA Manager</title>
   			 <link href="../Lib_bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
			  
	</head>
		
	<body>	


					<div class="section">
			      <div class="container">
			        <div class="row">
			          <div class="col-md-12">
			          			<div class="panel panel-warning">
  										<div class="panel-heading"> Set up TA Web Database System</div>
  										<div class="panel-body">

  												 <form role="form" action="setup.php" method="POST">
													  <div class="form-group">
													  <button type="submit" name="submit" id="submit" class="btn btn-default">Set Up</button>

													  <?php 
						try{
							$con=new PDO("mysql:host=localhost", "root");
							}catch (PDOexception $e){
							die( 'ERROR:'.$e->getMessage());
							}
							
							if(isset($_POST["submit"])){
							$db=$con->query("create database if not exists TA_Web");
							
							if($db){
							
							$con=NULL;
							}
							
							try{
							$cons= new PDO("mysql:host=localhost; dbname=TA_Web", 'root');
							}catch(PDOexception $e){
							die('ERROR:'.$e->getMessage());
							}


							$galerie=$cons->query("create table if not exists galerie(
													gid int(11) not null primary key auto_increment,
													titre varchar(50) not null,
													lien varchar(100) not null
													);") or die (print_r($cons->errorInfo()));


							$documents=$cons->query("create table if not exists documents(
													did int(11) not null primary key auto_increment,
													date varchar(50) not null,
													titre varchar(50) not null,
													lien varchar(100) not null
													);") or die (print_r($cons->errorInfo()));

							$audios=$cons->query("create table if not exists audios(
													aid int(11) not null primary key auto_increment,
													date varchar(50) not null,
													titre varchar(50) not null,
													lien varchar(100) not null
													);") or die(print_r($cons->errorInfo()));

							$affiches=$cons->query("create table if not exists affiches(
													afid int(11) not null primary key auto_increment,
													titre varchar(50) not null,
													theme varchar(50) not null,
													description varchar(255) not null,
													date varchar(50) not null,
													heure varchar(50) not null,
													lien varchar(100) not null
													);") or die(print_r($cons->errorInfo()));

							$newletter=$cons->query("create table if not exists newletter(
													nid int(11) not null primary key auto_increment,
													nom varchar(50) not null,
													email varchar(50) not null
													);") or die(print_r($cons->errorInfo()));
										
									
							}
							
					?>
	
														</form>

				<script src="../Lib_bootstrap/docs/assets/js/vendor/jquery.min.js"></script>
				<script src="../Lib_bootstrap/js/bootstrap.min.js"></script>

				
	</body>
</html>