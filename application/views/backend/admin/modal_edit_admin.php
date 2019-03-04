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
                    <?php echo form_open_multipart('admin/admin_upload/'.$row['admin_ID'], 'class="col-md-12"');?>
					
	              		<div class="col-md-12">
	                  		<div class="my-2 text-center">
			                    <img width="50%" height="50%" src="<?php echo base_url() ?>/assets/img/profile_picture/<?php echo $row['admin_profile_picture'] ?>" alt="" id="blah"/>
	                  		</div>
	                  		<div class="text-center">
								<input type='file' class="btn-file btn btn-danger" name="profile_picture" onchange="readURL(this);" />
			                  	<input type="submit" class="btn btn-danger btn-sm" value="Change">
			                </div >	
	              		</div>
	              	<?php echo form_close(); ?>
                    <div class="card">
                        <div class="card-header card-header-danger">
                          <h4 class="card-title"><i class="fa fa-info-circle"></i> About</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <?php echo form_open('admin/admin_config/edit/'.$row['admin_ID'], 'class="login100-form validate-form col-md-12"','role="form"','id="form_login"'); ?>
                                <div>
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                      	<div class="row">
                                            <div class="col-md-12">
												                      <div class="form-group">
				                                        <label class="bmd-label-floating">First Name</label>
				                                        <input type="text" name="admin_fname" class="form-control" value="<?php echo $row['admin_fname'] ?>">
				                                      </div>
											                      </div>
                                      	</div>
                                      	<div class="row">
                                          <div class="col-md-12">
												                    <div class="form-group">
				                                      <label class="bmd-label-floating">Middle Name</label>
				                                      <input type="text" name="admin_mname" class="form-control" value="<?php echo $row['admin_mname'] ?>">
				                                    </div>
											                    </div>
                                      	</div>
                                      	<div class="row">
                                            <div class="col-md-12">
												                      <div class="form-group">
				                                        <label class="bmd-label-floating">Last Name</label>
				                                        <input type="text" name="admin_lname" class="form-control" value="<?php echo $row['admin_lname'] ?>">
				                                      </div>
											                      </div>
                                      	</div>
                                      	<div class="row">
                                          <div class="col-md-12">
												                    <div class="form-group">
				                                      <label class="bmd-label-floating">Email</label>
				                                      <input type="text" name="admin_email" class="form-control" value="<?php echo $row['admin_email'] ?>">
				                                    </div>
											                    </div>
                                      	</div>
                                      	<div class="row">
                                          <div class="col-md-12">
												                    <div class="form-group">
				                                      <label class="bmd-label-floating">Facebook</label>
				                                      <input type="text" name="admin_facebook" class="form-control" value="<?php echo $row['admin_facebook'] ?>">
				                                    </div>
											                     </div>
                                      	</div>
                                      	<div class="row">
                                          <div class="col-md-12">
												                    <div class="form-group">
				                                      <label class="bmd-label-floating">Mobile No.</label>
				                                      <input type="text" name="admin_cno" class="form-control" value="<?php echo $row['admin_cno'] ?>">
				                                    </div>
											                   </div>
                                      	</div>
                                      	<div class="row">
                                          <div class="col-md-12">
    												                <div class="form-group">
    				                                    <label class="bmd-label-floating">Landline No.</label>
    				                                    <input type="text" name="admin_lno" class="form-control" value="<?php echo $row['admin_lno'] ?>">
    				                                </div>
  											                 </div>
                                      	</div>
                                      	<div class="row">
                    											<div class="col-md-12">
                    												<button type="submit" class="btn btn-danger pull-right">Update</button>
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