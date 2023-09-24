    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                            <div class="card-body">
                                <div class="col-12 border-bottom pb-2">
                                <h2>My Profile</h2>
                                </div>
                                <div class="col-8">
                                    <?php echo view('admin/_topmessage'); ?>

                                    <div class="table-responsive pt-4">
                                            <table class="table table-borderless ">
                                            
                                                <tbody>
                                                
                                                    <tr>
                                                        <td scope="row"  width="30%"> Name:  </td>
                                                        <td ><?php   echo $profiledata['name']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td scope="row"  width="30%">Email:  </td>
                                                        <td ><?php echo $profiledata['email']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td scope="row"  width="30%">Mobile:  </td>
                                                        <td ><?php echo $profiledata['phone']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row"  width="30%">Role:  </td>
                                                        <td ><?php echo $profiledata['loginType']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row"  width="30%">Status:  </td>
                                                        <?php if($profiledata['status']==1){?>
                                                            <td >Active</td> 
                                                       <?php }else{ ?>
                                                        <td >InActive</td>
                                                        <?php } ?>
                                                        
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>

                                
                                </div>
                            </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->    
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->