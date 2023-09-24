<!-- ============================================================== -->

</style>
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
                            <a class="btn btn-primary waves-effect waves-light" href="<?php echo site_url('addemergencycases'); ?>">
                                <i class="ion ion-md-add-circle-outline"></i> Add
                            </a>
                        </div>
                    </div>
                </div>
        
            </div>
            <?php //echo view('admin/menucategory/_searchform'); ?>
                    <form action="" id="customersearch">
<div class="row">
    <div class="col-xl-12">
            <div class="card ">
                
                    <div class="card-body">

                        <div class="row ">

                            <div class="col-lg-4 ">
                                <div class="row">
                                    <div class="col-md-12">
                                      <select name="cases_name" class="form-control" id="cases_name" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['cases_name'] : ''; ?>">
                              <option selected disabled><--Select Cases--></option>
                              <option value="1" <?php echo (isset($edit) && !empty($edit) && $edit['cases_name']=='1') ? 'selected' : ''; ?>>Emergency Cases</option>
                              <option value="2" <?php echo (isset($edit) && !empty($edit) && $edit['cases_name']=='2') ? 'selected' : ''; ?>>successful Cases</option>
                             
                          </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Submit
                                    </button>
                                    <a href="<?php echo site_url('viewemergencycases');?>"><button type="button" class="btn btn-primary waves-effect waves-light mr-1"
                                     data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Clear Search Filters">
                                    <i class="mdi mdi-refresh"></i>Clear
                                </button></a>

                               
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
            </div>
        </div>
</div>
</form>
            
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
                                            <th data-sortable="true" class="text-center">Cases Name</th>
                                            
                                            <th data-sortable="true" class="text-center">Title</th>
                                            
                                            <th data-sortable="true" class="text-center">Image</th>
                                            <th data-sortable="true" class="text-center">Created</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                       
                                        foreach($settingData as $kdata){ helper('text');?>
                                        <tr>
                                            <th class="text-center"scope="row"><?php echo ++$startLimit ; ?></th>
                                              <?php if($kdata->cases_name=='1'){ ?>                                           
                                            <td><?php echo 'Emergency Cases' ?></td>
                                        <?php }elseif($kdata->cases_name=='2') {?>
                                            <td><?php echo 'Success Cases' ?></td>
                                           
                                        <?php }elseif($kdata->cases_name=='') {?>
                                            <td><?php echo '' ?></td>
                                            
                                       <?php  }?> 
                                                                                        
                                            <td class="text-center"><?php echo character_limiter($kdata->title,12); ?></td>
                                            
                                            <td><img src="<?php echo (isset($kdata->image_name) && !empty($kdata->image_name)) ? CASES_DISPLAY_PATH_NAME.$kdata->image_name : BLANK_IMG; ?>" style="height: 100px; width: 100px;" ></td>
                                            <td class="text-center"><?php echo $kdata->created; ?></td>
                                            
                                            
                                            <td class="text-center"width="8%">
                                                 <a title="View Details"href="<?php echo site_url('preview?id=' . $kdata->id) ?>" class="btn btn btn-primary btn-sm" title="Details"><i class="fas fa-eye" ></i></a>

                                                 <a title="Add Document"href="<?php echo site_url('document?id=' . $kdata->id) ?>" class="btn btn-success btn-sm"><i class="fa fa-file" aria-hidden="true"></i></a> 

                                                  <a href="<?php echo site_url('addemergencycases?id=' . $kdata->id) ?>" class="btn btn-info btn-sm" title="Edit"><i class="fas fa-edit" style="padding-right: 0;"></i></a>

                                                  <a href="<?php echo site_url('EmergencyCases/delete?id=' . $kdata->id) ?>" title="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" style="padding-right: 0;"></i></a>
                                                   
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

    