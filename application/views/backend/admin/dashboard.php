					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-6">
			              		<div class="card card-stats">
			                		<div class="card-header card-header-primary card-header-icon">
			                  			<div class="card-icon">
			                    			<i class="material-icons">school</i>
			                  			</div>
			                  			<?php  
			                  				$total_alumni = $this->db->get('alumni')->num_rows();
			                  			?>
			                  			<p class="card-category">Total Alumni</p>
			                  			<h3 class="card-title"><?php echo $total_alumni ?></h3>
			                		</div>
			                		<div class="card-footer ">
			                  			<div class="stats">
				                    		<i class="material-icons">local_offer</i> Tracked from Github
			                  			</div>
			                		</div>
			              		</div>
			            	</div>
							<div class="col-lg-4 col-md-6 col-sm-6">
			              		<div class="card card-stats">
			                		<div class="card-header card-header-success card-header-icon">
			                  			<div class="card-icon">
			                    			<i class="material-icons">work</i>
			                  			</div>
			                  			<?php  
			                  				$total_alumni = $this->db->get('alumni')->num_rows();
			                  				$total_employed = $this->db->select('DISTINCT(work_alumni_student_ID)')->from('work')->where('work_alumni_end','')->get()->num_rows();
			                  			?>
			                  			<p class="card-category">Employed Alumni</p>
			                  			<h3 class="card-title"><?php echo $total_employed ?></h3>
			                		</div>
			                		<div class="card-footer">
			                  			<div class="stats">
				                    		<i class="material-icons">local_offer</i> Tracked from Github
			                  			</div>
			                		</div>
			              		</div>
			            	</div>
			            	<div class="col-lg-4 col-md-6 col-sm-6">
			              		<div class="card card-stats">
			                		<div class="card-header card-header-danger card-header-icon">
			                  			<div class="card-icon">
			                    			<i class="material-icons">work_off</i>
			                  			</div>
			                  			<?php  
			                  				$total_alumni = $this->db->get('alumni')->num_rows();
			                  				$total_employed = $this->db->select('DISTINCT(work_alumni_student_ID)')->from('work')->where('work_alumni_end','')->get()->num_rows();
			                  				$total_unemployed = $total_alumni - $total_employed;
			                  			?>
			                  			<p class="card-category">Unemployed Alumni</p>
			                  			<h3 class="card-title"><?php echo $total_unemployed ?></h3>
			                		</div>
			                		<div class="card-footer">
			                  			<div class="stats">
				                    		<i class="material-icons">local_offer</i> Tracked from Github
			                  			</div>
			                		</div>
			              		</div>
			            	</div>
			            	<div class="col-lg-4 col-md-6 col-sm-6">
			              		<div class="card card-stats">
			                		<div class="card-header card-header-danger card-header-icon">
			                  			<div class="card-icon">
			                    			<i class="material-icons">info</i>
			                  			</div>
			                  			<?php  
			                  				$total_alumni = $this->db->get('alumni')->num_rows();
			                  				$total_employed = $this->db->select('DISTINCT(work_alumni_student_ID)')->from('work')->get()->num_rows();
			                  				$total_unemployed = $total_alumni - $total_employed;
			                  			?>
			                  			<p class="card-category">No Work Experience</p>
			                  			<h3 class="card-title"><?php echo $total_unemployed ?></h3>
			                		</div>
			                		<div class="card-footer">
			                  			<div class="stats">
				                    		<i class="material-icons">local_offer</i> Tracked from Github
			                  			</div>
			                		</div>
			              		</div>
			            	</div>
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
			            	<div class="col-lg-4 col-md-6 col-sm-6">
								<div class="card card-stats">
									<div class="card-header card-header-info card-header-icon">
										<div class="card-icon">
			                    			<i class="material-icons">event_note</i>
			                  			</div>
			                  			<?php  
			                  				$appointment_requests = $this->db->get_where('appointment', array('appointment_status' => 'Waiting'))->num_rows();
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
			          	<!-- <div class="row">
			            	<div class="col-md-12">
			              		<div class="card card-chart">
			                		<div class="card-header card-header-success">
			                  			<div class="ct-chart" id="dailySalesChart"></div>
			                		</div>
			                		<div class="card-body">
			                  			<h4 class="card-title">Daily Sales</h4>
			                  			<p class="card-category">
			                    			<span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.
			                    		</p>
			                		</div>
			                		<div class="card-footer">
			                  			<div class="stats">
			                    			<i class="material-icons">access_time</i> updated 4 minutes ago
			                  			</div>
			                		</div>
			              		</div>
			            	</div>
			            	<div class="col-md-12">
								<div class="card card-chart">
				                	<div class="card-header card-header-warning">
				                  		<div class="ct-chart" id="websiteViewsChart"></div>
				                	</div>
				                	<div class="card-body">
				                		<h4 class="card-title">Email Subscriptions</h4>
				                  		<p class="card-category">Last Campaign Performance</p>
				                	</div>
				                	<div class="card-footer">
				                  		<div class="stats">
				                    		<i class="material-icons">access_time</i> campaign sent 2 days ago
				                  		</div>
				                	</div>
				              	</div>
			            	</div>
			        	</div> -->
				        <div class="row">	
				            <div class="col-lg-12 col-md-12">
								<div class="card">
					                <div class="card-header card-header-warning">
				                  		<h4 class="card-title">New Alumni</h4>
				                  		<p class="card-category">New employees on 15th September, 2016</p>
				                	</div><!-- End of Card Header -->
					                <div class="card-body table-responsive">
					                  	<table class="table table-hover">
					                    	<thead class="text-warning">
					                      		<th>USN</th>
					                      		<th>Name</th>
					                      		<th>Degree</th>
					                      		<th>Batch</th>
					                      		<th>Date Registered</th>
					                    	</thead>
					                    	<tbody>
					                    		<?php  
					                    			$this->db->select('*');
					                    			$this->db->from('alumni');
					                    			$this->db->join('courses','courses.course_ID = alumni.alumni_degree');
					                    			$this->db->order_by('alumni_ID','DESC');
					                    			$this->db->limit('5');

					                    			$query = $this->db->get()->result_array();
					                    			foreach($query as $row):
					                    		?>
					                      		<tr>
					                        		<td><?php echo $row['alumni_student_ID'] ?></td>
					                        		<td><?php echo $row['alumni_fname']." ".$row['alumni_mname']." ".$row['alumni_lname'] ?></td>
					                        		<td><?php echo $row['course_title'] ?></td>
					                        		<td><?php echo $row['alumni_grad_year'] ?></td>
					                        		<td><?php echo $row['alumni_register_date']; ?></td>
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