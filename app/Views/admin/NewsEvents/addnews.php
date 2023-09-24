 <style type="text/css">
     .tox .tox-notification--in{
        opacity: 0;
     }
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
                                <form class="custom-validation" method='post' action="<?php echo site_url('NewsEvent/save'); ?>" enctype='multipart/form-data'> <?php echo view('admin/_topmessage'); ?> 
                                <div class="row  form-group">
                                        <div class="col-5 ">
                                         <label>Event Title</label> 
                                         <input type="text" class="form-control " required placeholder="Enter Title" name="title" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['title'] : ''; ?>"/>
                                          </div>
                                           <div class="col-5 ">
                                             <label>Event Date</label> 
                                        
                                         <input type="date" class="form-control " required placeholder="Enter Date" name="event_date" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['event_date'] : ''; ?>"/>
                                          </div>
                                </div>
                                   <div class="row  form-group">
                                        <div class="col-5 ">
                                         <label>Event Topic</label> 
                                         <input type="text" class="form-control " required placeholder="Enter Topic" name="topic" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['topic'] : ''; ?>"/>
                                          </div>
                                          <div class="col-5 ">
                                         <label>Event Category</label> 
                                         <input type="text" class="form-control " required placeholder="Enter Category" name="category" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['category'] : ''; ?>"/>
                                          </div>
                                         
                                </div>
                                <div class="row  form-group">
                                        <div class="col-5 ">
                                         <label>Event Host Name</label> 
                                         <input type="text" class="form-control " required placeholder="Enter Host" name="host" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['host'] : ''; ?>"/>
                                          </div>
                                          <div class="col-5 ">
                                         <label>Location</label> 
                                         <input type="text" class="form-control " required placeholder="Enter Location" name="location" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['location'] : ''; ?>"/>
                                          </div>
                                      </div>
                                      <div class="row  form-group">
                                        <div class="col-5 ">
                                         <label>Location URL</label> 
                                         <input type="text" class="form-control " required placeholder="Enter Location URL" name="address" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['address'] : ''; ?>"/>
                                          </div>
                                          
                                      </div>
                               
                                        <div class="row  form-group">
                                      
                                          <div class="col-12 ">
                                         <label>Details Description</label> 
                          
                                    <textarea id="tiny" name="detail_description"><?php echo (isset($edit) && !empty($edit)) ? $edit['detail_description'] : ''; ?></textarea>
                                    </div> 
                                    </div>
                                      <div class="row  form-group">
                                       
                                           <div class="col-5 ">
                                         <label>Upload Image</label> 
                                         <input type="file" class="form-control " accept="image/*" onchange="display_img(this);" placeholder="Enter Image" name="events_image" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['events_image'] : ''; ?>"/>
                                         <span>The Picture Dimension Should Be Of 350*250 pixels</span>
                                          </div> 
                                          <div class="col-5 ">
                                        <img src="<?php echo (isset($edit['events_image']) && !empty($edit['events_image'])) ? EVENT_DISPLAY_PATH_NAME.$edit['events_image'] : BLANK_IMG; ?>" id="display_image_here" style="height: 100px; width: 100px; " >
                                          </div> 
                                </div>

                                         
                               
                                       
                                  <?php if(isset($edit)){ ?>  
                                  	 <div class="row  form-group">
                                            <div class="col-12">
                                           
                                                <label class="form-label">image</label><br>
                                              <?php $img_id= $edit['id'];
                                               if (isset($edit['events_image']) && !empty($edit['events_image'])) {
                                         
                                            echo "<a id='del' target='_blank' href='".base_url('public/NewsEvents').'/'.$edit['events_image']."' >".$edit['events_image']." </a><a href='NewsEvent/docDelete?id=$img_id' class='badge badge-danger delete' data-confirm='Are you sure to delete this item?'> delete</a> <br><br>";

                                            
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
                                         <a href="<?php echo site_url("viewnews");?>" class="btn btn-lg btn-block btn-secondary waves-effect"> Cancel </a>
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