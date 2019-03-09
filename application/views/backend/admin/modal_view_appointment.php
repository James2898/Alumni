    <div class="container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-tabs card-header-danger">
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
							<?php echo form_open('admin/appointment/edit/'.$param1, 'class="login100-form validate-form"','role="form"','id="form_login"'); ?>
					          	<div class="row">
					                <div class="col-md-12">
					                    <div class="form-group">
					                    	<label class="bmd-label-floating">Alumni</label>
					                        <select id="" class="add_appointment" name="appointment_alumni_ID[]" searchable="Search here.">
					                            <?php  
					                              $this->db->select("*");
					                                $this->db->from('alumni');
					                                $this->db->join('courses','alumni.alumni_degree = courses.course_ID');
					                                $query2 = $this->db->get()->result_array();
					                                $last_category = '';
					                                foreach($query2 as $row2):
					                                if($last_category != $row['alumni_degree'])
					                                  echo "<optgroup label='".$row2['course_description']."'>";
					                            ?>
					                             	<option value="<?php echo $row2['alumni_student_ID'] ?>" <?php if($row2['alumni_student_ID'] == $row['appointment_alumni_ID']) echo "selected"; ?>>
					                             		<?php echo $row2['alumni_student_ID']." - ".$row2['alumni_fname']." ".$row2['alumni_lname'] ?>
					                         		</option>
					                            <?php 
					                                if($last_category != $row2['alumni_degree'])
					                                    echo "</optgroup>";
					                                $last_category = $row2['alumni_degree'];
					                                endforeach;
					                            ?>
					                        </select>
					                    </div>
					                </div>
					            	<div class="clearfix"></div>
					          	</div>
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
					                        <label class="bmd-label-floating">Status</label>
					                        <select class="form-control" name="appointment_status">
					                        	<option value="Approved" <?php if($row['appointment_status'] == 'Approved') echo "selected" ?>>Approved</option>
					                        	<option value="Waiting" <?php if($row['appointment_status'] == 'Waiting') echo "selected" ?>>Waiting</option>
					                        	<option value="Cancelled" <?php if($row['appointment_status'] == 'Cancelled') echo "selected" ?>>Cancelled</option>
					                        </select>
					                    </div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<button class="btn btn-danger pull-right">Delete</button>
										<button type="submit" class="btn btn-danger pull-right">Update</button>
									</div>
								</div>
						  	<?php echo form_close(); ?>
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
	          buttonClass: 'btn btn-danger',
	          buttonWidth: '100%',
	          maxHeight: 450 ,
	          enableFiltering: true,
	          filterPlaceholder: 'Search for alumni...'
	        });
	     });
      	$(document).ready(function() {
	        $('.add_appointment').multiselect({
	          nonSelectedText: 'Scheduled',    
	          buttonClass: 'btn btn-danger',
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