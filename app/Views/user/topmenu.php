<?php 
$session = session();
 $settingObj= new \App\Models\SettingsModel();
 $settingarr= $settingObj->getNameValuepair();
 
?>
<header id="page-topbar">
    <div class="navbar-header bg-seconday border-bottom">
        <div class="d-flex ml-4">
            <a href="<?php echo site_url('userdashboard'); ?>">
                <img src="<?php echo base_url('images/'.$settingarr['FRONT_LOGO']); ?>" alt="" height="80px">
            </a>
        </div>

        <div class="d-flex">

            <div class="d-flex  ">
                <div class="dropdown dropdown-menu-right d-inline-block">
                    
                </div>

            </div>

        </div>
        <div class="d-flex">

            <div class="d-flex  ">
                <div class="dropdown dropdown-menu-right d-inline-block">
                   
                </div>

            </div>
            <?php if($session->get('isUserLoggedIn')){ ?>
            <div class="d-flex ">
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                        <i class="mdi mdi-view-sequential" style="font-size:45px;"></i>
                    </button>
                </div>

            </div>
            <?php } ?>

        </div>

    </div>
</header>