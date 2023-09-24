 
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <h2 class="pb-4"><?php echo $pagetitle;?></h2>
                                <form class="custom-validation" method='post' action="<?php echo site_url('Certificates/saveCertificates'); ?>" enctype='multipart/form-data'> <?php echo view('admin/_topmessage'); ?> 
                                <div class="row  form-group">
                                        <div class="col-5 ">
                                         <label>Certificates Name</label> 
                                         <input type="text" class="form-control " required placeholder="Enter Certificates Name" name="cname" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['certificates_name'] : ''; ?>"/>
                                          </div>
                                         
                                          </div>
                                           <div class="row  form-group">
                                              <div class="col-5 ">
                                         <label>Cover Image</label> 
                                         <input type="file" class="form-control"  placeholder="Enter Certificates Name" name="cover_image"  value=""  onchange="display_img(this);" accept="image/*"/>
                                         <span>
                                         The Picture Dimension Should Be Of 2480*3508 pixels</span>
                                          </div>
                                           <div class="col-4 ">
                                         <img src="<?php echo (isset($edit['cover_image']) && !empty($edit['cover_image'])) ? base_url('public/certificates').'/'.$edit['cover_image'] : BLANK_IMG; ?>" id="display_image_here" style="height: 100px; width: 100px; border: 2px solid gray; border-radius: 50%;" >
                                          </div>
                                          </div>
                                          <div class="row  form-group">
                                              <div class="col-5 ">
                                         <label>Upload PDF</label> 
                                         <input type="file" class="form-control" accept="application/pdf" placeholder="Enter Certificates Name" name="cimage"  value=""/>
                                          </div>
                                          </div>

                                        <?php //if(isset($edit)){ ?>  
                                            <div class="col-12">
                                           
                                                <label class="form-label"></label>
                                              <?php //$img_id= $edit['id'];


                                             //  if (isset($edit) && !empty($edit)) {
                                              //$i = 0;
                                            //foreach ($edit as $key => $value) {

                                              //$i++;
                                           // echo "<a id='del' target='_blank' href='".base_url('public/certificates/').'/'.$value->pdf_file."' >".$i.".".$value->pdf_file." </a><a href='Certificates/docDelete?id=$value->id&img_id=$img_id' class='badge badge-danger' onclick='return confirm('Are you sure?')'>delete</a> <br><br>";

                                            //}
                                          //}
                                           // else
                                            //{
                                             // echo"Not Attached  Document";
                                            //}
                                             
                                              ?>  
                                           
                                        </div>
                                    <?php  //} ?> 
                                
                                         
                                        </div>
                                    </div>
                                    <div class="row  form-group">
                                      <input type="hidden" name="id" value="<?php echo (isset($edit) && !empty($edit)) ? $edit['id'] : ''; ?>">
                                        <div class="col-5 "> <button type="submit" class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1"> Submit </button> </div>
                                        <div class="col-5 "> <a href="<?php echo site_url("viewcertificates");?>" class="btn btn-lg btn-block btn-secondary waves-effect"> Cancel </a> </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div> <!-- End Page-content -->
    <script type="">
        jQuery(document).ready(function () {
  ImgUpload();
});

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = $(this).attr('data-max_length');

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('image.*')) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false
        } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
              imgWrap.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}
    </script>

    <script type="text/javascript">
   function display_img(input) {
     if (input.files && input.files[0]) {
       var reader = new FileReader()
       reader.onload  =function (e) {
         $('#display_image_here')
           .attr('src', e.target.result)
           .width(100)
           .height(100)
       }
       reader.readAsDataURL(input.files[0])
     }
   }
</script>
