
<footer class="footer widget-footer clearfix">

        <div class="second-footer ttm-textcolor-white bg-img2">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                        <div class="widget widget_text  clearfix">


                            <h3 class="widget-title">About Our Company</h3>
                            <div class="textwidget widget-text">
                                Genie Softsystem is proud to be led by extremely focused and dedicated professionals, who are known for their entrepreneurial skills, experience, and expertise in a wide spectrum of industries Through our solution partnerships and strategic alliances we continue to expand our horizons in the global market. 
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                        <div class="widget link-widget clearfix">
                            <h3 class="widget-title">Services</h3>
                            <?php             
                                $menucategory= new \App\Models\MenucategoryModel();
                                $searchArray = array("parentid"=>1);
                                $servicesmenu= $menucategory->getData($searchArray);
                                ?>
                            <ul id="menu-footer-services">
                                <?php foreach($servicesmenu as $servicedtails){ ?>
                                 <li><a href="<?php echo site_url( $servicedtails['cat_url'] ? "content/".$servicedtails['cat_url'] : '#'); ?>"><?php echo $servicedtails['cat_name']; ?></a>
                                <?php } ?>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                        <div class="widget link-widget clearfix">
                            <h3 class="widget-title">Industries</h3>
                            <?php             
                                $menucategory= new \App\Models\MenucategoryModel();
                                $searchArray = array("parentid"=>2);
                                $industriesmenu= $menucategory->getData($searchArray,0,8);
                                ?>
                            <ul id="menu-footer-services">
                                <?php foreach($industriesmenu as $industriesdtails){ ?>
                                 <li><a href="<?php echo site_url( $industriesdtails['cat_url'] ? "content/".$industriesdtails['cat_url'] : '#'); ?>"><?php echo $industriesdtails['cat_name']; ?></a>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                        <div class="widget link-widget clearfix">
                            <h3 class="widget-title">Our Products</h3>
                            <?php             
                                $menucategory= new \App\Models\MenucategoryModel();
                                $searchArray = array("parentid"=>96);
                                $ourmenu= $menucategory->getData($searchArray);
                                ?>
                            
                                <ul id="menu-footer-services">
                                     <?php foreach($ourmenu as $ourdtails){ 
                                         $menuUrl = strstr( $ourdtails['cat_url'], "#") ? $ourdtails['cat_url'] : "content/".$ourdtails['cat_url'];
                                         ?>
                                    <li><a href="<?php echo $menuUrl;  ?>" target="_new"><?php echo $ourdtails['cat_name']; ?></a>
                                <?php } ?>
                                     
                                    
                                  
                                </ul><br>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-text ttm-bgcolor-darkgrey ttm-textcolor-white">
            <div class="container">
                <div class="row copyright">
                    <div class="col-md-6">
                        <div class="">
                            <span>Copyright © <?php echo date('Y');?>&nbsp;<a href="<?php echo site_url('');?>"> <?php echo SITE_NAME; ?> </a></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
<script type="text/javascript" src="https://mylivechat.com/chatinline.aspx?hccid=97066773"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48435583-4', 'auto');
  ga('send', 'pageview');

</script>