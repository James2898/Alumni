<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-tabs card-header-<?php echo $_SESSION['theme_color'] ?>">
						<div class="nav-tabs-navigation">
							<div class="nav-tabs-wrapper">
								<ul class="nav nav-tabs" data-tabs="tabs">
									<li class="nav-item">
										<a class="nav-link active" href="#list" data-toggle="tab">
											<i class="material-icons">event_note</i> Calendar
											<div class="ripple-container"></div>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#add" data-toggle="tab">
											<i class="material-icons">person_add</i> My Appointments
											<div class="ripple-container"></div>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div><!-- End of Card Header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="tab-pane table-responsive active" id="list">
								<div id="calendar"></div>
							</div>
							<div class="tab-pane" id="add">
								<table class="table display nowrap" id="table1">
									<thead class="text-<?php echo $_SESSION['theme_color']?>">
										<th>Date</th>
										<th>Time</th>
										<th>Alumni</th>
										<th>Details</th>
										<th></th>
									</thead>
									<tbody>
										<?php 
											$this->db->select('*');
											$this->db->from('appointment');
											$this->db->join('alumni','alumni.alumni_student_ID = appointment.appointment_alumni_ID');
											$this->db->order_by('appointment_date_start','DESC');
										
											$query = $this->db->get()->result_array();
											foreach ($query as $row):
										?>
										<tr>
											<td>
												<?php echo $row['appointment_date_start'] ?>
											</td>
											<td>
												<?php echo $row['appointment_time_start']." - ".$row['appointment_time_end'] ?>
											</td>
											<td>
												<?php echo $row['alumni_fname']." ".$row['alumni_mname']." ".$row['alumni_lname'] ?>
											</td>
											<td>
												<?php echo $row['appointment_details'] ?>
											</td>
											<td>
												<?php 

													if($row['appointment_date_start'] < date('Y-m-d')){
														if($row['appointment_status'] == 'Approved'){
															echo "Completed";
														}else{
															echo $row['appointment_status'];
														}
													}else{
														echo $row['appointment_status'];
													}

													

												?>
											</td>
										</tr>
										<?php  
											endforeach;
										?>
									</tbody>
								</table>
							</div>
						</div><!-- End of Tab Content -->
					</div><!-- End of Card Body -->
				</div>
			</div>
		</div>
	</div>
</div>

















