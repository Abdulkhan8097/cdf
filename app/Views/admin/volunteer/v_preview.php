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
                           <th>Name</th>
                                                                  
                        <td><?php echo $userdetails->volunteer_name;?></td>
                                     
                        
                        </tr>
                        <tr>
                           <th>E-mail</th>
                           <td><?php echo $userdetails->volunteer_email;?></td>
                        </tr>
                        <tr>
                           <th>Mobile Number</th>
                           <td><?php echo $userdetails->mob_number;?></td>
                        </tr>
                        <tr>
                           <th>Gender</th>
                           <td><?php echo $userdetails->volunteer_gender;?></td>
                        </tr>
                        <tr>
                           <th>Address</th>
                           <td><?php echo $userdetails->volunteer_address;?></td>
                        </tr>
                        <tr>
                           <th>Pin-Code</th>
                           <td><?php echo $userdetails->v_pincode;?></td>
                        </tr>
                        <tr>
                           <th>City</th>
                           <td><?php echo $userdetails->v_city;?></td>
                        </tr>
                        <tr>
                           <th>Message</th>
                           <td><?php echo $userdetails->volunteer_message;?></td>
                        </tr>
                        <?php  if (isset($userdetails->doc_upload) && !empty($userdetails->doc_upload)) { ?>  
                             
                        <tr>

                           <th>Document file</th>
                           <td><?php  echo "<a id='del' target='_blank' href='".base_url('public/Volunteer/').'/'.$userdetails->doc_upload."' >".$userdetails->doc_upload." </a> <br><br>";
 ?></td>
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

