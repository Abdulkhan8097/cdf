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
                                                        <th scope="col">Order By</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Number of file</th>
                                                        <th scope="col" >Status</th>
                                                        <th scope="col" >Payment Status</th>
                                                        <th scope="col">Tracking details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php 
                                        
                                                    foreach($ordersData as $kdata){ ?>
                                                    <tr>
                                                    <tr>
                                                        <th><?php echo ++$startLimit ;  ?></th>
                                                        <th scope="row"><a href="<?php echo site_url('orderdetail?oid='.$kdata->od_id);?>"><?php echo $kdata->od_number; ?></a></th>
                                                        <td><?php echo $kdata->fname." ".$kdata->lname; ?></td>
                                                        <td><?php echo $kdata->od_date; ?></td>
                                                        <td><?php echo $kdata->od_filecount; ?></td>
                                                        <td><?php echo isset($orderstatus[$kdata->od_status]) ? $orderstatus[$kdata->od_status] : ''; ?></td>
                                                        <td><?php echo isset($paymentstatus[$kdata->od_payment_status]) ? $paymentstatus[$kdata->od_payment_status] :''; ?></td>
                                                        <td> <?php echo $kdata->od_trackingdetail; ?></td>
                                                        
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