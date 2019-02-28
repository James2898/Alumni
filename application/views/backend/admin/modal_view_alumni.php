<?php  

    $this->db->select("*");
    $this->db->from('alumni');
    $this->db->join('courses','alumni.alumni_degree = courses.course_ID');
    $this->db->where('alumni_student_ID',$param1);

    $query = $this->db->get()->result_array();
    foreach ($query as $row):
?>
	          <div class="content bg-light p-3" >
	            <div class="container-fluid">
	              <div class="row">
	                <div class="col-md-12">
	                  <div class="profile-img my-2">
	                    <img src="<?php echo base_url() ?>/assets/img/profile_picture/16004187600.jpg" alt=""/>
	                  </div>
	                  <div class="text-center">
	                    <h3>
	                      <?php echo $row['alumni_fname']." ".$row['alumni_mname']." ".$row['alumni_lname']?> <a href="#" class="text-danger"><i class="material-icons">edit</i></a>
	                    </h3>
	                    <h4>
	                      <?php echo $row['course_description'] ?> Major in Network Administration
	                    </h4>
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
	                                                  	<div class="col-md-6">
	                                                      <label>Student No.</label>
	                                                  	</div>
	                                                  	<div class="col-md-6">
	                                                    	<p><?php echo $row['alumni_student_ID'] ?></p>
	                                                  	</div>
	                                              </div>
	                                              <div class="row">
	                                                  <div class="col-md-6">
	                                                      <label>Mobile No.</label>
	                                                  </div>
	                                                  <div class="col-md-6">
	                                                      <p><?php echo $row['alumni_cno'] ?></p>
	                                                  </div>
	                                              </div>
	                                              <div class="row">
	                                                  <div class="col-md-6">
	                                                      <label>Landline No.</label>
	                                                  </div>
	                                                  <div class="col-md-6">
	                                                      <p><?php echo $row['alumni_lno'] ?></p>
	                                                  </div>
	                                              </div>
	                                              <div class="row">
	                                                  <div class="col-md-6">
	                                                      <label>Email</label>
	                                                  </div>
	                                                  <div class="col-md-6">
	                                                      <p><?php echo $row['alumni_email'] ?></p>
	                                                  </div>
	                                              </div>
	                                              <div class="row">
	                                                  <div class="col-md-6">
	                                                      <label>Year Graduated</label>
	                                                  </div>
	                                                  <div class="col-md-6">
	                                                      <p><?php echo $row['alumni_grad_year'] ?></p>
	                                                  </div>
	                                              </div>
	                                              <div class="row">
	                                                  <div class="col-md-6">
	                                                      <label>Facebook</label>
	                                                  </div>
	                                                  <div class="col-md-6">
	                                                      <a href="#" class="text-danger"><?php echo $row['alumni_facebook'] ?></a>
	                                                  </div>
	                                              </div>
	                                              <div class="row">
	                                                  <div class="col-md-6">
	                                                      <label>LinkedIn</label>
	                                                  </div>
	                                                  <div class="col-md-6">
	                                                      <a href="#" class="text-danger"><?php echo $row['alumni_linkedin'] ?></a>
	                                                  </div>
	                                              </div>
	                                              <div class="row">
	                                                  <div class="col-md-6">
	                                                      <label>Website</label>
	                                                  </div>
	                                                  <div class="col-md-6">
	                                                      <a href="#" class="text-danger"><?php echo $row['alumni_website'] ?></a>
	                                                  </div>
	                                              </div>
	                                  </div>
	                              </div>
	                          </div>
	                        </div>
	                      </div>
	                  </div>
	                  <div class="card">
	                      <div class="card-header card-header-danger">
	                        <h4 class="card-title"><i class="fa fa-briefcase"></i>  Work</h4>
	                      </div>
	                      <div class="card-body">
	                        <div class="table-responsive">
	                          <table class="table text-center">
	                            <thead class="text-danger">
	                              <th>Date</th>
	                              <th>Company</th>
	                              <th>Position</th>
	                            </thead>
	                            <tbody>
	                              <tr>
	                                <td>2019</td>
	                                <td>Rushtek Inc.</td>
	                                <td>Software Engineer</td>
	                              </tr>
	                            </tbody>
	                          </table>
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