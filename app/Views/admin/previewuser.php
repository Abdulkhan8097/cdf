<style type="text/css">
    .card{
        border-radius: 2.75rem!important;
    }
    .table-bordered td, .table-bordered th{
    border: 2px solid #e9ecef !important;
    }
</style>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <h2 class="mb-4">User Details</h2>
                            <table class="table table-striped table-bordered m-top20">
                     <tbody>
                        <tr>
                           <th>User Name</th>
                           <td><?php echo $userdetails['name'];?></td>
                        </tr>
                        <tr>
                           <th>User Status</th>
                           <td><?php echo $userdetails['status']==1? "Active" : 'Inactive';?></td>
                        </tr>
                          <tr>
                           <th>Email</th>
                           <td><?php echo $userdetails['email'];?></td>
                        </tr>
                          <tr>
                           <th>Mobile No.</th>
                           <td><?php echo $userdetails['phone'];?></td>
                        </tr>
                         <tr>
                           <th>User Type</th>
                           <td><?php echo $userdetails['loginType'];?></td>
                        </tr>
                        <?php if($userdetails['loginType']=='branch'){ ?>
                         <tr>
                           <th>Refer URL</th>
                           <td><a href="<?php echo base_url('?refid='.$userdetails['uniqueKey']);?>"><?php echo base_url('?refid='.$userdetails['uniqueKey']);?></a></td>
                        </tr>
                    <?php } ?>
                          
                     </tbody>
                  </table>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
