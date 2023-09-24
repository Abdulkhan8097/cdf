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
                                <form class="custom-validation" method='post' action="<?php echo site_url('OurGallery/save'); ?>" enctype='multipart/form-data'> <?php echo view('admin/_topmessage'); ?> 

                                <div class="row  form-group">
                                        <div class="col-5 ">
                                         <label>Page Name</label> 
                                          <select name="page_name" id="" class="form-control " required>
                                          <option value="" class="text-center"><--   Select    --></option>
                                          <option value="1" class="text-center" <?php echo (isset($edit) && !empty($edit) && $edit['page_name']=='1') ? 'selected' : ''; ?>>Orphanage Support Program</option>
                                          <option value="2" class="text-center"<?php echo (isset($edit) && !empty($edit) && $edit['page_name']=='2') ? 'selected' : ''; ?>>Village Development Program</option>
                                          <option value="3" class="text-center" <?php echo (isset($edit) && !empty($edit) && $edit['page_name']=='3') ? 'selected' : ''; ?>>Career</option>
                                          <option value="4" class="text-center" <?php echo (isset($edit) && !empty($edit) && $edit['page_name']=='4') ? 'selected' : ''; ?>>CSR Partnership</option>
                                        </select>
                                          </div>
                                        
                                        
                                </div>
                                
                                    <div class="row  form-group">
                                         <div class="col-5 ">
                                         <label>Upload Image</label> 
                                         <input type="file" class="form-control " accept="image/*" onchange="display_img(this);"  placeholder="Enter Image" name="image" value=""/>
                                         <span class="text-muted mb-3 pb-4">The Picture Dimension Should Be Of 400*400</span>
                                          </div> 
                                           <div class="col-2 ">
                                        
                                      <img src="<?php echo (isset($edit['image']) && !empty($edit['image'])) ? base_url('public/OurGallery/').'/'.$edit['image'] : BLANK_IMG; ?>" id="display_image_here" style=" width: 100px; " >
                                          </div> 
                                    </div>
                           
                            </div>
                                
                                    <div class="row  form-group">
                                        <div class="col-5 "> 
                                            <input type="hidden" name="id" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['id'] : ''; ?>">
                                            <button type="submit" class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1"> Submit </button>
                                        </div>
                                        <div class="col-5 ">
                                         <a href="<?php echo site_url("listourgallery");?>" class="btn btn-lg btn-block btn-secondary waves-effect"> Cancel </a>
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