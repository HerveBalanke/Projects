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
  										<div class="panel-heading"> Set up TA Manager Database System</div>
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
							$db=$con->query("create database if not exists TA_Manager");
							
							if($db){
							
							$con=NULL;
							}
							
							try{
							$cons= new PDO("mysql:host=localhost; dbname=TA_Manager", 'root');
							}catch(PDOexception $e){
							die('ERROR:'.$e->getMessage());
							}


							$niveau=$cons->query("create table if not exists niveau(
													niid int(11) not null primary key auto_increment,
													niveau varchar(30) not null
													);") or (print_r($cons->errorInfo()));
							$query=$cons->query("insert into niveau(niveau)
								values  ('Usher'),
										('Secretaire'),
										('Administrateur'),
										('Pasteur'),
										('Tresorier'),
										('Responsable de Departement')
										") or (print_r($cons->errorInfo()));

							$departement=$cons->query("create table if not exists departement(
													deptid int(11) not null primary key auto_increment,
													departement varchar(30) not null
													);") or (print_r($cons->errorInfo()));

							$query=$cons->query("insert into departement(departement)
								values  ('Finances'),
										('Porteur de joie')") or (print_r($cons->errorInfo()));

							$pasteur_p=$cons->query("create table if not exists pasteur_p(
												ppid int(11) not null primary key auto_increment,
												nom varchar(30) not null,
												prenom varchar(50) not null,
												dob date not null,
												genre character(1) not null,
												pays character(5) not null,
												email varchar(50)not null,
												codetel varchar(10) not null,
												tel varchar(10) not null,
												address varchar(30) not null,
												codewhat varchar(10) not null,
												whatsapp varchar(10) not null,
												facebook varchar(30) not null,
												niveau int(11) not null,
												profession int(11) not null,
												photo varchar(255) not null,
												uname varchar(30) not null unique,
												pass varchar(300) not null,
												foreign key(niveau) references niveau(niid) ON DELETE CASCADE 
												ON UPDATE CASCADE
												);") or (print_r($cons->errorInfo()));

							

							 
							
							$branche=$cons->query("create table if not exists branche(
												bid int(11) not null primary key auto_increment,
												branche varchar(30) not null
												);") or (print_r($cons->errorInfo()));

							$query=$cons->query("insert into branche(branche)
								values  ('Tantra Blue Gate'),
										('Aladjo');
										")or (print_r($cons->errorInfo()));;

							$evenement=$cons->query("create table if not exists evenement(
												eid int(11) not null primary key auto_increment,
												evenement varchar(30) not null
												);") or (print_r($cons->errorInfo()));

							$query=$cons->query("insert into evenement(evenement)
								values  ('Culte de L\'Alliance'),
										('Banquet de la Parole'),
										('Vendredi Miracle'),
										('SMART'),
										('Veilée de priere');
										")or (print_r($cons->errorInfo()));;

							
						
							/*$pays=$cons->query("create table if not exists pays(
													paid int(11) not null primary key auto_increment,
													pays varchar(10) not null, 
													photo blob null
													);") or (print_r($cons->errorInfo()));*/
													
							$profession=$cons->query("create table if not exists profession(
												pid int(11) not null primary key auto_increment,
												profession varchar(30) not null);") or (print_r($cons->errorInfo()));

							$query=$cons->query("insert into profession (profession)
								values  ('Etudiant(e)'),
										('Engenieur'),
										('Enseignant'),
										('Comptable'),
										('Journaliste'),
										('Medecin'),
										('Restaurateur(trice)'),
										('Pasteur'),
										('RAS')
										;") or (print_r($cons->errorInfo()));

												
							$filiere=$cons->query("create table if not exists filiere(
													fid int(11) not null primary key auto_increment,
													filiere varchar(30) not null
													);") or (print_r($cons->errorInfo()));

							$query=$cons->query("insert into filiere(filiere)
								values  ('Accounting'),
										('Business Administration'),
										('Finance'),
										('Information Technology'),
										('Computer Science'),
										('Computer Engineering'),
										('Oil & Gas'),
										('Journalism'),
										('Environment'),
										('RAS')
										;") or (print_r($cons->errorInfo()));
											
							$ecole=$cons->query("create table if not exists ecole(
													eid int(11) not null primary key auto_increment,
													ecole varchar(65) not null
													);") or (print_r($cons->errorInfo()));

							$query=$cons->query("insert into ecole(ecole)
								values  ('Ghana Institute of Management and Public Administration (GIMPA)'),
										('Kwame Nkrumah University of Science and Technology'),
										('University of Education'),
										('University for Development Studies'),
										('University of Cape Coast'),
										('University of Energy and Natural Resources'),
										('University of Ghana'),
										('University of Health and Allied Science'),
										('University of Mines and Technology'),
										('University of Professional Studies (UPSA)'),
										('City of London Business College'),
										('Concord Business College'),
										('Ghana Insurance College'),
										('Institute of Business Management & Journalism(IBM&J)'),
										('Intercom Programming and Manufacturing Company (Ltd.) [IPMC]'),
										('Marysons College'),
										('Principals College'),
										('Springs College'),
										('Trans Africa College'),
										('RAS');
										") or (print_r($cons->errorInfo()));
														
							$eglise=$cons->query("create table if not exists eglise(
													egid int(11) not null primary key auto_increment,
													eglise varchar(60) not null 
													);") or (print_r($cons->errorInfo()));

							$query=$cons->query("insert into eglise(eglise)
								values  ('Lighthouse Chapel Int.'),
										('Word Miracle Church Int.'),
										('The Apostolic Church - Ghana'),
										('International Central Gospel Church (ICGC)'),
										('Presbyterian Church Of Ghana'),
										('Christ Embassy'),
										('Methodist Church of Ghana'),
										('Action Chapel Int.'),
										('Perez Chapel Int.'),
										('RAS');
										") or (print_r($cons->errorInfo()));

							$activite=$cons->query("create table activite(
    												 acid int(11) primary key auto_increment,
    												 activite varchar(30) not null
     												);") or (print_r($cons->errorInfo()));

							$query=$cons->query("insert into activite(activite)
								values  ('Choriste'),
										('Usher'),
										('Intercesseur'),
										('Administrateur'),
										('Ouvrier'),
										('Evangeliste'),
										('RAS');
										") or (print_r($cons->errorInfo()));

							$activite_ac=$cons->query("create table activite_ac(
    												 acaid int(11) primary key auto_increment,
    												 activite_ac varchar(30) not null
     												);") or (print_r($cons->errorInfo()));

							$query=$cons->query("insert into activite_ac(activite_ac)
								values  ('Choriste'),
										('Usher'),
										('Intercesseur'),
										('Administrateur'),
										('Evangelisation'),
										('RAS');
										") or (print_r($cons->errorInfo()));

							$relation=$cons->query("create table relation(
    												 rid int(11) primary key auto_increment,
    												 relation character(30) not null
     												);") or (print_r($cons->errorInfo()));

							$query=$cons->query("insert into relation(relation)
								values  ('Père'),
										('Mère'),
										('Oncle'),
										('Tante'),
										('Frère'),
										('Soeur'),
										('Cousin(e)'),
										('Collègue'),
										('Ami(e)');
										") or (print_r($cons->errorInfo()));

							$urgence=$cons->query("create table if not exists urgence(
													uid int(11) not null primary key auto_increment,
													nom_ur varchar(30) not null,
													prenom_ur varchar(30) not null,
													codetel_ur varchar(10) not null, 
													tel_ur varchar(16) not null,
													email_ur varchar(30) not null,
													relation int(11) not null,
													foreign key(relation) references relation(rid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));

							$info_spi=$cons->query("create table if not exists info_spi(
													isid int(11) not null primary key auto_increment,
													temps varchar(30) not null, 
													a_eglise int(11) not null,
													bapt_immersion character(3) not null,
													ae_activite int(11) not null,
													foreign key(a_eglise) references eglise(egid) ON DELETE CASCADE 
													ON UPDATE CASCADE,
													foreign key(ae_activite) references activite(acid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));

							$t_membre=$cons->query("create table t_membre(
    												 tmid int(11) primary key auto_increment,
    												 type character(30) not null
     												);") or (print_r($cons->errorInfo()));

							$query=$cons->query("insert into t_membre(type)
								values  ('Foule'),
										('Membre'),
										('Disciple'),
										('Disciple Engagé(e)'),
										('Ministre');
										") or (print_r($cons->errorInfo()));

							$membre=$cons->query("create table membre(
													id int(11) not null primary key auto_increment,
													mid varchar(30) not null unique,
													qr_code varchar(150) not null,
													pass varchar(30) not null unique,
													nom varchar(30) not null,
													prenom varchar(60) not null,
													genre character(1) not null,
													dob date not null,
													photo varchar(255) not null,
													t_membre int(11) not null,
													nbre_denfant int(11) not null,
													pays character(5) not null,
													profession int(11) not null,
													filiere int(11) not null,
													ecole int(11) not null,
													sit_mat varchar(30) not null,
													codetel varchar(10) not null,
													tel varchar(10) not null,
													codewhat varchar(10) not null,
													whatsapp varchar(10) not null,
													email varchar(30) not null,
													facebook varchar(30) not null,
													address varchar(60) not null,
													activite_ac int(11) not null,
													info_spi int(11) not null,
													per_urgence int(11) not null,
													date_adhesion date not null,
													branche int(11) not null,
													statut varchar(30) not null,
													foreign key(t_membre) references t_membre(tmid) ON DELETE CASCADE 
													ON UPDATE CASCADE,
													foreign key(profession) references profession(pid) ON DELETE CASCADE 
													ON UPDATE CASCADE,
													foreign key(filiere) references filiere(fid) ON DELETE CASCADE 
													ON UPDATE CASCADE,
													foreign key(ecole) references ecole(eid) ON DELETE CASCADE 
													ON UPDATE CASCADE,
													foreign key(activite_ac) references activite_ac(acaid) ON DELETE CASCADE 
													ON UPDATE CASCADE,
													foreign key(info_spi) references info_spi(isid) ON DELETE CASCADE 
													ON UPDATE CASCADE,
													foreign key(per_urgence) references urgence(uid) ON DELETE CASCADE 
													ON UPDATE CASCADE,
													foreign key(branche) references branche(bid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));

							// $update=$cons->query("alter table membre auto_increment=100;") or (print_r($cons->errorInfo()));

							$progression=$cons->query("create table if not exists progression(
													prid int(11) not null primary key auto_increment,
													date date not null,
													status int(11) not null,
													membre varchar(11) not null,
													foreign key(status) references t_membre(tmid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));

							$groupe=$cons->query("create table if not exists groupe(
													gid int(11) not null primary key auto_increment,
													groupe character(30) not null,
													leader varchar(30) not null,
													branche int(11) not null,
													foreign key(branche) references branche(bid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));		

							$groupe_membre=$cons->query("create table if not exists grou_mem(
													gid int(11) not null,
													membre varchar(30) not null,
													foreign key(gid) references groupe(gid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));	

							$sms=$cons->query("create table if not exists sms(
													sid int(11) not null primary key auto_increment,
													sms varchar(225) not null,
													date date not null,
													branche int(11) not null,
													foreign key(branche) references branche(bid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));

							$sms_envoi=$cons->query("create table if not exists sms_envoi(
													smsid int(11) not null,
													tel int(16) not null
													);") or (print_r($cons->errorInfo()));

							$email=$cons->query("create table if not exists email(
													emid int(11) not null primary key auto_increment,
													entete varchar(100) null,
													text varchar(225) not null,
													date date not null,
													branche int(11) not null,
													foreign key(branche) references branche(bid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));

							$email_envoi=$cons->query("create table if not exists email_envoi(
													emailid int(11) not null,
													address varchar(30) not null
													);") or (print_r($cons->errorInfo()));

							$utilisateur=$cons->query("create table if not exists utilisateur(
												uid int(11) not null primary key auto_increment,
												nom varchar(30) not null,
												prenom varchar(60) not null,
												dob date not null,
												genre character(1) not null,
												pays character(5) not null,
												email varchar(50)not null,
												codetel varchar(10) not null,
												tel varchar(10) not null,
												address varchar(60) not null,
												codewhat varchar(10) not null,
												whatsapp varchar(10) not null,
												facebook varchar(30) not null,
												niveau int(11) not null,
												departement varchar(10) not null,
												profession int(11) not null,
												photo varchar(255) not null,
												uname varchar(30) not null unique,
												pass varchar(300) not null,
												branche int(11) not null,
												desactivate varchar(5) DEFAULT 'off',
												foreign key(niveau) references niveau(niid) ON DELETE CASCADE 
												ON UPDATE CASCADE,
												foreign key(profession) references profession(pid) ON DELETE CASCADE 
												ON UPDATE CASCADE,
												foreign key(branche) references branche(bid) ON DELETE CASCADE 
												ON UPDATE CASCADE
												);") or (print_r($cons->errorInfo()));


							// $query=$cons->query("insert into utilisateur(nom, prenom, dob, genre, pays, email, codetel, tel, address, codewhat, whatsapp, facebook, niveau, departement,  profession, photo, uname, pass, branche)
							// 	values('Fabrice', 'Honorat', '2013-10-07', 'M', 'GH', 'admin@gmail.com', '00233', '0241729977', 'labone', '00233', '0241729977', 'Herve J', 1', '1', '1', '-', 'orchidee', 'Tabernacle', 1) ")or (print_r($cons->errorInfo()));
							
							$depense=$cons->query("create table if not exists depense(
													did int(11) not null primary key auto_increment,
													date date not null,
													motif varchar(30) not null, 
													description varchar(225) not null,
													montant int(11) not null,
													tresorier int(11) null,
													administrateur varchar(15) null,
													admin_id varchar(15) default '-',
													branche int(11) not null,
													foreign key(branche) references branche(bid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));
												
							$offrande=$cons->query("create table if not exists offrande(
													oid int(11) not null primary key auto_increment,
													date date not null,
													recette int(11) not null,
													evenement int(11) not null,
													tresorier int(11) null,
													usher varchar(15) null,
													usher_id varchar(15) default '-',
													admin varchar(15) null,
													admin_id varchar(15) default '-',
													branche int(11) not null,
													foreign key(evenement) references evenement(eid) ON DELETE CASCADE 
													ON UPDATE CASCADE,
													foreign key(branche) references branche(bid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));	

							$dime=$cons->query("create table if not exists dime(
													diid int(11) not null primary key auto_increment,
													membre varchar(30) not null,
													date date not null,
													montant int(11) not null,
													tresorier int(11) null,
													usher varchar(15) null,
													usher_id varchar(15) default '-',
													admin varchar(15) null,
													admin_id varchar(15) default '-',
													branche int(11) not null,
													foreign key(branche) references branche(bid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));

							$niveau_p=$cons->query("create table if not exists niveau_p(
													nipid int(11) not null primary key auto_increment,
													niveau_p varchar(30) not null
													);") or (print_r($cons->errorInfo()));

							$query=$cons->query("insert into niveau_p(niveau_p)
								values  ('Membre'),
										('Leader')
										") or (print_r($cons->errorInfo()));

							$porteur=$cons->query("create table if not exists porteur(
													pid int(11) not null primary key auto_increment,
													nom varchar(30) not null,
													prenom varchar(30) not null,
													uname varchar(30) not null,
													pass varchar(30) not null,
													tel varchar(10) not null,
													email varchar(30) not null,
													desactivate varchar(5) not null
													);") or (print_r($cons->errorInfo()));

							$zone=$cons->query("create table if not exists zone(
													zid int(11) not null primary key auto_increment,
													zone varchar(30) not null);") or (print_r($cons->errorInfo()));

							$evangelisation=$cons->query("create table if not exists evangelisation(
													eid int(11) not null primary key auto_increment,
													nom varchar(30) not null,
													prenom varchar(30) not null,
													tel varchar(10) not null,
													zone int(11) not null,
													date date not null,
												 	status varchar(5) not null,
												 	foreign key(zone) references zone(zid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));

							$sms_porteur=$cons->query("create table if not exists sms_porteur(
													sms_pide int(11) not null primary key auto_increment,
													sms varchar(225) not null,
													date date not null
													);") or (print_r($cons->errorInfo()));

							
							$sms_porteur_envoi=$cons->query("create table if not exists sms_porteur_envoi(
													sms_pide int(11) not null,
													tel int(16) not null
													);") or (print_r($cons->errorInfo()));

							$zone_cel=$cons->query("create table if not exists zone_cel(
													zid_cel int(11) not null primary key auto_increment,
													zone varchar(30) not null);") or (print_r($cons->errorInfo()));

							$cellule=$cons->query("create table if not exists cellule(
													cid int(11) not null primary key auto_increment,
													lnom varchar(30) not null,
													lprenom varchar(30) not null,
													uname varchar(30) not null,
													pass varchar(30) not null,
													tel varchar(10) not null,
													email varchar(30) not null,
													zone_cel int(11) not null,
													branche int(11) not null,
													desactivate varchar(5) not null,
													foreign key(zone_cel) references zone_cel(zid_cel) ON DELETE CASCADE 
													ON UPDATE CASCADE,
													foreign key(branche) references branche(bid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));

							$reunion=$cons->query("create table if not exists reunion(
													rid int(11) not null primary key auto_increment,
													theme varchar(30) not null,
													date varchar(30) not null,
													cellule int(11) not null,
													branche int(11) not null,
													statut varchar(5) DEFAULT 'OFF',
													foreign key(cellule) references cellule(cid) ON DELETE CASCADE 
													ON UPDATE CASCADE,
													foreign key(branche) references branche(bid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));

							$sms_cellule=$cons->query("create table if not exists sms_cellule(
													sms_cel_id int(11) not null primary key auto_increment,
													sms varchar(225) not null,
													date date not null,
													branche int(11) not null,
													foreign key(branche) references branche(bid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));

							$sms_cellule_envoi=$cons->query("create table if not exists sms_cellule_envoi(
													sms_cel_ide int(11) not null,
													tel int(16) not null
													);") or (print_r($cons->errorInfo()));

							$membre_cel=$cons->query("create table if not exists membre_cel(
													mcid int(11) not null primary key auto_increment,
													nom varchar(30) not null,
													prenom varchar(30) not null,
													tel varchar(10) not null,
													email varchar(30) not null,
													cellule int(11) not null,
													desactivate varchar(5) not null,
													date date not null,
													branche int(11) not null,
													foreign key(cellule) references cellule(cid) ON DELETE CASCADE 
													ON UPDATE CASCADE,
													foreign key(branche) references branche(bid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));

							$presence=$cons->query("create table if not exists presence(
													pid int(11) not null primary key auto_increment,
													statut varchar(1) not null,
													membre int(11) not null,
													reunion int(11) not null,
													branche int(11) not null,
													foreign key(membre) references membre_cel(mcid) ON DELETE CASCADE 
													ON UPDATE CASCADE,
													foreign key(reunion) references reunion(rid) ON DELETE CASCADE 
													ON UPDATE CASCADE,
													foreign key(branche) references branche(bid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));
							$email_cel=$cons->query("create table if not exists email_cel(
													emid int(11) not null primary key auto_increment,
													entete varchar(100) null,
													text varchar(225) not null,
													date date not null,
													branche int(11) not null,
													foreign key(branche) references branche(bid) ON DELETE CASCADE 
													ON UPDATE CASCADE
													);") or (print_r($cons->errorInfo()));
							$email_cel_envoi=$cons->query("create table if not exists email_cel_envoi(
													emailcid int(11) not null,
													address varchar(30) not null
													);") or (print_r($cons->errorInfo()));


							$query=$cons->query("insert into pasteur_p(nom, prenom, dob, genre, pays, email, codetel, tel, address, codewhat, whatsapp, facebook, niveau, profession, photo, uname, pass)
							 	values('Fabrice', 'Honorat', '2013-10-07', 'M', 'GH', 'admin@gmail.com', '00233','0241729977', 'labone', '00233', '0241729977', 'Pasteur F' ,'1', '1', '-', 'orchidee', 'Tabernacle') ")or (print_r($cons->errorInfo()));
							
							$query=$cons->query("insert into utilisateur(nom, prenom, dob, genre, pays, email, codetel, tel, address, codewhat, whatsapp, facebook, niveau, departement,  profession, photo, uname, pass, branche)
							 	values('Fabrice', 'Honorat', '2013-10-07', 'M', 'GH', 'admin@gmail.com', '00233', '0241729977', 'labone', '00233', '0241729977', 'Herve J', '1', '1', '1', '-', 'orchidee', 'Tabernacle', 1) ")or (print_r($cons->errorInfo()));

							$query=$cons->query("insert into utilisateur(nom, prenom, dob, genre, pays, email, codetel, tel, address, codewhat, whatsapp, facebook, niveau, departement,  profession, photo, uname, pass, branche)
							 	values('Fabrice', 'Honorat', '2013-10-07', 'M', 'GH', 'admin@gmail.com', '00233', '0241729977', 'labone', '00233', '0241729977', 'Herve J', '4', '1', '1', '-', 'Herve', 'Tabernacle', 1) ")or (print_r($cons->errorInfo()));
							



											
							if($pasteur_p && $utilisateur&& $evenement && $depense && $offrande && $profession && $filiere && $ecole && $eglise && $email_envoi && $sms_envoi
								&& $activite && $activite_ac && $relation && $urgence && $info_spi && $t_membre && $membre && $dime && $progression && $groupe && $groupe_membre&& $sms && $email && $niveau &&
								 $porteur && $zone && $evangelisation && $sms_porteur && $sms_porteur_envoi && $zone_cel && $cellule && $reunion && $sms_cellule && $sms_cellule_envoi && $membre_cel && $presence){
							
								echo "<a href=../index.php> Continue to TA Manager </a>";
							}				
									
							}
							
					?>
	
														</form>

				<script src="../Lib_bootstrap/docs/assets/js/vendor/jquery.min.js"></script>
				<script src="../Lib_bootstrap/js/bootstrap.min.js"></script>

				
	</body>
</html>