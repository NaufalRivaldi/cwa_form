<nav id="sidebar">
    <div class="sidebar-header">
        <img src="<?= base_url('assets/img/icon.png') ?>" alt="" width="30"><span class="title"><?= APP_NAME ?></span>
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="<?= site_url('home/dashboard') ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </li>
        <li>
            <a href="#admin" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user"></i> Menu Admin</a>
            <ul class="collapse list-unstyled" id="admin">
                <li>
                    <a href="#">> Admin</a>
                </li>
                <li>
                    <a href="#">> Staff IT</a>
                </li>
                <li>
                    <a href="#">> HRD</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fas fa-file"></i> Form HRD</a>
        </li>
        <li>
            <a href="#itSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-file"></i> Form IT</a>
            <ul class="collapse list-unstyled" id="itSubMenu">
                <li>
                    <a href="#">> Penanganan Komputer</a>
                </li>
                <li>
                    <a href="#">> Pengajuan Design</a>
                </li>
            </ul>
        </li>
    </ul>
    <p style="font-size:0.8em; padding:10px;">
        Copyright &copy; 2019 Naufal Rivaldi. All Rights Reserved.
    </p>
</nav>