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
            
            <h1>Selamat datang di Sistem E - Form</h1>
            <h2>PT. CITRA WARNA JAYA ABADI</h2>
            <hr>
            <h4>Dashboard</h4>

            <!-- IT -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header"><i class="fas fa-cog"></i></i> Jumlah Penanganan IT</div>
                        <div class="card-body">
                            <h5 class="card-title">0</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header"><i class="fas fa-palette"></i> Pendingan Design</div>
                        <div class="card-body">
                            <h5 class="card-title">0</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header"><i class="fas fa-undo"></i> Form HRD</div>
                        <div class="card-body">
                            <h5 class="card-title">0</h5>
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