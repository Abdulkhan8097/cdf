<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php include_title(); ?>
        <?php include_metas(); ?>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets//css/sb-admin-2.min.css')?>" rel="stylesheet">
<style>
    #img{
        background-position: center;
    background-size: cover
    }
</style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block "> 
                                <img  id="img"  width="500" height="400" src="<?php echo base_url('Content/assets/img/forgot.png') ?>"  >
                            </div>
                           
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Change Your Password</h1>
                                        <p class="mb-4">Ready to reset your password? Simply enter New Password below.</p>
                                    </div>
                                    <form action="<?php echo base_url('resetpasswordadmin')?>" method="post">
                                        <div class="form-group">
                                        <?php echo view('admin/_topmessage'); ?>
                                            <input type="text" name="password" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter New Password...">
                                        </div>
                                        <div class="form-group">
                                       
                                            <input type="text" name="password2" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Confirm Password...">
                                        </div>
                                        <input type="hidden"  id="ps" name="ps"> 
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                    </button>
                                    </form>
                                    <hr>
                                
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('admin')?>">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
 const queryString = window.location.search;
const Urlparams =  new URLSearchParams(queryString);
const ids = Urlparams.get('ps');
if(ids){
        
      var setdata=sessionStorage.setItem('ps',ids);  

  var  getdata=sessionStorage.getItem('ps');
  document.getElementById('ps').value = getdata;


}else{
 // document.getElementById('getref').innerHTML = localStorage.getItem('refid');
 document.getElementById('ps').value = sessionStorage.getItem('ps');

}


</script>

</body>

</html>