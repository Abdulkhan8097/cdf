    <div class="account-pages">
    <?php  echo view('user/topmenu'); ?>
       
        <br>
        <br>
        <br>
        
        <div class="container ">
            <div class="row justify-content-center pt-4">
                <div class="col-md-8 col-lg-6 col-xl-5">

                    <div class="card overflow-hidden border ">


                        <div class="card-body p-2">
                            <div class="p-3">
                                <form class="form-horizontal mt-4" method="post" role="form" name="loginForm"
                                    id="loginForm" action="<?php echo site_url('login'); ?>">

                                    <?php echo \Config\Services::validation()->listErrors(); ?>
                                    <?php echo csrf_field() ?>
                                    <?php echo view('user/_topmessage'); ?>

                                    <div class=" form-group">
                                        <!-- <label for="username">Username</label> -->
                                        <div class="input-group ">
                                            <span
                                                class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </span>
                                            <input type="text" class="form-control form-control-lg " id="username"
                                                name="username" placeholder="Mobile Number"
                                                value="<?php echo isset($cameronuser) ? $cameronuser : ''; ?>"
                                                required="">
                                        </div>
                                    </div>

                                    <div class=" form-group">
                                        <!-- <label for="username">Password</label> -->
                                        <div class="input-group form-group" id="show_hide_password">
                                            <span
                                                class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                            </span>
                                            <input type="password" class="form-control form-control-lg" id="password"
                                                name="password" placeholder="Enter password"
                                                value="<?php echo isset($cameronpass) ? $cameronpass : ''; ?>" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><a href="javascript::void(0);"
                                                        onclick="showhidepass()"><i
                                                            class="fa fa-eye-slash"></a></i></span>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="custom-control  custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customControlInline" name="userremember"
                                                    <?php echo isset($userremember) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label" for="customControlInline">Remember
                                                    me</label>
                                            </div>
                                        </div>
                                        <!-- <div class="col-sm-6 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                        </div> -->
                                    </div>
                                    <div class="form-group">


                                        <button
                                            class="btn btn-block btn-lg btn-primary camron_bg w-md waves-effect waves-light"
                                            type="submit">Log In</button>

                                    </div>

                                    <div class="form-group mt-2 mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="<?php echo site_url('forgotpassword'); ?>"><i
                                                    class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2 mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="<?php echo site_url('enquiry'); ?>"><i class="mdi mdi-note"></i>
                                                Send Enquiry</a>
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