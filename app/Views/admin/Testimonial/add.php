 <style type="text/css">
     .tox .tox-notification--in{
        opacity: 0;}
        .tox .tox-statusbar{
            display: none!important;

        }
     
 </style>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <h2 class="pb-4"><?php echo $pagetitle;?></h2>
                                <form class="custom-validation" method='post' action="<?php echo site_url('Testimonial/save'); ?>" enctype='multipart/form-data'> <?php echo view('admin/_topmessage'); ?> 
                                <div class="row  form-group">
                                        <div class="col-5 ">
                                         <label>Testimonial Name</label> 
                                         <input type="text" class="form-control " required placeholder="Enter Testimonial Name" name="ts_name" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['ts_name'] : ''; ?>"/>
                                          </div>
                                          <div class="col-5 ">
                                         <label>Testimonial Description</label> 
                                         <textarea  class="form-control " required rows="1" name="ts_content" /><?php echo (isset($edit) && !empty($edit)) ? $edit['ts_content'] : ''; ?></textarea>
                                          </div> 
                                        
                                </div>
                                    <div class="row  form-group">
                                         <div class="col-5 ">
                                         <label>Upload Image</label> 
                                         <input type="file" class="form-control " accept="image/*" onchange="display_img(this);"  placeholder="Enter Image" name="image" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['ts_image'] : ''; ?>"/>
                                          </div> 
                                           <div class="col-2 ">
                                        
                                      <img src="<?php echo (isset($edit['ts_image']) && !empty($edit['ts_image'])) ? base_url('public/Testimonial/').'/'.$edit['ts_image'] : BLANK_IMG; ?>" id="display_image_here" style=" width: 100px; " >
                                          </div> 
                                    </div>
                                  <?php if(isset($edit)){ ?>  
                                  	 <div class="row  form-group">
                                            <div class="col-12">
                                           
                                                <label class="form-label">image</label><br>
                                              <?php $img_id= $edit['ts_id'];
                                               if (isset($edit['ts_image']) && !empty($edit['ts_image'])) {
                                         
                                            echo "<a id='del' target='_blank' href='".base_url('public/Testimonial/').'/'.$edit['ts_image']."' >".$edit['ts_image']." </a><a href='Testimonial/docDelete?id=$img_id' class='badge badge-danger delete' data-confirm='Are you sure to delete this item?'> delete</a> <br><br>";

                                            
                                          }
                                            else
                                            {
                                              echo"Not Attached  Document";
                                            }
                                             
                                              ?>  
                                           
                                        </div>
                                    </div>
                                    <?php  } ?> 
                            </div>
                                
                                    <div class="row  form-group">
                                        <div class="col-5 "> 
                                        	<input type="hidden" name="id" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['ts_id'] : ''; ?>">
                                        	<button type="submit" class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1"> Submit </button>
                                        </div>
                                        <div class="col-5 ">
                                         <a href="<?php echo site_url("viewtestimonial");?>" class="btn btn-lg btn-block btn-secondary waves-effect"> Cancel </a>
                                         </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div> <!-- End Page-content -->
<script>
  tinymce.init({
    selector: 'textarea#tiny'
  });
</script>
<script type="text/javascript">
    // Prevent Bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
  if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
    e.stopImmediatePropagation();
  }
});
</script>
<script type="text/javascript">
    document.addEventListener('focusin', (e) => {
  if (e.target.closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
    e.stopImmediatePropagation();
  }
});
</script>
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