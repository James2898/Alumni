<!--   Core JS Files   -->
  <script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="<?php echo base_url(); ?>assets/js/fullcalendar.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url(); ?>assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url(); ?>assets/demo/demo.js"></script>
  <!-- Boostrap 4 -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">


  <!-- Time Ago -->
  <script src="<?php echo base_url(); ?>assets/js/jquery-timeago.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/transition.js"></script>|
  <script src="<?php echo base_url(); ?>assets/js/collapse.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>

  <script>
    $(document).ready(function() {
        $('#example').DataTable({
           "ScrollX": "100%",
           "ScrollCollapse": true,
        });
    } );
  </script>

   <script>
    $(document).ready(function() {
        $('#table1').DataTable({
          order: []
        });
    } );
  </script>
  <script>
    $(document).ready(function() {
        $('#table2').DataTable({
          order: [],
        });
    } );
  </script>
  <script>
    $(document).ready(function() {
        $('#notification_read').DataTable({
          dom: 'Bfrtip',
          order: [],
          buttons: [
            {
                text: 'Mark All as Read',
                action: function ( e, dt, node, config ) {
                  window.location.href= '<?php echo base_url().'index.php/alumni/notifications/read_all' ?>'
                },
                className: 'btn btn-danger'
            }
          ]
        });
    } );
  </script>
<script type="text/javascript">
  $(document).ready(function() {
   $('.selectpicker').selectpicker();
});
</script>
<?php 
    
        if($_SESSION['flashdata'] == 'Data Updated'){
          $_SESSION['flashdata'] =  '';
          echo "

            <script type='text/javascript'>
              Swal.fire({
                position: 'top-end',
                type: 'success',
                title: 'Data Updated',
                showConfirmButton: false,
                timer: 1500
              })
            </script>

          ";

        }

        if($_SESSION['flashdata'] == 'ERROR'){
          $_SESSION['flashdata'] =  '';
          echo "

            <script type='text/javascript'>
              Swal.fire({
                position: 'top-end',
                type: 'error',
                title: '".$_SESSION['error_log']."',
                showConfirmButton: false,
                timer: 1500
              })
            </script>

          ";

        }

        if($_SESSION['flashdata'] == 'Data Added'){
          $_SESSION['flashdata'] =  '';
          echo "

            <script type='text/javascript'>
              Swal.fire({
                position: 'top-end',
                type: 'success',
                title: 'Data Added',
                showConfirmButton: false,
                timer: 1500
              })
            </script>

          ";

        }
?>

<script type="text/javascript">
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width('50%')
                    .height('50%');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

        <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/backup/docs/js/jquery-2.1.3.min.js"></script> -->
        <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/backup/docs/js/bootstrap-3.3.2.min.js"></script> -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/backup/docs/js/prettify.min.js"></script>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backup/dist/css/bootstrap-multiselect.css" type="text/css">
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/backup/dist/js/bootstrap-multiselect.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#announcement_alumni').multiselect({
                    nonSelectedText: 'Reciepients',    
                    buttonClass: 'btn btn-danger',
                    buttonWidth: '100%',
                    enableClickableOptGroups: true,
                    includeSelectAllOption: true,
                    maxHeight: 450,
                    enableFiltering: true,
                    filterPlaceholder: 'Search for alumni...'

                });
            });
        </script>