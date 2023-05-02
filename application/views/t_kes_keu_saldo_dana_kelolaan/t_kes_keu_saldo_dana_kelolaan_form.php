<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA KEUANGAN - SALDO DANA KELOLAAN</h2>
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
                                    <td width='200'>Nama Bank</td>
                                    <td>
                                        <?php if (empty($kdbank)) {
                                            echo select2_dinamis_custom('kdbank', 'm_bank', 'kode', 'uraian', '', 'LEFT(kode, "1") = "4"', '');
                                        } else {
                                        ?>
                                            <select name="kdbank" id="kd_akun" class="form-control select2">
                                                <?php foreach ($get_bank as $row) : ?>
                                                    <?php $selected = ''; ?>
                                                    <?php $disabled = 'disabled'; ?>
                                                    <?php if ($row['kode'] == $kdbank) : ?>
                                                        <?php $selected = 'selected'; ?>
                                                        <?php $disabled = ''; ?>
                                                    <?php endif; ?>
                                                    <option value="<?php echo $row['kode']; ?>" <?php echo $selected; ?><?php echo $disabled; ?>><?php echo $row['uraian']; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <!-- <td>
                                        <select type="text" name="kdbank" id="kdbank" class="form-control select2" required>
                                            <option value="">Pilih Jenis Bank</option>
                                            <?php foreach ($get_bank as $row) : ?>
                                                <?php $selected = ''; ?>
                                                <?php if ($row['kode'] == $kd_bank) : ?>
                                                    <?php $selected = 'selected'; ?>
                                                <?php endif; ?>
                                                <option value="<?php echo $row['kode']; ?>" <?php echo $selected; ?>><?php echo $row['uraian']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td> -->
                                </tr>
                                <tr>
                                    <td width='200'>No Rekening</td>
                                    <td>
                                        <?php if (empty($tgl_transaksi)) { ?>
                                            <input type="text" class="form-control" name="no_rekening" id="no_rekening" placeholder="No Rekening" value="<?php echo $no_rekening; ?>" required />
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="no_rekening" id="no_rekening" placeholder="No Rekening" value="<?php echo $no_rekening; ?>" readonly />
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Saldo Akhir</td>
                                    <td><input type="text" class="form-control" name="saldo_akhir" id="saldo_akhir" placeholder="Saldo Akhir" value="<?php echo $saldo_akhir; ?>" /></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_kes_keu_saldo_dana_kelolaan') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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
        $('#saldo_akhir').mask('#.##0', {
            reverse: true
        });
    })
</script> -->