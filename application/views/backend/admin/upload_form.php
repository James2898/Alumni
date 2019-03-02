
<?php print_r($error);?>

<?php echo form_open_multipart('admin/upload');?>
	<input type='file' name="profile_picture" size="20" onchange="readURL(this);" />
    <img id="blah" src="#" alt="your image" />
    <input type="submit" value="upload"/>
<?php echo form_close(); ?>