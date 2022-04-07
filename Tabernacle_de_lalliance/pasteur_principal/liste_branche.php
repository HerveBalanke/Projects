					

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					<?php
		   			require_once("../setup/connection.php");
		   			$out_branche=$con->query("select * from branche;") or die (print_r($con->errorInfo()));
		   			$count_branche=$out_branche->rowCount();
		   			?>
		   
			   			
			  
	</head>

					

	<body>
									<div class="panel-body"> 
									<div class="table-responsive">
									  <table class="table table-striped table-condensed table-hover" id="table_deux">
									    <thead>
									      <tr>
									        <th class="text-center">Branche</th>
									        <th class="text-center">Modifier</th>
									        <th class="text-center">Supprimer</th>
									      </tr>
									    </thead>
									    <tbody>

									    	<?php
									    	for($i=0; $i<$count_branche; $i++){
									    		$fetch_branche=$out_branche->fetch();
									    		?>

									      <tr>
									        <td class="text-center" style="vertical-align:middle">  <?php echo $fetch_branche ["branche"];?>  </td>
									        <td class="text-center" style="vertical-align:middle"><a href="modifier_branche.php? bid=<?php echo $fetch_branche ['bid'];?>" style="color:orange;" ><span class="glyphicon glyphicon-edit"></span></a></td>
									        <td class="text-center" style="vertical-align:middle"><a href="javascript:sup_bid(<?php echo $fetch_branche['bid']; ?>)" style="color:red; " ><span class="glyphicon glyphicon-trash"></span></a></td>
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