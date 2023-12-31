
<body class="bg-gradient-primary">
<style>
    .sticky-footer{
        display: none;
    }
    #img{
        background-position: center;
    background-size: cover
    }
</style>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block " style="background: aliceblue;">
                                <br>
                                <br>
                            <img id="img" src="<?php echo base_url('Content/assets/img/logo/cdf.gif')?>" alt="" height="280" width="500" >
                            </div>
                            <div class="col-lg-6" style="background: aliceblue;">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="form-horizontal mt-4" method="post" role="form" name="loginForm" id="loginForm" action="<?php echo site_url("admin/index");?>" >
                                    <?php echo \Config\Services::validation()->listErrors(); ?>
                                    <?php echo csrf_field() ?>
                                    <?php echo view('admin/_topmessage'); ?>    
                                    <div class="form-group">
                                            <input type="text" name="username"  id="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="adminremember" id="adminremember"  class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <button id="gobutton" class="btn btn-primary btn-user btn-block">Login</button>
                                            
                                        </a>
                                        <hr>
                                        <a href="javascript:void(0);" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo site_url("forgot-password");?>">Forgot Password?</a>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>
