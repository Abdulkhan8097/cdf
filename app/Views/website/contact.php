
         <main class="main">
            <section class="promo-primary">
               <picture>
                  <source srcset="Content/assets/img/contacts.jpg" media="(min-width: 992px)" />
                  <img class="img--bg" src="Content/assets/img/contacts.jpg" alt="img" />
               </picture>
               <div class="promo-primary__description"> <span>Compassion</span></div>
               <div class="container">
                  <div class="row">
                     <div class="col-auto">
                        <div class="align-container">
                           <div class="align-container__item">
                              <span class="promo-primary__pre-title">Cosmo</span>
                              <h1 class="promo-primary__title"><span>Contacts</span></h1>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- section start-->
            <section class="section contacts">
               <div class="container">
                  <div class="row offset-margin">
                     <div class="col-sm-6 col-lg-4">
                        <div class="icon-items">
                           <div class="icon-item__img">
                              <img src="Content/assets/img/icon/icon1.jpg" />
                           </div>
                           <div class="icon-item__text">
                              <p>Adress: <br>Flat No - 25, Fifth Floor, Near Shiv Temple, Shastri Nagar, Dombivali West, Thane, Maharashtra, India, 421202 </p>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6 col-lg-4">
                        <div class="icon-items">
                           <div class="icon-item__img">
                              <img src="Content/assets/img/icon/icon2.jpg" />
                           </div>
                           <div class="icon-item__text">
                              <p>Phone: <br><a class="icon-item__link" href="tel:+918591864147">+91 85918 64147</a></p>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6 col-lg-4">
                        <div class="icon-items">
                           <div class="icon-item__img">
                              <img src="Content/assets/img/icon/icon3.jpg" />
                           </div>
                           <div class="icon-item__text">
                              <p>Email: <br><a class="icon-item__link" href="mailto:cosmologicalfoundation@gmail.com">cosmologicalfoundation@gmail.com</a></p>
                           </div>
                        </div>
                     </div>
                     <!-- <div class="col-sm-6 col-lg-3">
                        <div class="icon-item">
                            <div class="icon-item__img">
                                <img src="~/Content/assets/img/icon/icon4.JPG" />
                            </div>
                            <div class="icon-item__text">
                                
                                <ul class="socials">
                                    <li class="socials__item"><a class="socials__link" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li class="socials__item"><a class="socials__link" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li class="socials__item"><a class="socials__link socials__link--active" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li class="socials__item"><a class="socials__link" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                </ul>
                                
                            </div>
                        </div>
                        </div> -->
                  </div>
               </div>
            </section>
            <!-- section end-->
            <!-- contacts start-->
            <section class="section contacts no-padding-top" id="showmsg">
               <div class="contacts-wrapper">
                  <div class="container">
                     <div class="row justify-content-end">
                        <div class="col-xl-6">
                           <form  class="form message-form" method="post" action="<?php echo base_url('saveinqury');?>">
                              <h6 class="form__title">Send Message</h6>
                              <span class="form__text">* The following info is required</span>
                              <?php echo view('admin/_topmessage'); ?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <input class="form__field" type="text" name="name" placeholder="Name *" required/>
                                 </div>
                                 <div class="col-lg-6">
                                    <input class="form__field" type="email" name="email" placeholder="Email *"required />
                                 </div>
                                 <div class="col-lg-6">
                                    <input class="form__field" type="tel" name="number" maxlength="10"  minlength="10" onkeypress="numericFilter(this)" placeholder="Phone *" required />
                                 </div>
                                 <div class="col-12">
                                    <textarea class="form__message form__field" name="message" placeholder="Message" required></textarea>
                                 </div>
                                 <div class="col-12">
                                    <button class="form__submit" type="submit">Send Message</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="contacts-wrapper__map">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15069.728696903914!2d73.07295712071915!3d19.219987953854684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7be220fd9c29d%3A0xc9448465fe769998!2sShastri%20Nagar%2C%20Dombivli%20West%2C%20Dombivli%2C%20Maharashtra%20421202!5e0!3m2!1sen!2sin!4v1622626021477!5m2!1sen!2sin"></iframe>
                  </div>
               </div>
            </section>
            <!-- contacts end-->

            <!-- bottom bg end-->
            <div id='recaptcha' class="g-recaptcha"
               data-sitekey="6Lelj_sbAAAAALtXK64DCZbv1TkkRrDNOKHzAXsI"
               data-callback="onSubmit"
               data-size="invisible"></div>
               <script>
   function numericFilter(txb) {
       txb.value = txb.value.replace(/[^\0-9]/ig, "");
   }
</script> 
