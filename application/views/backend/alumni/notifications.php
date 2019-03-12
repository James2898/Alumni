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
                                <i class="material-icons">notifications_active</i> Unread notifications
                                <div class="ripple-container"></div>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#add" data-toggle="tab">
                                <i class="material-icons">notifications_none</i> Read Notifications
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
                          <table class="table" id="notification_read">
                            <thead>
                              <th></th>
                            </thead>
                            <tbody>
                              <?php  
                                $this->db->select("*");
                                $this->db->from('notification');
                                $this->db->join('alumni','alumni.alumni_student_ID = notification.notification_recieve_ID');
                                $this->db->join('appointment','appointment.appointment_ID = notification.notification_type_ID', 'left');
                                $this->db->join('announcement','announcement.announcement_ID = notification.notification_type_ID', 'left');
                                $this->db->where('notification_recieve_ID',$_SESSION['user_ID']);
                                $this->db->where('notification_unread','TRUE');
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
                              <tr>
                                <td>
                                  <div class="row">
                                      <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card card-stats">
                                          <div class="card-header card-header-<?php echo $color ?> card-header-icon">
                                            <div class="card-icon">
                                              <i class="material-icons"><?php echo $icon ?></i>
                                            </div>
                                            <h4 class="card-title"><?php echo $title?></h4>
                                            <p class="card-category"><?php echo $subject ?></p>
                                            <a class="btn btn-<?php echo $color ?> card-link" href="<?php echo base_url(); ?>index.php/<?php echo $link; ?>">Go to <?php echo $row['notification_type'] ?></a>
                                           <a class="btn btn-<?php echo $color ?> card-link"href="<?php echo base_url(); ?>index.php/alumni/notifications/read/<?php echo $row['notification_ID'] ?>">Mark as Read</a>
                                          </div>
                                          <div class="card-footer">
                                            <div class="stats">
                                              <i class="material-icons">access_time</i>
                                              <a href="#" class="text-dark"><?php echo time_elapsed_string($datetime) ?></a>
                                            </div>
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
                          <table class="table" id="table2">
                            <thead>
                              <th></th>
                            </thead>
                            <tbody>
                              <?php  
                                $this->db->select("*");
                                $this->db->from('notification');
                                $this->db->join('alumni','alumni.alumni_student_ID = notification.notification_recieve_ID');
                                $this->db->join('appointment','appointment.appointment_ID = notification.notification_type_ID', 'left');
                                $this->db->join('announcement','announcement.announcement_ID = notification.notification_type_ID', 'left');
                                $this->db->where('notification_recieve_ID',$_SESSION['user_ID']);
                                $this->db->where('notification_unread','FALSE');
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
                              <tr>
                                <td>
                                  <div class="row">
                                      <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card card-stats">
                                          <div class="card-header card-header-<?php echo $color ?> card-header-icon">
                                            <div class="card-icon">
                                              <i class="material-icons"><?php echo $icon ?></i>
                                            </div>
                                            <h4 class="card-title"><?php echo $title?></h4>
                                            <p class="card-category"><?php echo $subject ?></p>
                                            <a class="btn btn-<?php echo $color ?> card-link" href="<?php echo base_url(); ?>index.php/<?php echo $link; ?>">Go to <?php echo $row['notification_type'] ?></a>
                                           <a class="btn btn-<?php echo $color ?> card-link"href="<?php echo base_url(); ?>index.php/alumni/notifications/unread/<?php echo $row['notification_ID'] ?>">Mark as Unread</a>
                                          </div>
                                          <div class="card-footer">
                                            <div class="stats">
                                              <i class="material-icons">access_time</i>
                                              <a href="#" class="text-dark"><?php echo time_elapsed_string($datetime) ?></a>
                                            </div>
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
                      </div><!-- End of Tab Content -->
                  </div><!-- End of Card Body -->
                </div>
                </div>
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