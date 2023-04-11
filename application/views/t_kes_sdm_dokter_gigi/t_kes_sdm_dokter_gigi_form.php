<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA SDM - DOKTER_GIGI</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

                            <table class='table table-striped'>
                                <tr>
                                    <td width='200'>Tanggal Transaksi</td>
                                    <td>
                                        <?php if (empty($tgl_transaksi)) { ?>
                                            <input type="date" id="example-date" class="form-control" name="tgl_transaksi" id="datepicker-1" value="<?php echo $tgl_transaksi; ?>" required />
                                        <?php } else { ?>
                                            <input type="date" id="example-date" class="form-control" name="tgl_transaksi" id="datepicker-1" value="<?php echo $tgl_transaksi; ?>" readonly />
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>PNS</td>
                                    <td><input type="number" class="form-control" name="pns" id="pns" placeholder="Pns" value="<?php echo $pns; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>PPPK</td>
                                    <td><input type="number" class="form-control" name="pppk" id="pppk" placeholder="Pppk" value="<?php echo $pppk; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Anggota</td>
                                    <td><input type="number" class="form-control" name="anggota" id="anggota" placeholder="Khusus untuk RS TNI/Polri" value="<?php echo $anggota; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Non Pns Tetap</td>
                                    <td><input type="number" class="form-control" name="non_pns_tetap" id="non_pns_tetap" placeholder="Non Pns Tetap" value="<?php echo $non_pns_tetap; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kontrak</td>
                                    <td><input type="number" class="form-control" name="kontrak" id="kontrak" placeholder="Kontrak" value="<?php echo $kontrak; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_kes_sdm_dokter_gigi') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <div>
                            <p style="margin-bottom: 0px; color:red;">
                                - Data yang dikirimkan merupakan posisi data pada saat tanggal berkenaan, bersifat akumulatif. Data yang dikirimkan merupakan jumlah pegawai sesuai kriteria. Termasuk Dokter Gigi Spesialis.
                            </p>
                            <p style="margin-bottom: 0px; color:red;">
                                - Data awal dikirimkan pada awal tahun berkenaan, updating data dikirimkan per periode semesteran/tahunan.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>