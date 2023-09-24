<div class="col-xl-3 col-md-6">
    <div class="card mini-stat <?php echo $bgcolor ? $bgcolor : 'bg-primary'; ?> text-white">
        <a href="<?php $pageurl = $boxurl ? $boxurl :"" ; echo site_url($pageurl); ?>">
        <div class="card-body">
            <div class="mb-4">

                <h5 class="font-size-16 text-uppercase mt-0 text-white"><?php echo $boxtitle ? $boxtitle: ""; ?></h5>
                <h4 class="font-weight-medium font-size-24 text-white"><?php echo $boxcount ? $boxcount : ""; ?></h4>

              <!--   <div class="mini-stat-label <?php echo $weekbgcolor ? $weekbgcolor :""; ?> text-white">
                    This Week
                    <p class="mb-0 "><?php echo $weekcount ? $weekcount : ""; ?></p>
                </div> -->
            </div>
            
                <div class="pt-2">

                    <div class="float-right">
                        <i class="mdi mdi-arrow-right h5 text-white"></i>
                    </div>

                    <p class="text-white mb-0 mt-1"><?php echo $boxtitle ? $boxtitle: ""; ?> View All</p>
                </div>
            
        </div>
        </a>
    </div>
</div>