<style type="text/css">
     .tox .tox-notification--in{
        opacity: 0;
     }
      .tox .tox-statusbar{
     display: none!important;
    }
    .cke_path{
        display: none;
    }
</style>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <h2 class="mb-4"><?php echo $pagetitle; ?></h2>
                            <form class="custom-validation" method='post' action="<?php echo site_url('savemenu'); ?>"
                                enctype='multipart/form-data'>

                                <?php echo view('admin/_topmessage'); ?>

                                <div class="row  form-group">

                                    <div class="col-lg-5 ">

                                        <label>Parent Menu</label>
                                        <select name="parentid" class="form-control" >
                                            <option value="0">-- Select Parent--</option>
                                            <?php foreach($parentmenus AS $menuDetail){ ?>
                                            <option value="<?php echo $menuDetail['cat_id']; ?>" ><?php echo $menuDetail['cat_name']; ?></option>
                                            
                                            <?php 
                                               
                                                 $menucategory= new \App\Models\MenucategoryModel();
                                                 $searchArray = array("parentid"=>$menuDetail['cat_id']);
                                                 $secondmenu= $menucategory->getData($searchArray);
//                                                 print_r($topmenu);die;
                                                 foreach($secondmenu as $menudetail)
                                                 { ?>
                                                     <option value="<?php echo $menudetail['cat_id']; ?>" >&nbsp-<?php echo $menudetail['cat_name']; ?></option>
                                              <?php   }
                                                 
                                               } ?>
                                        </select>

                                    </div>
                                    
                                    <div class="col-lg-5 ">

                                        

                                    </div>
                                    

                                </div>
                                <div class="row  form-group">

                                    <div class="col-lg-5 ">

                                        <label>Menu Name</label>
                                        <input type="text" name="menuname" value="" class="form-control" required=""> 
                                      

                                    </div>
                                    
                                    <div class="col-lg-5 ">

                                        <label>Menu Url</label>
                                        <input type="text" name="menuurl" value="" class="form-control"> 
                                        <span class="text-muted mb-3 pb-4"> If want to open into new tab put t=_blank in url. t=_blank will auto remove from url.</span>
                                    </div>
                                    

                                </div>

                                <div class="row  form-group">

                                    <div class="col-lg-5 ">

                                        
                                        <label>Page Name</label>
                                         <input type="text" name="pagename" value="" class="form-control"> 
                                      
                                    </div>
                                    <div class="col-lg-5 ">
                                        <label>Page Type</label><br>
                                         <input type="radio" name="pagetype" id="show" value="Page"  checked > Page
                                         <input type="radio" name="pagetype" id="hide" value="Menu" > Menu
                                      
                                    </div>

                                </div>
                                
                                <div class="row  form-group">

                                    <div class="col-lg-5 ">

                                        <label>Show in menu</label>
                                        <input type="checkbox" name="showinmenu" value="1" > 

                                    </div>
                                    
                                    

                                </div>
                                
                                <div class="row  form-group">

                                    
                                    
                                    <div class="col-lg-5">
                                     
                                        <label>SEO Keywors</label>
                                        <textarea name="seokeyword" class="form-control" rows="3" cols="10"></textarea>
                                    </div>
                                    

                                </div>
                                
                                <div class="row  form-group">

                                    <div class="col-lg-5 ">

                                        <label>SEO Description</label>
                                        <textarea name="seodesc" class="form-control" rows="3" cols="10"></textarea>

                                    </div>
                                    
                                    <div class="col-lg-5">
                                     
                                        <label>SEO Content</label>
                                        <textarea name="seocontent" class="form-control" rows="3" cols="10"></textarea>
                                    </div>
                                    

                                </div>
                                
                                <div class="row  form-group">

                                    
                                    <div class="col-lg" id="con">
                                     
                                        <label>Page content</label>
                                        
                                       <!--  <textarea id="tiny" name="pagecontent" rows="10" cols="10"></textarea> -->
                                       <textarea class="form-control editor" id='#div_editor1' name="pagecontent"></textarea>
                                    </div>
                                    

                                </div>
                                </div>

                                <div class="row  form-group">

                                    <div class="col-lg-5">
                                       
                                        <button type="submit"
                                            class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1">
                                            Submit
                                        </button>
                                    </div>
                                    <div class="col-lg-5">
                                        <a href="<?php echo site_url("menucategory");?>"
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
  tinymce.init({
    selector: 'textarea#tiny'
  });
</script>
<script type="text/javascript">
    // Prevent Bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
  if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
    e.stopImmediatePropagation();
  }
});
</script>
<script type="text/javascript">
    document.addEventListener('focusin', (e) => {
  if (e.target.closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
    e.stopImmediatePropagation();
  }
});
</script>
<script type="text/javascript">
   function display_img(input) {
     if (input.files && input.files[0]) {
       var reader = new FileReader()
       reader.onload = function (e) {
         $('#display_image_here')
           .attr('src', e.target.result)
           .width(100)
           .height(100)
       }
       reader.readAsDataURL(input.files[0])
     }
   }
</script>


<script type="text/javascript" src="<?php echo base_url('richtexteditor/plugins/all_plugins.js')?>"></script>

<script>

    var config = {};

    config.file_upload_handler = function (file, callback, optionalIndex, optionalFiles) {
        var uploadhandlerpath = "http://165.22.219.135/kokanngo/public/";

        console.log("upload", file, "to", uploadhandlerpath)

        function append(parent, tagname, csstext) {
            var tag = parent.ownerDocument.createElement(tagname);
            if (csstext) tag.style.cssText = csstext;
            parent.appendChild(tag);
            return tag;
        }

        var uploadcancelled = false;

        var dialogouter = append(document.body, "div", "display:flex;align-items:center;justify-content:center;z-index:999999;position:fixed;left:0px;top:0px;width:100%;height:100%;background-color:rgba(128,128,128,0.5)");
        var dialoginner = append(dialogouter, "div", "background-color:white;border:solid 1px gray;border-radius:15px;padding:15px;min-width:200px;box-shadow:2px 2px 6px #7777");

        var line1 = append(dialoginner, "div", "text-align:center;font-size:1.2em;margin:0.5em;");
        line1.innerText = "Uploading...";

        var totalsize = file.size;
        var sentsize = 0;

        if (optionalFiles && optionalFiles.length > 1) {
            totalsize = 0;
            for (var i = 0; i < optionalFiles.length; i++) {
                totalsize += optionalFiles[i].size;
                if (i < optionalIndex) sentsize = totalsize;
            }
            console.log(totalsize, optionalIndex, optionalFiles)
            line1.innerText = "Uploading..." + (optionalIndex + 1) + "/" + optionalFiles.length;
        }

        var line2 = append(dialoginner, "div", "text-align:center;font-size:1.0em;margin:0.5em;");
        line2.innerText = "0%";

        var progressbar = append(dialoginner, "div", "border:solid 1px gray;margin:0.5em;");
        var progressbg = append(progressbar, "div", "height:12px");

        var line3 = append(dialoginner, "div", "text-align:center;font-size:1.0em;margin:0.5em;");
        var btn = append(line3, "button");
        btn.className = "btn btn-primary";
        btn.innerText = "cancel";
        btn.onclick = function () {
            uploadcancelled = true;
            xh.abort();
        }

        var xh = new XMLHttpRequest();
        xh.open("POST", uploadhandlerpath + "?name=" + encodeURIComponent(file.name) + "&type=" + encodeURIComponent(file.type) + "&size=" + file.size, true);
        xh.onload = xh.onabort = xh.onerror = function (pe) {
            console.log(pe);
            console.log(xh);
            dialogouter.parentNode.removeChild(dialogouter);
            if (pe.type == "load") {
                if (xh.status != 200) {
                    console.log("uploaderror", pe);
                    if (xh.responseText.startsWith("ERROR:")) {
                        callback(null, "http-error-" + xh.responseText.substring(6));
                    }
                    else {
                        callback(null, "http-error-" + xh.status);
                    }
                }
                else if (xh.responseText.startsWith("READY:")) {
                    console.log("File uploaded to " + xh.responseText.substring(6));
                    callback(xh.responseText.substring(6));
                }
                else {
                    callback(null, "http-error-" + xh.responseText);
                }
            }
            else if (uploadcancelled) {
                console.log("uploadcancelled", pe);
                callback(null, "cancelled");
            }
            else {
                console.log("uploaderror", pe);
                callback(null, pe.type);
            }
        }
        xh.upload.onprogress = function (pe) {
            console.log(pe);
            //pe.total
            var percent = Math.floor(100 * (sentsize + pe.loaded) / totalsize);
            line2.innerText = percent + "%";

            progressbg.style.cssText = "background-color:green;width:" + (percent * progressbar.offsetWidth / 100) + "px;height:12px;";
        }
        xh.send(file);
    }

    var editor1 = new RichTextEditor("#div_editor1", config);
</script>
<script>
$(document).ready(function(){
  $("#hide").click(function(){
    $("#con").hide();
  });
  $("#show").click(function(){
    $("#con").show();
  });
});
</script>
