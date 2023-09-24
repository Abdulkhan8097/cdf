
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php 
 $session = session();
$admin_type = $session->get('type');
$admin_id = $session->get('id');
    ?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <h2 class="mb-4">Update Donor Record</h2>
                                <form class="custom-validation" method='post' id="form"  action="<?php echo site_url('updateuser'); ?>"
                                    enctype='multipart/form-data'>

                                    <?php echo view('admin/_topmessage'); ?>

                                        <div class="row  form-group">
                                        <div class="col-lg-5 ">

                                            <label>Change Date</label>
                                            <input type="date"  class="form-control form-control-lg"   name="create_at" value="<?php echo $userdetails['create_at'] ? date('Y-m-d',strtotime($userdetails['create_at'])) : ''; ?>" />

                                        </div>
                                    
                                        <div class="col-lg-5 ">

                                <label>Receipt No</label>
                                <input type="text" class="form-control form-control-lg"  placeholder="" name="receipt_no" value="<?php echo $userdetails['receipt_no']; ?>" />

                                </div>

                                    </div>
                                    
                                    <div class="row  form-group">
                                        <div class="col-lg-5 ">

                                            <label>Donor Name</label>
                                            <input type="text" class="form-control form-control-lg" required placeholder="" name="name" value="<?php echo $userdetails['name']; ?>" />

                                        </div>
                                        <div class="col-lg-5">

                                            <label>Payment Status</label>

                                            <select name="payment_status" class="form-control form-control-lg" required>
                                                <option value=""> -Status -</option>
                                                <option  style="color:#000080;" value="Pending"
                                                    <?php echo ($userdetails['payment_status'] =="Pending") ? "selected" : ''; ?>>
                                                    Pending</option>
                                                <option style="color: green;" value="Success"
                                                    <?php echo ($userdetails['payment_status'] =="Success") ? "selected" : ''; ?>>Success</option>
                                                    <option style="color: red;" value="Failed"
                                                    <?php echo ($userdetails['payment_status'] =="Failed") ? "selected" : ''; ?>>Failed</option>

                                            </select>


                                        </div>

                                    </div>
                                    <div class="row  form-group">
                                        <div class="col-lg-5 ">

                                            <label>Donation ID / Transaction No.</label>
                                            <input type="text" class="form-control form-control-lg"  placeholder="Enter Transaction ID" value="<?php echo $userdetails["donation_id"]; ?>" name="txnid" value="" />

                                        </div>
                                        <div class="col-lg-5">
                                            <label>Reference id</label>
                                            <input type="text" class="form-control form-control-lg"  placeholder="Enter Reference ID" name="bank_ref_num" value="<?php echo $userdetails["bank_ref_num"]; ?>" />

                                        </div>

                                    </div>
                                    <div class="row  form-group">

                                        <div class="col-lg-5">

                                            <label>E-Mail</label>

                                            <input type="email" class="form-control form-control-lg" required
                                                parsley-type="email" placeholder="" name="email" value="<?php echo $userdetails['email']; ?>" />

                                        </div>
                                        <div class="col-lg-5">

                                            <label>Mobile Number</label>

                                            <input data-parsley-type="digits" type="number" class="form-control form-control-lg" required maxlength="10" placeholder=""name="phone" value="<?php echo $userdetails['phone']; ?>" />


                                        </div>
                                    </div>
                                    <div class="row  form-group">
                                        <div class="col-lg-5">
                                            <label>Citizenship</label>

                                            <input type="text" class="form-control form-control-lg" placeholder="" value="<?php echo $userdetails["citizenship"]; ?>" name="citizenship" required/>
                                        </div>
                                        <div class="col-lg-5">
                                            <label>Pan no/Adhar Card no</label>

                                            <input type="text" class="form-control form-control-lg"
                                                placeholder=" Pan Number/Adhar Card Number"
                                                name="pan_no" value="<?php echo $userdetails["pan_no"]; ?>"  />
                                        </div>
                                    </div>
                                    <div class="row  form-group">
                                        <div class="col-lg-5">
                                            <label>Donation Amount</label>

                                            <input type="text" class="form-control form-control-lg" 
                                                placeholder="Enter Amount"  name="donation_amount" required  onkeypress="numericFilter(this)" value="<?php echo $userdetails["donation_amount"]; ?>"  />
                                            <!--   id="currency-field"
                                                data-type="currency" -->
                                                <!-- pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" -->
                                        </div>
                                        <div class="col-lg-5">
                                            <label>Date of birth</label>

                                            <input type="date" class="form-control form-control-lg" 
                                                placeholder="" value="<?php echo $userdetails['date_of_birth'] ? date('Y-m-d',strtotime($userdetails['date_of_birth'])) : ''; ?>"
                                                name="date_of_birth" />
                                        </div>
                                    </div>
                                    <div class="row  form-group">
                                            <div class="col-lg-5">

                                            <label>Cases Reference</label>

                                            <select name="cases_id" class="form-control form-control-lg" >
                                    <option selected value="" ><--Select Cases Reference--></option>
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
                                            <option value="<?php echo $key;?>" <?php if($key == $userdetails['payment_mode']){ echo "selected"; }?>> <?php echo $value; ?> </option>
                                            <?php } ?>

                                    </select>


                                    </div>
                                    </div>
                                    <?php if($admin_type=='admin'){?>
                                    <div class="row  form-group">
                                    <div class="col-lg-5">
                                        <label>Reference Name</label>
                                        <select class="form-control form-control-lg" name="branch_data">
                                        <option selected><--Head Office--></option>
                                        <?php if(isset($branches) && !empty($branches)){
                                            foreach ($branches as $key => $value) {
                                            ?>
                                            <option value="<?php echo $value['id']; ?>" <?php echo (isset($userdetails) && !empty($userdetails) && $userdetails['admin_id']==$value['id']) ? 'selected' : ''; ?>>
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

                                        <textarea class="form-control form-control-lg"  name="address" required><?php echo $userdetails["address"]; ?></textarea>
                                        </div>

                                        </div>
                                
                                    <div class="row  form-group">

                                        <div class="col-lg-5">
                                        <input type="hidden" name="id" value="<?php echo $userdetails["id"]; ?>">
                                        <?php if($admin_type=='editor'){ ?>
                                                    <input type="hidden" name="editor" value="manual">
                                                <?php } ?>
                                            <button type="submit"
                                                class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1">
                                                Submit
                                            </button>
                                        </div>
                                        <div class="col-lg-5">
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

<!-- filter amount -->
<script type="text/javascript">
    $(document).ready(function() {
  $('#form').submit(function(e) {
    // Get the updated receipt number
    var newReceiptNo = $('#receipt_no').val();

    // Update the receipt number in the userdetails object
    userdetails.receipt_no = newReceiptNo;

    // Update the value of the receipt number input field
    $('#receipt_no').val(newReceiptNo);

    // Allow the form submission to proceed
    return true;
  });
});
</script>
<script type="text/javascript">
    $("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}

function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "" + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "" + input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += "";
      // input_val += ".00";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}
</script>
<script>
    $(document).ready(function() {
  $('#your_form_id').submit(function(e) {
    // Prevent form submission
    e.preventDefault();

    // Get the updated receipt number
    var newReceiptNo = $('#receipt_no').val();

    // Update the receipt number in the userdetails object
    userdetails.receipt_no = newReceiptNo;

    // Submit the form
    $(this).unbind('submit').submit();
  });
});
</script>
<script>
   function numericFilter(txb) {
       txb.value = txb.value.replace(/[^\0-9]/ig, "");
   }
</script> 

