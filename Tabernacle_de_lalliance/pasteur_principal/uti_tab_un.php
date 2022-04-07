					

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					<?php
		   			require_once("../setup/connection.php");
		   			$out_uti=$con->query("select * from utilisateur 
		   				inner join departement on utilisateur.departement=departement.deptid
		   				inner join niveau on utilisateur.niveau= niveau.niid
		   				where niveau.niveau='Responsable de departement';") or die (print_r($con->errorInfo()));
		   			$count_uti=$out_uti->rowCount();
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
									        <th class="text-center">Departement</th>
									        <th class="text-center">Statut</th>
									        <th class="text-center">Modifier</th>
									        <th class="text-center">Supprimer</th>
									      </tr>
									    </thead>
									    <tbody>

									    	<?php
									    	for($i=0; $i<$count_uti; $i++){
									    		$fetch_uti=$out_uti->fetch();
									    		?>

									      <tr>
									        <td class="text-center" style="vertical-align:middle"><img src="<?php echo $fetch_uti ["photo"];?>" class="img-thumbnail img-responsive" alt="<?php echo $fetch_uti ["nom"];?> <?php echo $fetch_uti ["prenom"];?>" style="width:150px; height:150px"></td>
									        <td class="text-center" style="vertical-align:middle"><a href="utilisateur_view.php?id=<?php echo $fetch_uti ["uid"];?>"> <?php echo $fetch_uti ["nom"];?> </a> </td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_uti ["prenom"];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_uti ["tel"];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_uti ["departement"];?></td>
									        <td class="text-center" style="vertical-align:middle">
									        	<?php
									        	if( $fetch_uti ["desactivate"]=="off"){ ?>
									        		<a href="javascript:inactive_uid(<?php echo $fetch_uti['uid']; ?>)" > <button type="button" class="btn btn-success">Actif</button> </a>
									        		<?php
									        	} else if( $fetch_uti ["desactivate"]=="on"){ ?>
									        		<a href="javascript:active_uid(<?php echo $fetch_uti['uid']; ?>)" > <button type="button" class="btn btn-danger">Inactif</button> </a>

									        	<?php } ?></td>
									        <td class="text-center" style="vertical-align:middle"><a href="modifier_utilisateur.php? id=<?php echo $fetch_uti['uid'];?>&niveau=<?php echo $fetch_uti['niveau'];?>" style="color:orange;" ><span class="glyphicon glyphicon-edit"></span></a></td>
									        <td class="text-center" style="vertical-align:middle"><a href="javascript:sup_uid(<?php echo $fetch_uti['uid']; ?>)" style="color:red; " ><span class="glyphicon glyphicon-trash"></span></a></td>
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