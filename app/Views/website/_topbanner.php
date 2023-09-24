
<?php if(isset($pageDetail)){ ?>
<div class="ttm-page-title-row" style="background-image:url('<?php if(isset($pageDetail['cat_topbanner']) && $pageDetail['cat_topbanner'])echo base_url('public/website1/images/banner/'.$pageDetail['cat_topbanner']) ; ?>')">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-center" >
                            <div class="page-title-heading">
                                <h1 class="title" style="color:<?php if(isset($pageDetail['cat_topbgcolor']) && $pageDetail['cat_topbgcolor']){ echo $pageDetail['cat_topbgcolor']; } ?>"><?php if(isset($pageDetail['cat_name']) && $pageDetail['cat_name']){ echo $pageDetail['cat_name']; } ?></h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper" >
                                <span >
                                    <a title="Homepage" href="<?php echo site_url();?>" style="color:<?php if(isset($pageDetail['cat_topbgcolor']) && $pageDetail['cat_topbgcolor']){ echo $pageDetail['cat_topbgcolor']; } ?>"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep" style="color:<?php if(isset($pageDetail['cat_topbgcolor']) && $pageDetail['cat_topbgcolor']){ echo $pageDetail['cat_topbgcolor']; } ?>">&nbsp; : : &nbsp;</span>
                                <span style="color:<?php if(isset($pageDetail['cat_topbgcolor']) && $pageDetail['cat_topbgcolor']){ echo $pageDetail['cat_topbgcolor']; } ?>"><?php if(isset($pageDetail['cat_name']) && $pageDetail['cat_name']){ echo $pageDetail['cat_name']; } ?></span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div>
<?php } ?>