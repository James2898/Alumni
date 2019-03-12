      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <select class="form-control">
                <option>All</option>
                <option>Appointments</option>
                <option>Announcements</option>
              </select>
            </div>
            <?php  
              $this->db->select("*");
              $this->db->from('notification');
              $this->db->join('alumni','alumni.alumni_student_ID = notification.notification_recieve_ID');
              $this->db->join('appointment','appointment.appointment_ID = notification.notification_type_ID', 'left');
              $this->db->join('announcement','announcement.announcement_ID = notification.notification_type_ID', 'left');
              $this->db->where('notification_recieve_ID',$_SESSION['user_ID']);
              $this->db->order_by('notification_ID', 'DESC');

              $query = $this->db->get()->result_array();
              foreach ($query as $row):
            ?>
              <?php 
                if($row['notification_type'] == 'Appointment'){
                  $icon = 'date_range';
                  

                  if($row['notification_param'] == 'Created'){
                    $title = 'Appointment with APL';
                    $color = 'info';
                  }else if($row['notification_param'] == 'Approved'){
                    $title = 'APL approved your appointment request';
                    $color = 'success';
                  }else if($row['notification_param'] == 'Cancelled'){
                    $title = 'APL cancelled your scheduled appointment';
                    $color = 'danger';
                  }else if($row['notification_param'] == 'Rescheduled'){
                    $title = 'APL rescheduled your appointment';
                    $color = 'warning';
                  }

                  $subject = $row['appointment_details'];
                  $datetime = $row['notification_datetime'];
                  $link = "alumni/appointment";
                  
                }else if($row['notification_type'] == 'Announcement'){
                  $icon = 'announcement';
                  $color = 'primary';

                  $title = $row['announcement_title'];
                  $subject = $row['announcement_subject'];
                  $datetime = $row['announcement_date'];
                  $link = "alumni/announcement";
                }
              ?>
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-stats">
                  <div class="card-header card-header-<?php echo $color ?> card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons"><?php echo $icon ?></i>
                    </div>
                    <h4 class="card-title"><?php echo $title ?></h4>
                    <p class="card-category"><?php echo $subject ?></p>
                    <a class="btn btn-<?php echo $color ?> btn-sm card-link" href="<?php echo base_url(); ?>index.php/<?php echo $link; ?>">Go to <?php echo $row['notification_type'] ?></a>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">access_time</i>
                      <a href="#" class="text-dark"><?php echo time_elapsed_string($datetime).$row['announcement_date']; ?></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php  
              endforeach;
            ?>
          </div>
        </div>
      </div>
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