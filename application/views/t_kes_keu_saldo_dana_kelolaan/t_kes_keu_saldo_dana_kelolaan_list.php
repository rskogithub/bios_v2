<main id="js-page-content" role="main" class="page-content">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA KEUANGAN - SALDO DANA KELOLAAN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <?php echo anchor(site_url('t_kes_keu_saldo_dana_kelolaan/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?></div>
                        <table class="table table-bordered table-hover table-striped w-100" id="dt-basic-example">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Tgl Transaksi</th>
                                    <th>Nama Bank</th>
                                    <th>No Rekening</th>
                                    <th>Saldo Akhir</th>
                                    <th>Nama Satker</th>
                                    <th>Create Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody><?php $start = 0;
                                    foreach ($data as $row) {
                                        $this->db->where('kode', $row['kdbank']);
                                        $bank = $this->db->get('m_bank')->result();
                                    ?>
                                    <tr>
                                        <td width="2%"><?php echo $row['rn'] ?></td>
                                        <td><?php echo $row['tgl_transaksi'] ?></td>
                                        <td>
                                            <?php
                                            foreach ($bank as $banks) {
                                                echo '' . $banks->uraian . '';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $row['no_rekening'] ?></td>
                                        <td><?php echo formatRP($row['saldo_akhir']) ?></td>
                                        <td><?php echo $row['nmsatker'] ?></td>
                                        <td><?php echo $row['updated_at'] ?></td>
                                        <td style="text-align:center">
                                            <?php
                                            echo anchor(site_url('t_kes_keu_saldo_dana_kelolaan/update/' . $row['tgl_transaksi'] . '/' . $row['kdbank'] . '/' . $row['no_rekening']), '<i class="fal fa-pencil" aria-hidden="true"></i>', 'class="btn btn-warning btn-xs waves-effect waves-themed"');
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/notifications/toastr/toastr.js"></script>
<script>
    $(document).ready(function() {

        var table = $('#dt-basic-example').DataTable({
            //responsive: true,
            orderCellsTop: true,
            fixedHeader: true,
        });

        // var start = moment();

        // function cb(start) {
        //     $('#reportrange span').html(start.format('MMMM D, YYYY'));
        //     $('input[name="str"]').val(start.format('YYYY-MM-DD'));
        // }

        // $('#datepicker-3').daterangepicker({
        //     startDate: start,
        //     singleDatePicker: true,
        //     showDropdowns: true
        // }, cb);
        // cb(start);
    });
</script>