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
                            <a class="btn btn-primary waves-effect waves-light" href="<?php echo site_url('addbanner'); ?>">
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
                                        <input class="form-control" name="txtsearch" type="text" value="<?php echo $txtsearch; ?>" placeholder="Search by  Banner Title" >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Submit
                                    </button>
                                    <a href="<?php echo site_url('listbanner');?>"><button type="button" class="btn btn-primary waves-effect waves-light mr-1"
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
                                            
                                            <th data-sortable="true" class="text-center">Banner Title</th>
                                            <th data-sortable="true" class="text-center">Banner Description</th>
                                            <th data-sortable="true" class="text-center">Image</th>
                                            <th data-sortable="true" class="text-center">Created</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                       helper('text');
                                        foreach($settingData as $kdata){ ?>
                                        <tr>
                                            <th class="text-center"scope="row"><?php echo ++$startLimit ; ?></th>
                                            
                                            <td class="text-center"><?php echo $kdata->banner_title; ?></td>
                                            <td class="text-center"><?php echo  character_limiter($kdata->banner_description,15); ?></td>
                                            <td class="text-center"><img src="<?php echo (isset($kdata->banner_image) && !empty($kdata->banner_image)) ? base_url('public/HomeBanner/').'/'.$kdata->banner_image : BLANK_IMG; ?>" id="display_image_here" style="height: 100px; width: 100px; " ></td> 
                                            <td class="text-center"><?php echo $kdata->created; ?></td>
                                            
                                            
                                            <td class="text-center"width="8%">
                                                  <a href="<?php echo site_url('addbanner?id=' . $kdata->id) ?>"  title="Edit" class="btn btn-info btn-sm
"><i class="fas fa-edit" style="padding-right: 0;"></i></a>
                                                  <a href="<?php echo site_url('HomeBanner/delete?id=' . $kdata->id) ?>" title="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" style="padding-right: 0;"></i></a>
                                                   
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

    