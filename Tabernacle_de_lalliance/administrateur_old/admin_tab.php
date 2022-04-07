					

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					<?php
		   			require_once("../setup/connection.php");
		   			$out_admin=$con->query("select * from administrateur;") or die (print_r($con->errorInfo()));
		   			$count_admin=$out_admin->rowCount();
		   			?>
		   
			   			
			  
	</head>

					

	<body>
									<div class="panel-body"> 
									<div class="table-responsive" >
									  <table class="table table-striped table-condensed table-hover" id="admin">
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
									    	for($i=0; $i<$count_admin; $i++){
									    		$fetch_admin=$out_admin->fetch();
									    		?>

									      <tr>
									        <td class="text-center" style="vertical-align:middle"><img src="<?php echo $fetch_admin ["photo"];?>" class="img-thumbnail img-responsive" alt="<?php echo $fetch_admin ["nom"];?> <?php echo $fetch_admin ["prenom"];?>" style="width:150px; height:150px"></td>
									        <td class="text-center" style="vertical-align:middle"><a href="utilisateur_view.php?id=<?php echo $fetch_admin ["aid"];?> & niveau=<?php echo $fetch_admin["niveau"];?>"><?php echo $fetch_admin ["nom"];?> </a> </td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_admin ["prenom"];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_admin ["tel"];?></td>
									        <td class="text-center" style="vertical-align:middle"><a href="modifier_utilisateur.php? id=<?php echo $fetch_admin ['aid'];?>&niveau=<?php echo $fetch_admin['niveau'];?>" style="color:orange;" ><span class="glyphicon glyphicon-edit"></span></a></td>
									        <td class="text-center" style="vertical-align:middle"><a href="javascript:sup_aid(<?php echo $fetch_admin['aid']; ?>)" style="color:red; " ><span class="glyphicon glyphicon-trash"></span></a></td>
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
    $('#admin').dataTable();
	});
	</script>

</html>