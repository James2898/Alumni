					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-6">
								<div class="card card-stats">
									<div class="card-header card-header-warning card-header-icon">
										<div class="card-icon">
			                    			<i class="material-icons">event_note</i>
			                  			</div>
			                  			<?php  
			                  				$today_appointment = $this->db->get_where('appointment', array('appointment_date_start' => date('Y-m-d')))->num_rows();
			                  			?>
			                  			<p class="card-category">Today's Appointment</p>
			                  			<h3 class="card-title"><?php echo $today_appointment ?> Scheduled</h3>
			                		</div>
			                		<div class="card-footer">
			                  			<div class="stats">
			                    			<i class="material-icons">date_range</i>
			                    			<a href="<?php echo base_url()."index.php/admin/appointment" ?>" class="text-muted">View Appointments</a>
			                  			</div>
			                		</div>
			              		</div>
			            	</div>
			            	<div class="col-lg-6 col-md-6 col-sm-6">
			              		<div class="card card-stats">
									<div class="card-header card-header-info card-header-icon">
										<div class="card-icon">
			                    			<i class="material-icons">event_note</i>
			                  			</div>
			                  			<?php  
			                  				$appointment_requests = $this->db->get_where('appointment', array('appointment_status' => 'Waiting','appointment_alumni_ID',$_SESSION['user_ID']))->num_rows();
			                  			?>
			                  			<p class="card-category">Appointment Requests</p>
			                  			<h3 class="card-title"><?php echo $appointment_requests ?> Requests</h3>
			                		</div>
			                		<div class="card-footer">
			                  			<div class="stats">
			                    			<i class="material-icons">date_range</i>
			                    			<a href="<?php echo base_url()."index.php/admin/appointment" ?>" class="text-muted">View Appointments</a>
			                  			</div>
			                		</div>
			              		</div>
			            	</div>
			         	</div>
				        <div class="row">
				            <div class="col-lg-6 col-md-12">
								<div class="card">
					                <div class="card-header card-header-warning">
				                  		<h4 class="card-title">Latest Announcemnets</h4>
				                	</div><!-- End of Card Header -->
					                <div class="card-body table-responsive">
					                  	<table class="table">
					                      <thead class="text-<?php echo $_SESSION['theme_color'] ?>">
					                        <th></th>
					                      </thead>
					                      <tbody>
					                        <?php  
					                          $this->db->select("*");
					                          $this->db->from('announcement');
					                          $this->db->order_by('announcement_ID','DESC');
					                          $this->db->limit('5');
					                          $query = $this->db->get()->result_array();
					                          
					                          $last_category = '';
					                          foreach($query as $row):
					                        ?>
					                          <tr>
					                            <td>
					                              <div class="col-lg-12 col-md-12 col-sm-12">
					                                <div class="card card-stats">
					                                  <div class="card-header card-header-warning card-header-icon">
					                                    <div class="card-icon">
					                                      <i class="material-icons">announcement</i>
					                                    </div>
					                                    <h4 class="card-title"><?php echo $row['announcement_title'] ?></h4>
					                                    <p class="card-category"><?php echo $row['announcement_subject'] ?></p>
					                                    <div class="btn-group-sm">
					                                      <a href="#" class="btn btn-warning" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_edit_announcement/<?php echo $row['announcement_ID'] ?>')">
					                                             View
					                                      </a>
					                                      <a href="#" class="btn btn-warning" onclick="confirmModal('<?php echo base_url();?>index.php/admin/announcement/delete/<?php echo $row['announcement_ID'] ?>')">
					                                             Delete
					                                      </a>
					                                    </div>
					                                  </div>
					                                  <div class="card-footer">
					                                    <div class="stats">
					                                      <i class="material-icons">access_time</i>
					                                      <a href="#" class="text-dark"><?php echo time_elapsed_string($row['announcement_date']); ?></a>
					                                    </div>
					                                  </div>
					                                </div>
					                              </div>
					                            </td>
					                        </tr>
					                        <?php 
					                          endforeach;
					                        ?>
					                      </tbody>
					                    </table>
					                </div><!-- End of Card Body -->
				              	</div>
				            </div>
				        </div>
			    	</div>
			    	<?php  
				      function time_elapsed_string($datetime, $full = false) {
				        $now = new DateTime;
				        $ago = new DateTime($datetime);
				        $diff = $now->diff($ago);

				        $diff->w = floor($diff->d / 7);
				        $diff->d -= $diff->w * 7;

				        $string = array(
				            'y' => 'year',
				            'm' => 'month',
				            'w' => 'week',
				            'd' => 'day',
				            'h' => 'hour',
				            'i' => 'minute',
				            's' => 'second',
				        );
				        foreach ($string as $k => &$v) {
				            if ($diff->$k) {
				                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
				            } else {
				                unset($string[$k]);
				            }
				        }
				        if (!$full) $string = array_slice($string, 0, 1);
				        return $string ? implode(', ', $string) . ' ago' : 'just now';
				      }
				    ?>