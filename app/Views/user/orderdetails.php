<div class="page-content bg-white">
                    <div class="container-fluid">

                    <div class="row align-items-center">
                    <?php echo view('user/_settingmenu'); ?>
                        </div>

                        
                        
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                            <div class="table-responsive ">
                                            
                                            <table class=" w-100  border mb-4">
                                                <tbody>
                                                    <?php if($orderDetails->od_userid != $userid){?>
                                                    <tr>
                                                        <td class=" border p-2"  >
                                                            <h6> Customer Name :</h6>
                                                        </td>
                                                        <td class="border  ml-2"  colspan="5">
                                                          <div class="ml-4"><?php echo $orderDetails->fname." ".$orderDetails->lname; ?></div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td class=" p-2 border" width="10%">
                                                            <h6> Order No :</h6>
                                                        </td>
                                                        <td class="ml-2 border" >
                                                          <div class="ml-2"><?php echo $orderDetails->od_number; ?></div>
                                                        </td>

                                                        <td class=" p-2 border" width="10%" >
                                                            <h6> Order Status :</h6>
                                                        </td>
                                                        <td class="border ml-2" >
                                                          <div class="ml-4"><?php echo isset($orderstatus[$orderDetails->od_status]) ? $orderstatus[$orderDetails->od_status] :''; ?></div>
                                                        </td>

                                                        <td class="border p-2" width="10%" >
                                                            <h6> order Date :</h6>
                                                        </td>
                                                        <td class="ml-2 border" >
                                                          <div class="ml-2"><?php echo $orderDetails->od_date; ?></div>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class=" border p-2" width="10%" >
                                                            <h6> Payment Status :</h6>
                                                        </td>
                                                        <td class=" border ml-2" >
                                                          <div class="ml-4"><?php echo isset($paymentstatus[$orderDetails->od_payment_status]) ? $paymentstatus[$orderDetails->od_payment_status] :''; ?></div>
                                                        </td>

                                                        <td class="border p-2" width="10%">
                                                            <h6> Order Type :</h6>
                                                        </td>
                                                        <td class=" border ml-2" >
                                                          <div class="ml-4"><?php echo $orderDetails->od_type; ?></div>
                                                        </td>
                                                        <td class=" border p-2"  width="10%">
                                                            <h6> Total file(s) :</h6>
                                                        </td>
                                                        <td class=" border ml-2" >
                                                          <div class="ml-4"><?php echo $orderDetails->od_filecount; ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class=" border p-2"  width="10%">
                                                            <h6> Tracking Detail :</h6>
                                                        </td>
                                                        <td class="border  ml-2"  colspan="3">
                                                          <div class="ml-4"><?php echo $orderDetails->od_trackingdetail; ?></div>
                                                        </td>
                                                        <td class=" border p-2"  width="10%" colspan="2">
                                                        <?php //foreach($ordersForm as $orderformdetail){?>
                                                             <div class="w-50  float-left">
                                                                 <button type="button"  class="btn btn-info waves-effect waves-light"  data-toggle="modal" data-target="#orderview">View Order Form</button>  <a href="<?php echo site_url('downloadorderform?orderid='.$orderDetails->od_id);?>" target="_blank"><i class="fa fa-download font-size-18"></i> </a>
                                                                
                                                            </div>
                                                            
                                                            <?php //}  ?>
                                                        </td>
                                                        
                                                    </tr>
                                             </table>

                                             <!-- prder products -->
                                            <div class="row">
                                            <?php if($pagination["getNbResults"] >0 ){ ?>
                                                <?php  foreach($ordersData as $kdata){  ?>
                                                <div>
                                                <div class=" ml-4  mb-2">
                                                 <a href="<?php echo base_url('order_files/'.$kdata->op_ordernumber."/".$kdata->op_filename); ?>" target="_blank" class="image-popup-vertical-fit">   
                                                 <img class="rounded mr-2 mo-mb-2"  src="<?php echo base_url('order_files/'.$kdata->op_ordernumber."/th_".$kdata->op_filename); ?>" data-holder-rendered="true" width="100px"></a>
                                                 
                                                </div>
                                                <div class="ml-4"><?php echo $kdata->op_originalname ? $kdata->op_originalname : $kdata->op_filename; ?></div>
                                                </div>
                                                <?php } ?>
                                              <?php }else{ ?>
                                               <?php echo view('user/_noresult',array("noResult"=>array('message'=>"No photo uploaded",'description'=>"This folder not have any photo."))); ?>
                                             <?php } ?>

                                             
                                            </div>
                                            <?php if ($pagination['haveToPaginate']) { ?>
                                                
                                                <?php echo view('user/_paging', array('paginate' => $pagination, 'siteurl' => $action, 'varExtra' => $searchArray)); ?>

                                                <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <?php echo view('user/_vieworderform'); ?>