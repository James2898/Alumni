				<!-- Navbar -->
					<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
						<div class="container-fluid">
		          			<div class="navbar-wrapper">
		            			<h4>
		            				<?php 
		            					echo "Welcome, ".ucwords($this->db->get_where('alumni' , array('alumni_student_ID' =>$_SESSION['user_ID']) )->row()->alumni_fname)." | ".ucwords(str_replace("_", " ", $page_name));

		            					//echo date('Y-m-d h:m:s');
		            					//Print_r($_SESSION);
		            					//echo phpinfo();
		            				?>
		            			</h4>
		          			</div>
		          			<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
		            			<span class="sr-only">Toggle navigation</span>
		            			<span class="navbar-toggler-icon icon-bar"></span>
		            			<span class="navbar-toggler-icon icon-bar"></span>
		            			<span class="navbar-toggler-icon icon-bar"></span>
		          			</button>
			          		<div class="collapse navbar-collapse justify-content-end">
			            		<form class="navbar-form">
			              			<!-- <div class="input-group no-border">
			                			<input type="text" value="" class="form-control" placeholder="Search...">
			                			<button type="submit" class="btn btn-white btn-round btn-just-icon">
			                  				<i class="material-icons">search</i>
			                  				<div class="ripple-container"></div>
			                			</button>
			              			</div> -->
			            		</form>
			            		<ul class="navbar-nav">
			              			
			              			<li class="nav-item dropdown">
			                			<a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                  				<i class="material-icons">notifications</i>
			                  				<span class="notification">
			                  					<?php  
			                  						echo $this->db->get_where('notification' , array('notification_recieve_ID' =>$_SESSION['user_ID'],'notification_unread'=>'TRUE'))->num_rows();
			                  					?>
			                  				</span>
			                  				<p class="d-lg-none d-md-block">
			                    				Notifications
			                  				</p>
			                			</a>
			                			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
			                  				<?php  
				                                $this->db->select("*");
				                                $this->db->from('notification');
				                                $this->db->join('alumni','alumni.alumni_student_ID = notification.notification_sender_ID','left');
				                                $this->db->join('appointment','appointment.appointment_ID = notification.notification_type_ID', 'left');
				                                $this->db->join('announcement','announcement.announcement_ID = notification.notification_type_ID', 'left');
				                                $this->db->where('notification_recieve_ID',$_SESSION['user_ID']);
				                                $this->db->where('notification_unread','TRUE'); 
				                                $this->db->order_by('notification_ID', 'DESC');
				                                $this->db->limit('5');

				                                $query = $this->db->get()->result_array();
				                               	foreach ($query as $row):

				                            ?>
				                            <?php 
			                                  if($row['notification_type'] == 'Appointment'){
			                                    $icon = 'date_range';
			                                    

			                                    if($row['notification_param'] == 'Created'){
			                                      $title = 'Appointment with APL';
			                                    }else if($row['notification_param'] == 'Approved'){
			                                      $title = 'APL approved your appointment request';
			                                    }else if($row['notification_param'] == 'Cancelled'){
			                                      $title = 'APL cancelled your scheduled appointment';

			                                    }else if($row['notification_param'] == 'Rescheduled'){
			                                      $title = 'APL rescheduled your appointment';
			                                    }
			                                    
			                                  }else if($row['notification_type'] == 'Announcement'){
			                                    $title = $row['announcement_title'];
			                                    $icon = 'announcement';
			                                  }
			                                ?>
			                  					<a class="dropdown-item" href="#"><i class="material-icons"><?php echo $icon; ?></i><?php echo $title ?></a>
				                  			<?php  
				                  				endforeach;
				                  			?>
				                  			<div class="text-center">
				                  				<a class="dropdown-item pull-center" href="<?php echo base_url()."index.php/alumni/notifications" ?>">View all ...</a>
				                  			</div>
			                			</div>
			              			</li>
			              			<li class="nav-item dropdown">
			                			<a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                  				<i class="material-icons">person</i>
			                  				<p class="d-lg-none d-md-block">
			                    				Account
			                  				</p>
			                			</a>
			                			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
			                  				<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/alumni/profile">Profile</a>
			                  				<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/alumni/settings">Settings</a>
			                  				<div class="dropdown-divider"></div>
			                  				<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/login/logout">Log out</a>
			                			</div>
			              			</li>
			            		</ul>
			          		</div>
		        		</div>
		      		</nav>
		    	<!-- End Navbar -->