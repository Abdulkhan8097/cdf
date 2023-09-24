<?php $session = session(); 
$router = service('router');
 $method = $router->methodName();
?>

<div class="col-sm-12 border-bottom mb-2">
    <div class="d-md-block float-left">
     <h4 class="font-size-18"><?php echo isset($pagetitle) ? $pagetitle :''; ?></h4>
    </div>
    <div class="float-right  d-md-block">
    <ul class="nav nav-tabs nav-tabs-custom font-size-18" >
    <?php if($session->get('user_type')=="channelpartner" && $method !="channelOrders"){ ?>
        <li class="nav-item">
            <a class="nav-link "  href="<?php echo site_url('channelorders');?>" >
                <span class="d-none d-sm-block">Channel Orders</span> 
            </a>
        </li>
    <?php } ?>
    <?php if($method !="orderHistory"){ ?>
        <li class="nav-item">
            <a class="nav-link text-dark"  href="<?php echo site_url('myorders');?>" >
                <span class="d-none d-sm-block">Order History</span> 
            </a>
        </li>
    <?php } ?>
    <?php if($method !="dashboard"){ ?>
        <li class="nav-item">
        <a class="nav-link "  href="<?php echo site_url('userdashboard');?>" >
            <span class="d-none d-sm-block">Place Order</span> 
        </a>
    </li>
    <?php } ?>
    </ul>
        
    </div>
</div>