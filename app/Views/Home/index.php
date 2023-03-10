<?= $this->extend('Template/page') ?>
<?= $this->section('content') ?>
<?= $this->include('/js_plugins/datatables') ?>
<?= $this->include('/js_plugins/datetime') ?>
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url('/assets/theme/plugins/select2/css/select2.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('/assets/theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">


<div class="card card-primary shadow">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="m-0 p-0"><?= $title ?? '' ?></h5>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body>">
        <form method="POST">
            <div class="row mx-2 mt-2">

                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nama siswa</label>
                        <select class="form-control select2" style="width: 100%;" name="nama" required>
                            <option value="" selected>-pilih nama-</option>
                            <?php
                            foreach ($listSiswa as $s) :
                            ?>
                                <option value="<?= $s['nisn']; ?>"><?= $s['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-1">
                    <br>
                    <div class="d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-primary d-none" name="cari">Cari</button>
                    </div>
                </div>
            </div>
        </form>
        <table class="table table-hover table-striped mt-2 text-center" id="rekapSiswa">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Nama Orang tua</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($siswa)) : ?>
                    <tr>
                        <td>1</td>
                        <td><?= $siswa['nisn']; ?></td>
                        <td><?= $siswa['nama']; ?></td>
                        <td><?= $siswa['kelas']; ?></td>
                        <td><?= $siswa['alamat']; ?></td>
                        <td><?= $siswa['no_hp']; ?></td>
                        <td><?= $siswa['nama_ortu']; ?></td>
                    </tr>
                <?php
                else :
                ?>
                    <tr>
                        <td colspan="7" class="text-center">Pilih nama terlebih dahulu</td>
                    </tr>
                <?php endif; ?>

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
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    })
    $('.select2').on('change', function() {
        $('button[name="cari"]').click();
    });
</script>
<?= $this->endSection() ?>