 <?php

                include_once("session_deux.php");
                require_once("../setup/connection.php");

                $search= $_POST["search"];

                $out_membre=$con->query("select * from membre where mid like '$search%';");
                $count_membre=$out_membre->rowCount();
                if ($count_membre<=0){ ?>
                          <div class="row">
          <div class="col-md-12">
            <h3 class="text-center">Resultat de la recherche pour <?php  print $search;?> </h3> <br/>

          </div>
          </div>
                      <div class="panel panel-default">
                      <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> LISTE DE MEMBRES </b>  <a href='membre_out.php' style="color:rgb(255, 213, 29);" class="pull-right"> <b> Retour </b> </a> </div>
                      <div class="panel-body">

                          <div class="row">
          <div class="col-md-4">
        </div>
          <div class="col-md-4">
            <b> Aucune donnée trouvée pour <?php print $search; ?> ! </b>
        </div>
         <div class="col-md-4">
        </div>
        </div>

                    </div>
                    </div>  
                  
              <?php  }elseif($count_membre>0){ ?>

                     <div class="row">
          <div class="col-md-12">
            <h3 class="text-center">Resultat de la recherche pour <?php  print $search;?> </h3> <br/>

          </div>
          </div>
                      <div class="panel panel-default">
                      <div class="panel-heading" style="color:rgb(255, 213, 29); background:rgb(130, 0, 31);"> <b> LISTE DE MEMBRES </b>  <a href='membre_out.php' style="color:rgb(255, 213, 29);" class="pull-right"> <b> Retour </b> </a> </div>
                      <div class="panel-body">
            <div class="table-responsive table-condensed" >
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th class="text-center">Photo</th>
                          <th class="text-center">ID</th>
                          <th class="text-center">Nom</th>
                          <th class="text-center">Prenom</th>
                          <th class="text-center">Telephone</th>
                          <th class="text-center">Modifier</th>
                          <th class="text-center">Supprimer</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        for($i=0; $i<$count_membre; $i++){
                          $fetch_mem=$out_membre->fetch();
                          ?>

                        <tr>
                          <td class="text-center" style="vertical-align:middle"><img src="../uploads/1.jpg" class="img-thumbnail img-responsive" alt="Cinque Terre" width="100" height="100"></td>
                          <td class="text-center" style="vertical-align:middle"><a href="view_membre.php? mid=<?php echo $fetch_mem ['mid'];?>"><?php echo $fetch_mem ["mid"];?> </a></td>
                          <td class="text-center" style="vertical-align:middle"><?php echo $fetch_mem ["nom"];?></td>
                          <td class="text-center" style="vertical-align:middle"><?php echo $fetch_mem ["prenom"];?></td>
                          <td class="text-center" style="vertical-align:middle"><?php echo $fetch_mem ["tel"];?></td>
                          <td class="text-center" style="vertical-align:middle"><a href="#" style="color:orange;" ><span class="glyphicon glyphicon-edit"></span></a></td>
                          <td class="text-center" style="vertical-align:middle"><a href="javascript:sup_id(<?php echo $fetch_mem['mid']; ?>)" style="color:red; " ><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>

                        <?php
                      }
                      ?>
                      </tbody>
                    </table>
                    </div>
                    </div>
                    </div>


            <?php
                }
                $cons=Null;
                ?>

      <script type="text/javascript">  

          function sup_id(mid)
            {
              var info="mid="+ mid;
            bootbox.confirm("<b>Supprimer le Membre?</b>" , function(result) {
            if(result)
            {
              $.ajax({
              type: "POST",
              url: "supprimer_membre.php",
              data: info,
              cache:true,
              processData:false,
              success: function(html){
                $('#table').load(document.URL +  ' #table');
                bootbox.alert("<b>Membre Supprimé(e).</b>");
                }
                  });     
                    }
                      });
                
            }
                  
              

      </script> 
      <script type="text/javascript">
    
$('table.table-hover').each(function() {
    var currentPage = 0;
    var numPerPage = 15;
    var $table = $(this);
    $table.bind('repaginate', function() {
        $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
    });
    $table.trigger('repaginate');
    var numRows = $table.find('tbody tr').length;
    var numPages = Math.ceil(numRows / numPerPage);
    var $pager = $('<div class="pager"></div>');
    for (var page = 0; page < numPages; page++) {
        $('<span class="page-number"></span>').text(page + 1).bind('click', {
            newPage: page
        }, function(event) {
            currentPage = event.data['newPage'];
            $table.trigger('repaginate');
            $(this).addClass('active').siblings().removeClass('active');
        }).appendTo($pager).addClass('clickable');
    }
    $pager.insertAfter($table).find('span.page-number:first').addClass('active');
});
          
  </script> 