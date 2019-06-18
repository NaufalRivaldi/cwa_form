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
                    <li class="breadcrumb-item"><a href="<?= site_url('admin/') ?>">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                </ol>
            </nav>
            <hr>
            
            <!-- isi -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header">
                            Form Admin
                        </h5>
                        <div class="card-body">
                            <form action="<?= base_url('admin/edit') ?>" method="POST">
                                <input type="hidden" name="id_user" value="<?= $admin->id_user ?>">
                                <input type="hidden" name="password" value="<?= $admin->password ?>">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $admin->username ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $admin->nama ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Departemen</label>
                                    <div class="col-sm-9">
                                        <select name="dep" id="dep" class="form-control col-6">
                                            <option value="">Pilih</option>
                                            <?php foreach($dep as $d => $nama): ?>
                                                <option value="<?= $d ?>" <?= ($d==$admin->dep) ? 'selected' : '' ?>><?= $nama ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Level</label>
                                    <div class="col-sm-9">
                                        <select name="stat" id="stat" class="form-control col-6">
                                            <option value="1" <?= ($admin->stat == 1) ? 'selected' : '' ?>>Super User</option>
                                            <option value="2" <?= ($admin->stat == 2) ? 'selected' : '' ?>>Kepala Bagian</option>
                                            <option value="3" <?= ($admin->stat == 3) ? 'selected' : '' ?>>Staff</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="submit" name="btn" value="Simpan" class="btn btn-primary">
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