<style>
   .SupportFundraisers_sf_widgetOuter__2UyPI {
   position: relative;
   width: 384px;
   min-height: 508px;
   margin:  0px;
   }
   .CampaignCard_sf_widget_content__KRqb_ {
   padding: 0px;
   box-sizing: border-box;
   }
   .SupportFundraisers_sf_widgetOuter__2UyPI {
   min-height: 444px;
   }
   .bottom-background{
   display: none;
   }
   a:not([href]):not([tabindex]) {
   color: black;
   }
</style>
<main class="main">
   <!-- donation start-->
   <section class="section donation py-5">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="text-center">
                  <?php if($list['cases_name']=='1'){?>
                  <div class="urgent-notifier">
                     This fundraiser is in an urgent need of funds
                  </div>
                  <?php }?>
               </div>
            </div>
            <div class="col-12">
               <div class="row donation-item">
                  <div class="col-md-6 donation-item__img"><img class="img--bg" src="<?php echo (isset($list['image_name']) && !empty($list['image_name'])) ? base_url('public/Cases/').'/'.$list['image_name'] : BLANK_IMG; ?>" alt="img"></div>
                  <div class="col-md-6 donation-item__body">
                     <div class="row">
                        <div class="col-12">
                           <h5 class="donation-item__title"><?php  echo $list['title']; ?></h5>
                        </div>
                     </div>
                     <div class="align-items-end mt-4">
                        <!-- <div class="">
                           <div class="progress-bar">
                               <div class="progress-bar__inner" style="width: 4.45%;">
                                   <div class="progress-bar__value">4 %</div>
                               </div>
                           </div>
                           </div> -->
                        <div class="">
                           <div class="donation-item__details-holder flex-start mt-2">
                              <div class="donation-item__details-item"><span>Goal: </span><span>₹ <?php  echo number_format($list['goal']); ?></span></div>
                              <!-- <div class="donation-item__details-item"><span>Pledged: </span><span>₹ 26700.00</span></div> -->
                           </div>
                        </div>
                        <div class="mt-3">
                           <?php  echo $list['description']; ?>
                        </div>
                        <div class="mt-4">
                           <input type="hidden" name="casid" value="<?php  echo $list['id']; ?>" />
                           <a type="button" class="button button--primary donate-btn lc" data-id="<?php echo $list['id']; ?>">Donate Now</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- donation end-->
   <section class="section pt-2 pb-5">
      <div class="container">
      <div class="row">
         <div class="col-12">
            <!-- cause details tabs start-->
            <div class="tabs horizontal-tabs cause-details-tabs">
               <ul class="horizontal-tabs__header">
                  <li><a href="#horizontal-tabs__item-1" class="py-2" ><span> Description </span></a></li>
                  <li><a href="#horizontal-tabs__item-4" class="py-2"><span>Documents </span></a></li>
               </ul>
               <div class="horizontal-tabs__content">
                  <div class="horizontal-tabs__item pt-3" id="horizontal-tabs__item-1">
                     <p dir="ltr" style="line-height:1.2;text-align: justify;margin-top:12pt;margin-bottom:12pt;"><span style="font-size: 11pt; font-family: Verdana; color: rgb(37, 37, 37); background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"><?php  echo $list['details_description']; ?>	</span></p>
                  </div>
        
                  <div class="horizontal-tabs__item pt-3" id="horizontal-tabs__item-4">
                    
                        <div class="container">
                           <div class="row">
                              <?php   
                                 if (isset($doc[0]->doc_id) && !empty($doc[0]->doc_id)) {
                                           foreach($doc as $docDetails){ ?>
                              <div class="col-md-4">
                                 <!-- Content for the first column -->
                                 <div class="MuiBox-root jss279 SupportFundraisers_sf_widgetOuter__2UyPI">
                                    <div class="MuiBox-root jss289 CampaignCard_sf_widget__3zK_L">
                                       <a
                                          href="<?php echo base_url('public/Cases/Document').'/'.$docDetails->doc_image; ?>">
                                          <div class="MuiBox-root jss290 CampaignCard_sf_widget_img__28TuM">
                                             <div class="slider-img-wrapper"
                                                style="background: unset; cursor: pointer; min-height: 100%;"><span
                                                class=" lazy-load-image-background blur lazy-load-image-loaded"
                                                style="color: transparent; display: inline-block;">
                                                <img  width="450" height="300"
                                                alt="<?php echo $docDetails->doc_image; ?>"
                                                src="<?php echo base_url('public/Cases/Document').'/'.$docDetails->doc_image; ?>"></span></div>
                                             <div></div>
                                          </div>
                                       </a>
                                       <div class="MuiBox-root jss291 CampaignCard_sf_widget_content__KRqb_">
                                          <div class="MuiBox-root jss292">
                                             <a
                                                href="<?php echo base_url('public/Cases/Document').'/'.$docDetails->doc_image; ?>">
                                                <h3 style="text-align: center;"><?php echo $docDetails->doc_name; ?></h3>
                                                <div class="MuiBox-root jss293 CampaignCard_sfw_progress__2iq1J">
                                                   <div class="MuiBox-root jss294 CampaignCard_supporterNdays__TiTI5">
                                                      <div class="MuiBox-root jss295 CampaignCard_supporter__1tE01">
                                                      </div>
                                                   </div>
                                                   <div class="MuiBox-root jss297 CampaignCard_sfw_progressBar__3Cql9">
                                                   </div>
                                                   <div class="MuiBox-root jss298 CampaignCard_sfw_stats__1VsLJ">
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
                              </div>
                              <?php
                                 }
                                 }
                                 ?>
                           </div>
                        </div>
              
                  </div>
               </div>
               <!-- cause details tabs end-->
            </div>
         </div>
      </div>
   </section>
</main>