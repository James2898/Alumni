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
                          <a href="#list" class="nav-link active" data-toggle="tab">
                            <i class="material-icons">announcement</i> Announcement List
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#add" class="nav-link" data-toggle="tab">
                            <i class="material-icons">add_comment</i> Add New
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active table-responsive" id="list">
                    <table class="table" id="table1">
                      <thead class="text-danger">
                        <th>Title</th>
                        <th>Date</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php  
                          $this->db->select("*");
                          $this->db->from('announcement');
                          $this->db->order_by('announcement_date','ASC');

                          $query = $this->db->get()->result_array();
                          
                          $last_category = '';
                          foreach($query as $row):
                        ?>
                          <tr>
                            <td><?php echo $row['announcement_date'] ?></td>
                            <td><?php echo $row['announcement_title'] ?></td>
                            <td>
                              <div class="btn-group">
                                <button class="btn btn-danger btn-sm dropdown-toggle" data-toggle='dropdown'>
                                  Action
                                </button>
                                <ul class="dropdown-menu drop-down-danger pull-right" role="menu">
                                  <li>
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_view_alumni/<?php echo $row['announcement_ID'] ?>')">
                                      <i class="material-icons">remove_red_eye</i>
                                       View
                                    </a>
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_edit_alumni/<?php echo $row['announcement_ID'] ?>')">
                                      <i class="material-icons">edit</i>
                                       Edit
                                    </a>
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_delete_alumni/<?php echo $row['announcement_ID'] ?>')">
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
                    <?php echo form_open('admin/announcement/create/', 'class="login100-form validate-form col-md-12"','role="form"','id="form_login"'); ?>
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
                            <label class="bmd-label-floating text-danger">Content</label>
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
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <input type="submit" class="btn btn-danger pull-right" value="Add">
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
        $('#example-getting-started').multiselect({
          nonSelectedText: 'Reciepients',    
          buttonClass: 'btn btn-danger',
          buttonWidth: '100%',
          enableClickableOptGroups: true,
          includeSelectAllOption: true,
          maxHeight: 450  
        });
      });
    </script>