<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA RASIO OPTIMALISASI KAS</h2>
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
        <td><input type="text" class="form-control" name="kode" id="kode" placeholder="kode" value="11"   hidden /></td></tr>
        <!-- <tr>
         <td width='200'>Indikator <?php echo form_error('kode') ?></td>
         <td><?php echo select2_dinamis('kode', 'master_rasio', 'kode', 'rasio',  $kode, '', 'kode ASC') ?></td>
        </tr> -->
	    <tr><td width='200'>Tanggal</td><td><input type="date" class="form-control"  id="example-date" name="tanggal" id="datepicker-1" placeholder="Tanggal" value="<?php echo $tanggal; ?>"   required/></td></tr>
	    <tr><td width='200'>Pendapatan bunga atas pengelolaan kas</td><td><input type="number" class="form-control" name="pdptn_bunga_atas_pnglolan_kas" id="pdptn_bunga_atas_pnglolan_kas" placeholder="Pendapatan bunga atas pengelolaan kas" value="<?php echo $pdptn_bunga_atas_pnglolan_kas; ?>"    /></td></tr>
	    <tr><td width='200'>Saldo Rekening Pengelolaan Kas</td><td><input type="number" class="form-control" name="saldo_rekening_pnglolaan_kas" id="saldo_rekening_pnglolaan_kas" placeholder="Saldo Rekening Pengelolaan Kas" value="<?php echo $saldo_rekening_pnglolaan_kas; ?>"    /></td></tr>
	    <tr><td width='200'>Saldo Rekening Operasional</td><td><input type="number" class="form-control" name="saldo_rekening_oprsnl" id="saldo_rekening_oprsnl" placeholder="Saldo Rekening Operasional" value="<?php echo ($saldo_rekening_oprsnl); ?>"    /></td></tr>
        <tr><td width='200'>Rasio Optimalisasi Kas</td><td><input type="text" class="form-control" name="rasio_optimal_kas" id="rasio_optimal_kas" placeholder="Rasio Optimalisasi Kas" value="<?php echo round($rasio_optimal_kas ,2); ?>"    /></td></tr>
        <tr><td></td><td><input type="hidden" name="no_id" value="<?php echo $no_id; ?>" />
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
	    <a href="<?php echo site_url('rasio_optimal_kas') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#pdptn_bunga_atas_pnglolan_kas, #saldo_rekening_pnglolaan_kas, #saldo_rekening_oprsnl").keyup(function() {
            var pdptn_bunga_atas_pnglolan_kas  = $("#pdptn_bunga_atas_pnglolan_kas").val();
            var saldo_rekening_pnglolaan_kas = $("#saldo_rekening_pnglolaan_kas").val();
            var saldo_rekening_oprsnl = $("#saldo_rekening_oprsnl").val();
            var rasio_optimal_kas = (parseInt(pdptn_bunga_atas_pnglolan_kas)/(parseInt(saldo_rekening_oprsnl) + parseInt(saldo_rekening_pnglolaan_kas)))*100 ;
            $("#rasio_optimal_kas").val (rasio_optimal_kas);
        });
    });
</script>

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