<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <link href="<?= base_url()?>material/css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="<?= base_url()?>material/assets/img/icon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="register">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <center>
                                    <img src="<?= base_url() ?>material/assets/img/icon-koperasi.png" width="73px" height="73px">
                                    </center>
                                    <div class="card-body">
                                    <div class="text-center">
                                <h1 class="h4 text-gray-900">Register Page</h1>
                                <hr>
                            </div>
                            <form action="<?= base_url('auth/register') ?>" method="post" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-1 mb-sm-0 mx-auto pl-1 ">
                                    <label class="small mb-1">Full Name</label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="nama_lengkap"
                                            placeholder="Full Name" value="<?= set_value('nama_lengkap')?>">
                                            <?= form_error('nama_lengkap','<small class="text-danger pl-3 error-message">','</small>'); ?>
                                    </div>
                                    <div class="col-sm-10 mb-1 mb-sm-0 ml-1">
                                    <label class="small mb-1">Username</label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="username"
                                            placeholder="Masukan Username" value="<?= set_value('username')?>">
                                            <?= form_error('username','<small class="text-danger pl-3 error-message">','</small>'); ?>
                                    </div>
                                <div class="col-sm-10 mb-1 mb-sm-2 ml-3">
                                    <label class="small mb-1">Email</label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="email"
                                            placeholder="Masukan Email" value="<?= set_value('email')?>">
                                            <?= form_error('email','<small class="text-danger pl-3 error-message">','</small>'); ?>
                                    </div>
                                <div class="col-sm-12 mb-1 mb-sm-0 mx-auto ">
                                    <label class="small mb-1">Satker</label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="satker"
                                            placeholder="Masukan Satker Anda" value="<?= set_value('satker')?>">
                                            <?= form_error('satker','<small class="text-danger pl-3 error-message">','</small>'); ?>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row -mb-0">
                                    <div class="col-sm-5 mb-sm-0 ml-3 ">
                                    <label class="small mb-1">Password</label>
                                        <input type="password" class="form-control form-control-user "
                                            id="exampleInputPassword" placeholder="Password" name="password1">
                                            <?= form_error('password1','<small class="text-danger pl-3 error-message ">','</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                    <label class="small mb-1">Confirmation</label>
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="password2">
                                    </div>
                                </div>
                                
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mx-2  ">
                                <button type="submit" class="btn btn-primary btn-block  " name="register">Register</button>
                            </div>

                            </form>
                                        <hr>
                                        <div class="mr-7 ml-7 mx-10 mb-4 ">
                                        <small >You Have an Account? </small>
                                        
                                        <a href="<?= base_url('auth')?>" class="signin ">Sign In</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="footer mt-auto footer-dark">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 small">
                                Copyright &copy; Bps Jatim  <?= date('Y') ?>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="<?= base_url();?>material/js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url()?>material/js/sweetalert2.all.min.js"></script>
        <script>
            const login = $('.login').data('login');

                    if (login) {

                        Swal.fire(
                          'Gagal !',
                          'Silahkan coba lagi',
                          'error'
                        );
             }
        </script>
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $(".error-message").fadeOut("slow");
                }, 3000); // 5000 ms = 5 detik
            });
        </script>
    </body>
</html>