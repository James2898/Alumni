<?php  

    $this->db->select("*");
    $this->db->from('alumni');
    $this->db->where('alumni_student_ID',$param1);

    $query = $this->db->get()->result_array();
    foreach ($query as $row):
?>
	          <div class="content bg-light" >
	            <div class="container-fluid">
	              <div class="row">
	                <?php echo form_open('admin/alumni/edit/'.$row['alumni_student_ID'], 'class="login100-form validate-form col-md-12"','role="form"','id="form_login"'); ?>
	                  <div class="profile-img my-2">
	                    <img src="<?php echo base_url() ?>/assets/img/profile_picture/<?php echo $row['alumni_profile_picture'] ?>" alt=""/>
	                  </div>
	                  <div class="card">
	                      <div class="card-header card-header-danger">
	                        <h4 class="card-title"><i class="fa fa-info-circle"></i> About</h4>
	                      </div>
	                      <div class="card-body">
	                        <div class="row">
	                          <div class="col-md-12">
	                              <div>
	                                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	                                              <div class="row">
	                                              	<div class="col-md-12">
	                                              		<div class="form-group">
	                                              			<label class="bmd-label-floating">Course</label>
	                                              			<select class="form-control" name="alumni_degree">
	                                              				<?php  
									                              	$this->db->select("*");
																    $this->db->from('courses');
																    $this->db->order_by('courses.course_ID', 'ASC');
																    $query2 = $this->db->get()->result_array();
								   									foreach ($query2 as $row2):
									                            ?>
									                            	<option value="<?php echo $row2['course_ID'] ?>"
									                            			<?php  
									                            				if($row2['course_ID'] == $row['alumni_degree']){echo 'selected';}
									                            			?>	
									                            	>
									                            		<?php echo $row2['course_description'];?>
									                            	</option>	
									                            <?php  
									                            	endforeach;
									                            ?>
	                                              			</select>
	                                              		</div>
	                                              	</div>
	                                              </div>
	                                              <div class="row">
	                                              	<div class="col-md-12">
	                                              		<div class="form-group">
	                                              			<label class="bmd-label-floating">First Name</label>
	                                              			<input type="text" name="alumni_fname" class="form-control" value="<?php echo $row['alumni_fname'] ?>">
	                                              		</div>
	                                              	</div>
	                                              </div>
	                                              <div class="row">
	                                              	<div class="col-md-12">
	                                              		<div class="form-group">
	                                              			<label class="bmd-label-floating">Middle Name</label>
	                                              			<input type="text" name="alumni_mname" class="form-control" value="<?php echo $row['alumni_mname'] ?>">
	                                              		</div>
	                                              	</div>
	                                              </div>
	                                              <div class="row">
	                                              	<div class="col-md-12">
	                                              		<div class="form-group">
	                                              			<label class="bmd-label-floating">Last Name</label>
	                                              			<input type="text" name="alumni_lname" class="form-control" value="<?php echo $row['alumni_lname'] ?>">
	                                              		</div>
	                                              	</div>
	                                              </div>
	                                              <div class="row">
	                                              	<div class="col-md-12">
	                                              		<div class="form-group">
	                                              			<label class="bmd-label-floating">Mobile No.</label>
	                                              			<input type="text" name="alumni_cno" class="form-control" value="<?php echo $row['alumni_cno'] ?>">
	                                              		</div>
	                                              	</div>
	                                              </div>
	                                              <div class="row">
	                                              	<div class="col-md-12">
	                                              		<div class="form-group">
	                                              			<label class="bmd-label-floating">Landline No.</label>
	                                              			<input type="text" name="alumni_lno" class="form-control" value="<?php echo $row['alumni_lno'] ?>">
	                                              		</div>
	                                              	</div>
	                                              </div>
	                                              <div class="row">
	                                              	<div class="col-md-12">
	                                              		<div class="form-group">
	                                              			<label class="bmd-label-floating">Address</label>
	                                              			<input type="text" name="alumni_address" class="form-control" value="<?php echo $row['alumni_address'] ?>">
	                                              		</div>
	                                              	</div>
	                                              </div>
	                                              <div class="row">
	                                              	<div class="col-md-12">
	                                              		<div class="form-group">
	                                              			<label class="bmd-label-floating">Email</label>
	                                              			<input type="text" name="alumni_email" class="form-control" value="<?php echo $row['alumni_email'] ?>">
	                                              		</div>
	                                              	</div>
	                                              </div>
	                                              <div class="row">
	                                              	<div class="col-md-12">
	                                              		<div class="form-group">
	                                              			<label class="bmd-label-floating">Year Graduated</label>
	                                              			<select class="form-control" name="alumni_grad_year">
	                                              				<?php 
	                                              					$grad_year = $row['alumni_grad_year'];
	                                              					for ($date = 2000; $date <= date('Y'); $date++) { 	
	                                              						$selected = '';
	                                              						if($grad_year == $date){
	                                              							$selected = 'selected';
	                                              						}
	                                              						echo "<option ".$selected." >";
	                                              						echo $date;
	                                              						echo "</option>";
	                                              					}	
	                                              				?>
	                                              			</select>
	                                              		</div>
	                                              	</div>
	                                              </div>

	                                              <div class="row">
	                                              	<div class="col-md-12">
	                                              		<div class="form-group">
	                                              			<label class="bmd-label-floating">Facebook</label>
	                                              			<input type="text" name="alumni_facebook" class="form-control" value="<?php echo $row['alumni_facebook'] ?>">
	                                              		</div>
	                                              	</div>
	                                              </div>
	                                              <div class="row">
	                                              	<div class="col-md-12">
	                                              		<div class="form-group">
	                                              			<label class="bmd-label-floating">LinkedIn</label>
	                                              			<input type="text" name="alumni_linkedin" class="form-control" value="<?php echo $row['alumni_linkedin'] ?>">
	                                              		</div>
	                                              	</div>
	                                              </div>
	                                              <div class="row">
	                                              	<div class="col-md-12">
	                                              		<div class="form-group">
	                                              			<label class="bmd-label-floating">Website</label>
	                                              			<input type="text" name="alumni_website" class="form-control" value="<?php echo $row['alumni_website'] ?>">
	                                              		</div>
	                                              	</div>
	                                              </div>
	                                  </div>
	                              </div>
	                          </div>
	                        </div>
	                        <div class="text-center">
	                        	<button type="submit" class="btn btn-danger">Update</button>
	                        </div>
	                        
	                      </div>
	                  </div>
	                  <?php echo form_close(); ?>
	                  <div class="card"><!-- CURRENTLY WORKS AT -->
	                      <div class="card-header card-header-danger">
	                        <h4 class="card-title"><i class="fa fa-briefcase"></i>Work Experience</h4>
	                      </div>
	                      	<?php  
	                            $this->db->select("*");
								$this->db->from('work');
								$this->db->join('alumni','alumni.alumni_student_ID = work.work_alumni_student_ID');
								$this->db->join('salary','work.work_alumni_salary_range = salary.salary_ID');
								$this->db->where('alumni_student_ID',$param1);
								$this->db->where('work_alumni_status !=','Inactive');

								$query2 = $this->db->get()->result_array();
   								foreach ($query2 as $row2):
							?>
							<?php echo form_open('admin/edit_alumni_work', 'class="login100-form validate-form"','role="form"','id="form_login"'); ?>
	                      <div class="card-body">
	                      	<div class="row">
								<div class="col-md-12">
									<div class="form-group">
	                                    <label class="bmd-label-floating">Position</label>
	                                    <input type="text" name="alumni_work" class="form-control" value="<?php echo $row2['work_alumni_position'] ?>">
	                                </div>
								</div>
							</div>
	                      	<div class="row">
								<div class="col-md-12">
									<div class="form-group">
	                                    <label class="bmd-label-floating">Company Name</label>
	                                    <input type="text" name="work_company_name" class="form-control" value="<?php echo $row2['work_company_name'] ?>">
	                                </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
	                                    <label class="bmd-label-floating">Company Address</label>
	                                    <input type="text" name="work_company_address" class="form-control" value="<?php echo $row2['work_company_address'] ?>">
	                                </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
	                                    <label class="bmd-label-floating">Salary Range</label>
	                                    <input type="text" name="salary_range" class="form-control" value="<?php echo $row2['salary_range'] ?>">
	                                </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
	                                    <label class="bmd-label-floating">Date Started</label>
	                                    <input type="month" name="work_alumni_start" class="form-control" value="<?php echo $row2['work_alumni_start'] ?>">
	                                </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
	                                    <label class="bmd-label-floating">Date Ended</label>
	                                    <input type="month" name="work_alumni_end" class="form-control" value="<?php echo $row2['work_alumni_end'] ?>">
	                                </div>

								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button class="btn btn-danger btn-sm pull-right">Delete</button>
									<button type="submit" class="btn btn-danger btn-sm pull-right">Update</button>
								</div>
							</div>
	                      </div>
	                      <?php echo form_close(); ?>
	                      <?php endforeach; ?>
	                  </div><!-- END -->
	              </div>
	               
	            </div>
	          </div>
<?php  
    endforeach;
?>


    <script type="text/javascript">
        $(function () {
            $('#datetimepicker10').datetimepicker({
                viewMode: 'years',
                format: 'MM/YYYY'
            });
        });
    </script>