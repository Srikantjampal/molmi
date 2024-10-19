<?php
$front_base_url = $this->config->item('front_base_url');
$base_url 		= $this->config->item('base_url');
$http_host 		= $this->config->item('http_host');
$base_url_views = $this->config->item('base_url_views');
$base_upload = $this->config->item('upload');
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Kitchenore: Admin Panel</title>
<link rel="icon" href="<?php echo $base_url_views;?>images/kitchenore.svg"> 
<!-- Font CSS (Via CDN) -->
<!--
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"rel="stylesheet">
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo $base_url_views;?>css/bootstrap.min.css">

<!-- Required Plugin CSS 
<link rel="stylesheet" type="text/css" href="vendor/plugins/morris/morris.css">
<link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/css/datatables.min.css">
-->
<!-- Theme CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo $base_url_views;?>css/vendor.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url_views;?>css/theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url_views;?>css/utility.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url_views;?>css/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url_views;?>css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url_views;?>css/jquery.multiselect.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url_views;?>css/my-style.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url_views;?>css/new-css.css">
<!-- Favicon -->

<link rel="shortcut icon" href="<?php echo $front_base_url; ?>site/views/images/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&display=swap" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>
 
<!-- Start: Header -->
<header class="">
   <div class="navbar-branding">
      <!--<span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span> -->
      <a class="navbar-brand" href="<?php echo $base_url;?>">
	  <img alt="Kitchenore" src="<?php echo $base_url_views;?>images/kitchenore.svg" width="160px" height="57px" height="57px" style="margin-top: 15px;" ></a> 
   </div>
   <div class="navbar-right">
      <!--sing out-->
      <div class="user-info" style="border:none">
         <div class="media">
            <div class="mobile-link"> <span class="glyphicons glyphicons-show_big_thumbnails"></span> </div>
            <div class="media-body pull-right">
               <!--<h5 class="media-heading mt5 mbn fw700 cursor"><?php //echo strtoupper($this->session->userdata('uname'));?><!--span class="caret ml5"></span</h5>-->
               <div class="media-links fs11">
                  <!--a href="javascript:void(0);">Menu</a--><i class="fa fa-sign-out" style="font-size:18px; color:#2d8484"></i> <a href="<?php echo $base_url;?>welcome/logout" style="font-size:16px; color:#2d8484">Sign Out</a>
               </div>
            </div>
         </div>
      </div>
      <!--div class="navbar-search">
         <input type="text" id="HeaderSearch" placeholder="Search..." value="Search...">
         </div-->
   </div>
   <div class="navbar navbar-inverse" data-spy="affix" data-offset-top="50">
      <div class="container-fluid">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
            </button>
         </div>
         <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                
               <?php 
                $uid = $this->session->userdata('adminId');
          			$getuser['data'] = $this->footer->getuser($uid);
          			$category = $getuser['data'][0]->role_id;
          			$usercategory = $this->footer->usercategory($category);
          			$permission1=$usercategory[0]->permission;
          			$permission1 = explode(',',$permission1);
    			
      			    $edit_permi = $usercategory[0]->editperm;
                $edit_permission = explode(',',$edit_permi); 
            
               
               $activetab = $this->uri->segment('1'); ?>    
                
                <?php if(in_array('1',$permission1) || in_array('2',$permission1) || in_array('3',$permission1) || in_array('4',$permission1) || in_array('5',$permission1) || in_array('6',$permission1) || in_array('7',$permission1) || in_array('8',$permission1) || in_array('26',$permission1) || in_array('16',$permission1) || in_array('12',$permission1)){ ?>    
                
               <li class="dropdown <?php if($activetab == 'group' || $activetab == 'category' || $activetab == 'subcategory' || $activetab == 'wellness_category' || $activetab == 'size' || $activetab == 'colour' || $activetab == 'pincode' || $activetab == 'cms' || $activetab == 'banner' || $activetab == 'offers') { ?>active<?php } ?>">
                  <a class="dropdown-toggle " data-toggle="dropdown" href="#">Master<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <?php if(in_array('26',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>group/lists" title="Category">Category</a></li>
                     <?php } ?>

                     <?php if(in_array('1',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>category/lists" title="Category">Sub category</a></li>
                     <?php } ?>
                     <?php if(in_array('2',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>subcategory/lists" title="Sub Category">Class</a></li>
                     <?php } ?>
                     
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>sub_subcategory/lists" title="Sub Category">Sub Class</a></li>
                     
                     <?php if(in_array('3',$permission1)){ ?>
                     <!--<li><a class="ajax-disable" href="<?php //echo $base_url;?>wellness_category/lists" title="Wellness Category">Wellness Category </a></li>-->
                     <?php } ?>
                     <?php if(in_array('4',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>size/lists" title="Size">Size</a></li>
                     <?php } ?>
                     <?php if(in_array('5',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>colour/lists" title="Colour">Colour</a></li>
                     <?php } ?>
                     <!-- <?php if(in_array('5',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>location/lists" title="Location">Location</a></li>
                     <?php } ?> -->
                     <?php if(in_array('6',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>pincode/lists" title="Pincode">Pincode</a></li>
                     <?php } ?>
                     <?php if(in_array('7',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>cms/lists" title="CMS">CMS</a></li>
                     <?php } ?>
                     <?php if(in_array('8',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>banner/lists" title="Banners">Banners</a></li>
                     <?php } ?>
					      <?php if(in_array('8',$permission1)){ ?>
                     <!-- li><a class="ajax-disable" href="<?php echo $base_url;?>storelocator/lists" title="Store Locator">Store Locator</a></li -->
                     <?php } ?>
					           <?php if(in_array('16',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>badges/lists" title="Badges">Badges</a></li>
                     <?php } ?>	
                      <?php if(in_array('3',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>brands/lists" title="Badges">Brands</a></li>
                     <?php } ?> 

                      <!-- <?php if(in_array('8',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>testimonial/lists" title="Testimonial">Testimonial</a></li>
                     <?php } ?> -->

                     <?php if(in_array('12',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>offers/edit/1" title="System">System</a></li>
                     <?php } ?> 

                     <?php if(in_array('12',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>home_category/edit/1" title="System">Home Category Banner</a></li>
                     <?php } ?> 

                      <?php if(in_array('12',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>deal_banner/edit/1" title="System">Deals Banner</a></li>
                     <?php } ?> 

                     <?php if(in_array('1',$permission1)){ ?>         
                      <li><a class="ajax-disable" href="<?php echo $base_url;?>material/lists">Material</a></li>      
                      <li class="divider"></li>     
                      <?php } ?>
                  </ul>
               </li>
               
               <?php } ?>
               
               <?php if(in_array('9',$permission1) || in_array('10',$permission1) ){ ?>
               <li class="dropdown <?php if($activetab == 'product') { ?>active<?php } ?>">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="Product Management">Product Management<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    
                     <?php if(in_array('9',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>product/lists" title="Product">Product</a></li>
                     <?php } ?>

                      <?php if(in_array('26',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>out_of_stock/lists" title="Product">Out Of Stock</a></li>
                     <?php } ?>

                     <?php if(in_array('27',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>low_inventory/lists" title="Product">Low Inventory</a></li>
                     <?php } ?>
                     <!-- <?php if(in_array('10',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>product/deletedlists" title="Deleted Product">Deleted Product</a></li>
                     <?php } ?> -->

                     <?php if(in_array('10',$permission1)){ ?>
                     <!-- li><a class="ajax-disable" href="<?php echo $base_url;?>product/deactivatedlists" title="Deactived Product">Deactived Product</a></li>
                     <?php } ?>
                     <?php if(in_array('10',$permission1)){ ?>
                     <li><a class="ajax-disable" href="<?php echo $base_url;?>product/blockedlists" title="Blocked Product">Blocked Product</a></li -->
                     <?php } ?>
                   </ul>
               </li>
               <?php } ?>
               
               
               <?php if(in_array('11',$permission1)){ ?>
               <li class="dropdown <?php if($activetab == 'coupan') { ?>active<?php } ?>">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="Offers">Offers<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li class=""><a class="ajax-disable" href="<?php echo $base_url;?>coupan/lists" title="Coupon">Coupon</a></li>
                    
                  </ul>
               </li>
               <?php } ?>
               
               <?php if(in_array('13',$permission1) || in_array('14',$permission1) || in_array('15',$permission1) || in_array('17',$permission1) || in_array('19',$permission1) || in_array('20',$permission1) ){ ?>
               
               
               <li class="dropdown <?php if($activetab == 'user' || $activetab == 'vendor' || $activetab == 'users' || $activetab == 'permission') { ?>active<?php } ?>">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="User Management">User Management<span class="caret"></span></a>
                  <ul class="dropdown-menu ">
                     	<?php if(in_array('13',$permission1)){ ?>
                     	<li><a class="ajax-disable" href="<?php echo $base_url;?>user/lists" title="Register Users">Register Users</a></li>
                     	<?php } ?>
                     	<?php if(in_array('14',$permission1)){ ?>
                     	<!-- li><a class="ajax-disable" href="<?php echo $base_url;?>vendor/lists" title="Vendor">Vendor</a></li -->
                     	<?php } ?>
                     	<?php if(in_array('15',$permission1)){ ?>
                     	<li><a class="ajax-disable" href="<?php echo $base_url;?>users/lists" title="Admin Users">Admin Users</a></li>
                     	<?php } ?>
                     	<?php if(in_array('17',$permission1)){ ?>
                     	<li><a class="ajax-disable" href="<?php echo $base_url;?>permission/list_permission" title="Admin Permission">Admin Permission</a></li>	
                        <?php } ?>
                        <?php if(in_array('19',$permission1)){ ?>
                     	<li><a class="ajax-disable" href="<?php echo $base_url;?>user/lists_subscribe" title="Subscribe Users">Subscribe Users</a></li>
                     	<?php } ?>
				   		<!-- li><a class="ajax-disable" href="<?php echo $base_url;?>user/lists_franchise" title="Franchise Enquiry">Franchise Enquiry</a></li -->
                     <?php if(in_array('20',$permission1)){ ?>
						<li><a class="ajax-disable" href="<?php echo $base_url;?>user/lists_contactus" title="ContactUs Enquiry">Contact Us Enquiry</a></li>
                  <?php } ?>
						<!-- <li><a class="ajax-disable" href="<?php echo $base_url;?>user/lists_notify" title="Notify Me Users">Notify Me Users</a></li> -->
                   </ul>
               </li>
               
               <?php } ?>
               
              <!--  <?php if(in_array('16',$permission1) || in_array('17',$permission1) || in_array('18',$permission1) || in_array('19',$permission1) || in_array('20',$permission1)){ ?>
               
               <li class="dropdown <?php if($activetab == 'blog' || $activetab == 'speaker' || $activetab == 'event') { ?>active<?php } ?>">
                    <a id="dLabel" role="button" data-toggle="dropdown" class="ajax-disable" data-target="#" href="#">
                      Blog<span class="caret"></span>
                    </a>
            		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu"> -->
            		    
            		  <!-- <?php if(in_array('16',$permission1)){ ?>
            		  
                      <li class="dropdown-submenu">
                        <a tabindex="-1" href="#" title="Workshops">Workshops</a>
                        <ul class="dropdown-menu">
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>workspace_category/lists" title="Workshops Category">Workshops Category</a></li>
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>speaker/lists" title="Speaker">Speaker</a></li>
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>event/lists" title="Workshops">Workshops</a></li>
                        </ul>
                      </li>
                      <?php } ?> -->
                      <!-- <?php if(in_array('17',$permission1)){ ?>
                      <li class="dropdown-submenu">
                        <a href="#" title="Recipes">Recipes</a>
                        <ul class="dropdown-menu">
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>chef/lists" title="Chefs">Chefs</a></li>
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>recipes_main_category/lists" title="Recipes Main Category">Recipes Main Category</a></li>
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>recipes_category/lists" title="Recipes Category">Recipes Category</a></li>
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>receipes/lists" title="Recipes">Recipes</a></li>
                        </ul>
                      </li>
                      <?php } ?> -->
                      <!-- <?php if(in_array('18',$permission1)){ ?>
                      <li class="dropdown-submenu">  -->
                       <!--  <a href="#" title="Blog">Blog</a> -->
                       <!--  <ul class="dropdown-menu"> -->
                            <!-- li><a class="ajax-disable" href="<?php echo $base_url;?>blog_category/lists">Blog Main Category</a></li -->
                            <!-- <li><a class="ajax-disable" href="<?php echo $base_url;?>blog_subcategory/lists" title="Blog Category">Blog Category</a></li>
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>blog/lists" title="Blog">Blog</a></li> -->
                        <!-- </ul> -->
                      <!-- </li> -->
                      <?php } ?>
                      <!-- <?php if(in_array('19',$permission1)){ ?>
                      <li class="dropdown-submenu">
                        <a href="#" title="Services">Services</a>
                        <ul class="dropdown-menu">
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>service_category/lists" title="Service Category">Service Category</a></li>
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>services/lists" title="Service">Service</a></li>
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>services/enquiry" title="Service Enquiry">Service Enquiry</a></li>
                        </ul>
                      </li>
                      <?php } ?>
                      <?php if(in_array('20',$permission1)){ ?>
                      <li class="dropdown-submenu">
                        <a href="#" title="Travel">Travel</a>
                        <ul class="dropdown-menu">
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>travel_category/lists" title="Travel Category">Travel Category</a></li>
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>travel/lists" title="Travel">Travel</a></li>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>travel/enquiry" title="Travel Enquiry">Travel Enquiry</a></li>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>travel_review/lists" title="Travel Reviews">Travel Reviews</a></li>
                        </ul>
                      </li>
                       <?php } ?> -->
                      
                    <!-- </ul>
                </li>
                
                
            <?php } ?> -->

          <!-- <?php if(in_array('21',$permission1)){ ?>
               <li class="dropdown <?php if($activetab == 'gift_hamper_category' || $activetab == 'gift_hampers') { ?>active<?php } ?>">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="Gift Hamper">Gift Hamper<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>gift_hamper_category/lists" title="Gift Hamper Category">Gift Hamper Category</a></li>	
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>gift_hampers/lists" title="Gift Hamper">Gift Hamper</a></li>
                  </ul>
               </li>
               <?php } ?> -->
               
               <?php if(in_array('23',$permission1) || in_array('21',$permission1)){ ?>
               <li class="dropdown <?php if($activetab == 'orders' ) { ?>active<?php } ?>">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="Order Management">Order Management<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <?php if(in_array('23',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>orders/lists" title="Order">Orders</a></li>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>orders/returnorders" title="Order">Return Orders</a></li><?php } ?>
					<!--li><a class="ajax-disable" href="<?php echo $base_url;?>reports_management/vendororder" title="Vendor Sales Reports">Vendor Orders</a></li -->
					<!--li><a class="ajax-disable" href="<?php echo $base_url;?>reports_management/cancelorder" title="Vendor Cancelled Orders">Vendor Cancelled Orders</a></li -->
               <!-- <?php if(in_array('21',$permission1)){ ?>
					<li><a class="ajax-disable" href="<?php echo $base_url;?>reports_management/cancelrequest" title="Customer Cancel Request">Customer Cancel Request</a></li><?php } ?> -->
               </ul>
               </li>
               <?php } ?>
               
               <?php if(in_array('25',$permission1) || in_array('24',$permission1)){ ?>
                <!--li class="<?php if($activetab == 'reports_management') { ?>active<?php } ?>"><a class="ajax-disable" href="">Sales Report </a></li-->
                <li class="dropdown <?php if($activetab == 'reports_management') { ?>active<?php } ?>">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="Report Management">Report Management<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <?php if(in_array('25',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>reports_management/order" title="Order Reports">Order Report</a></li><?php } ?>
                    <?php if(in_array('24',$permission1)){ ?>
                    <!-- <li><a class="ajax-disable" href="<?php echo $base_url;?>reports_management/gstreport" title="GST Reports">GST Report </a></li> -->
                    <?php } ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>reports_management/shippingreport" title="Shipping Reports">Shipping Report </a></li>
					<li><a class="ajax-disable" href="<?php echo $base_url;?>reports_management/tcsreport" title="TCS Reports">TCS Report </a></li>
					<!--<li><a class="ajax-disable" href="<?php echo $base_url;?>reports_management/commissionreport" title="Commission Reports">Commission Report </a></li>
					<li><a class="ajax-disable" href="<?php echo $base_url;?>reports_management/vendorreport" title="Commission Reports">Vendor Payment Report</a></li -->
                   </ul>
               </li>  
               <?php } ?>
               
               
              <!-- <?php if(in_array('24',$permission1)){ ?>
               <li class="dropdown <?php if($activetab == 'vendorpayment') { ?>active<?php } ?>">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="Payment Management">Payment Management<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>vendorpayment/lists" title="Vendor Payment">Vendor Payment</a></li>
                  </ul>
               </li>
               <?php } ?>
			  -->	
               <?php if(in_array('22',$permission1)){ ?>
               <li class="dropdown <?php if($activetab == 'reviews') { ?>active<?php } ?>">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="Reviews Management">Reviews Management<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>reviews/lists" title="Reviews">Reviews</a></li>
                  </ul>
               </li>
               <?php } ?>
               
            </ul>
         </div>
      </div>
   </div>
</header>



<style>
#main {  
  margin-top: 60px; 
}
#error_msg{
	color:red;
	text-align:center;
}
header .dropdown-submenu {
    position: relative;
}

header .dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

header .dropdown-submenu:hover>.dropdown-menu, header .navbar-nav>li:hover>.dropdown-menu {
    display: block;
}

header .dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

header .dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

header .dropdown-submenu.pull-left {
    float: none;
}

header .dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
header .nav .open > a, header .nav .open > a:hover, header .nav .open > a:focus {
    color: #428bca;
    border-color: #cfcfcf00;
}
header .dropdown-submenu {
    padding: 0;
    border-bottom: none;
}
header .dropdown-menu>li>a:hover, header .dropdown-menu>li>a:focus {
    text-decoration: none;
    color: #262626;
    background-color: #fff;
}
header .dropdown-menu, header .dropdown-submenu>.dropdown-menu
{
    border-radius:0;
}
header .dropdown-menu > .active > a, header .dropdown-menu > .active > a:hover, header .dropdown-menu > .active > a:focus {
    background-color: #055b57;
}
</style>
