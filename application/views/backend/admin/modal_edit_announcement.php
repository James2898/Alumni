<?php  

    $this->db->select("*");
    $this->db->from('announcement');
    $this->db->where('announcement_ID',$param1);

    $query = $this->db->get()->result_array();
    foreach ($query as $row):
?>
    <div class="content bg-light" >
	    <div class="container-fluid">
	        <div class="row">
                <div class="col-md-12">
	                <?php echo form_open('admin/announcement/edit/'.$param1, 'class="login100-form validate-form col-md-12"','role="form"','id="form_login"'); ?>
                      <!--  -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Title</label>
                            <input type="text" class="form-control" name="announcement_title" value="<?php echo $row['announcement_title'] ?>" required>
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Subject</label>
                            <input type="text" class="form-control" name="announcement_subject" value="<?php echo $row['announcement_subject'] ?>" required>
                          </div>
                        </div>
                      </div>
                      <!--  -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating text-<?php echo $_SESSION['theme_color'] ?>">Content</label>
                            <textarea class="form-control" rows="5" name="announcement_content"><?php echo $row['announcement_content'] ?></textarea>
                          </div>
                        </div>
                      </div>
                      <!--  -->
                      <div class="row"
>                        <div class="clearfix"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <input type="submit" class="btn btn-<?php echo $_SESSION['theme_color'] ?> pull-right" value="Update">
                        </div>
                      </div>
                    <?php echo form_close(); ?>
            	</div>
      		</div>           
    	</div>
    <div>
<?php  
    endforeach;
?>