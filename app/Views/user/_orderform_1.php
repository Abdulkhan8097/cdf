<div class="modal fade bs-example-modal-lg" id="orderformmodel" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Upload your Order Form</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               
                    <div >
                            <div class="card-body">
                                <h4 class="card-title">Upload your form</h4>
                                <form action="javascript:void(0);" id="fordataupload" method="post" onsubmit="return formdataupload();">
                                    <div id="uploadfilemsg" style="display:none" class="alert alert-success alert-dismissible fade show mb-0  mb-4 mt-2 col-lg-4"></div>
                                    <div class="form-group">
                                    <input type="file"  name="orderform" id="orderform"  accept=".xls,.xlsx,.csv">
                                    <input type="submit" name="submit" class="btn btn-primary waves-effect waves-light mr-1" value="Upload">
                                    </div>
                                </form>
                                <hr>
                                   <div class="mb-2 row "> 
                                        <div class="float-left w-75"><h4>  </h4> </div>
                                        <div class="float-right w-25">Refresh to load form
                                        <button type="button" class="btn btn-secondary waves-effect" onclick="freshOrderform();" ><i class="mdi mdi-reload"></i></button>
                                       
                                        </div>
                                   </div>
                                   <div class="mb-2 row "> 
                                     <div id="updatefilemessage" style="display:none" class="alert alert-success alert-dismissible fade show mb-0  mb-4 mt-2 col-lg-4"></div>
                                  </div>
                                   <form action="javascript:void(0);"  method="post" id="formdata" onsubmit="updateorderform();" >
                                        <div id="orderformdata" class=" col-lg-12">
                                            <?php echo view('user/_orderformdata'); ?>
                                        </div>
                                    </form>
                            </div>

                            <p>Download latest format  <a href="<?php echo base_url('sampleorderform.xlsx');?>" target="_blank" download>click here </a>.</p>
                        </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script>



    function formdataupload()
          {
            $('#uploadfilemsg').css('display','none');
            $('#updatefilemessage').css('display','none');
            $('#uploadfilemsg').html('');
            
            var orderformfile = $('#orderform').prop("files");
            
            if(orderformfile.length)
            {

                     var orderform_data = new FormData();
                     orderform_data.append('orderform', orderformfile[0], orderformfile[0].name);
                    
                        var request = $.ajax( {
                                    url : "<?php echo site_url('uploadformdatafile'); ?>",
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    async: false,
                                    data: orderform_data,
                                    type: 'POST',
                                    
                                    success: function(res) {
                                       // console.log(res);
                                         responsedata = JSON.parse(res);
                                        if (responsedata.status == 201) {
                                            $('#uploadfilemsg').css('display','block');
                                            var datafilemsg=responsedata.message;
                                            $('#uploadfilemsg').html(datafilemsg);
                                            freshOrderform();
                                           // $("#orderform [type='file']")[0].value=""
                                          //  $('#orderform').trigger('click');
                                           
                                        }
                                    },
                                    fail: function(res) {
                                        errorFlag = true;
                                      //  console.log(res);
                                        
                                    },
                                    error: function(xhr, status, error) {
                                        errorFlag = true;
                                        var errorMessage = xhr.status + ': ' + xhr.statusText;
                                      //  console.log('Error - ' + errorMessage);
                                        
                                    }
                                })

            }
            else
            {
                $('#uploadfilemsg').css('display','block');
                var datafilemsg= "Please select a file";
                $('#uploadfilemsg').html(datafilemsg);
            }
            
            return false;
                       
          }



     function freshOrderform()
        {
            $('#uploadfilemsg').css('display','none');
            $('#updatefilemessage').css('display','none');

                     var request = $.ajax( {
                            url : "<?php echo site_url('viewexcel'); ?>",
                            cache: false,
                            contentType: false,
                            processData: false,
                            async: false,
                            data: "",
                            type: 'GET',
                            
                            success: function(res) {
                                $('#orderformdata').html(res); 
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


       

    function updateorderform()
          {
            
            var form = $('#formdata')[0];

            var formdata = new FormData(form);

                var request = $.ajax( {
                            url : "<?php echo site_url('createexcel'); ?>",
                            cache: false,
                            contentType: false,
                            processData: false,
                            async: false,
                            data: formdata,
                            type: 'POST',
                            
                            success: function(res) {
                                responsedata = JSON.parse(res);
                               // console.log(res);
                                if (responsedata.status == 201) {
                                    
                                    $('#uploadfilemsg').css('display','none');
                                     $('#updatefilemessage').css('display','block');
                                     $('#updatefilemessage').html(responsedata.message);
                                     $('#orderformmodel').modal('toggle');
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
    </script>