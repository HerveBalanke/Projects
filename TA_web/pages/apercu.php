
<?php

$lien=$_GET['lien'];

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

<body>
   
 <div class="row">
      <div class="col-md-12">  
<object data="<?php echo $lien; ?>" type="application/pdf" width="100%" height="720">
</object>
</div>
</div>
 <!-- <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> -->
              <!-- <br/><br/><br/><br/><br/><br/><br/><br/> -->
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