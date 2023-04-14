<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/izitoast/css/iziToast.min.css">
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/summernote/summernote-bs4.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
    <style>
        #my-textarea {
            height: 150px !important;
            resize: both;
        }
    </style>
</head>

<body>
    <div class="toastr-sukses" data-flashdata="<?= $this->session->flashdata('toastr-sukses'); ?>"></div>
    <div class="toastr-eror" data-flashdata="<?= $this->session->flashdata('toastr-eror'); ?>"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <?php if ($this->session->userdata('log_admin')) : ?>
                                <img alt="image" src="<?= base_url('uploads/profile/' . $this->dt_admin->image); ?>" class="rounded-circle mr-1">
                                <div class="d-sm-none d-lg-inline-block"><?= $this->dt_admin->username; ?></div>
                            <?php elseif ($this->session->userdata('log_user')) : ?>
                                <img alt="image" src="<?= base_url('uploads/profiles/' . $this->dt_user->image); ?>" class="rounded-circle mr-1">
                                <div class="d-sm-none d-lg-inline-block"><?= $this->dt_user->username; ?></div>
                            <?php endif; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= base_url('profile'); ?>" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">SMART KENARI</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">KNR</a>
                    </div>
                    <ul class="sidebar-menu">

                        <!-- admin session -->
                        <?php if ($this->session->userdata('log_admin')) : ?>
                            <li class="<?= ($this->uri->segment(1) === "admin") ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('admin'); ?>"><i class="fas fa-code"></i> <span>Dashboard</span></a></li>


                            <li class="menu-header">Data</li>

                            <li class="<?= ($this->uri->segment(1) === "rekap") ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('rekap'); ?>"><i class="fas fa-user-cog"></i> <span>Rekap data</span></a></li>

                            <li class="<?= ($this->uri->segment(1) === "list-admin") ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('list-admin'); ?>"><i class="fas fa-list"></i> <span>List Admin</span></a></li>

                            <li class="<?= ($this->uri->segment(1) === "setting") ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('setting'); ?>"><i class="fas fa-asterisk"></i> <span>Setting</span></a></li>

                        <?php endif; ?>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">

                <?php $this->load->view($page); ?>

            </div>


            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2022 <div class="bullet"></div><a href="https://github.com/ilham-syah09/">Ilham Syah</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- logout modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ALERT!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Kamu akan meninggalkan halaman ini?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url(); ?>assets/modules/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/modules/popper.js"></script>
    <script src="<?= base_url(); ?>assets/modules/tooltip.js"></script>
    <script src="<?= base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url(); ?>assets/modules/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
    <script src="<?= base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="<?= base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= base_url(); ?>assets/modules/izitoast/js/iziToast.min.js"></script>

    <script src="<?= base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="<?= base_url(); ?>assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="<?= base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url(); ?>assets/js/page/features-post-create.js"></script>
    <script src="<?= base_url(); ?>assets/js/page/modules-datatables.js"></script>
    <script src="<?= base_url(); ?>assets/js/page/modules-toastr.js"></script>

    <!-- jquery validate -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var sukses = $('.toastr-sukses').data('flashdata');
            var eror = $('.toastr-eror').data('flashdata');

            if (sukses) {
                iziToast.success({
                    title: 'Success',
                    message: sukses,
                    position: 'topRight'
                });
            }

            if (eror) {
                iziToast.error({
                    title: 'Error',
                    message: eror,
                    position: 'topRight'
                });
            }
        })



        $("#check-all").click(function() { // Ketika user men-cek checkbox all
            if ($(this).is(":checked")) // Jika checkbox all diceklis
                $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
            else // Jika checkbox all tidak diceklis
                $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
        });

        $("#btn-delete").click(function() { // Ketika user mengklik tombol delete
            var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi

            if (confirm) // Jika user mengklik tombol "Ok"
                $("#form-delete").submit(); // Submit form
        });

        $('#form-su').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 6,
                },
                retype_password: {
                    required: true,
                    equalTo: '#password'
                },
            },
            messages: {
                email: {
                    required: "Email harus diisi!",
                    email: "Format email salah!"
                },
                password: {
                    required: "Password harus diisi!",
                    min_length: "Password harus berisi 6 karakter"
                },
                retype_password: {
                    required: "Password harus diisi!",
                    equalTo: "Password tidak sama!"
                },
            },
            errorPlacement: function(label, element) {
                label.addClass('arrow text-danger');
                label.insertAfter(element);
            },
            wrapper: 'span'
        });
    </script>
</body>

</html>