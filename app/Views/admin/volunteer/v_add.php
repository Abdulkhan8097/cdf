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
                                <form class="custom-validation" method='post' action="<?php echo site_url('Volunteer/save'); ?>" enctype='multipart/form-data'> <?php echo view('admin/_topmessage'); ?> 
                                <div class="row  form-group">
                                        <div class="col-lg-5 ">
                                         <label>Name</label> 
                                         <input type="text" class="form-control form-control-lg " required placeholder="Enter Volunteer Name" name="volunteer_name" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['volunteer_name'] : ''; ?>"/>
                                          </div>

                                           <div class="col-lg-5 ">
                                         <label>E-mail</label> 
                                         <input type="email" class="form-control form-control-lg " required placeholder="Enter Volunteer E-mail " name="volunteer_email" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['volunteer_email'] : ''; ?>"/>
                                          </div>
                                      </div>

                                      <div class="row  form-group">

                                            <div class="col-lg-5 ">
                                      <label>Gender:</label> 
                                         <select class="form-control form-control-lg " name="volunteer_gender" required>
                                                           
                                            <option value="">None</option>
                                             <option value="male" <?php echo (isset($edit) && !empty($edit) && $edit['volunteer_gender']=='male') ? 'selected' : ''; ?>>Male</option>
                                                               
                                              <option value="female" <?php echo (isset($edit) && !empty($edit) && $edit['volunteer_gender']=='female') ? 'selected' : ''; ?>>Female</option>
                                                               <br />
                                                            </select>
                                          </div> 






                                           <div class="col-lg-5 ">
                                         <label>Address</label> 
                                         <input type="text" class="form-control form-control-lg " required placeholder="Enter Volunteer Address" name="volunteer_address" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['volunteer_address'] : ''; ?>"/>
                                          </div>
                                      </div>

                                         <div class="row  form-group"> 
                                            <div class="col-lg-5 ">
                                         <label>Pin Code</label> 
                                         <input type="text" class="form-control form-control-lg " required placeholder="Enter Pin Code" name="v_pincode" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['v_pincode'] : ''; ?>"/>
                                         
                                          </div>

                                   
                                      <div class="col-lg-5">

                                        <label>Mobile Number</label>

                                        <input data-parsley-type="digits" onkeypress="numericFilter(this)" type="text" class="form-control form-control-lg" required maxlength="10"  minlength="10" placeholder="Enter Mobile Number"name="phone" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['mob_number'] : ''; ?>" />


                                    </div>
                                </div>


                                          <div class="row  form-group"> 

                                         <div class="col-lg-5 ">
                                         <label>Message</label> 
                                         <textarea  class="form-control form-control-lg" required rows="1" name="volunteer_message" /><?php echo (isset($edit) && !empty($edit)) ? $edit['volunteer_message'] : ''; ?></textarea>
                                          </div> 

                                           <div class="col-lg-5 ">
                                         <label>City</label> 
                                         <input type="text" class="form-control form-control-lg " required placeholder="Enter City" name="v_city" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['v_city'] : ''; ?>"/>
                                          </div>
                                      </div>

                                     
                                    <div class="row  form-group">
                                         <div class="col-lg-5 ">
                                         <label>C/V Upload </label> 
                                         <input type="file" class="form-control form-control-lg "  onchange="display_img(this);"  placeholder="C/V Upload " name="image" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['doc_upload'] : ''; ?>"/>
                                          </div> 
                                           <div class="col-2 ">
                                        
                                      
                                    </div>
                                  <?php if(isset($edit)){ ?>  
                                  	 <div class="row  form-group">
                                            <div class="col-12">
                                           
                                                <label class="form-label">Document</label><br>
                                              <?php $img_id= $edit['volunteer_id'];
                                               if (isset($edit['doc_upload']) && !empty($edit['doc_upload'])) {
                                         
                                            echo "<a id='del' target='_blank' href='".base_url('public/Volunteer/').'/'.$edit['doc_upload']."' >".$edit['doc_upload']." </a><a href='Volunteer/docDelete?id=$img_id' class='badge badge-danger delete' data-confirm='Are you sure to delete this item?'> delete</a> <br><br>";

                                            
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
                                        <div class="col-lg-5 "> 
                                        	<input type="hidden" name="id" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['volunteer_id'] : ''; ?>">
                                        	<button type="submit" class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1"> Submit </button>
                                        </div>
                                        <div class="col-lg-5 ">
                                         <a href="<?php echo site_url("viewvolunteer");?>" class="btn btn-lg btn-block btn-secondary waves-effect"> Cancel </a>
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