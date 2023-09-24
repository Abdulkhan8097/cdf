
<form action="" id="customersearch">
<div class="row">
    <div class="col-xl-12">
            <div class="card ">
                
                    <div class="card-body">

                        <div class="row ">

                            <div class="col-lg-4 ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" name="txtsearch" type="text" value="<?php echo $txtsearch; ?>" placeholder="Search by  name" >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select name="parentid" class="form-control " >
                                <option value="0">-- Select Parent--</option>
                                <?php foreach($parentmenus AS $menuDetail){ ?>
                                <option value="<?php echo $menuDetail['cat_id']; ?>"  <?php if($parentid ==$menuDetail['cat_id']){ echo "selected"; }?>><?php echo $menuDetail['cat_name']; ?></option>

                                <?php 

                                     $menucategory= new \App\Models\MenucategoryModel();
                                     $searchArray = array("parentid"=>$menuDetail['cat_id']);
                                     $secondmenu= $menucategory->getData($searchArray);
//                                                 print_r($topmenu);die;
                                     foreach($secondmenu as $menudetail)
                                     { ?>
                                         <option value="<?php echo $menudetail['cat_id']; ?>"  <?php if($parentid ==$menudetail['cat_id']){ echo "selected"; }?>>&nbsp-<?php echo $menudetail['cat_name']; ?></option>
                                  <?php   }

                                   } ?>
                            </select>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Submit
                                    </button>
                                    <a href="<?php echo site_url($action);?>"><button type="button" class="btn btn-primary waves-effect waves-light mr-1"
                                     data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Clear Search Filters">
                                    <i class="mdi mdi-refresh"></i>Clear
                                </button></a>

                                    
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
            </div>
        </div>
</div>
</form> 

<script>
function exportdata()
          {
            var formdata = $('#customersearch').serialize();
            window.open("<?php echo site_url('customerexportexcel'); ?>?"+formdata);   
          }
    </script>