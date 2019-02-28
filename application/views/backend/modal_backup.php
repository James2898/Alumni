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
                error: function (jqXHR, textStatus, errorThrown){ 
                  jQuery('#modal_ajax .modal-body').html("ERROR"); }
            });
        }
    </script>

    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo $page_name ?></h4>
                </div>
                <div class="modal-body" style="height:auto; overflow:auto;">
                
                    
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>