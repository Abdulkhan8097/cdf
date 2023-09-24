 <style type="text/css">
     .tox .tox-notification--in{
        opacity: 0;
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
                                <form class="custom-validation" method='post' action="<?php echo site_url('Gallery/save'); ?>" enctype='multipart/form-data'> <?php echo view('admin/_topmessage'); ?> 
                                <div class="row  form-group">
                                        <div class="col-5 ">
                                         <label>Category</label> 
                                          <select name="category" id="" class="form-control " required>
                                          <option value="0" class="text-center"><--   Select Category   --></option>
                                          <option value="1" class="text-center" <?php echo (isset($edit) && !empty($edit) && $edit['category']=='1') ? 'selected' : ''; ?>>Photo</option>
                                          <option value="2" class="text-center"<?php echo (isset($edit) && !empty($edit) && $edit['category']=='2') ? 'selected' : ''; ?>>Video</option>
                                          <option value="3" class="text-center" <?php echo (isset($edit) && !empty($edit) && $edit['category']=='3') ? 'selected' : ''; ?>>Media</option>
                                        </select>
                                          </div>
                                        
                                        
                                </div>
                                <div class="row  form-group">
                                        <div class="col-5">
                                         <label>Video Url</label> 
                                        <input type="url" class="form-control "   placeholder="Enter Image" name="video_url" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['video_url'] : ''; ?>"/>
                                          </div> 

                                </div>

                                <div class="row  form-group">
                                       <div class="col-5 ">
                                         <label>Upload Image</label> 
                                       <input type="file" class="form-control "  onchange="display_img(this);" placeholder="Enter Image" name="image" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['image'] : ''; ?>"/>
                                       <span>The Picture Dimension Should Be Of 1167*764 pixels</span>
                                          </div> 
                                          <div class="col-2 ">
                                        
                                      <img src="<?php echo (isset($edit['image']) && !empty($edit['image'])) ? GALLERY_DISPLAY_PATH_NAME.$edit['image'] : BLANK_IMG; ?>" id="display_image_here" style="height: 100px; width: 100px;" >
                                          </div> 

                                </div>

                                 </div> 
                                
                              
                                         
                           
                               
                                       
                                  <?php if(isset($edit)){ ?>  
                                  	 <div class="row  form-group">
                                            <div class="col-12">
                                           
                                                <label class="form-label">image</label><br>
                                              <?php $img_id= $edit['id'];
                                               if (isset($edit['image']) && !empty($edit['image'])) {
                                         
                                            echo "<a id='del' target='_blank' href='".base_url('public/Gallery').'/'.$edit['image']."' >".$edit['image']." </a><a type='button' onclick='ConfirmDelete()' href='Gallery/docDelete?id=$img_id'  class='badge badge-danger delete' data-confirm='Are you sure to delete this item?'> delete</a> <br><br>";

                                            
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
                                        	<input type="hidden" name="id" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['id'] : ''; ?>">
                                        	<button type="submit" class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1"> Submit </button>
                                        </div>
                                        <div class="col-5 ">
                                         <a href="<?php echo site_url("viewgallery");?>" class="btn btn-lg btn-block btn-secondary waves-effect"> Cancel </a>
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
<script type="text/javascript">
      function ConfirmDelete()
{
  return confirm("Are you sure you want to delete?");
}
    </script>
