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
                                <form class="custom-validation" method='post' action="<?php echo site_url('Blog/save'); ?>" enctype='multipart/form-data'> <?php echo view('admin/_topmessage'); ?> 
                                <div class="row  form-group">
                                        <div class="col-5 ">
                                               <label>Author Name</label> 
                                         <input type="text" class="form-control " placeholder="Enter Author Name" name="author_name" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['author_name'] : ''; ?>"/>
                                        
                                          </div>
                                          <div class="col-5 ">
                                        
                                          </div> 
                                        
                                </div>
                                 <div class="row  form-group">
                                        <div class="col-5 ">
                                        <label>Title</label> 
                                         <input type="text" class="form-control " required placeholder="Enter  Title Name" name="title" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['title'] : ''; ?>"/>
                                          </div>
                                         
                                        
                                </div>
                                 <div class="row  form-group">
                                      
                                          <div class="col-5 ">
                                       <label>Status</label>

                                        <select name="status" class="form-control form-control-lg">
                                           <!--  <option value=""> -Status -</option> -->
                                            <option value="1" <?php echo (isset($edit) && !empty($edit) && $edit['status']=='1') ? 'selected' : ''; ?>> Active</option>
                                                Active</option>
                                            <option value="0" <?php echo (isset($edit) && !empty($edit) && $edit['status']=='0') ? 'selected' : ''; ?>>In Active</option>

                                        </select>

                                          </div> 
                                        
                                </div>
                                 <div class="row  form-group">
                                        <div class="col-10 ">
                                        <label>Description</label> 
                                         <textarea  class="form-control " id="tiny" required  name="description" /><?php echo (isset($edit) && !empty($edit)) ? $edit['description'] : ''; ?></textarea>
                                          </div>
                                         
                                        
                                </div>
                                 
                                    <div class="row  form-group">
                                         <div class="col-5 ">
                                         <label>Upload Image</label> 
                                         <input type="file" class="form-control " accept="image/*" onchange="display_img(this);"  placeholder="Enter Image" name="image" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['image'] : ''; ?>"/>
                                         <span>The Picture Dimension Should Be Of 493*329 pixels</span>
                                          </div> 
                                           <div class="col-2 ">
                                        
                                      <img src="<?php echo (isset($edit['image']) && !empty($edit['image'])) ? base_url('public/Blog/').'/'.$edit['image'] : BLANK_IMG; ?>" id="display_image_here" style=" width: 100px; " >
                                          </div> 
                                    </div>
                           
                            </div>
                                
                                    <div class="row  form-group">
                                        <div class="col-5 "> 
                                        	<input type="hidden" name="id" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['id'] : ''; ?>">
                                        	<button type="submit" class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1"> Submit </button>
                                        </div>
                                        <div class="col-5 ">
                                         <a href="<?php echo site_url("viewblog");?>" class="btn btn-lg btn-block btn-secondary waves-effect"> Cancel </a>
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