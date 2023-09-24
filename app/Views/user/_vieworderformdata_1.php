
   <?php
   $exceldata = isset($exceldata) ? $exceldata : array();

   if(count($exceldata))
   {
   foreach($exceldata as $detail){  ?>
   <div class="form-group row">
        <label for="example-text-input" class="col-sm-2 col-form-label"><?php echo $detail['A'];?>:</label>
        <div class="col-sm-10">
        <?php echo $detail['B'];?>
        </div>
    </div>
   <?php } ?>
   
   <?php } ?>
  
   
   
   