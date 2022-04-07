<?php  
include_once("session_admin.php");
?>					

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					<?php
		   			require_once("../setup/connection.php");
		   			$out_uti_un=$con->query("select * from utilisateur_un;") or die (print_r($con->errorInfo()));
		   			$count_uti_un=$out_uti_un->rowCount();
		   			?>
		   
			   			
			  
	</head>

					

	<body>
									<div class="panel-body"> 

  									<div class="table-responsive" >
									  <table class="table table-striped table-condensed table-hover" id="table_un">
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
									    	for($i=0; $i<$count_uti_un; $i++){
									    		$fetch_uti=$out_uti_un->fetch();
									    		?>

									      <tr>
									        <td class="text-center" style="vertical-align:middle"><img src="<?php echo $fetch_uti ["photo"];?>" class="img-thumbnail img-responsive" alt="<?php echo $fetch_uti ["nom"];?> <?php echo $fetch_uti ["prenom"];?>" style="width:150px; height:150px"></td>
									        <td class="text-center" style="vertical-align:middle"><a href="utilisateur_view.php?id=<?php echo $fetch_uti ["uid_un"];?> & niveau=<?php echo $fetch_uti["niveau"];?>"> <?php echo $fetch_uti ["nom"];?> </a> </td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_uti ["prenom"];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_uti ["tel"];?></td>
									        <td class="text-center" style="vertical-align:middle"><a href="modifier_utilisateur.php? id=<?php echo $fetch_uti['uid_un'];?>&niveau=<?php echo $fetch_uti['niveau'];?>" style="color:orange;" ><span class="glyphicon glyphicon-edit"></span></a></td>
									        <td class="text-center" style="vertical-align:middle"><a href="javascript:sup_uid_un(<?php echo $fetch_uti['uid_un']; ?>)" style="color:red; " ><span class="glyphicon glyphicon-trash"></span></a></td>
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
    $('#table_un').dataTable();
	});
	</script>

</html>