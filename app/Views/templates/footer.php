<?php

use SPK\App\Core\Config;
?>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://nkolis.github.io">Nkolis</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= Config::getBaseUrl() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- <script src="<?= Config::getBaseUrl() ?>/plugins/chart.js/Chart.min.js"></script> -->
<!-- Sparkline -->
<!-- <script src="<?= Config::getBaseUrl() ?>/plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="<?= Config::getBaseUrl() ?>/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="<?= Config::getBaseUrl() ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="<?= Config::getBaseUrl() ?>/plugins/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<script src="<?= Config::getBaseUrl() ?>/plugins/moment/moment.min.js"></script>
<!-- <script src="<?= Config::getBaseUrl() ?>/plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="<?= Config::getBaseUrl() ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Summernote -->
<!-- <script src="<?= Config::getBaseUrl() ?>/plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<!-- <script src="<?= Config::getBaseUrl() ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<!-- DataTables  & Plugins -->
<script src="<?= Config::getBaseUrl() ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= Config::getBaseUrl() ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= Config::getBaseUrl() ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= Config::getBaseUrl() ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= Config::getBaseUrl() ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= Config::getBaseUrl() ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= Config::getBaseUrl() ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= Config::getBaseUrl() ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= Config::getBaseUrl() ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= Config::getBaseUrl() ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= Config::getBaseUrl() ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= Config::getBaseUrl() ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- AdminLTE App -->
<script src="<?= Config::getBaseUrl() ?>/dist/js/adminlte.js"></script>

<!-- <script src="<?= Config::getBaseUrl() ?>/dist/js/pages/dashboard.js"></script> -->
<script>
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $(function() {





        $(document).ready(function() {
            var url = window.location;
            // Will only work if string in href matches with location
            $('.nav-item a[href="' + url + '"]').addClass('active');

            // Will also work for relative and absolute href

        });




    });
    $("#default-datatable").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "bDestroy": true
    })
    //.buttons().container().appendTo('#default-datatable_wrapper .col-md-6:eq(0)');
    $('#simple-datatable').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "bDestroy": true
    });

    $('#simple-datatable2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "bDestroy": true
    });

    $('#simple-datatable3').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "bDestroy": true
    });
</script>
<script src="<?= Config::getBaseUrl() ?>/dist/js/app/app.js">
</script>
</body>

</html>