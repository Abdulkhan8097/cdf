


  <div class='container' style="border:1px dotted;padding:10px">




    <table class="table table-responsive" style="width:1300px; height: 600px;">

      <tr class="">
        <td> <img src="https://www.kokanngo.org/public/website/images/cropped-Logo-1.png"> &nbsp; &nbsp;&nbsp;
          &nbsp;&nbsp; &nbsp; </td>
        <td>
          <h1 style="font-size:47px;text-align: right;font-family: Helvetica, sans-serif; font-weight:bold">COSMOLOGICAL DEVELOPMENT FOUNDATION</h1><br>
          <p style="text-align: justify;font-size:28px; word-spacing: 18px;font-family: Helvetica, sans-serif; ">&nbsp; &nbsp;&nbsp;Regd
          Regd under Maharashtra Public Trust Act, 1950.</p><br>
          <p style="text-align: justify;font-size:30px; word-spacing: 6px;font-family: Helvetica, sans-serif; ">PAN No.: AAICC4235G &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
          &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          &nbsp;&nbsp;Regd No. U85300MH2019NPL331675</p>
        </td>
      </tr>
    </table>
    <hr>

    <table class="table table-responsive " style="width:1000px; height: 500px; ">

      <tr>
        <td><span style="font-weight: bold;font-size:23px;font-family: Helvetica, sans-serif;">Receipt No .:
            </span><span style=" font-size:23px;font-family: Helvetica, sans-serif;">
            <?php echo $list[0]['receipt_no']; ?>
          </span>
        </td>
        <td style="width:33%;"><span style="font-weight: bold;font-size:23px;font-family: Helvetica, sans-serif;">Date :
          </span><span style=" font-size:23px;font-family: Helvetica, sans-serif;">
            <?php echo date('d F Y', strtotime($list[0]['create_at'])) ?> 
          </span></td>
      </tr>

    </table>
    <br>
    <table class="table table-responsive " style="width:1000px; height: 500px; ">
      <tr>

        <td><span style="font-weight: bold;font-size:23px;font-family: Helvetica, sans-serif;">Donation Id :</span><span
            style=" font-size:23px;font-family: Helvetica, sans-serif;">
            <?php echo $list[0]['donation_id']; ?>
          </span>
        </td>
             <td style="width:33%;"><span style="font-weight: bold;font-size:23px;font-family: Helvetica, sans-serif;">Ref Id
              : </span><span style=" font-size:23px;font-family: Helvetica, sans-serif;">
              <?php echo $list[0]['bank_ref_num']; ?>
            </span></td>
      
         
      
      </tr>
    </table>
    <br>
    <br>
    <table width="100%" >
      <tr>

        <td><span style="font-weight: bold;font-size:16px;font-family: Helvetica, sans-serif;">M/s / Ms. / Mr. :
            </span></td>

          <td style="border-bottom:2px dotted; width:79%"><span style=" font-size:16px;font-family: Helvetica, sans-serif;text-transform: uppercase; ">
            <?php echo $list[0]['name']; ?>
          </span></td>

      </tr>
    </table>

    <br>

    <table width="100%" >

      <tr>
        <td style="font-weight: bold; font-size:16px;font-family: Helvetica, sans-serif;">Transaction Through :
          
        </td>
        <td style="border-bottom:2px dotted; width:69%">
<span style=" font-size:16px;font-family: Helvetica, sans-serif;text-transform: uppercase; ">
           <?php if ($list[0]['payment_source'] != '') { ?>

            <?php echo $list[0]['payment_source']; ?>
          <?php } else  { ?>
          
            <?php echo $list[0]['payment_mode']; ?>
            
          <?php } ?>
          </span>

        </td>
        

      </tr>
    </table>

    <br>
    <table width="100% ">


      <tr>
        <td ><span style="font-weight: bold;font-size:16px;font-family: Helvetica, sans-serif;">The Sum of Rupees
            :</span>
        </td>
        <td style="border-bottom:2px dotted; width:72%"><span style=" font-size:16px;font-family: Helvetica, sans-serif;">
            <?php echo $amt; ?>
          </span>
        </td>

      </tr>
    </table>
    <br>
    <table width="100% ">

      <tr>
        <td><span style="font-weight: bold;font-size:16px;font-family: Helvetica, sans-serif;">Address :</span></td>

          <td style="border-bottom:2px dotted; width:87%"><span style=" font-size:16px;font-family: Helvetica, sans-serif;">
            <?php echo $list[0]['address']; ?>
          </span></td>

      </tr>
    </table>
    <br> <br>
    

    <table style="width:1000px; height: 500px; ">
      <tr>
        <td><span style="font-weight: bold;font-size:23px;font-family: Helvetica, sans-serif;">Mob .:</span>
        <span 
            style=" font-size:23px;font-family: Helvetica, sans-serif;border-bottom:2px dotted;">
            <?php echo $list[0]['phone']; ?>
          </span>
        </td>
        <td style="width:35%;"><span style="font-weight: bold;font-size:23px;font-family: Helvetica, sans-serif;">Email
            :</span>
            <span style=" font-size:23px;font-family: Helvetica, sans-serif;border-bottom:2px dotted;">
            <?php echo $list[0]['email']; ?>
          </span></td>
      </tr>
    </table>
    <br>
    <table class="table table-responsive " style="width:1000px; height: 500px; ">

      <tr>
        <td><span style="font-weight: bold;font-size:23px;font-family: Helvetica, sans-serif;">PAN No .:</span>
        <span
            style=" font-size:23px;font-family: Helvetica, sans-serif;text-transform: uppercase;border-bottom:2px dotted;">
            <?php echo $list[0]['pan_no']; ?>
          </span>
        </td>
        <td style="width:35%;"><span style="font-weight: bold;font-size:23px;font-family: Helvetica, sans-serif;">DOB
            :</span><span style=" font-size:23px;font-family: Helvetica, sans-serif;border-bottom:2px dotted; width:20px">
            <?php
$dateOfBirth = $list[0]['date_of_birth']; // Assuming you have the date of birth value

if (!empty($dateOfBirth)) {
    $formattedDate = date('d F, Y', strtotime($dateOfBirth));
    echo ' ' . $formattedDate;
}
?>

       </span></td> 
      </tr>
    </table>
    <br>


    
    
    
<div >
  <div style="width: 40%;float: left;">
  
  <img src="https://www.kokanngo.org/public/website/images/Group_32.png" style="width:20% ; margin-top:17px;">

  <div style="margin-top:-44.5px;margin-left:52px; border:2px solid #837D7D; padding:7px; border-radius:0px 20px 20px 0px; width:45%;font-size:20px"><?php echo $list[0]['donation_amount']; ?></div>
 
 
          <p style="font-size:15px;font-family: Arial, sans-serif;margin-left:40px;">50% tax exemption
          </p>
  </div>

  <div style="width: 60%;float: right;">
  <p style=" font-family: Arial, sans-serif;font-size:15px;font-weight:bold;margin-left:35px">COSMOLOGICAL DEVELOPMENT FOUNDATION</p>
         
  </div>

  <img  style="width:15%;float:right;margin-right:25px;margin-top:-10px;"  src="https://www.kokanngo.org/public/website/images/80G_Signature.png">
         
          <p style="font-size:15px; margin-left:510px;font-family: Arial, sans-serif;margin-top:-10px">Authorised Signatory
          </p>
</div>



    
    <hr>
    <table class="table table-responsive " style="width:1000px; height: 500px; font-family:Helvetica, sans-serif; ">
      <tr>
        <td class="" colspan="8" style="text-align:center;font-size:25px;padding-bottom:-50px">All Contributions to
          <strong>COSMO NGO are exempted U/S 80G of I.T.Act 1961</strong></td>



      </tr>
      <br><br>
      <tr>
        <td><span style="font-weight: bold;font-size:18px;;">THANE OFF :</span></td>

        <td style="font-size:18px;  padding-top: 60px;">
        Flat No - 25, Fifth Floor, Near Shiv Temple, Shastri Nagar, Dombivali West, Thane, Maharashtra, India, 421202
          <br> <b>Contact Number</b>: 85918 64147 <b>E-mail</b> : info@cdf.world <b>Web</b> : www.cdf.world
        </td>
      </tr>
      <br><br>
     

    </table><br>
    <hr>
    <table class="table table-responsive " style="width:1000px; height: 500px; ">

      <tr>
        <td style="font-size:20px;font-weight: bold; font-family:Helvetica, sans-serif;"> We accept donation through
          UPI, Virtual ID for cosmologicalfoundation@oksbi </td>
        <td> <img src="https://www.kokanngo.org/public/website/images/barcode.png" width="20%"> </td>

      </tr>

    </table>

