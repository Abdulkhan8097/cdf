<style>
    .row{
        padding:7px!important;
        
    }
    </style>
    <?php
    $session = session();
    $admin_type = $session->get('type');
?> 
<form action="" id="customersearch">
<div class="row">
    <div class="col-xl-12">
            <div class="card ">
                
                    <div class="card-body">

                        <div class="row st">
                              <div class="col-lg-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select name="receipt_type" class="form-control">
                                             <option value="">Type</option>
                              <option value="online" <?php if($receipt_type =='online'){ echo "selected"; }?>>Online</option>
                              <option value="manual" <?php if($receipt_type =='manual'){ echo "selected"; }?>>Manual</option>
                              </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="row">
                                    <div class="col-md-12">
                                 <select name="payment_status" class="form-control">
                                <option value="">Payment Status</option>
                              <option value="Pending" <?php if($payment_status =='Pending'){ echo "selected"; }?>>Pending</option>
                              <option value="Success" <?php if($payment_status =='Success'){ echo "selected"; }?>>Success</option>
                              <option value="Failed" <?php if($payment_status =='Failed'){ echo "selected"; }?>>Failed</option>
                              </select>
                                    </div>
                                </div>
                            </div>
                            &nbsp;&nbsp;

                            <div class="col-lg-3 ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" name="txtsearch" type="text" value="<?php echo $txtsearch; ?>" placeholder="Search by  name, phone" >
                                    </div>
                                </div>
                            </div>
                            
                             <?php if ($admin_type == 'admin') {?>
                            
                             <div class="col-lg-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" name="start_date" type="date" value="<?php  echo isset($searchArray['start_date']) ? $searchArray['start_date'] : "" ?>" placeholder="Search by start date" >
                                    </div>
                                </div>
                            </div>
                             <div class="col-lg-2 ">
                                <div class="row">
                                    <div class="col-md-12">
                                       <input class="form-control" name="end_date" type="date" value="<?php echo isset($searchArray['end_date']) ? $searchArray['end_date'] :''; ?>" placeholder="Search by end date" >
                                    </div>
                                </div>
                            </div>
                             <?php } ?>
                             
                             
                             
                            
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Submit
                                    </button>
                                    <a href="<?php echo site_url('users');?>"><button type="button" class="btn btn-primary waves-effect waves-light mr-1"
                                     data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Clear Search Filters">
                                    <i class="mdi mdi-refresh"></i>Clear
                                </button></a>
                                <?php if ($admin_type == "admin" ) {?>
                                 <button type="button" class="btn btn-primary waves-effect waves-light mr-1" onClick="exportdata();" data-toggle="tooltip" data-placement="top" title="" data-original-title="Export to excel">
                                       <i class="fas fa-file-export "></i> Export
                                    </button>
                                     <?php } ?>
                                   
                                    </div>
                                    
                                </div>
                            </div>

                        </div>



                    </div>
            </div>
        </div>
</div>
</form> 

<script>
function exportdata()
          {
            var formdata = $('#customersearch').serialize();
            window.open("<?php echo site_url('AdminController/customerexportexcel'); ?>?"+formdata);   
          }
    </script>