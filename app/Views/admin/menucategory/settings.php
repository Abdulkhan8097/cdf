<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Settings</h4>
                </div>
            </div>

            <!-- <div class="col-sm-6">
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <a class="btn btn-primary waves-effect waves-light" href="<?php echo site_url('newaccount'); ?>">
                                <i class="ion ion-md-add-circle-outline"></i> Add
                            </a>
                        </div>
                    </div>
                </div> -->
        </div>



        <div class="row">
            <div class="col-xl-12">
                <div class="card">

                    <div class="card-body border">

                        <?php echo view('admin/_topmessage'); ?>

                        <div class="row mb-4">
                            <div class="col-lg-12 ">
                                <div id="errMsgs" style="display:none;"
                                    class="alert alert-danger alert-dismissible fade show mb-0 w-50  mt-2" role="alert">
                                </div>
                                <div id="succMsg" style="display:none;"
                                    class="alert alert-success alert-dismissible fade show mb-0 w-50  mt-2"
                                    role="alert"> </div>
                            </div>
                        </div>


                        <div class="row ">
                            <div class="col-xl-12 mr-4 border">
                                <form action="" id="frmpayment">
                                    <div class="row ">
                                        <div class="col-xl-12">

                                            <!-- Row start -->
                                            <div class="row  mb-2 pl-3">
                                                <h4>Payment Detail</h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                <label>Bank Detail</label>
                                                    <textarea type="text" name="BANK_DETAIL" id="BANK_DETAIL"
                                                        class="form-control"><?php if(isset($settings['BANK_DETAIL'])){ echo $settings['BANK_DETAIL']; } ?></textarea>
                                                </div>
                                                <div class="col-lg-6">
                                                <label>Payment Url</label>
                                                    <textarea type="text" name="PAYMENT_URL" id="PAYMENT_URL"
                                                        class="form-control"><?php if(isset($settings['PAYMENT_URL'])){ echo $settings['PAYMENT_URL']; }?></textarea>
                                                </div>
                                            </div>
                                            <div class="row mt-2 mb-2">
                                                <div class="col-lg-12  ">
                                                    <button type="button"
                                                        class="btn btn-primary waves-effect waves-light mr-1"
                                                        onClick="updatesetting('frmpayment');">
                                                        Update
                                                    </button>
                                                    
                                                </div>

                                            </div>

                                            <!-- row end -->
                                        </div>
                                    </div>
                                </form>
                            </div>




                            
                        </div>
                        <hr>

                        <div class="row ">
                            <div class="col-xl-12 mr-4 border">
                                <form action="" id="frmsupport">
                                    <div class="row ">
                                        <div class="col-xl-12">

                                            <!-- Row start -->
                                            <div class="row  mb-2 pl-3">
                                                <h4>Support Details</h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>Support Number</label>
                                                    <input type="text" name="SUPPORT_NUMBER" id="SUPPORT_NUMBER" class="form-control" value="<?php if(isset($settings['SUPPORT_NUMBER'])){ echo $settings['SUPPORT_NUMBER']; }?>">
                                                   
                                                    
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Support Email</label>
                                                    
                                                    <input type="text" name="SUPPORT_EMAIL" id="SUPPORT_EMAIL" class="form-control" value="<?php if(isset($settings['SUPPORT_EMAIL'])){ echo $settings['SUPPORT_EMAIL']; }?>">
                                                    <span id="divsupportnumber"></span>
                                                </div>
                                            </div>
                                            <div class="row mt-2 mb-2">
                                                <div class="col-lg-12  ">
                                                    <button type="button"
                                                        class="btn btn-primary waves-effect waves-light mr-1"
                                                        onClick="updatesetting('frmsupport');">
                                                        Update
                                                    </button>
                                                    
                                                </div>

                                            </div>

                                            <!-- row end -->
                                        </div>
                                    </div>
                                </form>
                            </div>




                            
                        </div>
                        <hr>
                        <div class="row ">
                            <div class="col-xl-12 mr-4 border">
                                <form action="" id="frmsocial">
                                    <div class="row  mb-2 pl-3">
                                        <h4>Social Links</h4>
                                    </div>
                                    <div class="row ">
                                        <div class="col-xl-12">

                                            <!-- Row start -->

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>Facebook Url</label>
                                                    <input type="text" name="FACEBOOK_URL" id="FACEBOOK_URL"
                                                        class="form-control"
                                                        value="<?php if(isset($settings['FACEBOOK_URL'])){ echo $settings['FACEBOOK_URL']; }?>">
                                                    <label>Twitter Url</label>
                                                    <input type="text" name="TWITTER_URL" id="TWITTER_URL"
                                                        class="form-control"
                                                        value="<?php if(isset($settings['TWITTER_URL'])){ echo $settings['TWITTER_URL']; }?>">
                                                    
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Instagram Url</label>
                                                    <input type="text" name="INSTAGRAME_URL" id="INSTAGRAME_URL"
                                                        class="form-control"
                                                        value="<?php if(isset($settings['INSTAGRAME_URL'])){ echo $settings['INSTAGRAME_URL']; }?>">
                                                    <label>Youtube Url</label>
                                                    <input type="text" name="YOUTUBE_URL" id="YOUTUBE_URL"
                                                        class="form-control"
                                                        value="<?php if(isset($settings['YOUTUBE_URL'])){ echo $settings['YOUTUBE_URL']; }?>">

                                                    <span id="divbankdetail"></span>
                                                </div>
                                            </div>
                                            <div class="row mt-2 mb-2">
                                                <div class="col-lg-12  ">
                                                    <button type="button"
                                                        class="btn btn-primary waves-effect waves-light mr-1"
                                                        onClick="updatesetting('frmsocial');">
                                                        Update
                                                    </button>
                                                    
                                                </div>

                                            </div>

                                            <!-- row end -->
                                        </div>
                                    </div>
                                </form>
                            </div>





                        </div>
                        <hr>
                        <div class="row ">
                            <div class="col-xl-5 mr-4 border">
                                <form action="" id="frmrgbcatalog">
                                    <div class="row ">
                                        <div class="col-xl-12">

                                            <!-- Row start -->
                                            <div class="row  mb-2 pl-3">
                                                <h6>RGB Catalog</h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <input type="file" name="rgbcatalog" id="rgbcatalog"
                                                        class="filestyle">
                                                    <span
                                                        id="divrgbcatalog"><?php if(isset($settings['RGB_CATALOG'])){ echo $settings['RGB_CATALOG']; }?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-2 mb-2">
                                                <div class="col-lg-12  ">
                                                    <button type="button"
                                                        class="btn btn-primary waves-effect waves-light mr-1"
                                                        onClick="uploadfile('rgbcatalog','RGB_CATALOG');">
                                                        Update
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-danger waves-effect waves-light mr-1"
                                                        onClick="removecatalog('rgbcatalog','RGB_CATALOG');">
                                                        Remove
                                                    </button>
                                                </div>

                                            </div>

                                            <!-- row end -->
                                        </div>
                                    </div>
                                </form>
                            </div>




                            <div class="col-xl-5 border mr-4">
                                <form action="" id="frmcmykcatalog">
                                    <div class="row  mt-2">
                                        <div class="col-xl-12">

                                            <!-- Row start -->
                                            <div class="row  mb-2 pl-3">
                                                <h6>CMYK Catalog</h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <input type="file" name="cmykcatalog" id="cmykcatalog"
                                                        class="filestyle">
                                                    <span
                                                        id="divcmykcatalog"><?php if(isset($settings['CMYK_CATALOG'])){ echo $settings['CMYK_CATALOG']; }?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-2 mb-2">
                                                <div class="col-lg-12  ">
                                                    <button type="button"
                                                        class="btn btn-primary waves-effect waves-light mr-1"
                                                        onClick="uploadfile('cmykcatalog','CMYK_CATALOG');">
                                                        Update
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-danger waves-effect waves-light mr-1"
                                                        onClick="removecatalog('cmykcatalog','CMYK_CATALOG');">
                                                        Remove
                                                    </button>
                                                </div>

                                            </div>

                                            <!-- row end -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <hr>
                        <div class="row">
                            <div class="col-xl-5 mr-4 border">
                                <form action="" id="frmrgbprice">
                                    <div class="row  mt-2">
                                        <div class="col-xl-12">

                                            <!-- Row start -->
                                            <div class="row  mb-2 pl-3">
                                                <h6>RGB Pricelist</h6>
                                            </div>
                                            <div class="row ">

                                                <div class="col-lg-12">
                                                    <input type="file" name="rgbprice" id="rgbprice" class="filestyle">
                                                    <span
                                                        id="divrgbprice"><?php if(isset($settings['RGB_PRICELIST'])){ echo $settings['RGB_PRICELIST']; }?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-2 mb-2">
                                                <div class="col-lg-12  ">
                                                    <button type="button"
                                                        class="btn btn-primary waves-effect waves-light mr-1"
                                                        onClick="uploadfile('rgbprice','RGB_PRICELIST');">
                                                        Update
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-danger waves-effect waves-light mr-1"
                                                        onClick="removecatalog('rgbprice','RGB_PRICELIST');">
                                                        Remove
                                                    </button>
                                                </div>

                                            </div>

                                            <!-- row end -->
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <div class="col-xl-5 mr-4 border">
                                <form action="" id="frmcmykpricelist">
                                    <div class="row  mt-2">
                                        <div class="col-xl-12">

                                            <!-- Row start -->
                                            <div class="row  mb-2 pl-3">
                                                <h6>CMYK Pricelist</h6>
                                            </div>
                                            <div class="row ">

                                                <div class="col-lg-12">
                                                    <input type="file" name="cmykpricelist" id="cmykpricelist" class="filestyle">
                                                    <span
                                                        id="divcmykpricelist"><?php if(isset($settings['CMYK_PRICELIST'])){ echo $settings['CMYK_PRICELIST']; }?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-2 mb-2">
                                                <div class="col-lg-12  ">
                                                    <button type="button"
                                                        class="btn btn-primary waves-effect waves-light mr-1"
                                                        onClick="uploadfile('cmykpricelist','CMYK_PRICELIST');">
                                                        Update
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-danger waves-effect waves-light mr-1"
                                                        onClick="removecatalog('cmykpricelist','CMYK_PRICELIST');">
                                                        Remove
                                                    </button>
                                                </div>

                                            </div>

                                            <!-- row end -->
                                        </div>
                                    </div>
                                </form>
                            </div>




                            
                        </div>
                        <hr>
                        <div class="row ">
                            <div class="col-xl-5 mr-4 border">
                                <form action="" id="frmfrontlogo">
                                    <div class="row  mt-2">
                                        <div class="col-xl-12">

                                            <!-- Row start -->
                                            <div class="row  mb-2 pl-3">
                                                <h6>Front Logo</h6> &nbsp; <span>(for best view 100X80 size)</span>
                                            </div>
                                            <div class="row ">

                                                <div class="col-lg-12">
                                                    <input type="file" name="frontlogo" id="frontlogo"  class="filestyle" accept="image/jpg,image/jpeg,image/png,">
                                                    
                                                    <span  id="divfrontlogo"><?php if(isset($settings['FRONT_LOGO'])){ echo $settings['FRONT_LOGO']; }?></span>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-lg-12 mt-2 mb-2 ">
                                                    <button type="button"
                                                        class="btn btn-primary waves-effect waves-light mr-1"
                                                        onClick="uploadfile('frontlogo','FRONT_LOGO');">
                                                        Update
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-danger waves-effect waves-light mr-1"
                                                        onClick="removecatalog('frontlogo','FRONT_LOGO');">
                                                        Remove
                                                    </button>
                                                </div>

                                            </div>

                                            <!-- row end -->
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-xl-5 mr-4 border">
                                <form action="">
                                    <div class="row  mt-2">
                                        <div class="col-xl-12">

                                            <!-- Row start -->
                                            <div class="row  mb-2 pl-3">
                                                <h6>Fuji Logo</h6>&nbsp; <span>(for best view 100X80 size)</span>
                                            </div>
                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <input type="file" name="fujilogo" id="fujilogo" class="filestyle" accept="image/jpg,image/jpeg,image/png,">
                                                    <span id="divfujilogo"><?php if(isset($settings['FUJI_LOGO'])){ echo $settings['FUJI_LOGO']; }?></span>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-lg-12 mt-2 mb-2 ">
                                                    <button type="button"
                                                        class="btn btn-primary waves-effect waves-light mr-1"
                                                        onClick="uploadfile('fujilogo','FUJI_LOGO');">
                                                        Update
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-danger waves-effect waves-light mr-1"
                                                        onClick="removecatalog('fujilogo','FUJI_LOGO');">
                                                        Remove
                                                    </button>
                                                </div>

                                            </div>

                                            <!-- row end -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row ">
                            <div class="col-xl-5 mr-4 border">
                                <form action="" id="frmfrontbackground">
                                    <div class="row  mt-2">
                                        <div class="col-xl-12">

                                           
                                            <div class="row  mb-2 pl-3">
                                                <h6>Front Background Image</h6> &nbsp; <span>(for best view 500X500 size)</span>
                                            </div>
                                            <div class="row ">

                                                <div class="col-lg-12">
                                                    <input type="file" name="frontbackground" id="frontbackground"
                                                        class="filestyle" accept="image/jpg,image/jpeg,image/png,">
                                                    <span
                                                        id="divfrontbackground"><?php if(isset($settings['FRONT_BACKGROUND_IMAGE'])){ echo $settings['FRONT_BACKGROUND_IMAGE']; }?></span>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-lg-12 mt-2 mb-2 ">
                                                    <button type="button"
                                                        class="btn btn-primary waves-effect waves-light mr-1"
                                                        onClick="uploadfile('frontbackground','FRONT_BACKGROUND_IMAGE');">
                                                        Update
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-danger waves-effect waves-light mr-1"
                                                        onClick="removecatalog('frontbackground','FRONT_BACKGROUND_IMAGE');">
                                                        Remove
                                                    </button>
                                                </div>

                                            </div>

                                           
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <div class="col-xl-5 mr-4 border">
                                <form action="" id="frmsampleexcel">
                                    <div class="row  mt-2">
                                        <div class="col-xl-12">

                                           
                                            <div class="row  mb-2 pl-3">
                                                <h6>Sample Excel file</h6> </span>
                                            </div>
                                            <div class="row ">

                                                <div class="col-lg-12">
                                                    <input type="file" name="sampleexcel" id="sampleexcel"
                                                        class="filestyle" accept="application/xls,xls,xlsx">
                                                    <span
                                                        id="divsampleexcel"><?php if(isset($settings['SAMPLE_EXCEL'])){ echo $settings['SAMPLE_EXCEL']; }?></span>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-lg-12 mt-2 mb-2 ">
                                                    <button type="button"
                                                        class="btn btn-primary waves-effect waves-light mr-1"
                                                        onClick="uploadfile('sampleexcel','SAMPLE_EXCEL');">
                                                        Update
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-danger waves-effect waves-light mr-1"
                                                        onClick="removecatalog('sampleexcel','SAMPLE_EXCEL');">
                                                        Remove
                                                    </button>
                                                </div>

                                            </div>

                                           
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>




                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->

</div>
<!-- End Page-content -->
<script>
function uploadfile(filesid, settingname) {
    var inputField = $('#' + filesid);
    var fileList = inputField.prop("files");

    //console.log(fileList);
    $('#succMsg').css('display', 'none');
    $('#errMsgs').css('display', 'none');

    if (fileList.length > 0) {
        var form_data = new FormData();
        form_data.append('filename', fileList[0], fileList[0].name);
        form_data.append('settingname', settingname);

        var request = $.ajax({
            url: "<?php echo site_url('updatesetting'); ?>",
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            data: form_data,
            type: 'POST',
            
            success: function(res) {
                 // console.log(res);
                responsedata = JSON.parse(res);
                // console.log(responsedata);
                if (responsedata.status == 201) {
                    var uploadedfile = responsedata.data.filename;
                    $('#div' + filesid).html(uploadedfile);
                    $('#succMsg').css('display', 'block');
                    $('#succMsg').html(responsedata.message);
                    $('#errMsgs').css('display', 'none');
                    if($('#frm' + filesid))
                    {
                        $('#frm' + filesid)[0].reset();
                    }
                } else {
                    $('#errMsgs').css('display', 'block');
                    $('#errMsgs').html(responsedata.message);
                    $('#succMsg').css('display', 'none');

                }



            },
            fail: function(res) {
                errorFlag = true;
                // console.log(res);
                uploadajax();
            },
            error: function(xhr, status, error) {
                errorFlag = true;
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                console.log('Error - ' + errorMessage);

            }
        })
    } else {
        $('#errMsgs').css('display', 'block');
        $('#errMsgs').html("Please select a file");
    }
}


function removecatalog(fieldsid, settingname) {


    //console.log(fileList);
    $('#succMsg').css('display', 'none');
    $('#errMsgs').css('display', 'none');

    if (confirm("Are you sure?")) {
        var form_data = new FormData();

        form_data.append('settingname', settingname);

        var request = $.ajax({
            url: "<?php echo site_url('removesetting'); ?>",
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            data: form_data,
            type: 'POST',
           
            success: function(res) {
                //  console.log(res);
                responsedata = JSON.parse(res);
                // console.log(responsedata);
                if (responsedata.status == 201) {
                    var uploadedfile = responsedata.data.filename;
                    $('#div' + fieldsid).html(uploadedfile);
                    $('#succMsg').css('display', 'block');
                    $('#succMsg').html(responsedata.message);
                    $('#errMsgs').css('display', 'none');
                } else {
                    $('#errMsgs').css('display', 'block');
                    $('#errMsgs').html(responsedata.message);
                    $('#succMsg').css('display', 'none');

                }



            },
            fail: function(res) {
                errorFlag = true;
                // console.log(res);
                uploadajax();
            },
            error: function(xhr, status, error) {
                errorFlag = true;
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                console.log('Error - ' + errorMessage);

            }
        })
    } else {
        $('#errMsgs').css('display', 'block');
        $('#errMsgs').html("Please select a file");
    }
}

function updatesetting(formid) {
    var formid = $('#' + formid);
    var form = formid[0];
    var form_data = new FormData(form);

    //console.log(fileList);
    $('#succMsg').css('display', 'none');
    $('#errMsgs').css('display', 'none');

        var request = $.ajax({
            url: "<?php echo site_url('updatesettingvalues'); ?>",
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            data: form_data,
            type: 'POST',
            
            success: function(res) {
               //   console.log(res);
               responsedata = JSON.parse(res);
               // console.log(responsedata);
                if (responsedata.status == 201) {
                 
                    $('#succMsg').css('display', 'block');
                    $('#succMsg').html(responsedata.message);
                    $('#errMsgs').css('display', 'none');
                } else {
                    $('#errMsgs').css('display', 'block');
                    $('#errMsgs').html(responsedata.message);
                    $('#succMsg').css('display', 'none');

                }



            },
            fail: function(res) {
                errorFlag = true;
                // console.log(res);
                uploadajax();
            },
            error: function(xhr, status, error) {
                errorFlag = true;
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                console.log('Error - ' + errorMessage);

            }
        })
    
}
</script>