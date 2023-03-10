<!-- DataTables -->
<link rel="stylesheet"
    href="<?= base_url('/assets/theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ;?>">
<link rel="stylesheet"
    href="<?= base_url('/assets/theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ;?>">
<link rel="stylesheet"
    href="<?= base_url('/assets/theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ;?>">
<!-- DataTables  & Plugins -->
<script src="<?= base_url('/assets/theme/plugins/datatables/jquery.dataTables.min.js') ;?>"></script>
<script src="<?= base_url('/assets/theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ;?>"></script>
<script src="<?= base_url('/assets/theme/plugins/datatables-responsive/js/dataTables.responsive.min.js') ;?>"></script>
<script src="<?= base_url('/assets/theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ;?>"></script>
<script src="<?= base_url('/assets/theme/plugins/datatables-buttons/js/dataTables.buttons.min.js') ;?>"></script>
<script src="<?= base_url('/assets/theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ;?>"></script>
<script src="<?= base_url('/assets/theme/plugins/jszip/jszip.min.js') ;?>"></script>
<script src="<?= base_url('/assets/theme/plugins/pdfmake/pdfmake.min.js') ;?>"></script>
<script src="<?= base_url('/assets/theme/plugins/pdfmake/vfs_fonts.js') ;?>"></script>
<script src="<?= base_url('/assets/theme/plugins/datatables-buttons/js/buttons.html5.min.js') ;?>"></script>
<script src="<?= base_url('/assets/theme/plugins/datatables-buttons/js/buttons.print.min.js') ;?>"></script>
<script src="<?= base_url('/assets/theme/plugins/datatables-buttons/js/buttons.colVis.min.js') ;?>"></script>

<script type="text/javascript">
$(document).ready(function() {
    // DataTable
    var table = $('.datatable1').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "language": {
            "lengthMenu": 'Tampil <select>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="40">40</option>' +
                '<option value="50">50</option>' +
                '<option value="100">100</option>' +
                '<option value="-1">All</option>' +
                '</select> data',
            "search": "Cari :",
            "zeroRecords": "Tidak ada data ditemukan",
            "decimal": "",
            "emptyTable": "Data Kosong",
            "info": "Tampil _START_ s.d _END_ dari _TOTAL_ data",
            "infoEmpty": "Tampil 0 s.d 0 dari 0 data",
            "infoFiltered": "(Disaring dari _MAX_ data)",
            "infoPostFix": "",
            "thousands": ",",
            "paginate": {
                "first": "<i class='fas fa-step-backward'></i>",
                "last": "<i class='fas fa-step-forward'></i>",
                "next": "<i class='fas fa-forward'></i>",
                "previous": "<i class='fas fa-backward'></i>"
            },
        },
        "dom": '<"d-md-flex flex-md-row justify-content-center justify-content-md-between mt-2"<"pl-3 col-12 col-md-6"l><"pr-3 col-12 col-md-6"f>>t<"d-md-flex flex-md-row justify-content-center justify-content-md-between mb-2"<"mx-auto pl-md-3 col-12 col-md-6"i><"mx-auto pr-md-3 col-12 col-md-6"p>>'
    });
});
</script>