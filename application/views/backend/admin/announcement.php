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
                  <div class="tab-pane  table-responsive active" id="list">
                    <table class="table" id="table2">
                      <thead class="text-<?php echo $_SESSION['theme_color'] ?>">
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
                                      <a href="#" class="btn btn-warning" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_edit_announcement/<?php echo $row['announcement_ID'] ?>')">
                                             View
                                      </a>
                                      <a href="#" class="btn btn-warning" onclick="confirmModal('<?php echo base_url();?>index.php/admin/announcement/delete/<?php echo $row['announcement_ID'] ?>')">
                                             Delete
                                      </a>
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
                            <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Title</label>
                            <input type="text" maxlength="15"  class="form-control" name="announcement_title" required>
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Subject</label>
                            <input type="text" maxlength="15" class="form-control" name="announcement_subject" required>
                          </div>
                        </div>
                      </div>
                      <!--  -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Content</label>
                            <textarea class="form-control" maxlength="250"  rows="5" name="announcement_content" required></textarea>
                          </div>
                        </div>
                      </div>
                      <!--  -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <!-- Default inline 1-->
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input rbutton" id="announcementDegree" name="announcement_radio" value="1" checked="">
                              <label class="custom-control-label" for="announcementDegree">Send By Degree</label>
                            </div>

                            <!-- Default inline 2-->
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input rbutton" id="announcementBatch" name="announcement_radio" value="2">
                              <label class="custom-control-label" for="announcementBatch">Send By Batch</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <select id="announcement_alumni" name="announcement_reciepients[]" multiple="multiple" >
                              <?php  
                                $this->db->select("*");
                                $this->db->from('alumni');
                                $this->db->join('courses','alumni.alumni_degree = courses.course_ID');
                                $this->db->order_by('alumni_degree','ASC');

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
                          <input type="submit" class="btn btn-<?php echo $_SESSION['theme_color'] ?> pull-right" value="Add">
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
      jQuery(document).ready(function() {
        jQuery("time.timeago").timeago();
      });
    </script>

    <script type="text/javascript">
      $('input[type=radio][name=announcement_radio]').on('change', function() {
           switch($(this).val()) {
               case '1':
                   alert("Allot Thai Gayo Bhai");
                   break;
               case '2':
                   alert("Transfer Thai Gayo");
                   break;
           }
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