
<html>
  <head>
  <script>
    function submitPayuForm() {
     
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <!-- onload="submitPayuForm()" -->
  <body onload="submitPayuForm()" style="display:none">
    <h2>PayU Form</h2>
    <br/>
  <?php //echo var_dump($user_id);exit; ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $merchant_key ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <input type="hidden" name="lastname" value="<?php echo $user_id ?>" />
      <input type="hidden" name="address2" value="<?php echo $cases_id ?>"/>

      <input type="hidden" name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country'] ?>" />
      <input type="hidden" name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state'] ?>" />
      <input type="hidden" name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city'] ?>" />
      <input type="hidden" name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode'] ?>" />
      <input type="hidden" name="address1" value="<?php echo (empty($posted['address'])) ? '' : $posted['address'] ?>" />
     
     
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount <span class="mand">*</span>: </td>
          <td>
            <input name="amount" type="number" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
          <td>First Name <span class="mand">*</span>: </td>
          <td><input type="text" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></td>
        </tr>
        <tr>
          <td>Email <span class="mand">*</span>: </td>
          <td><input type="email" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
          <td>Phone <span class="mand">*</span>: </td>
          <td><input type="text" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          <td>Product Info <span class="mand">*</span>: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea></td>
        </tr>
        <tr>
          <td>Success URL <span class="mand">*</span>: </td>
          <td colspan="3"><input type="text" name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Failure URL <span class="mand">*</span>: </td>
          <td colspan="3"><input type="text" name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" /></td>
        </tr>

      <!--   <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="" size="64" /></td>
        </tr> -->
        <tr>
          
            <td colspan="4"><input type="submit" value="Submit" /></td>
       
        </tr>
      </table>
    </form>
  </body>
</html>
