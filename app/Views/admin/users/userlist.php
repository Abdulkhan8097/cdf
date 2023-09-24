<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<?php
$session = session();
$admin_type = $session->get('type'); 
$admin_id = $session->get('id'); 

?>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4 class="font-size-18">Donor List</h4>
                    </div>
                </div>
                <?php if ($admin_type !=='branch'){ ?>
                    
                
              <div class="col-sm-6">
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <a class="btn btn-primary waves-effect waves-light" href="<?php echo site_url('newuser'); ?>">
                                <i class="ion ion-md-add-circle-outline"></i> Add Donor
                            </a>
                        </div>
                    </div>
                </div> 
            <?php } ?>
   
            </div>
            <?php echo view('admin/users/_searchform'); ?>
            
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <?php echo view('admin/_topmessage'); ?>
                        <div class="card-body">
                        
                        <?php if($pagination["getNbResults"] >0 ){ ?>
                            <div class="table-responsive">
                                <table data-toggle="table" data-striped="true" class="table table-hover table-centered table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center" data-sortable="true">S No.</th>
                                            
                                            <th class="text-center" data-sortable="true">Receipt No</th>
                                            <th class="text-center" data-sortable="true">Donation ID</th>
                                            
                                            <th class="text-center" data-sortable="true" >Donor Name</th>
                                            <th class="text-center" data-sortable="true" >Mobile no.</th>
                                            <th class="text-center" data-sortable="true" >Amount</th>
                                            <th class="text-center" data-sortable="true" >Payment Status
                                               
                                            </th>
                                            <th class="text-center" data-sortable="true" >Created</th>
                                            <th class="text-center" data-sortable="true" >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i=0;
                                        foreach($usersData as $kdata){ 
                                            $i++;
                                            ?>
                                        <tr>
                                            <th class="text-center"><?php echo ++$startLimit ; ?></th>
                                             <th class="text-center"><?php echo $kdata->receipt_no;  ?></th>
                                             <th class="text-center"><?php echo $kdata->donation_id;  ?></th>
                                            <td class="text-center"><?php echo $kdata->name ?></td>
                                            <td class="text-center"><?php echo $kdata->phone; ?></td>
                                            <td class="text-center"><?php echo $kdata->donation_amount; ?></td>
                                          
                                            <td class="text-center">
                                                
                                                 <?php if($kdata->payment_status=='Success'){ ?>
                                        <span class="badge badge-success">Success</span>
                          
                                        <?php }elseif($kdata->payment_status=='Failed'){ ?>
                                        

                                          <span class="badge badge-danger">Failed</span>
                                        <?php }elseif($kdata->payment_status=='Pending'){ ?>
                                                 <span class="badge badge-warning">Pending</span>
                                        <?php } ?>
                                            </td>
                                           
                                            <td class="text-center"><?php echo $kdata->create_at; ?></td>
                                            
                                            
                                            <td class="text-center">

                                                
                                                    <?php if($kdata->payment_status=='Success'){ ?>
                                                        <a data-toggle="modal" data-target="#myModal" title="Send Certificates" class="btn btn-danger btn-sm" onclick="assignId('<?php echo $kdata->id; ?>');"><i class="fa fa-envelope"></i></a>

                                                <?php } ?>
                                               
                                       
                                                    <a href="<?php echo site_url('viewuser?id=' . $kdata->id) ?>" title="Details" class="btn btn-primary btn-sm"><i class="fas fa-eye" style="padding-right: 0;"></i></a> 

                                                <?php if ($admin_type == "admin" ||   $admin_type == "editor" &&  $kdata->receipt_type=='manual' ) {?>
                                                   
                                                     <a href="<?php echo site_url('edituser?id=' . $kdata->id) ?>" title="Edit" class="btn btn-info btn-sm"><i class="fas fa-edit" style="padding-right: 0;"></i></a>
                                                     
                                             <?php }?>
                                              <?php if($kdata->payment_status=='Success'){ ?>
                                             <a href="<?php echo site_url('showcertificate?id=' . $kdata->id) ?>" title="View Certificate" class="btn btn-warning btn-sm" target="_blank"><i class="far fa-file-pdf" style="padding-right: 0;"></i></a>
                                              <?php } ?>
                                              <?php if($admin_type =='admin') { ?>
                                                  <a href="<?php echo site_url('deluser?id=' . $kdata->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                  <?php } ?>

                                       
                                            </td>

                                        </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php if ($pagination['haveToPaginate']) { ?>
                                <br>
                                <?php echo view('admin/_paging', array('paginate' => $pagination, 'siteurl' => 'users', 'varExtra' => $searchArray)); ?>

                                <?php } ?>
                            </div>
                        <?php }else{ ?>
                            <?php echo view('admin/_noresult'); ?>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->

    </div>
    <!-- End Page-content -->  


      <!------------ Modal ------------------->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="color:#000 !important;"> Send Certificate</h2>
                <form method='post' action="AdminController/sendEmail" enctype='multipart/form-data'>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
               
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-4 col-form-label tens" style="color:#000 !important;">&nbsp;&nbsp;Message</label>
            </div>
        


             <textarea id="cname" name="message"></textarea>
             <div class="form-group row">
                <label for="inputPassword" class="col-sm-4 col-form-label tens" style="color:#000 !important;">&nbsp;&nbsp;Files</label>
            </div>
            <input type="file" name="attachmentfile" value="">
         
                     
                <input type="hidden" id="cid" name="id"  >

                <div class="modal-body" id="divListvip">
                    
                </div> <!-- end modal body-->
                
                <center><button type="submit" class="btn btn-primary waves-effect waves-light mr-1" id="owner-submit-btn">
                        Submit
                    </button></center> <br>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- end modal content-->    
    </div><!-- modal-dialog -->
</div><!-- modal fade -->

    <script type="text/javascript">

       
        function assignId(userid)
        { 
            $('#cid').val(userid); 

                     var request = $.ajax( {
                            url : "<?php echo site_url('getcustomer?id='); ?>"+userid,
                            cache: false,
                            contentType: false,
                            processData: false,
                            async: false,
                            type: 'GET',
                            
                            success: function(data) {
                             
                                responsedata = JSON.parse(data);
                                console.log(responsedata);
                                if (responsedata.status) {
                            
                                 $('#cname').text(responsedata.message); 
                               
                                }

                            },
                            fail: function(res) {
                                errorFlag = true;
                                console.log(res);
                                
                            },
                            error: function(xhr, status, error) {
                                errorFlag = true;
                                var errorMessage = xhr.status + ': ' + xhr.statusText;
                                console.log('Error - ' + errorMessage);
                                
                            }
                        })

        }
    </script>

    