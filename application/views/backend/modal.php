    <script type="text/javascript">
        function showAjaxModal(url){
            // SHOWING AJAX PRELOADER IMAGE
            jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>assets/img/preloader.gif" /></div>');
            
            // LOADING THE AJAX MODAL
            jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
            
            // SHOW AJAX RESPONSE ON REQUEST SUCCESS
            $.ajax({
                url: url,
                success: function(response){
                    jQuery('#modal_ajax .modal-body').html(response);
                },
                error: function (){ 
                  jQuery('#modal_ajax .modal-body').html("ERROR"); }
            });
        }
    </script>


    <script type="text/javascript">
        function confirmModal(delete_url){
            Swal.fire({
              title: 'Are you sure to delete this information?',
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes'
            }).then((result) => {
              if (result.value) {
                window.location = delete_url;
              }
            })
        }
    </script>



    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" style="height:auto; width: overflow:auto;">
                
                    
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-<?php echo $_SESSION['theme_color'] ?>" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>