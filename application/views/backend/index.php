<?php 
	//session_start();
	date_default_timezone_set('Asia/Manila');
	$theme_ID = $this->db->get_where('settings' , array('settings_user_ID' =>$_SESSION['user_ID'],'settings_type' => 'theme'))->row()->settings_description;
	$theme_color = $this->db->get_where('theme' , array('theme_ID' => $theme_ID))->row()->theme_description;
	$_SESSION['theme_color'] = $theme_color;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
  		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 		<title><?php echo ucwords(str_replace("_", " ", $page_name)); ?></title>
  		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  		<?php  
  			include 'include_top.php';
  			include 'backup.php';
  		?>

	</head>
	<body class="">
	  	<div class="wrapper">
	    	<?php  include $_SESSION['account_type'].'/sidebar.php';?>
		    <div class="main-panel">
		    	<?php  include $_SESSION['account_type'].'/navbar.php';?>
			    <div class="content">
					<?php  include $_SESSION['account_type'].'/'.$page_name.'.php';?>
				</div>
				<footer class="footer">
					<div class="container-fluid">
				        <div class="copyright float-right">
							&copy;
				            <script>
				            	document.write(new Date().getFullYear())
				            </script>
				            , made with <i class="material-icons">favorite</i> by
				            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
				        </div>
				    </div>
				</footer>
			</div>
	 	</div>
	  	<?php  
	  		include 'include_bottom.php';
	  		include $_SESSION['account_type'].'/calendar.php';
	  		include 'modal.php';
	  	?>
</body>

</html>
