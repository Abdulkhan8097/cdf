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
                            <h2 class="mb-4">Customer Details</h2>
                            <table class="table table-striped table-bordered m-top20">
                     <tbody>
                           <tr>
                           <th>Donation ID / Transaction No.</th>
                           <td><?php echo $userdetails->donation_id;?></td>
                        </tr>
                        <tr>
                           <th>Receipt no</th>
                           <td><?php echo $userdetails->receipt_no;?></td>
                        </tr>
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
                           <th>Citizenship</th>
                           <td><?php echo $userdetails->citizenship;?></td>
                        </tr>
                          <tr>
                           <th>Address</th>
                           <td><?php echo $userdetails->address;?></td>
                        </tr>
                        
                          <tr>
                           <th>Pan/Adhar Card no.</th>
                           <td><?php echo $userdetails->pan_no;?></td>
                        </tr>
                          <tr>
                           <th>Date of birth</th>
                           <td><?php echo $userdetails->date_of_birth;?></td>
                        </tr>
                          <tr>
                           <th>Donation Amount</th>
                           <td><?php echo $userdetails->donation_amount;?></td>
                        </tr>
                         <tr>
                           <th>Payment Type</th>
                           <td><?php echo $userdetails->payment_type;?></td>
                        </tr>
                        <tr>
                           <th>Payment Status</th>
                           <td><?php echo $userdetails->payment_status;?></td>
                        </tr>
                        <tr>
                           <th>BANK_REF_NUM</th>
                           <td><?php echo $userdetails->bank_ref_num;?></td>
                        </tr>
                      <!--   <tr>
                           <th>Bank Code</th>
                           <td><?php //echo $userdetails->bankcode;?></td>
                        </tr> -->
                       
                        <tr>
                           <th>Customer Name</th>
                           <td><?php echo $userdetails->field4;?></td>
                        </tr>
                        <tr>
                           <th>Customer Payment Type</th>
                           <td><?php echo $userdetails->field8;?></td>
                        </tr>
                         <tr>
                           <th>Gateway Payment Mode</th>
                           <td><?php echo $userdetails->mode;?></td>
                        </tr>
                        <tr>
                           <th>Manual Payment Mode</th>

                           <td><?php echo isset($paymentMode[$userdetails->payment_mode]) ?$paymentMode[$userdetails->payment_mode]:'';?></td>
                        </tr>
                        <tr>
                           <th>Customer ID</th>
                           <td><?php echo $userdetails->field3;?></td>
                        </tr>
                        <tr>
                           <th>Unmapped Status</th>
                           <td><?php echo $userdetails->unmappedstatus;?></td>
                        </tr>
                        <tr>
                           <th>ERROR_MESSAGE</th>
                           <td><?php echo $userdetails->error_Message;?></td>
                        </tr>
                         <?php   if(!empty($userRef)) {?> 
                        <tr>
                           <th>Reference Name</th>
                           <td><?php echo $userRef;?></td>
                        </tr>
                    <?php } ?>
                        <?php   if(intval($caseData)>0) {?>  
                        <tr>

                           <th>Emergency Case Title</th>
                           <td><b><?php echo $caseData[0]['title'];?></b></td>
                        </tr>
                        <tr>

                           <th>Emergency Case Image</th>
                           <td><img src="<?php echo (isset($caseData[0]['image_name']) && !empty($caseData[0]['image_name'])) ? base_url('public/Cases').'/'.$caseData[0]['image_name'] : BLANK_IMG; ?>" style="height: 150px; width: 150px;" ></td>
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

<script>
function delFile(id, filetype) {
    if (confirm("Are you sure?")) {
        $.ajax({
            url: "<?php echo site_url('deluserfile'); ?>",
            data: {
                id: id,
                filetype: filetype
            },
            success: function(data, status) {
                var data1 = JSON.parse(data);
                if (data1.status) {
                    $("#" + filetype).html("");
                }
            }
        });

    }


}

function showhideChanelpartner() {
    if ($('#user_type').val() == "channelpartnerstudio") {
        $('#chanelpartnerbox').css("display", "block")
        $('#partnerlevelbox').css("display", "none")
        $('#divdocuments').css("display", "none");

    } else if ($('#user_type').val() == "channelpartner") {
        $('#chanelpartnerbox').css("display", "none");
        $('#partnerlevelbox').css("display", "block");
        $('#divdocuments').css("display", "none");
    } else {
        $('#chanelpartnerbox').css("display", "none");
        $('#partnerlevelbox').css("display", "none");
        $('#divdocuments').css("display", "block");
    }
}

function getCity() {
    var stid = $('#state').val();
    var district = $('#district').val();

    // get cities of state
    $.ajax({
        url: "<?php echo site_url('getcity'); ?>",
        data: {
            stid: stid,
            district: district
        },
        success: function(data, status) {
            var data1 = JSON.parse(data);

            var citiesstr;
            citiesstr =
                '<select name="city" class="form-control form-control-lg"><option value=""> -Select City -</option>';
            if (data1.status) {
                for (i = 0; i < data1.cities.length; i++) {
                    citiesstr += '<option value="' + data1.cities[i].ct_id + '">' + data1.cities[i]
                        .ct_name + '</option>';
                }
            }

            citiesstr += "</select>";
            $("#citybox").html(citiesstr);

        }
    });




}

function getDistrict() {
    var stid = $('#state').val();
    // get distric of state
    $.ajax({
        url: "<?php echo site_url('getdistric'); ?>",
        data: {
            stid: stid
        },
        success: function(data, status) {
            var data1 = JSON.parse(data);

            var districsstr;
            districsstr =
                '<select name="district" id="district" class="form-control form-control-lg" onChange="getCity();"><option value=""> -Select Distric -</option>';
            if (data1.status) {
                for (i = 0; i < data1.districs.length; i++) {
                    districsstr += '<option value="' + data1.districs[i].ds_id + '">' + data1.districs[i]
                        .ds_name + '</option>';
                }
            }

            districsstr += "</select>";
            //  console.log(districsstr);
            $("#districbox").html(districsstr);

        }
    });

    getCity();

}
</script>