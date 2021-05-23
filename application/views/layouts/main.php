<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Penyuluhan</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- CSS Libraries -->
    <!-- <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css"> -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
</head>

<body>
    <?php
    $CI = &get_instance();
    $CI->load->model('Global_model');
    ?>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <ul class="navbar-nav navbar-left mr-auto">
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/<?= $this->session->userdata('pict'); ?>" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('nama'); ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?php echo base_url('profile') ?>" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo base_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">Stisla</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        <?php if ($this->session->userdata('level') == 'Admin') { ?>
                            <li class="<?php echo (empty($this->uri->segment(1)) || $this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
                                <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
                                    <i class="fas fa-fire"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-header">Data Master</li>
                            <li class="<?php echo ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('user/index'); ?>"><i class="fas fa-user"></i> <span>Data User</span></a></li>
                            <li class="<?php echo ($this->uri->segment(1) == 'kelas') ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('kelas/index'); ?>"><i class="fas fa-chart-bar"></i> <span>Data Kelas</span></a></li>
                            <li class="<?php echo ($this->uri->segment(1) == 'sub_kelas') ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('sub_kelas/index'); ?>"><i class="fas fa-home"></i> <span>Data Sub Kelas</span></a></li>
                            <li class="<?php echo ($this->uri->segment(1) == 'mapel') ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('mapel/index'); ?>"><i class="fas fa-book-open"></i> <span>Data Mapel</span></a></li>
                            <li class="<?php echo ($this->uri->segment(1) == 'jadwal') ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('jadwal/index'); ?>"><i class="fas fa-calendar-alt"></i> <span>Data Jadwal</span></a></li>
                            <li class="<?php echo ($this->uri->segment(1) == 'siswa') ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('siswa/index'); ?>"><i class="fas fa-users"></i> <span>Data Siswa</span></a></li>
                            <li class="<?php echo ($this->uri->segment(1) == 'pendidik') ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('pendidik/index'); ?>"><i class="fas fa-users"></i> <span>Data Pendidik</span></a></li>
                        <?php } elseif ($this->session->userdata('level') == 'Pendidik') { ?>
                            <li class="<?php echo (empty($this->uri->segment(1)) || $this->uri->segment(1) == 'dashboardpendidik') ? 'active' : ''; ?>">
                                <a class="nav-link" href="<?php echo base_url('dashboardpendidik'); ?>">
                                    <i class="fas fa-fire"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <?php
                            $p = $CI->Global_model->get_data(['user_id' => $CI->session->userdata('user_id')], 'pendidik', false);
                            $cekMapel = $CI->Global_model->get_data(['pendidik_id' => $p['pendidik_id']], 'mapel');
                            if ($cekMapel != null) {
                            ?>
                                <li class="<?php echo ($this->uri->segment(1) == 'p_mapel') ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('p_mapel/index'); ?>"><i class="fas fa-sticky-note"></i> <span>Mata Pelajaran</span></a></li>
                            <?php } ?>
                            <?php
                            $cekJadwal = $CI->Global_model->get_data(['pendidik_id' => $p['pendidik_id']], 'jadwal');
                            if ($cekJadwal != null) {
                            ?>
                                <li class="<?php echo ($this->uri->segment(1) == 'p_jadwal') ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('p_jadwal/index'); ?>"><i class="fas fa-clock"></i> <span>Jadwal</span></a></li>
                            <?php } ?>
                            <?php
                            $cekWali = $CI->Global_model->get_data(['pendidik_id' => $p['pendidik_id']], 'sub_kelas');
                            if ($cekWali != null) {
                            ?>
                                <li class="<?php echo ($this->uri->segment(1) == 'p_wali') ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('p_wali/index'); ?>"><i class="fas fa-hotel"></i> <span>Wali Kelas</span></a></li>
                            <?php } ?>
                            <?php
                            if ($p['is_tu'] == '1') {
                            ?>
                                <li class="<?php echo ($this->uri->segment(1) == 'p_tu') ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('p_tu/index'); ?>"><i class="fas fa-home"></i> <span>Tata Usaha</span></a></li>
                            <?php } ?>
                          
                        <?php } elseif ($this->session->userdata('level') == 'Siswa') { ?>
                            <li class="menu-header">Siswa</li>
                            <li class="<?php echo (empty($this->uri->segment(1)) || $this->uri->segment(1) == 'dashboardsiswa') ? 'active' : ''; ?>">
                                <a class="nav-link" href="<?php echo base_url('dashboardsiswa'); ?>">
                                    <i class="fas fa-fire"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="<?php echo (empty($this->uri->segment(1)) || $this->uri->segment(1) == 'biodata') ? 'active' : ''; ?>">
                                <a class="nav-link" href="<?php echo base_url('biodata'); ?>">
                                    <i class="fas fa-user-cog"></i> <span>Biodata</span>
                                </a>
                            </li>
                        <?php } ?>

                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <?php if ($this->session->flashdata('message')) {
                        echo $this->session->flashdata('message');
                    } ?>
                    <?php
                    if (isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>
                </section>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->

    <!-- <script src="<?php echo base_url(); ?>assets/js/stisla.js"></script> -->

    <!-- JS Libraies -->
    <!-- <script src="../node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script> -->
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('#myTable2').DataTable();
            $('#myTable3').DataTable();
        });
        var baseUrl = '<?= base_url() ?>';
        $("body").delegate("#resetSemester", "click", function() {
            Swal.fire({
                title: 'Yakin ingin mereset semester?',
                text: "Jika kamu mereset semester, maka semua data di kompensasi akan dipindah ke base kompensasi",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Reset Semester!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: baseUrl + "kompen/resetSemester/",
                        type: "POST",
                        cache: false,
                        success: function(msg) {
                            if (msg === 'success') {
                                Swal.fire(
                                    'Berhasil!',
                                    'Berhasil mereset semester',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            } else {
                                Swal.fire(
                                    'Gagal!',
                                    'Gagal mereset semester',
                                    'error'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            }
                        }
                    })
                }
            })
        });
    </script>
    <!-- Template JS File -->
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

</body>

</html>