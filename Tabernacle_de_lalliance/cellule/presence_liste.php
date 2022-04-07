<?php
include_once("../sessions/session_cellule.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$cellule=$_SESSION['cellule'];
$zone_cel=$_SESSION['zone_cel'];
$rid=$_GET['rid'];
$reunion_det=$con->query("select * from reunion inner join cellule on reunion.cellule=cellule.cid where zone_cel='$zone_cel' and rid='$rid';") or die (print_r($con->errorInfo()));
$fetch_reunion_det=$reunion_det->fetch();
$out_membre_cel=$con->query("SELECT mcid from membre_cel inner join cellule on membre_cel.cellule=cellule.cid where zone_cel='$zone_cel' and mcid not in (SELECT membre from presence where reunion='$rid');") or die (print_r($con->errorInfo()));
$count_membre_cel=$out_membre_cel->rowCount();

?>				

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">
			
		   	  
	</head>

					

	<body>
				
						<div class="panel-body">
			  	<div class="table-responsive">
				    <table class="table table-striped table-condensed table-hover" id="tab_1">
			  	
				    <thead>
				      <tr>
				        <th class="text-center">Nom</th>
				        <th class="text-center">Prenom</th>
				        <th class="text-center">Present</th>
				        <th class="text-center">Abscent</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php
					    	for($i=0; $i<$count_membre_cel; $i++){
							$fetch_membre_cel=$out_membre_cel->fetch();
							$cmid=$fetch_membre_cel['mcid'];
							$out_membre_cel_det=$con->query("select * from membre_cel where mcid='$cmid';") or die (print_r($con->errorInfo()));
							$fetch_membre_cel_det=$out_membre_cel_det->fetch();

							if($fetch_reunion_det['theme']=='OFF'){

					    		?>
					    	<tr>
				        <td class="text-center"></td>
				        <td class="text-center">Réuinion</td>
					  	<td class="text-center" style="vertical-align:middle"> clot </td>
					  	<td class="text-center" style="vertical-align:middle"> </td>
					 		 </tr>

					  	<?php
					  			}else if($fetch_reunion_det['statut']=='OFF'){
					  		?>

				      <tr>
				        <td class="text-center"><?php echo $fetch_membre_cel_det['nom'];?></td>
				        <td class="text-center"><?php echo $fetch_membre_cel_det['prenom'];?></td>
					  	<td class="text-center" style="vertical-align:middle">
					  	 <a href="javascript:pre_mid('<?php echo $fetch_membre_cel_det['mcid']; ?>', '<?php echo $rid; ?>')" title="Present" ><button type="button" class="btn btn-success">Present</button></a></td>
	       				<td class="text-center" style="vertical-align:middle"><a href="javascript:abs_mid('<?php echo $fetch_membre_cel_det['mcid']; ?>', '<?php echo $rid; ?>')" title="Absent" ><button type="button" class="btn btn-danger">Absent</button></a></td>
				    	</tr>
				    <?php
				    } 
					}
					 ?>
				    </tbody>
				  </table> <br/>
				  <?php if($fetch_reunion_det['statut']=='ON'){ ?>
				  <span style="color:red;" class="glyphicon glyphicon-ban-circle "></span>
				  <?php
				    }else if($fetch_reunion_det['statut']=='OFF'){
				    ?>
				    <a href="javascript:clore(<?php echo $rid; ?>)" title="Clore" ><button type="button" class="btn btn-primary">Clore</button></a>
				    <?php
				    }
					 ?>

				  </div>	
				  </div>	
												  

</body>


 
	<script src="../data_table/media/js/jquery.dataTables.min.js"></script>


	 <script type="text/javascript">
	 $(document).ready(function(){
    $('#tab_1').dataTable();
	});
	</script>

</html>

												    
