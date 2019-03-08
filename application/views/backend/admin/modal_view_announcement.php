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
                      <!--  -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating text-danger">Title</label>
                            <input type="text" class="form-control" name="announcement_title" value="<?php echo $row['announcement_title'] ?>" readonly>
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating text-danger">Subject</label>
                            <input type="text" class="form-control" name="announcement_subject" value="<?php echo $row['announcement_subject'] ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!--  -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating text-danger">Content</label>
                            <textarea class="form-control" rows="5" name="announcement_content" readonly><?php echo $row['announcement_content'] ?></textarea>
                          </div>
                        </div>
                      </div>
            	</div>
      		</div>           
    	</div>
    <div>
<?php  
    endforeach;
?>