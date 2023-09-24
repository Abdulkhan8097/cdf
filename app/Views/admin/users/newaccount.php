   <?php 
 $session = session();
$admin_type = $session->get('type');
    ?>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <h2 class="pb-4">New Donor Record</h2>
                                <form class="custom-validation" method='post'
                                    action="<?php echo site_url('adduser'); ?>" enctype='multipart/form-data'>

                                    <?php echo view('admin/_topmessage'); ?>

                                    <div class="row  form-group">
                                        <div class="col-lg-5 ">
                                            <label>Reciept Date</label>
                                            <input type="date" id="topic_date" class="form-control form-control-lg" required placeholder="" name="create_at" value="" />
                                        </div>
                                        <div class="col-lg-5 ">
                                            <label>Receipt Number</label>
                                            <input type="text" class="form-control form-control-lg"  placeholder="Enter Receipt Number" name="name" value="" />
                                        </div>
                                    </div>
                                    <div class="row  form-group">
                                        <div class="col-lg-5 ">
                                            <label>Donor Name</label>
                                            <input type="text" class="form-control form-control-lg" required placeholder="Enter Donor Name" name="name" value="" />
                                        </div>
                                        <div class="col-lg-5">
                                            <label>Payment Status</label>
                                            <select name="payment_status" class="form-control form-control-lg" required>
                                            <option style="color: green;" value="Success"
                                            >Success</option>
                                            <option  style="color:#000080;" value="Pending">Pending</option>

                                            <option style="color: red;" value="Failed"
                                            >Failed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row  form-group">
                                        <div class="col-lg-5 ">
                                            <label>Transaction ID</label>
                                            <input type="text" class="form-control form-control-lg"  placeholder="Enter Transaction ID" name="txnid" value="" />
                                        </div>
                                        <div class="col-lg-5">
                                            <label>Reference id</label>
                                            <input type="text" class="form-control form-control-lg"  placeholder="Enter Reference ID" name="bank_ref_num" value="" />
                                        </div>
                                    </div>
                                    <div class="row  form-group">
                                        <div class="col-lg-5">
                                            <label>E-Mail</label>
                                            <input type="email" class="form-control form-control-lg" required  parsley-type="email" placeholder="Enter E-Mail" name="email" value="" />
                                        </div>
                                        <div class="col-lg-5">
                                            <label>Mobile Number</label>
                                            <input data-parsley-type="digits" onkeypress="numericFilter(this)" type="text" class="form-control form-control-lg" required maxlength="10"  minlength="10" placeholder=" Mobile Number"name="phone" value="" />
                                        </div>
                                    </div>
                                    <div class="row  form-group">
                                        <div class="col-lg-5">
                                            <label>Citizenship</label>
                                            <select class="form-control form-control-lg"name="citizenship" required><br />
                                            <option value="">None</option><br />
                                            <option value="Indian Citizen">Indian Citizen</option><br />
                                            <option value="Foreign Citizen" disabled="">Foreign Citizen</option><br />
                                            </select>
                                        </div>
                                        <div class="col-lg-5">
                                            <label>Pan no/Adhar Card no</label>
                                            <input type="text" class="form-control form-control-lg"
                                            placeholder=" Pan Number/Adhar Card Number" value=""
                                            name="pan_no"/>
                                        </div>
                                    </div>
                                    <div class="row  form-group">
                                        <div class="col-lg-5">
                                            <label>Donation Amount</label>
                                            <input type="text" class="form-control form-control-lg" 
                                            placeholder="Enter Amount"  onkeypress="numericFilter(this)" name="donation_amount" required  value=""  />
                                        </div>
                                        <div class="col-lg-5">
                                            <label>Date of birth</label>
                                            <input type="date" class="form-control form-control-lg" 
                                            placeholder="" value=""
                                            name="date_of_birth" />
                                        </div>
                                    </div>
                                    <div class="row  form-group">
                                        <div class="col-lg-5">
                                            <label>Cases Reference</label>
                                            <select name="cases_id" class="form-control form-control-lg" >
                                            <option selected value=""><--Select Cases Reference--></option>
                                            <?php if(isset($ref_cases) && !empty($ref_cases)){
                                            foreach ($ref_cases as $key => $value) {
                                            ?>
                                            <option value="<?php echo $value['id']; ?>" <?php echo (isset($userdetails) && !empty($userdetails) && $userdetails['cases_id']==$value['id']) ? 'selected' : ''; ?>>
                                            <?php echo $value['title']; ?> 
                                            </option>
                                            <?php }
                                            } ?>          
                                            </select>
                                        </div>
                                        <div class="col-lg-5">
                                            <label>Payment Mode</label>
                                            <select name="payment_mode" class="form-control form-control-lg" required>
                                            <option value=""> -Status -</option>
                                            <?php foreach($paymentMode as $key=>$value){ ?>
                                            <option value="<?php echo $key;?>"> <?php echo $value; ?> </option>
                                            <?php } ?>
                                            </select>
                                        </div>    
                                    </div>
                                    <?php if($admin_type=='admin'){ ?>
                                    <div class="row  form-group">
                                    <div class="col-lg-5">
                                        <label>Reference Name</label>
                                        <select class="form-control form-control-lg" name="branch_data">
                                        <option selected><--Head Office--></option>
                                        <?php if(isset($branches) && !empty($branches)){
                                            foreach ($branches as $key => $value) {
                                            ?>
                                            <option value="<?php echo $value['id']; ?>">
                                            <?php echo $value['name']; ?> 
                                            </option>
                                            <?php }
                                            } ?>  
                              
                                        </select>
                                        </div>
                                    </div>
                                    <?php }?>
                                    <div class="row  form-group">
                                        <div class="col-lg-10">
                                            <label>Address</label>
                                            <textarea class="form-control form-control-lg"  name="address" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row  form-group">
                                        <div class="col-5 ">
                                        <?php if($admin_type=='editor'){ ?>
                                                <input type="hidden" name="editor" value="manual">
                                            <?php } ?>
                                            <button type="submit"
                                            class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1">
                                            Submit
                                            </button>
                                        </div>
                                        <div class="col-5 ">
                                            <a href="<?php echo site_url("users");?>"
                                            class="btn btn-lg btn-block btn-secondary waves-effect"> Cancel </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->




 <script>
   function numericFilter(txb) {
       txb.value = txb.value.replace(/[^\0-9]/ig, "");
   }
</script> 

