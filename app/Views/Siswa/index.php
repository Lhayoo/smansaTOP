<?= $this->extend('Template/page') ?>
<?= $this->section('content') ?>
<?= $this->include('/js_plugins/datatables') ?>
<?= $this->include('/js_plugins/datetime') ?>
<script src="<?= base_url('/assets/theme/plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>"></script>

<div class="card card-primary shadow">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="m-0 p-0"><?= $title ?? '' ?></h5>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body>">
        <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible m-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <!-- <h5><i class="icon fas fa-ban"></i> Error!</h5> -->
            <?= session()->getFlashdata('success'); ?>
        </div>
        <?php endif;
        ?>
        <div class="container mt-2 mx-auto">
            <form method="post" action="<?= base_url('/Siswa/Save'); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputFile">Masukan file excel data siswa</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="fileExcel" required
                                accept=".xls, .xlsx, .csv">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary mb-2" type="submit">Upload</button>
                </div>
            </form>
        </div>

        <table class="table table-hover table-striped mt-2 text-center" id="dataSiswa">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Nama Orang tua</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<!-- Select2 -->
<script src="<?= base_url('/assets/theme/plugins/select2/js/select2.full.min.js'); ?>"></script>
<script src="<?= base_url('/assets/theme/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js'); ?>">
</script>
<script>
$(function() {
    bsCustomFileInput.init();
});
$(document).ready(function() {
    var table = $('#dataSiswa').DataTable({
        "paging": true,
        "lengthChange": true,
        "pageLength": 10,
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
        "dom": '<"d-md-flex flex-md-row justify-content-center justify-content-md-between mt-2"<"pl-3 col-12 col-md-6"l><"pr-3 col-12 col-md-6"f>>t<"d-md-flex flex-md-row justify-content-center justify-content-md-between mb-2"<"mx-auto pl-md-3 col-12 col-md-6"i><"mx-auto pr-md-3 col-12 col-md-6"p>>',
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= base_url('/Siswa/dataTables'); ?>",
            "method": 'GET', // You are freely to use POST or GET
        }
    });
});
</script>
<?= $this->endSection() ?>