<link href="<?= base_url() ?>material/css/account.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container-fluid">
    <h1 class="mt-4">Detail Akun</h1>

    <?php if ($this->session->flashdata('success')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: '<?= $this->session->flashdata('success'); ?>',
                text: 'Perubahan telah berhasil disimpan!',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true, // Menampilkan progress bar
            });
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('no_change')): ?>
        <script>
            Swal.fire({
                icon: 'question',
                title: '<?= $this->session->flashdata('no_change'); ?>',
                text: 'Mohon lakukan perubahan terlebih dahulu.',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true, // Menampilkan progress bar
            });
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error_message')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan',
            text: '<?= strip_tags($this->session->flashdata('error_message')); ?>',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    </script>
<?php endif; ?>

    <div class="row">
        <!-- Profile Card -->
        <div class="col-xl-4 col-lg-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-user-circle fa-2x mr-2"></i> Profil
                </div>
                <div class="card-body text-center">
                    <div class="profile-picture">
                        <img class="img-account-profile rounded-circle mb-3"
                            src="<?= base_url($profile_picture ? $profile_picture : 'material/image/user.jpg') ?>"
                            alt="Profile Picture" style="width: 150px;">
                    </div>
                    <button class="btn btn-sm btn-link text-primary" id="editProfileBtn" data-toggle="modal"
                        data-target="#editProfileModal">
                        <i class="fas fa-camera fa-lg mr-2"></i> Edit Foto
                    </button>
                    <h4 class="mb-1"><?= $this->session->userdata('nama_lengkap'); ?></h4>
                    <p class="text-muted mb-3"><?= $this->session->userdata('username'); ?></p>
                </div>
            </div>
        </div>

        <!-- Account Details Form -->
        <div class="col-xl-8 col-lg-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-cog fa-2x mr-2"></i> Detail Akun
                </div>
                <div class="card-body">
                    <form action="<?= base_url('dashboard/update_account') ?>" method="post">
                        <div class="form-group">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                value="<?= $this->session->userdata('nama_lengkap'); ?>" readonly
                                onclick="resetPasswordFields()">
                        </div>
                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input type="text"
                                class="form-control <?= (form_error('username') != '') ? 'is-invalid' : '' ?>"
                                id="username" name="username" value="<?= set_value('username', $username); ?>"
                                onclick="resetPasswordFields()">
                            <div class="invalid-feedback">
                                <?= form_error('username'); ?>
                            </div>
                        </div>
                        <div class="form-group" id="password-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password"
                                class="form-control <?= (form_error('password') != '') ? 'is-invalid' : '' ?>"
                                id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password"
                                onclick="showPasswordFields()">
                            <div class="invalid-feedback small ml-2">
                                <?= form_error('password'); ?>
                            </div>
                        </div>
                        <div id="newPasswordFields" style="display: none;">
                            <div class="form-group">
                                <label for="new_password" class="form-label">Masukkan password baru</label>
                                <input type="password"
                                    class="form-control <?= (form_error('new_password') != '') ? 'is-invalid' : '' ?>"
                                    id="new_password" name="new_password" placeholder="Ketik password baru anda disini">
                                <div class="invalid-feedback small ml-2">
                                    <?= form_error('new_password'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password" class="form-label">Masukkan ulang password baru</label>
                                <input type="password"
                                    class="form-control <?= (form_error('confirm_password') != '') ? 'is-invalid' : '' ?>"
                                    id="confirm_password" name="confirm_password"
                                    placeholder="Ketik ulang password baru anda disini">
                                <div class="invalid-feedback small ml-2">
                                    <?= form_error('confirm_password'); ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">
                            <i class="fas fa-save fa-lg mr-2"></i> Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Foto Profile -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content rounded-lg border-0 shadow-lg">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title d-flex align-items-center" id="editProfileModalLabel">
                    <i class="fas fa-camera fa-lg mr-2"></i> Edit Foto Profil
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <!-- Form untuk upload foto -->
                <form action="<?= base_url('dashboard/upload_profile_picture') ?>" method="post" enctype="multipart/form-data">
                    <div class="upload-container text-center">
                        <div id="upload-placeholder" class="upload-placeholder d-flex flex-column align-items-center justify-content-center mt-4">
                            <i class="fas fa-cloud-upload-alt fa-5x mb-2"></i>
                            <p class="mb-0">Drag & Drop Image</p>
                            <p class="text-muted">or <label for="file-upload" class="text-primary clickable">Choose File</label></p>
                        </div>
                        <input type="file" id="file-upload" name="file-upload" accept="image/*" style="display: none;" />
                        <div class="image-preview-container position-relative mt-4">
                            <img id="preview" src="#" alt="Your Image" class="img-fluid d-none rounded-lg shadow-lg" style="max-height: 300px;" />
                            <div id="file-name" class="file-name-overlay position-absolute w-100 text-center text-white rounded-bottom p-2 d-none"></div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary rounded-circle">
                            <i class="fas fa-save fa-lg"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="<?= base_url() ?>material/js/account.js"></script>