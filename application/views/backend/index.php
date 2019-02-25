<!DOCTYPE html>
<html lang="en">
	<head>
  		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 		<title><?php echo ucwords(str_replace("_", " ", $page_name)); ?></title>
  		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  		<?php  
  			include 'include_top.php';
  		?>
	</head>

	<body class="">
	  	<div class="wrapper ">
	    	<?php  include 'admin/sidebar.php';?>
		    <div class="main-panel">
		    	<?php  include 'admin/navbar.php';?>
			    <div class="content">
					<?php  include 'admin'.'/'.$page_name.'.php';?>
				</div>
				<footer class="footer">
					<div class="container-fluid">
				        <nav class="float-left">
							<ul>
				              	<li>
					                <a href="https://www.creative-tim.com">
				                  		Creative Timxxxx
				                	</a>
				              	</li>
				              	<li>
					                <a href="https://creative-tim.com/presentation">
				                  		About Us
				                	</a>
				              	</li>
				              	<li>
					                <a href="http://blog.creative-tim.com">
				                  		Blog
				                	</a>
				              	</li>
				              	<li>
					                <a href="https://www.creative-tim.com/license">
				                  		Licenses
				                	</a>
				              	</li>
				            </ul>
				        </nav>
				        <div class="copyright float-right">
							&copy;
				            <script>
				            	document.write(new Date().getFullYear())
				            </script>, made with <i class="material-icons">favorite</i> by
				            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
				        </div>
				    </div>
				</footer>
			</div>
	 	</div>
	  	<div class="fixed-plugin">
		    <div class="dropdown show-dropdown">
		      <a href="#" data-toggle="dropdown">
		        <i class="fa fa-cog fa-2x"> </i>
		      </a>
		      <ul class="dropdown-menu">
		        <li class="header-title"> Sidebar Filters</li>
		        <li class="adjustments-line">
		          <a href="javascript:void(0)" class="switch-trigger active-color">
		            <div class="badge-colors ml-auto mr-auto">
		              <span class="badge filter badge-purple" data-color="purple"></span>
		              <span class="badge filter badge-azure" data-color="azure"></span>
		              <span class="badge filter badge-green" data-color="green"></span>
		              <span class="badge filter badge-warning" data-color="orange"></span>
		              <span class="badge filter badge-danger" data-color="danger"></span>
		              <span class="badge filter badge-rose active" data-color="rose"></span>
		            </div>
		            <div class="clearfix"></div>
		          </a>
		        </li>
		        <li class="header-title">Images</li>
		        <li class="active">
		          <a class="img-holder switch-trigger" href="javascript:void(0)">
		            <img src="<?php echo base_url(); ?>assets/img/sidebar-1.jpg" alt="">
		          </a>
		        </li>
		        <li>
		          <a class="img-holder switch-trigger" href="javascript:void(0)">
		            <img src="<?php echo base_url(); ?>assets/img/sidebar-2.jpg" alt="">
		          </a>
		        </li>
		        <li>
		          <a class="img-holder switch-trigger" href="javascript:void(0)">
		            <img src="assets/img/sidebar-3.jpg" alt="">
		          </a>
		        </li>
		        <li>
		          <a class="img-holder switch-trigger" href="javascript:void(0)">
		            <img src="assets/img/sidebar-4.jpg" alt="">
		          </a>
		        </li>
		        <li class="button-container">
		          <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
		        </li>
		        <!-- <li class="header-title">Want more components?</li>
		            <li class="button-container">
		                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
		                  Get the pro version
		                </a>
		            </li> -->
		        <li class="button-container">
		          <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
		            View Documentation
		          </a>
		        </li>
		        <li class="button-container github-star">
		          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
		        </li>
		        <li class="header-title">Thank you for 95 shares!</li>
		        <li class="button-container text-center">
		          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
		          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
		          <br>
		          <br>
		        </li>
		      </ul>
		    </div>
	  	</div>
	  	<?php  
	  		include 'include_bottom.php';
	  	?>
</body>

</html>