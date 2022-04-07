<?php
require_once("../connection.php");
$query=$con->query("SELECT * from affiches order by afid desc;");
$count=$query->rowCount();
?>

<!DOCTYPE html>
<html>
	<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
   			<title> Tabernacle de L'Alliance</title>
   			<link rel="shortcut icon" type="image/x-icon" href="../images/favicon(2).ico" />
   			<link href="../Lib_bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   			<link href="../Lib_bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
   			<link rel="stylesheet" type="text/css" href="../Lib_bootstrap/dist/sweetalert.css">
   			<link type="text/css" rel="stylesheet" href="../Lib_bootstrap/tab.css">

   	</head>

	<!-- <body> -->
<body>
		
		<div class="section">
	 	 <nav class="navbar navbar-default navbar-fixed-top">
		    <div class="container-fluid" id="nv">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar_col">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="../images/used/logo_tuned.jpg" class="img-rounded img-responsive" alt="logo"  style="width:180px;height:75px" ></a>
        </div> <br/>
        <div class="collapse navbar-collapse" id="navbar_col">
         <ul class="nav navbar-nav navbar-right" id="navbar">
          <li><a href="../index.php">Acceuil</a></li>
          <li class="active"><a href="program.php">Programmes</a></li>
          <li ><a href="galerie.php">Galerie</a></li>
          <li><a href="branches.php">Branches</a></li>
            <li><a href="messages.php">Messages</a></li>  
          <li><a href="contacts.php">Contacts</a></li>
          </ul>
        </div>
      </div>
		</nav> 
		</div><br/><br/><br/>


            <div class="jumbotron">
                    <h1>Programmes</h1>
            </div><br/><br/>

        <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">            
          <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" style="background-color:rgb(255, 213, 29);">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div><br/>
          <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav nav-pills nav-stacked" id="navbar_2">
            <li class="active" > <a href="#1b"  data-toggle="pill">Cultes</a></li>
            <li><a href="#2b"  data-toggle="pill">Activitées Mensuelles</a></li>
            <li><a href="#3b"  data-toggle="pill">Programmes Speciaux</a></li>
            <li><a href="#4b"  data-toggle="pill">Programmes à Venir</a></li>
          </ul>
        </div>
        </div>

        <div class="col-md-8"> 
         
                <br/>

                <div class="tab-content clearfix">
                  <div class="tab-pane fade in active" id="1b"  style="background-color:rgb(255, 213, 29);">

                          <br/><h3 class="text-center" style="color:rgb(104, 1, 1);"> <b>Cultes </b></h3><br/>

                    <table class="table" style="color:rgb(104, 1, 1); background-color:rgb(255, 213, 29);">
                        <tbody>
                          <tr>
                            <td><b>Culte de l’Alliance <b></td>
                            <td>Culte de célébration à l’Eternel</td>
                            <td>Tous les dimanches - de <b>9H à 11H (Tantra Blue Gate),</b><br/>
                              <b>14H à 15H30 (Aladjo)</b>

                            </td>
                          </tr>
                          <tr>
                            <td><b>Vendredi miracle <b></td>
                            <td>Culte de prière et intercession</td>
                            <td>Tous les vendredis - de <b>18H à 20H30mn</b></td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                  <div class="tab-pane fade " id="2b" style="background-color:rgb(255, 255, 255);">

                         <br/><h3 class="text-center" style="color:rgb(104, 1, 1);"> <b>Activitées Mensuelles </b></h3><br/>
                    
                    <table class="table" style="color:rgb(104, 1, 1);">
                        <tbody>
                          <tr>
                            <td><b>La semaine d’accentuation spirituelle <b></td>
                            <td>Programme de séminaire organisé chaque mois sur 
                              une période de 3 jours pendant laquelle nous jeunons, 
                              avec des thèmes inspirés par le Saint-Esprit pour le 
                              renforcement spirituel des saints. </td>
                          </tr>
                          <tr>
                            <td><b>La nuit de l’exaucement <b></td>
                            <td>Une veillée de prière qui se tient au 3eme jour du 
                              séminaire pour clôturer le programme avec un revêtement 
                              de puissance du Saint-Esprit qui nous accompagnera durant
                               tout le mois.</td>
                          </tr>
                        </tbody>
                      </table>
                  </div>

                  <div class="tab-pane fade " id="3b">

                         <br/><h3 class="text-center" style="color:rgb(255, 213, 29);"> <b>Programmes Spéciaux </b></h3><br/>
                    
                    <table class="table" style="color:rgb(255, 213, 29);">
                        <tbody>
                          <tr>
                            <td><b>Le Sommet Africain des Champions (SAC) <b></td>
                            <td>Une conférence dans le but d’équiper les leaders et 
                              futures leaders d’Afrique francophone selon la bible. 
                              Elle se tient une fois par an avec des orateurs de qualités 
                              venant d’horizons différentes dans le mois d’Octobre.</td>
                          </tr>
                          <tr>
                            <td><b>Le Concerto des Indépendances <b></td>
                            <td>Un moment de célébration a Jésus pour la liberté que nous 
                              avons en lui et pour l’indépendance de nos différentes nations. 
                              Le slogan est: Indépendant des hommes, mais dépendant entièrement 
                              de Dieu. Il se tient une fois par an dans le mois d’Aout. </td>
                          </tr>
                          <tr>
                            <td><b>L’école des champions <b></td>
                            <td>Conférences dans lesquelles nous éduquons, formons et équipons 
                              les saints sur des thèmes assez importants dans la société en utilisant 
                              l’approche ou le point de vue de Dieu.</td>
                          </tr>
                        </tbody>
                      </table>
                     
                      </div>

                      <div class="tab-pane fade " id="4b" style="background-color:rgb(255, 213, 29);">

                         <br/><h3 class="text-center" style="color:rgb(104, 1, 1);"> <b>Programmes à Venir </b></h3><br/>
                    
                    <table class="table" style="color:rgb(104, 1, 1); background-color:rgb(255, 213, 29);">
                        <tbody>

                          <?php
                    for($i=0; $i<$count; $i++){
                      $fetch_programme=$query->fetch();
                      ?>

                          <tr>
                            <div class="row" style=" border-bottom: 3px solid rgb(104, 1, 1);">
                            <div class="col-md-6" style="line-height: 150px; text-align: center;"> 
                              <img src="<?php echo $fetch_programme['lien']; ?>" class="img-thumbnail img-responsive" alt="" style="width:500px; height:300px; border-radius: 0px 0px; ">
                              </div><br/>
                              <div class="col-md-6" style="padding: 0px 20px 0px 20px; color:rgb(104, 1, 1); "> 
                              <b><?php echo $fetch_programme['titre'];?></b><br/>
                              Thème: <b><?php echo $fetch_programme['theme'];?></b><br/><br/>
                              Description: <b><?php echo $fetch_programme['description'];?></b><br/><br/>
                              Date: <b><?php echo $fetch_programme['date'];?></b><br/>
                              Heure: <b><?php echo $fetch_programme['heure'];?></b><br/><br/>
                            </div>
                            </div>
                          </tr>

                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                     
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
              <br/><br/><br/><br/><br/><br/><br/><br/>
        <div class="container-fluid">   
        <div class="row"  style="color:rgb(104, 1, 1); background:rgb(255, 213, 29);">
      <footer class="col-md-12">
          <h5 class="text-center">Tabernacle de L'Alliance &reg;</h5> 
        </footer>
      </div>
      </div>


	</body>

			<script src="../Lib_bootstrap/jquery-1.12.4.min.js"></script>
		    <script src="../Lib_bootstrap/docs/assets/js/vendor/jquery.min.js"></script>
			<script src="../Lib_bootstrap/dist/js/bootstrap.min.js"></script>
			<script src="../Lib_bootstrap/js/collapse.js"></script>
			<script src="../Lib_bootstrap/js/dropdown.js"></script>
			<script src="../Lib_bootstrap/js/button.js"></script>
			<script src="../Lib_bootstrap/bootbox.min.js"></script>
			<script src="../Lib_bootstrap/dist/sweetalert.min.js"></script>


	</html>