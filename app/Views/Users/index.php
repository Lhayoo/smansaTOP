<?= $this->extend('Template/page') ?>
<?= $this->section('content') ?>
<?= $this->include('/js_plugins/datatables') ?>
<?= $this->include('/js_plugins/datetime') ?>
<script src="<?= base_url('/assets/theme/plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>"></script>

<div class="card card-primary shadow">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="m-0 p-0"><?= $title ?? '' ?></h5>
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i>
                Tambah
                Data</button>
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
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible m-2">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <!-- <h5><i class="icon fas fa-ban"></i> Error!</h5> -->
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif;
        ?>
        <table class="table table-hover table-striped mt-2 text-center" id="dataUsers">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Last Login</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Users/save'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" id="username" placeholder="Masukan username" required value="<?= old('username'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text+" class="form-control" name="password" id="password" placeholder="Password" required value="<?= old('password'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="level">Role</label>
                        <select class="form-control" id="level" name="role" required>
                            <option value="" <?= (old('username')) ? 'hidden' : 'selected'; ?>>-pilih role-</option>
                            <option value="1" <?= (old('role') == '1') ? 'selected' : ''; ?>>Admin</option>
                            <option value="2" <?= (old('role') == '2') ? 'selected' : ''; ?>>User</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php
foreach ($users as $dataUsers) :
?>
    <div class="modal fade" id="delete<?= $dataUsers['id']; ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Users/delete'); ?>">
                    <div class="modal-body ">
                        <input type="hidden" name="id" value="<?= $dataUsers['id']; ?>">
                        <h3 class="modal-title text-center">Yakin ingin menghapus <?= $dataUsers['username']; ?>?</h3>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php
foreach ($users as $dataUsers) :
?>
    <div class="modal fade" id="edit<?= $dataUsers['id']; ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Users/edit'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" id="username" placeholder="Masukan username" required value="<?= (old('username')) ? old('username') : $dataUsers['username']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php
                            if (old('password')) {
                                $password = old('password');
                            } else {
                                // encr
                            }

                            ?>
                            <label for="password">Password</label>
                            <input type="text+" class="form-control" name="password" id="password" placeholder="Password" required value="<?= (old('password')) ? old('password') : base64_decode($dataUsers['password']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="level">Role</label>
                            <select class="form-control" id="level" name="role" required>
                                <?php
                                if (old('role')) {
                                    $role = old('role');
                                } else {
                                    $role = $dataUsers['level'];
                                }
                                ?>
                                <option value="1" <?= ($role == '1') ? 'selected' : ''; ?>>Admin</option>
                                <option value="2" <?= ($role == '2') ? 'selected' : ''; ?>>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Select2 -->
<script src="<?= base_url('/assets/theme/plugins/select2/js/select2.full.min.js'); ?>"></script>
<script src="<?= base_url('/assets/theme/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js'); ?>">
</script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
    $(document).ready(function() {
        var table = $('#dataUsers').DataTable({
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
                "url": "<?= base_url('/Users/dataTables'); ?>",
                "method": 'GET', // You are freely to use POST or GET
            }
        });
    });
</script>
<?= $this->endSection() ?>