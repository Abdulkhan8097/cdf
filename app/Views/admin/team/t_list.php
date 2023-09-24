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
                            <a class="btn btn-primary waves-effect waves-light" href="<?php echo site_url('addteam'); ?>">
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
                                        <input class="form-control" name="txtsearch" type="text" value="<?php echo $txtsearch; ?>" placeholder="Search by  name, phone" >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Submit
                                    </button>
                                    <a href="<?php echo site_url('viewteam');?>"><button type="button" class="btn btn-primary waves-effect waves-light mr-1"
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
                                            <th data-sortable="true" class="text-center">Name</th>
                                            
                                            <th data-sortable="true" class="text-center">E-mail</th>
                                            
                                            <th data-sortable="true" class="text-center">Phone Number</th>
                                             <th data-sortable="true" class="text-center">Purpose</th>
                                            
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                       
                                        foreach($list as $kdata){ helper('text');?>
                                        <tr>
                                            <th class="text-center"scope="row"><?php echo ++$startLimit ; ?></th>                           
                                            <th class="text-center"scope="row"><?php echo $kdata->team_name ?></th>
                                            <th class="text-center"scope="row"><?php echo $kdata->team_email?></th>
                                            <th class="text-center"scope="row"><?php echo $kdata->mob_number; ?></th>                           
                                             <th class="text-center"scope="row"><?php echo $kdata->team_purpose; ?></th>
                                            
                                           
                                            
                                            
                                            <td class="text-center"width="8%">
                                                 <a title="View Details"href="<?php echo site_url('previewteam?id=' . $kdata->team_id) ?>" class="btn btn-primary btn-sm" title="Details"><i class="fas fa-eye" ></i></a>

                                            

                                                  <a href="<?php echo site_url('addteam?id=' . $kdata->team_id) ?>" title="Edit" class="btn btn btn-info btn-sm"><i class="fas fa-edit" style="padding-right: 0;"></i></a>

                                                  <a href="<?php echo site_url('Team/delete?id=' . $kdata->team_id) ?>" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" style="padding-right: 0;"></i></a>
                                                   
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

    