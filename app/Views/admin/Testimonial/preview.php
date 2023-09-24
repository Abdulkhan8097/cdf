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
                            <h2 class="mb-4">Details</h2>
                          
                            <table class="table table-striped table-bordered m-top20">
                     <tbody>
                     	<tr>
                           <th>Testimonial Name</th>
                                                                  
                        <td><?php echo $userdetails->ts_name;?></td>
                                     
                        
                        </tr>
                        <tr>
                           <th>Testimonial Description</th>
                           <td><?php echo $userdetails->ts_content;?></td>
                        </tr>
                        
                           <tr>
                           <th>Image</th>
                           <td><img src="<?php echo (isset($userdetails->ts_image) && !empty($userdetails->ts_image)) ? base_url('public/Testimonial/').'/'.$userdetails->ts_image : BLANK_IMG; ?>" style="height: 100px; width: 100px;" ></td>
                        </tr>
                          <tr>
                           <th>Created</th>
                           <td><?php echo $userdetails->ts_created;?></td>
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

