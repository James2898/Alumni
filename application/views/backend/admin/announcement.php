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
                    <table class="table" id="table2">
                      <thead class="text-danger">
                        <th></th>
                      </thead>
                      <tbody>
                        <?php  
                          $this->db->select("*");
                          $this->db->from('announcement');
                          $this->db->order_by('announcement_ID','DESC');
                          $query = $this->db->get()->result_array();
                          
                          $last_category = '';
                          foreach($query as $row):
                        ?>
                          <tr>
                            <td>
                              <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card card-stats">
                                  <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon">
                                      <i class="material-icons">announcement</i>
                                    </div>
                                    <h4 class="card-title"><?php echo $row['announcement_title'] ?></h4>
                                    <p class="card-category"><?php echo $row['announcement_subject'] ?></p>
                                    <div class="btn-group-sm">
                                      <a href="#" class="btn btn-warning" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_view_announcement/<?php echo $row['announcement_ID'] ?>')">
                                             View
                                          </a>
                                      <button class="btn btn-warning btn-sm dropdown-toggle" data-toggle='dropdown'>
                                        Action
                                      </button>
                                      <ul class="dropdown-menu drop-down-warning pull-right col-md-6 p-0" role="menu">
                                        <li>
                                          <a href="#" class="py-0" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_edit_announcement/<?php echo $row['announcement_ID'] ?>')">
                                            <i class="material-icons">edit</i>
                                             Edit
                                          </a>
                                          <a href="#" class="py-0" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_delete_announcement/<?php echo $row['announcement_ID'] ?>')">
                                            <i class="material-icons">delete</i> 
                                             Delete
                                          </a>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                  <div class="card-footer">
                                    <div class="stats">
                                      <i class="material-icons">access_time</i>
                                      <a href="#" class="text-dark"><?php echo time_elapsed_string($row['announcement_date']); ?></a>
                                    </div>
                                  </div>
                                </div>
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
                       <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating text-danger">Subject</label>
                            <input type="text" class="form-control" name="announcement_subject" required>
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
    <script type="text/javascript">
      jQuery(document).ready(function() {
        jQuery("time.timeago").timeago();
      });
    </script>
    <?php  
      function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
      }
    ?>