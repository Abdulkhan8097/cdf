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
                            <a class="btn btn-primary waves-effect waves-light" href="<?php echo site_url('newaccount'); ?>">
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
                                    <a href="<?php echo site_url('adminusers');?>"><button type="button" class="btn btn-primary waves-effect waves-light mr-1"
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
                                            <th data-sortable="true" class="text-center">Name</th>
                                            <th data-sortable="true" class="text-center">Phone</th>
                                            <th data-sortable="true" class="text-center">Users Role</th>
                                            <th data-sortable="true" class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                        foreach($salesData as $kdata){ ?>
                                        <tr>
                                            <th ><?php echo ++$startLimit ; ?></th>
                                            <td><?php echo $kdata->name ?></td>
                                            <td ><?php echo $kdata->phone; ?></td>
                                            <td ><?php echo $kdata->loginType; ?></td>
                                            <td ><?php echo $kdata->status == 1 ? "Active" : 'Inactive'; ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('previewuser?id=' . $kdata->id) ?>" class="btn btn-primary btn-sm" title="Details"><i class="fas fa-eye" style="padding-right: 0;"></i></a>
                                               
                                                    <a href="<?php echo site_url('editaccount?id=' . $kdata->id) ?>" title="Edit" class="btn btn-info btn-sm"><i class="fas fa-edit" style="padding-right: 0;"></i></a>
                                                
                                                    <a href="<?php echo site_url('delaccount?id=' . $kdata->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" title="Delete"><i class="fa fa-trash" style="padding-right: 0;"></i></a>
                                                
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

    