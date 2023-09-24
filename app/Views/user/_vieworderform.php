<div class="modal fade bs-example-modal-lg" id="orderview" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Order Form Detail</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               
                    <div >
                            <div class="card-body">
                            
                                        <div id="orderformdata" class=" col-lg-12">
                                            <?php 
                                            $siteVariable = new App\Libraries\SiteVariables();
                                            $ordeformLevel = $siteVariable->getVariable('orderformdormatelevel');
                                            
                                            //get orderform data
                                            $orderform = $orderDetails->od_formdetail;
                                            $arrorderform  = json_decode($orderform ,true);
                                           // print_r($ordeformLevel);
                                            foreach($ordeformLevel as $keyval =>$value)
                                            {
                                            ?>
                                            <div class="form-group row border-bottom">
                                            <label for="example-text-input" class="col-sm-3 col-form-label"><?php echo $value;?>:</label>
                                            <div class="col-sm-8">
                                            <?php echo isset($arrorderform[$keyval]) ? $arrorderform[$keyval] : '';?>
                                            </div>
                                        </div>
                                            <?php } ?>
                                        </div>
                                    
                            </div>

                            
                        </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script>

       

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
                                console.log(res);
                                // responsedata = JSON.parse(res);
                                // console.log(res);
                                // if (responsedata.status == 201) {
                                // //var uploadedfile =responsedata.data.filename;
                                // ordernumber =   responsedata.data.ordernumber;
                                // }
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