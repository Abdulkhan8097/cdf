<?php $session = session(); 
   $admin_type = $session->get('type');
   
   ?>
<!-- Page Wrapper -->
<div id="wrapper">
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('index.php/dashboard')?>">
      <!-- <div class="sidebar-brand-icon rotate-n-15">
         <i class="fas fa-laugh-wink"></i>
         </div> -->
      <!-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> -->
      <img src="<?php echo base_url('Content/assets/img/logo/cdf.gif')?>" alt="" height="70px" style="background: aliceblue;">
   </a>
   <!-- Divider -->
   <hr class="sidebar-divider my-0">
   <!-- Nav Item - Dashboard -->
   <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url('index.php/dashboard')?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
   </li>
   <!-- Divider -->
   <hr class="sidebar-divider">
   <!-- Heading -->
   <div class="sidebar-heading">
      Interface
   </div>
   <!-- Nav Item - Pages Collapse Menu -->
   <?php if($admin_type=='admin'){ ?>
   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
         aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Donor</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?php echo site_url('users'); ?>">View Donar</a>
            <a class="collapse-item" href="<?php echo site_url('newuser'); ?>">Add Donner</a>
         </div>
      </div>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cases"
         aria-expanded="true" aria-controls="cases">
      <i class="fas fa-fw fa-cog"></i>
      <span>cases</span>
      </a>
      <div id="cases" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?php echo site_url('viewemergencycases'); ?>">View Cases</a>
            <a class="collapse-item" href="<?php echo site_url('addemergencycases'); ?>">Add Cases</a>
         </div>
      </div>
   </li>
   <li class="nav-item">
      <a class="nav-link" href="<?php echo site_url('adminenquiry'); ?>">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Enquiry</span></a>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Volunteer"
         aria-expanded="true" aria-controls="Volunteer">
      <i class="fas fa-fw fa-cog"></i>
      <span>Volunteer</span>
      </a>
      <div id="Volunteer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?php echo site_url('viewvolunteer'); ?>">View Volunteer</a>
            <a class="collapse-item" href="<?php echo site_url('addvolunteer'); ?>">Add Volunteer</a>
         </div>
      </div>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Users"
         aria-expanded="true" aria-controls="Users">
      <i class="fas fa-fw fa-cog"></i>
      <span>Users</span>
      </a>
      <div id="Users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?php echo site_url('adminusers'); ?>">View Users</a>
            <a class="collapse-item" href="<?php echo site_url('newaccount'); ?>">Add User</a>
         </div>
      </div>
   </li>
   <?php } ?>
   <?php if($admin_type=='branch'){ ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
         aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Reference Url</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?php echo site_url('userrefurl'); ?>">View </a>
         </div>
      </div>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Donar"
         aria-expanded="true" aria-controls="Donar">
      <i class="fas fa-fw fa-cog"></i>
      <span>Danation</span>
      </a>
      <div id="Donar" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?php echo site_url('users'); ?>">View Donar</a>
          
         </div>
      </div>
   </li>
    <?php } ?>
    <?php if($admin_type=='editor'){ ?>
      <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Donar"
         aria-expanded="true" aria-controls="Donar">
      <i class="fas fa-fw fa-cog"></i>
      <span>Danation</span>
      </a>
      <div id="Donar" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?php echo site_url('users'); ?>">View Donar</a>
          
         </div>
      </div>
   </li>

      <?php } ?>
      <?php if($admin_type=='manager'){ ?>
         <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
         aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Danation</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?php echo site_url('users'); ?>">View Donar</a>
            <a class="collapse-item" href="<?php echo site_url('newuser'); ?>">Add Donner</a>
         </div>
      </div>
   </li>
      <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cases"
         aria-expanded="true" aria-controls="cases">
      <i class="fas fa-fw fa-cog"></i>
      <span>cases</span>
      </a>
      <div id="cases" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?php echo site_url('viewemergencycases'); ?>">View Cases</a>
            <a class="collapse-item" href="<?php echo site_url('addemergencycases'); ?>">Add Cases</a>
         </div>
      </div>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Volunteer"
         aria-expanded="true" aria-controls="Volunteer">
      <i class="fas fa-fw fa-cog"></i>
      <span>Volunteer</span>
      </a>
      <div id="Volunteer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?php echo site_url('viewvolunteer'); ?>">View Volunteer</a>
            <a class="collapse-item" href="<?php echo site_url('addvolunteer'); ?>">Add Volunteer</a>
         </div>
      </div>
   </li>
   <li class="nav-item">
      <a class="nav-link" href="<?php echo site_url('adminenquiry'); ?>">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Enquiry</span></a>
   </li>
         <?php } ?>
         <?php if($admin_type=='moderator'){ ?>
            <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cases"
         aria-expanded="true" aria-controls="cases">
      <i class="fas fa-fw fa-cog"></i>
      <span>cases</span>
      </a>
      <div id="cases" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?php echo site_url('viewemergencycases'); ?>">View Cases</a>
            <a class="collapse-item" href="<?php echo site_url('addemergencycases'); ?>">Add Cases</a>
         </div>
      </div>
   </li>

            <?php } ?>
</ul>
<!-- End of Sidebar -->