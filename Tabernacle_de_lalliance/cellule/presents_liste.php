<?php
include_once("../sessions/session_cellule.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$cellule=$_SESSION['cellule'];
$zone_cel=$_SESSION['zone_cel'];
$rid=$_GET['rid'];
$reunion_det=$con->query("select * from reunion inner join cellule on reunion.cellule=cellule.cid where zone_cel='$zone_cel' and rid='$rid';") or die (print_r($con->errorInfo()));
$fetch_reunion_det=$reunion_det->fetch();
$out_membre_cel=$con->query("select * from presence inner join membre_cel on membre_cel.mcid=presence.membre 
	inner join cellule on membre_cel.cellule=cellule.cid where zone_cel='$zone_cel'
	and presence.reunion='$rid' and statut='p';") or die (print_r($con->errorInfo()));
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
				    <table class="table table-striped table-condensed table-hover" id="tab_2">
			  	
				    <thead>
				      <tr>
				        <th class="text-center">Nom</th>
				        <th class="text-center">Prenom</th>
				        <th class="text-center">Option</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php
					    	for($i=0; $i<$count_membre_cel; $i++){
							$fetch_membre_cel=$out_membre_cel->fetch();

					    		?>
				      <tr>
				        <td class="text-center"><?php echo $fetch_membre_cel['nom'];?></td>
				        <td class="text-center"><?php echo $fetch_membre_cel['prenom'];?></td>
				        <td class="text-center" style="vertical-align:middle">
				        <?php
				        if($fetch_reunion_det['statut']=='ON'){
				        ?>
				        <span style="color:red;" class="glyphicon glyphicon-ban-circle "></span>
				        <?php
				    		}else if($fetch_reunion_det['statut']=='OFF'){
				        ?>
					  	 <a href="javascript:elver_pre('<?php echo $fetch_membre_cel['mcid']; ?>', '<?php echo $rid; ?>')" title="Enlever" ><button type="button" class="btn btn-danger">Enlever</button></a>
					  		<?php
					  			}
					  		?>
					  	</td>
				    	</tr>
				    <?php
				    } 
					 ?>
				    </tbody>
				  </table>
				  </div>	
				  </div>	
												  

</body>


 
	<script src="../data_table/media/js/jquery.dataTables.min.js"></script>


	 <script type="text/javascript">
	 $(document).ready(function(){
    $('#tab_2').dataTable();
	});
	</script>

</html>
