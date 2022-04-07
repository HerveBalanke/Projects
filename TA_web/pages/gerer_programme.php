
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
        <title> Tabernacle de L'Alliance</title>
        <link rel="shortcut icon" type="image/x-icon" href="../images/favicon(2).ico" />
        <link href="../Lib_bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- <link href="../Lib_bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet"> -->
        <!-- <link href="../country/dist/css/bootstrap-formhelpers.min.css" rel="stylesheet">
        <Link href="../country/js/tests/vendor/css/bootstrap-3.0.0.min.css" rel="stylesheet"> -->
        <link type="text/css" rel="stylesheet" href="../Lib_bootstrap/tab.css"  >
        <link href="../jasny/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="../Lib_bootstrap/dist/sweetalert.css">
  
        
  </head>

  <body>

       <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

    <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid" id="nv">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar_col">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.php"><img src="../images/used/logo_tuned.jpg" class="img-rounded img-responsive" alt="logo" style="width:180px;height:75px"></a>
    </div> <br/>
    <div class="collapse navbar-collapse" id="navbar_col">
     <ul class="nav navbar-nav navbar-right" id="navbar">
      <li class="active"><a href="gerer_programme.php">Gerer programmes</a></li>
          <li><a href='ajouter_photo.php'>Gerer galerie</a></li>
            <li><a href="gerer_messages.php">Gerer messages</a></li>
            <li style="background-color: rgb(255, 255, 255);"><a href="../index.php"> <span class="glyphicon glyphicon-new-window"></span> Site</a></li>
            <li><a href="../logout.php"> <span class="glyphicon glyphicon-log-out"></span> Deconnection</a></li>
      </ul>
    </div>
  </div>
</nav>

      </div>
      </div>
      </div>
    </div><br/><br/>



    <div class="jumbotron" style="font-family:'century gothic', 'trebuchet MS', verdana;">
                <h1>Gerer programmes</h1>
          </div><br/><br/>


     <div class="section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

                            <div class="row">
                                 <div class="col-md-10" id="sec" style="background-color:rgb(255, 255, 255);">
                                  <h1 class="text-center" style="color:rgb(104, 1, 1);"> <b> Ajouter un Programme</b> </h1>
                            <form class="form-horizontal"  method="POST" action="gerer_programme.php"  enctype="multipart/form-data" role="form">

                              <div id="flash"></div>
                              <br/>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="titre">Titre <span style="color:red;">*</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="titre" id="titre" style="text-transform: capitalize;" placeholder="Entrez le titre" maxlength="50">
                                  <div id='check_titre' style="color:red"></div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-2" for="theme">Theme <span style="color:red;">*</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="theme" id="theme" style="text-transform: capitalize;" placeholder="Entrez le theme" maxlength="50">
                                  <div id='check_theme' style="color:red"></div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-2" for="desc">Description <span style="color:red;">*</span></label>
                                <div class="col-sm-8">
                                  <textarea class="form-control" rows="5" name="desc" id="desc" maxlength="255"></textarea>
                                  <div id='check_desc' style="color:red"></div>
                                </div>
                              </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="date">Date <span style="color:red;">*</span></label>
                                <div class="col-sm-8">
                                  <input type="date" class="form-control" name="date" id="date" style="text-transform: capitalize;" placeholder="Entrez la date" maxlength="50">
                                  <div id='check_date' style="color:red"></div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-2" for="heure">Heure <span style="color:red;">*</span></label>
                                <div class="col-sm-8">
                                  <input type="heure" class="form-control" name="heure" id="heure" style="text-transform: capitalize;" placeholder="Entrez l'heure" maxlength="50">
                                  <div id='check_heure' style="color:red"></div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-2" for="file">Affiche <span style="color:red;">*</span></label>
                                <div class="col-sm-8">
                                  <input type="file" name="file" id="file">
                                  <div id='check_file' style="color:red"></div>
                                </div>
                              </div>

                              
                              <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" id="submit" name="submit" class="btn btn-default">Sauvegarder</button> &nbsp;&nbsp;&nbsp;
                                  <button type="reset" id="reset" name="reset" class="btn btn-default">Reprendre</button>&nbsp;&nbsp;&nbsp;
                                   <img src="../images/default.gif"  id="lod" class="img-rounded" width="30" height="30">
                                </div>
                              </div>

                            </form>
                            </div>

                            <div class="col-md-2">
                              <a href="gerer_programmes_list.php"> <button type="button" id="manage" name="manage" class="btn btn-default" style="background-color:rgb(255, 213, 29); border:rgb(255, 213, 29); outline:none;">Gerer les Programmes</button> </a>
                            </div>

                          </div>

                      </div>
          </div>

          <?php include "gerer_programmes_eng.php"; ?>

          <div class="row"  style="color:rgb(255, 213, 29);">
         <div class="col-md-12"> 
          <br/><br/><br/><br/>
          <br/><br/><br/><br/>
          <br/><br/><br/><br/>
          <br/><br/><br/><br/>
          <br/><br/><br/><br/>

         </div>
         </div>

          <div class="row"  style="color:rgb(104, 1, 1); background:rgb(255, 213, 29);" id="footer">
      <footer class="col-md-12" >
          <h5 class="text-center">Tabernacle de L'Alliance &reg;</h5> 
        </footer>
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

    $('#lod').hide();
    $("#reset").click(function() {
    $("#titre").focus();
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

      var titre= $("#titre").val();
      var theme= $("#theme").val();
      var desc= $("#desc").val();
      var date= $("#date").val();
      var heure= $("#heure").val();
      var file= $("#file").val();
      // alert("file");
    

if (titre.length == 0 ) {
$('#check_titre').html("*Entrez un <strong>Titre</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#titre").focus(); 

$("#titre").change(function(){ $('#check_titre').hide();
});
return false;
}

else if (theme.length == 0 ) {
$('#check_theme').html("*Entrez une <strong>Thème</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#theme").focus(); 

$("#theme").change(function(){ $('#check_theme').hide();
});
return false;
}

else if (desc.length == 0 ) {
$('#check_desc').html("*Entrez une <strong>Description</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#desc").focus(); 

$("#desc").change(function(){ $('#check_desc').hide();
});
return false;
}

else if (date.length == 0 ) {
$('#check_date').html("*Entrez une <strong>Date</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#date").focus(); 

$("#date").change(function(){ $('#check_date').hide();
});
return false;
}

else if (heure.length == 0 ) {
$('#check_heure').html("*Entrez une <strong>Heure</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#heure").focus(); 

$("#heure").change(function(){ $('#check_heure').hide();
});
return false;
}

else if (file.length == 0 ) {
$('#check_file').html("*Selectionner une <strong>Affiche</strong>").show(); // This Segment Displays The Validation Rule For All Fields
$("#file").focus(); 

$("#file").change(function(){ $('#check_file').hide();
});
return false;
}
$('#lod').show();
$('#lod').hide();

});

});

  </script>

    <?php
    $con=Null;
    ?>


      

  </body>
      


</html>