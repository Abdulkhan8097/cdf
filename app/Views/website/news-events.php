<style type="text/css">
   img{
   display: inline;
   }

   .events__img {
   
    box-shadow: 1px 2px 11px #3b2b9850;
}
.events__date {
   
    background-color: #381bdd7a;
    z-index: auto;
   
}

   @media (min-width: 1200px){
   .eventimg{
   height: 250px!important;
   width: 350px!important; 
   margin-left: 10px!important;
   }
   .events__title a {
   font-size: 16px!important;
   }
   .events__meta li {
   font-size: 16px!important;
   line-height: 30px!important;
   font-weight: 600!important;
   color: black!important;
   }
   .more{
   font-family: Roboto, Sans-serif!important;
   font-size: 15px!important;
   font-weight: 400!important;
   border-radius: 49px!important;
   margin-top: 5px!important; 
   padding: 10px 20px 10px 19px!important;
   color: #000000!important;
   text-decoration: none!important;
   background-color: #FFDE00!important;
   color: #000000!important;
   background-color: #ffde00!important;
   }
   .more:hover{
   font-family: Roboto, Sans-serif!important;
   font-size: 15px!important;
   font-weight: 400!important;
   border-radius: 49px!important;
   margin-top: 5px!important; 
   padding: 10px 20px 10px 19px!important;
   color: #000000!important;
   text-decoration: none!important;
   background-color: #FFDE00!important;
   color: #ffffff!important;
   background-color: #462fa0!important;
   }
   .events__content {
   
      padding: 15px 15px 21px 28px!important;
}

.events__title {
  
   margin-bottom: 5px!important;
}
   }


   @media (min-width: 678px){
      .events__title {
   
   margin-bottom: 50px;
}

   .more{
   font-family: Roboto, Sans-serif;
   font-size: 38px;
   font-weight: 400;
   border-radius: 49px;
   margin-top: 5px; 
   padding: 10px 20px 10px 19px;
   color: #000000;
   text-decoration: none;
   background-color: #FFDE00;
   color: #000000;
   background-color: #ffde00;
   }
   .more:hover{
   font-family: Roboto, Sans-serif;
   font-size: 38px;
   font-weight: 400;
   border-radius: 49px;
   margin-top: 5px; 
   padding: 10px 20px 10px 19px;
   color: #000000;
   text-decoration: none;
   background-color: #FFDE00;
   color: #ffffff;
   background-color: #462fa0;
   }
   .events__meta li {
   font-size: 34px;
   line-height: 75px;
   font-weight: 600;
   color: black;
   }
   .events__title a {
   font-size: 44px;
   }
   .eventimg{
   height: 250px;
   width: 350px; 
   margin-left: 10px;
   }
   }
   .myDiv{
   min-height: 68px!important;
   } 
</style>
<div data-elementor-type="wp-page" data-elementor-id="59" class="elementor elementor-59">
   <section class="elementor-section elementor-top-section elementor-element elementor-element-6a54a9f elementor-section-full_width elementor-section-height-default elementor-section-height-default wpr-particle-no wpr-jarallax-no wpr-parallax-no wpr-sticky-section-no" data-id="6a54a9f" data-element_type="section">
      <div class="elementor-container elementor-column-gap-no">
         <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-82c4417" data-id="82c4417" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
               <div class="elementor-element elementor-element-7075ed3  elementor-widget elementor-widget-pifoxen-event" data-id="7075ed3" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;}" data-widget_type="pifoxen-event.default">
                  <div class="elementor-widget-container">
                     <!--Events Page Start-->
                     <section class="events-page">
                        <div class="container">
                           <div class="row">
                              <?php
                                 helper('text');
                                 
                                 foreach ($newsevent as $eventsDetail) {
                                     ?>
                              <div class="col-xl-4 col-lg-6 col-md-6 event">
                                 <!--Events Single-->
                                 <div class="events__single"  onclick="window.open('<?php echo base_url('news-event-detail?id='.$eventsDetail->id); ?>','_self')">
                                    <div class="events__img">
                                       <img loading="lazy" width="370" height="256" src="<?php echo (isset($eventsDetail->events_image) && !empty($eventsDetail->events_image)) ?  base_url("public/NewsEvents/".$eventsDetail->events_image)  : BLANK_IMG; ?>" class="attachment-pifoxen_event_370X256 size-pifoxen_event_370X256 wp-post-image eventimg" alt=""  />
                                       <div class="events__date">
                                          <p><?php echo date('j M', strtotime($eventsDetail->event_date)); ?></p>
                                       </div>
                                    </div>
                                    <div class="events__content">
                                       <h3 class="events__title" style="font-size: initial;min-height: 67px;">
                                          <a  href="<?php echo site_url('news-event-detail?id='.$eventsDetail->id); ?>" style="color: var(--pifoxen-base, #ff5528);font-weight: 700;"><?php echo character_limiter($eventsDetail->title, 50); ?></a>
                                       </h3>
                                      <!--  <ul class="list-unstyled events__meta ml-0">
                                          <li><i class="far fa-clock"></i><?php //echo character_limiter($eventsDetail->topic, 16); ?></li>
                                          <li><i class="fas fa-map-marker-alt"></i><?php //echo $eventsDetail->location; ?></li>
                                       </ul> -->
                                     
                                       <a href="<?php echo site_url('news-event-detail?id='.$eventsDetail->id); ?>"  class="more" >Read More</a> 
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <?php if ($pagination['haveToPaginate']) { ?>
                              <?php echo view('admin/_paging', array('paginate' => $pagination, 'siteurl' => $action, 'varExtra' => $searchArray)); ?>
                              <?php } ?>
                           </div>
                        </div>
                     </section>
                     <!--Events Page End-->
                  </div>
               </div>
               <div class="elementor-element elementor-element-70c1003 elementor-widget elementor-widget-html" data-id="70c1003" data-element_type="widget" data-widget_type="html.default">
                  <div class="elementor-widget-container">
                     <style>
                        .events__content {
                        background-color: #eef;
                        box-shadow: 0px 3px 3px #3b2b9850;
                        }
                     </style>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>