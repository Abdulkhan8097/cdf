<?php echo view('website/header');  ?> 
<?php echo $contents ?>
<?php echo view('website/footer'); ?>
<script src="Content/assets/js/jquery-2.2.4.min.js"></script>
    <script src="Content/assets/js/jquery-ui.js"></script>
    <script src="Content/assets/js/jquery.validate.min.js"></script>
    <script src="Content/assets/js/jquery-confirm.js"></script>
    <script src="Content/assets/js/libs.min.js"></script>
    <!-- scripts-->

    <script src="Content/assets/js/custom.js"></script>
    <script src="Content/assets/js/common.min.js"></script>
    <script src="Content/assets/js/bind/donation.js"></script>
    
<script src="Content/assets/js/bind/index.js"></script>
<style>
    .modal-content{
        background-color: transparent;
    }

        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; display: none; }
        }
        
        #flashMessage1 {
            animation: fadeOut 3s ease-in-out forwards; /* 3s duration, ease-in-out timing function */
        }
  
</style>
  <!-- Donation Modal -->
  <form  method="post" id="myForm" action="<?php echo base_url('checkout'); ?>" novalidate="novalidate" >
  <div class="modal" tabindex="-1" role="dialog" id="donationModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
           
             
                    <div class="modal-body">
                    <div class="jconfirm jconfirm-light jconfirm-open"><div class="jconfirm-bg" style="transition-duration: 0.4s; transition-timing-function: cubic-bezier(0.36, 0.55, 0.19, 1);"></div><div class="jconfirm-scrollpane"><div class="jconfirm-row"><div class="jconfirm-cell"><div class="jconfirm-holder" style="padding-top: 40px; padding-bottom: 40px;"><div class="jc-bs3-container container"><div class="jc-bs3-row row justify-content-md-center justify-content-sm-center justify-content-xs-center justify-content-lg-center"><div class="jconfirm-box-container jconfirm-animated col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 jconfirm-no-transition" style="transform: translate(0px, 0px); transition-duration: 0.4s; transition-timing-function: cubic-bezier(0.36, 0.55, 0.19, 1);"><div class="jconfirm-box jconfirm-hilight-shake jconfirm-type-default jconfirm-type-animated" role="dialog" aria-labelledby="jconfirm-box38962" tabindex="-1" style="transition-duration: 0.4s; transition-timing-function: cubic-bezier(0.36, 0.55, 0.19, 1); transition-property: all, margin;"><div class="jconfirm-closeIcon" style="display: none;">×</div><div class="jconfirm-title-c"><span class="jconfirm-icon-c"></span><span class="jconfirm-title">Choose a donation amount</span></div><div class="jconfirm-content-pane" style="transition-duration: 0.4s; transition-timing-function: cubic-bezier(0.36, 0.55, 0.19, 1); height: 521px; max-height: 504px;"><div class="jconfirm-content" id="jconfirm-box38962"><div>
                        
    <div class="donation-form-body">
        <input type="hidden"  id="getref" name="ref_key"> 
        <input type="hidden"   name="emergencyCase"  id="emergencyCase"> 
        <div class="row">
            <div class="col-12">
                <p class="text-info"><small><i>Most Donors donate approx ₹2,000.</i></small></p>
            </div>
            <div class="col-12 form-group">
                <div class="row">
                    <div class="col-12 multi-amount-radio">
                        <label class="btn btn-sm btn-primary shadow-sm">
                    
                            <input type="radio" class="d-none" name="amount" value="2000" role="button"  onClick="addcost(2000);" checked="checked">
                            ₹ 2,000
                        </label>
                        <label class="btn btn-sm btn-clean shadow-sm">
                            <input type="radio" class="d-none" name="amount" value="5000" onClick="addcost(5000);"  >
                            ₹ 5,000
                        </label>
                        <label class="btn btn-sm btn-clean shadow-sm">
                            <input type="radio" class="d-none" name="amount" value="10000" onClick="addcost(10000);">
                            ₹ 10,000
                        </label>
                    </div>
                    <div class="col-8">
                  
                        <div class="custom-amount-blk">
                            <label class="btn btn-clean shadow-sm">Custom Amount
                                <!-- <input type="radio" value="custom" name="amount" class="d-none"> -->
                            </label>
                            <div class="d-flex hide">
                                <span>₹</span>
                                <input type="number" min="1" name="custom_amount" id="custom_amount" class="form-control" placeholder="Custom Amount" >
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 form-group haslabel">
            <span class="paymentalert alr"  style="color: red;"></span>
            </div>
            <div class="col-12 form-group haslabel" id="flashMessage1" style="display: none;">
            <div id="flashMessage" style="display: none;"></div>
            </div>
            <div class="col-12 form-group haslabel">
          

                <input class="form__field" type="text" name="name"  data-val required>
                <span>Name</span>
            </div>
            <div class="col-12 form-group haslabel">
                <input class="form__field" type="text" name="phone"  data-val required>
                <span>Mobile</span>
            </div>
            <div class="col-12 form-group haslabel">
                <input class="form__field" type="email" name="email"  data-val required>
                <span>Email</span>
            </div>
            <div class="col-12 form-group haslabel">
                <input class="form__field" type="text" name="pan_no"  data-val required>
                <span>Pan No.</span>
            </div>
            <div class="col-12 form-group haslabel">
                <input class="form__field" type="text" name="address"  data-val required>
                <span>Address</span>
            </div>
            <div class="col-12 text-center">
                <img src="Content/assets/img/icon/payment-icons.png" width="200">
            </div>
        </div>
    </div>
</div></div></div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <!-- <button type="submit" class="btn btn-primary">Donate</button> -->
                        <div class="jconfirm-buttons"><button type="button" class="btn btn-clean" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn button--primary" id="donation">Donate</button></div><div class="jconfirm-clear"></div></div></div></div></div></div></div></div></div></div>
                    </div>
               
            </div>
        </div>
    </div>
    </form>
    <script>
         var donateButton = document.querySelector('.lc');
    var emergencyCase = document.getElementById('emergencyCase');
    // Add a click event listener to the button
    donateButton.addEventListener('click', function() {
        // Get the value from the data-id attribute of the button
        var id = donateButton.getAttribute('data-id');
        
        // Set the value of the hidden input field
        emergencyCase.value = id;
        console.log("Hidden Input Value:", emergencyCase.value);
        // Now, you can submit the modal or perform any other necessary actions
        // For example, you can open the modal here
    });
        document.getElementById('myForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent the form from submitting

            // Validation logic for each field
            const name = document.querySelector('input[name="name"]').value;
            const phone = document.querySelector('input[name="phone"]').value;
            const email = document.querySelector('input[name="email"]').value;
            const pan_no = document.querySelector('input[name="pan_no"]').value;
            const address = document.querySelector('input[name="address"]').value;

            if (!name || !phone || !email || !pan_no || !address) {
                displayFlashMessage('All fields are required.');
                return;
            }

            // Additional validation logic (e.g., email format, phone format, etc.)
            // You can add more validation checks here.

            // If all validations pass, you can submit the form
            displayFlashMessage('Form submitted successfully.', true);
            // Uncomment the line below to submit the form:
            document.getElementById('myForm').submit();
        });

        function displayFlashMessage(message, isSuccess = false) {
            const flashMessage = document.getElementById('flashMessage');
            const flashMessage1 = document.getElementById('flashMessage1');
            flashMessage1.style.display = 'block';
            flashMessage.textContent = message;
            flashMessage.style.display = 'block';
            if (isSuccess) {
                flashMessage.style.color = 'green';
            } else {
                flashMessage.style.color = 'red';
            }
            setTimeout(() => {
                flashMessage.style.display = 'none';
                flashMessage1.style.display = 'none';
            }, 3000); // Display message for 3 seconds
        }
    </script>
    <script type="text/javascript">
  $(document).ready(function() {
    $("#custom_amount").on("keyup keydown", function() {
      var amount = parseFloat($(this).val());

      if (amount) {
        if (amount < 500) {
          $(".paymentalert").html("Minimum donation amount must be ₹ 500");
          $("#donation").prop("disabled", true);
        } else {
          $(".paymentalert").html("");
          $("#donation").prop("disabled", false);
        }
      }
    });
  });
</script>
    <script>
         function addcost(cost) {
      
            var amount = $("#custom_amount").val(cost);
            if (amount) {
        if (amount < 500 ) {
            $(".paymentalert").html("Transactions below Rs 500 is not financially viable for us to process.");
            // donation
             $("#donation").attr("disabled", true);
            
        } else {
            $(".paymentalert").html("");
            $("#donation").attr("disabled", false);
        }
    }
         }
        $(document).ready(function () {
            // Show the donation modal when the button is clicked
            $(".donate-btn").click(function () {
                $("#donationModal").modal("show");
            });

            // Handle form submission using Ajax
            $("#donationForm").submit(function (event) {
                event.preventDefault();

                $.ajax({
                    url: $(this).attr("action"),
                    type: "POST",
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response.success) {
                            // Donation was successful
                            alert(response.message);
                            $("#donationModal").modal("hide");
                        } else {
                            // Donation failed, handle errors
                            alert("Donation failed: " + response.message);
                        }
                    },
                    error: function (err) {
                        alert("An error occurred: " + err.statusText);
                    }
                });
            });
        });
    </script>
    <script>
 const queryString = window.location.search;
const Urlparams =  new URLSearchParams(queryString);
const ids = Urlparams.get('refid');
if(ids){
        
      var setdata=sessionStorage.setItem('refid',ids);  

  var  getdata=sessionStorage.getItem('refid');
  document.getElementById('getref').value = getdata;


}else{
 // document.getElementById('getref').innerHTML = localStorage.getItem('refid');
 document.getElementById('getref').value = sessionStorage.getItem('refid');

}


</script>
</body>
</html>