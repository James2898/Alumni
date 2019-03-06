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
					<?php echo form_open_multipart('admin/upload/'.$row['alumni_student_ID'], 'class="col-md-12"');?>
					
	              		<div class="col-md-12">
	                  		<div class="profile-img my-2">
			                    <?php 
			                  		if($row['alumni_profile_picture'] == 'empty'){
			                  			echo "<img width='50%' height='50%' src='".base_url()."/assets/img/profile_picture/blank.png'  id='blah' alt=/>";
			                  		}else{
			                  			echo "<img width='50%' height='50%' src='".base_url()."/assets/img/profile_picture/".$row['alumni_profile_picture']."' name='profile_picture' id='blah' alt=/>";
			                  		} 
			                  	?>
	                  		</div>
	                  		<div class="text-center">
								<input type='file' class="btn-file btn btn-danger" name='profile_picture' onchange="readURL(this);" />
			                  	<input type="submit" class="btn btn-danger btn-sm" value="Change">
			                </div >	
	              		</div>
	              	<?php echo form_close(); ?>
                  	<div class="card">
                      	<div class="card-header card-header-danger">
                        	<div class="nav-tabs-navigation">
	                    		<div class="nav-tabs-wrapper">
	                      			<ul class="nav nav-tabs" data-tabs="tabs">
		                            	<li class="nav-item">
		                              		<a class="nav-link active" href="#about" data-toggle="tab">
		                                		<i class="material-icons">info</i> About 
		                                		<div class="ripple-container"></div>
		                              		</a>
		                            	</li>
		                            	<li class="nav-item">
		                            		<a class="nav-link " href="#work_experience" data-toggle="tab">
		                                		<i class="material-icons">work</i> Work Experience
		                                		<div class="ripple-container"></div>
		                              		</a>
		                            	</li>
	                        		</ul>
	                      		</div>
	                    	</div>
                      	</div>
                      	<div class="card-body">
                      		<div class="tab-content">
                      			<div class="tab-pane active" id="about">
	                              	<?php echo form_open('admin/alumni/edit_about/'.$row['alumni_student_ID'], 'class="login100-form validate-form col-md-12"','role="form"','id="form_login"'); ?>
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
                                          	<div class="col-md-4">
                                          		<div class="form-group">
                                          			<label class="bmd-label-floating">First Name</label>
                                          			<input type="text" name="alumni_fname" class="form-control" value="<?php echo $row['alumni_fname'] ?>">
                                          		</div>
                                          	</div>
                                          	<div class="col-md-4">
                                          		<div class="form-group">
                                          			<label class="bmd-label-floating">Middle Name</label>
                                          			<input type="text" name="alumni_mname" class="form-control" value="<?php echo $row['alumni_mname'] ?>">
                                          		</div>
                                          	</div>
                                          	<div class="col-md-4">
                                          		<div class="form-group">
                                          			<label class="bmd-label-floating">Last Name</label>
                                          			<input type="text" name="alumni_lname" class="form-control" value="<?php echo $row['alumni_lname'] ?>">
                                          		</div>
                                          	</div>
                                        </div>
                                        <div class="row">
                                          	<div class="col-md-12">
                                          		<div class="form-group">
                                          			<label class="bmd-label-floating">Gender</label>
                                          			<select class="form-control" name="alumni_gender">
                                          				<option value="Male" <?php if($row['alumni_gender'] == 'Male') echo 'selected' ?>>Male</option>
                                          				<option value="Female" <?php if($row['alumni_gender'] == 'Female') echo 'selected' ?>>Female</option>
                                          			</select>
                                          		</div>
                                          	</div>
                                        </div>
                                        <div class="row">
                                          	<div class="col-md-6">
                                          		<div class="form-group">
                                          			<label class="bmd-label-floating">Mobile No.</label>
                                          			<input type="text" name="alumni_cno" class="form-control" value="<?php echo $row['alumni_cno'] ?>">
                                          		</div>
                                          	</div>
                                          	<div class="col-md-6">
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
                                          	<div class="col-md-4">
                                          		<div class="form-group">
                                          			<label class="bmd-label-floating">Facebook</label>
                                          			<input type="text" name="alumni_facebook" class="form-control" value="<?php echo $row['alumni_facebook'] ?>">
                                          		</div>
                                          	</div>
                                          	<div class="col-md-4">
                                          		<div class="form-group">
                                          			<label class="bmd-label-floating">LinkedIn</label>
                                          			<input type="text" name="alumni_linkedin" class="form-control" value="<?php echo $row['alumni_linkedin'] ?>">
                                          		</div>
                                          	</div>
                                          	<div class="col-md-4">
                                          		<div class="form-group">
                                          			<label class="bmd-label-floating">Website</label>
                                          			<input type="text" name="alumni_website" class="form-control" value="<?php echo $row['alumni_website'] ?>">
                                          		</div>
                                          	</div>
                                        </div>
                                        <div class="text-center">
				                        	<button type="submit" class="btn btn-danger">Update</button>
				                        </div>
                                   	<?php echo form_close(); ?>
                              	</div>
                              	<div class="tab-pane" id="work_experience">
                              		<div class="card"><!-- CURRENTLY WORKS AT -->
					                    <div class="card-header card-header-danger">
				                        	<div class="nav-tabs-navigation">
					                        	<div class="nav-tabs-wrapper">
					                          		<ul class="nav nav-tabs" data-tabs="tabs">
							                            <li class="nav-item">
							                              	<a class="nav-link active" href="#work" data-toggle="tab">
							                                	<i class="material-icons">ballot</i> Edit
							                                	<div class="ripple-container"></div>
							                              	</a>
							                            </li>
							                            <li class="nav-item">
							                            	<a class="nav-link " href="#add_work" data-toggle="tab">
							                                	<i class="material-icons">note_add</i> New 
							                                	<div class="ripple-container"></div>
							                              </a>
							                            </li>
					                            	</ul>
					                          	</div>
					                        </div>
					                    </div>
										
					                    <div class="card-body">
					                      	<div class="tab-content">
					                      		<!-- 
													############################
															EDIT WORK INFO
													###########################	
															
					                      		-->
					                      		<div class="tab-pane active" id="work">
						                      		<?php  
							                            $this->db->select("*");
														$this->db->from('work');
														$this->db->join('alumni','alumni.alumni_student_ID = work.work_alumni_student_ID');
														$this->db->join('salary','work.work_alumni_salary_range = salary.salary_ID');
														$this->db->where('alumni_student_ID',$param1);
														$query2 = $this->db->get()->result_array();
						   								foreach ($query2 as $row2):
													?>
													<?php echo form_open('admin/edit_work/'.$param1, 'class="login100-form validate-form"','role="form"','id="form_login"'); ?>
							                      		<div class="row">
															<div class="col-md-6">
																<div class="form-group">
								                                    <label class="bmd-label-floating">Position</label>
								                                    <input type="text" name="work_alumni_position" class="form-control" value="<?php echo $row2['work_alumni_position'] ?>">
								                                </div>
															</div>
															<div class="col-md-6">
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
																	<label class="bmd-label-floating">Industry</label>
																	<select class="form-control" name="work_industry">
																		<?php  
												                            $this->db->select("*");
																			$this->db->from('industry');
																			$query3 = $this->db->get()->result_array();
											   								foreach ($query3 as $row3):
																		?>

																			<option value="<?php echo $row3['industry_ID'] ?>" <?php if($row2['work_industry'] == $row3['industry_ID']) echo "selected" ?>>
																				<?php echo $row3['industry_title'] ?>
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
																	<label class="bmd-label-floating">Salary</label>
																	<select class="form-control" name="work_industry">
																		<?php  
												                            $this->db->select("*");
																			$this->db->from('salary');
																			$query3 = $this->db->get()->result_array();
											   								foreach ($query3 as $row3):
																		?>

																			<option value="<?php $row3['salary_ID'] ?>" <?php if($row3['salary_ID'] == $row2['work_alumni_salary_range']) echo "selected"; ?>>
																				<?php echo $row3['salary_range'] ?>
																			</option>

																		<?php  

																			endforeach;

																		?>
																	</select>
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
								                                    <label class="bmd-label-floating">Date Ended (Blank if employed)</label>
								                                    <input type="month" name="work_alumni_end" class="form-control" value="<?php echo $row2['work_alumni_end'] ?>">
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
					                      		<!-- 
													############################
															ADD WORK
													###########################	
															
					                      		-->
						                      	<div class="tab-pane" id="add_work">
						                      		<?php echo form_open('admin/alumni/create_work/'.$param1, 'class="login100-form validate-form col-md-12"','role="form"','id="form_login"'); ?>
						                      			<div class="row">
						                      				<div class="col-md-6">
						                      					<div class="form-group">
						                      						<label class="bmd-label-floating">Position</label>
						                      						<input type="text" name="work_alumni_position" class="form-control">
						                      					</div>
						                      				</div>
						                      				<div class="col-md-6">
						                      					<div class="form-group">
						                      						<label class="bmd-label-floating">Company Name</label>
						                      						<input type="text" name="work_company_name" class="form-control">
						                      					</div>
						                      				</div>
						                      				<div class="col-md-12">
						                      					<div class="form-group">
						                      						<label class="bmd-label-floating">Company Address</label>
						                      						<input type="text" name="work_company_address" class="form-control">
						                      					</div>
						                      				</div>
						                      				<div class="col-md-12">
																<div class="form-group">
																	<label class="bmd-label-floating">Industry</label>
																	<select class="form-control" name="work_industry">
																		<?php  
												                            $this->db->select("*");
																			$this->db->from('industry');
																			$query3 = $this->db->get()->result_array();
											   								foreach ($query3 as $row3):
																		?>

																			<option value="<?php echo $row3['industry_ID'] ?>">
																				<?php echo $row3['industry_title'] ?>
																			</option>

																		<?php  

																			endforeach;

																		?>
																	</select>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<label class="bmd-label-floating">Salary</label>
																	<select class="form-control" name="work_alumni_salary_range">
																		<?php  
												                            $this->db->select("*");
																			$this->db->from('salary');
																			$query3 = $this->db->get()->result_array();
											   								foreach ($query3 as $row3):
																		?>

																			<option value="<?php echo $row3['salary_ID'] ?>">
																				<?php echo $row3['salary_range'] ?>
																			</option>

																		<?php  

																			endforeach;

																		?>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
								                                    <label class="bmd-label-floating">Date Started</label>
								                                    <input type="month" name="work_alumni_start" class="form-control">
								                                </div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
								                                    <label class="bmd-label-floating">Date Ended (Blank if employed)</label>
								                                    <input type="month" name="work_alumni_end" class="form-control">
								                                </div>
															</div>
															<div class="col-md-12">
									                        	<button type="submit" class="btn btn-danger pull-right">Add</button>
									                        </div>
						                      			</div>
						                      		<?php echo form_close(); ?>
						                      	</div>
				                      		</div>
				                      	</div>
				                  	</div><!-- END -->
                              	</div>
                			</div>
              			</div>
              		</div>
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