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

                
            </div>
            <?php echo view('admin/_enquirysearch'); ?>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <?php echo view('admin/_topmessage'); ?>
                        <div class="card-body">
                       
                        <?php if($pagination["getNbResults"] >0 ){ ?>
                            <div class="table-responsive">
                                 <table data-toggle="table" data-striped="true" class="table table-hover table-centered table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center" data-sortable="true">S No.</th>
                                            <th class="text-center" data-sortable="true" onclick="sortTable(1)"> Name</th>
                                            <th class="text-center" data-sortable="true">Mobile</th>
                                            <th class="text-center" data-sortable="true">Email</th>
                                            <th class="text-center" data-sortable="true">Description</th>
                                            <th class="text-center" data-sortable="true">Date</th>
                                            <th class="text-center" data-sortable="true">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                      helper('text');
                                        foreach($salesData as $kdata){ ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$startLimit ; ?></td>
                                            <td class="text-center"><?php echo $kdata->name; ?></td>
                                            <td class="text-center"><?php echo $kdata->phone; ?></td>
                                            <td class="text-center"><?php echo $kdata->email; ?></td>
                                            <td class="text-center"><?php echo character_limiter($kdata->description,30); ?></td>
                                            <td class="text-center"><?php echo $kdata->created; ?></td>
                                            <td class="text-center" width="8%">
                                                 <a href="<?php echo site_url('viewenqury?id=' . $kdata->id) ?>" class="btn btn-info btn-sm" title="Edit"><i class="fas fa-edit" style="padding-right: 0;"></i></a>
                                                    <a href="<?php echo site_url('delenquiry?id=' . $kdata->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" title="Delete"><i class="fa fa-trash" style="padding-right: 0;"></i></a>
                                                
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

    