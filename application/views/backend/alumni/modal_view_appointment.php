    <div class="container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-tabs card-header-<?php echo $_SESSION['theme_color'] ?>">
                <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a href="#list" class="nav-link" data-toggle="tab">
                            <i class="material-icons">event_note</i> Scheduled Appointments
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content">
					<div class="tab-pane active" id="list">
							<?php  
						    	$this->db->select("*");
						        $this->db->from('appointment');
						        $this->db->join('alumni','alumni.alumni_student_ID = appointment.appointment_alumni_ID');
						        $this->db->where('appointment_ID',$param1);
								$query = $this->db->get()->result_array();
								foreach ($query as $row):
							?>
							<?php echo form_open('alumni/appointment/edit/'.$param1, 'class="login100-form validate-form"','role="form"','id="form_login"'); ?>
					          	<div class="row">
					          		<div class="col-md-12">
					          			<div class="form-group">
					          				<label class="bmd-label-floating">Date</label>
					          				<input class="form-control" type="date" name="appointment_date_start" value="<?php echo $row['appointment_date_start'] ?>" min="<?php echo date('Y-m-d') ?>">
					          			</div>
					          		</div>
					          	</div>
							    <div class="row">
							        <div class="col-md-6">
							        	<div class="form-group">
							        		<label  class="bmd-label-floating">Time Start</label>
							        		<input class="form-control" name="appointment_time_start" type="time" id="time_startID" value="<?php echo $row['appointment_time_start'] ?>" min="08:00" max="16:00"required>
									  </div>
							        </div>
							        <div class="col-md-6">
							        	<div class="form-group">
							        		<label  class="bmd-label-floating">Time End</label>
							        		<input class="form-control" name="appointment_time_end" type="time" id="time_endID" value="<?php echo $row['appointment_time_end'] ?>" min="08:00" max="16:00"required>
									  </div>
							        </div>
							    </div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
					                        <label class="bmd-label-floating">Appointment Details</label>
					                        <textarea rows="5" class="form-control"name="appointment_details"><?php echo $row['appointment_details'] ?></textarea>
					                    </div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="bmd-label-floating">Appointment Status</label>
											<input type="text" class="form-control" value="<?php echo $row['appointment_status'] ?>" disabled>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										
										<button type="submit" class="btn btn-<?php echo $_SESSION['theme_color'] ?> pull-right">Update</button>
									
						  	<?php echo form_close(); ?>
						  	<?php echo form_open('alumni/appointment/cancel/'.$param1, 'class="login100-form validate-form"','role="form"','id="form_login"'); ?>
										<button type="submit" class="btn btn-<?php echo $_SESSION['theme_color'] ?> pull-right">Cancel Appointment</button>
							<?php echo form_close(); ?>
									</div>
								</div>
							<?php 
								endforeach; 
							?>
					</div>
                </div>
          	</div>
		</div>
  	</div>
    </div>
</div>
      <script type="text/javascript">
      	$(document).ready(function() {
	        $('#example-getting-started').multiselect({
	          nonSelectedText: 'Scheduled',    
	          buttonClass: 'btn btn-<?php echo $_SESSION['theme_color'] ?>',
	          buttonWidth: '100%',
	          maxHeight: 450 ,
	          enableFiltering: true,
	          filterPlaceholder: 'Search for alumni...'
	        });
	     });
      	$(document).ready(function() {
	        $('.add_appointment').multiselect({
	          nonSelectedText: 'Scheduled',    
	          buttonClass: 'btn btn-<?php echo $_SESSION['theme_color'] ?>',
	          buttonWidth: '100%',
	          maxHeight: 450 ,
	          enableFiltering: true,
	          filterPlaceholder: 'Search for alumni...'
	        });
	     });
	  	</script>
	  	<script type="text/javascript">
	  		document.getElementById("time_startID").onchange = function (){
			  var input = document.getElementById("time_endID");
			  input.min = this.value;
			}
	  	</script>	