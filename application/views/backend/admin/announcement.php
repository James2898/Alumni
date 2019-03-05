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
                              <a class="nav-link " href="#list" data-toggle="tab">
                                <i class="material-icons">announcement</i> Announcement
                                <div class="ripple-container"></div>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" href="#add" data-toggle="tab">
                                <i class="material-icons">add_comment</i> Add Alumni
                                <div class="ripple-container"></div>
                              </a>
                            </li>
                          </ul>
                      </div>
                    </div>
                          </div><!-- End of Card Header -->
                          <div class="card-body">
                              <div class="tab-content">
                                <div class="tab-pane table-responsive " id="list">
                                      <table class="table" id="table1">
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
                                                $work_status = $this->db->select('*')->from('work')->where('work_alumni_student_ID',$row['alumni_student_ID'])->where('work_alumni_status','Employed')->get()->num_rows();
                                                if($work_status > 0){
                                                  echo "Employed";
                                                }else{
                                                  echo "Inactive";
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
                                <div class="tab-pane active" id="add">
                                    <?php echo form_open('admin/alumni/create/', 'class="login100-form validate-form col-md-12"','role="form"','id="form_login"'); ?>
                                      <!--  -->
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Title</label>
                                            <input type="text" class="form-control" name="announcement_title" required>
                                          </div>
                                        </div>
                                      </div>
                                      <!--  -->
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Fist Name</label>
                                            <textarea class="form-control" rows="5" name="announcement_content"></textarea>
                                          </div>
                                        </div>
                                      </div>
                                      <!--  -->
                                      <div class="row">
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <select id="example-getting-started" multiple="multiple" >
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
                                    <?php echo form_close(); ?>
                                </div>
                              </div><!-- End of Tab Content -->
                          </div><!-- End of Card Body -->
                        </div>
                </div>
              </div>
            </div>
          </div>


