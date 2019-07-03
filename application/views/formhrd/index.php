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
                    <li class="breadcrumb-item active" aria-current="page">Form HRD</li>
                </ol>
            </nav>
            <hr>

            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header"><i class="fas fa-file"></i></i> Jumlah Form ACC</div>
                        <div class="card-body">
                            <h5 class="card-title">0</h5>
                            <a href="" class="btn btn-outline-light btn-block">Tampil</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header"><i class="fas fa-file"></i> Jumlah Form Pending</div>
                        <div class="card-body">
                            <h5 class="card-title">0</h5>
                            <a href="" class="btn btn-outline-light btn-block">Tampil</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header"><i class="fas fa-file"></i> Jumlah Form Tidak ACC</div>
                        <div class="card-body">
                            <h5 class="card-title">0</h5>
                            <a href="" class="btn btn-outline-light btn-block">Tampil</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr>
            <h3>Riwayat Pengajuan Form</h3>
            <!-- isi -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header">
                            <a href="<?= base_url('formhrd/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                        </h5>
                        <div class="card-body">
                            <table id="table_id" style="font-size:.9em" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Dep</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($formhrd)): ?>
                                    <?php foreach($formhrd as $row): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <a href="<?= site_url('formhrd/showform/'.$row->id_form) ?>"><?php $this->helper->setKategori($row->kategori) ?>
                                                </a>
                                            </td>
                                            <td><?= $row->nama ?></td>
                                            <td><?= $row->nik ?></td>
                                            <td><?= $row->dep ?></td>
                                            <td><?= $this->helper->tglFormat($row->tgl_a) ?> s/d <?= $this->helper->tglFormat($row->tgl_a) ?></td>
                                            <td><?= $row->waktu_a ?> s/d <?= $row->waktu_b ?></td>
                                            <td><?= $this->helper->status($row->stat) ?></td>
                                            <td>
                                                <?php if($row->stat == 1): ?>
                                                    <a href="<?= site_url('formhrd/edit/'.$row->id_form) ?>"><i class="fas fa-cog text-success"></i></a> | 
                                                    <a href="<?= site_url('formhrd/delete/'.$row->id_form) ?>" onclick="return confirm('Ingin menghapus data?')"><i class="fas fa-trash text-danger"></i></a>
                                                <?php elseif($row->stat == 2): ?>
                                                    Form ACC
                                                <?php else: ?>
                                                    Tidak ACC
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
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