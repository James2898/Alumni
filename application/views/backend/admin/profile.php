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
                    <div class="profile-img my-2">
                      <img src="<?php echo base_url() ?>/assets/img/profile_picture/<?php echo $row['admin_profile_picture'] ?>.jpg" alt=""/>
                    </div>
                    <div class="text-center">
                      <h3>
                        <?php echo $row['admin_fname']." ".$row['admin_mname']." ".$row['admin_lname']?> <a href="#" class="text-danger"><i class="material-icons">edit</i></a>
                      </h3>
                      <h4>Admin</h4>
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