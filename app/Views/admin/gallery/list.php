<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

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
                            <a class="btn btn-primary waves-effect waves-light" href="<?php echo site_url('addgallery'); ?>">
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
                                      <select name="category" class="form-control" id="category" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['category'] : ''; ?>">
                              <option selected disabled><--Select Category--></option>
                              <option value="1" <?php echo (isset($edit) && !empty($edit) && $edit['category']=='1') ? 'selected' : ''; ?>>Photo</option>
                              
                              <option value="2" <?php echo (isset($edit) && !empty($edit) && $edit['category']=='2') ? 'selected' : ''; ?>>Video</option>
                              <option value="3" <?php echo (isset($edit) && !empty($edit) && $edit['category']=='3') ? 'selected' : ''; ?>>Media</option>
                             
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
                                    <a href="<?php echo site_url('viewgallery');?>"><button type="button" class="btn btn-primary waves-effect waves-light mr-1"
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

<script>
function exportdata()
          {
            var formdata = $('#customersearch').serialize();
            window.open("<?php echo site_url('customerexportexcel'); ?>?"+formdata);   
          }
    </script>
            
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
                                            
                                            <th data-sortable="true" class="text-center">Category</th>
                                            <th data-sortable="true" class="text-center">Image</th>
                                            <th data-sortable="true" class="text-center">Created</th>
                                          
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                       
                                        foreach($settingData as $kdata){ helper('text');?>
                                        <tr>
                                            <th scope="row"><?php echo ++$startLimit ; ?></th>
                                           <?php if($kdata->category=='1'){ ?>                                           
                                            <td><?php echo 'Photo' ?></td>
                                        <?php }elseif($kdata->category=='0') {?>
                                        	<td><?php echo 'ALL' ?></td>
                                        	 <?php }elseif($kdata->category=='2') {?>
                                        	<td><?php echo 'Video' ?></td>
                                        	 <?php }elseif($kdata->category=='3') {?>
                                        	<td><?php echo 'Media' ?></td>
                                        <?php }elseif($kdata->category=='') {?>
                                        	<td><?php echo '' ?></td>
                                        	
                                       <?php  }?> 
                                            <td><img src="<?php echo (isset($kdata->image) && !empty($kdata->image)) ? GALLERY_DISPLAY_PATH_NAME.$kdata->image : BLANK_IMG; ?>" id="display_image_here" style="height: 100px; width: 100px; " ></td>
                                            <td><?php echo $kdata->created; ?></td>
                                            <td width="8%">
                                                  <a href="<?php echo site_url('addgallery?id=' . $kdata->id) ?>" class="btn btn-info btn-sm" title="Edit"><i class="fas fa-edit" style="padding-right: 0;"></i></a>
                                                  <a href="<?php echo site_url('Gallery/delete?id=' . $kdata->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" title="Delete"><i class="fa fa-trash" style="padding-right: 0;"></i></a>
                                                   
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

    