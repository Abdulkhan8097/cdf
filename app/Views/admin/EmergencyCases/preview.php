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
                            <h2 class="mb-4">Cases Details</h2>
                          
                            <table class="table table-striped table-bordered m-top20">
                     <tbody>
                     	<tr>
                           <th>Cases Name</th>
                             <?php if($userdetails->cases_name=='1'){ ?>                                           
                                            <td><?php echo 'Emergency Cases' ?></td>
                                        <?php }elseif($userdetails->cases_name=='2') {?>
                                            <td><?php echo 'Success Cases' ?></td>
                                           
                                        <?php }elseif($userdetails->cases_name=='') {?>
                                            <td><?php echo '' ?></td>
                                            
                                       <?php  }?> 
                        
                        </tr>
                        <tr>
                           <th>Cases Status</th>
                             <?php if($userdetails->status=='1'){ ?>                                           
                                            <td><?php echo 'Active' ?></td>
                                        <?php }elseif($userdetails->status=='0') {?>
                                            <td><?php echo 'Inactive' ?></td>
                                           
                                        <?php }elseif($userdetails->status=='') {?>
                                            <td><?php echo '' ?></td>
                                            
                                       <?php  }?> 
                        
                        </tr>
                        
                        <tr>
                           <th>Title</th>
                           <td><?php echo $userdetails->title;?></td>
                        </tr>
                          <tr>
                           <th>Description</th>
                           <td><?php echo $userdetails->description;?></td>
                        </tr>
                          <tr>
                           <th>Reach</th>
                           <td><?php echo $userdetails->reach;?></td>
                        </tr>
                          <tr>
                           <th>Goal </th>
                           <td><?php echo $userdetails->goal ;?></td>
                        </tr>
                          <tr>
                           <th>Details Description</th>
                           <td><?php echo $userdetails->details_description;?></td>
                        </tr>
                           <tr>
                           <th>Image</th>
                           <td><img src="<?php echo (isset($userdetails->image_name) && !empty($userdetails->image_name)) ? CASES_DISPLAY_PATH_NAME.$userdetails->image_name : BLANK_IMG; ?>" style="height: 100px; width: 100px;" ></td>
                        </tr>
                          <tr>
                           <th>Created</th>
                           <td><?php echo $userdetails->created;?></td>
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

