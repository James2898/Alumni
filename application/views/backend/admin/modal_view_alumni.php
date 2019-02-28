<?php  

    $view_data  =   $this->db->get_where('alumni', array('alumni_student_ID' => $param2))-result_array();
    foreach ($edit_data as $row):
?>

<?php  
    endforeach;
?>