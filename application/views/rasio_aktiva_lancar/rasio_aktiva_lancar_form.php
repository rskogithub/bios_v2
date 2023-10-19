<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA RASIO LANCAR</h2>
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
	    <!-- <tr><td width='200'>Kode</td><td><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>"  readonly  /></td></tr> -->
        <td><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="12"  hidden  /></td></tr>
	    <tr><td width='200'>Tanggal</td><td><input type="date" class="form-control"  id="example-date" name="tanggal" id="datepicker-1" placeholder="Tanggal" value="<?php echo $tanggal; ?>" required   /></td></tr>
	    <tr><td width='200'>Aktiva Lancar</td><td><input type="text" class="form-control" name="aktiva_lancar" id="aktiva_lancar" placeholder="Aktiva Lancar" value="<?php echo $aktiva_lancar; ?>"    /></td></tr>
	    <tr><td width='200'>Rencana Penggunaan Saldo BLU</td><td><input type="text" class="form-control" name="plan_pgunaan_saldo_blu" id="plan_pgunaan_saldo_blu" placeholder="Plan Pgunaan Saldo Blu" value="<?php echo $plan_pgunaan_saldo_blu; ?>"    /></td></tr>
	    <tr><td width='200'>Kewajiban Lancar</td><td><input type="text" class="form-control" name="kewajiban_lancar" id="kewajiban_lancar" placeholder="Kewajiban Lancar" value="<?php echo $kewajiban_lancar; ?>"    /></td></tr>
	    <tr><td width='200'>Rasio Lancar</td><td><input type="text" class="form-control" name="rasio_lancar" id="rasio_lancar" placeholder="Rasio Lancar" value="<?php echo  round($rasio_lancar ,2); ?>"    /></td></tr>
	    <tr><td></td><td><input type="hidden" name="no_id" value="<?php echo $no_id; ?>" />
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
	    <a href="<?php echo site_url('rasio_aktiva_lancar') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#aktiva_lancar, #plan_pgunaan_saldo_blu, #kewajiban_lancar").keyup(function() {
            var aktiva_lancar  = $("#aktiva_lancar").val();
            var plan_pgunaan_saldo_blu = $("#plan_pgunaan_saldo_blu").val();
            var kewajiban_lancar = $("#kewajiban_lancar").val();
            var rasio_lancar = ((parseInt(aktiva_lancar)-(parseInt(plan_pgunaan_saldo_blu))) / parseInt(kewajiban_lancar))/1 ;
           // var rasio_lancar = (parseInt(aktiva_lancar)/parseInt(kewajiban_lancar))/1 ;
            $("#rasio_lancar").val (rasio_lancar);
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