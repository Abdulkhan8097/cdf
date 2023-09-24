<!-- Right Sidebar -->
<?php
$session = session();
$settingObj = new \App\Models\SettingsModel();
$settingarr = $settingObj->getNameValuepair();
?>
<div class="right-bar">
    <div data-simplebar class="h-100" style="overflow-y: auto;">
        <div class="rightbar-title px-3 py-4">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
            <h5 class="m-0"><?php echo $session->get('name'); ?></h5>
            <i class="m-0 text-primary font-size-18">
                <?php if ($session->get('partner_type')) echo ucfirst($session->get('partner_type')) . " Partner"; ?>  
            </i>
            <div>
                <?php if ($session->get('partner_type') == 'silver') { ?>
                    <i class="fas fa-star text-warning"></i>
                <?php } else if ($session->get('partner_type') == "gold") { ?>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                <?php } else if ($session->get('partner_type') == "diamond") { ?>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                <?php } ?>
            </div>
            <p> <?php echo $session->get('email'); ?></p>
        </div>
        <!-- Settings -->
        <hr class="mt-0" />

        <div class="col-8  font-size-16 mb-2">
            <a href="<?php echo site_url('userdashboard'); ?>" class="text-dark"><i class="fa fa-home"></i> &nbsp; Home</a>
        </div>

        <hr class="mt-0" />
        <div class="col-8  font-size-16 mb-2">
            <a href="<?php echo site_url('myorders'); ?>" class="text-dark"><i class="fa fa-shopping-cart"></i> &nbsp;My Orders</a>
        </div>
        <hr class="mt-0" />
        <div class="col-8  font-size-16 mb-2">
            <a href="<?php echo site_url('changepwd'); ?>" class="text-dark"><i class="fa fa-lock"></i> &nbsp;Change Password</a>
        </div>

        <hr class="mt-0" />
        <div class="col-8  font-size-16 mb-2">
            <a href="<?php echo site_url('ulogout'); ?>" class="text-dark"><i class="fa fa-unlock"></i> &nbsp;Log out</a>
        </div>
        <?php if (isset($settingarr['RGB_CATALOG']) && $settingarr['RGB_CATALOG']) { ?>
            <hr class="mt-0" />
            <div class="col-8  font-size-16 mb-2">
                <a href="<?php echo base_url('catalog/' . $settingarr['RGB_CATALOG']); ?>" target="_blank" class="text-dark"><i class="fas fa-file-download text-info"></i> &nbsp;RGB Catalog</a>
            </div>
        <?php } ?>
        <?php if (isset($settingarr['CMYK_CATALOG']) && $settingarr['CMYK_CATALOG']) { ?>
            <hr class="mt-0" />
            <div class="col-8  font-size-16 mb-2">
                <a href="<?php echo base_url('catalog/' . $settingarr['CMYK_CATALOG']); ?>" target="_blank" class="text-dark"><i class="fas fa-file-download text-info"></i> &nbsp;CMYK Catalog</a>
            </div>
        <?php } ?>
        <?php if (isset($settingarr['RGB_PRICELIST']) && $settingarr['RGB_PRICELIST']) { ?>
            <hr class="mt-0" />
            <div class="col-8  font-size-16 mb-2">
                <a href="<?php echo base_url('catalog/rbgpricelist.pdf' . $settingarr['RGB_PRICELIST']); ?>" target="_blank" class="text-dark"><i class="fas fa-file-alt text-primary "></i> &nbsp;RGB Pricelist </a>
            </div>
        <?php } ?>
        <?php if (isset($settingarr['CMYK_PRICELIST']) && $settingarr['CMYK_PRICELIST']) { ?>
            <hr class="mt-0" />
            <div class="col-8  font-size-16 mb-2">
                <a href="<?php echo base_url('catalog/' . $settingarr['CMYK_PRICELIST']); ?>" target="_blank" class="text-dark"><i class="fas fa-file-alt text-primary "></i> &nbsp;CMYK Pricelist </a>
            </div>
        <?php } ?>

        <hr class="mt-0" />
        <div class="col-12  font-size-16 mb-2">

            <?php echo $session->get('address') ?>

        </div>
        <?php if (isset($settingarr['BANK_DETAIL']) && $settingarr['BANK_DETAIL']) { ?>
            <hr class="mt-0" />
            <div class="col-12  font-size-16 mb-2">

                <?php echo $settingarr['BANK_DETAIL']; ?>

            </div>

        <?php } ?>
        <?php 
        $paynowstatus = $session->get('paynowstatus');
        if ($paynowstatus && isset($settingarr['PAYMENT_URL']) && trim($settingarr['PAYMENT_URL'])) { ?>
            <hr class="mt-0" />
            <div class="col-8  font-size-16 mb-2">
                <a href="<?php echo $settingarr['PAYMENT_URL']; ?>" target="_blank" class="btn btn-primary camron_bg w-md waves-effect waves-light"> Pay Now</a>
            </div>
        <?php } ?>
        <?php if (isset($settingarr['SUPPORT_NUMBER']) && $settingarr['SUPPORT_NUMBER']) { ?>
            <hr class="mt-0" />
            <div class="col-8  font-size-16 mb-2">
                Contact Number:
                <?php echo $settingarr['SUPPORT_NUMBER']; ?>
            </div>
        <?php } ?>
        <?php if (isset($settingarr['SUPPORT_EMAIL']) && $settingarr['SUPPORT_EMAIL']) { ?>
            <hr class="mt-0" />
            <div class="col-8  font-size-16 mb-2">
                Email:
                <?php echo $settingarr['SUPPORT_EMAIL']; ?>
            </div>
        <?php } ?>

        <?php if (isset($settingarr['FACEBOOK_URL']) && $settingarr['FACEBOOK_URL']) { ?>
            <hr class="mt-0" />
            <div class="col-8  font-size-16 mb-2">
                Social Links:<br>
                <a href="<?php echo $settingarr['FACEBOOK_URL']; ?>" target="_blank"><i class="mdi mdi-facebook-box font-size-24"></i></a>
                <a href="<?php echo $settingarr['INSTAGRAME_URL']; ?>" target="_blank"><i class="mdi mdi-instagram font-size-24"></i></a>
                <a href="<?php echo $settingarr['TWITTER_URL']; ?>" target="_blank"><i class="mdi mdi-twitter font-size-24"></i></a>
                <a href="<?php echo $settingarr['YOUTUBE_URL']; ?>" target="_blank"><i class="mdi mdi-youtube font-size-24"></i></a>

            </div>
        <?php } ?>

        <hr class="mt-0" />



    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
