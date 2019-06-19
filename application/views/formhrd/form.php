<?php
    $no = 1;
?>

<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('_part/head.php') ?>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php $this->load->view('_part/sidebar.php') ?>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- navbar -->
            <?php $this->load->view('_part/navbar.php') ?>
        
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= site_url('home/dashboard') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('formhrd/') ?>">Form HRD</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                </ol>
            </nav>
            <hr>
            
            <!-- isi -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header">
                            Form HRD
                        </h5>
                        <div class="card-body">
                            <form action="<?= base_url('formhrd/add') ?>" method="POST">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kategori</label>
                                    <div class="col-sm-9">
                                        <?php foreach($kategori as $a => $b): ?>
                                        <input type="checkbox" name="kategori[]" value="<?= $a ?>"> <?= $b ?> <br>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control col-4" id="nik" name="nik">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="tgl_a" name="tgl_a">
                                    </div>
                                    <label class="col-sm-1 col-form-label">s/d</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="tgl_b" name="tgl_b">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Waktu(*)</label>
                                    <div class="col-sm-4">
                                        <input type="time" class="form-control" id="waktu_a" name="waktu_a">
                                        <p class="text-warning">*Menggunakan Format 24 Jam</p>
                                    </div>
                                    <label class="col-sm-1 col-form-label">s/d</label>
                                    <div class="col-sm-4">
                                        <input type="time" class="form-control" id="waktu_b" name="waktu_b">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <textarea name="keterangan" id="" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="submit" name="btn" value="Ajukan" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <?php $this->load->view('_part/modal.php') ?>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <?php $this->load->view('_part/javascript.php') ?>
</body>

</html>