
<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					<?php 
					require_once("../connection.php");
					$query=$con->query("SELECT * from audios;");
					$count=$query->rowCount();

					?>
			   			
			  
	</head>

					

	<body>
		   											
											  
					<div class="row">
        			 <div class="col-md-2"> </div>
        			 <div class="col-md-8" style="background-color:rgb(255, 255, 255);"> 
        			 	<h1 class="text-center" style="color:rgb(104, 1, 1);"> <b> Gerer les Audios </b></h1>
					<div class="table-responsive">
							  <table class="table table-striped table-condensed table-hover" style="background-color:rgb(255, 255, 255); color:rgb(0, 0, 0);" id="tab">
							    <thead>
							      <tr>
							        <th class="text-center">Date</th>
							        <th class="text-center">Titre</th>
							        <th class="text-center"> </th>
							        <th class="text-center"> </th>
							      </tr>
							    </thead>
							    <tbody>

							    	<?php
							    	for($i=0; $i<$count; $i++){
							    		$fetch_audio=$query->fetch();
							    		?>

							      <tr>
							        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_audio ['date'];?></td>
							        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_audio ['titre'];?> </td>
							        <td class="text-center" style="vertical-align:middle"> <a href="ecouter.php?did=<?php echo $fetch_audio ['aid'];?>" title="Ecouter"> <span class="glyphicon glyphicon-play"></span>  </td>
							        <td class="text-center" style="vertical-align:middle"><a href="javascript:sup_aid(<?php echo $fetch_audio ['aid'];?>)" title="Supprimer" style="color:red; " ><span class="glyphicon glyphicon-remove"></span></a></td>
							      </tr>

							      <?php
									}
									?>
							    </tbody>
							  </table>
							  </div>
							  </div>
							  <div class="col-md-2"> </div>
							  </div>


</body>


 
	<script src="../data_table/media/js/jquery.dataTables.min.js"></script>


	 <script type="text/javascript">
	 $(document).ready(function(){
    $('#tab').dataTable();
	});
	</script>

</html>

