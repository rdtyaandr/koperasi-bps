<main>
<?php

date_default_timezone_set("Asia/Jakarta");

    ?>
    <div class="container-fluid mt-5">
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Dashboard</h1>
                <div class="small"><span class="font-weight-500 text-primary"><?= hari(); ?></span> <?= $tanggal = date('d') . " " . bulan() . " " . date('Y') ?> &middot; <span id="jam" class="badge badge-teal p-2" style="font-size: 13px; font-weight: bold"></span></div>
            </div>
        </div>
        <div class="alert alert-primary border-0 mb-4 mt-3 px-md-5">
            <div class="position-relative">
                <div class="row align-items-center justify-content-between">
                    <div class="col position-relative">
                        <h2 class="text-primary">Selamat Datang, <?= $this->session->userdata('username') ?> !</h2>
                        <p class="text-gray-700">Silakana beli Barang Yang kamu butuhkan 😁</p>
        </main>
        <script>
    window.onload = function() {
        jam();
    }

    function jam() {
        var e = document.getElementById('jam'),
            d = new Date(),
            h, m, s;
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        e.innerHTML = h + ' : ' + m + ' : ' + s;

        setTimeout('jam()', 1000);
    }

    function set(e) {
        e = e < 10 ? '0' + e : e;
        return e;
    }
</script>