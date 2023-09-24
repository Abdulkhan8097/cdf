<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<!-- <style type="text/css">
    <style>
  .circular_image {
    transition: transform .2s; 
    width: 58px;
    height: 59px;
    margin-left: 24px;
  border-radius: 50%;
  overflow: hidden;
  background-color: blue;
 
  display:inline-block;
  vertical-align:middle;
    }
.circular_image:hover {
  transform: scale(3.5); 
    }

}
</style> -->
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
                            <a class="btn btn-primary waves-effect waves-light" href="<?php echo site_url('addourgallery'); ?>">
                                <i class="ion ion-md-add-circle-outline"></i> Add
                            </a>
                        </div>
                    </div>
                </div>
        
            </div>

            <form action="" id="customersearch">
<div class="row">
    <div class="col-xl-12">
            <div class="card ">
                
                    <div class="card-body">

                        <div class="row ">

                            <div class="col-lg-4 ">
                                <div class="row">
                                    <div class="col-md-12">
                                      <select name="page_name" class="form-control" id="page_name" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['page_name'] : ''; ?>">
                              <option selected disabled><--Select Page--></option>

                              <option value="1" <?php echo (isset($edit) && !empty($edit) && $edit['page_name']=='1') ? 'selected' : ''; ?>>Orphanges Support System</option>
                              <option value="2" <?php echo (isset($edit) && !empty($edit) && $edit['page_name']=='2') ? 'selected' : ''; ?>>Village Development Program</option>
                              <option value="3" <?php echo (isset($edit) && !empty($edit) && $edit['page_name']=='3') ? 'selected' : ''; ?>>Career</option>
                              <option value="4" <?php echo (isset($edit) && !empty($edit) && $edit['page_name']=='4') ? 'selected' : ''; ?>>CSR Partnership</option>
                             
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
                                    <a href="<?php echo site_url('listourgallery');?>"><button type="button" class="btn btn-primary waves-effect waves-light mr-1"
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
                                            <th data-sortable="true" class="text-center">S. No.</th>
                                             <th data-sortable="true" class="text-center">Page Name</th>
                                            
                                            
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

                                                <?php if($kdata->page_name=='1'){ ?>
                                              <td><?php echo 'Orphanges Support System' ?></td>
                                              <?php }elseif($kdata->page_name=='2') {?>
                                                 <td><?php echo 'Village Development Program' ?></td>
                                             <?php }elseif($kdata->page_name=='3') {?>
                                                  <td><?php echo 'Career' ?></td>
                                              <?php }elseif($kdata->page_name=='4') {?>
                                                <td><?php echo 'CSR Partnership' ?></td>

                                                <?php }elseif($kdata->page_name=='') {?>
                                            <td><?php echo '' ?></td>
                                                    <?php  }?> 
                                            



                                            
                                            
                                            <td class="text-center"><img src="<?php echo (isset($kdata->image) && !empty($kdata->image)) ? base_url('public/OurGallery/').'/'.$kdata->image : BLANK_IMG; ?>" id="display_image_here" style="height: 100px; width: 100px; " ></td> 
                                            <td class="text-center"><?php echo $kdata->created; ?></td>
                                            
                                            
                                            <td class="text-center"width="8%">
                                                  <a href="<?php echo site_url('addourgallery?id=' . $kdata->id) ?>"  title="Edit" class="btn btn-info btn-sm
"><i class="fas fa-edit" style="padding-right: 0;"></i></a>
                                                  <a href="<?php echo site_url('OurGallery/delete?id=' . $kdata->id) ?>" title="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" style="padding-right: 0;"></i></a>
                                                   
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

    