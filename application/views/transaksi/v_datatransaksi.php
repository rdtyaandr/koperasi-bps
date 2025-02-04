<main>
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
        <div class="container-fluid">
            <div class="page-header-content" style="margin-top: -20px;">
                <h4 class="page-header-title">
                    <div class="page-header-icon">
                        <i data-feather="bar-chart"></i>
                    </div>
                    <span>Data Transaksi</span>
                </h4>
                <div class="page-header-subtitle"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="margin-top: -130px;">
        <div class="card mb-4">
            <div class="card-header">
                <div>
                    <a href="<?= base_url('transaksi'); ?>" class="btn btn-info">
                        <i data-feather="plus" style="font-size: 18px;"></i>
                    </a>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="datatable table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5px;">No</th>
                                <th>Unit</th>
                                <th>Cara Bayar</th>
                                <th>Status Bayar</th>
                                <th>Pengambilan</th>
                                <th>Tanggal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data as $d): ?>
                                <tr>
                                    <td>
                                        <center><?= $no++; ?></center>
                                    </td>
                                    <td><?= $d['nama_unit'] ?></td>
                                    <td>
                                        <?php if ($d['cara_bayar'] == 1) {
                                            echo "<h6><span class='badge badge-primary' style='border-radius: 20px; padding: 6px;'>&nbsp;&nbsp;&nbsp;Dibayar Cash&nbsp;&nbsp;&nbsp;</span><h6>";
                                        } else {
                                            echo "<h6><span class='badge badge-indigo' style='border-radius: 20px; padding: 6px;'>&nbsp;&nbsp;&nbsp;Dibayar Kredit&nbsp;&nbsp;&nbsp;</span><h6>";
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if ($d['status_bayar'] == 1) {
                                            echo "<h6><span class='badge badge-success' style='border-radius: 20px; padding: 6px;'>&nbsp;&nbsp;&nbsp;Sudah Lunas&nbsp;&nbsp;&nbsp;</span><h6>";
                                        } else {
                                            echo "<h6><span class='badge badge-danger' style='border-radius: 20px; padding: 6px;'>&nbsp;&nbsp;&nbsp;Belum Lunas&nbsp;&nbsp;&nbsp;</span><h6>";
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if ($d['status_pengambilan'] == 1) {
                                            echo "<h6><span class='badge badge-info' style='border-radius: 20px; padding: 6px;'>&nbsp;&nbsp;&nbsp;Sudah Diambil&nbsp;&nbsp;&nbsp;</span><h6>";
                                        } else {
                                            echo "<h6><span class='badge badge-danger' style='border-radius: 20px; padding: 6px;'>&nbsp;&nbsp;&nbsp;Belum Diambil&nbsp;&nbsp;&nbsp;</span><h6>";
                                        } ?>
                                    </td>
                                    <td>
                                        <?php

                                        $create = explode(' ', $d['created_at']);
                                        $create2 = explode('-', $create[0]);
                                        $tanggal = $create2[2];
                                        $bulan = $create2[1];
                                        $tahun = $create2[0];

                                        $tampil_tanggal = $tanggal . "-" . $bulan . "-" . $tahun;
                                        $param = $d['id_transaksi'];
                                        echo $tampil_tanggal;
                                        ?>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="#" class="btn btn-default btn-xs detail" data-toggle="exampleModalLg"
                                                data-target="modal-detail" data-unit="<?= $d['nama_unit'] ?>"
                                                data-carabayar="<?= ($d['cara_bayar'] == 1) ? 'Dibayar Cash' : 'Dibayar Kredit' ?>"
                                                data-statusbayar="<?= ($d['status_bayar'] == 1) ? 'Sudah Lunas' : 'Belum Lunas' ?>"
                                                data-pengambilan="<?= ($d['status_pengambilan'] == 1) ? 'Sudah Diambil' : 'Belum Diambil' ?>"
                                                data-tanggal="<?= $tampil_tanggal ?>"
                                                data-parameter="<?= $d['id_transaksi'] ?>">
                                                <i class="fas fa-eye" style="font-size: 16px;"></i>
                                            </a>
                                            <a href="<?= base_url('transaksi/ubahtransaksi') ?>/<?= $d['id_transaksi']; ?>"
                                                class="badge badge-info">
                                                <i class="fas fa-edit" style="font-size: 14px;"></i>
                                            </a>
                                            <a href="<?= base_url('transaksi/hapus') ?>/<?= $d['id_transaksi']; ?>"
                                                class="badge badge-danger tombol-hapus">
                                                <i class="fas fa-trash-alt" style="font-size: 14px;"></i>
                                            </a>
                                        </center>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Large modal -->
    <div class="modal fade" id="exampleModalLg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Transaksi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Unit:</h6>
                            <p id="unit" style="font-size: 18px; font-weight: bold; color: #000;"></p>
                        </div>
                        <div class="col-md-6">
                            <h6>Tanggal:</h6>
                            <p id="tanggal" style="font-size: 18px; font-weight: bold; color: #000;"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Cara Bayar:</h6>
                            <p id="carabayar" style="font-size: 18px; font-weight: bold; color: #000;"></p>
                        </div>
                        <div class="col-md-6">
                            <h6>Status Bayar:</h6>
                            <p id="statusbayar" style="font-size: 18px; font-weight: bold; color: #000;"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Pengambilan:</h6>
                            <p id="pengambilan" style="font-size: 18px; font-weight: bold; color: #000;"></p>
                        </div>
                    </div>
                    <hr>
                    <h5>Detail Barang</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody id="detail_transaksi">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" id="footer-modal">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ? -->
</main>


<script src="<?= base_url(); ?>material/js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>material/js/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function () {
        // Event handler for detail button
        $('.detail').on('click', function () {
            var unit = $(this).data('unit');
            var caraBayar = $(this).data('carabayar');
            var statusBayar = $(this).data('statusbayar');
            var pengambilan = $(this).data('pengambilan');
            var tanggal = $(this).data('tanggal');

            // Update modal content with data
            $('#exampleModalLg').modal('show');
            $('.modal-title').text('Detail Transaksi');
            var modalBody = `
            <table class="table">
                <tbody>
                    <tr>
                        <td>Unit</td>
                        <td>${unit}</td>
                    </tr>
                    <tr>
                        <td>Cara Bayar</td>
                        <td>${caraBayar}</td>
                    </tr>
                    <tr>
                        <td>Status Bayar</td>
                        <td>${statusBayar}</td>
                    </tr>
                    <tr>
                        <td>Pengambilan</td>
                        <td>${pengambilan}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>${tanggal}</td>
                    </tr>
                </tbody>
            </table>
        `;
            $('.modal-body').html(modalBody);
        });

        // Event handler for delete button
        $('.tombol-hapus').on('click', function (e) {
            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Yakin mau menghapus?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Tidak, Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            });
        });
    });

</script>