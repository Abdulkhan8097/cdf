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
                            <h2 class="mb-4">Enqury Details</h2>
                            <table class="table table-striped table-bordered m-top20">
                     <tbody>
                        <tr>
                           <th>Name</th>
                           <td><?php echo $userdetails->name;?></td>
                        </tr>
                          <tr>
                           <th>Email</th>
                           <td><?php echo $userdetails->email;?></td>
                        </tr>
                          <tr>
                           <th>Mobile No.</th>
                           <td><?php echo $userdetails->phone;?></td>
                        </tr>
                          <tr>
                           <th>Description</th>
                           <td><?php echo $userdetails->description;?></td>
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

