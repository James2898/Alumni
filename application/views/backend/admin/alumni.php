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
                                    <thead class="text-<?php echo $_SESSION['theme_color'] ?>">
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
                                        $this->db->join('major', 'alumni.alumni_major = major.major_ID','left');
                                        $query = $this->db->get()->result_array();
                                        foreach($query as $row):
                                          if(!empty($row['alumni_major'])){
                                            $major = " - ".$row['major_name'];
                                          }else{
                                            $major = "";
                                          }
                                      ?>
                                      <tr>
                                        <td><?php echo $row['alumni_student_ID'] ?></td>
                                        <td><?php echo $row['alumni_fname']." ".$row['alumni_mname']." ".$row['alumni_lname']?></td>
                                        <td><?php echo $row['course_title'].$major?></td>
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
                                            <button class="btn btn-<?php echo $_SESSION['theme_color'] ?> btn-sm dropdown-toggle" data-toggle='dropdown'>
                                              Action
                                            </button>
                                            <ul class="dropdown-menu drop-down-<?php echo $_SESSION['theme_color'] ?> pull-right" role="menu">
                                                <li>
                                                  <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_view_alumni/<?php echo $row['alumni_student_ID'] ?>')">
                                                    <i class="material-icons">remove_red_eye</i>
                                                     View
                                                  </a>
                                                  <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_edit_alumni/<?php echo $row['alumni_student_ID'] ?>')">
                                                    <i class="material-icons">edit</i>
                                                     Edit
                                                   </a>
                                                  <a href="#" onclick="confirmModal('<?php echo base_url();?>index.php/admin/alumni/delete/<?php echo $row['alumni_student_ID'] ?>')">
                                                    <i class="material-icons">delete</i> 
                                                     Delete
                                                   </a>
                                                </li>
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
                                          <label class="bmd-label-static text-<?php echo $_SESSION['theme_color'] ?>">Degree Program</label>
                                          <select id="alumni_degree" name="alumni_degree[]" searchable="Search here." >
                                            <?php  
                                              $this->db->select("*");
                                              $this->db->from('courses');
                                              $this->db->order_by('courses.course_ID', 'ASC');
                                              $query2 = $this->db->get()->result_array();
                                              $last_category = '';
                                              foreach ($query2 as $row2):
                                                if($last_category != $row2['course_college'])
                                                  echo "<optgroup label='".$row2['course_college']."'>";
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
                                          <label class="bmd-label-static text-<?php echo $_SESSION['theme_color'] ?>">Major</label>
                                          <select id="alumni_major" name="alumni_major[]" searchable="Search here." >
                                            <?php  
                                              $this->db->select("*");
                                              $this->db->from('major');
                                              $this->db->where('major_course_ID','1');
                                              $query2 = $this->db->get()->result_array();
                                              $last_category = '';
                                              foreach ($query2 as $row2):
                                            ?>
                                              <option value="<?php echo $row2['major_ID'] ?>">
                                                <?php echo $row2['major_name'];?>
                                              </option> 
                                            <?php  
                                              endforeach;
                                            ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <label  class="bmd-label-static text-<?php echo $_SESSION['theme_color'] ?>">Year graduated</label>
                                          <select id="alumni_grad_year" name="alumni_grad_year[]">
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
                                          <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Student No.</label>
                                          <input type="text" class="form-control" name="alumni_student_ID" required>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Password</label>
                                          <input type="text"  class="form-control" name="alumni_password" required>
                                        </div>
                                      </div>
                                    </div>
                                    <!--  -->
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Fist Name</label>
                                          <input type="text" maxlength="15" class="form-control" name="alumni_fname" required>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Middle Name</label>
                                          <input type="text" maxlength="15" class="form-control" name="alumni_mname" required>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Last Name</label>
                                          <input type="text" maxlength="15" class="form-control" name="alumni_lname" required>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <label class="bmd-label-static text-<?php echo $_SESSION['theme_color'] ?>">Gender</label>
                                          <select id="alumni_gender" name="alumni_gender[]">
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
                                          <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Address</label>
                                          <input type="text" maxlength="35" class="form-control" name="alumni_address" required>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Email address</label>
                                          <input type="email" class="form-control" name="alumni_email" required>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Mobile No.</label>
                                          <input type="text" maxlength="11" class="form-control" name="alumni_cno" required>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Landline No. (optional)</label>
                                          <input type="text" class="form-control" name="alumni_lno">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Facebook (optional)</label>
                                          <input type="text" class="form-control" name="alumni_facebook">
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">LinkedIn (optional)</label>
                                          <input type="text" class="form-control" name="alumni_linkedin">
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Website (optional)</label>
                                          <input type="text" class="form-control" name="alumni_website">
                                        </div>
                                      </div>
                                    </div>
                                    <button type="submit" class="btn btn-<?php echo $_SESSION['theme_color'] ?> pull-right">Add Alumni</button>
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
