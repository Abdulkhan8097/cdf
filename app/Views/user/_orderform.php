<div class="modal fade bs-example-modal-lg" id="orderformmodel" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel"> Order Form</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               
                    <div >
                            <div class="card-body">

                                   <div class="mb-2 row "> 
                                     <div id="updatefilemessage" style="display:none" class="alert alert-success alert-dismissible fade show mb-0  mb-4 mt-2 col-lg-4"></div>
                                  </div>
                                   <form action="javascript:void(0);"  method="post" id="formdata" onsubmit="updateorderform();" >
                                        <div id="orderformdata" class=" col-lg-12">
                                            <?php echo view('user/_orderformdata'); ?>
                                        </div>
                                       
                                       <div class="form-group row ">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-10">
                                                <input type="submit" name="exsubmit" class="btn btn-primary waves-effect waves-light mr-1" value="Submit">
                                                <input type="button" name="excancel" id="excancel" class="btn btn-primary waves-effect waves-light mr-1" value="Clear">
                                            </div>
                                        </div>
                                    </form>
                            </div>

<!--                            <p>Download latest format  <a href="<?php echo base_url('sampleorderform.xlsx');?>" target="_blank" download>click here </a>.</p>-->
                        </div>
            </div>
        </div>
    </div>
</div>

<script>


    function updateorderform()
          {
            
            var form = $('#formdata')[0];

            var formdata = new FormData(form);

                var request = $.ajax( {
                            url : "<?php echo site_url('saveorderform'); ?>",
                            cache: false,
                            contentType: false,
                            processData: false,
                            async: false,
                            data: formdata,
                            type: 'POST',
                            
                            success: function(res) {
//                                console.log(res);
                                 responsedata = JSON.parse(res);
                                if (responsedata.status == 201) {
                                    
                                    $('#uploadfilemsg').css('display','none');
//                                     $('#updatefilemessage').css('display','block');
//                                     $('#updatefilemessage').html(responsedata.message);
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
    <script type="text/javascript">
    $(document).ready(function() {
       
        $("#excancel").on("click", function() {
          
          var request = $.ajax( {
                            url : "<?php echo site_url('clearorderform'); ?>",
                            cache: false,
                            contentType: false,
                            processData: false,
                            async: false,
                            data: "",
                            type: 'GET',
                            
                            success: function(res) {
//                                console.log(res);
                                
                                $("#orderformdata").html(res);
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
           
        });
        
       $("#album_type").on("change", function() {
          
          divhideshowalbum();
           
        });

        function divhideshowalbum()
        {
            
            if($("#album_type").val()=="album")
           { 
             $('#div_wrapper_type').show();
             $('#div_wrapper_designcode').show();
             $('#div_wrapper_colorcode').show();
             $('#div_name_detail').show();
             $('#div_ealbum').show();
             $('#div_ealbum_studioname').show();
             $('#div_event_name').show();
              $('#div_email').show();
              $('#div_email').show();
              $('#div_doublealbum').show();
              $('#div_tabletopcalender').show();
              $('#div_mini_book').show();
              $('#div_playing_cards').show();
              $('#div_wall_calender').show();
              $('#div_printed_pendrive').show();
           }
           else
           {
             $('#div_wrapper_type').hide();
             $('#div_wrapper_designcode').hide();
             $('#div_wrapper_colorcode').hide();
             $('#div_name_detail').hide();
             $('#div_ealbum').hide();
             $('#div_ealbum_studioname').hide();
             $('#div_event_name').hide();
             $('#wrapper_type').val('');
             $('#wrapper_designcode').val('');
             $('#wrapper_colorcode').val('');
             $('#name_detail').val('');
             $('#event_name').val('');
             
            $('#doublealbum').val('');
            $('#tabletopcalender').val('');
            $('#mini_book').val('');
            $('#playing_cards').val('');
            $('#wall_calender').val('');
            $('#printed_pendrive').val('');
             
             $('#div_doublealbum').hide();
              $('#div_tabletopcalender').hide();
              $('#div_mini_book').hide();
              $('#div_playing_cards').hide();
              $('#div_wall_calender').hide();
              $('#div_printed_pendrive').hide();
           }
           
           if($("#album_type").val()=="cake")
           {
               $('#div_email').hide();
               $('#email').val('');
           }
           
           
           if($("#album_type").val()=="print")
           {
               $('#div_email').hide();
               $('#div_interleaf').hide();
               $('#email').val('');
           }
           else
           {
                $('#div_interleaf').show();
           }
           
        }
        
        <?php //if(isset($formdata['album_type']) && $formdata['album_type'] !="album"){ ?>
                divhideshowalbum();
<?php //} ?>
        
    });
    
     $( window ).on( "load", function() {
        console.log( "window loaded" );
         divhideshowalbum();
    });
</script>