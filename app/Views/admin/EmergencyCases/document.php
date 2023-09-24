    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <h2 class="pb-4"><?php echo $pagetitle;?></h2>
                                <form class="custom-validation" method='post' action="<?php echo site_url('EmergencyCases/saveDocs'); ?>" enctype='multipart/form-data'> <?php echo view('admin/_topmessage'); ?> 
                                    <div class="row  form-group">
                                    	<div class="col-5 ">
                                         <label>Document Name</label> 
                                         <input type="text" class="form-control form-control-lg" required placeholder="Enter Title" name="doc_name" />
                                         </div>
                                         <div class="col-5 ">
                                         <label>Upload Image</label> 
                                         <input type="file" class="form-control form-control-lg" accept="image/*" onchange="display_img(this);"  placeholder="Enter Image" name="image"/>
                                         <small> size of 400x300 pixels</small></div> 
                                           <div class="col-2 ">
                                        
                                      <img src="<?php echo (isset($editt['image_name']) && !empty($editt['image_name'])) ? CASES_DISPLAY_PATH_NAME.$editt['image_name'] : BLANK_IMG; ?>" id="display_image_here" style="height: 100px; width: 100px; " >
                                          </div> 
                                    </div>
                                
                            </div>
                                
                                    <div class="row  form-group">
                                        <div class="col-5 "> 
                                        	<input type="hidden" name="id" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['id'] : ''; ?>">
                                        	<button type="submit" class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1"> Submit </button>
                                        </div>
                                        <div class="col-5 ">
                                         <a href="<?php echo site_url("viewemergencycases");?>" class="btn btn-lg btn-block btn-secondary waves-effect"> Cancel </a>
                                         </div>
                                    </div>
                                </form>

                                <?php $i=0;
                                 foreach($document as $value) {
                                 	$i++?>
                                    <div class="row  form-group">
                                    	 <table class="table table-striped table-bordered m-top20">
                     <tbody>
                  
                        <tr>
                          
                           <td>(<?php echo $i; ?>)<?php echo $value->doc_name;?></td>
                        </tr>
                      
                           <tr>
                       
                           <td><a href="<?php echo site_url(CASESDOC_DISPLAY_PATH_NAME.$value->doc_image); ?>" target="_blank"><img src="<?php echo (isset($value->doc_image) && !empty($value->doc_image)) ? CASESDOC_DISPLAY_PATH_NAME.$value->doc_image: BLANK_IMG; ?>" style="height: 100px; width: 100px;"></a>
                             &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;

                            <a href="<?php echo site_url('EmergencyCases/deleteDocument?id='.$value->doc_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a></td>

                        </tr>
                       
                         
                     </tbody>
                  </table>
             
                                    </div>
                                     <?php } ?>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div> <!-- End Page-content -->

<script type="text/javascript">
   function display_img(input) {
     if (input.files && input.files[0]) {
       var reader = new FileReader()
       reader.onload = function (e) {
         $('#display_image_here')
           .attr('src', e.target.result)
           .width(100)
           .height(100)
       }
       reader.readAsDataURL(input.files[0])
     }
   }
</script>