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
                    <div class="card">
                        <div class="card-header card-header-<?php echo $_SESSION['theme_color'] ?>">
                          <h4 class="card-title"><i class="fa fa-info-circle"></i> About</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <?php echo form_open('admin/settings/change_password/', 'class="login100-form validate-form col-md-12"','role="form"','id="form_login"'); ?>
                                <div>
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                      	<div class="row">
                                            <div class="col-md-12">
												                      <div class="form-group">
				                                        <label class="bmd-label-floating">Old Password</label>
				                                        <input type="password" name="admin_old_password" class="form-control" required="">
				                                      </div>
											                      </div>
                                      	</div>
                                      	<div class="row">
                                          <div class="col-md-12">
												                    <div class="form-group">
				                                      <label class="bmd-label-floating">New Password</label>
				                                      <input type="password" name="admin_new_password" class="form-control" required="">
				                                    </div>
											                    </div>
                                      	</div>
                                      	<div class="row">
                                            <div class="col-md-12">
												                      <div class="form-group">
				                                        <label class="bmd-label-floating">Repeat New Password</label>
				                                        <input type="password" name="admin_repeat_password" class="form-control" required="">
				                                      </div>
											                      </div>
                                      	</div>
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <button class="btn btn-<?php echo $_SESSION['theme_color'] ?>" type="submit">Update</button>
                                            </div>
                                          </div>
                                        </div>
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
<?php  
    endforeach;
?>

<script type="text/javascript">
  

</script>