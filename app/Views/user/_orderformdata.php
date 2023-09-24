
<?php
$session = session();
$user_id = $session->get('user_id');
$userModel = new \App\Models\UserModel();
$arrSearch = array("id" => $user_id);
$userDetails = $userModel->getData($arrSearch);
$formdata = array();
if ($userDetails) {
    $txtOrderForm = $userDetails[0]->order_form;
    $formdata = json_decode($txtOrderForm, true);
}

$siteVariable = new App\Libraries\SiteVariables();
$ordeformLevel = $siteVariable->getVariable('orderformdormatelevel');
$ordeformFields = $siteVariable->getVariable('cutomerorderformFields');
$compulsary = array("order_size","no_sheet","paper_type","album_type");
foreach ($ordeformFields as $fieldkey => $fieldvalues) {
    if (isset($fieldvalues['fieldtype']) && $fieldvalues['fieldtype'] == "text") {
        ?>

        <div class="form-group row" id="div_<?php echo $fieldkey; ?>">
            <label for="example-text-input" class="col-sm-2 col-form-label"><?php echo isset($ordeformLevel[$fieldkey]) ? $ordeformLevel[$fieldkey] : ""; ?></label>
            <div class="col-sm-10">
                <input class="form-control" name="<?php echo $fieldkey; ?>" <?php if(in_array($fieldkey, $compulsary)){ echo "required"; }?>  id="<?php echo $fieldkey; ?>"  type="text" value="<?php echo isset($formdata[$fieldkey]) ? $formdata[$fieldkey] : ($fieldkey == "ealbum_studioname" ? $userDetails[0]->companyname : ($fieldkey == "email" ? $userDetails[0]->email : ( $fieldkey == "shipping_phone" ? $userDetails[0]->phone : ($fieldkey == "shipping_pincode" ? $userDetails[0]->pincode : "")) )) ?>" <?php echo $fieldkey == "shipping_phone" ? "maxlength=10" : ""; ?> >
            </div>
        </div>
    <?php } if (isset($fieldvalues['fieldtype']) && $fieldvalues['fieldtype'] == "hidden") {
        ?>

     <div class="form-group row" id="div_<?php echo $fieldkey; ?>" <?php if(isset($formdata[$fieldkey]) && $formdata[$fieldkey] !=""){ ?> <?php }else{ ?>style="display:none;"<?php } ?>>
            <label for="example-text-input" class="col-sm-2 col-form-label"><?php echo isset($ordeformLevel[$fieldkey]) ? $ordeformLevel[$fieldkey] : ""; ?>&nbsp;</label>
            <div class="col-sm-10">
                <input class="form-control" name="<?php echo $fieldkey; ?>" <?php if(in_array($fieldkey, $compulsary)){ echo "required"; }?>  id="<?php echo $fieldkey; ?>"  type="text" value="<?php echo isset($formdata[$fieldkey]) ? $formdata[$fieldkey] : "" ?>" >
            </div>
        </div>
    <?php } else if (isset($fieldvalues['fieldtype']) && $fieldvalues['fieldtype'] == "textarea") { ?>
        <div class="form-group row" id="div_<?php echo $fieldkey; ?>">
            <label for="example-text-input" class="col-sm-2 col-form-label"><?php echo isset($ordeformLevel[$fieldkey]) ? $ordeformLevel[$fieldkey] : ""; ?>  </label>
            <div class="col-sm-10">
                <textarea class="form-control" name="<?php echo $fieldkey; ?>" id="<?php echo $fieldkey; ?>" <?php if(in_array($fieldkey, $compulsary)){ echo "required"; }?>><?php echo isset($formdata[$fieldkey]) ? $formdata[$fieldkey] : ( $fieldkey == "shipping_address" ? $userDetails[0]->address : ""); ?></textarea>
            </div>
        </div>
    <?php } else if (isset($fieldvalues['fieldtype']) && $fieldvalues['fieldtype'] == "dropdown") { ?>
        <div class="form-group row" id="div_<?php echo $fieldkey; ?>">
            <label for="example-text-input" class="col-sm-2 col-form-label"><?php echo isset($ordeformLevel[$fieldkey]) ? $ordeformLevel[$fieldkey] : "";  ?>   </label>
            <div class="col-sm-10">
                <select class="form-control" name="<?php echo $fieldkey; ?>" id="<?php echo $fieldkey; ?>" <?php if(in_array($fieldkey, $compulsary)){ echo "required"; }?>>
                    <?php foreach ($fieldvalues['fieldvalue'] as $optionkey => $optionvalue) { ?>
                        <option value="<?php echo $optionkey; ?>" <?php
                        if (isset($formdata[$fieldkey])) {
                            echo ($formdata[$fieldkey] == $optionkey) ? "selected" : '';
                        }
                        ?>><?php echo $optionvalue; ?></option>
                            <?php } ?>

                </select>
            </div>
        </div>
    <?php } ?>
<?php } ?>











