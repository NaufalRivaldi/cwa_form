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
            
            <h2>Admin</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= site_url('home/dashboard') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Admin</li>
                </ol>
            </nav>
            <hr>
            
            <!-- isi -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header">
                            <a href="<?= base_url('admin/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                        </h5>
                        <div class="card-body">
                            <table id="table_id">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Dep</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php if(!empty($admin)): ?>
                                    <?php foreach($admin as $row): ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row->username ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->dep ?></td>
                                                <td><?= $this->helper->level($row->stat) ?></td>
                                                <td>
                                                    <a href=""><i class="fas fa-cog text-success"></i></a> | 
                                                    <a href=""><i class="fas fa-trash text-danger"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php endforeach; ?>
                                <?php endif; ?>
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