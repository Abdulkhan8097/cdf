<style>
   .bottom-background{
   display: none;
   }
</style>
<main class="main">
<section class="promo-primary">
   <picture>
      <source srcset="Content/assets/img/causes.jpg" media="(min-width: 992px)" />
      <img class="img--bg" src="Content/assets/img/causes.jpg" alt="img" />
   </picture>
   <div class="promo-primary__description"> <span>Charity</span></div>
   <div class="container">
      <div class="row">
         <div class="col-auto">
            <div class="align-container">
               <div class="align-container__item">
                  <span class="promo-primary__pre-title">Cosmo</span>
                  <h1 class="promo-primary__title"><span>Our</span> <span>Cases</span></h1>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="section causes background--brown" id="show">
   <img class="causes__bg" src="Content/assets/img/causes_img.png" alt="img" />
   <div class="container">
      <div class="row align-items-start margin-bottom">
      </div>
      <div class="row offset-margin">
         <div class="MuiBox-root jss54 SupportFundraisers_sf_widgets_wrapper__1jvgd">
            <?php helper('text');  $i =1;
               foreach($cases as $casesDetail){ 
               $total=$casesDetail->goal;
               $reachAmount=$casesDetail->reach;
               $conutAmount=$reachAmount*100;
               $totalProgress=$conutAmount/$total;
               
                  ?>
            <div class="MuiBox-root jss279 SupportFundraisers_sf_widgetOuter__2UyPI">
               <div class="MuiBox-root jss289 CampaignCard_sf_widget__3zK_L">
                  <a
                     href="<?php echo base_url('cases-details?id='.$casesDetail->id);?>#donate">
                     <div class="MuiBox-root jss290 CampaignCard_sf_widget_img__28TuM">
                        <div class="slider-img-wrapper"
                           style="background: unset; cursor: pointer; min-height: 100%;"><span
                           class=" lazy-load-image-background blur lazy-load-image-loaded"
                           style="color: transparent; display: inline-block;"><img
                           alt="Help 67-year-old Vanitha provide 80 abandoned orphans with shelter and care"
                           src="<?php echo (isset($casesDetail->image_name) && !empty($casesDetail->image_name)) ? base_url('public/Cases/').'/'.$casesDetail->image_name : BLANK_IMG; ?>"></span></div>
                        <div></div>
                        <p class="CampaignCard_taxBenefits__kdQSH">Sucessful Case</p>
                     </div>
                  </a>
                  <div class="MuiBox-root jss291 CampaignCard_sf_widget_content__KRqb_">
                     <div class="MuiBox-root jss292">
                        <a
                           href="<?php echo base_url('cases-details?id='.$casesDetail->id);?>#donate">
                           <h3><?php  echo character_limiter($casesDetail->title,46); ?></h3>
                           <div class="MuiBox-root jss293 CampaignCard_sfw_progress__2iq1J">
                              <div class="MuiBox-root jss294 CampaignCard_supporterNdays__TiTI5">
                                 <div class="MuiBox-root jss295 CampaignCard_supporter__1tE01">
                                
                                 </div>
                             
                              </div>
                              <div class="MuiBox-root jss297 CampaignCard_sfw_progressBar__3Cql9">
                  
                              </div>
                              <div class="MuiBox-root jss298 CampaignCard_sfw_stats__1VsLJ">
                                 <!-- <strong><span
                                    class="currency-font-roboto">₹</span>27,52,872</strong>
                                    <span>Raised
                                    of&nbsp; -->
                                 <span class="currency-font-roboto">₹</span><?php echo number_format($casesDetail->goal,0); ?>&nbsp;goal</span>
                              </div>
                              <div class="MuiBox-root jss343 CampaignCard_sfw_cta__2WRnz"><button
                                 class="primary_cta animate-shiny-button" type="submit">Donate
                                 Now</button>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
               <div>
                  <div class="MuiBackdrop-root jss56" aria-hidden="true" style="opacity: 0; visibility: hidden;">
                  </div>
               </div>
            </div>
            <?php }?>
         </div>
         
      </div>
   </div>
   
</section>
<div style="margin: 19px;">
<?php if ($pagination['haveToPaginate']) { ?>
          
          <?php echo view('admin/_paging', array('paginate' => $pagination, 'siteurl' => '../'.$action, 'varExtra' => $searchArray)); ?>

       <?php } ?>

</div>