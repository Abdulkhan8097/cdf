<style>
    .bottom-background{
        display: none;
    }
</style>
<main class="main">
            <section class="promo-primary">
               <picture>
                  <source srcset="Content/assets/img/volunteer.jpg" media="(min-width: 992px)" />
                  <img class="img--bg" src="Content/assets/img/volunteer.jpg" alt="img" />
               </picture>
               <div class="promo-primary__description"> <span>Compassion</span></div>
               <div class="container">
                  <div class="row">
                     <div class="col-auto">
                        <div class="align-container">
                           <div class="align-container__item">
                              <span class="promo-primary__pre-title">Cosmo</span>
                              <h1 class="promo-primary__title"><span>Become</span> <span>a Volunteer</span></h1>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- section start-->
            <section class="section">
               <div class="container">
                  <div class="row align-items-center">
                     <!-- <div class="col-lg-6 col-xl-5">
                        <div class="img-box">
                            <img class="img--layout" src="/Content/assets/img/about_layout-reverse.png" alt="img" />
                            <div class="img-box__img"><img class="img--bg" src="/Content/assets/img/volunteer-pg.png" alt="img" /></div>
                        </div>
                        </div> -->
                     <div class="" >
                        <div class="heading heading--primary">
                           <span class="heading__pre-title">Best Volunteer</span>
                           <h2 class="heading__title"><span>Cosmo</span> <span> is calling you. Let’s help it together!</span></h2>
                        </div>
                        <p>Volunteers are invited to work in CDF offices on a short and long-term basis, to participate in major CDF events. At CDF, we go beyond a typical volunteering program and help you learn, explore, experience, and have great fun.</p>
                        <strong>Interns</strong>
                        <p>Students can learn how CDF operates and gain valuable work experience by interning at our office for a few weeks, weekly basis or even several months. Contact Admin@cdf.world for details of current opportunities.</p>
                     </div>
                  </div>
               </div>
            </section>
            <!-- section end-->
            <!-- section start-->
            <section class="section forms-section no-padding-top no-padding-bottom"  id="showmsg">
               <div class="container">
                  <div class="row margin-bottom">
                     <div class="col-lg-6">
                        <div class="heading heading--primary" >
                           <span class="heading__pre-title">Fill Form and Became Volonteer</span>
                           <h2 class="heading__title"><span>Complete</span> <span>the Form</span></h2>
                        </div>
                     </div>
                     <div class="col-lg-6">
                     </div>
                  </div>
                 
                  <div class="row">
                     <div class="col-12">
                        <!-- user form start-->
                        <form class="form user-form" method="post" action="<?php echo base_url('savevolunteer');?>" enctype="multipart/form-data" >
                           <div class="row">
                           
                              <div class="col-lg-6">
                              <?php echo view('admin/_topmessage'); ?>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <input class="form__field" type="text" name="volunteer_name" placeholder="Full Name" required />
                                    </div>
                                    <div class="col-md-6">
                                       <input class="form__field" type="email" name="volunteer_email" placeholder="E-mail" required/>
                                    </div>
                                    <div class="col-md-6">
                                       <input class="form__field" type="tel" name="mob_number" maxlength="10"  minlength="10" onkeypress="numericFilter(this)" placeholder="Phone Number" required/>
                                    </div>
                                    <div class="col-md-6">
                                       <select class="form__field" name="volunteer_gender" required >
                                          <option value="">None</option>
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                          <option value="Other">Other</option>
                                       </select>
                                    </div>
                                    <div class="col-12">
                                       <input class="form__field" type="text" name="volunteer_address" placeholder="Adress" required />
                                    </div>
                                    <div class="col-md-6">
                                       <input class="form__field" type="text" name="v_city" placeholder="City" required/>
                                    </div>
                                    <div class="col-md-6">
                                       <input class="form__field" type="text" name="v_pincode" placeholder="Pin" required/>
                                    </div>
                                    <textarea class="form__field form__message" name="volunteer_message" placeholder="About Occupation"></textarea>
                                    <div class="col-md-12">
                                       <input class="form-control-file" type="file" accept=".pdf,.docx" name="image" required />
                                       <label class=""></label>
                                    </div>
                                 </div>
                              </div>
                              <!-- <div class="col-lg-6">
                                 <textarea class="form__field form__message" name="message" placeholder="About Occupation"></textarea>
                                 
                                 </div> -->
                              <div class="col-lg-6 col-xl-5 volunteerimage">
                                 <div class="img-box">
                                    <img class="img--layout" src="Content/assets/img/about_layout-reverse.png" alt="img">
                                    <div class="img-box__img"><img class="img--bg" src="Content/assets/img/volunteer-pg.png" alt="img"></div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12">
                                 <button class="form__submit" type="submit">Submit	</button>
                              </div>
                           </div>
                        </form>
                        <!-- user form end-->
                     </div>
                  </div>
               </div>
               <img class="forms-section__bg" src="Content/assets/img/bottom-bg.png" alt="img" />
            </section>
            <!-- subscribe start-->
            <script>
   function numericFilter(txb) {
       txb.value = txb.value.replace(/[^\0-9]/ig, "");
   }
</script> 
   
   