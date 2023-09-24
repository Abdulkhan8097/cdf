    <div class="account-pages  bg-white">
        <?php  echo view('user/topmenu'); ?>
       
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row justify-content-center pt-4">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <!-- <div class="pt-2 pb-2 text-center">
                <img src="<?php echo base_url('images/logo.png'); ?>" height="80" alt="Cameron">
                </div> -->
                    <div class="card overflow-hidden border">
                        <div class="camron_bg">
                            <div class="text-primary text-center p-2">
                                <h5 class="text-white font-size-20">Forgot Password?</h5>

                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="form-horizontal mt-4" method="post" role="form" name="loginForm"
                                    action="<?php echo site_url("forgotpassword");?>">

                                    <?php echo \Config\Services::validation()->listErrors(); ?>
                                    <?php echo csrf_field() ?>
                                    <?php echo view('user/_topmessage'); ?>

                                    <div class=" form-group">

                                        <div class="input-group ">
                                            <span
                                                class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </span>
                                            <input type="text" class="form-control form-control-lg " id="username"
                                                name="username" placeholder="Mobile no" required="">
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <button
                                            class="btn btn-block btn-lg btn-primary camron_bg w-md waves-effect waves-light"
                                            type="submit">Submit</button>

                                    </div>

                                    <div class="form-group mt-2 mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="<?php echo site_url(''); ?>"><i class="fa fa-arrow-left"></i> Go
                                                back for login</a>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>

                    <!-- <div class=" text-center">
                        <p class="mb-0 font-size-18"> Powered By <img src="<?php echo base_url('images/andlogo.png'); ?>" height="40" alt="&AND Solution"></p>
                    </div> -->


                </div>
            </div>
        </div>
    </div>


    <script>
function showhidepass() {
    if ($('#show_hide_password input').attr("type") == "text") {
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass("fa-eye-slash");
        $('#show_hide_password i').removeClass("fa-eye");
    } else if ($('#show_hide_password input').attr("type") == "password") {
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass("fa-eye-slash");
        $('#show_hide_password i').addClass("fa-eye");
    }
}
    </script>