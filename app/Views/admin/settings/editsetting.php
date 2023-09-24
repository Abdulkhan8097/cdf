<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <h2 class="mb-4"><?php echo $pagetitle; ?></h2>
                            <form class="custom-validation" method='post' action="<?php echo site_url('updatesetting'); ?>"
                                enctype='multipart/form-data'>

                                <?php echo view('admin/_topmessage'); ?>

                                <div class="row  form-group">

                                    <div class="col-lg-5 ">

                                        <label>Setting Name</label>
                                        <p class="form-control "><?php echo $settingDetails['name']; ?></p>

                                    </div>
                                    

                                </div>

                                <div class="row  form-group">

                                    <div class="col-lg-5">
                                      <?php  if($settingDetails['st_type'] == 'file'){ ?>
                                        <label>Value</label>
                                          <input type="file" name="filename" class="filestyle">
                                       
                                      <?php }else{ ?>
                                         <label>Value</label>
                                         <textarea name="<?php echo $settingDetails['name']; ?>" class="form-control " cols="10" rows="5"><?php echo $settingDetails['varvalue']; ?></textarea>
                                         
                                      <?php } ?>
                                    </div>
                                    

                                </div>
                                </div>

                                <div class="row  form-group">

                                    <div class="col-lg-5">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <button type="submit"
                                            class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1">
                                            Submit
                                        </button>
                                    </div>
                                    <div class="col-lg-5">
                                        <a href="<?php echo site_url("settings");?>"
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

</script>