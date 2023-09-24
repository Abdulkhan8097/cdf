   <style type="text/css">
   img{
      display: inline;
   }


   @media (min-width: 768px){
      .section-title__title {
      margin: 0;
    font-size: 70px;
    line-height: 69px;
      }
      .contact-page__text {
    margin: 0;
    line-height: 46px;
    font-size: 39px;
}
.contact-page__social a {
   
    height: 81px;
    width: 81px;
    font-size: 39px;
   
}
.comment-form__input-box input[type="text"], .comment-form__input-box input[type="password"], .comment-form__input-box select, .comment-form__input-box input[type="search"], .comment-form__input-box input[type="email"] {
    height: 100px;
    width: 100%;
    font-size: 36px;
   
}
.comment-form__input-box textarea {
    font-size: 36px;
   
}
.thm-btn {
   
    font-size: 24px;
   
}
.feature-one__title {
    font-size: 43px;
    line-height: 56px;
   
}
.feature-one__text {
    font-size: 30px;
    line-height: 49px;
   
}
   }


    @media (min-width: 1200px){
      .feature-one__text {
    font-size: 16px!important;
    line-height: 30px!important;
   
}
      .feature-one__title {
    font-size: 24px!important;
   line-height: 34px!important;  
}
      .thm-btn {
    font-size: 14px!important;
  }
      .comment-form__input-box textarea {
    font-size: 14px!important;
  }
      .comment-form__input-box input[type="text"], .comment-form__input-box input[type="password"], .comment-form__input-box select, .comment-form__input-box input[type="search"], .comment-form__input-box input[type="email"] {
    height: 64px!important;
    width: 100%!important;
    font-size: 14px!important;
   
}
      .contact-page__social a {
   
   height: 40px!important;
   width: 40px!important;
   font-size: 15px!important;
  
}
      .contact-page__text {
    margin: 0!important;
    line-height: 36px!important;
    font-size: 16px!important;
}
      .section-title__title {
    margin: 0!important;
    font-size: 50px!important;
    line-height: 60px!important;
}
}



.CaptchaWrap { position: relative; }
.CaptchaTxtField { 
  border-radius: 5px; 
  border: 1px solid #ccc; 
  display: block;  
  box-sizing: border-box;
}

#UserCaptchaCode { 
  padding: 15px 10px; 
  outline: none; 
  font-size: 18px; 
  font-weight: normal; 
  font-family: 'Open Sans', sans-serif;
  width: 343px;
}
#CaptchaImageCode { 
  text-align:center;
 /* margin-top: 15px;*/
  padding: 0px 0;
  width: 300px;
  overflow: hidden;
}

.capcode { 
  font-size: 46px; 
  display: block; 
  -moz-user-select: none;
  -webkit-user-select: none;
  user-select: none; 
  cursor: default;
  letter-spacing: 1px;
  color: #ccc;
  font-family: 'Roboto Slab', serif;
  font-weight: 100;
  font-style: italic;
}

.ReloadBtn { 
  background:url('https://cdn3.iconfinder.com/data/icons/basic-interface/100/update-64.png') left top no-repeat!important;   
  background-size : 100%!important;
  width: 32px; 
  height: 32px;
  border: 0px; outline none;
  position: absolute; 
  bottom: 30px;
  left : 310px;
  outline: none;
  cursor: pointer; /**/
}
.btnSubmit {
  margin-top: 15px;
  border: 0px;
  padding: 10px 20px; 
  border-radius: 5px;
  font-size: 18px;
  background-color: #1285c4;
  color: #fff;
  cursor: pointer;
}

.error { 
  color: red; 
  font-size: 12px; 
  display: none; 
}
.success {
  color: green;
  font-size: 18px;
  margin-bottom: 15px;
  display: none;
}
a.thm-btn.comment-form__btn.cap {
    color: #000;
}
a.thm-btn.comment-form__btn.cap:hover {
    color: #ffffff;
}
    
</style>
    <form action="<?php echo base_url('contactformsave'); ?>" method="post" >
  <div data-elementor-type="wp-page" data-elementor-id="7051" class="elementor elementor-7051">
            <section class="elementor-section elementor-top-section elementor-element elementor-element-d5e55c8 elementor-section-full_width elementor-section-height-default elementor-section-height-default wpr-particle-no wpr-jarallax-no wpr-parallax-no wpr-sticky-section-no" data-id="d5e55c8" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
               <div class="elementor-background-overlay"></div>
               <div class="elementor-container elementor-column-gap-default">
                  <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-c6233f3" data-id="c6233f3" data-element_type="column">
                     <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-1d4e22d elementor-widget elementor-widget-html" data-id="1d4e22d" data-element_type="widget" data-widget_type="html.default">
                           <div class="elementor-widget-container">
                              <style>
                                 .thm-btn {
                                 background-color: #ffde00;
                                 color: #121212;
                                 }
                                 .thm-btn::before {
                                 background-color: #3b2b98;
                                 color: #fff;
                                 }
                                 .feature-one__single {
                                 background-color: #154eb0;
                                 }
                                 .feature-one__single-2 {
                                 background-color: #6f1cb0
                                 }
                              </style>
                           </div>
                        </div>
                        <div class="elementor-element elementor-element-18ca008 elementor-widget elementor-widget-pifoxen-contact-form" data-id="18ca008" data-element_type="widget" data-widget_type="pifoxen-contact-form.default">
                           <div class="elementor-widget-container">
                              <!--Contact Page Start-->
                              <section class="contact-page">
                                 <div class="container">
                                    <div class="row">
                                       <div class="col-xl-4 col-lg-5">
                                          <div class="contact-page__left">
                                             <div class="section-title text-left">
                                                <h2 class="section-title__title">Get In Touch</h2>
                                             </div>
                                             <p class="contact-page__text"><b>Call Us - </b><a href="tel:<?php echo \App\Models\SettingsModel::getvaluebyname('CONTACT_PHONE');  ?>"><?php echo \App\Models\SettingsModel::getvaluebyname('CONTACT_PHONE');  ?></a><br><br>
                                                <b>Email Us -</b> <a href="mailto:<?php echo \App\Models\SettingsModel::getvaluebyname('CONTACT_EMAIL');  ?>"><?php echo \App\Models\SettingsModel::getvaluebyname('CONTACT_EMAIL');  ?></a>
                                             </p>
                                             <div class="contact-page__social">
                                                <a target=_blank class="icon-svg" href="<?php echo \App\Models\SettingsModel::getvaluebyname('FACEBOOK_URL');  ?>">
                                                <i aria-hidden="true" class="  fab fa-facebook-f"></i>                                    </a>
                                                <a target=_blank class="icon-svg" href="<?php echo \App\Models\SettingsModel::getvaluebyname('INSTAGRAME_URL');  ?>">
                                                <i aria-hidden="true" class="  fab fa-instagram"></i>                                    </a>
                                                <a target=_blank class="icon-svg" href="<?php echo \App\Models\SettingsModel::getvaluebyname('YOUTUBE_URL');  ?>">
                                                <i aria-hidden="true" class="  fab fa-youtube"></i>                                    </a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-xl-8 col-lg-7">
                                          <div class="contact-page__right">
                                             <div role="form" class="wpcf7" id="wpcf7-f195-p7051-o1" lang="en-US" dir="ltr">
                                                <div class="screen-reader-response">
                                                   <p role="status" aria-live="polite" aria-atomic="true">
                                                   <ul></ul>
                                                </div>
                                              
                                                 <?php echo view('admin/users/_topmessage'); ?>
                                                   <div class="comment-one__form" >
                                                      <div class="row">
                                                         <div class="col-xl-6">
                                                            <div class="comment-form__input-box">
                                                               <span class="wpcf7-form-control-wrap your-name">
                                                                  <input type="text" name="name" value="" size="40"  aria-required="true" aria-invalid="false" required placeholder="Your Name" /></span>
                                                            </div>
                                                         </div>
                                                         <div class="col-xl-6">
                                                            <div class="comment-form__input-box">
                                                               <span class="wpcf7-form-control-wrap your-email"><input type="email" name="email" value="" size="40" aria-required="true" aria-invalid="false"required placeholder="Email Address" /></span>
                                                            </div>
                                                         </div>
                                                         <div class="col-xl-6">
                                                            <div class="comment-form__input-box">
                                                               <span class="wpcf7-form-control-wrap your-phone"><input type="text" name="phone" value="" size="40"aria-required="true" aria-invalid="false" onkeypress="numericFilter(this)" required placeholder="Phone Number" /></span>
                                                            </div>
                                                         </div>
                                                         <div class="col-xl-6">
                                                            <div class="comment-form__input-box">
                                                               <span class="wpcf7-form-control-wrap your-subject">
                                                                  <select name="subject" caria-required="true" aria-invalid="false" required>
                                                                     <option value="Subject">Subject</option>
                                                                     <option value="Query about Donation">Query about Donation</option>
                                                                     <option value="Want to be a volunteer">Want to be a volunteer</option>
                                                                     <option value="CSR partnership">CSR partnership</option>
                                                                     <option value="NGO Collaboration">NGO Collaboration</option>
                                                                     <option value="General inquiry">General inquiry</option>
                                                                     <option value="Other">Other</option>
                                                                  </select>
                                                               </span>
                                                            </div>
                                                         </div>
                                                      </div>

                                                      <div class="row">
                                                         <div class="col-xl-12">
                                                            <div class="comment-form__input-box text-message-box">
                                                               <span class="wpcf7-form-control-wrap your-message"><textarea name="description" cols="40" rows="10" aria-required="true" aria-invalid="false" required placeholder="Write a Comment"></textarea></span>
                                                            </div>
                                                             <div class="row">
                                                         <div class="col-xl-6">
                                                            <div class="comment-form__input-box">
                                                               <div class='CaptchaWrap'>
      <div id="CaptchaImageCode" class="CaptchaTxtField">
        <canvas id="CapCode" class="capcode" width="300" name="capch" height="80"></canvas>
      </div> 
      <input type="button" class="ReloadBtn" onclick='CreateCaptcha();'>
    </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-xl-6">
                                                            <div class="comment-form__input-box">
                                                                <input type="text" id="UserCaptchaCode" name="inputcaptch" class="CaptchaTxtField" placeholder='Enter Captcha - Case Sensitive'><span id="WrongCaptchaError" class="error"></span>
                                                            </div>
                                                         </div>
                                                        
                                                        
                                                      </div>
                                                       <div class="capsumbit comment-form__btn-box d-none ">
                                                               <button type="submit" class="thm-btn comment-form__btn AUTOBOTTON">Send us a
                                                               message</button>
                                                            </div>
                                                            
                                                      <div class="cap comment-form__btn-box">
                                                               <a type="btn" class="thm-btn comment-form__btn cap" onclick="CheckCaptcha();">Send us a
                                                               message</a>
                                                            </div>
                                                           
                                                         </div>
                                                      </div>
                                                   </div>
                                                 <!--   <div class="wpcf7-response-output" aria-hidden="true"></div> -->
                                                </form>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </section>
                              <!--Contact Page End-->
                           </div>
                        </div>
                         
                         <?php
                            $menucategory = new \App\Models\MenucategoryModel();
                            $searchArray = array("id" =>46);
                            $menuDetail = $menucategory->getData($searchArray);
                            $menuDetail = isset($menuDetail[0]) ? $menuDetail[0] : array();
                            if($menuDetail) {
                                echo $menuDetail['cat_pagecontent'];
                            }
                            ?>
                        
                     </div>
                  </div>
               </div>
            </section>
            <section class="elementor-section elementor-top-section elementor-element elementor-element-8119522 elementor-section-full_width elementor-section-height-default elementor-section-height-default wpr-particle-no wpr-jarallax-no wpr-parallax-no wpr-sticky-section-no" data-id="8119522" data-element_type="section">
               <div class="elementor-container elementor-column-gap-no">
                  <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-df66c2e" data-id="df66c2e" data-element_type="column">
                     <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-51b2d28 elementor-widget elementor-widget-pifoxen-google-maps" data-id="51b2d28" data-element_type="widget" data-widget_type="pifoxen-google-maps.default">
                           <div class="elementor-widget-container">
                              <div class="elementor-custom-embed">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3772.071005570497!2d72.84147201421177!3d19.016592558780395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7cedc44d0782f%3A0x854d42a509b8d7fd!2sKokan%20Kala%20Va%20Shikshan%20Vikas%20Sanstha!5e0!3m2!1sen!2sin!4v1666075793350!5m2!1sen!2sin" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>

   <script>
   function numericFilter(txb) {
       txb.value = txb.value.replace(/[^\0-9]/ig, "");
   }
</script> 
<script type="text/javascript">
   var cd;

$(function(){
  CreateCaptcha();
});

// Create Captcha
function CreateCaptcha() {
  //$('#InvalidCapthcaError').hide();
  var alpha = new Array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
                    
  var i;
  for (i = 0; i < 6; i++) {
    var a = alpha[Math.floor(Math.random() * alpha.length)];
    var b = alpha[Math.floor(Math.random() * alpha.length)];
    var c = alpha[Math.floor(Math.random() * alpha.length)];
    var d = alpha[Math.floor(Math.random() * alpha.length)];
    var e = alpha[Math.floor(Math.random() * alpha.length)];
    var f = alpha[Math.floor(Math.random() * alpha.length)];
  }
  cd = a + ' ' + b + ' ' + c + ' ' + d + ' ' + e + ' ' + f;
  $('#CaptchaImageCode').empty().append('<canvas id="CapCode" class="capcode" width="300" height="80"></canvas>')
  
  var c = document.getElementById("CapCode"),
      ctx=c.getContext("2d"),
      x = c.width / 2,
      img = new Image();

  img.src = "https://pixelsharing.files.wordpress.com/2010/11/salvage-tileable-and-seamless-pattern.jpg";
  img.onload = function () {
      var pattern = ctx.createPattern(img, "repeat");
      ctx.fillStyle = pattern;
      ctx.fillRect(0, 0, c.width, c.height);
      ctx.font="46px Roboto Slab";
      ctx.fillStyle = '#ccc';
      ctx.textAlign = 'center';
      ctx.setTransform (1, -0.12, 0, 1, 0, 15);
      ctx.fillText(cd,x,55);
  };
  
  
}

// Validate Captcha
function ValidateCaptcha() {
  var string1 = removeSpaces(cd);
  var string2 = removeSpaces($('#UserCaptchaCode').val());
  if (string1 == string2) {
    return true;
  }
  else {
    return false;
  }
}

// Remove Spaces
function removeSpaces(string) {
  return string.split(' ').join('');
}

// Check Captcha
function CheckCaptcha() {
  var result = ValidateCaptcha();
  if( $("#UserCaptchaCode").val() == "" || $("#UserCaptchaCode").val() == null || $("#UserCaptchaCode").val() == "undefined") {
    $('#WrongCaptchaError').text('Please enter code given below in a picture.').show();
    $('#UserCaptchaCode').focus();
  } else {
    if(result == false) { 
      $('#WrongCaptchaError').text('Invalid Captcha! Please try again.').show();
      CreateCaptcha();
      $('#UserCaptchaCode').focus().select();
    }
    else { 
      $('#UserCaptchaCode').val('').attr('place-holder','Enter Captcha - Case Sensitive');
      CreateCaptcha();
      $('#WrongCaptchaError').fadeOut(100);
     $(".AUTOBOTTON").trigger('click');
    }
  }  
}
</script>
