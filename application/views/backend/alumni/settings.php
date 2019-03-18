<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-<?php echo $_SESSION['theme_color'] ?>">
            <h4 class="card-title">Settings | Alumni Settings</h4>
          </div>
          <div class="card-body">
            <?php echo form_open('admin/settings/edit/', 'class="validate-form col-md-12"','role="form"'); ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-static text-dark">Theme Color: </label>
                    <select id="settings_theme" name="settings_theme[]">
                      <?php 
                        $theme_ID = $this->db->get_where('settings' , array('settings_user_ID' =>$_SESSION['user_ID'],'settings_type' => 'theme'))->row()->settings_description;

                        $this->db->select('*');
                        $this->db->from('theme');
                        

                        $query = $this->db->get()->result_array();
                        foreach($query as $row):
                      ?>
                          <option value="<?php echo $row['theme_ID']?>" <?php if($theme_ID == $row['theme_ID']) echo 'selected' ?>>
                            <?php echo $row['theme_color']; ?>
                          </option>
                      <?php 
                        endforeach;
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <div class="bmd-label-static text-dark">
                      <a href="#" class="text-<?php echo $_SESSION['theme_color'] ?>" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_edit_password/')">Change Password</a>                    
                    </div>
                  </div>
                  <div class="form-group">
                    <?php  
                       $sms = $this->db->get_where('settings' , array('settings_user_ID' =>$_SESSION['user_ID'],'settings_type' => 'sms'))->row()->settings_description;
                       $email = $this->db->get_where('settings' , array('settings_user_ID' =>$_SESSION['user_ID'],'settings_type' => 'email'))->row()->settings_description;
                    ?>
                    <div class="form-check">
                      <label class="form-check-label text-<?php echo $_SESSION['theme_color'] ?>">
                        Receive All Email Notifications
                        <input class="form-check-input" id="recieve_email" type="checkbox" value="" <?php if($email == 'on') echo "checked"; ?>>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check text-success">
                      <label class="form-check-label text-<?php echo $_SESSION['theme_color'] ?>">
                        Receive All SMS Notifications
                        <input class="form-check-input" id="recieve_sms" type="checkbox" value="" <?php if($sms == 'on') echo "checked"; ?>>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
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

