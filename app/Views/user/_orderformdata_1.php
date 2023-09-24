
   <?php
   $exceldata = isset($exceldata) ? $exceldata : array();

   if(count($exceldata))
   {
   foreach($exceldata as $detail){  ?>
   <div class="form-group row">
        <label for="example-text-input" class="col-sm-2 col-form-label"><?php echo $detail['A'];?></label>
        <div class="col-sm-10">
        <input type="hidden" name="extitle[]" value="<?php echo $detail['A'];?>">
            <input class="form-control" name="exvalue[]" type="text" value="<?php echo $detail['B'];?>" >
        </div>
    </div>
   <?php } ?>
   <div class="form-group row ">
        <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
        <div class="col-sm-10">
        <input type="submit" name="exsubmit" class="btn btn-primary waves-effect waves-light mr-1" value="Submit">
        </div>
    </div>
   <?php } ?>
  
   
   
   