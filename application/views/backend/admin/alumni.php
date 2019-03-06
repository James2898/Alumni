          <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header card-header-tabs card-header-danger">
                      <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                          <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                              <a class="nav-link active" href="#list" data-toggle="tab">
                                <i class="material-icons">list</i> Alumni List
                                <div class="ripple-container"></div>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#add" data-toggle="tab">
                                <i class="material-icons">person_add</i> Add Alumni
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
                                      <table class="table display nowrap" id="table1" >
                                        <thead class="text-danger">
                                          <th>
                                            USN
                                          </th>
                                          <th>
                                            Name
                                          </th>
                                          <th>
                                            Degree Program
                                          </th>
                                          <th>
                                            Year of Graduation
                                          </th>
                                          <th>
                                            Work Status
                                          </th>
                                          <th>
                                            Action 
                                          </th>                          
                                        </thead>
                                        <tbody>
                                          
                                          <?php  

                                            $this->db->select("*");
                                            $this->db->from('alumni');
                                            $this->db->join('courses','alumni.alumni_degree = courses.course_ID');
                                            $query = $this->db->get()->result_array();
                                            foreach($query as $row):

                                          ?>
                                          <tr>
                                            <td><?php echo $row['alumni_student_ID'] ?></td>
                                            <td><?php echo $row['alumni_fname']." ".$row['alumni_mname']." ".$row['alumni_lname']?></td>
                                            <td><?php echo $row['course_title']." - ".$row['alumni_major'] ?></td>
                                            <td><?php echo $row['alumni_grad_year'] ?></td>
                                            <td>
                                              <?php 
                                                $work_status = $this->db->select('*')->from('work')->where('work_alumni_student_ID',$row['alumni_student_ID'])->where('work_alumni_end','')->get()->num_rows();
                                                if($work_status > 0){
                                                  echo "Employed";
                                                }else{
                                                  echo "Unemployed";
                                                }
                                              ?>
                                            </td>
                                            <td>
                                              <div class="btn-group">
                                                <button class="btn btn-danger btn-sm dropdown-toggle" data-toggle='dropdown'>
                                                  Action
                                                </button>
                                                <ul class="dropdown-menu drop-down-danger pull-right" role="menu">
                                                    <li>
                                                      <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_view_alumni/<?php echo $row['alumni_student_ID'] ?>')">
                                                        <i class="material-icons">remove_red_eye</i>
                                                         View
                                                      </a>
                                                      <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_edit_alumni/<?php echo $row['alumni_student_ID'] ?>')">
                                                        <i class="material-icons">edit</i>
                                                         Edit
                                                       </a>
                                                      <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_delete_alumni/<?php echo $row['alumni_student_ID'] ?>')">
                                                        <i class="material-icons">delete</i> 
                                                         Delete
                                                       </a>
                                                    </li>
                                                    <li></li>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                              </div>
                                            </td>
                                          </tr>

                                          <?php 
                                            endforeach;
                                          ?>
                                        </tbody>
                                      </table>
                                </div>
                                <div class="tab-pane" id="add">
                                    <?php echo form_open('admin/alumni/create/', 'class="login100-form validate-form col-md-12"','role="form"','id="form_login"'); ?>
                                    <form>
                                      <!--  -->
                                      <div class="row">
                                        <div class="col-md-5">
                                          <div class="form-group">
                                            <label class="bmd-label-static text-danger">Degree Program</label>
                                            <select class="form-control text-muted" name="alumni_degree"> 
                                              <?php  
                                                $this->db->select("*");
                                                $this->db->from('courses');
                                                $this->db->order_by('courses.course_ID', 'ASC');
                                                $query2 = $this->db->get()->result_array();
                                                $last_category = '';
                                                foreach ($query2 as $row2):
                                                  if($last_category != $row2['course_college'])
                                                    echo "<optgroup label='".$row['course_college']."'>";
                                              ?>
                                                <option value="<?php echo $row2['course_ID'] ?>">
                                                  <?php echo $row2['course_description'];?>
                                                </option> 
                                              <?php  
                                                  if($last_category != $row2['course_college'])
                                                    echo "</optgroup>";
                                                  $last_category = $row2['course_college'];
                                                endforeach;
                                              ?>
                                            </select>

                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="bmd-label-static text-danger">Major</label>
                                            <select class="form-control text-muted" name="alumni_major"> 
                                              <option>Select</option>
                                              <option>1</option>
                                              <option>2</option>
                                              <option>3</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label class="bmd-label-static text-danger">Year graduated</label>
                                            <select class="form-control" name="alumni_grad_year">
                                              <?php 
                                                for ($date = 2000; $date <= date('Y'); $date++) {   
                                                  echo "<option>";
                                                  echo $date;
                                                  echo "</option>";
                                                } 
                                              ?>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <!--  -->
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Student No.</label>
                                            <input type="text" class="form-control" name="alumni_student_ID" required>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Password</label>
                                            <input type="text" class="form-control" name="alumni_password">
                                          </div>
                                        </div>
                                      </div>
                                      <!--  -->
                                      <div class="row">
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Fist Name</label>
                                            <input type="text" class="form-control" name="alumni_fname">
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Middle Name</label>
                                            <input type="text" class="form-control" name="alumni_mname">
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Last Name</label>
                                            <input type="text" class="form-control" name="alumni_lname">
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label class="bmd-label-static text-danger">Gender</label>
                                            <select class="form-control" name="alumni_gender">
                                              <option value="Male">Male</option>
                                              <option value="Female">Female</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <!--  -->
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Address</label>
                                            <input type="text" class="form-control" name="alumni_address">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Email address</label>
                                            <input type="email" class="form-control" name="alumni_email">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Mobile No.</label>
                                            <input type="text" class="form-control" name="alumni_cno">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Landline No.</label>
                                            <input type="text" class="form-control" name="alumni_lno">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Facebook</label>
                                            <input type="text" class="form-control" name="alumni_facebook">
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">LinkedIn</label>
                                            <input type="text" class="form-control" name="alumni_linkedin">
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Website</label>
                                            <input type="text" class="form-control" name="alumni_website">
                                          </div>
                                        </div>
                                      </div>
                                      <button type="submit" class="btn btn-danger pull-right">Add Alumni</button>
                                      <div class="clearfix"></div>
                                    </form>
                                    <?php echo form_close(); ?>
                                </div>
                              </div><!-- End of Tab Content -->
                          </div><!-- End of Card Body -->
                        </div>
                </div>
              </div>
            </div>
          </div>