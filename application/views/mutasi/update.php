<section class="section">
    <form action="<?= base_url('mutasi/update/' . $mutasi['id_mutasi']) ?>" method="POST">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('mutasi') ?>">Mutasi</a></div>
                <div class="breadcrumb-item"><?= $title ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row sortable-card">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row ">
                                    <div class="col">
                                        <label>No Mutasi</label>
                                        <input type="text" name="no_mutasi" value=" <?= $mutasi['no_mutasi'] ?>" readonly class="form-control">
                                    </div>
                                    <div class="col">
                                        <label>Tanggal Mutasi</label>
                                        <input type="text" name="tanggal" value="<?= date('d M Y / H:i:s',$mutasi['created']) ?>" readonly class="form-control">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <input type="text" name="jenis" id="jenis" value="<?= $mutasi['jenis'] ?>" readonly class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="row ">
                                    <div class="col">
                                        <label>Nominal</label>
                                        <input type="text" placeholder="Masukkan Nominal" name="nominal" id="nominal" value="<?= $mutasi['nominal'] ?>" class="form-control <?php if (form_error('nominal')) {
                                                                                                                                                                                echo ('is-invalid');
                                                                                                                                                                            } ?>">
                                        <div class="invalid-feedback">
                                            <?= form_error('nominal') ?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan" value="<?= $mutasi['keterangan'] ?>" class="form-control <?php if (form_error('keterangan')) {
                                                                                                                                        echo ('is-invalid');
                                                                                                                                    } ?>">
                                        <div class="invalid-feedback">
                                            <?= form_error('keterangan') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-icon btn-success mr-2"><i class="fas fa-save"></i> Update</button>
            <a href="<?= base_url('Mutasi') ?>" class="btn btn-icon btn-danger"><i class="fas fa-xmark"></i>
            Cancel</a>
        </div>
    </form>
</section>
<script>
    var rupiah = document.getElementById('nominal');
    rupiah.addEventListener('keyup', function(e) {
        rupiah.value = formatRupiah(this.value);
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>