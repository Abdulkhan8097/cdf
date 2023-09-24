<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <h4 class="h2">Edit Account</h4>
                            <form class="custom-validation" method='post'
                                action="<?php echo site_url('updateaccount'); ?>" enctype='multipart/form-data'>

                                <?php echo view('admin/_topmessage'); ?>


                                <div class="row  form-group">
                                    <div class="col-lg-5">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control form-control-lg" required placeholder=""
                                            name="name" value="<?php echo $adminDetails['name']; ?>" />
                                    </div>
                                    <div class="col-lg-5">
                                        <label>Mobile Number</label>
                                        <input data-parsley-type="digits" type="text"
                                            class="form-control form-control-lg" required maxlength="10" minlength="10" placeholder=""
                                            name="mobilenumber" value="<?php echo $adminDetails['phone']; ?>" />

                                    </div>
                                    <div class="col-lg-5">
                                        <label>E-Mail</label>
                                        <input type="email" class="form-control form-control-lg" required parsley-type="email" placeholder="" name="email" value="<?php echo $adminDetails['email']; ?>" />

                                    </div>
                                      <div class="col-lg-5">
                                        <label>Password</label>
                                        <input type="password" id="pass2" class="form-control form-control-lg"
                                            placeholder="" name="password" />
                                        <span class="text-muted ml-2">(If you want to change password then enter else
                                            keep blank)</span>
                                    </div>
                                  
                                      <div class="col-lg-5">
                                        <label>Status</label>

                                        <select name="user_status" class="form-control form-control-lg " required>
                                            <option value=""> -Status -</option>
                                            <option value="1" <?php echo (isset($adminDetails) && !empty($adminDetails) && $adminDetails['status']=='1') ? 'selected' : ''; ?>> Active</option>
                                                Active</option>
                                            <option value="0" <?php echo (isset($adminDetails) && !empty($adminDetails) && $adminDetails['status']=='0') ? 'selected' : ''; ?>>In Active</option>

                                        </select>

                                    </div>
                                      <div class="col-lg-5">

                                        <label>User Type</label>

                                           <select name="admin_type" class="form-control form-control-lg" required>
                                 <option selected ><--Select User Type--></option>
                                    
                                     <option value="admin" <?php echo (isset($adminDetails) && !empty($adminDetails) && $adminDetails['loginType']=='sub_admin') ? 'selected' : ''; ?>>Admin</option>
                                     
                                <option value="manager" <?php echo (isset($adminDetails) && !empty($adminDetails) && $adminDetails['loginType']=='manager') ? 'selected' : ''; ?>>Manager</option>
                                          
                                          <option value="editor" <?php echo (isset($adminDetails) && !empty($adminDetails) && $adminDetails['loginType']=='editor') ? 'selected' : ''; ?>>Editor</option>

                                          <option value="moderator" <?php echo (isset($adminDetails) && !empty($adminDetails) && $adminDetails['loginType']=='moderator') ? 'selected' : ''; ?>>Moderator</option>
                                         
                                          <option value="branch" <?php echo (isset($adminDetails) && !empty($adminDetails) && $adminDetails['loginType']=='branch') ? 'selected' : ''; ?>>Branch</option>
                              </select>
                                    </div>
                                </div>

                             
                                  

                                <div class="row  form-group">
                                    <div class="col-lg-5">
                                        <input type="hidden" name="id" value="<?php echo $adminDetails['id']; ?>">
                                        <button type="submit"
                                            class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1">
                                            Submit
                                        </button>
                                    </div>
                                    <div class="col-lg-5">
                                        <a href="<?php echo site_url('adminusers'); ?>"
                                            class="btn btn-lg btn-block btn-secondary waves-effect"> Cancel</a>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

<script>
function showhideUnitType() {


    if ($('#user_type').val() == "productionunit" || $('#user_type').val() == "downloader"|| $('#user_type').val() == "frontoffice"|| $('#user_type').val() == "ccteam"|| $('#user_type').val() == "printer") {
        $('#unit_type').css("display", "block")

    } else {
        $('#unit_type').css("display", "none");
    }
    
    if ($('#user_type').val() == "salesexecutive") {
        $('#zonalmanager').css("display", "block")

    } else {
        $('#zonalmanager').css("display", "none");
    }
}
</script>