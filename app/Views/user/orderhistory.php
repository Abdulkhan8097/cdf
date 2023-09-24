<div class="page-content bg-white">
                    <div class="container-fluid">

                    <div class="row align-items-center">
                        <?php echo view('user/_settingmenu'); ?>
                        </div>

                        
                        
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                            <div class="table-responsive">
                                            <form action="">
                                            <table class=" w-50   mb-4">
                                                <tbody>
                                                    <tr>
                                                        <td >
                                                       <div style="width:400px;"> <input type="text" name="txtsearch" class="form-control form-control-lg" placeholder="Search by order no " value="<?php echo $txtsearch; ?>" > </div>
                                                        </td>
                                                        <td >
                                                            <div style="width:200px;" class="pl-2"> 
                                                                <select class="form-control form-control-lg" name="order_type">
                                                                <option value="" <?php if(!$ostatus){ echo "selected"; }?>>-Order Type-</option>
                                                                <?php foreach($ordertype as $skey=>$svalue){?>
                                                                <option value="<?php echo $skey; ?>" <?php if($skey == $order_type){ echo "selected"; }?>> <?php echo $svalue; ?></option>
                                                                <?php } ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td >
                                                            <div style="width:250px;" class="pl-2"> 
                                                                <select class="form-control form-control-lg" name="ostatus">
                                                                <option value="" <?php if(!$ostatus){ echo "selected"; }?>>-Select Status-</option>
                                                                <?php foreach($orderstatuscpdropdown as $skey=>$svalue){?>
                                                                <option value="<?php echo $skey; ?>" <?php if($skey == $ostatus){ echo "selected"; }?>> <?php echo $svalue; ?></option>
                                                                <?php } ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td >
                                                        <div style="width:200px;" class=" pl-2" ><button type="submit" class="btn btn-block btn-lg btn-primary camron_bg w-md waves-effect waves-light"> Submit</button></div>
                                                        </td>
                                                       
                                                        
                                                    </tr>
                                       </table>
                                    </form>

                                       <?php if($pagination["getNbResults"] >0 ){ ?>
                                            <table class="table table-hover table-centered table-nowrap mb-0 font-size-16">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">S No</th>
                                                        <th scope="col">Order No</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Number of file</th>
                                                        <th scope="col" >Status</th>
                                                        <th scope="col" >Payment Status</th>
                                                        <th scope="col">CC Note</th>
                                                        <th scope="col">Tracking details</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php 
                                        
                                                    foreach($ordersData as $kdata){ ?>
                                                    <tr>
                                                    <tr>
                                                        <th><?php echo ++$startLimit ;  ?></th>
                                                        <th scope="row"><a href="<?php echo site_url('orderdetail?oid='.$kdata->od_id);?>"><?php echo $kdata->od_number; ?></a></th>
                                                        <td><?php echo $kdata->od_date; ?></td>
                                                        <td><?php echo $kdata->od_filecount; ?></td>
                                                        <td><?php echo isset($orderstatus[$kdata->od_status]) ? $orderstatus[$kdata->od_status] : ''; ?></td>
                                                        <td><?php echo isset($paymentstatus[$kdata->od_payment_status]) ? $paymentstatus[$kdata->od_payment_status] :''; ?></td>
                                                        <td> <?php echo $kdata->od_note; ?></td>
                                                        <td> <?php echo $kdata->od_trackingdetail; ?></td>
                                                        <td> <?php if($kdata->od_status =='pending'){?> 
                                                            <a href="<?php echo site_url('cancelorder?oid='.$kdata->od_id);?>" onclick="return confirm('Are you sure?')"><button class="btn btn-sm btn-danger waves-effect waves-light mr-1"> Cancel</button></a>
                                                                <?php }
                                                                if($kdata->od_status =='correctioninitiated'){ ?>
                                                            <button class="btn btn-sm btn-primary waves-effect waves-light mr-1" data-toggle="modal" data-target="#correctionfileupload" onclick="setOrderNumber('<?php echo $kdata->od_number; ?>')"> Upload Files</button>
                                                            
                                                                <?php }  ?>
                                                            <?php if($kdata->od_status =='correctioninitiated'){?>
                                                            <button class="btn btn-sm btn-info waves-effect waves-light mr-1" onclick="updateorderstatus('<?php echo $kdata->od_number; ?>')" >Done</button>
                                                            <?php } ?>
                                                        </td>
                                                        
                                                    </tr>
                                                    <?php } ?>
                                                   
                                                </tbody>
                                            </table>

                                            <?php if ($pagination['haveToPaginate']) { ?>
                                               
                                                <?php echo view('user/_paging', array('paginate' => $pagination, 'siteurl' => $action, 'varExtra' => $searchArray)); ?>

                                                <?php } ?>

                                            <?php }else{ ?>
                                        <?php echo view('admin/_noresult'); ?>
                                    <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <?php echo view('user/_usercorrectionform'); ?>
                <script type="text/javascript">
                     
                     function setOrderNumber(ordernumber)
                    { 
                        $("#txtordernumber").val(ordernumber);
                     
                    }
                    
                    function updateorderstatus(ordersnumber) {
            
                            var orderstatus ="correction";
                        //console.log(ordersnumber);
                            var request = $.ajax({
                                url: "<?php echo site_url('updateorderstatusfinal?ordersnumber='); ?>"+ordersnumber+"&orderstatus="+orderstatus,
                                cache: false,
                                contentType: false,
                                processData: false,
                                async: false,
                                data: "",
                                type: 'GET',

                                success: function(res) {
                                    console.log(res);
                                    responsedata = JSON.parse(res);
                                   // console.log(responsedata);
                                    if (responsedata.status == 201) {
                //                        console.log(responsedata.message);
                                         window.location.reload();
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