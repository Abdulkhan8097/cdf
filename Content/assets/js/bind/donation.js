$(document).ready(function () {

    $(document).on("click", "[name=value-select]", function () {
        $(".donate-amount").val(this.value);
    });

    $(document).on("click", ".custom-amount-blk label", function () {

        $(this).addClass("d-none");
        $(this).parents().find("div.d-flex").removeClass("hide");
        $(".multi-amount-radio label").removeClass("btn-primary");
       

    });


    $(document).on("change", "[name=amount]", function () {

        $("[name=amount]").parents("label").addClass("btn-clean").removeClass("btn-primary");
        $(this).parents("label").toggleClass("btn-primary btn-clean");
        if (this.value != "custom"){
            $(".custom-amount-blk label").removeClass("d-none");
            $(".custom-amount-blk label").parents().find("div.d-flex").addClass("hide");
            $(".multi-amount-radio input[type='radio']").prop("checked", false);
        }
        
    })


    $(document).on("change", ".donate-amount", function () {
        if (this.value < 500) {
            alert("Minimum donation amount must be ₹ 500")
            this.value = 500;

            $(this).change();
        }
    })

    $(document).on("click", ".form-group.haslabel span", function () {
        $(this.parentNode).find("input,textarea").focus();
    })

    $(document).on("keyup, change", ".form-group input, .form-group textarea", function () {
        if (this.value != "") {
            $(this).attr("data-val", "0");
        }
        else {
            $(this).attr("data-val", "");
        }
    })   

    $(document).on("click", ".donate-btn", function () {
        initDonationPopup();
    })
    
    
})

var donate;

// function initDonationPopup() {
//     $.ajax({
//         url: '/access/GetDonation',
//         type: "POST",
//         contentType: false,
//         processData: false,
//         //data: fileData,
//         beforeSend: function () {

//         },
//         success: function (result) {
//             donate = result;
//             $.confirm({
//                 title: 'Choose a donation amount',
//                 content: function () {

//                     setTimeout(function () {
//                         $("[name=caseid]").val($("[name=casid]").val());
//                         initvalidator();
//                     }, 200);
                    

//                     return donate;
//                 },
//                 ///boxWidth: '300px',
//                 useBootstrap: true,
//                 buttons: {
//                     cancel: {
//                         text: 'Cancel',
//                         btnClass: 'btn-clean',
//                         action: function () {
//                             //$.alert('Canceled!');
//                         }

//                     },
//                     formSubmit: {
//                         text: 'Donate',
//                         btnClass: 'button--primary',
//                         action: function () {
//                             $("#donationform").submit();
//                             return false;
//                         }
//                     }
                    
//                 }
//             });

//         },
//         error: function (err) {
//             alert(err);
//         }
//     });
// }



function initvalidator() {
    var form = $('#donationform');
    var error = $('.form-control', form);

    var form2 = $('#forgot');
    var error2 = $('.form-control', form2);

    $.validator.addMethod(
        "regex",
        function (value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "This is invalid"
    );

    //$.validator.addMethod("pwcheck", function (value) {
    //    return /^(?=[^\d_].*?\d)\w(\w|[!@#$%]){7,20}$/.test(value) // consists of only these
    //        && /[a-z]/.test(value) // has a lowercase letter
    //        && /\d/.test(value) // has a digit
    //}, "Min length must be 8, use only characters, numbers and any !@#$%");

    //$.validator.addMethod("notEqualTo", function (value, element, param) {
    //    return this.optional(element) || value != $(param).val();
    //}, "This has to be different...");

    //jQuery.validator.addMethod("notEqualstatic", function (value, element, param) {
    //    return this.optional(element) || value != param;
    //}, "Please specify a different (non-default) value");


    var $validator = $('#donationform').validate({
        //doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
        //errorElement: 'span', //default input error message container
        //errorClass: 'error-block1', // default input error message class
        //focusInvalid: false, // do not focus the last invalid input
        rules: {

            billing_name: {
                required: true
            },
            billing_tel: {
                required: true,
                regex: /^[0-9]{10,10}$/
            },
            billing_email: {
                required: true,
                regex: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/
            },
            billing_country: {
                required: false
            },
            billing_state: {
                required: false
            },
            billing_city: {
                required: false
            },
            billing_zip: {
                required: false
            },
            Citizenship: {
                required: true
            },
            billing_address: {
                required: true
            },
            pan: {
                required: true,
                regex: /([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}/,
                minlength: 10,
                maxlength: 10
            },
            dob: {
                required: false
            },
            amount: {
                required: true,
                //min:500
            }

        },

        messages: {

            billing_name: {
                required: "This is required"
            },
            billing_tel: {
                required: "This is required",
                regex: "This is invalid"
            },
            billing_email: {
                required: "This is required",
                regex: "This is invalid"
            },
            billing_country: {
                required: "This is required"
            },
            billing_city: {
                required: "This is required"
            },
            Source: {
                required: "This is required"
            },
            billing_address: {
                required: "This is required"
            },
            for: {
                required: "This is required"
            },
            amount: {
                required: "This is required"
            }

        },

        errorPlacement: function (error, element) {
            //if (element.attr("name") == "typeoption") { // for uniform radio buttons, insert the after the given container
            //    error.insertAfter("#show-error");
            //}
            ////else if (element.attr("name") == "payment[]") { // for uniform checkboxes, insert the after the given container
            ////    error.insertAfter("#form_payment_error");
            ////}
            //else {
            //    error.insertAfter(element); // for other inputs, just perform default behavior
            //}
            error.insertAfter(element);
        },
        //success: function (label) {
        //    if (label.attr("for") == "typeoption") { // for checkboxes and radio buttons, no need to show OK icon
        //        label.remove(); // remove error label here
        //    }
        //},
        submitHandler: function (form) {

            var $valid = $('#donationform').valid();
            if (!$valid) {
                $validator.focusInvalid();

                return false;
            }
            else {
                //var obj = {};
                $("#pay").attr("disabled", "disabled");
                $.dialog({
                    title: false,
                    content: '<h3>Sending To Payment Page...<i class="fas fa-circle-notch fa-w-16 fa-spin fa-lg"></i></h3>',
                    closeIconClass: 'invisible-close',
                });
                //gtag_report_conversion();
                //obj.mail = $("input[name=email]").val();
                //obj.pas = $("input[name=password]").val();
                //obj.me = "";
                //if ($('input[name=remember]').is(":checked")) {
                //    obj.me = "1";
                //}

                //return checklog(obj.mail, obj.pas, obj.me);
                //alert("done")
                form.submit();
            }
            //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
        }
    });

}