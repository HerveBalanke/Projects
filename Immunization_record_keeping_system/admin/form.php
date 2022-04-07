
<form class="form-horizontal" id="vaccine" role="form" action="add_vac.php" method="POST">
              <div class="form-group">
    <input type="hidden" class="form-control" id="qty" value=0 />
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" id="date" value="<?php echo date('Y-m-d'); ?>"/>
  </div>

              <div class="form-group">
                
                <div class="col-sm-2">
                  <label for="vcode" class="control-label">Vaccine Code</label>
                  <?php //echo date("Y-m-d"); ?>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="vcode" placeholder="vac" maxlength="30">
                  <div id="check_code" style="color:red"></div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-2">
                  <label for="vname" class="control-label">Vaccine Name</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="vname" placeholder="vaccine" maxlength="30">
                  <div id="check_name" style="color:red"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="vprice" class="control-label">Price</label>
                </div>
                <div class="col-sm-5">
                  
                  <div class="input-group"> 
        <span class="input-group-addon">¢</span>
        <input type="number" value="10" min="0" max="999" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" 
                  id="vprice"  maxlength="10" class="form-control currency" />
    </div>

                  <div id="check_price" style="color:red"></div>
                </div>
              </div>
              <div class="form-group">
                 <div class="col-sm-2">
                    <label for="ndose" >Number of Dose(s)</label>
                    </div>
                    <div class="col-sm-5">
                   <input type="number" class="form-control" id="ndose" min="0" value="0"  max="300"  >
                   <div id="check_ndose" style="color:red"></div>
                  </div>
                  </div>
              <div class="form-group">
                 <div class="col-sm-2">
                    <label for="alength" >Length of Administration</label>
                    </div>
                    <div class="col-sm-5">
                                <div class="input-group"> 
        
        <input type="number"  class="form-control" id="alength"  min="0" value="0" max="300"  />
        <span class="input-group-addon">Days</span>
    </div>
                   <div id="check_length" style="color:red"></div>
                  </div>
                  </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="manu" class="control-label">Manufacturer</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="manu" placeholder="Boots" maxlength="50">
                  <div id="check_manu" style="color:red"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="manuemail" class="control-label"> Manufacturer Email</label>
                  
                </div>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="manuemail" placeholder="Boots@gmail.com" maxlength="50">
                  <div id="check_manuemail" style="color:red"></div>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" name="submit" class="btn btn-default" id="submit"> Add </button>
                  <button type="reset" class="btn btn-default">Clear</button>
                </div>
              </div>
            </form> 

