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
                                <form class="custom-validation" method='post' action="<?php echo site_url('AnualReport/save'); ?>" enctype='multipart/form-data'> <?php echo view('admin/_topmessage'); ?> 
                                <div class="row  form-group">
                                        <div class="col-5 ">
                                         <label>Start Year</label> 
                                         <input type="text" class="form-control " required placeholder="Enter Start Year e.g 2021" name="start_year"  minlength="4" maxlength="4"  onkeypress="numericFilter(this)" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['start_year'] : ''; ?>"/>
                                          </div>
                                          <div class="col-5 ">
                                        <label>End Year</label> 
                                         <input type="text" class="form-control " required placeholder="Enter Start Year e.g 2022" minlength="4" maxlength="4" onkeypress="numericFilter(this)" name="end_year" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['end_year'] : ''; ?>"/>
                                     </div>
                                        
                                </div>
                                 <div class="row  form-group">
                                        <div class="col-5 ">
                             
                                       <label>Annual Name</label> 
                                         <input type="text" class="form-control " required placeholder="Enter Annual Name" name="annual_name" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['annual_name'] : ''; ?>"/>
                                          </div>
                                          <div class="col-5 ">
                                       <label>cover Image</label>
                                      <input type="file" class="form-control" accept="image/*" placeholder="" name="cover_image" value=""/>
                                      <span>The Picture Dimension Should Be Of 392*500 pixels</span>
                                      

                                          </div> 
                                        
                                </div>
                                <div class="row  form-group">
                              <div class="col-5 ">
                                       <label>Upload PDF</label>
                                      <input type="file" class="form-control"  placeholder="" name="pdf_file" accept="application/pdf" value=""/>
                                      

                                          </div> 
                                      </div>
                           
                            </div>
                                
                                    <div class="row  form-group">
                                        <div class="col-5 "> 
                                        	<input type="hidden" name="id" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['id'] : ''; ?>">
                                        	<button type="submit" class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1"> Submit </button>
                                        </div>
                                        <div class="col-5 ">
                                         <a href="<?php echo site_url("viewanual");?>" class="btn btn-lg btn-block btn-secondary waves-effect"> Cancel </a>
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
   function numericFilter(txb) {
       txb.value = txb.value.replace(/[^\0-9]/ig, "");
   }
</script> 
