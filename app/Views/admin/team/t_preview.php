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
                                                                  
                        <td><?php echo $userdetails->team_name;?></td>
                                     
                        
                        </tr>
                        <tr>
                           <th>E-mail</th>
                           <td><?php echo $userdetails->team_email;?></td>
                        </tr>
                        <tr>
                           <th>Mobile Number</th>
                           <td><?php echo $userdetails->mob_number;?></td>
                        </tr>
                        <tr>
                           <th>Purpose</th>
                                                                  
                        <td><?php echo $userdetails->team_purpose;?></td>
                                     
                        
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

