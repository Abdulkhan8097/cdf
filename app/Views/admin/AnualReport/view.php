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
                            <h2 class="mb-4">Blog Details</h2>
                            <table class="table table-striped table-bordered m-top20">
                     <tbody>
                         <tr>
                           <th>Blog Status</th>
                           <td><?php echo $userdetails['status']==1? "Active" : 'Inactive';?></td>
                        </tr>
                        <tr>
                           <th>Title</th>
                           <td><?php echo $userdetails['title'];?> <?php echo $userdetails['lname'];?></td>
                        </tr>
                       
                          <tr>
                           <th>Description</th>
                           <td><?php echo $userdetails['description'];?></td>
                        </tr>
                          <tr>
                           <th>Author Name</th>
                           <td><?php echo $userdetails['author_name'];?></td>
                        </tr>
                        <tr>
                           <th>Image</th>
                           <td><img src="<?php echo (isset($userdetails['image']) && !empty($userdetails['image'])) ? base_url('public/Blog/').'/'.$userdetails['image'] : BLANK_IMG; ?>" id="display_image_here" style="height: 100px; width: 100px; " ></td>
                        </tr>
                       
                       
                          
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
