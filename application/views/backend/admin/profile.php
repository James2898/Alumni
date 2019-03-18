<?php  

    $this->db->select("*");
    $this->db->from('admin');
    $this->db->where('admin_ID',$_SESSION['user_ID']);

    $query = $this->db->get()->result_array();
    foreach ($query as $row):
?>
            <div class="content bg-light p-3" >
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="text-center my-2">
                      
                      <?php 
                        if(!empty($row['admin_profile_picture'])){
                          echo "<img  height='50%' width='50%' src='".base_url()."/assets/img/profile_picture/".$row['admin_profile_picture']."' alt=''/>";
                        }else{
                          echo "<img id='main-profile' height='50%' width='50%' src='".base_url()."/assets/img/profile_picture/blank.png' alt=/>";
                        } 
                      ?>
                    </div>
                    <div class="text-center">
                      <h3>
                        <?php echo $row['admin_fname']." ".$row['admin_mname']." ".$row['admin_lname']?> 
                      </h3>
                      <h4>Admin</h4>
                    </div>
                    <div class="card">
                        <div class="card-header card-header-<?php echo $_SESSION['theme_color'] ?>">
                          <h4 class="card-title"><i class="fa fa-info-circle"></i> About</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                      <div class="row">
                                            <div class="col-md-6">
                                              <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                              <p><?php echo $row['admin_email'] ?></p>
                                            </div>
                                      </div>
                                      <div class="row">
                                            <div class="col-md-6">
                                              <label>Facebook</label>
                                            </div>
                                            <div class="col-md-6">
                                              <p><?php echo $row['admin_facebook'] ?></p>
                                            </div>
                                      </div>
                                      <div class="row">
                                            <div class="col-md-6">
                                              <label>Mobile No.</label>
                                            </div>
                                            <div class="col-md-6">
                                              <p><?php echo $row['admin_cno'] ?></p>
                                            </div>
                                      </div>
                                      <div class="row">
                                            <div class="col-md-6">
                                              <label>Landline No.</label>
                                            </div>
                                            <div class="col-md-6">
                                              <p><?php echo $row['admin_lno'] ?></p>
                                            </div>
                                      </div>
                                    </div>
                                    <button class="btn btn-<?php echo $_SESSION['theme_color'] ?>" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_edit_admin/')"><i class="fa fa-edit"></i> Edit</button>
                                </div>
                            </div>
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