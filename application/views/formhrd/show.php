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
            
            <h2>Form HRD</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= site_url('home/dashboard') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('formhrd') ?>">Form HRD</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tampil Form</li>
                </ol>
            </nav>
            <hr>
            <!-- isi -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <a href="<?= base_url('formhrd/') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Kembali</a> 
                                    <a href="<?= base_url('formhrd/') ?>" class="btn btn-success"><i class="fas fa-plus-circle"></i> Pengesahan</a>
                                </div>
                                <div class="col-6" style="text-align:right">
                                    <a href="<?= base_url('formhrd/') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Print</a> 
                                </div>
                            </div>
                        </h5>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>Status Form</td>
                                    <td>:</td>
                                    <td><?= $this->helper->status($formhrd->stat) ?></td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td><?php $this->helper->setKategori($formhrd->kategori) ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $formhrd->nama ?></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td><?= $formhrd->nik ?></td>
                                </tr>
                                <tr>
                                    <td>Departemen</td>
                                    <td>:</td>
                                    <td><?= $formhrd->dep ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td><?= $this->helper->tglFormat($formhrd->tgl_a) ?> s/d <?= $this->helper->tglFormat($formhrd->tgl_a) ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu</td>
                                    <td>:</td>
                                    <td><?= $formhrd->waktu_a ?> s/d <?= $formhrd->waktu_b ?></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td><?= $formhrd->keterangan ?></td>
                                </tr>
                            </table>
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