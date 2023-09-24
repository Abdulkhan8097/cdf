$(document).ready(function () {


    $.validator.addMethod(
        "regex",
        function (value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "This is invalid"
    );

    $.validator.addMethod("pwcheck", function (value) {
        return /^(?=[^\d_].*?\d)\w(\w|[!@#$%]){7,20}$/.test(value) // consists of only these
            && /[a-z]/.test(value) // has a lowercase letter
            && /\d/.test(value) // has a digit
    }, "Min length must be 8, use only characters, numbers and any !@#$%");

    $.validator.addMethod("notEqualTo", function (value, element, param) {
        return this.optional(element) || value != $(param).val();
    }, "This has to be different...");

    $.validator.addMethod("notEqualstatic", function (value, element, param) {
        return this.optional(element) || value != param;
    }, "Please specify a different (non-default) value");


    var form = $('form');
    var error = $('.form-control', form);


    var $validator = $('form').validate({
        rules: {
            Name: {
                required: true
            },
            Email: {
                required: true,
                regex: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/
            },
            Number: {
                required: true,
                regex: /^[0-9]{8,12}$/
            },
            Gender: {
                required: true
            },
            Address: {
                required: true
            },
            City: {
                required: true
            },
            Pin: {
                required: true
            },
            CV: {
                required: false,
                regex: /\.(docx|doc|pdf|jpg)$/
            }

        },
        messages: {
            Name: {
                required: "This is required"
            },

            Email: {
                required: "This is required",
                regex: "This is invalid"
            },
            Number: {
                required: "This is required",
                regex: "This is invalid"
            },
            Gender: {
                required: "This is required"
            },
            Address: {
                required: "This is required"
            },
            City: {
                required: "This is required"
            },
            Pin: {
                required: "This is required"
            },
            CV: {

                regex: "This is invalid"
            }
        },
        errorPlacement: function (error, element) {
            debugger;
            //error.insertAfter(element);

        },
        submitHandler: function (form) {
            debugger;
            var $valid = $('form').valid();
            if (!$valid) {
                $validator.focusInvalid();
                return false;
            }
            else {
                grecaptcha.reset();
                grecaptcha.execute();
                //var token = grecaptcha.getResponse();
                //var check = checkRecaptcha(token);
                //if (check == true) {
                //    // 2) finally sending form data
                //    //AddLeads()
                //} else {
                //    // 1) Before sending we must validate captcha
                //    //grecaptcha.reset(widgetId);
                //    grecaptcha.execute();
                //}        
            }

        }
    });

});




function checkRecaptcha(token) {
    $.ajax({
        type: "POST",
        url: "/CheckRecaptcha",
        data: '{resp: "' + token + '"}',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
            debugger;
            if (response == true) {
                AddLeads()
                return true;
            }
            else {
                return false;
            }
        }
    });
}


function onSubmit(token) {
    //alert('thanks ' + document.getElementById('field').value);
    AddLeads();
}


function AddLeads() {
    // Checking whether FormData is available in browser  
    if (window.FormData !== undefined) {
        debugger;
        var fileUpload = $("input[type=file]").get(0);
        var files = fileUpload.files;

        // Create FormData object  
        var fileData = new FormData();

        // Looping over all files and add it to FormData object  
        for (var i = 0; i < files.length; i++) {
            fileData.append(files[i].name, files[i]);
        }

        var inp = $("form input").length + $("form select").length;
        var other_data = $('form').serializeArray();
        $.each(other_data, function (key, input) {
            fileData.append(input.name, input.value);
        });
        //if ($("button[type=submit]").val() > 0) {
        //    fileData.append("Edit", $("button[type=submit]").val());
        //}
        //else {
        //    fileData.append("Edit", "");
        //}
        //for (var j = 0; j < inp; j++){
        //    debugger;
        //    fileData.append($(".form-control:nth-child(" + j + ")").attr("name"), $(".form-control:nth-child(" + j + ")").val());
        //}

        $.ajax({
            url: '/access/AddVolunteer',
            type: "POST",
            contentType: false, // Not to set any content header  
            processData: false, // Not to process data  
            data: fileData,
            beforeSend: function () {
                $.dialog({
                    title: false,
                    content: '<p style="font-size:23px;text-align:center;">Saving Data...<i class="fas fa-circle-notch fa-w-16 fa-spin fa-lg"></i></p>',
                    closeIconClass: 'invisible-close',
                });
                $("button[type=submit]").attr("disabled");
                $("button[type=submit]").html("<span><i class='fas fa-circle-notch fa-w-16 fa-spin fa-lg' ></i><span>Saving</span></span>");
            },
            success: function (result) {
                if (result == true) {
                    $("form").get(0).reset();
                    $.dialog({
                        title: false,
                        content: '<p  style="font-size:18px;text-align:center;">Thankyou for your interest our executive will contact you soon.</p>',
                        closeIconClass: 'invisible-close',
                    });
                    setTimeout(function () {
                        $(".invisible-close").click();
                    }, 5000);
                }
                else if (result == "Not Valid") {
                    $.dialog({
                        title: false,
                        content: '<p  style="font-size:23px;text-align:center;">All fields are required</p>',
                        closeIconClass: 'invisible-close',
                    });
                    setTimeout(function () {
                        $(".invisible-close").click();
                    }, 4000);
                }
                else {
                    alert(result);
                }

                $("button[type=submit]").html("Submit");

            },
            error: function (err) {
                alert(err.statusText);
            }
        });
    } else {
        alert("FormData is not supported.");
        setTimeout(function () {
            $(".invisible-close").click();
        }, 2000);
    }
}



function numkey(n) { var t = n.which ? n.which : event.keyCode; return t > 47 && t < 58 ? !0 : !1 }