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
                          <a class="nav-link" data-toggle="tab">
                            <i class="material-icons">add_comment</i> Add Appointment
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content">
					<div class="tab-pane active" id="add">

							<?php echo form_open('admin/appointment/create/', 'class="login100-form validate-form"','role="form"','id="form_login"'); ?>
					          	<div class="row">
					                <div class="col-md-12">
					                    <div class="form-group">
					                    	<label class="bmd-label-floating">Alumni</label>
					                        <select id="appointment_alumni" name="appointment_alumni_ID[]" searchable="Search here." >
				                              <?php  
				                              $this->db->select("*");
				                                $this->db->from('alumni');
				                                $this->db->join('courses','alumni.alumni_degree = courses.course_ID');
				                                $query = $this->db->get()->result_array();
				                                $last_category = '';
				                                foreach($query as $row):
				                                  if($last_category != $row['alumni_degree'])
				                                    echo "<optgroup label='".$row['course_description']."'>";
				                              ?>
				                              <option value="<?php echo $row['alumni_student_ID'] ?>"><?php echo $row['alumni_student_ID']." - ".$row['alumni_fname']." ".$row['alumni_lname'] ?></option>
				                              <?php 
				                                  if($last_category != $row['alumni_degree'])
				                                    echo "</optgroup>";
				                                  $last_category = $row['alumni_degree'];
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
					          				<input class="form-control" type="date" name="appointment_date_start" value="<?php echo date('Y-m-d') ?>" min="<?php echo date('Y-m-d') ?>">
					          			</div>
					          		</div>
					          	</div>
							    <div class="row">
							        <div class="col-md-6">
							        	<div class="form-group">
							        		<label  class="bmd-label-floating">Time Start</label>
							        		<input class="form-control" name="appointment_time_start" type="time" id="time_startID" value="08:00" min="08:00" max="16:00" required>
									  </div>
							        </div>
							        <div class="col-md-6">
							        	<div class="form-group">
							        		<label  class="bmd-label-floating">Time End</label>
							        		<input class="form-control" name="appointment_time_end" type="time" id="time_endID" value="09:00" min="08:00" max="16:00" required>
									  </div>
							        </div>
							    </div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
					                        <label class="bmd-label-floating">Appointment Details</label>
					                        <textarea rows="5" class="form-control"name="appointment_details" required></textarea>
					                    </div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-<?php echo $_SESSION['theme_color'] ?> pull-right">Add</button>
									</div>
								</div>
						  	<?php echo form_close(); ?>
					</div>
                </div>
          	</div>
		</div>
  	</div>
    </div>
</div>
      <script type="text/javascript">
            $(document).ready(function() {
                $('#appointment_alumni').multiselect({
                    nonSelectedText: 'Alumni',    
                    buttonClass: 'btn btn-<?php echo $_SESSION['theme_color'] ?>',
                    buttonWidth: '100%',
                    maxHeight: 450,
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