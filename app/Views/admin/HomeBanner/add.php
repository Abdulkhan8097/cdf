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
                                <form class="custom-validation" method='post' action="<?php echo site_url('HomeBanner/save'); ?>" enctype='multipart/form-data'> <?php echo view('admin/_topmessage'); ?> 
                                <div class="row  form-group">
                                        <div class="col-5 ">
                                         <label>Banner Title</label> 
                                         <input type="text" class="form-control "  placeholder="Enter Banner Title Name" name="banner_title" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['banner_title'] : ''; ?>"/>
                                          </div>
                                          <div class="col-5 ">
                                         <label>Banner Description</label> 
                                         <textarea  class="form-control " rows="1" name="banner_description" /><?php echo (isset($edit) && !empty($edit)) ? $edit['banner_description'] : ''; ?></textarea>
                                          </div> 
                                        
                                </div>
                                    <div class="row  form-group">
                                         <div class="col-5 ">
                                         <label>Upload Image</label> 
                                         <input type="file" class="form-control " accept="image/*" onchange="display_img(this);"  required placeholder="Enter Image" name="image" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['banner_image'] : ''; ?>"/>
                                          <span class="text-muted mb-3 pb-4">The Picture Dimension Should Be Of 1113*740</span>
                                          </div> 
                                           <div class="col-2 ">
                                        
                                      <img src="<?php echo (isset($edit['banner_image']) && !empty($edit['banner_image'])) ? base_url('public/HomeBanner/').'/'.$edit['banner_image'] : BLANK_IMG; ?>" id="display_image_here" style=" width: 100px; " >
                                          </div> 
                                    </div>
                           
                            </div>
                                
                                    <div class="row  form-group">
                                        <div class="col-5 "> 
                                        	<input type="hidden" name="id" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['id'] : ''; ?>">
                                        	<button type="submit" class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1"> Submit </button>
                                        </div>
                                        <div class="col-5 ">
                                         <a href="<?php echo site_url("listbanner");?>" class="btn btn-lg btn-block btn-secondary waves-effect"> Cancel </a>
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