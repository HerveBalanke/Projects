

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
   			<link rel="shortcut icon" type="image/x-icon" href="../images/favicon(2).ico" />`
   			<link href="../Lib_bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   			<link href="../Lib_bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
   			<link href="../country/dist/css/bootstrap-formhelpers.min.css" rel="stylesheet">
   			<Link href="../country/js/tests/vendor/css/bootstrap-3.0.0.min.css" rel="stylesheet">
   			<link type="text/css" rel="stylesheet" href="../Lib_bootstrap/tab.css"  >
   			<link href="../jasny/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
   			<link rel="stylesheet" type="text/css" href="../Lib_bootstrap/dist/sweetalert.css">


		   			<?php
		   			require_once("../setup/connection.php");

		   			$out_prof=$con->query("select * from profession;") or die (print_r($con->errorInfo()));
		   			$count_prof=$out_prof->rowCount();

		   			$out_fil=$con->query("select * from filiere;") or die (print_r($con->errorInfo()));
		   			$count_fil=$out_fil->rowCount();

		   			$out_univ=$con->query("select * from ecole;") or die (print_r($con->errorInfo()));
		   			$count_univ=$out_univ->rowCount();

		   			$out_eg=$con->query("select * from eglise;") or die (print_r($con->errorInfo()));
		   			$count_eg=$out_eg->rowCount();

		   			$out_ac=$con->query("select * from activite;") or die (print_r($con->errorInfo()));
		   			$count_ac=$out_ac->rowCount();

		   			$out_ac_ta=$con->query("select * from activite_ac;") or die (print_r($con->errorInfo()));
		   			$count_ac_ta=$out_ac_ta->rowCount();

		   			$out_rel=$con->query("select * from relation;") or die (print_r($con->errorInfo()));
		   			$count_rel=$out_rel->rowCount();

		   			$mid=$_GET['mid'];
		   			$out_membre=$con->query("select * from membre
				     inner join t_membre on membre.t_membre=t_membre.tmid
				     inner join profession on membre.profession=profession.pid
				     inner join filiere on membre.filiere=filiere.fid
				     inner join ecole on membre.ecole=ecole.eid
				     inner join info_spi on membre.info_spi=info_spi.isid
				     inner join urgence on membre.per_urgence=urgence.uid
				     inner join eglise on info_spi.a_eglise=eglise.egid
				     inner join activite_ac on membre.activite_ac=activite_ac.acaid
				     inner join activite on info_spi.ae_activite=activite.acid
				     inner join relation on urgence.relation=relation.rid
				     where membre.mid='$mid'
				     ;") or die(print_r($con->errorInfo()));

		   			$fetch_out_membre= $out_membre->fetch();
		   			?>


			
			   			
			  
	</head>

	<body>

			 <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

						 <nav class="navbar navbar-default navbar-fixed-top">
				  <div class="container-fluid" id="nv">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="#">TA Manager</a>
				    </div>
				    <div class="collapse navbar-collapse">
				      <ul class="nav navbar-nav" id="navbar" >
					      <li class="active"><a href="membre_out.php">Gerer Membre</a></li>
					      <li><a href="gerer_entrees.php">Gerer Entrées</a></li>
					      <li><a href="gerer_sorties.php">Gerer Sorties</a></li>
					      <li><a href="gerer_groupe.php">Gerer Groupes</a></li>
					      <li><a href="bilan.php">Rapports</a></li>
					    </ul>
				      <ul class="nav navbar-nav navbar-right" >
				        <li ><a href="#" style="color:rgb(130, 0, 31);"><span class="glyphicon glyphicon-log-in"></span> Deconnection</a></li>
				      </ul>
				    </div>
				  </div>
				</nav>

			</div>
        </div>
      </div>
    </div>



    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
				<div class="jumbotron">
				    <h3 class="text-center">Gerer Membre</h3>

				  </div>
      	</div>
        </div>
      </div>
    </div>


     <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

						<ul  class="nav nav-tabs">
									<li >
						       		 <a  href="ajouter_membre.php">Ajouter</a>
									</li>
									<li  class="active">
										<a href="membre_out.php" >Liste des Membres</a>
									</li>
								</ul>

										<br/>
									  	
										  	<div class="panel panel-default">
												 <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b>MODIFICATION DES DONNEES DU MEMBRE </b></div>


													<div class="panel-body">
														<div class="row">
         												 <div class="col-md-1"> </div>
         												 <div class="col-md-10" id="sec">
														<form class="form-horizontal"  method="POST" id="form_membre" action="gerer_membre.php" multipart/form-data role="form">
														<br/>

														<div id="flash"> </div>

															<label style="color:rgb(130, 0, 31);" > A.	INFORMATION PERSONNELLE </label> <br/><br/>

															<input type="hidden" class="form-control" id="mid" value="<?php echo $fetch_out_membre['mid']; ?>" >

															<div class="form-group">
														    <label class="control-label col-sm-2" for="nom">Nom(s):</label>
														    <div class="col-sm-8">
														      <input type="text" class="form-control" id="nom" value="<?php echo $fetch_out_membre['nom']; ?>" style="text-transform: capitalize;" placeholder="Entrez le(s) Nom(s)" maxlength="30">
														    	<div id='check_nom' style="color:red"></div>
														    </div>
														  </div>
														  <div class="form-group">
														    <label class="control-label col-sm-2" for="prenom">Prenom(s):</label>
														    <div class="col-sm-8"> 
														      <input type="text" class="form-control" id="prenom" value="<?php echo $fetch_out_membre['prenom']; ?>" style="text-transform: capitalize;" placeholder="Entrez le(s) Prenom(s)" maxlength="50">
														      <div id='check_prenom' style="color:red"></div>
														    </div>
														  </div>
														  <div class="form-group">
														    <label class="control-label col-sm-2" for="genre">Genre:</label>
														    <div class="col-sm-8"> 
														     <div class="radio">
															  <label><input type="radio" id="genre" name="genre" value="M" <?php echo ($fetch_out_membre["genre"]=='M')?'checked':'' ?> > Masculin</label>
															</div>
															<div class="radio">
															  <label><input type="radio" id="genre" name="genre" value="F" <?php echo ($fetch_out_membre["genre"]=='F')?'checked':'' ?> > Feminin</label>
															</div>
															<div id='check_genre' style="color:red"></div>
														    </div>
														  </div>
														  	
														  <div class="form-group">
														    <label class="control-label col-sm-2" for="dob">Date de Naissance:</label>
														    <div class="col-sm-5"> 
														     <div class="bfh-datepicker" data-format="y-m-d" data-date="<?php echo $fetch_out_membre['dob']; ?>" id="date">
															  <div class="input-prepend bfh-datepicker-toggle" data-toggle="bfh-datepicker">
															    <span class="add-on"><i class="icon-calendar"></i></span>
															    <input type="text" class="input-medium" id="dat" readonly>
															  </div>
															  <div class="bfh-datepicker-calendar">
															    <table class="calendar table table-bordered">
															      <thead>
															        <tr class="months-header">
															          <th class="month" colspan="4">
															            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
															            <span></span>
															            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
															          </th>
															          <th class="year" colspan="3">
															            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
															            <span id="year"></span>
															            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
															          </th>
															        </tr>
															        <tr class="days-header">
															        </tr>
															      </thead>
															      <tbody>
															      </tbody>
															    </table>
															  </div>
															</div>
															<div id='check_date' style="color:red"></div>
														    </div>
														  </div>

														  <div class="form-group">
														    <label class="control-label col-sm-2" for="po">Pays d'Origine:</label>
														    <div class="col-sm-5"> 
														      <div class="bfh-selectbox bfh-countries" id="pays" data-country="<?php echo $fetch_out_membre['pays']; ?>" data-flags="true">
															  <input type="hidden" value="">
															  <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
															    <span class="bfh-selectbox-option input-medium" data-option=""></span>
															    <b class="caret"></b>
															  </a>
															  <div class="bfh-selectbox-options">
															    <input type="text"  class="bfh-selectbox-filter">
															    <div role="listbox">
															    <ul role="option">
															    </ul>
															    </div>
															  </div>
															</div>
														    </div>
														    <div id='check_pays' style="color:red"></div>
														  </div>

														  <div class="form-group">
														    <label class="control-label col-sm-2" for="prof">Profession:</label>
														    <div class="col-sm-5"> 
																   <select class="form-control"  id="prof" >
																   	<option value="<?php echo $fetch_out_membre['pid']; ?>" selected='selected'><?php echo $fetch_out_membre['profession']; ?></option>

																	<?php
																	for($i=0; $i<$count_prof; $i++){
																		$fetch_prof=$out_prof->fetch();

																	?>
																    <option value= "<?php echo $fetch_prof ["pid"];?>"> 
																    <?php echo $fetch_prof ["profession"];?>
																    
																    <?php
																	}

																    ?>

																	</option>
																	<option>Autre</option>

																  </select>
																  <div id='check_prof' style="color:red"></div>
																  <div id="block_prof">
																  <br/>
																  <input type="text" class="form-control" id="prof_alt" style="text-transform: capitalize;" placeholder="Entrez la Profession" maxlength="30">
																  <div id='check_prof_alt' style="color:red"></div>
																  </div>
														    </div>
														  </div>

														  <div class="form-group">
														    <label class="control-label col-sm-2" for="fil">Filière:</label>
														    <div class="col-sm-5"> 
																  <select class="form-control"  id="fil">
																  	<option value="<?php echo $fetch_out_membre['fid']; ?>" selected='selected'><?php echo $fetch_out_membre['filiere']; ?></option>

																	<?php
																	for($i=0; $i<$count_fil; $i++){
																		$fetch_fil=$out_fil->fetch();

																	?>
																    <option value= "<?php echo $fetch_fil ["fid"];?>"> 
																    <?php echo $fetch_fil ["filiere"];?>

																    <?php
																	}

																    ?>

																	</option>
																	<option>Autre</option>

																  </select>
																  <div id='check_fil' style="color:red"></div>
																  <div id="block_fil">
																  <br/>
																  <input type="text" class="form-control" id="fil_alt" style="text-transform: capitalize;" placeholder="Entrez la Filière" maxlength="30">
																  <div id='check_fil_alt' style="color:red"></div>
																  </div>
														    </div>
														  </div>

														  <div class="form-group">
														    <label class="control-label col-sm-2" for="ecole">Ecole/Université:</label>
														    <div class="col-sm-8"> 
																  <select class="form-control"  id="ecole">
																  	<option value="<?php echo $fetch_out_membre['eid']; ?>" selected='selected'><?php echo $fetch_out_membre['ecole']; ?></option>

																	<?php
																	for($i=0; $i<$count_univ; $i++){
																		$fetch_univ=$out_univ->fetch();

																	?>
																    <option value= "<?php echo $fetch_univ ["eid"];?>">
																    <?php echo $fetch_univ ["ecole"];?> 

																    <?php
																	}

																    ?>

																	</option>
																	<option>Autre</option>

																  </select>
																  <div id='check_ecole' style="color:red"></div>
																  <div id="block_ecole">
																  <br/>
																  <input type="text" class="form-control" id="ecole_alt" style="text-transform: capitalize;" placeholder="Entrez l'Ecole/Université" maxlength="50">
																  <div id='check_ecole_alt' style="color:red"></div>
																  </div>
														    </div>
														  </div>

														  <div class="form-group">
														    <label class="control-label col-sm-2" for="sim">Situation Matrimoniale:</label>
														    <div class="col-sm-10"> 
														      <div class="radio">
															  <label><input type="radio" id="sim" name="sim" <?php echo ($fetch_out_membre["sit_mat"]=='Marie(e)')?'checked':'' ?>  value="Marie(e)">Marié(e)</label>
															</div>
															<div class="radio">
															  <label><input type="radio" id="sim" name="sim" <?php echo ($fetch_out_membre["sit_mat"]=='Celibataire')?'checked':'' ?>  value="Celibataire">Célibataire</label>
															</div>
															<div class="radio">
															  <label><input type="radio" id="sim" name="sim" <?php echo ($fetch_out_membre["sit_mat"]=='Fiance(e)')?'checked':'' ?> value="Fiance(e)">Fiancé(e)</label>
															</div>
															<div class="radio">
															  <label><input type="radio" id="sim" name="sim"  <?php echo ($fetch_out_membre["sit_mat"]=='Engage(e)')?'checked':'' ?>  value="Engage(e)">Engagé(e)</label>
															</div>
															<div id='check_sim' style="color:red"></div>
														    </div>
														   </div>

														  <div class="form-group">
														    <label class="control-label col-sm-2" for="ne">Nombre d'Enfant:</label>
														    <div class="col-sm-2"> 
														      <input type="number" class="form-control" id="ne" min="0"  value="<?php echo $fetch_out_membre['nbre_denfant']; ?>" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" maxlength="5">
														      <div id='check_ne' style="color:red"></div>
														    </div>
														  </div>

														  <div class="form-group">
														    <label class="control-label col-sm-2" for="lha">Lieu d'Habitation:</label>
														    <div class="col-sm-8"> 
														      <input type="text" class="form-control" id="lha" value="<?php echo $fetch_out_membre['address']; ?>" style="text-transform: capitalize;" placeholder="Entrez le Lieu d'Habitation" maxlength="30">
														      <div id='check_lha' style="color:red"></div>
														    </div>
														    
														  </div>

														  <div class="form-group">
														    <label class="control-label col-sm-2" >Adresse(s) Electronique(s):</label>
														    <div class="col-sm-8">
														      <input type="email" class="form-control" id="mail" value="<?php echo $fetch_out_membre['email']; ?>" placeholder="Entrez L'address e-mail" maxlength="50">
														      <div id='check_mail' style="color:red"></div>
														    <br/>
														      <input type="text" class="form-control" id="facebook" value="<?php echo $fetch_out_membre['facebook']; ?>" style="text-transform: capitalize;" placeholder="Entrez Pseudo Facebook" maxlength="30">
														      <div id='check_fac' style="color:red"></div>
														    </div>

														  </div>

														  <div class="form-group">
														    <label class="control-label col-sm-2">Contact(s) Telephonique(s):</label>
														    <div class="col-sm-10"> 
														    	<div class='form-inline'>
														    	<div class='form-group'>
														      <select class="form-control col-sm-2" id="a"  name="countryCode">
											<option data-countryCode="GH" value="233">Ghana (+233)</option>
											<optgroup label="Other countries">
												<option data-countryCode="DZ" value="213">Algeria (+213)</option>
												<option data-countryCode="AD" value="376">Andorra (+376)</option>
												<option data-countryCode="AO" value="244">Angola (+244)</option>
												<option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
												<option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
												<option data-countryCode="AR" value="54">Argentina (+54)</option>
												<option data-countryCode="AM" value="374">Armenia (+374)</option>
												<option data-countryCode="AW" value="297">Aruba (+297)</option>
												<option data-countryCode="AU" value="61">Australia (+61)</option>
												<option data-countryCode="AT" value="43">Austria (+43)</option>
												<option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
												<option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
												<option data-countryCode="BH" value="973">Bahrain (+973)</option>
												<option data-countryCode="BD" value="880">Bangladesh (+880)</option>
												<option data-countryCode="BB" value="1246">Barbados (+1246)</option>
												<option data-countryCode="BY" value="375">Belarus (+375)</option>
												<option data-countryCode="BE" value="32">Belgium (+32)</option>
												<option data-countryCode="BZ" value="501">Belize (+501)</option>
												<option data-countryCode="BJ" value="229">Benin (+229)</option>
												<option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
												<option data-countryCode="BT" value="975">Bhutan (+975)</option>
												<option data-countryCode="BO" value="591">Bolivia (+591)</option>
												<option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
												<option data-countryCode="BW" value="267">Botswana (+267)</option>
												<option data-countryCode="BR" value="55">Brazil (+55)</option>
												<option data-countryCode="BN" value="673">Brunei (+673)</option>
												<option data-countryCode="BG" value="359">Bulgaria (+359)</option>
												<option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
												<option data-countryCode="BI" value="257">Burundi (+257)</option>
												<option data-countryCode="KH" value="855">Cambodia (+855)</option>
												<option data-countryCode="CM" value="237">Cameroon (+237)</option>
												<option data-countryCode="CA" value="1">Canada (+1)</option>
												<option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
												<option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
												<option data-countryCode="CF" value="236">Central African Republic (+236)</option>
												<option data-countryCode="CL" value="56">Chile (+56)</option>
												<option data-countryCode="CN" value="86">China (+86)</option>
												<option data-countryCode="CO" value="57">Colombia (+57)</option>
												<option data-countryCode="KM" value="269">Comoros (+269)</option>
												<option data-countryCode="CG" value="242">Congo (+242)</option>
												<option data-countryCode="CK" value="682">Cook Islands (+682)</option>
												<option data-countryCode="CR" value="506">Costa Rica (+506)</option>
												<option data-countryCode="HR" value="385">Croatia (+385)</option>
												<option data-countryCode="CU" value="53">Cuba (+53)</option>
												<option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
												<option data-countryCode="CY" value="357">Cyprus South (+357)</option>
												<option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
												<option data-countryCode="DK" value="45">Denmark (+45)</option>
												<option data-countryCode="DJ" value="253">Djibouti (+253)</option>
												<option data-countryCode="DM" value="1809">Dominica (+1809)</option>
												<option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
												<option data-countryCode="EC" value="593">Ecuador (+593)</option>
												<option data-countryCode="EG" value="20">Egypt (+20)</option>
												<option data-countryCode="SV" value="503">El Salvador (+503)</option>
												<option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
												<option data-countryCode="ER" value="291">Eritrea (+291)</option>
												<option data-countryCode="EE" value="372">Estonia (+372)</option>
												<option data-countryCode="ET" value="251">Ethiopia (+251)</option>
												<option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
												<option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
												<option data-countryCode="FJ" value="679">Fiji (+679)</option>
												<option data-countryCode="FI" value="358">Finland (+358)</option>
												<option data-countryCode="FR" value="33">France (+33)</option>
												<option data-countryCode="GF" value="594">French Guiana (+594)</option>
												<option data-countryCode="PF" value="689">French Polynesia (+689)</option>
												<option data-countryCode="GA" value="241">Gabon (+241)</option>
												<option data-countryCode="GM" value="220">Gambia (+220)</option>
												<option data-countryCode="GE" value="7880">Georgia (+7880)</option>
												<option data-countryCode="DE" value="49">Germany (+49)</option>
												<!--<option data-countryCode="GH" value="233">Ghana (+233)</option>-->
												<option data-countryCode="GI" value="350">Gibraltar (+350)</option>
												<option data-countryCode="GR" value="30">Greece (+30)</option>
												<option data-countryCode="GL" value="299">Greenland (+299)</option>
												<option data-countryCode="GD" value="1473">Grenada (+1473)</option>
												<option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
												<option data-countryCode="GU" value="671">Guam (+671)</option>
												<option data-countryCode="GT" value="502">Guatemala (+502)</option>
												<option data-countryCode="GN" value="224">Guinea (+224)</option>
												<option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
												<option data-countryCode="GY" value="592">Guyana (+592)</option>
												<option data-countryCode="HT" value="509">Haiti (+509)</option>
												<option data-countryCode="HN" value="504">Honduras (+504)</option>
												<option data-countryCode="HK" value="852">Hong Kong (+852)</option>
												<option data-countryCode="HU" value="36">Hungary (+36)</option>
												<option data-countryCode="IS" value="354">Iceland (+354)</option>
												<option data-countryCode="IN" value="91">India (+91)</option>
												<option data-countryCode="ID" value="62">Indonesia (+62)</option>
												<option data-countryCode="IR" value="98">Iran (+98)</option>
												<option data-countryCode="IQ" value="964">Iraq (+964)</option>
												<option data-countryCode="IE" value="353">Ireland (+353)</option>
												<option data-countryCode="IL" value="972">Israel (+972)</option>
												<option data-countryCode="IT" value="39">Italy (+39)</option>
												<option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
												<option data-countryCode="JP" value="81">Japan (+81)</option>
												<option data-countryCode="JO" value="962">Jordan (+962)</option>
												<option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
												<option data-countryCode="KE" value="254">Kenya (+254)</option>
												<option data-countryCode="KI" value="686">Kiribati (+686)</option>
												<option data-countryCode="KP" value="850">Korea North (+850)</option>
												<option data-countryCode="KR" value="82">Korea South (+82)</option>
												<option data-countryCode="KW" value="965">Kuwait (+965)</option>
												<option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
												<option data-countryCode="LA" value="856">Laos (+856)</option>
												<option data-countryCode="LV" value="371">Latvia (+371)</option>
												<option data-countryCode="LB" value="961">Lebanon (+961)</option>
												<option data-countryCode="LS" value="266">Lesotho (+266)</option>
												<option data-countryCode="LR" value="231">Liberia (+231)</option>
												<option data-countryCode="LY" value="218">Libya (+218)</option>
												<option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
												<option data-countryCode="LT" value="370">Lithuania (+370)</option>
												<option data-countryCode="LU" value="352">Luxembourg (+352)</option>
												<option data-countryCode="MO" value="853">Macao (+853)</option>
												<option data-countryCode="MK" value="389">Macedonia (+389)</option>
												<option data-countryCode="MG" value="261">Madagascar (+261)</option>
												<option data-countryCode="MW" value="265">Malawi (+265)</option>
												<option data-countryCode="MY" value="60">Malaysia (+60)</option>
												<option data-countryCode="MV" value="960">Maldives (+960)</option>
												<option data-countryCode="ML" value="223">Mali (+223)</option>
												<option data-countryCode="MT" value="356">Malta (+356)</option>
												<option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
												<option data-countryCode="MQ" value="596">Martinique (+596)</option>
												<option data-countryCode="MR" value="222">Mauritania (+222)</option>
												<option data-countryCode="YT" value="269">Mayotte (+269)</option>
												<option data-countryCode="MX" value="52">Mexico (+52)</option>
												<option data-countryCode="FM" value="691">Micronesia (+691)</option>
												<option data-countryCode="MD" value="373">Moldova (+373)</option>
												<option data-countryCode="MC" value="377">Monaco (+377)</option>
												<option data-countryCode="MN" value="976">Mongolia (+976)</option>
												<option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
												<option data-countryCode="MA" value="212">Morocco (+212)</option>
												<option data-countryCode="MZ" value="258">Mozambique (+258)</option>
												<option data-countryCode="MN" value="95">Myanmar (+95)</option>
												<option data-countryCode="NA" value="264">Namibia (+264)</option>
												<option data-countryCode="NR" value="674">Nauru (+674)</option>
												<option data-countryCode="NP" value="977">Nepal (+977)</option>
												<option data-countryCode="NL" value="31">Netherlands (+31)</option>
												<option data-countryCode="NC" value="687">New Caledonia (+687)</option>
												<option data-countryCode="NZ" value="64">New Zealand (+64)</option>
												<option data-countryCode="NI" value="505">Nicaragua (+505)</option>
												<option data-countryCode="NE" value="227">Niger (+227)</option>
												<option data-countryCode="NG" value="234">Nigeria (+234)</option>
												<option data-countryCode="NU" value="683">Niue (+683)</option>
												<option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
												<option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
												<option data-countryCode="NO" value="47">Norway (+47)</option>
												<option data-countryCode="OM" value="968">Oman (+968)</option>
												<option data-countryCode="PW" value="680">Palau (+680)</option>
												<option data-countryCode="PA" value="507">Panama (+507)</option>
												<option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
												<option data-countryCode="PY" value="595">Paraguay (+595)</option>
												<option data-countryCode="PE" value="51">Peru (+51)</option>
												<option data-countryCode="PH" value="63">Philippines (+63)</option>
												<option data-countryCode="PL" value="48">Poland (+48)</option>
												<option data-countryCode="PT" value="351">Portugal (+351)</option>
												<option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
												<option data-countryCode="QA" value="974">Qatar (+974)</option>
												<option data-countryCode="RE" value="262">Reunion (+262)</option>
												<option data-countryCode="RO" value="40">Romania (+40)</option>
												<option data-countryCode="RU" value="7">Russia (+7)</option>
												<option data-countryCode="RW" value="250">Rwanda (+250)</option>
												<option data-countryCode="SM" value="378">San Marino (+378)</option>
												<option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
												<option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
												<option data-countryCode="SN" value="221">Senegal (+221)</option>
												<option data-countryCode="CS" value="381">Serbia (+381)</option>
												<option data-countryCode="SC" value="248">Seychelles (+248)</option>
												<option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
												<option data-countryCode="SG" value="65">Singapore (+65)</option>
												<option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
												<option data-countryCode="SI" value="386">Slovenia (+386)</option>
												<option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
												<option data-countryCode="SO" value="252">Somalia (+252)</option>
												<option data-countryCode="ZA" value="27">South Africa (+27)</option>
												<option data-countryCode="ES" value="34">Spain (+34)</option>
												<option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
												<option data-countryCode="SH" value="290">St. Helena (+290)</option>
												<option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
												<option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
												<option data-countryCode="SD" value="249">Sudan (+249)</option>
												<option data-countryCode="SR" value="597">Suriname (+597)</option>
												<option data-countryCode="SZ" value="268">Swaziland (+268)</option>
												<option data-countryCode="SE" value="46">Sweden (+46)</option>
												<option data-countryCode="CH" value="41">Switzerland (+41)</option>
												<option data-countryCode="SI" value="963">Syria (+963)</option>
												<option data-countryCode="TW" value="886">Taiwan (+886)</option>
												<option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
												<option data-countryCode="TH" value="66">Thailand (+66)</option>
												<option data-countryCode="TG" value="228">Togo (+228)</option>
												<option data-countryCode="TO" value="676">Tonga (+676)</option>
												<option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
												<option data-countryCode="TN" value="216">Tunisia (+216)</option>
												<option data-countryCode="TR" value="90">Turkey (+90)</option>
												<option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
												<option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
												<option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
												<option data-countryCode="TV" value="688">Tuvalu (+688)</option>
												<option data-countryCode="UG" value="256">Uganda (+256)</option>
												<option data-countryCode="GB" value="44">UK (+44)</option>
												<option data-countryCode="UA" value="380">Ukraine (+380)</option>
												<option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
												<option data-countryCode="UY" value="598">Uruguay (+598)</option>
												<option data-countryCode="US" value="1">USA (+1)</option>
												<option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
												<option data-countryCode="VU" value="678">Vanuatu (+678)</option>
												<option data-countryCode="VA" value="379">Vatican City (+379)</option>
												<option data-countryCode="VE" value="58">Venezuela (+58)</option>
												<option data-countryCode="VN" value="84">Vietnam (+84)</option>
												<option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
												<option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
												<option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
												<option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
												<option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
												<option data-countryCode="ZM" value="260">Zambia (+260)</option>
												<option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
											</optgroup>
										</select>
										<div id='check_a' style="color:red"></div>
														      </div>
														      <div class='form-group'>
														      	<input type="telephone" class="form-control" id="tel" <?php $newtel = substr($fetch_out_membre['tel'], -10);?> value="<?php echo $newtel; ?>" placeholder="Entrez le N° de Telephone" maxlength="10">
														      	<div id='check_tel' style="color:red"></div>
														      </div>
														      <br/>
														      <div class='form-group'>
														      	<select class="form-control col-sm-2" id="b" name="countryCode">
											<option data-countryCode="GH" value="233">Ghana (+233)</option>
											<optgroup label="Other countries">
												<option data-countryCode="DZ" value="213">Algeria (+213)</option>
												<option data-countryCode="AD" value="376">Andorra (+376)</option>
												<option data-countryCode="AO" value="244">Angola (+244)</option>
												<option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
												<option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
												<option data-countryCode="AR" value="54">Argentina (+54)</option>
												<option data-countryCode="AM" value="374">Armenia (+374)</option>
												<option data-countryCode="AW" value="297">Aruba (+297)</option>
												<option data-countryCode="AU" value="61">Australia (+61)</option>
												<option data-countryCode="AT" value="43">Austria (+43)</option>
												<option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
												<option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
												<option data-countryCode="BH" value="973">Bahrain (+973)</option>
												<option data-countryCode="BD" value="880">Bangladesh (+880)</option>
												<option data-countryCode="BB" value="1246">Barbados (+1246)</option>
												<option data-countryCode="BY" value="375">Belarus (+375)</option>
												<option data-countryCode="BE" value="32">Belgium (+32)</option>
												<option data-countryCode="BZ" value="501">Belize (+501)</option>
												<option data-countryCode="BJ" value="229">Benin (+229)</option>
												<option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
												<option data-countryCode="BT" value="975">Bhutan (+975)</option>
												<option data-countryCode="BO" value="591">Bolivia (+591)</option>
												<option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
												<option data-countryCode="BW" value="267">Botswana (+267)</option>
												<option data-countryCode="BR" value="55">Brazil (+55)</option>
												<option data-countryCode="BN" value="673">Brunei (+673)</option>
												<option data-countryCode="BG" value="359">Bulgaria (+359)</option>
												<option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
												<option data-countryCode="BI" value="257">Burundi (+257)</option>
												<option data-countryCode="KH" value="855">Cambodia (+855)</option>
												<option data-countryCode="CM" value="237">Cameroon (+237)</option>
												<option data-countryCode="CA" value="1">Canada (+1)</option>
												<option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
												<option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
												<option data-countryCode="CF" value="236">Central African Republic (+236)</option>
												<option data-countryCode="CL" value="56">Chile (+56)</option>
												<option data-countryCode="CN" value="86">China (+86)</option>
												<option data-countryCode="CO" value="57">Colombia (+57)</option>
												<option data-countryCode="KM" value="269">Comoros (+269)</option>
												<option data-countryCode="CG" value="242">Congo (+242)</option>
												<option data-countryCode="CK" value="682">Cook Islands (+682)</option>
												<option data-countryCode="CR" value="506">Costa Rica (+506)</option>
												<option data-countryCode="HR" value="385">Croatia (+385)</option>
												<option data-countryCode="CU" value="53">Cuba (+53)</option>
												<option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
												<option data-countryCode="CY" value="357">Cyprus South (+357)</option>
												<option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
												<option data-countryCode="DK" value="45">Denmark (+45)</option>
												<option data-countryCode="DJ" value="253">Djibouti (+253)</option>
												<option data-countryCode="DM" value="1809">Dominica (+1809)</option>
												<option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
												<option data-countryCode="EC" value="593">Ecuador (+593)</option>
												<option data-countryCode="EG" value="20">Egypt (+20)</option>
												<option data-countryCode="SV" value="503">El Salvador (+503)</option>
												<option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
												<option data-countryCode="ER" value="291">Eritrea (+291)</option>
												<option data-countryCode="EE" value="372">Estonia (+372)</option>
												<option data-countryCode="ET" value="251">Ethiopia (+251)</option>
												<option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
												<option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
												<option data-countryCode="FJ" value="679">Fiji (+679)</option>
												<option data-countryCode="FI" value="358">Finland (+358)</option>
												<option data-countryCode="FR" value="33">France (+33)</option>
												<option data-countryCode="GF" value="594">French Guiana (+594)</option>
												<option data-countryCode="PF" value="689">French Polynesia (+689)</option>
												<option data-countryCode="GA" value="241">Gabon (+241)</option>
												<option data-countryCode="GM" value="220">Gambia (+220)</option>
												<option data-countryCode="GE" value="7880">Georgia (+7880)</option>
												<option data-countryCode="DE" value="49">Germany (+49)</option>
												<!-- <option data-countryCode="GH" value="233">Ghana (+233)</option> -->
												<option data-countryCode="GI" value="350">Gibraltar (+350)</option>
												<option data-countryCode="GR" value="30">Greece (+30)</option>
												<option data-countryCode="GL" value="299">Greenland (+299)</option>
												<option data-countryCode="GD" value="1473">Grenada (+1473)</option>
												<option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
												<option data-countryCode="GU" value="671">Guam (+671)</option>
												<option data-countryCode="GT" value="502">Guatemala (+502)</option>
												<option data-countryCode="GN" value="224">Guinea (+224)</option>
												<option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
												<option data-countryCode="GY" value="592">Guyana (+592)</option>
												<option data-countryCode="HT" value="509">Haiti (+509)</option>
												<option data-countryCode="HN" value="504">Honduras (+504)</option>
												<option data-countryCode="HK" value="852">Hong Kong (+852)</option>
												<option data-countryCode="HU" value="36">Hungary (+36)</option>
												<option data-countryCode="IS" value="354">Iceland (+354)</option>
												<option data-countryCode="IN" value="91">India (+91)</option>
												<option data-countryCode="ID" value="62">Indonesia (+62)</option>
												<option data-countryCode="IR" value="98">Iran (+98)</option>
												<option data-countryCode="IQ" value="964">Iraq (+964)</option>
												<option data-countryCode="IE" value="353">Ireland (+353)</option>
												<option data-countryCode="IL" value="972">Israel (+972)</option>
												<option data-countryCode="IT" value="39">Italy (+39)</option>
												<option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
												<option data-countryCode="JP" value="81">Japan (+81)</option>
												<option data-countryCode="JO" value="962">Jordan (+962)</option>
												<option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
												<option data-countryCode="KE" value="254">Kenya (+254)</option>
												<option data-countryCode="KI" value="686">Kiribati (+686)</option>
												<option data-countryCode="KP" value="850">Korea North (+850)</option>
												<option data-countryCode="KR" value="82">Korea South (+82)</option>
												<option data-countryCode="KW" value="965">Kuwait (+965)</option>
												<option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
												<option data-countryCode="LA" value="856">Laos (+856)</option>
												<option data-countryCode="LV" value="371">Latvia (+371)</option>
												<option data-countryCode="LB" value="961">Lebanon (+961)</option>
												<option data-countryCode="LS" value="266">Lesotho (+266)</option>
												<option data-countryCode="LR" value="231">Liberia (+231)</option>
												<option data-countryCode="LY" value="218">Libya (+218)</option>
												<option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
												<option data-countryCode="LT" value="370">Lithuania (+370)</option>
												<option data-countryCode="LU" value="352">Luxembourg (+352)</option>
												<option data-countryCode="MO" value="853">Macao (+853)</option>
												<option data-countryCode="MK" value="389">Macedonia (+389)</option>
												<option data-countryCode="MG" value="261">Madagascar (+261)</option>
												<option data-countryCode="MW" value="265">Malawi (+265)</option>
												<option data-countryCode="MY" value="60">Malaysia (+60)</option>
												<option data-countryCode="MV" value="960">Maldives (+960)</option>
												<option data-countryCode="ML" value="223">Mali (+223)</option>
												<option data-countryCode="MT" value="356">Malta (+356)</option>
												<option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
												<option data-countryCode="MQ" value="596">Martinique (+596)</option>
												<option data-countryCode="MR" value="222">Mauritania (+222)</option>
												<option data-countryCode="YT" value="269">Mayotte (+269)</option>
												<option data-countryCode="MX" value="52">Mexico (+52)</option>
												<option data-countryCode="FM" value="691">Micronesia (+691)</option>
												<option data-countryCode="MD" value="373">Moldova (+373)</option>
												<option data-countryCode="MC" value="377">Monaco (+377)</option>
												<option data-countryCode="MN" value="976">Mongolia (+976)</option>
												<option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
												<option data-countryCode="MA" value="212">Morocco (+212)</option>
												<option data-countryCode="MZ" value="258">Mozambique (+258)</option>
												<option data-countryCode="MN" value="95">Myanmar (+95)</option>
												<option data-countryCode="NA" value="264">Namibia (+264)</option>
												<option data-countryCode="NR" value="674">Nauru (+674)</option>
												<option data-countryCode="NP" value="977">Nepal (+977)</option>
												<option data-countryCode="NL" value="31">Netherlands (+31)</option>
												<option data-countryCode="NC" value="687">New Caledonia (+687)</option>
												<option data-countryCode="NZ" value="64">New Zealand (+64)</option>
												<option data-countryCode="NI" value="505">Nicaragua (+505)</option>
												<option data-countryCode="NE" value="227">Niger (+227)</option>
												<option data-countryCode="NG" value="234">Nigeria (+234)</option>
												<option data-countryCode="NU" value="683">Niue (+683)</option>
												<option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
												<option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
												<option data-countryCode="NO" value="47">Norway (+47)</option>
												<option data-countryCode="OM" value="968">Oman (+968)</option>
												<option data-countryCode="PW" value="680">Palau (+680)</option>
												<option data-countryCode="PA" value="507">Panama (+507)</option>
												<option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
												<option data-countryCode="PY" value="595">Paraguay (+595)</option>
												<option data-countryCode="PE" value="51">Peru (+51)</option>
												<option data-countryCode="PH" value="63">Philippines (+63)</option>
												<option data-countryCode="PL" value="48">Poland (+48)</option>
												<option data-countryCode="PT" value="351">Portugal (+351)</option>
												<option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
												<option data-countryCode="QA" value="974">Qatar (+974)</option>
												<option data-countryCode="RE" value="262">Reunion (+262)</option>
												<option data-countryCode="RO" value="40">Romania (+40)</option>
												<option data-countryCode="RU" value="7">Russia (+7)</option>
												<option data-countryCode="RW" value="250">Rwanda (+250)</option>
												<option data-countryCode="SM" value="378">San Marino (+378)</option>
												<option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
												<option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
												<option data-countryCode="SN" value="221">Senegal (+221)</option>
												<option data-countryCode="CS" value="381">Serbia (+381)</option>
												<option data-countryCode="SC" value="248">Seychelles (+248)</option>
												<option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
												<option data-countryCode="SG" value="65">Singapore (+65)</option>
												<option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
												<option data-countryCode="SI" value="386">Slovenia (+386)</option>
												<option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
												<option data-countryCode="SO" value="252">Somalia (+252)</option>
												<option data-countryCode="ZA" value="27">South Africa (+27)</option>
												<option data-countryCode="ES" value="34">Spain (+34)</option>
												<option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
												<option data-countryCode="SH" value="290">St. Helena (+290)</option>
												<option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
												<option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
												<option data-countryCode="SD" value="249">Sudan (+249)</option>
												<option data-countryCode="SR" value="597">Suriname (+597)</option>
												<option data-countryCode="SZ" value="268">Swaziland (+268)</option>
												<option data-countryCode="SE" value="46">Sweden (+46)</option>
												<option data-countryCode="CH" value="41">Switzerland (+41)</option>
												<option data-countryCode="SI" value="963">Syria (+963)</option>
												<option data-countryCode="TW" value="886">Taiwan (+886)</option>
												<option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
												<option data-countryCode="TH" value="66">Thailand (+66)</option>
												<option data-countryCode="TG" value="228">Togo (+228)</option>
												<option data-countryCode="TO" value="676">Tonga (+676)</option>
												<option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
												<option data-countryCode="TN" value="216">Tunisia (+216)</option>
												<option data-countryCode="TR" value="90">Turkey (+90)</option>
												<option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
												<option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
												<option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
												<option data-countryCode="TV" value="688">Tuvalu (+688)</option>
												<option data-countryCode="UG" value="256">Uganda (+256)</option>
												<option data-countryCode="GB" value="44">UK (+44)</option>
												<option data-countryCode="UA" value="380">Ukraine (+380)</option>
												<option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
												<option data-countryCode="UY" value="598">Uruguay (+598)</option>
												<option data-countryCode="US" value="1">USA (+1)</option>
												<option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
												<option data-countryCode="VU" value="678">Vanuatu (+678)</option>
												<option data-countryCode="VA" value="379">Vatican City (+379)</option>
												<option data-countryCode="VE" value="58">Venezuela (+58)</option>
												<option data-countryCode="VN" value="84">Vietnam (+84)</option>
												<option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
												<option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
												<option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
												<option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
												<option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
												<option data-countryCode="ZM" value="260">Zambia (+260)</option>
												<option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
											</optgroup>
										</select>
										<div id='check_b' style="color:red"></div>
														      </div>
														      <div class='form-group'>
														      	<input type="telephone" class="form-control" id="whatsapp" value="<?php echo $fetch_out_membre['whatsapp']; ?>" placeholder="Entrez le N° Whatsapp" maxlength="10">
														      	<div id='check_whatsapp' style="color:red"></div>
														      </div>
															 </div>
														    </div>
														  </div> <br/><br/>


														  <label style="color:rgb(130, 0, 31);" name="ips">B.	INFORMATION SUR LE PLAN SPIRITUEL</label> <br/><br/>

														  <input type="hidden" class="form-control" id="info_spi" value="<?php echo $fetch_out_membre['info_spi']; ?>">

														  <div class="form-group">
														    <label class="control-label col-sm-5" for="temps">Depuis combien de temps aviez-vous accepté Jésus dans votre vie?:</label>
														    <div class="col-sm-5">
														      <input type="text" class="form-control col-sm-2" id="temps" value="<?php echo $fetch_out_membre['temps']; ?>" style="text-transform: capitalize;" maxlength="30">
														      <div id='check_temps' style="color:red"></div>
														    </div>
														  </div>

														  <div class="form-group">
														    <label class="control-label col-sm-5" for="ae">Quelle église fréquentiez-vous auparavant?:</label>
														    <div class="col-sm-5"> 
																  <select class="form-control"  id="ae">
																  	<option value="<?php echo $fetch_out_membre['a_eglise']; ?>" selected='selected'><?php echo $fetch_out_membre['eglise']; ?></option>

																	<?php
																	for($i=0; $i<$count_eg; $i++){
																		$fetch_eg=$out_eg->fetch();

																	?>
																    <option value= "<?php echo $fetch_eg ["egid"];?>">
																    <?php echo $fetch_eg ["eglise"];?> 

																    <?php
																	}

																    ?>

																	</option>
																	<option>Autre</option>

																  </select>
																  <div id='check_ae' style="color:red"></div>
																  <div id="block_ae">
																  <br/>
																  <input type="text" class="form-control" id="ae_alt" style="text-transform: capitalize;" placeholder="Entrez l'Eglise" maxlength="50">
																  <div id='check_ae_alt' style="color:red"></div>
																  </div>
														    </div>
														  </div>

														  <div class="form-group">
														    <label class="control-label col-sm-5" for="bpt">Avez-vous été déjà baptisé par immersion?:</label>
														    <div class="col-sm-4"> 
														     <div class="radio">
															  <label><input type="radio" id="bpt" name="bpt" <?php echo ($fetch_out_membre["bapt_immersion"]=='o')?'checked':'' ?> value="o">Oui</label>
															</div>
															<div class="radio">
															  <label><input type="radio" id="bpt" name="bpt"  <?php echo ($fetch_out_membre["bapt_immersion"]=='n')?'checked':'' ?> value="n">Non</label>
															</div>
															<div id='check_bpt' style="color:red"></div>
														    </div>
														  </div>

														  <div class="form-group">
														    <label class="control-label col-sm-5" for="ac">Quelle activité faisiez-vous dans votre ancienne église?:</label>
														    <div class="col-sm-5"> 
																  <select class="form-control"  id="ac">

																  	<option value="<?php echo $fetch_out_membre['ae_activite']; ?>" selected='selected'><?php echo $fetch_out_membre['activite']; ?></option>

																	<?php
																	for($i=0; $i<$count_ac; $i++){
																		$fetch_ac=$out_ac->fetch();

																	?>
																    <option value= "<?php echo $fetch_ac ["acid"];?>">
																    <?php echo $fetch_ac ["activite"];?> 

																    <?php
																	}

																    ?>

																	</option>
																	<option>Autre</option>

																  </select>
																  <div id='check_ac' style="color:red"></div>
																  <div id="block_ac">
																  <br/>
																  <input type="text" class="form-control" id="ac_alt" style="text-transform: capitalize;" placeholder="Entrez l'Activité" maxlength="50">
																  <div id='check_ac_alt' style="color:red"></div>
																  </div>
														    </div>
														  </div> 
														  			  <div class="form-group">
														    <label class="control-label col-sm-5" for="ac_ta">Activité désirée au TA <span style="color:red;">*</span></label>
														    <div class="col-sm-5"> 
																  <select class="form-control" id="ac_ta">

																  	<option value="<?php echo $fetch_out_membre['acaid']; ?>" selected='selected'><?php echo $fetch_out_membre['activite_ac']; ?></option>

																	<?php
																	for($i=0; $i<$count_ac_ta; $i++){
																		$fetch_ac_ta=$out_ac_ta->fetch();

																	?>
																    <option value= "<?php echo $fetch_ac_ta ["acaid"];?>">
																    <?php echo $fetch_ac_ta ["activite_ac"];?> 

																    <?php
																	}

																    ?>

																	</option>
																	<option>Autre</option>

																  </select>
																  <div id="block_ac_ta">
																  <br/>
																  <input type="text" class="form-control" id="ac_ta_alt" style="text-transform: capitalize;" placeholder="Entrez l'Activité" maxlength="50">
																  <div id='check_ac_ta_alt' style="color:red"></div>
																  </div>
																  <div id='check_ac_ta' style="color:red"></div>
														    </div>
														  </div><br/><br/>


														  <label style="color:rgb(130, 0, 31);"  >C.	PERSONNE A CONTACTER EN CAS D’URGENCE</label> <br/><br/>

														  <input type="hidden" class="form-control" id="per_urgence" value="<?php echo $fetch_out_membre['info_spi']; ?>">

														  <div class="form-group">
														    <label class="control-label col-sm-2" for="nom_ur">Nom(s):</label>
														    <div class="col-sm-8">
														      <input type="text" class="form-control" id="nom_ur" value="<?php echo $fetch_out_membre['nom_ur']; ?>" style="text-transform: capitalize;" placeholder="Entrez le(s) Nom(s)" maxlength="30">
														      <div id='check_nom_ur' style="color:red"></div>
														    </div>
														  </div>
														  <div class="form-group">
														    <label class="control-label col-sm-2" for="prenom_ur">Prenom(s):</label>
														    <div class="col-sm-8"> 
														      <input type="text" class="form-control" id="prenom_ur" value="<?php echo $fetch_out_membre['prenom_ur']; ?>" style="text-transform: capitalize;" placeholder="Entrez le(s) Prenom(s)" maxlength="50">
														      <div id='check_prenom_ur' style="color:red"></div>
														    </div>
														  </div>

														  <div class="form-group">
														    <label class="control-label col-sm-2">Telephone:</label>
														    <div class="col-sm-10"> 
														    	<div class='form-inline'>
														    	<div class='form-group'>
														      <select class="form-control col-sm-2" id="a_ur"  name="countryCode">
											<option data-countryCode="GH" value="233">Ghana (+233)</option>
											<optgroup label="Other countries">
												<option data-countryCode="DZ" value="213">Algeria (+213)</option>
												<option data-countryCode="AD" value="376">Andorra (+376)</option>
												<option data-countryCode="AO" value="244">Angola (+244)</option>
												<option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
												<option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
												<option data-countryCode="AR" value="54">Argentina (+54)</option>
												<option data-countryCode="AM" value="374">Armenia (+374)</option>
												<option data-countryCode="AW" value="297">Aruba (+297)</option>
												<option data-countryCode="AU" value="61">Australia (+61)</option>
												<option data-countryCode="AT" value="43">Austria (+43)</option>
												<option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
												<option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
												<option data-countryCode="BH" value="973">Bahrain (+973)</option>
												<option data-countryCode="BD" value="880">Bangladesh (+880)</option>
												<option data-countryCode="BB" value="1246">Barbados (+1246)</option>
												<option data-countryCode="BY" value="375">Belarus (+375)</option>
												<option data-countryCode="BE" value="32">Belgium (+32)</option>
												<option data-countryCode="BZ" value="501">Belize (+501)</option>
												<option data-countryCode="BJ" value="229">Benin (+229)</option>
												<option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
												<option data-countryCode="BT" value="975">Bhutan (+975)</option>
												<option data-countryCode="BO" value="591">Bolivia (+591)</option>
												<option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
												<option data-countryCode="BW" value="267">Botswana (+267)</option>
												<option data-countryCode="BR" value="55">Brazil (+55)</option>
												<option data-countryCode="BN" value="673">Brunei (+673)</option>
												<option data-countryCode="BG" value="359">Bulgaria (+359)</option>
												<option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
												<option data-countryCode="BI" value="257">Burundi (+257)</option>
												<option data-countryCode="KH" value="855">Cambodia (+855)</option>
												<option data-countryCode="CM" value="237">Cameroon (+237)</option>
												<option data-countryCode="CA" value="1">Canada (+1)</option>
												<option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
												<option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
												<option data-countryCode="CF" value="236">Central African Republic (+236)</option>
												<option data-countryCode="CL" value="56">Chile (+56)</option>
												<option data-countryCode="CN" value="86">China (+86)</option>
												<option data-countryCode="CO" value="57">Colombia (+57)</option>
												<option data-countryCode="KM" value="269">Comoros (+269)</option>
												<option data-countryCode="CG" value="242">Congo (+242)</option>
												<option data-countryCode="CK" value="682">Cook Islands (+682)</option>
												<option data-countryCode="CR" value="506">Costa Rica (+506)</option>
												<option data-countryCode="HR" value="385">Croatia (+385)</option>
												<option data-countryCode="CU" value="53">Cuba (+53)</option>
												<option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
												<option data-countryCode="CY" value="357">Cyprus South (+357)</option>
												<option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
												<option data-countryCode="DK" value="45">Denmark (+45)</option>
												<option data-countryCode="DJ" value="253">Djibouti (+253)</option>
												<option data-countryCode="DM" value="1809">Dominica (+1809)</option>
												<option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
												<option data-countryCode="EC" value="593">Ecuador (+593)</option>
												<option data-countryCode="EG" value="20">Egypt (+20)</option>
												<option data-countryCode="SV" value="503">El Salvador (+503)</option>
												<option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
												<option data-countryCode="ER" value="291">Eritrea (+291)</option>
												<option data-countryCode="EE" value="372">Estonia (+372)</option>
												<option data-countryCode="ET" value="251">Ethiopia (+251)</option>
												<option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
												<option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
												<option data-countryCode="FJ" value="679">Fiji (+679)</option>
												<option data-countryCode="FI" value="358">Finland (+358)</option>
												<option data-countryCode="FR" value="33">France (+33)</option>
												<option data-countryCode="GF" value="594">French Guiana (+594)</option>
												<option data-countryCode="PF" value="689">French Polynesia (+689)</option>
												<option data-countryCode="GA" value="241">Gabon (+241)</option>
												<option data-countryCode="GM" value="220">Gambia (+220)</option>
												<option data-countryCode="GE" value="7880">Georgia (+7880)</option>
												<option data-countryCode="DE" value="49">Germany (+49)</option>
												<!--<option data-countryCode="GH" value="233">Ghana (+233)</option>-->
												<option data-countryCode="GI" value="350">Gibraltar (+350)</option>
												<option data-countryCode="GR" value="30">Greece (+30)</option>
												<option data-countryCode="GL" value="299">Greenland (+299)</option>
												<option data-countryCode="GD" value="1473">Grenada (+1473)</option>
												<option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
												<option data-countryCode="GU" value="671">Guam (+671)</option>
												<option data-countryCode="GT" value="502">Guatemala (+502)</option>
												<option data-countryCode="GN" value="224">Guinea (+224)</option>
												<option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
												<option data-countryCode="GY" value="592">Guyana (+592)</option>
												<option data-countryCode="HT" value="509">Haiti (+509)</option>
												<option data-countryCode="HN" value="504">Honduras (+504)</option>
												<option data-countryCode="HK" value="852">Hong Kong (+852)</option>
												<option data-countryCode="HU" value="36">Hungary (+36)</option>
												<option data-countryCode="IS" value="354">Iceland (+354)</option>
												<option data-countryCode="IN" value="91">India (+91)</option>
												<option data-countryCode="ID" value="62">Indonesia (+62)</option>
												<option data-countryCode="IR" value="98">Iran (+98)</option>
												<option data-countryCode="IQ" value="964">Iraq (+964)</option>
												<option data-countryCode="IE" value="353">Ireland (+353)</option>
												<option data-countryCode="IL" value="972">Israel (+972)</option>
												<option data-countryCode="IT" value="39">Italy (+39)</option>
												<option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
												<option data-countryCode="JP" value="81">Japan (+81)</option>
												<option data-countryCode="JO" value="962">Jordan (+962)</option>
												<option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
												<option data-countryCode="KE" value="254">Kenya (+254)</option>
												<option data-countryCode="KI" value="686">Kiribati (+686)</option>
												<option data-countryCode="KP" value="850">Korea North (+850)</option>
												<option data-countryCode="KR" value="82">Korea South (+82)</option>
												<option data-countryCode="KW" value="965">Kuwait (+965)</option>
												<option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
												<option data-countryCode="LA" value="856">Laos (+856)</option>
												<option data-countryCode="LV" value="371">Latvia (+371)</option>
												<option data-countryCode="LB" value="961">Lebanon (+961)</option>
												<option data-countryCode="LS" value="266">Lesotho (+266)</option>
												<option data-countryCode="LR" value="231">Liberia (+231)</option>
												<option data-countryCode="LY" value="218">Libya (+218)</option>
												<option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
												<option data-countryCode="LT" value="370">Lithuania (+370)</option>
												<option data-countryCode="LU" value="352">Luxembourg (+352)</option>
												<option data-countryCode="MO" value="853">Macao (+853)</option>
												<option data-countryCode="MK" value="389">Macedonia (+389)</option>
												<option data-countryCode="MG" value="261">Madagascar (+261)</option>
												<option data-countryCode="MW" value="265">Malawi (+265)</option>
												<option data-countryCode="MY" value="60">Malaysia (+60)</option>
												<option data-countryCode="MV" value="960">Maldives (+960)</option>
												<option data-countryCode="ML" value="223">Mali (+223)</option>
												<option data-countryCode="MT" value="356">Malta (+356)</option>
												<option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
												<option data-countryCode="MQ" value="596">Martinique (+596)</option>
												<option data-countryCode="MR" value="222">Mauritania (+222)</option>
												<option data-countryCode="YT" value="269">Mayotte (+269)</option>
												<option data-countryCode="MX" value="52">Mexico (+52)</option>
												<option data-countryCode="FM" value="691">Micronesia (+691)</option>
												<option data-countryCode="MD" value="373">Moldova (+373)</option>
												<option data-countryCode="MC" value="377">Monaco (+377)</option>
												<option data-countryCode="MN" value="976">Mongolia (+976)</option>
												<option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
												<option data-countryCode="MA" value="212">Morocco (+212)</option>
												<option data-countryCode="MZ" value="258">Mozambique (+258)</option>
												<option data-countryCode="MN" value="95">Myanmar (+95)</option>
												<option data-countryCode="NA" value="264">Namibia (+264)</option>
												<option data-countryCode="NR" value="674">Nauru (+674)</option>
												<option data-countryCode="NP" value="977">Nepal (+977)</option>
												<option data-countryCode="NL" value="31">Netherlands (+31)</option>
												<option data-countryCode="NC" value="687">New Caledonia (+687)</option>
												<option data-countryCode="NZ" value="64">New Zealand (+64)</option>
												<option data-countryCode="NI" value="505">Nicaragua (+505)</option>
												<option data-countryCode="NE" value="227">Niger (+227)</option>
												<option data-countryCode="NG" value="234">Nigeria (+234)</option>
												<option data-countryCode="NU" value="683">Niue (+683)</option>
												<option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
												<option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
												<option data-countryCode="NO" value="47">Norway (+47)</option>
												<option data-countryCode="OM" value="968">Oman (+968)</option>
												<option data-countryCode="PW" value="680">Palau (+680)</option>
												<option data-countryCode="PA" value="507">Panama (+507)</option>
												<option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
												<option data-countryCode="PY" value="595">Paraguay (+595)</option>
												<option data-countryCode="PE" value="51">Peru (+51)</option>
												<option data-countryCode="PH" value="63">Philippines (+63)</option>
												<option data-countryCode="PL" value="48">Poland (+48)</option>
												<option data-countryCode="PT" value="351">Portugal (+351)</option>
												<option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
												<option data-countryCode="QA" value="974">Qatar (+974)</option>
												<option data-countryCode="RE" value="262">Reunion (+262)</option>
												<option data-countryCode="RO" value="40">Romania (+40)</option>
												<option data-countryCode="RU" value="7">Russia (+7)</option>
												<option data-countryCode="RW" value="250">Rwanda (+250)</option>
												<option data-countryCode="SM" value="378">San Marino (+378)</option>
												<option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
												<option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
												<option data-countryCode="SN" value="221">Senegal (+221)</option>
												<option data-countryCode="CS" value="381">Serbia (+381)</option>
												<option data-countryCode="SC" value="248">Seychelles (+248)</option>
												<option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
												<option data-countryCode="SG" value="65">Singapore (+65)</option>
												<option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
												<option data-countryCode="SI" value="386">Slovenia (+386)</option>
												<option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
												<option data-countryCode="SO" value="252">Somalia (+252)</option>
												<option data-countryCode="ZA" value="27">South Africa (+27)</option>
												<option data-countryCode="ES" value="34">Spain (+34)</option>
												<option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
												<option data-countryCode="SH" value="290">St. Helena (+290)</option>
												<option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
												<option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
												<option data-countryCode="SD" value="249">Sudan (+249)</option>
												<option data-countryCode="SR" value="597">Suriname (+597)</option>
												<option data-countryCode="SZ" value="268">Swaziland (+268)</option>
												<option data-countryCode="SE" value="46">Sweden (+46)</option>
												<option data-countryCode="CH" value="41">Switzerland (+41)</option>
												<option data-countryCode="SI" value="963">Syria (+963)</option>
												<option data-countryCode="TW" value="886">Taiwan (+886)</option>
												<option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
												<option data-countryCode="TH" value="66">Thailand (+66)</option>
												<option data-countryCode="TG" value="228">Togo (+228)</option>
												<option data-countryCode="TO" value="676">Tonga (+676)</option>
												<option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
												<option data-countryCode="TN" value="216">Tunisia (+216)</option>
												<option data-countryCode="TR" value="90">Turkey (+90)</option>
												<option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
												<option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
												<option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
												<option data-countryCode="TV" value="688">Tuvalu (+688)</option>
												<option data-countryCode="UG" value="256">Uganda (+256)</option>
												<option data-countryCode="GB" value="44">UK (+44)</option>
												<option data-countryCode="UA" value="380">Ukraine (+380)</option>
												<option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
												<option data-countryCode="UY" value="598">Uruguay (+598)</option>
												<option data-countryCode="US" value="1">USA (+1)</option>
												<option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
												<option data-countryCode="VU" value="678">Vanuatu (+678)</option>
												<option data-countryCode="VA" value="379">Vatican City (+379)</option>
												<option data-countryCode="VE" value="58">Venezuela (+58)</option>
												<option data-countryCode="VN" value="84">Vietnam (+84)</option>
												<option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
												<option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
												<option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
												<option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
												<option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
												<option data-countryCode="ZM" value="260">Zambia (+260)</option>
												<option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
											</optgroup>
										</select>
										<div id='check_a_ur' style="color:red"></div>
														      </div>
														      <div class='form-group'>
														      	<input type="telephone" class="form-control" id="tel_ur" value="<?php echo $fetch_out_membre['tel_ur'] ?>" placeholder="Entrez le N° de Telephone" maxlength="10">
														      	<div id='check_tel_ur' style="color:red"></div>
														      </div>
															 </div>
														    </div>
														  </div>
														    

														    <div class="form-group">
														    <label class="control-label col-sm-2" for="mail_ur">e-mail:</label>
														    <div class="col-sm-8">
														      <input type="email" class="form-control" id="mail_ur"  value="<?php echo $fetch_out_membre['email_ur'] ?>" placeholder="Entrez L'address e-mail" maxlength="50">
														      <div id='check_mail_ur' style="color:red"></div>
														      </div>
														      </div>


														  <div class="form-group">
														    <label class="control-label col-sm-4" for="rel">Qui est cette personne pour vous?:</label>
														    <div class="col-sm-6"> 
																  <select class="form-control" id="rel">

																  	<option value= "<?php echo $fetch_out_membre['rid']; ?>"><?php echo $fetch_out_membre['relation']; ?></option>

																	<?php
																	for($i=0; $i<$count_rel; $i++){
																		$fetch_rel=$out_rel->fetch();

																	?>
																    <option value= "<?php echo $fetch_rel ["rid"];?>">
																    <?php echo $fetch_rel ["relation"];?> 

																    <?php
																	}

																    ?>

																	</option>
																	<option>Autre</option>

																  </select>
																  <div id='check_rel' style="color:red"></div>
																  <div id="block_rel">
																  <br/>
																  <input type="text" class="form-control" id="rel_alt" style="text-transform: capitalize;" placeholder="Entrez la Relation" maxlength="50">
																  <div id='check_rel_alt' style="color:red"></div>
																  </div>
														    </div>
														  </div> <br/><br/><br/>


														  <div class="form-group">
														    <label class="control-label col-sm-2" for="da" style="color:rgb(130, 0, 31);">Date d'Adhésion:</label>
														    <div class="col-sm-5"> 
														     <div class="bfh-datepicker" data-format="y-m-d" data-date="<?php echo $fetch_out_membre['date_adhesion']; ?>" id="da">
															  <div class="input-prepend bfh-datepicker-toggle" data-toggle="bfh-datepicker">
															    <span class="add-on"><i class="icon-calendar"></i></span>
															    <input type="text" class="input-medium" readonly>
															  </div>
															  <div class="bfh-datepicker-calendar">
															    <table class="calendar table table-bordered">
															      <thead>
															        <tr class="months-header">
															          <th class="month" colspan="4">
															            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
															            <span></span>
															            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
															          </th>
															          <th class="year" colspan="3">
															            <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
															            <span></span>
															            <a class="next" href="#"><i class="icon-chevron-right"></i></a>
															          </th>
															        </tr>
															        <tr class="days-header">
															        </tr>
															      </thead>
															      <tbody>
															      </tbody>
															    </table>
															  </div>
															</div>
															<div id='check_da' style="color:red"></div>
														    </div>
														  </div><br/><br/>



														  
														  <div class="form-group"> 
														    <div class="col-sm-offset-2 col-sm-10">
														      <button type="button" id="submit" name="submit" class="btn btn-default">Sauvegarder</button> &nbsp;&nbsp;&nbsp;
														       <img src="../images/default.gif"  id="lod" class="img-rounded" width="30" height="30">
														    </div>
														  </div>

														</form>
														</div>

														<div class="col-md-1"></div>

													</div>

													</div>

											</div>
						  
				  

          </div>
        </div>
      </div>
    </div>


    <script src="../Lib_bootstrap/jquery-1.12.4.min.js"></script>
    <script src="../Lib_bootstrap/docs/assets/js/vendor/jquery.min.js"></script>
	<script src="../Lib_bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../Lib_bootstrap/js/collapse.js"></script>
	<script src="../Lib_bootstrap/js/dropdown.js"></script>
	<script src="../Lib_bootstrap/js/button.js"></script>
	<script src="../Lib_bootstrap/bootbox.min.js"></script>
	<script src="../Lib_bootstrap/dist/sweetalert.min.js"></script>
	<script src="../country/js/tests/vendor/js/bootstrap-3.0.0.min.js"></script>
	<script src="../country/js/tests/vendor/js/jquery-1.10.2.js"></script>
	<script src="../country/js/lang/fr_FR/bootstrap-formhelpers-countries.fr_FR.js"></script>
	<script src="../country/js/bootstrap-formhelpers-countries.js"></script>
	<script src="../country/js/bootstrap-formhelpers-datepicker.js"></script>
	<script src="../country/js/bootstrap-formhelpers-selectbox.js"></script>
	<script src="../country/js/bootstrap-formhelpers-phone.js"></script>
	<script src="../country/js/bootstrap-formhelpers-languages.js"></script>
	<script src="../country/dist/js/bootstrap-formhelpers.min.js"></script>
	<script src="../jasny/js/jasny-bootstrap.min.js"></script>
	



	<script type="text/javascript">

	 $(function() {

	 	$("#nom").focus();

	 	$('#block_prof').hide();
	 	$('#block_fil').hide();
	 	$('#block_ecole').hide();
	 	$('#block_ae').hide();
	 	$('#block_ac').hide();
	 	$('#block_ac_ta').hide();
	 	$('#block_rel').hide();
	 	$('#lod').hide();


			var prof= $("#prof").val();
			var prof_alt= $("#prof_alt").val();
			var fil= $("#fil").val();
			var fil_alt= $("#fil_alt").val();
			var ecole= $("#ecole").val();
			var ecole_alt= $("#ecole_alt").val();
			var ae= $("#ae").val();
			var ae_alt= $("#ae_alt").val();
			var ac= $("#ac").val();
			var ac_alt= $("#ac_alt").val();
			var ac_ta= $("#ac_ta").val();
			var ac_ta_alt= $("#ac_ta_alt").val();
			var rel= $("#rel").val();
			var rel_alt= $("#rel_alt").val();


		$('#prof').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_prof").show();
        }
        else{
        $("#block_prof").hide();
        $("#prof_alt").val("");
        }
    });

		$('#fil').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_fil").show();
        }
        else{
        $("#block_fil").hide();
        $("#fil_alt").val("");
        }
    });

		$('#ecole').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_ecole").show();
        }
        else{
        $("#block_ecole").hide();
        $("#ecole_alt").val("");
        }
    });

		$('#ae').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_ae").show();
        }
        else{
        $("#block_ae").hide();
        $("#ae_alt").val("");
        }
    });

		$('#ac').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_ac").show();
        }
        else{
        $("#block_ac").hide();
        $("#ac_alt").val("");
        }
    });
		$('#ac_ta').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_ac_ta").show();
        }
        else{
        $("#block_ac_ta").hide();
        $("#ac_ta_alt").val("");
        }
    });

			$('#rel').on('change',function(){
        if( $(this).val()=="Autre"){
        $("#block_rel").show();
        }
        else{
        $("#block_rel").hide();
        $("#rel_alt").val("");
        }
    });


			$("#reset").click(function() {

		$('#block_prof').hide();
	 	$('#block_fil').hide();
	 	$('#block_ecole').hide();
	 	$('#block_ae').hide();
	 	$('#block_ac').hide();
	 	$('#block_ac_ta').hide();
	 	$('#block_rel').hide();
	 	$('#lod').hide();
	 	$("#nom").focus();
		});


$.fn.clearForm = function() {
  return this.each(function() {
    var type = this.type, tag = this.tagName.toLowerCase();
    if (tag == 'form')
      return $(':input',this).clearForm();
    if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'number' || type == 'email')
      this.value = '';
    else if (type == 'checkbox' || type == 'radio')
      this.checked = false;
    else if (tag == 'select')
      this.selectedIndex = 0;
  });
};


	 	$("#submit").click(function() {


	 		var nom= $("#nom").val();
			var prenom= $("#prenom").val();
			var genre= $("#genre").val();
			var date= $("#date").val();
			var pays= $("#pays").val();
			var prof= $("#prof").val();
			var prof_alt= $("#prof_alt").val();
			var fil= $("#fil").val();
			var fil_alt= $("#fil_alt").val();
			var ecole= $("#ecole").val();
			var ecole_alt= $("#ecole_alt").val();
			var sim= $("#sim").val();
			var ne= $("#ne").val();
			var lha= $("#lha").val();
			var mail= $("#mail").val();
			var fac= $("#facebook").val();
			var a= $("#a").val();
			var tel= $("#tel").val();
			var b= $("#b").val();
			var whatsapp= $("#whatsapp").val();

			var temps= $("#temps").val();
			var ae= $("#ae").val();
			var ae_alt= $("#ae_alt").val();
			var bpt= $("#bpt").val();
			var ac= $("#ac").val();
			var ac_alt= $("#ac_alt").val();
			var ac_ta= $("#ac_ta").val();
			var ac_ta_alt= $("#ac_ta_alt").val();

			var nom_ur= $("#nom_ur").val();
			var prenom_ur= $("#prenom_ur").val();
			var tel_ur= $("#tel_ur").val();
			var a_ur= $("#a_ur").val();
			var mail_ur= $("#mail_ur").val();
			var rel= $("#rel").val();
			var rel_alt= $("#rel_alt").val();
			var da=$('#da').val();

			var phoneNumber = /[0-9-()+]{3,20}/; 
			var emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
			
			if (prof=="Autre") {
				prof = prof_alt;
					}
				if (fil=="Autre") {
				fil = fil_alt;
					}
				if (ecole=="Autre") {
				ecole = ecole_alt;
					}
				if (ae=="Autre") {
				ae = ae_alt;
					}
				if (ac=="Autre") {
				ac = ac_alt;
					}
				if (ac_ta=="Autre") {
				ac_ta = ac_ta_alt;
					}
				if (rel=="Autre") {
				rel = rel_alt;
					}

		
if (nom.length == 0 ) {
$('#check_nom').html("*Entrez un <strong>Nom</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#nom").focus(); 

$("#nom").change(function(){ $('#check_nom').hide();
});
return false;
}


else if (prenom.length == 0 ) {
$('#check_prenom').html("*Entrez un <strong>Prenom</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#prenom").focus(); 

$("#prenom").change(function(){ $('#check_prenom').hide();
});
return false;
}

 else if ($('input[name=genre]:checked').length == 0 ) {
$('#check_genre').html("*Choisissez un <strong>Genre</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#genre").focus(); 

$("#genre").change(function(){ $('#check_genre').hide();
});
return false;
}

 else if (date.length == 0 ) {
$('#check_date').html("*Choisissez une <strong>Date</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#date").focus(); 

$("#date").change(function(){ $('#check_date').hide();
});
return false;
}
else if (pays.length == 0 ) {
$('#check_pays').html("*Selectionner un <strong>Pays</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#Pays").focus(); 

$("#Pays").change(function(){ $('#check_Pays').hide();
});
return false;
}
else if (prof.length == 0 || prof=="--- Choisir une Profession ---" || prof=="Autre") {
$('#check_prof').html("*Selectionnez une <strong>Profession</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#prof").focus(); 

$("#prof").change(function(){ $('#check_prof').hide();
});
return false;
}
else if (fil.length == 0 || fil=="--- Choisir une Filière ---" || fil=="Autre") {
$('#check_fil').html("*Selectionnez une <strong>Filière</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#fil").focus(); 

$("#fil").change(function(){ $('#check_fil').hide();
});
return false;
}
else if (ecole.length == 0 || ecole=="--- Choisir une Ecole/Université ---" || ecole=="Autre") {
$('#check_ecole').html("*Selectionnez une <strong>Ecole/Université</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#ecole").focus(); 

$("#ecole").change(function(){ $('#check_ecole').hide();
});
return false;
}
else if ($('input[name=sim]:checked').length == 0 ) {
$('#check_sim').html("*Choisissez une <strong> Option</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#sim").focus(); 

$("input[name=sim]").change(function(){ $('#check_sim').hide();
});
return false;
}
else if (ne.length == 0 ) {
$('#check_ne').html("*Entrez un <strong>Nombre</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#ne").focus(); 

$("#ne").change(function(){ $('#check_ne').hide();
});
return false;
}
else if (lha.length == 0 ) {
$('#check_lha').html("*Entrez un <strong>Lieu d'Habitation</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#lha").focus(); 

$("#lha").change(function(){ $('#check_lha').hide();
});
return false;
}
else if ((mail.length == 0) || (!mail.match(emailRegex))) {
$('#check_mail').html("*Entrez une addresse <strong>Email Valide</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#mail").focus(); 

$("#mail").change(function(){ $('#check_mail').hide();
});
return false;
}
else if (fac.length == 0 ) {
$('#check_fac').html("*Entrez un pseudo <strong>Facebook</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#facebook").focus(); 

$("#fac").change(function(){ $('#check_fac').hide();
});
return false;
}
 else if ((tel.length < 10) || (!tel.match(phoneNumber))) {
$('#check_tel').html("*Entrez un <strong>Numero Tel Valide</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#tel").focus(); 

$("#tel").change(function(){ $('#check_tel').hide();
});
return false;
}

 else if ((whatsapp.length < 10) || (!whatsapp.match(phoneNumber))) {
$('#check_whatsapp').html("*Entrez un <strong>Numero Tel Valide</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#whatsapp").focus(); 

$("#whatsapp").change(function(){ $('#check_whatsapp').hide();
});
return false;
}



 else if (temps.length == 0 ) {
$('#check_temps').html("*Entrez un <strong>Temps</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#temps").focus(); 

$("#temps").change(function(){ $('#check_temps').hide();
});
return false;
}
else if (ae.length == 0 || ae=="--- Choisir une Eglise ---" || ae=="Autre") {
$('#check_ae').html("*Selectionnez une <strong>Eglise</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#ae").focus(); 

$("#ae").change(function(){ $('#check_ae').hide();
});
return false;
}
else if ($('input[name=bpt]:checked').length == 0 ) {
$('#check_bpt').html("*Choisissez une <strong>Option</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#bpt").focus(); 

$("input[name=bpt]").change(function(){ $('#check_bpt').hide();
});
return false;
}
else if (ac.length == 0 || ac=="--- Choisir une Activité ---" || ac=="Autre") {
$('#check_ac').html("*Selectionnez une <strong>Activité</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#ac").focus(); 

$("#ac").change(function(){ $('#check_ac').hide();
});
return false;
}
else if (ac_ta.length == 0 || ac_ta=="--- Choisir une Activité ---" || ac_ta=="Autre") {
$('#check_ac_ta').html("*Selectionnez une <strong>Activité</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#ac_ta").focus(); 

$("#ac_ta").change(function(){ $('#check_ac_ta').hide();
});
return false;
}

else if (nom_ur.length == 0 ) {
$('#check_nom_ur').html("*Entrez un <strong>Nom</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#nom_ur").focus(); 

$("#nom_ur").change(function(){ $('#check_nom_ur').hide();
});
return false;
}
 else if (prenom_ur.length == 0 ) {
$('#check_prenom_ur').html("*entrez un <strong>Prenom</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#prenom_ur").focus(); 

$("#prenom_ur").change(function(){ $('#check_prenom_ur').hide();
});
return false;
}
 else if (rel.length == 0 || rel=="--- Choisir une Relation ---" || rel=="Autre") {
$('#check_rel').html("*Selectionnez une <strong>Relation</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#rel").focus(); 

$("#rel").change(function(){ $('#check_rel').hide();
});
return false;
}
 else if ((tel_ur.length < 10) || (!tel_ur.match(phoneNumber))) {
$('#check_tel_ur').html("*Entrez un <strong>Numero Tel Valide</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#tel_ur").focus(); 

$("#tel_ur").change(function(){ $('#check_tel_ur').hide();
});
return false;
}

else if ((mail_ur.length == 0) || (!mail_ur.match(emailRegex))) {
$('#check_mail_ur').html("*Entrez une addresse <strong>Email Valide</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#mail_ur").focus(); 

$("#mail_ur").change(function(){ $('#check_mail_ur').hide();
});
return false;
}
 else if (da.length == 0 ) {
$('#check_da').html("*Choisissez une <strong>Date</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#da").focus(); 

$("#da").change(function(){ $('#check_da').hide();
});
return false;
}
 else{


				var per_urgence= $('#per_urgence').val();
				var info_spi= $("#info_spi").val();
				var mid= $("#mid").val();

var dataString = "mid="+ mid + "&nom="+ nom +"&prenom="+ prenom +"&genre="+ genre +"&date="+ date +"&pays="+ pays + "&prof="+ prof +"&fil="+ fil+
"&ecole="+ ecole +"&sim="+ sim +"&ne="+ ne + "&lha="+ lha +"&mail="+ mail+"&fac="+ fac +"&codetel="+ a + "&tel="+ tel+ "&codewhat="+ b + "&whatsapp="+ whatsapp+"&temps="+ temps+
"&ae="+ ae +"&bpt="+ bpt +"&ac_ta="+ ac_ta +"&ac="+ ac + "&nom_ur="+ nom_ur +"&prenom_ur="+ prenom_ur +"&code_ur="+ a_ur+ "&tel_ur=" + tel_ur +"&mail_ur="+ mail_ur +"&rel="+ rel +"&prof_alt="+ prof_alt +"&fil_alt=" + fil_alt+ 
"&ecole_alt=" + ecole_alt+ "&ae_alt=" + ae_alt +"&ac_alt=" + ac_alt +"&ac_ta_alt=" + ac_ta_alt+ "&rel_alt=" + rel_alt+ "&da=" + da + "&info_spi="+ info_spi + "&per_urgence=" + per_urgence; 

//alert(dataString);
$('#lod').show();
//$("#flash").show();
//$("#flash").fadeIn(400).html(bootbox.alert("<div class='progress' ><div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Loading</strong></div></div>"));
$.ajax({
type: "POST",
url: "modifier_membre_eng.php",
data:dataString,
cache:true,
processData:false,
success: function(out){
	{
		//$("#flash").fadeIn(400).html(out);
	if(out=="OK"){
	//$('#form_membre').clearForm();
	$('#lod').hide();
	bootbox.alert("<strong>Données du membre Modifiées!</strong>", function() {
	window.location.href ='membre_photo_mod.php?mid='+ mid;
	});
	}else if (out=="NO_prof"){
	$('#lod').hide();
	bootbox.alert("<strong>Cette profession a deja été enregistré, veuillez la selectionner dans la liste déroulante</strong>", function(result) { 
	$("#prof").focus();
	$('#check_prof').html("*Choisissez cette profession dans <strong>la liste déroulante</strong>").show();
	});
	$("#prof").change(function(){ $('#check_prof').hide();
	})

	}else if (out=="NO_fil"){
	$('#lod').hide();
	bootbox.alert("<strong>Cette filière a deja été enregistré, veuillez la selectionner dans la liste déroulante</strong>", function(result) { 
	$("#fil").focus();
	$('#check_fil').html("*Choisissez cette filière dans <strong>la liste déroulante</strong>").show();
	});
	$("#fil").change(function(){ $('#check_fil').hide();
	});
	
	}else if (out=="NO_ecole"){
	$('#lod').hide();
	bootbox.alert("<strong>Cette univercité/école a deja été enregistré, veuillez la selectionner dans la liste déroulante</strong>", function(result) { 
	$("#ecole").focus();
	$('#check_ecole').html("*Choisissez cette université/école dans <strong>la liste déroulante</strong>").show();
	});
	$("#ecole").change(function(){ $('#check_ecole').hide();
	});
	
	}else if (out=="NO_ae"){
	$('#lod').hide();
	bootbox.alert("<strong>Cette église a deja été enregistré, veuillez la selectionner dans la liste déroulante</strong>", function(result) { 
	$("#ae_alt").focus();
	$('#check_ae').html("*Choisissez cette église dans <strong>la liste déroulante</strong>").show();
	});
	$("#ae").change(function(){ $('#check_ae').hide();
	});
	
	}else if (out=="NO_ac"){
	$('#lod').hide();
	bootbox.alert("<strong>Cette activitée a deja été enregistré, veuillez la selectionner dans la liste déroulante</strong>", function(result) { 
	$("#ac").focus();
	$('#check_ac').html("*Choisissez cette activitée dans <strong>la liste déroulante</strong>").show();
	});
	$("#ac").change(function(){ $('#check_ac').hide();
	});
	
	}else if (out=="NO_ac_ta"){
	$('#lod').hide();
	bootbox.alert("<strong>Cette activitée a deja été enregistré, veuillez la selectionner dans la liste déroulante</strong>", function(result) { 
	$("#ac_ta").focus();
	$('#check_ac_ta').html("*Choisissez cette activitée dans <strong>la liste déroulante</strong>").show();
	});
	$("#ac_ta").change(function(){ $('#check_ac_ta').hide();
	});
	
	}else if (out=="NO_rel"){
	$('#lod').hide();
	bootbox.alert("<strong>Cette relation a deja été enregistré, veuillez la selectionner dans la liste déroulante</strong>", function(result) { 
	$("#rel").focus();
	$('#check_rel').html("*Choisissez cette relation dans <strong>la liste déroulante</strong>").show();
	});
	$("#rel").change(function(){ $('#check_rel').hide();
	});
	
	}
	
	}
	


}  
});
return false;
}

});

});

	</script>

		<?php
		$con=Null;
		?>


			

	</body>
			


</html>