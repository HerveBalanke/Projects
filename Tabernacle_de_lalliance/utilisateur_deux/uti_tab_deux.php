<?php  
include_once("session_deux.php");
?>					

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					<?php
		   			require_once("../setup/connection.php");
		   			$out_uti_deux=$con->query("select * from utilisateur_deux;") or die (print_r($con->errorInfo()));
		   			$count_uti_deux=$out_uti_deux->rowCount();
		   			?>
		   
			   			
			  
	</head>

					

	<body>
									<div class="panel-body"> 
									<div class="table-responsive">
									  <table class="table table-striped table-condensed table-hover" id="table_deux">
									    <thead>
									      <tr>
									        <th class="text-center">Photo</th>
									        <th class="text-center">Nom</th>
									        <th class="text-center">Prenom</th>
									        <th class="text-center">Telephone</th>
									        <th class="text-center">Modifier</th>
									        <th class="text-center">Supprimer</th>
									      </tr>
									    </thead>
									    <tbody>

									    	<?php
									    	for($i=0; $i<$count_uti_deux; $i++){
									    		$fetch_uti_deux=$out_uti_deux->fetch();
									    		?>

									      <tr>
									        <td class="text-center" style="vertical-align:middle"><img src="<?php echo $fetch_uti_deux ["photo"];?>" class="img-thumbnail img-responsive" alt="<?php echo $fetch_uti_deux ["nom"];?> <?php echo $fetch_uti_deux ["prenom"];?>" style="width:150px; height:150px"></td>
									        <td class="text-center" style="vertical-align:middle"> <a href="utilisateur_view.php?id=<?php echo $fetch_uti_deux ["uid_deux"];?> & niveau=<?php echo $fetch_uti_deux["niveau"];?>"> <?php echo $fetch_uti_deux ["nom"];?> </a> </td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_uti_deux ["prenom"];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_uti_deux ["tel"];?></td>
									        <td class="text-center" style="vertical-align:middle"><a href="modifier_utilisateur.php? id=<?php echo $fetch_uti_deux ['uid_deux'];?>&niveau=<?php echo $fetch_uti_deux['niveau'];?>" style="color:orange;" ><span class="glyphicon glyphicon-edit"></span></a></td>
									        <td class="text-center" style="vertical-align:middle"><a href="javascript:sup_uid_deux(<?php echo $fetch_uti_deux['uid_deux']; ?>)" style="color:red; " ><span class="glyphicon glyphicon-trash"></span></a></td>
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
    $('#table_deux').dataTable();
	});
	</script>

</html>