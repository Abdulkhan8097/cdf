<style type="text/css">
.overlay{width: 100%;
    /*height: 100vh;*/
    position: absolute;
    top: 0;
    left: 0;
    background-image: linear-gradient(45deg, rgba(0,0,0,.3) 50%, rgba(0,0,0,.7) 50%);
    background-size: 3px 3px;
    z-index: 2;
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
                            <form class="custom-validation" method='post' action="<?php echo site_url('updatemenu'); ?>"
                                enctype='multipart/form-data'>

                                <?php echo view('admin/_topmessage'); ?>

                                <div class="row  form-group">

                                    <div class="col-lg-5 ">

                                        <label>Parent Menu</label>
                                        <select name="parentid" class="form-control" >
                                            <option value="0">-- Select Parent--</option>
                                            <?php foreach($parentmenus AS $menuDetail){ ?>
                                            <option value="<?php echo $menuDetail['cat_id']; ?>"  <?php if($menuDetail['cat_id'] == $settingDetails['cat_parentid']){ echo "selected"; }?>><?php echo $menuDetail['cat_name']; ?></option>
                                            
                                            <?php 
                                               
                                                 $menucategory= new \App\Models\MenucategoryModel();
                                                 $searchArray = array("parentid"=>$menuDetail['cat_id']);
                                                 $secondmenu= $menucategory->getData($searchArray);
//                                                 print_r($topmenu);die;
                                                 foreach($secondmenu as $menudetail)
                                                 { ?>
                                                     <option value="<?php echo $menudetail['cat_id']; ?>"  <?php if($menudetail['cat_id'] == $settingDetails['cat_parentid']){ echo "selected"; }?>>&nbsp-<?php echo $menudetail['cat_name']; ?></option>
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
                                         <input type="text" name="menuname" value="<?php echo $settingDetails['cat_name']; ?>" class="form-control"> 
                                      

                                    </div>
                                    
                                    <div class="col-lg-5 ">

                                        <label>Menu Url</label>
                                        <input type="text" name="menuurl" value="<?php echo $settingDetails['cat_url']; ?>" class="form-control"> 
                                        <span class="text-muted mb-3 pb-4"> If want to open into new tab put t=_blank in url. t=_blank will auto remove from url.</span>
                                    </div>
                                    

                                </div>

                                <div class="row  form-group">

                                    <div class="col-lg-5 ">

                                        
                                        <label>Page Name</label>
                                         <input type="text" name="pagename" value="<?php echo $settingDetails['cat_pagename']; ?>" class="form-control"> 
                                      
                                    </div>
                                    <div class="col-lg-5 ">
                                        <label>Page Type</label><br>
                                         <input type="radio" name="pagetype" value="Page"  <?php echo $settingDetails['cat_type']=='Page' ? "checked" : "" ?>> Page
                                         <input type="radio" name="pagetype" value="Menu" <?php echo $settingDetails['cat_type']=='Menu' ? "checked" : "" ?>> Menu
                                      
                                    </div>
                                    
                                </div>
                                
                                <div class="row  form-group">

                                    <div class="col-lg-5 ">

                                        <label>Show in menu</label>
                                        <input type="checkbox" name="showinmenu" value="1" <?php if($settingDetails['cat_showinmenu']){ echo "checked"; }; ?>  > 

                                    </div>
                                    
                                </div>
                                <div class="row  form-group">

                                    
                                    <div class="col-lg-5">
                                     
                                        <label>SEO Keywors</label>
                                        <textarea name="seokeyword" class="form-control" rows="3" cols="10"><?php echo $settingDetails['cat_keywords']; ?></textarea>
                                    </div>
                                    

                                </div>
                                
                                <div class="row  form-group">

                                    <div class="col-lg-5 ">

                                        <label>SEO Description</label>
                                        <textarea name="seodesc" class="form-control" rows="3" cols="10"><?php echo $settingDetails['cat_description']; ?></textarea>

                                    </div>
                                    
                                    <div class="col-lg-5">
                                     
                                        <label>SEO Content</label>
                                        <textarea name="seocontent" class="form-control" rows="3" cols="10"><?php echo $settingDetails['cat_content']; ?></textarea>
                                    </div>
                                    

                                </div>
                                
                                <div class="row  form-group">

                                    
                                    <div class="col-lg">
                                     
                                        <label>Page content</label>
                                    
 <textarea class="form-control" id='div_editor1' name="pagecontent">
                      <?php echo $settingDetails['cat_pagecontent']; ?> 
                      </textarea>   

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

<script type="text/javascript" src="<?php echo base_url('richtexteditor/plugins/all_plugins.js')?>"></script>

<script>
    var editor1 = new RichTextEditor("#div_editor1");
</script>

