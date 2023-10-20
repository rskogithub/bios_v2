<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA RASIO POBO</h2>
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
	    <!-- <tr><td width='200'>Kode</td><td><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>"    /></td></tr> -->
        <td><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="13"   hidden /></td></tr>
	    <tr><td width='200'>Tanggal</td><td><input type="date" class="form-control"  id="example-date" name="tanggal" id="datepicker-1" placeholder="Tanggal" value="<?php echo $tanggal; ?>" required   /></td></tr>
	    <tr><td width='200'>Total Pendapatan</td><td><input type="text" class="form-control" name="pobo_total_pendapatan" id="pobo_total_pendapatan" placeholder="Pobo Total Pendapatan" value="<?php echo $pobo_total_pendapatan; ?>"    /></td></tr>
	    <tr><td width='200'>Pendapatan Apbn</td><td><input type="text" class="form-control" name="pobo_pendapatan_apbn" id="pobo_pendapatan_apbn" placeholder="Pobo Pendapatan Apbn" value="<?php echo $pobo_pendapatan_apbn; ?>"    /></td></tr>
	    <tr><td width='200'>Total Beban</td><td><input type="text" class="form-control" name="pobo_total_beban" id="pobo_total_beban" placeholder="Pobo Total Beban" value="<?php echo $pobo_total_beban; ?>"    /></td></tr>
	    <tr><td width='200'>Beban penyusutan dan amortisasi</td><td><input type="text" class="form-control" name="pobo_beban_susut_amor" id="pobo_beban_susut_amor" placeholder="Pobo Beban Susut Amor" value="<?php echo $pobo_beban_susut_amor; ?>"    /></td></tr>
	    <tr><td width='200'>Rasio Pobo</td><td><input type="text" class="form-control" name="rasio_pobo" id="rasio_pobo" placeholder="Rasio Pobo" value="<?php echo $rasio_pobo; ?>"    /></td></tr>
	    <tr><td></td><td><input type="hidden" name="no_id" value="<?php echo $no_id; ?>" />
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
	    <a href="<?php echo site_url('rasio_pobo') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#pobo_total_pendapatan, #pobo_pendapatan_apbn, #pobo_total_beban, #pobo_beban_susut_amor").keyup(function() {
            var pobo_total_pendapatan  = $("#pobo_total_pendapatan").val();
            var pobo_pendapatan_apbn = $("#pobo_pendapatan_apbn").val();
            var pobo_total_beban = $("#pobo_total_beban").val();
            var pobo_beban_susut_amor = $("#pobo_beban_susut_amor").val();
            var rasio_pobo = ( ((parseInt(pobo_total_pendapatan)-(parseInt(pobo_pendapatan_apbn)))) / ((parseInt(pobo_total_beban)-(parseInt(pobo_beban_susut_amor)))))*100 ;
           // var rasio_lancar = (parseInt(aktiva_lancar)/parseInt(kewajiban_lancar))/1 ;
            $("#rasio_pobo").val (rasio_pobo);
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