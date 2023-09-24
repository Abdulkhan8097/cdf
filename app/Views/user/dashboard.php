<?php 
 $settingObj= new \App\Models\SettingsModel();
 $settingarr= $settingObj->getNameValuepair();
 
?>
<div class="page-content bg-white"
    style="background-image: linear-gradient(0deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.9)), url('<?php echo base_url('images/'.$settingarr['FRONT_BACKGROUND_IMAGE']); ?>');">

    <div class="container-fluid">

        <div class="row align-items-center">
            <?php echo view('user/_settingmenu'); ?>
        </div>



        <div class="row pt-4">
            <!-- left panel -->
            <div class="col-lg-3  mt  float-left">
            
                <div class="card">
                   <?php if($user_type =="channelpartner"){ ?> 
                    <div class=" mt-2 ml-2 mr-2">
                        <!--<label>Select Studio Name</label>-->
                        <select class=" form-control" name="studioid" id="studioid">
                            <option value="">-Select Studio Name-</option>
                            <?php foreach($channelstudio as $studuodetail){ ?>
                            <option value="<?php echo $studuodetail['id']; ?>"><?php echo $studuodetail['companyname']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                   <?php } ?>
                    <div class="btn btn-block border btn-lg bg-primary waves-effect waves-light form-check mt-2 ">
                        <input class=" " value="RGB" type="radio" name="ordertype" id="rgbradio" checked>
                        <label class="form-check-label text-white font-size-24" for="rgbradio">
                            RGB
                        </label>

                        <input class="ml-4" value="CMYK" type="radio" name="ordertype" id="cmykradio">
                        <label class="form-check-label text-white font-size-24" for="cmykradio">
                            CMYK
                        </label>
                    </div>

                    <div class="card text-white  mt-4">
                        <button type="button"
                            class="btn btn-block font-size-24  btn-lg btn-primary waves-effect waves-light"
                             data-toggle="modal" data-target=".bs-example-modal-lg">
                            ORDER FORM </button>
                    </div>

                    <div class=" float-left  mb-4 " style="width:85%">
                        <div class="float-left ml-3 ">
                            <div class="cameron_btn_circle w-25  col-4 bg-primary file-field">
                                <i class="fas fa-plus  text-white font-size-26"></i>
                                <input type="file" name="customer_images[]" id="customer_images" multiple
                                    accept="image/jpg,image/jpeg,image/png,application/pdf,.xls,.xlsx,image/psd">

                            </div>
                            <div class="text-primary mt-2 ml-2 text-dark font-size-22"> File</div>
                        </div>
                        <div class=" float-left text-center w-25 ml-4 pt-4">
                            <h5>OR</h5>
                        </div>
                        <div class="float-right">
                            <div class="cameron_btn_circle w-25  col-4 bg-primary file-field">
                                <i class="far fa-folder text-white font-size-26"></i>
                                <input type="file" name="customer_images_dir[]" id="customer_images_dir" webkitdirectory
                                    multiple accept="image/jpg,image/jpeg,image/png,application/pdf,.xls,.xlsx,image/psd">
                            </div>

                            <div class="text-primary mt-2 ml-2 text-dark font-size-22"> Folder</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of left pane -->
            <!-- right panel -->
            <div class="col-lg-9 ">
                <div class="" style="min-height:500px">

                    <div id="errMsg" style="display:none;"
                        class="alert alert-danger alert-dismissible fade show mb-0 w-50 ml-4 mt-2" role="alert"> </div>
                    <div>
                        <div class="w-25 ml-4 mt-2 " id="divcontinue" style="display:none;">
                            <button id="continue"
                                class="btn btn-mini font-size-24  btn-lg btn-primary waves-effect waves-light">Continue</button>
                        </div>


                        <div class=" w-75 ml-4 mt-4 " style="max-height: 73vh;">


                            <div style="display:none" id='file_loader_div'>
                                <div class="progress" style="height:35px; ">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                        id='file_upload_percentage' role="progressbar" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                </div>

                                <h4 id='current_file_name' class="text-white"></h4>
                            </div>




                            <div style="display:none" id='overall_loader_div' class="mt-4">
                                <div class="progress" style="height:35px; ">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                                        id='ovelall_percentage' role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                        aria-valuemax="100" style="width: 0%"></div>
                                </div>

                                <h4 id='overall_file_count' class="text-white"></h4>
                            </div>


                            <div class="w-25 ml-4 mt-2 " id="divcancelrequest" style="display:none;">
                                <button id="cancelrequest"
                                    class="btn btn-mini font-size-24  btn-lg btn-danger waves-effect waves-light">Cancel</button>
                            </div>

                            <div id='divsuccess' class="text-white font-size-24"></div>
                        </div>

                    </div>

                </div>
                <!-- end of right panel -->

            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- <script src="<?php echo base_url('js/materialize.min.js'); ?>"></script> -->
    <script src="<?php echo base_url('js/customefileupload.js'); ?>"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        var customeupload = new customefileupload();
        var uploadfilescart = customeupload.getfilecart();

        var isSingle = 0;
        var COMPRESS_MODE = 0;
        var COMPRESS_SIZE = 9437184; // greated than 9Mb
        // upload folder code
        var arrfileobj = [];
        var totaluploadfiles = 0;
        var totalselectedfiles = 0;
        var arrAllfile = [];
        var arrordersnumber = [];
        var filesselecterror = "";

        var inputField = $('#customer_images');
        var inputField2 = $('#customer_images_dir');

        inputField.on('change', (event) => {

            arrfileobj = []; // remove all previouse file and then asign new
            arrAllfile = [];
            arrordersnumber = [];
            totaluploadfiles = 0;
            totalselectedfiles = 0;
            isSingle = 1;
            var files = event.target.files;
            var nowallowfiles = [];
            var largefiles = [];
            var fileserrors = "";
            filesselecterror = "";
            customeupload.clearCart();

            //   allfolderobject.newfolder = files;
             //  console.log(files);

            if (files.length > 0) {
                //  var fileList = $('#customer_images_dir').prop("files");
                var fileList = inputField.prop("files");
                //  customeupload.testf(); 
                var i;
                for (i = 0; i < fileList.length; i++) {

                    //check file is allow or not
                    fileallow = customeupload.checkallowfilestypes(fileList[i]);
                    //console.log(fileallow);

                    if (fileallow > -1) {
                        filesize = customeupload.checkfilesize(fileList[i]);
                        if (filesize > 0) {
                            //var filepath = "singleupload/"+fileList[i].name;
                            var filepath = 'signlefolder/' + fileList[i]
                            .name; //fileList[i].webkitRelativePath;
                            var filename = fileList[i].name;

                            customeupload.addfiles(filepath, filename); // add file to upload list


                            arrfileobj.push(fileList[i]);
                            //  arrAllfile.push(fileList[i]);
                            totalselectedfiles = totalselectedfiles + 1;
                        } else {
                            largefiles.push(fileList[i].webkitRelativePath);
                        }

                    } else {
                        //if file now alllow store into list
                        nowallowfiles.push(fileList[i].webkitRelativePath);
                    }


                }
              //  console.log(largefiles);
                //if file error
                for (j = 0; j < nowallowfiles.length; j++) {
                    fileserrors += "<p>" + nowallowfiles[j] + " not allow so not included</p>";
                }
                //if file size error
                for (k = 0; k < largefiles.length; k++) {
                    fileserrors += "<p>" + largefiles[k] + " size is large so not included</p>";
                }

                if (fileserrors) {
                    $('#errMsg').css('display', 'block');
                    $('#errMsg').html(fileserrors);
                    $('#divcontinue').css('display', 'block');
                } else {
                    event.stopImmediatePropagation();
                    var allfilescart = customeupload.getfilecart();

                    uploadajax();
                    progressbaroverall(totalselectedfiles, totaluploadfiles, 0, 'processing...');
                }


            } else {
                response_msg = '<p>Please select atleast one photo</p>';
                $('#errMsg').css('display', 'block');
                $('#errMsg').html(response_msg);
            }
            $('#divsuccess').css('display', 'none');

            return false;
        });


        inputField2.on('change', (event) => {

            arrfileobj = []; // remove all previouse file and then asign new
            arrAllfile = [];
            arrordersnumber = [];
            totaluploadfiles = 0;
            totalselectedfiles = 0;
            isSingle = 0;
            var files = event.target.files;
            var nowallowfiles = [];
            var largefiles = [];
            var fileserrors = "";
            filesselecterror = "";
            
            customeupload.clearCart();



            if (files.length > 0) {
                //  var fileList = $('#customer_images_dir').prop("files");
                var fileList = inputField2.prop("files");
                //  customeupload.testf(); 
                var i;
                for (i = 0; i < fileList.length; i++) {

                    //check file is allow or not
                    fileallow = customeupload.checkallowfilestypes(fileList[i]);

                    // console.log("fileallow);
                    if (fileallow > -1) {
                        filesize = customeupload.checkfilesize(fileList[i]);
                        if (filesize > 0) {
                            var filepath = fileList[i].webkitRelativePath;
                            var filename = fileList[i].name;
                            //console.log("atbegning--"+filepath);
                            customeupload.addfiles(filepath, filename); // add file to upload list


                            arrfileobj.push(fileList[i]);
                            //  arrAllfile.push(fileList[i]);
                            totalselectedfiles = totalselectedfiles + 1;
                        } else {
                            largefiles.push(fileList[i].webkitRelativePath);
                        }

                    } else {
                        //if file now alllow store into list
                        nowallowfiles.push(fileList[i].webkitRelativePath);
                    }


                }
                //if file error
                for (j = 0; j < nowallowfiles.length; j++) {
                    fileserrors += "<p>" + nowallowfiles[j] + " not allow so not included</p>";
                }
                //if file size error
                for (k = 0; k < largefiles.length; k++) {
                    fileserrors += "<p>" + largefiles[k] + " size is large so not included</p>";
                }

                if (fileserrors) {
                    $('#errMsg').css('display', 'block');
                    $('#errMsg').html(fileserrors);
                    $('#divcontinue').css('display', 'block');
                } else {
                    event.stopImmediatePropagation();
                    uploadajax();

                    progressbaroverall(totalselectedfiles, totaluploadfiles, 0, 'processing...');
                }


            } else {
                response_msg = '<p>Please select atleast one photo</p>';
                $('#errMsg').css('display', 'block');
                $('#errMsg').html(response_msg);
            }
            $('#divsuccess').css('display', 'none');

            return false;
        });

        //ajax upload
        function uploadajax() {

            var allfilescart = customeupload.getfilecart();
            var allfolders = allfilescart.folders || [];
            var fileuploadremain = '';

            $('#divcontinue').css('display', 'none');
            $('#divsuccess').css('display', 'none');
            $('#errMsg').css('display', 'none');
         //  console.log(allfilescart);
            if (allfolders.length) {

                
                for (j = 0; j < allfolders.length; j++) {
                    var folderfiles = allfolders[j].files || [];
                    var newordernumber = allfolders[j].ordernumber;

                    //each folder have its order check if folder not have order then generate order number for it
                    if (folderfiles.length > 0 && (newordernumber == undefined || newordernumber == '')) {
                        var curfoldername = allfolders[j].foldername;
                        newordernumber = createorder(curfoldername);
                        customeupload.addordernumber(newordernumber, curfoldername);
                       // break;
                    }

                    for (k = 0; k < folderfiles.length; k++) {
                        fileuploadremain++;
                        var filedirectory = folderfiles[k];
                        var issinglefolder = folderfiles[k].indexOf('signlefolder');

                        if (issinglefolder >= 0) {
                            var dirs = folderfiles[k].split('/');
                            filedirectory = dirs[dirs.length - 1];
                        }


                        var currentfileobj = customeupload.getcurrentfile(arrfileobj, filedirectory);
                       
                        if (currentfileobj) {
                          //    console.log(currentfileobj);
                            start_upload(currentfileobj, currentfileobj.name, newordernumber);
                            //break;
                        }
                    }
                }

            }
            console.log('local remain count'+fileuploadremain);
            if(fileuploadremain)
            {
                $('#divcancelrequest').css('display', 'block');
            }

            if (fileuploadremain && filesselecterror) {
                var response_msg = '<p>No file for upload.</p>';
                $('#errMsg').css('display', 'block');
                $('#errMsg').html(response_msg);
            }

        }

       // async function start_upload(fileobject, filename, newordernumber) {
         function start_upload(fileobject, filename, newordernumber) {
            // variable to store files  
            var CompressImgFile;
            var CompressImgName;
            //console.log(fileobject);
            var isImage = customeupload.checkallowImages(fileobject);


            if (COMPRESS_MODE && (isImage > -1) && (fileobject.size > COMPRESS_SIZE)) {
                var file_quality = 0.92;

                // compress function
                var CompressedImg = new Compressor(fileobject, {
                    strict: true,
                    checkOrientation: true,
                    maxWidth: undefined,
                    maxHeight: undefined,
                    quality: file_quality,
                    mimeType: 'auto',
                    convertSize: 5000000,

                    success(result) {
                        var reader = new FileReader();
                        reader.readAsDataURL(result);
                        reader.onloadend = function() {
                            //compress file and store in compre variable
                            CompressImgFile = result;
                            CompressImgName = result.name;

                        }
                    },
                });
                // compress function

            } else {
                CompressImgFile = fileobject;
                CompressImgName = fileobject.name;
            }


            var form_data = new FormData();
            form_data.append('images[]', CompressImgFile, CompressImgName);
            form_data.append('ordernumber', newordernumber);
            form_data.append('totalselectedfiles', totalselectedfiles);

            var request = $.ajax({
                url: "<?php echo site_url('uploadfiles'); ?>",
                cache: false,
                contentType: false,
                processData: false,
               // async: true,
                data: form_data,
                type: 'POST',
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', function(e) {
                            var percent = 0;
                            if (e.lengthComputable) {
                                percent = Math.ceil(e.loaded / e.total * 100);
                                progressbarcurrent(filename, percent);

                            }
                        }, false);
                    }
                    return xhr;
                },
                success: function(res) {
                   //console.log(res);
                    responsedata = JSON.parse(res);
                    // console.log(responsedata);
                    if (responsedata.status == 201) {
                        //var uploadedfile = responsedata.data.filename;
                       // console.log(totalselectedfiles+"-ssd-"+responsedata.totaluploadedcount);
                        var allfilescart = customeupload.getfilecart();
                        
                        var uploadedfile = "";
                        if(fileobject.webkitRelativePath)
                        {
                            uploadedfile = fileobject.webkitRelativePath;
                        }
                        else
                        {
                            uploadedfile = "signlefolder/"+fileobject.name;
                        }
                        //console.log(" uploaded-->"+uploadedfile);
                        customeupload.removefiles(uploadedfile);

                        totaluploadfiles = totaluploadfiles + 1;
                        percentages = (totaluploadfiles / totalselectedfiles) * 100;
                        progressbaroverall(totalselectedfiles, totaluploadfiles, percentages,
                            '');
                        arrordersnumber.push(newordernumber);
                        //hide file progess bar
                        if (totaluploadfiles == totalselectedfiles) {
                            let alluploadedOrders = arrordersnumber.filter((item, i, ar) => ar
                                .indexOf(item) === i);
                            var stallordersnumber = alluploadedOrders.toString();
                            updateorderstatus(stallordersnumber);
                            $("input[type='file'][name='customer_images_dir']:checked").val();
                            $("input[type='file'][name='customer_images']:checked").val();
                            $('#file_loader_div').css('display', 'none');
                            $('#overall_loader_div').css('display', 'none');
                            $('#divsuccess').css('display', 'block');

                            $('#divcancelrequest').css('display', 'none');
                            var succMsgs =
                                "<p>"+stallordersnumber +" Order Placed Successfully! </p>";
                            $('#divsuccess').html(succMsgs);
                            // console.log(alluploadedOrders);

                        }
                        if(responsedata.totaluploadedcount == totalselectedfiles)
                        {
                            //customeupload.clearCart();
                            filesselecterror =1;
                            $('#file_loader_div').css('display', 'none');
                            $('#overall_loader_div').css('display', 'none');
                        }
                        else
                        {

                        }


                    }
                    else
                    { console.log("no 201 ")
                        if(responsedata.message)
                        {
                            $('#errMsg').css('display', 'block');
                         $('#errMsg').html(responsedata.message);
                        }
                        
                    }



                },
                fail: function(res) {
                    errorFlag = true;
                    // console.log(res);
                  //  console.log(res+'not upload --');
                    uploadajax();

                },
                error: function(xhr, status, error) {
                    errorFlag = true;
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    console.log('Error - ' + errorMessage);
                    //uploadajax();

                }
            })

        }

        function createorder(curfoldername) {
            var ordernumber = '';
            var studioid = '';
            var ordertype = $("input[type='radio'][name='ordertype']:checked").val();
           <?php if($user_type =="channelpartner"){?> 
             studioid = $('#studioid').val();
           <?php } ?>
//            console.log(studioid);
            var orderform_data = new FormData();
            orderform_data.append('ordertype', ordertype);
            orderform_data.append('singlefolder', isSingle);
            orderform_data.append('studioid', studioid);
            orderform_data.append('foldername', curfoldername);

            var request = $.ajax({
                url: "<?php echo site_url('createorder'); ?>",
                cache: false,
                contentType: false,
                processData: false,
                async: false,
                data: orderform_data,
                type: 'POST',

                success: function(res) {
                  //  console.log(res);
                    responsedata = JSON.parse(res);
                    //console.log(responsedata);
                    if (responsedata.status == 201) {
                        //var uploadedfile =responsedata.data.filename;
                        ordernumber = responsedata.data.ordernumber;
                    }
                },
                fail: function(res) {
                    errorFlag = true;
                    console.log(res);

                },
                error: function(xhr, status, error) {
                    errorFlag = true;
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    console.log('Error - ' + errorMessage);

                }
            })

            return ordernumber;
        }
        
        
        function updateorderstatus(ordersnumber) {
            
        //console.log(ordersnumber);
            var request = $.ajax({
                url: "<?php echo site_url('updateorderstatusfinal?ordersnumber='); ?>"+ordersnumber,
                cache: false,
                contentType: false,
                processData: false,
                async: false,
                data: "",
                type: 'GET',

                success: function(res) {
                  //  console.log(res);
                    responsedata = JSON.parse(res);
                    console.log(responsedata);
                    if (responsedata.status == 201) {
//                        console.log(responsedata.message);
                        
                    }
                },
                fail: function(res) {
                    errorFlag = true;
                    console.log(res);

                },
                error: function(xhr, status, error) {
                    errorFlag = true;
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    console.log('Error - ' + errorMessage);

                }
            })

           
        }

        function progressbaroverall(totalfile, currentcount, totalpercent, message) {
            var message = message ? message : '';
            $('#overall_loader_div').css('display', 'block');
            $('#ovelall_percentage').css('width', parseInt(totalpercent) + '%');

            var loadingmsg = message ? message : "<p>Uploading " + currentcount + " / " + totalfile + " </p>";
            $('#overall_file_count').html('');
            $('#overall_file_count').html(loadingmsg);

        }

        function progressbarcurrent(files, pecentcomplete) {

            $('#file_loader_div').css('display', 'block');
            $('#file_upload_percentage').css('width', parseInt(pecentcomplete) + '%');
            var currentfile = "<p> " + files + ' - ' + pecentcomplete + "% </p>";
            $('#current_file_name').html('');
            $('#current_file_name').html(currentfile);

        }
        
        function check_connection()
        {
            if($.active > 0){
                console.log("continue");
            }
            else
            {
                console.log("no request");
            }
            
            
            if ( $.ajax.inProgress ){ 
                
                 console.log("ajax request");
            }
        }

       // setInterval(check_connection, 5000);
        
        $("#rgbradio").on("click", function() {
            
            <?php $siteVariable = new App\Libraries\SiteVariables();
                $paperrgb = $siteVariable->getVariable('papertypergb');
                $papercmyk = $siteVariable->getVariable('papertypecmyk');
                $strpaperRgb = "";
                $strpapercmyk = "";
                foreach($paperrgb as $key =>$value)
                {
                    $strpaperRgb .= "<option value='".$key."'>".$value."</option>";
                }
                
                foreach($papercmyk as $key =>$value)
                {
                    $strpapercmyk .= "<option value='".$key."'>".$value."</option>";
                }
                ?>
            $("#paper_type").html("<?php echo $strpaperRgb; ?>");
            $('#album_type').prop('selectedIndex',0);
        });
        $("#cmykradio").on("click", function() {
           $("#paper_type").html("<?php echo $strpapercmyk; ?>");
             $('#album_type').prop('selectedIndex',0);
        });
        
        $("#paper_type").on("change", function() {
           if($("#paper_type").val()=="Mixed")
           {
             $('#div_paper_note').show();
           }
           else
           {
             $('#div_paper_note').hide();
             $('#paper_note').val('');
           }
        });
        
        
        

        // ajax upload function
        $("#continue").on("click", function() {
            uploadajax();
        });

        $("#cancelrequest").on("click", function() {
            
            location.reload();
        });

        window.addEventListener('online', () =>{ 
            console.log('Became online');
            uploadajax();} );

    });

    </script>


    <?php echo view('user/_orderform'); ?>