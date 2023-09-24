
    <div class="page-content">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4 class="font-size-18"><?php echo $pagetitle; ?></h4>
                    </div>
                </div>
            
                <div class="col-sm-6">
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <a class="btn btn-primary waves-effect waves-light" href="<?php echo site_url('addreport'); ?>">
                                <i class="ion ion-md-add-circle-outline"></i> Add
                            </a>
                        </div>
                    </div>
                </div>
        
            </div>
            <?php //echo view('admin/menucategory/_searchform'); ?>
            
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <?php echo view('admin/_topmessage'); ?>
                        <div class="card-body">
                        
                        <?php if($pagination["getNbResults"] >0 ){ ?>
                            <div class="table-responsive">
                                <table  data-toggle="table" data-striped="true" class="table table-hover table-centered table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th data-sortable="true" class="text-center">S No.</th>
                                            <th data-sortable="true" class="text-center">Annual Name</th>
                                            
                                            <th data-sortable="true" class="text-center">Start/End Year</th>
                                            <th data-sortable="true" class="text-center">Image</th>
                                         
                                         
                                            <th data-sortable="true" class="text-center">Created</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                       
                                        foreach($settingData as $kdata){ 
                                        
                                         
                                            ?>
                                        <tr>
                                            <th class="text-center"scope="row"><?php echo ++$startLimit ; ?></th>
                                            <td class="text-center"><?php echo $kdata->annual_name; ?>
                                            
                                            <td class="text-center"><?php echo $kdata->start_year; ?>-<?php echo $kdata->end_year; ?></td>
                                        
                                            <td class="text-center">
                                       
                                                 <a href="<?php echo (isset($kdata->anual_image) && !empty($kdata->anual_image)) ? base_url('public/Annual/').'/'.$kdata->anual_image : BLANK_IMG; ?>" target="_blank"><img src="<?php echo (isset($kdata->anual_image) && !empty($kdata->anual_image)) ? base_url('public/Annual/').'/'.$kdata->anual_image : BLANK_IMG; ?>" id="display_image_here" style="height: 100px; width: 100px; " ><a/></td> 
                                   
                                           

                                   <td class="text-center"><?php echo $kdata->created;?></td>
                                            
                                            
                                            <td class="text-center"width="8%">
                                            	
                                                  <a href="<?php echo site_url('addreport?id=' . $kdata->id) ?>" class="btn btn-info btn-sm" title="Edit"><i class="fas fa-edit" style="padding-right: 0;"></i></a>
                                                  <a href="<?php echo site_url('AnualReport/delete?id=' . $kdata->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" title="Delete"><i class="fa fa-trash" style="padding-right: 0;"></i></a>
                                                   
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php if ($pagination['haveToPaginate']) { ?>
                                <br>
                                <?php echo view('admin/_paging', array('paginate' => $pagination, 'siteurl' => $action, 'varExtra' => $searchArray)); ?>

                                <?php } ?>
                            </div>
                        <?php }else{ ?>
                            <?php echo view('admin/_noresult'); ?>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->

    </div>
    <!-- End Page-content -->  

    