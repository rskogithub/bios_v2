<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA KESEHATAN - SALDO PENGELOLAAN KAS</h2>
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
                                <!-- <tr>
                                    <td width='200'>Nama Bank</td>
                                    <td>
                                        <select type="text" name="kdbank" id="kdbank" class="form-control" required>
                                            <option value="">Pilih Jenis Bank</option>
                                            <?php foreach ($get_bank as $row) : ?>
                                                <?php $selected = ''; ?>
                                                <?php if ($row['kode'] == $kd_bank) : ?>
                                                    <?php $selected = 'selected'; ?>
                                                <?php endif; ?>
                                                <option value="<?php echo $row['kode']; ?>" <?php echo $selected; ?>><?php echo $row['uraian']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td width='200'>No Bilyet</td>
                                    <td>
                                        <?php if (empty($no_bilyet)) { ?>
                                            <input type="text" class="form-control" name="no_bilyet" id="no_bilyet" placeholder="No Bilyet" value="<?php echo $no_bilyet; ?>" required />
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="no_bilyet" id="no_bilyet" placeholder="No Bilyet" value="<?php echo $no_bilyet; ?>" readonly />
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Nilai Deposito</td>
                                    <td><input type="text" class="form-control" name="nilai_deposito" id="nilai_deposito" placeholder="Nilai Deposito" value="<?php echo $nilai_deposito; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Nilai Bunga</td>
                                    <td><input type="number" class="form-control" name="nilai_bunga" id="nilai_bunga" placeholder="Nilai uang, bukan persentase bunga" value="<?php echo $nilai_bunga; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_kes_keu_saldo_pengelolaan_kas') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <div>
                            <p style="margin-bottom: 0px; color:red;">
                                - Data yang dikirimkan merupakan posisi data pada saat tanggal berkenaan, tidak bersifat akumulatif.
                            </p>
                            <p style="margin-bottom: 0px; color:red;">
                                - Data dikirimkan per periode harian.
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
<script src="<?php echo base_url() ?>assets/smartadmin/js/jquery.mask.min.js"></script>
<!-- <script>
    $(document).ready(function() {
        $('#nilai_deposito').mask('#.##0', {
            reverse: true
        });
    })
</script> -->